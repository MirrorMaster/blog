<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
    public function index(){
        if(I('username') == ''){
            return show(0,'用户名不能为空');
        }
        if(I('pwd') == ''){
            return show(0,'密码不能为空');
        }
        $date = array(
          'username' => I('username'),
            'password' => I('pwd'),
        );
            $sel = D('User')->sel($date);
            if(!$sel){
                return show(0,'登录失败,请检查后重试');
            }else if($sel[0]['status']==0){
                return show(0,'登录失败,账户被锁定','/blog/admin.php/index/admin');
            }else{
                D('User')->login(I('username'));
                session('username',I('username'));
                return show(1,'登陆成功','/blog/admin.php/index/admin');
            }
    }
    public function nset(){
        session('username',null);
        $this->redirect('Index/index');
    }
}
?>