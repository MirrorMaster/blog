<?php
function show($type,$message,$date=array()){
    $result = array(
        'type' => $type,
        'message' => $message,
        'date' => $date
    );
    exit(json_encode($result));
}
function getPwdMd5($password){
    return md5($password . C('MD5_PWD'));
}
function showType($type){
    $str = '';
    if($type ==1){
        $str = '超级管理员';
    }
    if($type==0){
        $str = '普通管理员';
    }
    return $str;
}
function showStatus($status){
    $str = '';
    if($status==1){
        $str = '<span class="text-success">正常</span>';
    }else{
        $str = '<span class="text-danger">停止</span>';
    }
    return $str;
}
function showKind($status,$data){
    header('Content-Type:application/json;charset=utf-8');
    if($status==0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}
function showThumb($thumb){
    if($thumb){
        return '<span style="color:red">有</span>';
    }
    return '无';
}
function isThumb($t){
    if($t){
        return $t;
    }
    return '/blog/public/image/null.png';
}
function isZan($zan){
    if($zan==1){
        return '<span style="color:red">是</span>';
    }else{
        return '否';
    }
}
?>