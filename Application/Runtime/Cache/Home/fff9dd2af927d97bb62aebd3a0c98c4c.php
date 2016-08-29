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
    <link rel="stylesheet" href="/blog/Public/vendor/owl/owl.carousel.css"/>
    <link rel="stylesheet" href="/blog/Public/vendor/owl/owl.theme.css"/>
    <link rel="stylesheet" href="/blog/Public/css/blog.css"/>
    <script src="/blog/Public/vendor/jquery.min.js"></script>
    <script src="/blog/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/blog/Public/vendor/owl/owl.carousel.min.js"></script>
    <script src="/blog/Public/js/blog.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="header col-xs-12 col-lg-12">
            <a href="/blog/index.php/index/index"><img alt="logo" class="logo" src="/blog/Public/image/logo.png"/></a>
            <img class="listPng" src="/blog/Public/image/list.png">
            <ul class="list-inline keyList">
                <?php if(is_array($key)): foreach($key as $key=>$vo): ?><li><a href="/blog/index.php/index/blog?keyword=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-2 user">
            <div class="userCon">
                <img src="/blog/Public/image/p.jpg"/>
                <p>游客</p>
            </div>
            <div class="essayList">
                <span class="lead">←最新文章</span>
                <ul class="list-unstyled">
                    <?php if(is_array($essayNew)): foreach($essayNew as $key=>$eN): ?><li><a href="/blog/index.php/index/read?id=<?php echo ($eN["id"]); ?>"><?php echo (date('Y-m-d',$eN["create_time"])); ?>&nbsp;&nbsp;《<?php echo ($eN["title"]); ?>》</a></li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="tq">
                <iframe allowtransparency="true" frameborder="0" width="317" height="28" scrolling="no" src="http://tianqi.2345.com/plugin/widget/index.htm?s=3&z=1&t=1&v=0&d=1&bd=0&k=&f=&q=1&e=1&a=1&c=54511&w=317&h=28&align=center"></iframe>
            </div>
        </div>
        <div class="essay col-md-10 col-lg-9 col-sm-12">
            <div id="owl-demo" class="banner">
              <?php if(is_array($Position)): foreach($Position as $key=>$z): ?><div class="item">
                      <img src="<?php echo (isThumb($z["thumb"])); ?>" />
                      <a href="/blog/index.php/index/read?id=<?php echo ($z["id"]); ?>"><span class="lb_title"><?php echo ($z["title"]); ?></span></a>
                  </div><?php endforeach; endif; ?>
            </div>
            <?php if(is_array($essayAll)): foreach($essayAll as $key=>$eA): ?><div class="items">
                    <div class="item_image">
                        <img alt="这是文章缩图" src="<?php echo (isThumb($eA["thumb"])); ?>">
                    </div>
                    <div class="item_body">
                        <a href="/blog/index.php/index/read?id=<?php echo ($eA["id"]); ?>"><h2 class="item_title"><?php echo ($eA["title"]); ?><small class="item_small"><?php echo ($eA["small_title"]); ?></small></h2></a>
                        <p class="item_jj"><?php echo ($eA["description"]); ?></p>
                        <a href="/blog/index.php/index/read?id=<?php echo ($eA["id"]); ?>" type="button" class="r btn btn-primary">阅读</a>
                    </div>
                </div><?php endforeach; endif; ?>
            <div class="page">
                <?php echo ($pageRes); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>