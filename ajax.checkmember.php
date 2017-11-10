<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/json.lib.php');

/*if($error)
    die(json_encode(array('error'=>$error, 'url'=>G5_URL)));*/
$sql ="select * from g5_member where mb_name = '{$_REQUEST['wr_name']}' and mb_hp= '{$_REQUEST['phone_num']}' and mb_level < 4";
$rs = sql_fetch($sql);
if(!empty($rs)){
    $rs["result"] = "yes";
die(json_encode(array($rs)));
}else{
die(json_encode(array('result'=>'no')));
}


?>