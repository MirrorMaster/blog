<?php
namespace Common\Model;
use Think\Model;
class ContentModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('content');
    }
    public function save($data=array()){
        if(!is_array($data) || !$data){
            return 0;
        }
        if(isset($data['content']) && $data['content']){
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->add($data);
    }
    public function bc($id,$data=array()){
        if(!is_array($data) || !$data){
            return 0;
        }
        if(isset($data['content']) && $data['content']){
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->where("id=".$id)->save($data);
    }
    public function del($id){
        return $this->_db->where('id='.$id)->delete();
    }
    public function getConById($id){
        $content =  $this->_db->where('id='.$id)->find();
        $content['content'] = htmlspecialchars_decode($content['content']);
        return $content;
    }
    public function sel(){
        return $this->_db->order('create_time desc')->select();
    }
}
?>