<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;

class MenuController extends Controller{
    public function index(){
        $name = session('username');
        if($name==''){
            $this->redirect('index/admin');
        }
        $count = D('Menu')->count();
        $Page = new \Think\Page($count,5);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('first','首页');
        $show = $Page->show();
        $list = M('menu')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('pageRes',$show);
        $this->assign('uname',$name);
        return $this->display();
    }
    public function save(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/admin');
        }
        $menuName = D('Menu')->getMenuName($_POST['name']);
        if($menuName){
            return show(0,'该功能已经完成');
        }
        $_POST['status'] = 1;
        $menu = D('Menu')->addMenu($_POST);
        if($menu){
            return show(1,'添加成功,请赶快完善功能',array('jump_url'=>'/blog/admin.php/menu/index'));
        }
        return show(0,'添加失败');
    }
    public function changeStatus(){
        $id = I('id');
        $status = I('status');
        $date['status']=0;
        if($status == 1) $date['status'] =0;
        if($status == 0) $date['status'] =1;
        $pd = D('Menu')->status($id,$date);
        $jump_url = $_SERVER['HTTP_REFERER'];
        if($pd){
            return show(1,'修改状态成功',array('jump_url'=>$jump_url));
        }else{
            return show(0,'修改失败');
        }
    }
    public function del(){
        $id = I('id');
        $pd = D('Menu')->del($id);
        $jump_url = $_SERVER['HTTP_REFERER'];
        if($pd){
            return show(1,'操作成功',array('jump_url'=>$jump_url));
        }else{
            return show(0,'删除失败,请重试');
        }
    }
    public function add(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/admin');
        }
        $this->assign('uname',$name);
        return $this->display();
    }
}
?>