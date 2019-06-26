<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/blog/Public/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/blog/Public/webuploader/webuploader.css">
<script type="text/javascript" src="/blog/Public/webuploader/webuploader.js"></script>
    <style type="text/css">
        .textt{
            width: 65%;
        }

    </style>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    <form action="/blog/index.php/admin/art/edit" method="post">
    <ul class="forminfo">
    <li><label>文章标题</label><input name="atitle" type="text" class="dfinput" /><i>标题不能超过30个字符</i></li>
    <li><label>是否推荐</label><cite><input name="ishot" type="radio" value="1" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="ishot" checked="checked" type="radio" value="0" />否</cite></li>
    <li><label>文章内容</label></li>
    <li>
        <div id="div1" class="textt"></div>
        <textarea id="text1" name="acontent" style="display: none;"></textarea>
    </li>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/blog/Public/editor/js/wangEditor.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#div1')
        // 隐藏“网络图片”tab
        editor.customConfig.showLinkImg = false
        editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
        var $text1 = $('#text1')
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
        }
        editor.create()
        // 初始化 textarea 的值
        $text1.val()
    </script>
    <li><label>文章摘要</label></li>
    <li><textarea name="abstract" style="height: 50px;" class="textinput"></textarea></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
    </form>
    </div>

</body>
</html>