<?php
namespace Admin\Controller;
use Think\Controller;

class SiteController extends Controller{
    public function index(){
        $conf = D('Site')->sel();
        $name = session('username');
        if(!$name){
            $this->redirect('index/admin');
        }
        $this->assign('config',$conf);
        $this->assign('uname',$name);
        return $this->display();
    }
    public function save(){
        if(!$_POST){
            return show(0,'请检查后重试');
        }
        $name = session('username');
        if(!$name){
            $this->redirect('index/admin');
        }
        $this->assign('uname',$name);
        $jump_url = $_SERVER['HTTP_REFERER'];
        $config = D('Site')->save($_POST);
        return show(1,'配置成功',array('jump_url'=>$jump_url));
    }
}

?>