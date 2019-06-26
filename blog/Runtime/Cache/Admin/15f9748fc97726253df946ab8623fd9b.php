<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/blog/Public/bootstrap/css/bootstrap.css"/>
    <script type="text/javascript" src="/blog/Public/js/jquery.js"></script>
    <script>
        $(function(){
            $('.table-bordered').next().css('margin-left','300px')
        })
    </script>
    <style>
        .div{
            width: 90%;
        }
        .fenye{
            text-align: center;
        }
        .num,.current,.next{
            margin-left: 20px;
        }
    </style>
</head>
<body>
<?php if(empty($artlist)): ?><h1>还没有发布文章</h1>
<?php else: ?>
<div class="div">
<form  onsubmit="return false" class="navbar-form navbar-right" role="search" action="index.php/admin/art/artSearch" method="post">
    <div class="form-group">
        <input id="name" name= "sname" type="text" class="form-control" placeholder="输入学生姓名查找">
    </div>
    <button type="submit" class="btn btn-primary" onclick="f1()">Search</button>
</form>
    <div id="table">
<table class="table table-hover table-bordered">
    <tr><th>序号</th><th>标题</th><th>是否热读</th><th>修改</th><th>删除</th></tr>

    <?php if(is_array($artlist)): $k = 0; $__LIST__ = $artlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($k % 2 );++$k;?><tr><td><?php echo ($k); ?></td><td><?php echo ($art["atitle"]); ?></td>
            <?php if($art["ishot"] == 1): ?><td style="color: #00A000;">√</td>
            <?php else: ?><td style="color: red;">×</td><?php endif; ?>
            <td><a href="/blog/index.php/Admin/Art/artupdate/aid/<?php echo ($art["aid"]); ?>">update</a></td><td><a href="/blog/index.php/Admin/Art/artdelete/aid/<?php echo ($art["aid"]); ?>" onClick='return confirm("删除操作需要慎重,删除后将无法恢复,确定要删除?")'>delete</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
        <?php echo ($page); ?>
    </div>

</div><?php endif; ?>
</body>
</html>