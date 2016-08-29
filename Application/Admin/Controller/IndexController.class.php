<?php
namespace Admin\Controller;
use Org\Util\Date;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        return $this->display();
    }
    public function admin(){
        $name = session('username');
        if(!$name){
            $this->redirect('Index/index');
        }
        $essay = D('Essay')->maxCount();
        $essayCount = D('Essay')->getEssayCount();
        $loginUserCount = D('User')->getlastLoginUser();
        $c = D('Essay')->getPosition();
        $this->assign('essay',$essay);
        $this->assign('ok',$c);
        $this->assign('userCount',$loginUserCount);
        $this->assign('count',$essayCount);
        $this->assign('uname',$name);
            return $this->display();
    }
}