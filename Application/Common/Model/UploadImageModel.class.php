<?php
namespace Common\Model;
use Think\Model;
class UploadImageModel extends Model{
    private $_uploadObj = '';
    private $_uploadImageData = '';
    const UPLOAD = 'upload';
    public function __construct(){
        $this->_uploadObj = new \Think\Upload();
        $this->_uploadObj->rootPath ='./'.self::UPLOAD.'/';
        $this->_uploadObj->subName = date(Y).'/'.date(m).'/'.date(d);
    }
    public function imageUpload(){
        $res = $this->_uploadObj->upload();
        if($res){
            return '/blog/' .self::UPLOAD . '/'  . $res['file']['savepath'] . $res['file']['savename'];
        }else{
            return false;
        }
    }
    public function upload() {
        $res = $this->_uploadObj->upload();

        if($res) {
            return '/blog/' .self::UPLOAD . '/' . $res['imgFile']['savepath'] . $res['imgFile']['savename'];
        }else{
            return false;
        }
    }
}
?>