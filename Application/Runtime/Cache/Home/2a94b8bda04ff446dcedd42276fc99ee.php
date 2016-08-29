<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" value="<?php echo ($zd["keywords"]); ?>" />
    <meta name="description" value="<?php echo ($zd["description"]); ?>" />
    <title><?php echo ($zd["title"]); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/blog/Public/vendor/fullPage/jquery.fullPage.css">
    <link rel="stylesheet" href="/blog/Public/css/index.css">
    <script src="/blog/Public/vendor/jquery.min.js"></script>
    <script src="/blog/Public/vendor/fullpage/jquery.fullPage.min.js"></script>
    <script src="/blog/Public/js/main.js"></script>
</head>
<body>
<div class="top-menu">
    <a href="index.html" class="logo"><img src="/blog/Public/image/logo.png"></a>
    <span class="hide z"><img src="/blog/Public/image/list.png"></span>
    <ul class="list">
        <li class="ding">
            <a href="##">订阅号</a>
            <div class="erweima">
                <img src="/blog/Public/image/er.jpg">
                <div class="r">
                    <h3>小白前端</h3>
                    <span>分享技术,分享经验</span>
                </div>
            </div>
        </li>
        <li><a href="/blog/index.php/index/blog">我的博客</a></li>
        <li><a href="#">前端论坛</a></li>
        <li><a href="#">留言板</a></li>
    </ul>
    <div class="new"><img src="/blog/Public/image/er.jpg"></div>
</div>
<div id="fullpage">
    <div class="section page1">
        <div class="wel">
            <h1>小白前端</h1>
            <span>--分享是一种神奇的东西，它使快乐增大，它使悲伤减小</span>
        </div>
        <div class="showMe">
            <div class="qq">
                <span class="about">如何联系到我?</span>
                <span class="lx">QQ:1028227712</span>
            </div>
            <div class="qun">
                <span class="about">前端交流群!</span>
                <span class="lx">542778007</span>
            </div>
        </div>
    </div>
    <div class="section page2">
        <div class="aboutMy">
            <span class="tit">关于我</span>
            <div class="content">
                <img src="/blog/Public/image/p.jpg">
                <p>一名普普通通的码农,想通过博客的方式把自己学会的东西分享给更多的人.也希望大家可以通过留言板或者"有可能会有的"前端论坛来分享自己的经验.爱好就是电影,代码,游戏和健身吧.欢迎大家加入我的QQ群:542778007.这是第一次建个人网站,所以也没有那么多的东西来展示出来吧,所以总觉得页面空荡荡的,但是没关系 慢慢来吧</p>
            </div>
        </div>
        <div class="btm">这里我想弄一个友情链接的 如果想在这里添加友情链接 可以联系我QQ:1028227712</div>
    </div>
</div>
</body>
</html>