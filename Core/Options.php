<?php

/**
 * Options Functions
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * THEME_URL
 * 用于后台设置获取主题目录
 */
define("THEME_URL", GetTheme::Url(false));
define("THEME_NAME", GetTheme::Name(false));

function themeConfig($form)
{
?>
    <style>
        body {
            background: url(<?php GetTheme::Url() ?>/screenshot.webp) no-repeat 0 0;
            background-size: cover;
            background-attachment: fixed;
        }

        .main {
            background-color: #ffffffde;
            padding: 10px
        }

        .typecho-foot {
            padding: 1em 0 3em;
            background-color: #ffffffde;
        }

        .typecho-head-nav .operate a {
            background-color: #202328;
        }

        .typecho-option-tabs li {
            float: left;
            background-color: #fffbcc;
        }
    </style>
    <div style="text-align: center;">
        <h1>Kirakira Dokidoki</h1>
        <p>感谢使用 Kasumi 主题，这里是主题设置页面，你可以在这里设置一些主题相关的选项。</p>
        <p>如果你有任何问题或建议，欢迎在 <a href="https://github.com/ShuShuicu/Typecho-Kasumi-Theme/issues">GitHub Issues</a> 进行反馈。</p>
        <hr>
        <p>主题版本：<?php GetTheme::Ver(); ?>丨框架版本：<?php TTDF::Ver() ?>丨Typecho版本: <?php TTDF::TypechoVer() ?></p>
    </div>
<?php
    // 定义表单元素配置
    $formElements = [
        [
            // Favicon
            'type' => 'Text',
            'name' => 'FaviconUrl',
            'value' => GetTheme::Url(false) . '/Assets/images/Kasumi.svg',
            'label' => 'Favicon',
            'description' => '在这里填入一个图片 URL 地址, 以在网站标题前加上一个图标'
        ],
        [
            // 副标题
            'type' => 'Text',
            'name' => 'SubTitle',
            'value' => null,
            'label' => '副标题',
            'description' => '在这里填入一个文字, 以在网站标题后加上一个副标题'
        ],
        [
            // ICP备案号
            'type' => 'Text',
            'name' => 'IcpCode',
            'value' => null,
            'label' => '备案号',
            'description' => '在这里填入网站ICP备案号, 将显示在底部右侧位置'
        ],
        [
            // 收款二维码
            'type' => 'Text',
            'name' => 'PayQrcode',
            'value' => null,
            'label' => '收款二维码',
            'description' => '在这里填入一个图片 URL 地址, 以在充电对话框中显示'
        ],
        [
            // 首页样式
            'type' => 'Radio',
            'name' => 'IndexStyle',
            'value' => 'Card',
            'label' => '首页样式',
            'description' => '选择首页样式',
            'options' => [
                'Card' => '卡片',
                'List' => '列表',
            ]
        ],
        [
            // 分类标签样式
            'type' => 'Radio',
            'name' => 'ArchiveStyle',
            'value' => 'List',
            'label' => '分类标签样式',
            'description' => '选择分类标签样式',
            'options' => [
                'Card' => '卡片',
                'List' => '列表',
            ]
        ],
        [
            // 导航菜单
            'type' => 'Textarea',
            'name' => 'SidebarNav',
            'value' => '首页|home|' . Get::SiteUrl(false),
            'label' => '侧边导航',
            'description' => '侧边自定义导航栏，格式为 名称|图标|链接，多个导航请换行。<br>查看图标名称：<a href="https://www.mdui.org/docs/material_icon">https://www.mdui.org/docs/material_icon</a>'
        ],
        [
            // 警告提示开关
            'type' => 'Select',
            'name' => 'AlertSwitch',
            'value' => 'close',
            'label' => '警告提示',
            'description' => '是否启用警告提示',
            'options' => [
                'close' => '关闭',
                'open' => '启用',
            ]
        ],
        [
            // 警告提示模式
            'type' => 'Radio',
            'name' => 'AlertMode',
            'value' => 'info',
            'label' => '警告提示模式',
            'description' => '选择警告提示模式',
            'options' => [
                'info' => '蓝色信息',
                'warning' => '黄色警告',
                'success' => '绿色成功',
                'error' => '红色错误',
            ]
        ],
        [
            // 警告提示内容
            'type' => 'Text',
            'name' => 'AlertContent',
            'value' => null,
            'label' => '警告提示内容',
        ],
        [
            // 轮播图开关
            'type' => 'Select',
            'name' => 'CarouselSwitch',
            'value' => 'close', 
            'label' => '轮播图',
            'description' => '是否启用轮播图',
            'options' => [
                'close' => '关闭',
                'open' => '启用',
            ]
        ],
        [
            // 分类标签是否启用轮播图
            'type' => 'Radio',
            'name' => 'CarouselArchive',
            'value' => 'open', 
            'label' => '分类标签是否启用',
            'description' => '是否在分类标签页面启用轮播图',
            'options' => [
                'open' => '启用',
                'close' => '关闭',
            ]
        ],
        [
            // 缩略图高度
            'type' => 'Text',
            'name' => 'CarouselHeight',
            'value' => '340px',
            'label' => '缩略图高度',
            'description' => '设置轮播图缩略图的高度，单位为px，默认为340px。'
        ],
        [
            // 缩略图内容
            'type' => 'Textarea',
            'name' => 'CarouselContent',
            'value' => 'https://github.com/ShuShuicu/Typecho-Kasumi-Theme|' . GetTheme::Url(false) . '/screenshot.webp',
            'label' => '缩略图图片',
            'description' => '请以 跳转链接|图片链接 的格式输入，每行一个。'
        ],
        [
            // 翻译语言
            'type' => 'Checkbox',
            'name' => 'TranslationLang',
            'value' => ['chinese_simplified', 'chinese_traditional', 'english', 'japanese', 'korean'],
            'label' => '翻译语言',
            'description' => '启用翻译功能，选择需要的语言',
            'options' => [
                'chinese_simplified' => '简体中文',
                'chinese_traditional' => '繁體中文',
                'english' => 'English',
                'japanese' => '日本語',
                'korean' => '한국어',
                'ukrainian' => 'УкраїнськаName',
                'norwegian' => 'Norge',
                'welsh' => 'color name',
                'dutch' => 'nederlands',
                'filipino' => 'Pilipino',
                'lao' => 'ກະຣຸນາ',
                'telugu' => 'తెలుగుQFontDatabase',
                'romanian' => 'Română',
                'nepali' => 'नेपालीName',
                'french' => 'Français',
                'haitian_creole' => 'Kreyòl ayisyen',
                'czech' => 'český',
                'swedish' => 'Svenska',
                'russian' => 'Русский язык',
                'malagasy' => 'Malagasy',
                'burmese' => 'ဗာရမ်',
                'pashto' => 'پښتوName',
                'thai' => 'คนไทย',
                'armenian' => 'Արմենյան',
                'persian' => 'Persian',
                'kurdish' => 'Kurdî',
                'turkish' => 'Türkçe',
                'hindi' => 'हिन्दी',
                'bulgarian' => 'български',
                'malay' => 'Malay',
                'swahili' => 'Kiswahili',
                'oriya' => 'ଓଡିଆ',
                'icelandic' => 'ÍslandName',
                'irish' => 'Íris',
                'khmer' => 'ខ្មែរKCharselect unicode block name',
                'gujarati' => 'ગુજરાતી',
                'slovak' => 'Slovenská',
                'kannada' => 'ಕನ್ನಡ್Name',
                'hebrew' => 'היברית',
                'hungarian' => 'magyar',
                'marathi' => 'मराठीName',
                'tamil' => 'தாமில்',
                'estonian' => 'eesti keel',
                'malayalam' => 'മലമാലം',
                'inuktitut' => 'ᐃᓄᒃᑎᑐᑦ',
                'arabic' => 'بالعربية',
                'deutsch' => 'Deutsch',
                'slovene' => 'slovenščina',
                'bengali' => 'বেঙ্গালী',
                'urdu' => 'اوردو',
                'azerbaijani' => 'azerbaijani',
                'portuguese' => 'português',
                'samoan' => 'lifiava',
                'afrikaans' => 'afrikaans',
                'tongan' => '汤加语',
                'greek' => 'ελληνικά',
                'indonesian' => 'IndonesiaName',
                'spanish' => 'Español',
                'danish' => 'dansk',
                'amharic' => 'amharic',
                'punjabi' => 'ਪੰਜਾਬੀName',
                'albanian' => 'albanian',
                'lithuanian' => 'Lietuva',
                'italian' => 'italiano',
                'vietnamese' => 'Tiếng Việt',
                'maltese' => 'Malti',
                'finnish' => 'suomi',
                'catalan' => 'català',
                'croatian' => 'hrvatski',
                'bosnian' => 'bosnian',
                'polish' => 'Polski',
                'latvian' => 'latviešu',
                'maori' => 'Maori',
            ]
        ],
    ];
    // 循环添加表单元素
    foreach ($formElements as $TTDF) {
        $form->addInput(TTDF_FormElement(
            $TTDF['type'],
            $TTDF['name'],
            $TTDF['value'] ?? null,
            $TTDF['label'] ?? '',
            $TTDF['description'] ?? '',
            $TTDF['options'] ?? []
        ));
    }
}