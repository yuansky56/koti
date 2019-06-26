<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/blog/Public/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/blog/Public/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/blog/Public/img/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="main.html" target="_parent"><img src="/blog/Public/img/logo.png" title="系统首页" /></a>
    </div>
    <div class="topright">    
    <ul>
    <li><a href="javascript:;" target="_parent">退出</a></li>
    </ul>

    <div class="user">
    <span>admin</span>
    </div>
    </div>
</body>
</html>