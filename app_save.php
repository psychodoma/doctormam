<?
include_once('./_common.php');
include_once(G5_SMS5_PATH.'/sms5.lib.php');
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
if(empty($_REQUEST["app_id"]))
    alert("잘못된 접속입니다.");
$sql = "select *  ,(select mb_hp from g5_member where res_branch = mb_no) mb_phonefrom g5_write_reservation where wr_id = ".$_REQUEST["app_id"];
$result = sql_fetch($sql);
if($result["signed_name"])
    alert("이미 동의하신 계약서에 동의할수없습니다.");

$date_str = "20".$_REQUEST["date_1"].$_REQUEST["date_2"]."-".$_REQUEST["date_3"]."-".$_REQUEST["date_4"];
$sql = "update g5_write_reservation set 
          signed_date= '".$date_str ."'
        , signed_name= '".$_REQUEST["name_1"]."'
        , signed_datetime= NOW()
         where wr_id = '".$_REQUEST["app_id"]."'";

    sql_query($sql);
    $sms_content = $result["wr_name"]."고객님의 계약서 동의완료";
     send_sms($result["mb_phone"],$result["mb_phone"],$sms_content,$_REQUEST["app_id"]);
alert("게약서 작성이 완료 되었습니다. ", G5_URL);
?>
