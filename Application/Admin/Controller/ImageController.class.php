<?php
namespace Admin\Controller;
use Think\Controller;

class ImageController extends Controller{
    public function ajaxupload(){
        $upload = D('UploadImage');
        $res = $upload->imageUpload();
        if($res===false){
            return show(0,'上传失败','');
        }else{
            return show(1,'上传成功',$res);
        }
    }
    public function kindupload(){
        $upload = D('UploadImage');
        $res = $upload->upload();
        if(res === false){
            return showKind(1,'上传失败');
        }
        return showKind(0,$res);
    }
}
?>