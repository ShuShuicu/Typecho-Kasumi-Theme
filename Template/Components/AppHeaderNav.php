<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
        <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#drawer'}">
            <i class="mdui-icon material-icons">menu</i>
        </a>
        <a href="<?php Get::SiteUrl() ?>" class="mdui-typo-headline mdui-hidden-xs"><?php Get::SiteName(); ?></a>
        <a class="mdui-typo-title">
            <?php
            if (Get::Is("index")) {
                echo Get::Options("SubTitle") ? Get::Options("SubTitle") : '首页';
            }
            $archiveTitle = GetPost::ArchiveTitle(
                [
                    "category" => _t("%s"),
                    "search" => _t("%s"),
                    "tag" => _t("%s"),
                    "author" => _t("%s"),
                ],
                "",
            );
            ?>
        </a>
        <div class="mdui-toolbar-spacer"></div>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-dialog="{target: '#search-dialog'}">
            <i class="mdui-icon material-icons">search</i>
        </a>
    </div>
</div>

<div class="mdui-dialog" id="search-dialog" style="border-radius: 5px;" role="dialog" aria-labelledby="search-dialog-title">
    <div class="mdui-dialog-title" id="search-dialog-title">搜索文章 · <small>精彩近在咫尺！</small></div>
    <div class="mdui-dialog-content">
        <form method="post" action="<?php echo Get::Options('siteUrl'); ?>" role="search">
            <div class="mdui-textfield">
                <i class="mdui-icon material-icons" aria-hidden="true">search</i>
                <input class="mdui-textfield-input" type="search" name="s" placeholder="输入关键词后按回车(Enter)..." aria-label="搜索文章" required>
            </div>
        </form>
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-cancel>关闭</button>
    </div>
</div>

