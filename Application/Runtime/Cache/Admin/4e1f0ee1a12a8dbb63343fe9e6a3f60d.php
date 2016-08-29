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

        <div class="col-lg-11 content">
            <p class="text-primary lead">用户添加</p>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="username" class="col-lg-2 control-label">用户名:</label>
                    <div class="col-lg-5">
                        <input name="username" id="username" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd" class="col-lg-2 control-label">密码:</label>
                    <div class="col-lg-5">
                        <input name="password" id="pwd" type="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd2" class="col-lg-2 control-label">请确定密码:</label>
                    <div class="col-lg-5">
                        <input name="pwd2" id="pwd2" type="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">邮箱:</label>
                    <div class="col-lg-5">
                        <input name="email" id="email" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd" class="col-lg-2 control-label">设置权限:</label>
                    <div class="col-lg-5">
                        <label class="radio-inline">
                            <input type="radio" name="type" value="1">超级管理员
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="type" value="0">普通管理员<span class="text-danger">(部分功能不可用)</span>
                        </label>
                    </div>
                </div>
                <button type="button" class="bai_ad btn btn-primary col-xs-12  col-lg-push-2 col-lg-4">确认</button>
            </form>
        </div>
    </div>
</div>
<script>
    var SCRIPT = {
        'save_url' : '/blog/admin.php/user/save'
    }
</script>
<script src="/blog/Public/js/common.js"></script>
</body>
</html>