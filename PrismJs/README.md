# PrismJs for Typecho
[PrismJs]在Typecho下的插件，实现代码高亮。

插件可以实现如下代码块的高亮显示，其中\`\`\`后为语言关键字，以支持特定语法的高亮。

<pre>
```python
print('PrismJs')
```
</pre>

或行内代码的高亮显示，如：

<pre>
`python print('PrismJs') `
</pre>

若\`\`\`或\`后未添加语言关键字，或关键字不在支持列表中，则对应代码块或行内代码不会进行高亮渲染，但仍然会有主题背景渲染。

## 特点
- 需在客户端加载的javascript文件和CSS文件均采用Ajax异步加载
- 支持Typecho内容Ajax异步加载时的代码高亮（即页面内容动态加载时，仍能对动态加载的内容进行代码高亮渲染）
- 支持自选高亮主题
- 支持显示行号
- 支持行内代码高亮

### 支持高亮的语言
- ASP.NET (asp)
- Bash (bash sh zsh)
- C (c)
- C# (cs csharp)
- C++ (cpp c++)
- CSS (css css1 css2 css3)
- CoffeeScript (coffeescript)
- Fortran (fortran)
- Git (git)
- Go (go)
- Haskell (haskell)
- HTML, XML (html html5 xhtml xml xsl rss atom plist)
- Ini (ini)
- Java (java jsp)
- JavaScript (javascript jsp)
- JSON (json)
- LaTex (latex)
- Makefile (makefile mk mak)
- Markdown (markdown mkdown mkd md)
- MATLAB (matlab)
- Nginx (nginx)
- Objective-C (objectivec objective-c objc obj-c)
- Perl (perl)
- PHP (php php1 php2 php3 php4 php5 php6)
- PowerShell (powershell)
- Python (python py)
- R (r)
- Ruby (ruby)
- SQL (sql mysql)
- Swift (swift)
- vim (vim)

括号中是支持的关键字名称，不区分大小写。

## 注意
- 需要[jQuery]支持
- 使插件能够正常渲染Ajax内容，需要Ajax动态载入的内容包括`footer.php`(插件渲染部分由`footer.php`触发)

## 安装插件
将本文件夹移动到Typecho下`usr/plugins/`目录中，注意保持文件夹名为`PrismJs`。

## 使用插件
在Typecho后台页面“控制台”->"插件"下对`PrismJs`点击”启用”，启用后在插件“设置”中选择适合的代码高亮主题，以及是否显示行号，“保存设置”即可。

## 开发
插件只选择了较为常见的语言进行高亮渲染，如果你需要对更多的语言，或特定的语言进行高亮渲染，你可以到[PrismJs]的下载页面选择你需要的语言，下载生成的javascript文件，替换插件目录下`res/prism.js`文件（注意保持文件名相同）。

同样，如果你在[PrismJs]找到了更多的主题CSS文件，或有另外的CSS文件，只需要添加到插件目录下`res/styles/`目录下，在“控制台”中选择使用此主题CSS文件，即可使用新的主题进行渲染。**注意如果需要显示行号等，需要CSS文件也支持！若在[PrismJs]下载CSS主题，则注意勾选对应插件后再点击下载！**

javascript文件中集成有Prismjs的[Line Numbers]插件和[Show Language]插件，如果你需要添加更多的Prismjs插件，或删去一些插件，可以到[PrismJs]的下载页面选择对应选项，生成新的javascript文件并进行替换。

## 关于
基于[PrismJs]2016年3月22日的版本
[PrismJs]:http://prismjs.com/
[jQuery]:https://jquery.com/
[Line Numbers]:http://prismjs.com/plugins/line-numbers/
[Show Language]:http://prismjs.com/plugins/show-language/
