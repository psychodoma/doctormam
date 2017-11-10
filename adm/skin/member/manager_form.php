<?
if(empty($mb['mb_id'])){
    $mb['mb_id'] = "m".date("YmdHis",time()) ;
}
$mb_id = $_REQUEST["mb_id"];
$password = $mb['mb_id'];

$mb_edu_type_arr = explode(",",$mb['mb_edu_type']);
$mb_edu_host_arr = explode(",",$mb['mb_edu_host']);
$mb_edu_date_arr = explode(",",$mb['mb_edu_date']);
$mb_edu_num_arr = explode(",",$mb['mb_edu_num']);
$mb_helth_item_arr = explode(",",$mb['mb_helth_item']);
$mb_helth_result_arr = explode(",",$mb['mb_helth_result']);

?>
<script>
    $( function() {
        $( "#mb_join,#mb_leave_date,#mb_helth_date,#mb_edu_date1,#mb_edu_date2,#mb_edu_date3,#mb_edu_date4,#mb_edu_date5,#mb_edu_date6" ).datepicker({
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
    $( function() {
        var dateFormat = "yy-mm-dd",
            from = $( "#mb_insurance_start" )
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    prevText: '이전 달',
                    nextText: '다음 달',
                    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                    dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                    dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                    showMonthAfterYear: true,
                    yearSuffix: '년',
                    numberOfMonths: 3
                })
                .on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#mb_insurance_end" ).datepicker({
                    defaultDate: "+1y",
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    prevText: '이전 달',
                    nextText: '다음 달',
                    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                    dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                    dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                    showMonthAfterYear: true,
                    yearSuffix: '년',
                changeYear: true,
            changeMonth: true,
                    numberOfMonths: 3
                })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });

        function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }

            return date;
        }
    } );
</script>
<div class="tab_manager">
    <span for="first" class="select_tab">관리자정보</span>
    <a href="./dr_member_schedule.php?mb_id=<?php echo $mb_id ?>"><span for="second">관리자스케쥴</span></a>
</div>
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
    <div class="card_div">
        <table class="card_table">
            <tr>
                <td rowspan="4" colspan="2" class="photo_td">
					<ul class="adm_mam_1">
							<?php
							$mb_dir = substr($mb['mb_id'],0,2);
							$icon_file = G5_DATA_PATH.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
							if (file_exists($icon_file)) {
								$icon_url = G5_DATA_URL.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
								echo '<li class="mb5"><img src="'.$icon_url.'" alt="" style="width:100px;height:100px;">';
								echo '<li class="mb5"><input type="checkbox" id="del_mb_icon" name="del_mb_icon" value="1">삭제</li>';
							}
							?>

						<li class="mb5">
							<input type="file" name="mb_icon" id="mb_icon" class="photo_file">
						</li>

						<li class="">
						<?php echo help('.jpg파일만 가능합니다.') ?>
						</li>
					</ul>
                </td>
                <th>성  명</th>
                <th>생년월일</th>
                <th>입사일 ~ 퇴사일</th>
                <th>연락처</th>
            </tr>
            <tr>
                <td><input type="text" name="mb_nick" value="<?php echo $mb['mb_nick'] ?>" id="mb_nick" required class="manager_frm_input" size="15" minlength="2" maxlength="10" placeholder="이름을 입력해주세요." title="이름을 입력해주세요."></td>
                <td><input type="text" name="mb_age" value="<?php echo $mb['mb_age'] ?>" id="mb_age" class="manager_frm_input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' size="15" minlength="2" maxlength="10" placeholder="숫자만 입력해주세요." title="숫자만 입력해주세요."></td>
                <td>
					<input type="text" name="mb_join" value="<?php echo $mb['mb_join'] ?>" id="mb_join" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."> <!-- 입사일 -->
					<label for="~">~</label>
					<input type="text" name="mb_leave_date" value="<?php echo $mb['mb_leave_date'] ?>" id="mb_leave_date" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."> <!-- 퇴사일 -->
				</td>
                <td><input type="text" name="mb_hp" value="<?php echo $mb['mb_hp'] ?>" id="mb_hp" required class="manager_frm_input" size="15" minlength="2" maxlength="20"  placeholder="숫자만 입력해주세요." title="숫자만 입력해주세요."></td>
            </tr>
            <tr>
                <th>거주지역</th>
                <th>건강검진</th>
                <th colspan="2">배상책임보험</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="mb_addr1" value="<?php echo $mb['mb_addr1'] ?>" id="mb_addr1" class="manager_frm_input readonly" readonly size="15"placeholder="클릭후 입력해주세요." title="클릭후 입력해주세요." onclick="win_zip('fmember', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">
                    <input type="hidden" name="mb_zip" value="<?php echo $mb['mb_zip1'].$mb['mb_zip2']; ?>" id="mb_zip" class="frm_input readonly" size="5" maxlength="6">
                    <input type="hidden" name="mb_addr2" value="<?php echo $mb['mb_addr2'] ?>" id="mb_addr2" class="frm_input" size="60">
                    <input type="hidden" name="mb_addr3" value="<?php echo $mb['mb_addr3'] ?>" id="mb_addr3" class="frm_input" size="60">
                    <input type="hidden" name="mb_addr_jibeon" value="<?php echo $mb['mb_addr_jibeon']; ?>"><br>
                </td>
                <td><input type="text" name="mb_helth_date" value="<?php echo $mb['mb_helth_date'] ?>" id="mb_helth_date" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."></td>
                <td colspan="2">
                    <input type="text" name="mb_insurance_start" value="<?php echo $mb['mb_insurance_start'] ?>" id="mb_insurance_start" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="시작일 선택" title="시작일 선택"><label for="~">~</label>
                    <input type="text" name="mb_insurance_end" value="<?php echo $mb['mb_insurance_end'] ?>" id="mb_insurance_end" class="manager_half_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="종료일 선택" title="종료일 선택">
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
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[0] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[0] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[0] ?>" id="mb_edu_date1" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[0] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td>2.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[1] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[1] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[1] ?>" id="mb_edu_date2" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[1] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td>3.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[2] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[2] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[2] ?>" id="mb_edu_date3" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[2] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td>4.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[3] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[3] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[3] ?>" id="mb_edu_date4" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[3] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td>5.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[4] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[4] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[4] ?>" id="mb_edu_date5" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[4] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td>6.</td>
                <td><input type="text" name="mb_edu_type[]" value="<?php echo $mb_edu_type_arr[5] ?>" id="mb_edu_type" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_host[]" value="<?php echo $mb_edu_host_arr[5] ?>" id="mb_edu_host" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_edu_date[]" value="<?php echo $mb_edu_date_arr[5] ?>" id="mb_edu_date6" class="manager_frm_input" size="15" minlength="2" readonly maxlength="20" placeholder="클릭후 선택해주세요." title="클릭후 선택해주세요."></td>
                <td><input type="text" name="mb_edu_num[]" value="<?php echo $mb_edu_num_arr[5] ?>" id="mb_edu_num" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <th rowspan="6">건강검진내역</th>
                <th colspan="2">검사항목</th>
                <th>결과</th>
                <td colspan="2" rowspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[0] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[0] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[1] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[1] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[2] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[2] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[3] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[3] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="mb_helth_item[]" value="<?php echo $mb_helth_item_arr[4] ?>" id="mb_helth_item" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
                <td><input type="text" name="mb_helth_result[]" value="<?php echo $mb_helth_result_arr[4] ?>" id="mb_helth_result" class="manager_frm_input" size="15" maxlength="10" placeholder="입력해주세요." title="입력해주세요."></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:center;">
                    위의 내용은 사실임을 증명합니다.</br>
                    닥터맘 지사장
                </td>

            </tr>
        </table>
        <h1>추가 입력 사항</h1>
        <table class="card_table">
            <tr>
                <th>등급</th>
                <th>은행명</th>
                <th>은행계좌</th>
            </tr>
            <tr>
                <td><?php echo get_grade_select("mb_grade",$mb['mb_grade'], ' required class="manager_frm_input" ') ?></td>
                <td><input type="text" name="mb_bank_name" value="<?php echo $mb['mb_bank_name'] ?>" id="mb_bank_name" class="manager_frm_input" size="15" maxlength="10" placeholder="은행명을 입력해주세요." title="은행명을 입력해주세요."></td>
                <td><input type="text" name="mb_bank_account" value="<?php echo $mb['mb_bank_account'] ?>" id="mb_bank_account" class="manager_frm_input" size="15" maxlength="15" placeholder="은행계좌를 입력해주세요." title="은행계좌를 입력해주세요."></td>
            </tr>
            <tr>
                <th>자격유형</th>
                <th>자격번호</th>
                <th>소속지사</th>
            </tr>
            <tr>
                <td><input type="text" name="mb_qual_type" value="<?php echo $mb['mb_qual_type'] ?>" id="mb_qual_type" class="manager_frm_input" size="15" maxlength="15" placeholder="자격유형을 입력해주세요." title="자격유형을 입력해주세요."></td>
                <td><input type="text" name="mb_qual_num" value="<?php echo $mb['mb_qual_num'] ?>" id="mb_qual_num" class="manager_frm_input" size="15" maxlength="15" placeholder="자격번호를 입력해주세요." title="자격번호를 입력해주세요."></td>
                <td><?php echo get_branch_name_select("mb_branch",$mb['mb_branch'], ' required class="manager_frm_input" ') ?></td>
            </tr>
        </table>
        <table class="card_table">
        <?php for ($i=0; $i<2; $i++) { ?>
        <tr>
            <th scope="row">파일 #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <a href="<?php echo G5_BBS_URL?>/download.php?bo_table=member&wr_id=<?php echo $mb["mb_no"]?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?>다운로드</a><input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"> 파일 삭제</label>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        </table>
    </div>

    <div class="tbl_frm01 tbl_wrap">
        <table style="display:none;">
            <colgroup>
                <col class="grid_4">
                <col>
            </colgroup>
            <tbody>

            <tr style="display:none;">
                <th scope="row"><label for="mb_id">아이디<?php echo $sound_only ?></label></th>
                <td>
                    <input type="text" name="mb_id" value="<?php echo $mb['mb_id'] ?>" id="mb_id" <?php echo $required_mb_id ?> class="frm_input <?php echo $required_mb_id_class ?>" size="15" minlength="3" maxlength="20">
                    <?php if ($w=='u'){ ?><a href="./boardgroupmember_form.php?mb_id=<?php echo $mb['mb_id'] ?>">접근가능그룹보기</a><?php } ?>
                </td>
                <th scope="row"><label for="mb_password">비밀번호<?php echo $sound_only ?></label></th>
                <td><input type="password" name="mb_password" id="mb_password" <?php echo $required_mb_password ?> class="frm_input <?php echo $required_mb_password ?>" value="<?php echo $password ?>" size="15" maxlength="20"></td>
            </tr>
<!--            <tr>
                <th scope="row"><label for="mb_memo">메모</label></th>
                <td colspan="3"><textarea name="mb_memo" id="mb_memo"><?php /*echo $mb['mb_memo'] */?></textarea></td>
            </tr>-->

            <?php /*if ($w == 'u') { */?><!--
                <tr>
                    <th scope="row">회원가입일</th>
                    <td><?php /*echo $mb['mb_datetime'] */?></td>
                </tr>
                <tr>
                    <th scope="row">최근접속일</th>
                    <td><?php /*echo $mb['mb_today_login'] */?></td>
                </tr>
            --><?php /*} */?>
            </tbody>
        </table>

    </div>
    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="확인" class="btn_submit" accesskey='s'>
        <a href="./dr_member_list.php?<?php echo $qstr ?>&member_type=<?php echo $member_type;?>">목록</a>
        <?php if ($w == 'u'&& $_GET["card"] == "") { ?>
        <a href="/manager_view.php?mb_id=<?php echo $mb["mb_id"]?>" target="_blank">관리사 카드보기</a>
        <? } ?>
    </div>
</form>
<script>
    function autoHypenPhone(str){
        str = str.replace(/[^0-9]/g, '');
        var tmp = '';
        if( str.length < 4){
            return str;
        }else if(str.length < 7){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
            return tmp;
        }else if(str.length < 11){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 3);
            tmp += '-';
            tmp += str.substr(6);
            return tmp;
        }else{
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7);
            return tmp;
        }
        return str;
    }

    var cellPhone = document.getElementById('mb_hp');
    cellPhone.onkeyup = function(event){
        event = event || window.event;
        var _val = this.value.trim();
        this.value = autoHypenPhone(_val) ;
    }
</script>