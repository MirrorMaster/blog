<?php
namespace Common\Model;
use Think\Model;
class EssayModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('essay');
    }
    public function insert($date=array()){
        if(!$date || !is_array($date)){
            return false;
        }
        $date['create_time'] = time();
        $date['update_time'] = time();
        return $this->_db->where()->add($date);
    }
    public function save($id,$date=array()){
        if(!$date || !is_array($date)){
            return false;
        }
        unset($date['id']);
        $date['update_time'] = time();
        return $this->_db->where('id='.$id)->save($date);
    }
    public function count(){
        return $this->_db->where()->count();
    }
    public function del($id){
        return $this->_db->where('id='.$id)->delete();
    }
    public function getEassyById($id){
        return $this->_db->where('id='.$id)->find();
    }
    public function maxCount(){
        return $this->_db->order("count desc")->find();
    }
    public function getEssayCount(){
        return $this->_db->count();
    }
    public function selAll(){
        return $this->_db->order('create_time desc')->select();
    }
    public function selNew(){
        return $this->_db->order('create_time desc')->limit(5)->select();
    }
    public function addCount($id){
        $s = $this->_db->where('id='.$id)->find();
        $count = $s['count'] +1;
        $date = array(
          'count' => $count
        );
        return $this->_db->where('id='.$id)->save($date);
    }
    public function countByKey($key){
        if(!$key){
            return false;
        }
        return $this->_db->where('keywords="'.$key.'"')->count();
    }
    public function changeOk($id,$date=array()){
        if(!isset($id)){
            return false;
        }
        if(!is_array($date) || !$date){
            return false;
        }
        return $this->_db->where('id='.$id)->save($date);
    }
    public function positionCount($date){
        return $this->_db->where($date)->count();
    }
    public function selPosition(){
        $date = array(
            'ok' => array('neq',0)
        );
        return $this->_db->where($date)->select();
    }
    public function getPosition(){
        $date = array(
            'ok' => array('eq',1)
        );
        return $this->_db->where($date)->count();
    }
}
?>