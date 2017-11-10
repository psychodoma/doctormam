<?php
include_once('./_common.php');


$count = count($_POST['chk_wr_id']);

if(!$count) {
    alert($_POST['btn_submit'].' 하실 항목을 하나 이상 선택하세요.');
}

if($_POST['btn_submit'] == '선택삭제') {
    include './dr_delete_all.php';
} else if($_POST['btn_submit'] == '선택복사') {
    $sw = 'copy';
    include './dr_move.php';
} else if($_POST['btn_submit'] == '선택이동') {
    $sw = 'move';
    include './dr_move.php';
} else if($_POST['btn_submit'] == '선택보내기') {
    //$sw = 'message';
    include './dr_message.php';
   //echo "접근";
   //exit();
} else if($_POST['btn_submit'] == '선택완료하기') {
    //$sw = 'message';
    include './dr_message_com.php';
   //echo "접근";
   //exit();
} else if($_POST['btn_submit'] == '선택문자보내기') {
    //$sw = 'message';
    include './dr_message_sms.php';
   //echo "접근";
   //exit();
} else {
    alert('올바른 방법으로 이용해 주세요.');
}
?>