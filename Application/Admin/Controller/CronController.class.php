<?php
namespace Admin\Controller;
use Think\Controller;
class CronController extends Controller{
    public function index(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/index');
        }
        $this->assign('uname',$name);
        return $this->display();
    }
    public function dumpmysql(){
        $shell = 'mysql -u'.C('DB_USER').' '.C('DB_NAME')." > /blog/Application/sql".date('Ymd').'.sql';
        exec($shell);
        $this->redirect('cron/index');
    }
}
?>