<?php
namespace Common\Model;
use Think\Model;

class SiteModel extends Model{
    public function __construct(){

    }
    public function save($data = array()){
        if(!$data){
            throw_exception('没有提交的数据');
        }
        return F('web_site_config',$data);
    }
    public function sel(){
        return F('web_site_config');
    }
}
?>