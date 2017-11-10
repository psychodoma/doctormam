<?
include_once('./_common.php');

if(empty($_REQUEST["app_id"]))
    alert("잘못된 접속입니다.");
$sql = "select app_key from question where app_key = ".$_REQUEST["app_id"];
$result = sql_fetch($sql);

if($result["app_key"])
    alert("이미 참여하신 설문에 다시 참여 할수 없습니다.");



$sql = "insert into question set app_key = '".$_REQUEST["app_id"]."'
        , service_area= '".$_REQUEST["service_area"]."'
        , customer_name= '".$_REQUEST["customer_name"]."'
        , service_type= '".$_REQUEST["service_type"]."'
        , service_grade= '".$_REQUEST["service_grade"]."'
        , qs_5= '".$_REQUEST["qs_5"]."'
        , qs_5_txt= '".$_REQUEST["qs_5_txt"]."'
        , qs_6= '".$_REQUEST["qs_6"]."'
        , qs_6_txt= '".$_REQUEST["qs_6_txt"]."'
        , qs_7= '".$_REQUEST["qs_7"]."'
        , qs_7_txt= '".$_REQUEST["qs_7_txt"]."'
        , qs_8= '".$_REQUEST["qs_8"]."'
        , qs_8_txt= '".$_REQUEST["qs_8_txt"]."'
        , qs_9= '".$_REQUEST["qs_9"]."'
        , qs_9_txt= '".$_REQUEST["qs_9_txt"]."'
        , qs_10= '".$_REQUEST["qs_10"]."'
        , qs_10_txt= '".$_REQUEST["qs_10_txt"]."'
        , qs_11= '".$_REQUEST["qs_11"]."'
        , qs_12= '".$_REQUEST["qs_12"]."'
        , qs_12_txt= '".$_REQUEST["qs_12_txt"]."'
        , qs_13_txt= '".$_REQUEST["qs_13_txt"]."'
        , create_date = NOW()
        , ip_address = '".$_SERVER["REMOTE_ADDR"]."'
        ";
//print_r($sql);
//exit();
sql_query($sql);

//insert into question set app_key = '1116' , service_area= '성남 분당 광주점' , customer_name= '안지윤' , service_type= '출퇴근 ' , service_grade= '프리미엄' , qs_5= '4' , qs_5_txt= '5번텍스트' , qs_6= '3' , qs_6_txt= '6번텍스트' , qs_7= '2' , qs_7_txt= '7번텍스트' , qs_8= '5' , qs_8_txt= '8번텍스트' , qs_9= '3' , qs_9_txt= '9번텍스트' , qs_10= '1' , qs_10_txt= '1' , qs_11= '3' , qs_12= '1' , qs_12_txt= '1' , qs_13_txt= '13번 내용 텍스트' , create_date = NOW() , ip_address = '210.96.212.116'

alert("설문에 응답해 주셔서 감사합니다. \\n추후 이벤트에 적극 반영하겠습니다.", G5_URL);
?>
