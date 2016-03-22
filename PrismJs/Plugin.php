<?php
/**
 * prismjs for Typecho插件，实现代码高亮.
 *
 * @package PrismJs
 *
 * @author Penguin
 *
 * @version 0.0.1
 *
 * @link https://github.com/zhantong1994/Typecho-Code-Highlight-Plugins
 */
class PrismJs_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常.
     *
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->header = array('PrismJs_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('PrismJs_Plugin', 'footer');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('PrismJs_Plugin', 'parse');
        Typecho_Plugin::factory('Widget_Abstract_Comments')->contentEx = array('Prismjs_Plugin', 'parse');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常.
     *
     * @static
     *
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    }

    /**
     * 获取插件配置面板
     *
     * @param Typecho_Widget_Helper_Form $form 配置面板
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $styles = array_map('basename', glob(dirname(__FILE__).'/res/styles/*.css'));
        $styles = array_combine($styles, $styles);
        $style = new Typecho_Widget_Helper_Form_Element_Select('style', $styles, 'default.css',
            _t('代码高亮主题'));
        $form->addInput($style->addRule('enum', _t('必须选择主题'), $styles));

        $preference = new Typecho_Widget_Helper_Form_Element_Checkbox('preference', array('showLineNumber' => _t('显示行号')), array('showLineNumber'), _t('偏好设置'));
        $form->addInput($preference);
    }

    /**
     * 个人用户的配置面板
     *
     * @param Typecho_Widget_Helper_Form $form
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 输出头部css
     * ajax方式加载.
     *
     * @param unknown $header
     *
     * @return unknown
     */
    public static function header()
    {
        $cssUrl = Helper::options()->pluginUrl.'/PrismJs/res/styles/'.Helper::options()->plugin('PrismJs')->style;
        echo <<<EOF
        <script type="text/javascript">
        $.get("$cssUrl", function(css)
        {
           $('<style type="text/css"></style>')
              .html(css)
              .appendTo("head");
        });
        </script>
EOF;
    }

    /**
     * 输出尾部js
     * ajax方式加载.
     *
     * @param unknown $header
     *
     * @return unknown
     */
    public static function footer()
    {
        $jsUrl = Helper::options()->pluginUrl.'/PrismJs/res/prism.js';
        echo <<<EOF
        <script type="text/javascript">
        $.ajax({
            url:"$jsUrl",
            cache:true,
            dataType:"script",
            success:function(){
                Prism.highlightAll();
            }
        });
        </script>
EOF;
    }
    public static $langNames = [
            'actionscript' => '/^as[1-3]$/i',
            'makefile' => '/^(mk|mak)$/i',
            'cs' => '/^csharp$/i',
            'css' => '/^css[1-3]$/i',
            'delphi' => '/^(dpr|dfm|pas|pascal|freepascal|lazarus|lpr|lfm)$/i',
            'javascript' => '/^js$/i',
            'markdown' => '/^(md|mkdown|mkd)$/i',
            'objectivec' => '/^(objective\-c|objc|obj\-c)$/i',
            'php' => '/^php[1-6]$/i',
            'sql' => '/^mysql$/i',
            'xml' => '/^(html|html5|xhtml|rss|atom|xsl|plist)$/i',
            'bash' => '/^(sh|zsh)$/i',
            'cpp' => '/^c\+\+$/i',
            'dos' => '/^(bat|cmd)$/i',
            'diff' => '/^patch$/i',
            'django' => '/^jinja$/i',
            'erlang' => '/^erl$/i',
            'http' => '/^https$/i',
            'java' => '/^jsp$/i',
            'python' => '/^py$/i',
            'plain' => '/^(plain|text|txt)$/i',
        ];
    public static function parse($text, $widget, $lastResult)
    {
        $text = empty($lastResult) ? $text : $lastResult;
        $text = preg_replace_callback(
            '/<code class="(lang|language)-(.*?)">/i',
            function ($matches) {
                $lang = strtolower($matches[2]);
                $finalLang = $lang;
                if (!in_array($lang, self::$langNames)) {
                    foreach (self::$langNames as $key => $value) {
                        if (preg_match($value, $lang)) {
                            $finalLang = $key;
                            break;
                        }
                    }
                }

                return '<code class="language-'.$finalLang.'">';
            },
            $text
            );
        $text = str_replace('<code>', '<code class="language-plain">', $text);
        if (in_array('showLineNumber', Helper::options()->plugin('PrismJs')->preference)) {
            $text = str_replace('<pre>', '<pre class="line-numbers">', $text);
        }

        return $text;
    }
}
