<?php
namespace Common\Model;
use Think\Model;
class MenuModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('menu');
    }
    public function addMenu($date =array()){
        if(!$date || !is_array($date)){
            return false;
        }
        return $this->_db->where()->add($date);
    }
    public function getMenuName($name){
        if(!$name){
            return false;
        }
        return $this->_db->where('"name"="'.$name.'"')->select();
    }
    public function count(){
        return $this->_db->where()->count();
    }
    public function status($id,$date){
        if(!$id || !is_numeric($id)){
            return false;
        }
        return  $this->_db->where('id='.$id)->save($date);
    }
    public function del($id){
        if(!$id || !is_numeric($id)){
            return false;
        }
        $date = array(
            'id' => array('eq',intval($id))
        );
        return $this->_db->where($date)->delete();
    }
    public function getMenuByName($type){
        if($type==''){
            $type=0;
        }
        $date = array(
            'type' => $type,
            'status' => array('neq',0),
        );
        return $this->_db->where($date)->select();
    }
    public function getMenuAll(){
        $date = array(
            'status' => array('neq',0)
        );
        return $this->_db->where($date)->select();
    }
}
?>