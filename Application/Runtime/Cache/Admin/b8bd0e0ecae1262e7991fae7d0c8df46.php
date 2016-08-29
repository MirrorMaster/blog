<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小白前端-后台首页</title>
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
    <h3>小白前端<small>后台管理系统</small></h3>
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
            <h2 class="lead text-primary">欢迎来到小白前端的后台管理页面</h2>
            <div class="row" style="margin-top:20px;margin-bottom: 100px">
                <div class="col-lg-4 bg-primary col-lg-push-1">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-right">访问文章的最大数</div>
                            <div class="panel-body text-right"><span class="lead text-primary"><?php echo ($essay['count']); ?>次</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 bg-primary col-lg-push-2">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-right">文章数量</div>
                            <div class="panel-body text-right"><span class="lead text-primary"><?php echo ($count); ?>篇</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 bg-primary col-lg-push-1">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-right">今日登陆用户数</div>
                            <div class="panel-body text-right"><span class="lead text-primary"><?php echo ($userCount); ?>位</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 bg-primary col-lg-push-2">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-right">文章推荐数</div>
                            <div class="panel-body text-right"><span class="lead text-primary"><?php echo ($ok); ?>篇</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div/>
<div/>
<script src="/blog/Public/js/common.js"></script>
</body>
</html>