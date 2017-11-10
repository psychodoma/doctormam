<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/naver_syndi.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
//echo "update g5_promotion_message set pro_message_100 = '{$_REQUEST["editor1"]}' where me_id = 1";
//exit();

if($_REQUEST["pro_type"] == 'all_m'){
    sql_query(    "update g5_promotion_message set pro_message_100 = '{$_REQUEST["editor1"]}' where me_id = 1"  );
}else if($_REQUEST["pro_type"] == 'pro_100_d_m'){
    sql_query(    "update g5_promotion_message set pro_message_1 = '{$_REQUEST["editor2"]}' where me_id = 1"  );
}else if($_REQUEST["pro_type"] == 'pro_1_y_m'){
    sql_query(    "update g5_promotion_message set pro_message_event = '{$_REQUEST["editor3"]}' where me_id = 1"  );
}

//goto_url('/adm/promotion_message.php');
goto_url('./dr_board.php?bo_table=promotion&pro_option=all&res_branch='.$res_branch.'&day='.$day.'&option='.$option.'&word='.$word.'&pro_option_m='.$pro_option_m);
?>

