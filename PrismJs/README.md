# PrismJs for Typecho
[PrismJs]在Typecho下的插件，实现代码高亮。

## 特点
- 需在客户端加载的javascript文件和CSS文件均采用Ajax异步加载
- 支持Typecho内容Ajax异步加载时的代码高亮（即页面内容动态加载时，仍能对动态加载的内容进行代码高亮渲染）
- 支持自选高亮主题
- 支持显示行号

## 注意
- 需要[jQuery]支持
- 使插件能够正常渲染Ajax内容，需要Ajax动态载入的内容包括`footer.php`(插件渲染部分由`footer.php`触发)

## 安装插件
将本文件夹移动到Typecho下`usr/plugins/`目录中，注意保持文件夹名为`PrismJs`。

## 使用插件
在Typecho后台页面“控制台”->"插件"下对`PrismJs`点击”启用”，启用后在插件“设置”中选择适合的代码高亮主题，以及是否显示行号，“保存设置”即可。


[PrismJs]:http://prismjs.com/
[jQuery]:https://jquery.com/
