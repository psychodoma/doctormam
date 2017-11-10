<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/naver_syndi.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_SMS5_PATH.'/sms5.lib.php');
$g5['title'] = '게시글 저장';
function send_sms($wr_send_list,$wr_reply,$wr_message){
        global $g5;
     // 문의글 등록시 관리자에게 전송
      $send_hp_mb = $wr_reply; // 보내는 전화번호
      $recv_hp_mb = $wr_send_list; //  받는 전화번호

      $send_hp = str_replace("-","",$send_hp_mb); // - 제거
      $recv_hp = str_replace("-","",$recv_hp_mb); // - 제거
      $send_number = "$send_hp";
      $recv_number[] = "$recv_hp";

      $sms_content = $wr_message;  // 문자 내용
        $config = sql_fetch(" select * from {$g5['config_table']} ");
        $port_setting = get_icode_port_type($config['cf_icode_id'], $config['cf_icode_pw']);

        $SMS = new SMS5; // SMS 연결
        $SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $port_setting);
        $SMS->Add($recv_number, $send_number,$config['cf_title'],'','',$sms_content, '',1);

    $result=$SMS->Send();
     // 문자보내기 끝
}

$val = sql_query(   "select * from g5_write_promotion where pro_100_d_ck = DATE_ADD(curdate(), INTERVAL 1 DAY) and pro_type = 1 and pro_send_date is null" );

for ($i=0; $row=sql_fetch_array($val); $i++){
	$val_ph = sql_fetch(   "select * from g5_member where mb_no = ".$row['res_branch'] );
    $pro_message =  sql_fetch(   "select pro_message_100 from g5_promotion_message where me_id = 1" );
    $pro_me = $pro_message['pro_message_100'];

	$pro_me = str_replace('[name]',$row['wr_name'],$pro_me);
	send_sms($row['phone'],$val_ph['mb_hp'],$pro_me);   // 받는 사람 번호      ,       보내는 사람번호(지사 번호)      ,       내용
    //send_sms($row['phone'],'010-67493133',$pro_me);   // 받는 사람 번호      ,       보내는 사람번호(지사 번호)      ,       내용
	sql_query(   "update g5_write_promotion set pro_send_date = NOW() where wr_id = ".$row['wr_id']    );
}


$val1 = sql_query(   "select * from g5_write_promotion where pro_1_y_ck = DATE_ADD(curdate(), INTERVAL 1 DAY) and pro_type = 2 and pro_send_date is null" );


for ($i=0; $row=sql_fetch_array($val1); $i++){
	$val_ph = sql_fetch(   "select * from g5_member where mb_no = ".$row['res_branch'] );
    $pro_message =  sql_fetch(   "select pro_message_1 from g5_promotion_message where me_id = 1" );
    $pro_me = $pro_message['pro_message_1'];

	$pro_me = str_replace('[name]',$row['wr_name'],$pro_me);
	send_sms($row['phone'],$val_ph['mb_hp'],$pro_me);   // 받는 사람 번호      ,       보내는 사람번호(지사 번호)      ,       내용
    //send_sms($row['phone'],'010-6749-3133',$pro_me);   // 받는 사람 번호      ,       보내는 사람번호(지사 번호)      ,       내용
	sql_query(   "update g5_write_promotion set pro_send_date = NOW() where wr_id = ".$row['wr_id']    );
}

?>