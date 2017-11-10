<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/json.lib.php');

/*if($error)
    die(json_encode(array('error'=>$error, 'url'=>G5_URL)));*/
$sql_str = get_location($_REQUEST['val']);

$sql ="select * from g5_member where (mb_level = '7' or mb_level = '9') and mb_no !='2' and ({$sql_str})  order by mb_level desc, mb_nick asc";
$result = sql_query($sql);
$rs = array();
if(!empty($result)){
    $i = 0;
    while($row = sql_fetch_array($result)){
        $i++;
        array_push($rs,$row);
        //$rs["asdf"] = $row["mb_id"];
    }
    $rs["result"] = "yes";
    $rs["length"] = $i;
    $rs["sql"] = $sql;
    die(json_encode($rs));
}else{
die(json_encode(array('result'=>'no','sql',$sql_str)));
}


?>