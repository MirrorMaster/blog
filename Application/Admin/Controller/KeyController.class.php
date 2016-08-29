<?php
namespace Admin\Controller;
use Org\Util\Date;
use Think\Controller;
use Think\Page;
use Think\Think;

class KeyController extends Controller{
    public function index(){
        $username = session('username');
        if(!$username){
            $this->redirect('index/admin');
        }
        $count = D('Key')->count(); //获取总数
        $Page = new \Think\Page($count,2);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('first','首页');
        $show = $Page->show();
        $list = M('key')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('pageRes',$show);
        $this->assign('list',$list);
        $this->assign('uname',$username);
        return $this->display();
    }
    public function add(){
        $username = session('username');
        if(!$username){
            $this->redirect('index/admin');
        }
        if($_POST){
            $jc = D('Key')->selByName($_POST['name']);
            if($jc) return show(0,'该关键词已存在');
            $_POST['create_time'] = time();
            $_POST['create_name']= $username;
            $save =  D('key')->add($_POST);
            if($save ==false){
                return show(0,'添加失败');
            }
            return show(1,'添加成功',array('jump_url'=>'/blog/admin.php/key/index'));
        }
        $this->assign('uname',$username);
        return $this->display();
    }
    public function del(){
        if(!$_POST){
            return show(0,'没有提交的数据');
        }
        $id = D('Key')->del($_POST['id']);
        $jump_url = $_SERVER['HTTP_REFERER'];
        if($id){
            return show(1,'删除成功',array('jump_url'=>$jump_url));
        }
        return show(0,'删除失败');
    }
    public function changeStatus(){
        $id = I('id');
        $status = I('status');
        $date['status']=0;
        if($status == 1) $date['status'] =0;
        if($status == 0) $date['status'] =1;
        $pd = D('Key')->status($id,$date);
        $jump_url = $_SERVER['HTTP_REFERER'];
        if($pd){
            return show(1,'修改状态成功',array('jump_url'=>$jump_url));
        }else{
            return show(0,'修改失败');
        }
    }
}
?>