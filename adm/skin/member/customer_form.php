<?
if(empty($mb['mb_id'])){
    $mb['mb_id'] = date("YmdHis",time()) ;
}
$password = $mb['mb_id'];
?>
<script>
    $( function() {
        $( "#mb_birth" ).datepicker({
            showOn: "button",
            buttonImage: g5_url+"/img/calendar.gif",
            buttonImageOnly: true,
            buttonText: "Select date",
            dateFormat: 'yy-mm-dd',
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            showMonthAfterYear: true,
            changeYear: true,
            changeMonth: true,
            yearSuffix: '년'
        });
    });
</script>
<form name="fmember" id="fmember" action="./dr_member_form_update.php" onsubmit="return fmember_submit(this);" method="post" enctype="multipart/form-data">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="">
    <input type="hidden" name="member_type" value="<?php echo $member_type ?>">
    <input type="hidden" name="mb_open" value="1" id="mb_open_yes">
    <input type="hidden" name="mb_hp" value="">

    <span style="display:none;"><?php echo get_member_level_select('mb_level', 1, $member['mb_level'], $member_type) ?></span>

    <div class="tbl_frm01 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?></caption>
            <colgroup>
                <col class="grid_4">
                <col>
            </colgroup>
            <tbody>

            <tr style="display:none;">
                <th scope="row"><label for="mb_id">아이디<?php echo $sound_only ?></label></th>
                <td>
                    <input type="text" name="mb_id" value="<?php echo $mb['mb_id'] ?>" id="mb_id" <?php echo $required_mb_id ?> class="frm_input <?php echo $required_mb_id_class ?>" size="15" minlength="3" maxlength="20">

                </td>
                <th scope="row"><label for="mb_password">비밀번호<?php echo $sound_only ?></label></th>
                <td><input type="password" name="mb_password" id="mb_password" <?php echo $required_mb_password ?> class="frm_input <?php echo $required_mb_password ?>" value="<?php echo $password ?>" size="15" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_branch">지사선택<strong class="sound_only">필수</strong></label></th>
                <td><?php echo get_branch_name_select("mb_branch",$mb['mb_branch'], ' required class="frm_input adm_sel1 " ') ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_nick">회원이름<strong class="sound_only">필수</strong></label></th>
                <td><input type="text" name="mb_nick" value="<?php echo $mb['mb_nick'] ?>" id="mb_nick" required class="frm_input" size="15" minlength="2" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_birth">생년월일</label></th>
                <td>
                    <input type="text" name="mb_birth" value="<?php echo $mb['mb_birth'] ?>" id="mb_birth" class="frm_input mr5" size="10" readonly maxlength="20">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_age">나이</label></th>
                <td>
                    <input type="text" name="mb_age" value="<?php echo $mb['mb_age'] ?>" id="mb_age" class="frm_input" size="10" maxlength="20"> 세
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_sex">성별</label></th>
                <td>
					<div style="display: inline-block; margin-right:10px;">
						<input type="radio" name="mb_sex" value="1" id="mb_sex_yes" <?php echo $mb_sex_yes; ?>>
						<label for="mb_sex_yes">여</label>
					</div>
					<div style="display: inline-block;">
						<input type="radio" name="mb_sex" value="0" id="mb_sex_no" <?php echo $mb_sex_no; ?>>
						<label for="mb_sex_no">남</label>
					</div>
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_email">E-mail</label></th>
                <td><input type="text" name="mb_email" value="<?php echo $mb['mb_email'] ?>" id="mb_email" maxlength="100" class="frm_input email" size="30"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_tel">전화번호</label></th>
                <td>
                    <?php echo get_tel_select("mb_tel1",$mb_tel1,' class="frm_input"') ?> -
                    <input type="text" name="mb_tel2" value="<?php echo $mb_tel2 ?>" id="mb_tel2" class="frm_input" size="5" maxlength="20"> -
                    <input type="text" name="mb_tel3" value="<?php echo $mb_tel3 ?>" id="mb_tel3" class="frm_input" size="5" maxlength="20">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_hp">휴대폰번호</label></th>
                <td>
                    <?php echo get_phone_select("mb_hp1",$mb_hp1,'required class="frm_input"') ?> -
                    <input type="text" name="mb_hp2" value="<?php echo $mb_hp2 ?>" id="mb_hp2" required class="frm_input" size="5" maxlength="20"> -
                    <input type="text" name="mb_hp3" value="<?php echo $mb_hp3 ?>" id="mb_hp3" required class="frm_input" size="5" maxlength="20">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_sms_yes">SMS 수신</label></th>
                <td>
					<div style="display: inline-block; margin-right:10px;">
						<input type="radio" name="mb_sms" value="1" id="mb_sms_yes" <?php echo $mb_sms_yes; ?>>
						<label for="mb_sms_yes">예</label>
					</div>
					<div style="display: inline-block;">
						<input type="radio" name="mb_sms" value="0" id="mb_sms_no" <?php echo $mb_sms_no; ?>>
						<label for="mb_sms_no">아니오</label>
					</div>
                </td>
            </tr>
            <tr>
                <th scope="row">주소</th>
                <td colspan="3" class="td_addr_line">
					<div style="margin-bottom:6px;">
						<label for="mb_zip" class="sound_only">우편번호</label>
						<input type="text" name="mb_zip" value="<?php echo $mb['mb_zip1'].$mb['mb_zip2']; ?>" id="mb_zip" class="frm_input readonly" size="5" maxlength="6">
						<button type="button" class="btn_frmline" onclick="win_zip('fmember', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">주소 검색</button><br>
					</div>
					<div style="margin-bottom:6px;">
						<input type="text" name="mb_addr1" value="<?php echo $mb['mb_addr1'] ?>" id="mb_addr1" class="frm_input readonly" size="60">
						<label for="mb_addr1">기본주소</label><br>
					</div>
					<div style="">
						<input type="text" name="mb_addr2" value="<?php echo $mb['mb_addr2'] ?>" id="mb_addr2" class="frm_input" size="60">
						<label for="mb_addr2">상세주소</label>
					</div>

                    <input type="hidden" name="mb_addr3" value="<?php echo $mb['mb_addr3'] ?>" id="mb_addr3" class="frm_input" size="60">
                    <label for="mb_addr3" style="display:none;">참고항목</label>
                    <input type="hidden" name="mb_addr_jibeon" value="<?php echo $mb['mb_addr_jibeon']; ?>">
                </td>
            </tr>
            <?php if ($w == 'u') { ?>
                <tr>
                    <th scope="row">회원가입일</th>
                    <td><?php echo $mb['mb_datetime'] ?></td>
                </tr>
                <tr>
                    <th scope="row">최근접속일</th>
                    <td><?php echo $mb['mb_today_login'] ?></td>
                </tr>
                <tr>
                    <th scope="row">IP</th>
                    <td colspan="3"><?php echo $mb['mb_ip'] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <th scope="row"><label for="mb_memo">메모</label></th>
                <td ><textarea name="mb_memo" id="mb_memo"><?php echo $mb['mb_memo'] ?></textarea></td>
            </tr>


            </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="확인" class="btn_submit" accesskey='s'>
        <a href="./dr_member_list.php?<?php echo $qstr ?>&member_type=<?php echo $member_type; ?>">목록</a>
    </div>
</form>
