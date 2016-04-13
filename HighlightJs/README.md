# HighlightJs for Typecho
[HighlightJs]在Typecho下的插件，实现代码高亮。

插件可以实现如下代码块的高亮显示，其中\`\`\`后为语言关键字，以支持特定语法的高亮。

<pre>
```python
print('HighlightJs')
```
</pre>

若\`\`\`后未添加语言关键字，或关键字不在支持列表中，则对应代码块不会由HighlightJs进行渲染（代码块背景也不会渲染）；而是由Typecho默认，或其他CSS文件进行渲染。

## 特点
- 需在客户端加载的javascript文件和CSS文件均采用Ajax异步加载
- 支持Typecho内容Ajax异步加载时的代码高亮（即页面内容动态加载时，仍能对动态加载的内容进行代码高亮渲染）
- 支持自选高亮主题

### 支持高亮的语言
- Apache (apache)
- Bash (bash sh zsh)
- C# (cs csharp)
- C++ (cpp c++)
- CoffeeScript (coffeescript)
- CSS (css css1 css2 css3)
- Device Tree (devicetree)
- Diff (diff patch)
- HTML, XML (html html5 xhtml xml xsl rss atom plist)
- HTTP (http https)
- Ini (ini)
- Java (java jsp)
- JavaScript (javascript jsp)
- JSON (json)
- Makefile (makefile mk mak)
- Markdown (markdown mkdown mkd md)
- Nginx (nginx)
- Objective-C (objectivec objective-c objc obj-c)
- Perl (perl)
- PHP (php php1 php2 php3 php4 php5 php6)
- Python (python py)
- Ruby (ruby)
- SQL (sql mysql)

括号中是支持的关键字名称，不区分大小写。
## 注意
- 需要[jQuery]支持
- ~~使插件能够正常渲染Ajax内容，需要Ajax动态载入的内容包括`footer.php`(插件渲染部分由`footer.php`触发)~~
- 由于HighlightJs本身的原因，不支持显示代码行号
- 由于HighlightJs本身的原因，不支持行内代码高亮

## 安装插件
将本文件夹移动到Typecho下`usr/plugins/`目录中，注意保持文件夹名为`HighlightJs`。

## 使用插件
在Typecho后台页面“控制台”->"插件"下对`HighlightJs`点击”启用”，启用后在插件“设置”中选择适合的代码高亮主题，“保存设置”即可。

"设置"中“有Ajax异步加载内容”打钩，即会对通过Ajax加载的内容进行代码高亮渲染（HTML中title发生变化则触发渲染）；如果你的网页在一次加载后内容不会再动态变化，或变化的内容不需要进行代码高亮渲染，则可以将此项不打钩。

## 开发
插件只选择了较为常见的语言进行高亮渲染，如果你需要对更多的语言，或特定的语言进行高亮渲染，你可以到[highlightjs]的下载页面选择你需要的语言，下载生成的javascript文件，替换插件目录下`res/highlight.pack.js`文件（注意保持文件名相同）。

同样，如果你在[highlightjs]找到了更多的主题CSS文件，或有另外的CSS文件，只需要添加到插件目录下`res/styles/`目录下，在“控制台”中选择使用此主题CSS文件，即可使用新的主题进行渲染。

## 关于
基于[HighlightJs]9.2.0版
[HighlightJs]:https://highlightjs.org/
[jQuery]:https://jquery.com/
