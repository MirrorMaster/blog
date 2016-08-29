<?php
namespace Common\Model;
use Think\Model;

    class UserModel extends Model{
        private $_db = '';
        public function __construct(){
            $this->_db = M('admin');
        }
        public function addUser($date=array()){
            if(!$date || !is_array($date)){
                return false;
            }
            unset($date['pwd2']);
            $date['password'] = getPwdMd5($_POST['password']);
            $date['create_time'] = time();
            return $this->_db->add($date);
        }
        public function getUser($user){
            if(!$user || !isset($user)){
                return false;
            }
            return $this->_db->where('username="'.$user.'"')->select();
        }
        public function  sel($date = array()){
            if(!$date || !is_array($date)){
                return false;
            }
            $date['password'] = getPwdMd5($date['password']);
            return $this->_db->where($date)->select();
        }
        public function showList(){
            return $this->_db->where()->select();
        }
        public function count(){
            return $this->_db->where()->count();
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
        public function status($id,$date){
            if(!$id || !is_numeric($id)){
                return false;
            }
           return  $this->_db->where('id='.$id)->save($date);
        }
        public function login($username){
            $date = array(
              'last_login_time' => time(),
                'last_login_ip' => get_client_ip(),
            );
            $this->_db->where('username="'.$username.'"')->save($date);
        }
        public function getUserById($id){
            $date = array(
                'id' => array('eq',intval($id)),
            );
            return $this->_db->where($date)->select();
        }
        public function getTypeByName($name){
            return $this->_db->where('username="'.$name.'"')->select();
        }
        public function getlastLoginUser(){
            $time = mktime(0,0,0,date('m'),date('d'),date('Y'));
            $data = array(
                'status' => array('neq',0),
                'last_login_time' => array('gt',$time)
            );
            return $this->_db->where($data)->count();
        }
    }
?>