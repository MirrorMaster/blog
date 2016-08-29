<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Think;

class EssayController extends Controller{
    public function index(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/index');
        }
        $count = D('Essay')->count();
        $Page = new \Think\Page($count,2);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('first','首页');
        $show = $Page->show();
        $list = M('Essay')->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('pageRes',$show);
        $this->assign('list',$list);
        $this->assign('uname',$name);
        return $this->display();
    }
    public function add(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/index');
        }
        $keywords = D('Key')->sel();
        $this->assign('keywords',$keywords);
        $this->assign('uname',$name);
        return $this->display();
    }
    public function save(){
        if(!$_POST){
            return show(0,'没有提交数据');
        }
        $id = D('Essay')->insert($_POST);
        $jump_url = U('essay/index');
        if($id){
            $con['content'] = $_POST['content'];
            $con['create_time'] = time();
            $content = D('Content')->save($con);
            if($content){
                return show(1,'添加成功',array('jump_url'=>$jump_url));
            }else{
                return show(0,'添加失败');
            }
        }else{
            return show(0,'添加失败,请稍后重试');
        };
    }
    public function del(){
        if(!$_POST){
            return show(0,'没有提交的数据');
        }
        $id = D('Essay')->del($_POST['id']);
        D('Content')->del($_POST['id']);
        $jump_url = $_SERVER['HTTP_REFERER'];
        if($id){
            return show(1,'删除成功',array('jump_url'=>$jump_url));
        }
        return show(0,'删除失败');
    }
    public function edit(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/index');
        }
        $id = I('id');
        $content = D('Content')->getConById($id);
        $list = D('Essay')->getEassyById($id);
        $this->assign('list',$list);
        $this->assign('uname',$name);
        $this->assign('content',$content);
        return $this->display();
    }
    public function editSave(){
        $i = $_POST['id'];
        $id = D('Essay')->save($i,$_POST);
        $jump_url = U('essay/index');
            $con['content'] = $_POST['content'];
            $content = D('Content')->bc($i,$con);
            if($content||$id){
                return show(1,'修改成功',array('jump_url'=>$jump_url));
            }else{
                return show(0,'修改失败');
            }
    }
    public function ok(){
        if(!$_GET){
            $this->redirect('essay/index');
        }
        $ok = I('ok');
        $n = '';
        if($ok==0){$n=1;}
        if($ok==1){$n=0;}
        $id = I('id');
        $date = array(
            'ok' => $n,
        );
        $cz = D('Essay')->changeOk($id,$date);
        if($cz){
            $this->redirect('essay/index');
        }
    }
    public function position(){
        $name = session('username');
        if(!$name){
            $this->redirect('index/index');
        }
        $date = array(
            'ok' => array('eq',1)
        );
        $count = D('Essay')->positionCount($date);
        $Page = new \Think\Page($count,2);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('first','首页');
        $show = $Page->show();
        $list = M('Essay')->where($date)->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('pageRes',$show);
        $this->assign('list',$list);
        $this->assign('uname',$name);
        return $this->display();
    }
}
?>