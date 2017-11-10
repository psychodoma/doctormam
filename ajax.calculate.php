<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/json.lib.php');

/*if($error)
    die(json_encode(array('error'=>$error, 'url'=>G5_URL)));*/
$mb_info = get_branch($_REQUEST["val0"],"mb_id");
$sql ="select * from branch_fee_config where branch= '".$mb_info."' ";
$result = sql_fetch($sql);
$val1 = $_REQUEST["val1"];
$db_col = "";
$service_type = "";
$service_genre = "";
if($val1 == "1"){
    $db_col .= "good_";
    $service_type = "0";
}else if($val1 == "2"){
    $db_col .= "best_";
    $service_type = "1";
}else if($val1 == "3"){
    $db_col .= "pre_";
    $service_type = "2";
}else if($val1 == "4"){
    $db_col .= "sign_";
    $service_type = "3";
}
if($val2 == "1"){
    $db_col .= "home_";
    $service_genre = "_right";
}else if($val2 == "2"){
    $db_col .= "work_";
    $service_genre = "_left";
}
if($val3 == "1"){
    $db_col .= "5d";
    $days = 5;
}else if($val3 == "2"){
    $db_col .= "6d";
    $days = 5;
}
//근무 일 계산
$days = (($_REQUEST["val4"]+1) * $days);



if(empty($result[$db_col])) {
    $sql ="select * from branch_fee_config where branch= 'drmamhead' ";
    $result = sql_fetch($sql);
}

//취학아동
$val5_arr = explode("|",$result["elem".$service_genre]);
$val5 = (str_replace(",","",$val5_arr[0] )* $_REQUEST["val5"]) * $days ;

//미취학아동
$val6_arr = explode("|",$result["elem".$service_genre]);
$val6 = (str_replace(",","",$val6_arr[2] )* $_REQUEST["val6"]) * $days ;

//휴일 추가 시간
$val7_arr = explode("|",$result["holi".$service_genre]);
$val7 = str_replace(",","",$val7_arr[$service_type] )* $_REQUEST["val7"] ;

//명절 추가
$val8_arr = explode("|",$result["thax".$service_genre]);
$val8 = str_replace(",","",$val8_arr[$service_type] )* $_REQUEST["val8"] ;

//쌍둥이 추가
$val9_arr = explode("|",$result["twin".$service_genre]);
$val9 = str_replace(",","",$val9_arr[$service_type] )* $_REQUEST["val9"] ;

//기타 가족 추가
$val10_arr = explode("|",($result["elem".$service_genre]));
$val10 = (str_replace(",","",$val10_arr[3] )* $_REQUEST["val10"]) * $days ;

//시간 추가
$add_time = 0;
if($_REQUEST["val11"] == "1" || $_REQUEST["val11"] == "2" || $_REQUEST["val11"] == "3" || $_REQUEST["val11"] == "4"){
    $service_genre = "_left";
    $add_time = $_REQUEST["val11"];
}else if($_REQUEST["val11"] == "5" || $_REQUEST["val11"] == "6" || $_REQUEST["val11"] == "7" || $_REQUEST["val11"] == "8"){
    $service_genre = "_right";
    $add_time = ($_REQUEST["val11"] - 4);
}else{
    $add_time = 0;
}
$val11_arr = explode("|",$result["add".$service_genre]);
$val11 = (str_replace(",","",$val11_arr[$service_type] ) * $add_time) * $days;


$amount_arr = explode("|",$result[$db_col]);
$amount = $amount_arr[$_REQUEST["val4"]];
$total_amount = str_replace(",","",$amount);

$total_amount += $val5 + $val6 + $val7 + $val8 + $val9 + $val10 + $val11;

/*for($i=5;$i < 12;$i++){
    $total_amount += $_REQUEST["val".$i];
}*/

die(json_encode(array('total_amount'=>$total_amount, "days" =>$days, "val5"=>$val5, "val6"=>$val6, "val7"=>$val7, "val8"=>$val8, "val9"=>$val9, "val10"=>$val10, "val11"=>$val11)));
/*
$rs = array();
if(!empty($result)){
      die(json_encode($rs));
}else{
die(json_encode(array('result'=>'no','sql',$sql_str)));
}*/


?>