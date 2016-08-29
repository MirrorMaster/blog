<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小白前端-后台登录</title>
    <link rel="stylesheet" href="/blog/Public/css/login.css">
</head>
<body>
<div class="bg">
    <div class="loginFrom">
        <h3>欢迎来到后台登录<small>--请慎重操作!</small></h3>
        <form  id="loginForm"  enctype="multipart/form-data" method="post">
             <p>
                 <label>用户名</label>
                 <input name="username" type="text" placeholder="请输入用户名">
             </p>
             <p>
                 <label>密码</label>
                 <input type="password"  name="pwd">
             </p>
             <button class="loginBtn">登录</button>
        </form>
    </div>
</div>
<script src="/blog/Public/vendor/jquery.min.js"></script>
<script src="/blog/Public/vendor/layer/layer.js"></script>
<script src="/blog/Public/js/dialog.js"></script>
<script src="/blog/Public/js/common.js"></script>
</body>
</html>