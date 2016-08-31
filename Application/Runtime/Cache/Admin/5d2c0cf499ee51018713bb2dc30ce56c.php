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
    <span class="lead text-primary">推荐位管理</span>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>文章名</th>
                <th>副标题</th>
                <th>缩图</th>
                <th>关键字</th>
                <th>描述</th>
                <th>推荐位</th>
                <th>创建时间</th>
                <th>修改时间</th>
                <th>总浏览量</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["title"]); ?></td>
                    <td><?php echo ($vo["small_title"]); ?></td>
                    <td><?php echo (showThumb($vo["thumb"])); ?></td>
                    <td><?php echo ($vo["keywords"]); ?></td>
                    <td><?php echo ($vo["description"]); ?></td>
                    <td><a style="cursor: pointer;" href="/blog/admin.php/essay/ok?id=<?php echo ($vo["id"]); ?>&ok=<?php echo ($vo["ok"]); ?>"><span style="color:#000000"><?php echo (isZan($vo["ok"])); ?></span></a></td>
                    <td><?php echo (date('Y-m-d H:i',$vo["create_time"])); ?></td>
                    <td><?php echo (date('Y-m-d H:i',$vo["update_time"])); ?></td>
                    <td><?php echo ($vo["count"]); ?></td>
                    <td>
                        <a style="cursor: pointer;"  title="删除" href="/blog/admin.php/essay/ok?id=<?php echo ($vo["id"]); ?>&ok=<?php echo ($vo["ok"]); ?>">><span style="color: #000;" class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <div class="page">
        <?php echo ($pageRes); ?>
    </div>
</div>
<div/>
<div/>
<script src="/blog/Public/js/common.js"></script>
</body>
</html>