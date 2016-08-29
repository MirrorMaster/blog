<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller{
    public function index(){
        return $this->display();
    }
    public function add(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/admin');
        }
        if($_POST){
            $this->save();
        }else{
            $this->assign('uname',$name);
            return $this->display();
        }
    }
    public function save(){
        if($_POST){
            $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
            $email = $_POST['email'];
            if ( preg_match( $pattern, $email) == false){
                return show(0,'邮箱格式不正确');
            }
            $username = D('User')->getUser($_POST['username']);
            if($_POST['password'] != $_POST['pwd2']){
                return show(0,'密码不一致');
            }
            if($username){
                return show(0,'用户已存在,请更改后重试');
            }
            $user = D('User')->addUser($_POST);
            $jump_url = '/blog/admin.php/user/sel';
            if($user){
                return show(1,'新增成功',array('jump_url'=>$jump_url));
            }else{
                return show(0,'新增失败,请检查后重试');
            }
        }else{
            $this->redirect('user/add');
        }
    }
    public function sel(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/admin');
        }
        $count = D('User')->count();
        $Page = new \Think\Page($count,3);
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('first','首页');
        $show = $Page->show();
        $lii = M('admin')->limit($Page->firstRow.','.$Page->listRows)->select();
         $this->assign('page',$lii);
        $this->assign('pageRes',$show);
        $this->assign('uname',$name);
        return $this->display();
    }
    public function del(){
        $id = I('id');
        $pd = D('User')->del($id);
        $jump_url = $_SERVER['HTTP_REFERER'];
        if($pd){
            return show(1,'操作成功',array('jump_url'=>$jump_url));
        }else{
            return show(0,'删除失败,请重试');
        }
    }
    public function changeStatus(){
        $id = I('id');
        $status = I('status');
        $date['status']=0;
        if($status == 1) $date['status'] =0;
        if($status == 0) $date['status'] =1;
        $pd = D('User')->status($id,$date);
        $jump_url = $_SERVER['HTTP_REFERER'];
        if($pd){
            return show(1,'修改状态成功',array('jump_url'=>$jump_url));
        }else{
            return show(0,'修改失败');
        }
    }
}
?>