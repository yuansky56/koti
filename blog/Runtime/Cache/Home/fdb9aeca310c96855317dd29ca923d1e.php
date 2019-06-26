<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<!--<meta charset="gb2312">-->
<title>我的网站_首页</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="order by dede58.com" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/blog/Public/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/blog/Public/css/styles1.css" rel="stylesheet">
<link href="/blog/Public/css/view1.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="/blog/Public/css/lrtk1.css" rel="stylesheet" />

<script type="text/javascript" src="/blog/Public/js/jquery1.js"></script>
    <script>
        $(function () {
            var html='';

            $.ajax({
                url:"/blog/index.php/admin/art/arthot",
                dataType:'json',
                type:'get',
                success:function(msg){
                    var index1=0;
                    $.each(msg, function(index, art){
                        index1++;
                        html += "<li><span><strong>"+index1+"</strong></span><a href='"+art.afilename+"'>"+art.atitle+"</a></li>";
                    });

                    $("#ool").html(html);
                    if($("#ool").text()!=''){
                        $(".tuijian").css('display','block');
                    }

                }
            });
        });
    </script>
<script type="text/javascript" src="/blog/Public/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>

<![endif]-->
</head>
<body>
<header>
  <nav id="nav">
    <ul>
      	<li><a href='/'>首页</a></li>
      	<!--
      	<li><a href='/a/jishu/'>技术探讨</a></li>
      	
      	<li><a href='/a/HTML/'>HTML5 / CSS3</a></li>
      	
      	<li><a href='/a/msh/'>慢生活</a></li>
      	-->
      	<li><a href='/blog/Public/jianli/李俊PHP求职简历.pdf'>简历查看</a></li>
      	
    </ul>
    <script src="/blog/Public/js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>

<!--header end-->
<div id="mainbody">
  <div class="info">
  <figure><img src="/blog/Public/uploads/allimg/150528/1-15052R305270-L.jpg"  alt="渡人如渡己，渡已，亦是渡">
      <figcaption><strong>渡人如渡己，渡已，亦是渡</strong>当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默...</figcaption>
    </figure>

    <div class="card">
      <h1>我的名片</h1>
      <p>网名：jeffery | lijun</p>
      <p>职业：PHP后端工程师</p>
      <p>微信：lj757034203</p>
      <p>Email：yuansky56@163.com</p>
      <ul class="linkmore">
        <li><a href="javascript:alert('糟糕，没有链接。');" class="talk" title="给我留言"></a></li>
        <li><a href="javascript:alert('糟糕，没有链接。');" class="address" title="联系地址"></a></li>
        <li><a href="javascript:alert('糟糕，没有链接。');" class="email" title="给我写信"></a></li>
        <li><a href="javascript:alert('糟糕，没有链接。');" class="photos" title="生活照片"></a></li>
        <li><a href="javascript:alert('糟糕，没有链接。');" class="heart" title="关注我"></a></li>
      </ul>
    </div>
  </div>
  <!--info end-->
  <div class="blank"></div>
  <div class="blogs">
    <ul class="bloglist">
        <?php if(is_array($artdata)): $i = 0; $__LIST__ = $artdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
			<div class="arrow_box">
			  <div class="ti"></div>
			  <!--三角形-->
			  <div class="ci"></div>
			  <!--圆形-->
			  <h2 class="title"><a href="/blog<?php echo (substr($vo["afilename"],1)); ?>" target="_blank"><?php echo ($vo["atitle"]); ?></a></h2>
			  <ul class="textinfo">
				<!--<a href="/a/HTML/9.html"><img src="/blog/Public/uploads/allimg/150529/1-15052Z014400-L.jpg"></a>-->
				<p><?php echo ($vo["abstract"]); ?></p>
			  </ul>
			  <ul class="details">
				<li class="icon-time"><a href="#"><?php echo (date("Y-m-d",$vo["atime"])); ?></a></li>
			  </ul>
			</div>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(count($pageNum) < 2): else: ?>
        <nav aria-label="Page navigation">
            <ul class="pagination" style="margin: 0 auto;" >
                <?php if($pagesno != 1): ?><li class="disabled"><a href="/blog/index.php/Home/Index/index/pageid/<?php echo ($pagesno-1); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php endif; ?>
                <?php if(is_array($pageNum)): $i = 0; $__LIST__ = $pageNum;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pageid): $mod = ($i % 2 );++$i; if($pagesno == $pageid): ?><li class="active"><?php else: ?><li><?php endif; ?>
                    <a href="/blog/index.php/Home/Index/index/pageid/<?php echo ($pageid); ?>"><?php echo ($pageid); ?> <span class="sr-only">(current)</span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php if($pagesno != $pagemax): ?><li>
                        <a href="/blog/index.php/Home/Index/index/pageid/<?php echo ($pagesno+1); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li><?php endif; ?>

            </ul>
        </nav><?php endif; ?>
    </ul>
    <!--bloglist end-->
    <aside>
      <div class="search">
        <form class="searchform" name="formsearch" action="/plus/search.php">
        <input type="hidden" name="kwtype" value="0" />
        <input name="q" type="text" id="search-keyword" value="输入关键词后按回车..." onfocus="if(this.value=='输入关键词后按回车...'){this.value='';}"  onblur="if(this.value==''){this.value='输入关键词后按回车...';}" />
        </form>
      </div>
	<div class="viny">
        <dl>
          <dt class="art"><img src="/blog/Public/img/artwork.png" alt="专辑"></dt>
          <dd class="icon-song"><span></span>输了你赢了世界又如何</dd>
          <dd class="icon-artist"><span></span>歌手：A-Lin</dd>
          <dd class="icon-album"><span></span>所属专辑：《A-Lin》</dd>
          <dd class="music">
            <audio src="/blog/Public/img/A-Lin.mp3" controls></audio>
         </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>
      <div class="tuijian" style="display: none;">
        <h2>推荐文章</h2>
        <ol id="ool">
        </ol>
      </div>
	  <!--
      <div class="toppic">
        <h2>图文并茂</h2>
        <ul>
			<li style="margin:10px 0;">
				<a href="/a/jishu/1.html">
					<img src="/blog/Public/uploads/allimg/150528/1-15052R224460-L.png">响应式web网站设计制作方法...
					<p>查看详细</p>
				</a>
			</li>
        </ul>
      </div>
      <div class="clicks">
        <h2>热门点击</h2>
        <ol>
        <li>
			<span><a href='/a/jishu/'>技术探讨</a></span><a href="/a/jishu/1.html">响应式web网站设计制作方法</a>
		</li>
        </ol>
      </div>
	  -->
    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->

<footer>
  <div class="footer-mid"></div>
  <div class="footer-bottom">
    <p>Copyright &copy; 2019-2033 yuansky.cn</p>
  </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"><a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->


<!--织梦58（dede58.com）做最好的织梦整站模板下载网站-->
</body>
</html>