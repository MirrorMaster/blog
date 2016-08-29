<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" value="<?php echo ($zd["keywords"]); ?>" />
    <meta name="description" value="<?php echo ($zd["description"]); ?>" />
    <title><?php echo ($zd["title"]); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/blog/Public/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/blog/Public/css/read.css"/>
    <script src="/blog/Public/vendor/jquery.min.js"></script>
    <script src="/blog/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/blog/Public/js/blog.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="header col-xs-12 col-lg-12">
            <a href="/blog/index.php/index/blog"><img alt="logo" class="logo" src="/blog/Public/image/logo.png"/></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <h1><?php echo ($essay['title']); ?><small><?php echo ($essay['small_title']); ?></small></h1>
            <p>
                创建时间:&nbsp;&nbsp;&nbsp;<?php echo (date('Y-m-d H:i',$essay['create_time'])); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="glyphicon glyphicon-eye-open"></span>总浏览量:&nbsp;&nbsp;<?php echo ($essay['count']); ?>次
            </p>
            <div class="content">
                <?php echo ($content['content']); ?>
            </div>
            <!-- Duoshuo Comment BEGIN -->
            <div class="ds-thread"></div>
            <script type="text/javascript">
                var duoshuoQuery = {short_name:"w3note"};
                (function() {
                    var ds = document.createElement('script');
                    ds.type = 'text/javascript';ds.async = true;
                    ds.src = 'http://static.duoshuo.com/embed.js';
                    ds.charset = 'UTF-8';
                    (document.getElementsByTagName('head')[0]
                    || document.getElementsByTagName('body')[0]).appendChild(ds);
                })();
            </script>
            <!-- Duoshuo Comment END -->
        </div>
        <div class="col-lg-2 about">
            <div class="aboutMy text-center">
                <p>关于作者</p>
                一个很菜的码农~ :-D <br>
                如果有想交朋友 可以加我的QQ<br>
                <span class="lead text-danger">1028227712</span>
            </div>
            <div class="gg text-center">
                <h4>↑</h4>
                这个地方准备放广告位!<br>
                有意者也可以来联系我
            </div>
        </div>
    </div>
</div>
</body>
</html>