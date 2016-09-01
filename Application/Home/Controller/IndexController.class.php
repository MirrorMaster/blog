<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function blog(){
        $zd = D('Site')->sel();
        $this->assign('zd',$zd);
        return $this->display();
    }
    public function index($type=''){
        if($_GET['keyword']){
            $key = $_GET['keyword'];
        }
        $zd = D('Site')->sel();
        $KeyList = D('Key')->sel();
        if($key){
            $count = D('Essay')->countByKey($key);
        }else{
            $count = D('Essay')->count();
        }
        $Page = new \Think\Page($count,5);
        $Page->setConfig('last','尾页');
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show = $Page->show();
        if(!$key){
            $essay = M('Essay')->order('create_time desc')->limit($Page->firstRow .','.$Page->listRows)->select();
        }else{
            $essay = M('Essay')->where('keywords="'.$key.'"')->order('create_time desc')->limit($Page->firstRow .','.$Page->listRows)->select();
        }
        $Position = D('Essay')->selPosition();
        $essayNew = D('Essay')->selNew();
        $showCount = D('Essay')->showCount();
        $this->assign('Position',$Position);
        $this->assign('key',$KeyList);
        $this->assign('zd',$zd);
        $this->assign('showCount',$showCount);
        $this->assign('pageRes',$show);
        $this->assign('essayAll',$essay);
        $this->assign('essayNew',$essayNew);
        if($type=='buildHtml'){
            $this->buildHtml('index',HTML_PATH,'Index/blog');
        }else{
            return $this->display();
        }
    }
    public function read(){
        if(!$_GET){
            return $this->redirect('index/blog');
        }
        $id = $_GET['id'];
        $zd = D('Site')->sel();
        D('Essay')->addCount($id);
        $essay = D('Essay')->getEassyById($id);
        $content = D('Content')->getConById($id);
        $KeyList = D('Key')->sel();
        $this->assign('key',$KeyList);
        $this->assign('content',$content);
        $this->assign('essay',$essay);
        $this->assign('zd',$zd);
        return $this->display();
    }

    public function build_htlm(){
        $this->blog('buildHtml');
    }
}