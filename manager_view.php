<?
include_once('./_common.php');
$mb = get_member($mb_id);
$mb_edu_type_arr = explode(",",$mb['mb_edu_type']);
$mb_edu_host_arr = explode(",",$mb['mb_edu_host']);
$mb_edu_date_arr = explode(",",$mb['mb_edu_date']);
$mb_edu_num_arr = explode(",",$mb['mb_edu_num']);
$mb_helth_item_arr = explode(",",$mb['mb_helth_item']);
$mb_helth_result_arr = explode(",",$mb['mb_helth_result']);
$file = get_file("member", $mb["mb_no"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Author" content=""/>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
    <title><?php echo $g5_head_title; ?></title>
    <link rel="stylesheet" href="<?php echo G5_ADMIN_URL?>/css/admin.css">;
</head>
<body>
    <div class="card_div" id="print_area">
        <div class="card_title"><img src="/img/main/logo.jpg"> 산후관리사 카드</div>
        <table class="card_table">
            <tr>
                <td rowspan="4" colspan="2" class="photo_td">
                    <?php
                    $mb_dir = substr($mb['mb_id'],0,2);
                    $icon_file = G5_DATA_PATH.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
                    if (file_exists($icon_file)) {
                        $icon_url = G5_DATA_URL.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
                        echo '<img src="'.$icon_url.'" alt="" style="width:150px;height:160px;">';
                       }
                    ?>
                 </td>
                <th>성  명</th>
                <th>생년월일</th>
                <th>입사일 ~ 퇴사일</th>
                <th>연락처</th>
            </tr>
            <tr>
                <td><input type="text" name="mb_nick" value="<?php echo $mb['mb_nick'] ?>" id="mb_nick" required class="manager_frm_input" size="15" minlength="2" maxlength="10" readonly></td>
                <td><input type="text" name="mb_age" value="<?php /*echo $mb['mb_age'] */?>**" id="mb_age" class="manager_frm_input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' size="15" minlength="2" maxlength="10" readonly></td>
                <td>
					<input type="text" name="mb_join" value="<?php /*echo $mb['mb_join'] */?>****" id="mb_join" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20">
					<label for="~">~</label>
					<input type="text" name="mb_leave_date" value="<?php /*echo $mb['mb_leave_date'] */?>****" id="mb_leave_date" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20">
				</td>
                <td><input type="text" name="mb_hp" value="<?php echo substr($mb['mb_hp'],0,9) ?>****" id="mb_hp" required class="manager_frm_input" size="15" minlength="2" maxlength="20" readonly ></td>
            </tr>
            <tr>
                <th>거주지역</th>
                <th>건강검진</th>
                <th colspan="2">배상책임보험</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="mb_addr1" value="<?php echo $mb['mb_addr1'] ?>" id="mb_addr1" class="manager_frm_input readonly" readonly size="15" onclick="win_zip('fmember', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">
                    <input type="hidden" name="mb_zip" value="<?php echo $mb['mb_zip1'].$mb['mb_zip2']; ?>" id="mb_zip" class="frm_input readonly" size="5" maxlength="6" readonly>
                    <input type="hidden" name="mb_addr2" value="<?php echo $mb['mb_addr2'] ?>" id="mb_addr2" class="frm_input" size="60" readonly>
                    <input type="hidden" name="mb_addr3" value="<?php echo $mb['mb_addr3'] ?>" id="mb_addr3" class="frm_input" size="60" readonly>
                    <input type="hidden" name="mb_addr_jibeon" value="<?php echo $mb['mb_addr_jibeon']; ?>"><br>
                </td>
                <td><input type="text" name="mb_helth_date" value="<?php echo $mb['mb_helth_date'] ?>" id="mb_helth_date" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20"readonly ></td>
                <td colspan="2">
                    <input type="text" name="mb_insurance_start" value="<?php echo $mb['mb_insurance_start'] ?>" id="mb_insurance_start" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20"><label for="~">~</label>
                    <input type="text" name="mb_insurance_end" value="<?php echo $mb['mb_insurance_end'] ?>" id="mb_insurance_end" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20" >
                </td>
            </tr>
            <tr>
                <th rowspan="7" style="width:120px;">교육수료내용</th>
                <th></th>
                <th>과정별</th>
                <th>교육주체</th>
                <th>수료일자</th>
                <th>수료번호</th>
            </tr>
            <tr>
                <td>1.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[0] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10"readonly ></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[0] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[0] ?>" id="mb_edu_date1" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" readonly ></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[0] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td>2.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[1] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[1] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[1] ?>" id="mb_edu_date2" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" ></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[1] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td>3.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[2] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[2] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[2] ?>" id="mb_edu_date3" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" ></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[2] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td>4.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[3] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[3] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[3] ?>" id="mb_edu_date4" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" ></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[3] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td>5.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[4] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[4] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[4] ?>" id="mb_edu_date5" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" ></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[4] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td>6.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[5] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[5] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[5] ?>" id="mb_edu_date6" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" ></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[5] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <th rowspan="6">건강검진내역</th>
                <th colspan="2">검사항목</th>
                <th>결과</th>
                <td colspan="2" rowspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[0] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[0] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[1] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[1] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[2] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[2] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[3] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[3] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[4] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" readonly></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[4] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" readonly></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:center;">
                    위의 내용은 사실임을 증명합니다.</br>
                    닥터맘 지사장
                </td>

            </tr>
        </table>
          <table class="card_table">

        <?php for ($i=0; $i<$file["count"]; $i++) { ?>
        <tr>
            <th scope="row">첨부파일 #<?php echo $i+1 ?></th>
            <td>
                <?php if($file[$i]['file']) { ?>
                <!--<a href="<?php /*echo G5_BBS_URL*/?>/download.php?bo_table=member&wr_id=<?php /*echo $mb["mb_no"]*/?>"><?php /*echo $file[$i]['source'].'('.$file[$i]['size'].')';  */?>다운로드</a><input type="checkbox" id="bf_file_del<?php /*echo $i */?>" name="bf_file_del[<?php /*echo $i;  */?>]" value="1"> <label for="bf_file_del<?php /*echo $i */?>"> 파일 삭제</label>-->
                    <a href="<?php echo $file[$i]['path'] ?>/<?php echo $file[$i]['file'] ?>" target="_blank"><?php echo $file[$i]['source'];  ?></a>
                <?php }else{ ?>
                    없음
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        </table>
    </div>
    <div class="btn_confirm01 btn_confirm">
        <a href="/">닥터맘 홈으로</a>
        <a href="javascript:pageprint()">인쇄</a>
    </div>
    <script>
        var initBody;
        function beforePrint()
        {
            initBody = document.body.innerHTML;
            document.body.innerHTML = print_area.innerHTML;
        }

        function afterPrint()
        {
            document.body.innerHTML = initBody;
        }

        function pageprint()
        {
            window.onbeforeprint = beforePrint;
            window.onafterprint = afterPrint;
            window.print();
        }
    </script>
</body>
</html>