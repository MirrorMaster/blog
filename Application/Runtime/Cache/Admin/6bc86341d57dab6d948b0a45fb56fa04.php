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
            <span class="lead text-primary">添加文章</span>
            <form  enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-lg-2">文章标题:</label>
                    <div class="col-lg-5">
                        <input name="title" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">文章副标题:</label>
                    <div class="col-lg-5">
                        <input name="small_title" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">缩图:</label>
                    <div class="col-lg-5">
                        <input type="file" id="file_upload" multiple="true">
                        <img style="display: none" width="150" height="150" id="upload_img" />
                        <input type="hidden" name="thumb"  id="thumb" class="thumb" value="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">关键字:</label>
                    <div class="col-lg-5">
                        <select class="form-control" name="keywords">
                            <?php if(is_array($keywords)): foreach($keywords as $key=>$vo): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">描述</label>
                    <div class="col-lg-5">
                        <input name="description" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">内容</label>
                    <div class="col-lg-5">
                            <textarea name="content" id="editor" class="form-control"></textarea>
                    </div>
                </div>
                <button type="button" class="bai_ad btn btn-primary col-xs-12 col-lg-4 col-lg-push-2">添加</button>
            </form>
        </div>
    <div/>
<div/>
<script>
    var SCRIPT = {
        'ajax_upload_swf' : '/blog/Public/vendor/uploadify/uploadify.swf',
        'ajax_upload_url' : '/blog/admin.php/image/ajaxupload',
        'save_url' : '/blog/admin.php/essay/save'
    }
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor',{
            uploadJson : '/blog/admin.php/image/kindupload',
            afterBlur : function(){this.sync();}
        });
    });
</script>
<script src="/blog/Public/js/common.js"></script>
</body>
</html>