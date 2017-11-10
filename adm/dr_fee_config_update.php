<?php
$sub_menu = "200100";
include_once("./_common.php");

$member_type = $_REQUEST["member_type"];

$member_name = LevelToName($member_type);

$mb_id = trim($_POST['mb_id']);
auth_check($auth[$sub_menu], 'w');



$sql_common = "



					good_work_5d = '". implode("|",$_POST["good_work_5d"])."',
					good_chidren_fee = '". implode("|",$_POST["good_chidren_fee"])."',
					good_time_fee = '". implode("|",$_POST["good_time_fee"])."',
					good_work_info = '". $_POST["good_work_info"] . "',
					basic_work_5d = '". implode("|",$_POST["basic_work_5d"])."',
                 basic_work_6d = '". implode("|",$_POST["basic_work_6d"])."',
                 basic_work_info = '". $_POST["basic_work_info"] . "',
                best_work_5d = '". implode("|",$_POST["best_work_5d"])."',
                 best_work_6d = '". implode("|",$_POST["best_work_6d"])."',
                 best_work_info = '". $_POST["best_work_info"] . "',
                 best_home_5d = '". implode("|",$_POST["best_home_5d"])."',
                 best_home_6d = '". implode("|",$_POST["best_home_6d"])."',
                 best_home_info = '". $_POST["best_home_info"] . "',
                 pre_work_5d = '". implode("|",$_POST["pre_work_5d"])."',
                pre_work_6d = '". implode("|",$_POST["pre_work_6d"])."',
                pre_work_info = '". $_POST["pre_work_info"] . "',
                 pre_home_5d = '". implode("|",$_POST["pre_home_5d"])."',
                pre_home_6d = '". implode("|",$_POST["pre_home_6d"])."',
                pre_home_info = '". $_POST["pre_home_info"] . "',
                 sign_work_5d = '". implode("|",$_POST["sign_work_5d"])."',
                sign_work_6d = '". implode("|",$_POST["sign_work_6d"])."',
                sign_work_info = '". $_POST["sign_work_info"] . "',
                 sign_home_5d = '". implode("|",$_POST["sign_home_5d"])."',
                sign_home_6d = '". implode("|",$_POST["sign_home_6d"])."',
                sign_home_info = '". $_POST["sign_home_info"] . "',
                 elem_left = '". implode("|",$_POST["elem_left"])."',
                elem_right= '". implode("|",$_POST["elem_right"])."',
                elem_info = '". $_POST["elem_info"] . "',
                add_left = '". implode("|",$_POST["add_left"])."',
                add_right= '". implode("|",$_POST["add_right"])."',
                add_info = '". $_POST["add_info"] . "',
                twin_left = '". implode("|",$_POST["twin_left"])."',
                twin_right= '". implode("|",$_POST["twin_right"])."',
                twin_info = '". $_POST["twin_info"] . "',
                holi_left = '". implode("|",$_POST["holi_left"])."',
                holi_right= '". implode("|",$_POST["holi_right"])."',
                holi_info = '". $_POST["holi_info"] . "',
                milk_work_fee = '". $_POST["milk_work_fee"] . "',
                milk_work_etc = '". $_POST["milk_work_etc"] . "',
                milk_work_info = '". $_POST["milk_work_info"] . "',
                milk_home_fee = '". implode("|",$_POST["milk_home_fee"])."',
                milk_home_etc = '". $_POST["milk_home_etc"] . "',
                milk_home_info = '". $_POST["milk_home_info"] . "',
                thax_left = '". implode("|",$_POST["thax_left"])."',
                thax_right= '". implode("|",$_POST["thax_right"])."',
                thax_info = '". $_POST["thax_info"] . "'";


if ($w == 'n')
{
    sql_query(" insert into branch_fee_config set  update_date = '".G5_TIME_YMDHIS."', branch = '{$mb_id}', {$sql_common} ");

}else if($w == 'u'){

    $sql = " update branch_fee_config
                set {$sql_common}
                where branch = '{$mb_id}' ";

    sql_query($sql);
}else{
    alert('제대로 된 값이 넘어오지 않았습니다.');
}


alert('금액이 적용 되었습니다.');
goto_url('./dr_fee_config.php?member_type='.$member_type.'&amp;mb_id='.$mb_id, false);
?>