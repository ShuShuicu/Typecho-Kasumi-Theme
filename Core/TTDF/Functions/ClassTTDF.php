<?php

/**
 * TTDF Class
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class TTDF
{
    /**
     * HelloWorld
     * 
     * @param bool $echo 是否输出
     */
    public static function HelloWorld(?bool $echo = true)
    {
        if ($echo) echo '您已成功安装开发框架！<br>这是显示在index.php中调用的默认内容。';

        return '您已成功安装开发框架！<br>这是显示在index.php中调用的默认内容。';
    }

    /**
     * 获取框架版本
     *
     * @param bool|null $echo 当设置为 true 时，会直接输出；
     *                        当设置为 false 时，则返回结果值。
     * @return string|null 
     * @throws Exception
     */
    public static function Ver(?bool $echo = true)
    {
        try {
            $FrameworkVer = __FRAMEWORK_VER__;

            if ($echo) echo $FrameworkVer;

            return $FrameworkVer;
        } catch (Exception $e) {
            return self::handleError('获取框架版本失败', $e);
        }
    }

    /**
     * 获取 typecho 版本
     *
     * @param bool|null $echo 当设置为 true 时，会直接输出；
     *                        当设置为 false 时，则返回结果值。
     * @return string|null 
     * @throws Exception
     */
    public static function TypechoVer(?bool $echo = true)
    {
        try {
            $TypechoVer = \Helper::options()->Version;

            if ($echo) echo $TypechoVer;

            return $TypechoVer;
        } catch (Exception $e) {
            return self::handleError('获取Typecho版本失败', $e);
        }
    }

    /**
     * 引入函数库
     * 
     * @param string $TTDF
     */
    public static function Functions($TTDF)
    {
        Get::CoreFunctions($TTDF);
    }
    /**
     * HeadMeta
     */
    public static function HeadMeta()
    {
    ?>
<meta charset="<?php Get::Options('charset', true) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <meta name="renderer" content="webkit" />
    <?php TTDF::Functions('SEO'); ?>
    <meta name="generator" content="Typecho <?php TTDF::TypechoVer(true) ?>" />
    <meta name="framework" content="TTDF <?php TTDF::Ver(true) ?>" />
    <meta name="template" content="<?php GetTheme::Name(true) ?>" />
<?php
    }
    /**
     * HeadMetaOG
     */
    public static function HeadMetaOG()
    {
    ?>
    <meta name="og:description" content="<?php TTDF_SEO_Description(); ?>" />
    <meta property="og:locale" content="<?php echo Get::Options('lang') ? Get::Options('lang') : 'zh-CN' ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php Get::Options('title', true) ?>" />
    <meta property="og:title" content="<?php TTDF_SEO_Title(); ?>" />
    <meta property="og:url" content="<?php Get::PageUrl(); ?>" />
    <link rel="canonical" href="<?php Get::PageUrl(true, false, null, true); ?>" />
<?php
    }
}

/**
 * 钩子类
 */
class TTDF_Hook {
    private static $actions = [];

    /**
     * 注册钩子
     * @param string $hook_name 钩子名称
     * @param callable $callback 回调函数
     */
    public static function add_action($hook_name, $callback) {
        if (!isset(self::$actions[$hook_name])) {
            self::$actions[$hook_name] = [];
        }
        self::$actions[$hook_name][] = $callback;
    }

    /**
     * 执行钩子
     * @param string $hook_name 钩子名称
     * @param mixed $args 传递给回调函数的参数
     */
    public static function do_action($hook_name, $args = null) {
        if (isset(self::$actions[$hook_name])) {
            foreach (self::$actions[$hook_name] as $callback) {
                call_user_func($callback, $args);
            }
        }
    }
}