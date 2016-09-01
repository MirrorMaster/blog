<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>一点-后台首页</title>
    <link rel="stylesheet" href="/blog/Public/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/blog/Public/css/admin.css">
    <link rel="stylesheet" href="/blog/Public/vendor/uploadify/uploadify.css"/>
    <script src="/blog/Public/vendor/kindeditor/kindeditor.js"></script>
    <script src="/blog/Public/vendor/kindeditor/lang/zh_CN.js"></script>
    <script src="/blog/Public/vendor/jquery.min.js"></script>
    <script src="/blog/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/blog/Public/vendor/uploadify/jquery.uploadify.min.js"></script>
    <script src="/blog/Public/vendor/layer/layer.js"></script>
    <script src="/blog/Public/js/dialog.js"></script>
    <script src="/blog/Public/js/image.js"></script>
</head>
<body>
<header>
    <h3 style="margin-left: 10px">一点<small>后台管理系统</small></h3>
    <span class="right"><a href="/blog/admin.php/login/nset">退出登录</a></span>
    <span class="right">
        <span class="glyphicon glyphicon-user"></span><?php echo ($uname); ?>
    </span>
</header>
<?php
 $type = D('User')->getTypeByName($uname); $t = $type[0]['type']; if($t==1){ $getMenu = D('Menu')->getMenuAll(); }else{ $getMenu = D('Menu')->getMenuByName($t); } ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-1 nav">
            <ul class="list-unstyled">
                <li><a href="/blog/admin.php/index/admin"><span class="glyphicon glyphicon-home"></span>&nbsp;首页</a></li>
                <?php if(is_array($getMenu)): foreach($getMenu as $key=>$vo): ?><li><a href="/blog/admin.php/<?php echo ($vo["c"]); ?>/<?php echo ($vo["f"]); ?>"><span class="glyphicon glyphicon-<?php echo ($vo["icon"]); ?>"></span>&nbsp;<?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>

        <div class="content col-lg-11">
            <span class="lead text-primary">数据库备份</span><br>
            <a href="/blog/admin.php/cron/dumpmysql" class="btn btn-primary">备份</a>
        </div>
    <div/>
<div/>
<script src="/blog/Public/js/common.js"></script>
</body>
</html>