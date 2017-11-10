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

$result = sql_fetch(   "select * from g5_write_reservation where wr_id = ".$wr_id ); // 받는 사람 번호 때문에
$val_ph = sql_fetch(   "select * from g5_member where mb_no = ".$result['res_branch'] );  // 지사 번호 때문에
$pro_me = sql_fetch(   "select * from g5_write_freegift where wr_id = ".$result['wr_1'] );  

if($val == 1){
	send_sms($result['phone'],$val_ph['mb_hp'],$pro_me['wr_3']);   // 받는 사람 번호      ,       보내는 사람번호(지사 번호)      ,       내용
}else{
	sql_fetch(   "update g5_write_reservation set wr_2 = date_format(now(),'%Y-%m-%d %H:%i:%s') where wr_id = ".$wr_id );

}
goto_url('./dr_board.php?bo_table=freegift&pro_option='.$pro_option.'&res_branch='.$res_branch.'&option='.$option.'&word='.$word);

?>