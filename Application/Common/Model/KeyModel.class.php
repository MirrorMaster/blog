<?php
namespace Common\Model;
use Think\Model;
class KeyModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('key');
    }
    public function add($date =array()){
        if(!$date || !is_array($date)){
            return false;
        }
        return $this->_db->add($date);
    }
    public function selByName($name){
        return $this->_db->where('"name=""'.$name.'"')->select();
    }
    public function count(){
        return $this->_db->where()->count();
    }
    public function del($id){
        return $this->_db->where('id='.$id)->delete();
    }
    public function status($id,$date){
        if(!$id || !is_numeric($id)){
            return false;
        }
        return  $this->_db->where('id='.$id)->save($date);
    }
    public function sel(){
        $date = array(
            'status' => array('neq',0)
        );
        return $this->_db->where($date)->select();
    }
}
?>