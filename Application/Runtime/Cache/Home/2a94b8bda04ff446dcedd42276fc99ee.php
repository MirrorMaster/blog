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
<div class="header">
    <div class="center">
        <div class="logo"></div>
        <div class="list"><img src="/blog/Public/image/list.png"/></div>
        <ul class="keyList">
            <?php if(is_array($key)): foreach($key as $key=>$vo): ?><li><a href="/blog/index.php/index/index?keyword=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
<div class="content">
    <div id="position" class="position">
        <?php if(is_array($Position)): foreach($Position as $key=>$p): ?><div class="item">
                <img src="<?php echo (isThumb($p["thumb"])); ?>" alt="推荐位缩图">
                <span><?php echo ($p["title"]); ?></span>
            </div><?php endforeach; endif; ?>
    </div>
    <div class="essay">
        <?php if(is_array($essayAll)): foreach($essayAll as $key=>$e): ?><div class="essay_body">
                <img src="<?php echo (isThumb($e["thumb"])); ?>" alt="文章缩图" />
                <div class="essay_content">
                    <h2><?php echo ($e["title"]); ?><small><?php echo ($e["small_title"]); ?></small></h2>
                    <p><?php echo ($e["description"]); ?></p>
                </div>
                <a href="/blog/index.php/index/read?id=<?php echo ($e["id"]); ?>" class="btn btn-primary">阅读</a>
            </div><?php endforeach; endif; ?>
        <div class="page">
            <?php echo ($pageRes); ?>
        </div>
    </div>
    <div class="show">
        <ul class="new">
            <h3>最新文章</h3>
            <?php if(is_array($essayNew)): foreach($essayNew as $key=>$n): ?><li><a href="/blog/index.php/index/read?id=<?php echo ($n["id"]); ?>"><?php echo (date("Y-m-d",$n["create_time"])); ?>&nbsp;&nbsp;<?php echo ($n["title"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
        <ul class="count">
            <h3>浏览次数最多的文章</h3>
            <?php if(is_array($showCount)): foreach($showCount as $key=>$s): ?><li><a href="/blog/index.php/index/read?id=<?php echo ($s["id"]); ?>"><?php echo ($s["title"]); ?>&nbsp;&nbsp;&nbsp;共(<?php echo ($s["count"]); ?>次浏览)</a></li><?php endforeach; endif; ?>
        </ul>
        <ul class="tell">
            <h3>快来关注我吧</h3><br/>
            <li class="qq"><img src="/blog/Public/image/QQ.png"title="QQ" alt="QQ"/></li>
            <li class="qqw"><img src="/blog/Public/image/QQw.png"title="QQ" alt="QQ"/></li>
            <li class="xinl"><img src="/blog/Public/image/xinl.png"title="QQ" alt="QQ"/></li>
            <li class="email"><img src="/blog/Public/image/email.png"title="QQ" alt="QQ"/></li>
            <li class="github"><img src="/blog/Public/image/github.png"title="QQ" alt="QQ"/></li>
        </ul>
    </div>
</div>
<div class="fotter">
    <p>如果想在本站添加友情链接或广告位可以联系我 QQ:1028227712</p>
</div>
</body>
</html>