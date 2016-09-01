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

<div class="col-lg-11 content">
    <span class="text-primary lead">后台菜单管理</span>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>控制器</th>
                <th>方法</th>
                <th>状态</th>
                <th>需要权限</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["c"]); ?></td>
                    <td><?php echo ($vo["f"]); ?></td>
                    <td><a style="cursor: pointer;" class="changeStatus" title="更改状态" data-status=<?php echo ($vo["status"]); ?> data-cId=<?php echo ($vo["id"]); ?>><?php echo (showStatus($vo["status"])); ?></a></td>
                    <td><?php echo (showType($vo["type"])); ?></td>
                    <td><a style="cursor: pointer;" class="del" title="删除" data-id = <?php echo ($vo["id"]); ?>><span style="color: #000;" class="glyphicon glyphicon-remove"></span></a>&nbsp;</td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div class="page">
        <?php echo ($pageRes); ?>
    </div>
    <a href="/blog/admin.php/menu/add" class="btn btn-primary">添加功能</a>
</div>
</div>
</div>
<script>
    var SCRIPT = {
        'delete_url' : '/blog/admin.php/menu/del',
        'status_url' : '/blog/admin.php/menu/changeStatus'
    }
</script>
<script src="/blog/Public/js/common.js"></script>
</body>
</html>