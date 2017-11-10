<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_javascript(G5_POSTCODE_JS, 0);    //다음 주소 js

$val = sql_query("select * from g5_write_promotion where pro_id=".$write['wr_id']." and pro_send_date is not null order by pro_send_date asc");
//echo "select * from g5_write_promotion where pro_id=".$write['wr_id']." and pro_send_date is not null order by pro_send_date desc"
$val1 = sql_fetch("select * from g5_write_promotion where pro_id=".$write['wr_id']." and pro_type = 1");
$val2 = sql_fetch("select * from g5_write_promotion where pro_id=".$write['wr_id']." and pro_type = 2");
$val3 = sql_fetch("select * from g5_write_promotion where pro_id=".$write['wr_id']." and pro_type = 3");

$pro_send_ck = "";
$a = 0;
$b = 0;
$c = 0;

for ($i=0; $row=sql_fetch_array($val); $i++) {
    if( $row['pro_type']==1 ){
        $a = $row['pro_send_date'];
    }else if( $row['pro_type']==2 ){
        $b = $row['pro_send_date'];
    }else if( $row['pro_type']==3 ){
        $c = $row['pro_send_date'];
    }
}

if($a != 0){
    $pro_send_ck .= "*&nbsp;".$a."에 100일 문자 발송&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}

if($b != 0){
    $pro_send_ck .= "*&nbsp;".$b."에 돌 문자 발송&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}

if($c != 0){
    $pro_send_ck .= "*&nbsp;".$c."에 이벤트 문자 발송";
}

?>
<style>
    label{vertical-align: 0.5px;}
	.region th,.region td{border-top:3px solid #999;margin-top:3px;}
</style>

<script>
    $( function() {
        $( "#wr_birth,#wr_service_start,#wr_estimate,#wr_end_service,#manager_start,#manager_start2,#manager_end,#manager_end2" ).datepicker({
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

        $('.pro_message input').click(function(){
            if($(this).is(':checked')==false){
                var result = confirm("문자수신 체크 제거 시 기존 수신정보는 사라집니다.");

                if(result){
                    
                }else{
                    $(this).prop('checked', true);
                }

            }
        })
    });
</script>

<section id="bo_w">
    <h1 id="container_title" style="margin-bottom: 10px; border-bottom: 0;"><?php echo $g5['title'] ?></h1>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">


    <div class="btn_confirm reser170628">
        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
        <a href="./dr_board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel" style="width:120px;">취소</a>
    </div>


    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>" id="w">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="wr_subject" value="예약">
    <input type="hidden" name="dup_member" id="dup_member" value="Y">
    <input type="hidden" name="check_confirm" id="check_confirm" value="Y">

	<?if($w == "u"){?>
		<input type="hidden" name="wr_link1" value="관리자 수정" class='wr_link1_a'>
	<?}else{?>
		<input type="hidden" name="wr_link1" value="관리자 등록" class='wr_link1_a'>
	<?}?>


    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }
    //echo $write['wr_id'];
    //echo $option_hidden;
    $write['wr_hp'] = explode("-",$write['phone']);
    $write['mate'] = explode("|",$write['mate']);
    if($_REQUEST['w'] != 'u'){
        $write['history'] = "1";
        $write['after_care'] = "5";
        $write['service_genre'] = "2";
        $write['service_type'] = "1";
        $write['service_period'] = "1";
        $write['work_day'] = "1";
        $write['cctv'] = "2";
    }
    ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <tbody>
        <tr>
            <th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_name" onkeyup="CheckChange();" value="<?php echo $write['wr_name'] ?>" id="wr_name" required class="frm_input required" size="10" maxlength="20">
				<a href="javascript:copy_w();" class="btn_cancel_1">예약복사</a><span class="desc_dup"></span>
			</td>
        </tr>
        <tr>
            <th scope="row"><label for="mb_hp">휴대폰번호</label></th>
            <td>
                <?php echo get_phone_select("wr_hp1",$wr_hp1,'required class="required frm_input" onchange="CheckChange();" ') ?> -
                <input type="text" name="wr_hp2" value="<?php echo $write['wr_hp'][1] ?>" id="wr_hp2" onkeyup="CheckChange();" required class="required frm_input" size="5" maxlength="20"> -
                <input type="text" name="wr_hp3" value="<?php echo $write['wr_hp'][2] ?>" id="wr_hp3" onkeyup="CheckChange();" required class="required frm_input" size="5" maxlength="20">
                <a href="javascript:SearchMember();" class="btn_cancel_1">회원체크</a><span class="desc_dup"></span>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_birth">생년월일</label></th>
            <td>
                <input type="text" name="wr_birth" value="<?php echo  $write['birth_date'] ?>" id="wr_birth" class="frm_input mr5" size="10" readonly maxlength="20">
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_email">이메일</label></th>
            <td><input type="text" name="wr_email" value="<?php echo  $write['wr_email'] ?>" id="wr_email" class="frm_input email" size="50" maxlength="100"></td>
        </tr>

        <tr>
            <th scope="row">주소</th>
            <td colspan="3" class="td_addr_line">
                <label for="wr_zip" class="sound_only">우편번호</label>
                <input type="text" name="wr_zip" value="<?php echo $write['zip'] ?>" id="wr_zip" class="frm_input readonly mb5" size="5" maxlength="6" readonly> -
                <button type="button" class="btn_frmline mb5" onclick="win_zip('fwrite', 'wr_zip', 'wr_addr1', 'wr_addr2', 'wr_addr3', 'wr_addr_jibeon');">주소 검색</button><br>
                <input type="text" name="wr_addr1" value="<?php echo $write['addr1'] ?>" id="wr_addr1" class="frm_input readonly mb5" size="60" readonly>
                <label for="wr_addr1">기본주소</label><br>
                <input type="text" name="wr_addr2" value="<?php echo $write['addr2'] ?>" id="wr_addr2" class="frm_input" size="60">
                <label for="wr_addr2">상세주소</label>
                <input type="hidden" name="wr_addr3" value="<?php echo $write['addr3'] ?>" id="wr_addr3" class="frm_input" size="60">
                <label for="wr_addr3" style="display:none;">참고항목</label>
                <input type="hidden" name="wr_addr_jibeon" value="<?php echo $write['addr_jibeon']; ?>"><br>
            </td>
        </tr>

        <tr class="region">
            <th scope="row"><label for="wr_type">예약서비스</label></th>
            <td class="input_0328">
                <p><?php echo radio_selected("wr_type","0",$write['wr_type'],"산후도우미"); ?></p>
                <p><?php echo radio_selected("wr_type","1",$write['wr_type'],"모유수유전문가"); ?></p>
            </td>
        </tr>

        <tr class="row">
            <th scope="row"><label for="wr_history">분만경력</label></th>
            <td class="input_0328">
                <p><?php echo radio_selected("wr_history","1",$write['history'],"첫째출산예정"); ?></p>
                <p><?php echo radio_selected("wr_history","2",$write['history'],"둘째출산예정"); ?></p>
                <p><?php echo radio_selected("wr_history","3",$write['history'],"셋째출산예정"); ?></p>
                <p><?php echo radio_selected("wr_history","4",$write['history'],"그이상"); ?></p>
            </td>
        </tr>


        <tr class="row">
            <th scope="row"><label for="wr_history">아기성별</label></th>
            <td class="input_0328">
                <p><?php echo radio_selected("wr_baby_sex","남자",$write['wr_baby_sex'],"남자"); ?></p>
                <p><?php echo radio_selected("wr_baby_sex","여자",$write['wr_baby_sex'],"여자"); ?></p>
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="wr_estimate">분만 예정일</label></th>
            <td>
                <input type="text" name="wr_estimate" value="<?php echo $write['estimate'] ?>" id="wr_estimate" class="frm_input mr5" size="10" readonly maxlength="20">
                <!--input type="checkbox" name="wr_100cel_msg" value="1" id="wr_100cel_msg" class="frm_input" <?php if($write['100cel_msg']){?> checked<?php } ?>>
                <label for="wr_100cel_msg">100일 축하 메세지</label>
                <input type="checkbox" name="wr_1cel_msg" value="1" id="wr_100cel_msg" class="frm_input" <?php if($write['1cel_msg']){?> checked<?php } ?>>
                <label for="wr_100cel_msg">첫돌 축하메세지</label>&nbsp;&nbsp;-->
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="wr_branch">지사선택<strong class="sound_only">필수</strong></label></th>
            <td><?php echo get_branch_name_select("wr_branch",$write['res_branch'], ' required class="frm_input" ') ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_after_care">조리원여부</label></th>
            <td class="input_0328">
                <p><?php echo radio_selected("wr_after_care","1",$write['after_care'],"1주"); ?></p>
                <p><?php echo radio_selected("wr_after_care","2",$write['after_care'],"2주"); ?></p>
                <p><?php echo radio_selected("wr_after_care","3",$write['after_care'],"3주"); ?></p>
                <p><?php echo radio_selected("wr_after_care","4",$write['after_care'],"4주"); ?></p>
                <p><?php echo radio_selected("wr_after_care","5",$write['after_care'],"안감"); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_service_genre">서비스유형</label></th>
            <td class="input_0328">
                <p><?php echo radio_selected("wr_service_genre","1",$write['service_genre'],"입주"); ?></p>
                <p><?php echo radio_selected("wr_service_genre","2",$write['service_genre'],"출퇴근"); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_service_type">서비스종류</label></th>
            <td class="input_0328">
				<p><?php echo radio_selected("wr_service_type","0",$write['service_type'],"알뜰형"); ?></p>
                <p><?php echo radio_selected("wr_service_type","1",$write['service_type'],"일반형"); ?></p>
                <p><?php echo radio_selected("wr_service_type","2",$write['service_type'],"베스트"); ?></p>
                <p><?php echo radio_selected("wr_service_type","3",$write['service_type'],"프리미엄"); ?></p>
                <p><?php echo radio_selected("wr_service_type","4",$write['service_type'],"명품플러스"); ?></p>
                <p><?php echo radio_selected("wr_service_type","5",$write['service_type'],"바우처"); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_service_start">서비스기간</label></th>
            <td>
<!--  				<p style="display: inline-block; margin-right:35px;">
 									<label for="wr_service_start" style="font-weight:bold; margin-right:5px;">시작일 : </label>
 									<input type="text" name="wr_service_start" value="<?php echo $write['service_start']?>" id="wr_service_start" class="frm_input mr5" size="10" readonly maxlength="20">
 								</p>
 								<p style="display: inline-block;">
 									<label for="wr_service_end" style="font-weight:bold; margin-right:5px;">종료일 : </label> 
 									<input type="text" name="wr_end_service" value="<?php echo $write['end_service']?>" id="wr_end_service" class="frm_input mr5" size="10" readonly maxlength="20">
 								</p>  -->


				<div class="input_0328" style="margin-bottom:20px;">
					<label for="wr_service_period"  style="font-weight:bold; margin-right:5px;">기간 : </label>
<!-- 					<p><?php echo radio_selected("wr_service_period","1",$write['service_period'],"1주"); ?></p>
					<p><?php echo radio_selected("wr_service_period","2",$write['service_period'],"2주"); ?></p>
					<p><?php echo radio_selected("wr_service_period","3",$write['service_period'],"3주"); ?></p>
					<p><?php echo radio_selected("wr_service_period","4",$write['service_period'],"4주"); ?></p>
					<p><?php echo radio_selected("wr_service_period","5",$write['service_period'],"5주"); ?></p>
					<p><?php echo radio_selected("wr_service_period","6",$write['service_period'],"6주"); ?></p>
					<p><?php echo radio_selected("wr_service_period","7",$write['service_period'],"7주"); ?></p>
					<p><?php echo radio_selected("wr_service_period","8",$write['service_period'],"8주"); ?></p> -->

						<?$arr = array("1주","2주","3주","4주","5주","6주","7주","8주","9주","10주","11주","12주","13주","14주","15주","16주"); ?>
						
						<?=get_selectbox('wr_service_period',$arr, $write['service_period']);?>

				</div>


				<div class="input_0328">
					<label for="wr_service_work" style="font-weight:bold; margin-right:5px;">근무일수 : </label>
					<p style="display: inline-block; margin-right:10px;"><?php echo radio_selected("wr_service_work_day","1",$write['work_day'],"5일"); ?></p>
					<p style="display: inline-block; margin-right:10px;"><?php echo radio_selected("wr_service_work_day","2",$write['work_day'],"6일"); ?></p>
				</div>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_cctv">CCTV 유무</label></th>
            <td class="input_0328">
                <p><?php echo radio_selected("wr_cctv","1",$write['cctv'],"유"); ?></p>
                <p><?php echo radio_selected("wr_cctv","2",$write['cctv'],"무"); ?></p>
			</td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_mother_job">어머님직업</label></th>
            <td>
                <input type="text" name="wr_mother_job" value="<?php echo $write['mother_job'] ?>" id="wr_mother_job" class="frm_input" size="50" maxlength="100">
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_mate">기타가족</label></th>
            <td>
				<p style="display: inline-block; margin-right:10px;">
					<input type="checkbox" name="wr_mate[]" value="1" id="wr_mate_1" class="frm_input" <?php if(in_array('1', $write['mate'])){?> checked<?php } ?>>
					<label for="wr_mate_1">큰아이</label>
				</p>
				<p style="display: inline-block; margin-right:10px;">
					<input type="checkbox" name="wr_mate[]" value="2" id="wr_mate_2" class="frm_input" <?php if(in_array('2', $write['mate'])){?> checked<?php } ?>>
					<label for="wr_mate_2">부모님</label>
				</p>
				<p style="display: inline-block;">
					<label for="wr_mate_3">그외</label>
					<input type="text" name="wr_mate_etc" value="<?php echo $write['mate_etc'] ?>" id="wr_mate_etc" class="frm_input" style="width:216px;">
				</p>
            </td>
        </tr>

		<style>
			.pro_label {margin-bottom:15px;color:666;}
			.pro_label label{font-size:10px;color:666;line-height:30px;background:#f3f3f3;padding:3px 10px; border-radius:5px;}
			.pro_label label strong{color:red;}
			.pro_message input[type="checkbox"]{width:20px;height:20px;}
			.pro_message{font-size:14px;font-weight:bold;}

			.pro_label1 {margin-left:15px;color:666; font-size:17px;}
			.pro_label1 label{font-size:12px;color:666;line-height:30px;background:#f3f3f3;padding:3px 10px; border-radius:5px;}
			.pro_label1 label strong{color:red;}
			.pro_message1 input[type="checkbox"]{width:20px;height:20px;}
			.pro_message1{font-size:14px;font-weight:bold;}
		</style>
        <tr>
            <th>프로모션 문자발송</th>
            <td class='pro_message'>
				<div class="pro_label"><label> * 아래 항목 체크시 <strong>[ 분만 예정일 ]</strong>을 기준으로 각각 설정된 날짜에 프로모션에 리스트가 보여집니다.</label></div>
                <input type="checkbox" name="pro_100_d" id='promotion' value="1" <?php if(isset($val1)){?> checked<?php } ?>  >&nbsp;100일&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="pro_1_y" id='promotion1' value="1" <?php if(isset($val2)){?> checked<?php } ?> >&nbsp;돌잔치&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="pro_event" value="1" <?php if(isset($val3)){?> checked<?php } ?> >&nbsp;이벤트&nbsp;&nbsp;&nbsp;
                <div class='pro_send_ck' style='color:red; padding-top:15px;'><?=$pro_send_ck?></div>
            </td>
        </tr>

		
        <tr>
            <th>사은품</th>
            <td class='pro_message1'>
				<input type='hidden' name='wr_2' value=<?=$write['wr_2']?> >
				<input type='hidden' name='wr_1' value=<?=$write['wr_1']?> >
				<?=set_freegift_select($write['wr_1']);?>
				<?if( $write['wr_2'] ){?>
					<span class="pro_label1"><label> * <?=get_freegift_subject($write['wr_1'])?> 을(를) <strong>[ <?=$write['wr_2']?> ]</strong> 에 문자 발송하였습니다. </label></span>
				<?}?>
            </td>
        </tr>

	




        <tr class="region">
            <th scope="row"><label for="wr_manager">관리사 지정</label></th>
            <td>
                <?php echo get_manager_name_select("manager",$write["manager_id"],"class='adm_sel1'",$write['service_start'],$write['service_end']); ?>
                <span style="margin-left:10px; font-weight:bold;">시작일 : </span><input type="text" name="manager_start" value="<?php echo $write['manager_start'] ?>" id="manager_start" class="frm_input mr5" size="10" readonly maxlength="20">
                <span style="margin-left:15px; font-weight:bold;">종료일 : </span><input type="text" name="manager_end" value="<?php echo $write['manager_end'] ?>" id="manager_end" class="frm_input mr5" size="10" readonly maxlength="20">
                <input type="checkbox" name="manager_confirm" value="1" id="manager_confirm" class="frm_input" <?php if($write['manager_confirm']){?> checked<?php } ?> style="margin-left:15px;">확정

                <a href="javascript:ShowAll();" class="btn_cancel_2" style="margin-left:10px; margin-right:3px;">모든 관리사 보기</a>
                <a href="javascript:sms5_chk_send(4);" class="btn_cancel_2 <?php if($write["sms_4"] == "1" ){echo "clicked";}; ?>">고객 정보 보내기</a>

                </br></br>

                <?php echo get_manager_name_select("manager2",$write["manager_id2"],"class='adm_sel1'",$write['service_start'],$write['service_end']); ?>
                <span style="margin-left:10px; font-weight:bold;">시작일 : </span><input type="text" name="manager_start2" value="<?php echo $write['manager_start2'] ?>" id="manager_start2" class="frm_input mr5" size="10" readonly maxlength="20">
                <span style="margin-left:15px; font-weight:bold;">종료일 : </span><input type="text" name="manager_end2" value="<?php echo $write['manager_end2'] ?>" id="manager_end2" class="frm_input mr5" size="10" readonly maxlength="20">
                <input type="checkbox" name="manager_confirm2" value="1" id="manager_confirm" class="frm_input" <?php if($write['manager_confirm2']){?> checked<?php } ?> style="margin-left:15px;">확정

                <a href="javascript:ShowAll2();" class="btn_cancel_2" style="margin-left:10px; margin-right:3px;">모든 관리사 보기</a>
                <a href="javascript:sms5_chk_send(8);" class="btn_cancel_2 <?php if($write["sms_8"] == "1" ){echo "clicked";}; ?>">고객 정보 보내기</a>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_estimate">입금 유무</label></th>
            <td>
                <?php echo get_yn_select("wr_deposit",$write['deposit'],"class='adm_sel1'" ) ?>
            </td>
        </tr>
<!--         <tr>
            <th scope="row"><label for="wr_estimate">예약금</label></th>
            <td>
                <input type="text" name="wr_deposit"  value="<?php echo $write['wr_deposit'] ?>" id="wr_deposit"style="text-align: right; padding-right:5px; margin-right:5px;" onkeyup="addComma(this)" class="frm_input" size="10" maxlength="20">원
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_estimate">서비스금액</label></th>
            <td>
                <input type="text" name="wr_amount"  value="<?php echo $write['wr_amount'] ?>" id="wr_amount" style="text-align: right; padding-right:5px; margin-right:5px;" onkeyup="addComma(this)" class="frm_input" size="10" maxlength="20">원
            </td>
        </tr> -->





        <tr>
            <th scope="row">예약금</th>
            <td>
				<input type='text' name="wr_deposit"  value="<?php echo $write['wr_deposit'] ?>" id="wr_deposit" style="text-align: right; padding-right:5px; margin-right:5px;" onkeyup="addComma(this)" class="frm_input wr_deposit1" size="10" maxlength="20">원
            </td>
        </tr>

        <tr>
            <th scope="row">기본요금</th>
            <td>
				<input type='text' name="wr_3"  value="<?php echo $write['wr_3'] ?>" id="wr_deposit" style="text-align: right; padding-right:5px; margin-right:5px;" onkeyup="addComma(this)" class="frm_input wr_deposit2" size="10" maxlength="20">원
            </td>
        </tr>

        <tr>
            <th scope="row">추가요금</th>
            <td>	
				<input type='text' name="wr_4"  value="<?php echo $write['wr_4'] ?>" id="wr_deposit" style="text-align: right; padding-right:5px; margin-right:5px;" onkeyup="addComma(this)" class="frm_input wr_deposit3" size="10" maxlength="20">원
            </td>
        </tr>

        <tr>
            <th scope="row" >서비스 총 요금</th>
            <td class='wr_deposit4' style='color:red; font-size:15px; font-wiehgt:bold;' >
				<?if( $write['wr_amount'] != "" ){?>
					<?php echo $write['wr_amount'] ?> 원
				<?}else{?>
					0 원
				<?}?>
            </td>
        </tr>

        <tr>
            <th scope="row" >잔&nbsp;&nbsp;액</th>
			<?if($wr_6 == ""){?>
				<td  class= 'wr_deposit5_td' style='color:red; font-size:15px; font-wiehgt:bold;'>
					<div class="wr_deposit5" style='float:left;' >
						<?if( $write['wr_5'] != "" ){?>
							<?php echo $write['wr_5'] ?> 원
						<?}else{?>
							0 원
						<?}?>
					</div>
					<a  class="btn_cancel_2 com_btn" style='margin-left:10px; background: #d23474; cursor:pointer;'>잔액 입금 완료</a>
				</td>
			<?}else{?>
				<td  class= 'wr_deposit5_td' style='color:#333; font-size:14px; font-wiehgt:bold;'>
					<?=$write['wr_5']?> 원 ( <?=substr($write['wr_6'],0,10)?> <span style='color:#333; font-size:12px;' >잔액 입금 완료를 하셨습니다. )</span>
				</td>
			<?}?>
        </tr>

		<input type='hidden' name='wr_amount' value="<?php echo $write['wr_amount'] ?>" id="wr_amount">
		<input type='hidden' name='wr_5' value="<?php echo $write['wr_5'] ?>" id="wr_5">










        <tr>
            <th scope="row"><label for="wr_status">예약상태</label></th>
            <td>
                    <div class="status_head"><p><img src="img/icon_close.png" width="12px" height="12px" onclick="Close_log()"></p></div>
                    <div class="status_log">

                <table>
                    <tr>
                        <th>수정지점</th>
                        <th>수정상태</th>
                        <th>수정날짜</th>
                    </tr>
                    <?php
                        $sql = "select * from reservation_status_log where wr_id = $wr_id order by wr_datetime desc";
                        $result = sql_query($sql);
                        while($row = sql_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo get_branch($row["wr_branch"],"mb_nick")?></td>
                        <td><?php echo get_status($row["wr_status"]) ?></td>
                        <td><?php echo $row["wr_datetime"] ?></td>
                    </tr>
                    <?php } ?>
                </table>
                        </div>
                <?php echo get_status_select("wr_status",$write['status'],"class='adm_sel1'" ) ?>
                <a href="javascript:Open_log();" class="btn_cancel_2" >상태 변경 리스트</a>

            </td>
        </tr>
        <?php if($_REQUEST["w"] == "u"){ ?>
        <tr>
            <th scope="row"><label for="wr_sms">SMS 보내기</label></th>
            <td class="input_a_0328">
                <a href="javascript:sms5_chk_send(1);" class="btn_cancel_2 <?php if($write["sms_1"] == "1" ){echo "clicked";}; ?>" >계약서 보내기</a>
				<a href="javascript:sms5_chk_send(5);" class="btn_cancel_2 <?php if($write["sms_5"] == "1" ){echo "clicked";}; ?>">예약내용 보내기</a>
				<a href="javascript:sms5_chk_send(6);" class="btn_cancel_2 <?php if($write["sms_6"] == "1" ){echo "clicked";}; ?>">입금확인 보내기</a>
				<a href="javascript:sms5_chk_send(2);" class="btn_cancel_2 <?php if($write["sms_2"] == "1" ){echo "clicked";}; ?>">관리사 정보 보내기</a>
				<a href="javascript:sms5_chk_send(3);" class="btn_cancel_2 <?php if($write["sms_3"] == "1" ){echo "clicked";}; ?>">설문조사 보내기</a>
                <?php if($member["mb_id"] == "drmamhead" || $member["mb_id"] == "admin") {?> <a href="javascript:sms5_chk_send(7);" class="btn_cancel_2 <?php if($write["sms_7"] == "1" ){echo "clicked";}; ?>" >결제 요청 문자</a><?php }?>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_app">고객 문서</label></th>
            <td class="input_0328">
				<p>
					<input type="checkbox" id="app_check"disabled <?php if($write["signed_name"])echo "checked"; ?>>
					<label for="app_check" >계약서동의</label>
				</p>
				<p>
					<input type="checkbox" id="question_check"disabled <?php if($write["question"])echo "checked"; ?>>
					<label for="app_check" >설문조사 응답</label>
				</p>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <th scope="row"><label for="wr_content">메모<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php } ?>
            </td>
        </tr>
        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row">파일 #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" size="50">
                <?php } ?>
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>








				
				

			
        <?php if ($is_guest) { //자동등록방지  ?>
        <tr>
            <th scope="row">자동등록방지</th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
    </div>
    <div class="btn_confirm">
        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
        <a href="./dr_board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel" style="width:120px;">취소</a>
    </div>
    </form>
    <form name="send_form" id="send_form"  method="post" action="./sms_admin/sms_write_send.php">
        <input type="hidden" name="send_list" id="send_list" >
        <input type="hidden" name="hp_list" id="hp_list"  value="<?php echo $write['wr_hp'][0] ?>-<?php echo $write['wr_hp'][1] ?>-<?php echo $write['wr_hp'][2] ?>">
        <input type="hidden" name="wr_message" id="wr_message" value="">
        <input type="hidden" name="wr_reply" id="wr_reply" value="<?php echo $member["mb_hp"] ?>">
        <input type="hidden" name="wr_fore_key" id="wr_fore_key" value="<?php echo $wr_id ?>">
        <input type="hidden" name="wr_fore_type" id="wr_fore_type" value="1">
        <input type="hidden" name="referer_param" id="referer_param" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
    </form>
    <script>
$(function(){

	$('.com_btn').click(function(){
		if (confirm("잔액 입금 완료를 확인하시겠습니까? 확인 후 더이상 수정이 불가능합니다.") == true){    
			$.ajax({
				url: "/ajax.reservatopm_com.php",
                data: {
                    "wr_id": "<?=$wr_id?>",
                },
				success: function(data){
					$('.wr_deposit5').remove();
					$('.com_btn').remove();


					  var d = new Date();

					  var s = d.getFullYear() + "-";
					  s += d.getMonth()+1+ "-";
					  s += d.getDate();

					  $('.wr_deposit5_td').css('color','#333');
					  $('.wr_deposit5_td').css('font-size','14px');
					  $('.wr_deposit5_td').html(s+" <span style='color:#333; font-size:12px;' >잔액 입금 완료를 하셨습니다.</span>");
					  

				}
			})
		}else{  
			return;
		}

	})




    $('#promotion').click(function(){
        if($('#wr_estimate').val() == "" || $('#wr_estimate').val() == "0000-00-00"){
            alert('분만예정일을 입력해야합니다.')
            return false;
        }

    })
    $('#promotion1').click(function(){
        if($('#wr_estimate').val() == "" || $('#wr_estimate').val() == "0000-00-00"){
            alert('분만예정일을 입력해야합니다.')
            return false;
        }

    })  

//$('#wr_deposit').change();

	$('.wr_deposit1').change(function(){
		var wr_amount = $.fn.appendComma( $.fn.totalHop() );
		var wr_5 = $.fn.appendComma( $.fn.remains() );
	
		$('.wr_deposit4').html(wr_amount+" 원");
		$('.wr_deposit5').html(wr_5+" 원");
		
		$('#wr_amount').val(wr_amount);
		$('#wr_5').val(wr_5);
	})

	$('.wr_deposit2').change(function(){
		var wr_amount = $.fn.appendComma( $.fn.totalHop() );
		var wr_5 = $.fn.appendComma( $.fn.remains() );
	
		$('.wr_deposit4').html(wr_amount+" 원");
		$('.wr_deposit5').html(wr_5+" 원");
		
		$('#wr_amount').val(wr_amount);
		$('#wr_5').val(wr_5);
	})

	$('.wr_deposit3').change(function(){
		var wr_amount = $.fn.appendComma( $.fn.totalHop() );
		var wr_5 = $.fn.appendComma( $.fn.remains() );
	
		$('.wr_deposit4').html(wr_amount+" 원");
		$('.wr_deposit5').html(wr_5+" 원");
		
		$('#wr_amount').val(wr_amount);
		$('#wr_5').val(wr_5);
	})

	$.fn.totalHop = function(){
		var val2 = Number($.fn.removeComma($('.wr_deposit2').val()));
		var val3 = Number($.fn.removeComma($('.wr_deposit3').val()));

		return  val2 + val3;
	}

	$.fn.remains = function(){
		var total = $.fn.totalHop();
		var val1 = Number($.fn.removeComma($('.wr_deposit1').val()));

		return total - val1;
	}



	$.fn.removeComma = function(obj){
		var strValue = obj.replace(/,|\s+/g,'');
		return strValue;
	}

	$.fn.appendComma = function(val){
		if( val >= 0 ){

			if( val.toString().length%3 == 1 ){
				return $.fn.arrayComma( val.toString(),0, 1);
			}else if( val.toString().length%3 == 2 ){
				return $.fn.arrayComma( val.toString(),1, 1);
			}else if( val.toString().length%3 == 0 ){
				return $.fn.arrayComma( val.toString(),2, 1);
			}

		}else{
	
			if( val.toString().length%3 == 1 ){
				return $.fn.arrayComma( val.toString(),2, 0)
			}else if( val.toString().length%3 == 2 ){
				return $.fn.arrayComma( val.toString(),0, 0);
			}else if( val.toString().length%3 == 0 ){
				return $.fn.arrayComma( val.toString(),1, 0);
			}


		}
	}

	$.fn.arrayComma = function(arr, num, ck){
		var str = "";

		if(ck == 1){
	
			for( var i = 0; i < arr.length; i++ ){
				str += arr[i];
				if(i%3 == num && i != arr.length-1){
					str += ",";
				}	
			}
			return str;

		}else{

			var arr = Math.abs( Number(arr) );
			arr = arr.toString();
			for( var i = 0; i < arr.length; i++ ){
				str += arr[i];
				if(i%3 == num && i != arr.length-1){
					str += ",";
				}	
			}
			return "-"+str;

		
		}
	}

	if( $.fn.remains() > 0 ){

		$('.wr_deposit5').html($.fn.appendComma( $.fn.remains() )+ " 원");

	}

})

        function addComma(obj,fLen)
        {
            if(event.keyCode == 37 || event.keyCode == 39 )
            {
                return;
            }
            var fLen = fLen || 2;
            var strValue = obj.value.replace(/,|\s+/g,'');
            var strBeforeValue = (strValue.indexOf('.') != -1)? strValue.substring(0,strValue.indexOf('.')) :strValue ;
            var strAfterValue  = (strValue.indexOf('.') != -1)? strValue.substr(strValue.indexOf('.'),fLen+1) : '' ;
            if(isNaN(strValue))
            {
                alert(strValue.concat(' -> 숫자가 아닙니다.'));
                return false;
            }
            var intLast =  strBeforeValue.length-1;
            var arrValue = new Array;
            var strComma = '';
            for(var i=intLast,j=0; i >= 0; i--,j++)
            {
                if( j !=0 && j%3 == 0)
                {
                    strComma = ',';
                }
                else
                {
                    strComma = '';
                }
                arrValue[arrValue.length] = strBeforeValue.charAt(i) + strComma  ;
            }
            obj.value=  arrValue.reverse().join('') +  strAfterValue;
        }





        function CheckChange(){
            $("#check_confirm").val("");
        }
		function copy_w(){
			$("#w").val("");
			$('.wr_link1_a').attr('value','관리자 복사');
			$("#fwrite").submit();
		}

        function SearchMember(){
            var wr_name = $("#wr_name").val();
            var phone_num = $("#wr_hp1 option:selected").val() +"-"+ $("#wr_hp2").val() +"-"+ $("#wr_hp3").val();
            $("#check_confirm").val("Y");
            $.ajax({
                url: g5_admin_url+"/ajax.checkmember.php",
                type: "POST",
                data: {
                    "wr_name": wr_name,
                    "phone_num": phone_num
                },
                dataType: "json",
                async: true,
                cache: false,
                success: function(data, textStatus) {
                    if(data.result != "no"){
                        $(".desc_dup").html("");
                        $("#wr_zip").val(data[0].mb_zip1+data[0].mb_zip2);
                        $("#wr_addr1").val(data[0].mb_addr1);
                        $("#wr_addr2").val(data[0].mb_addr2);
                        $("#wr_branch").val(data[0].mb_branch).prop("selected","true");
                        $("#wr_birth").val(data[0].mb_birth);
                        $("#wr_email").val(data[0].mb_email);
                        $("#dup_member").val("Y");
                    }else{
                        $(".desc_dup").html("<class class='color_blue'>해당하는 기존 회원이없습니다.</class>");
                        $("#dup_member").val("N");
                    }
                }
            });
        }
        function ShowAll()
        {
            $("#manager option").css("display","block");
            alert('서비스 기간내 스케쥴이 있는 모든 관리사도 보이게 됩니다.');
        }
        function ShowAll2()
        {
            $("#manager2 option").css("display","block");
            alert('서비스 기간내 스케쥴이 있는 모든 관리사도 보이게 됩니다.');
        }
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }
var is_sms5_submitted = false;  //중복 submit방지
function sms5_chk_send(type)
{
    if( is_sms5_submitted == false ){
        is_sms5_submitted = true;
        var hp_list = document.getElementById('hp_list');
        var wr_message = document.getElementById('wr_message');
        var wr_reply = document.getElementById('wr_reply');
        var wr_reply_regExp = /^[0-9\-]+$/;
        var list = '';
        var wr_fore_type = document.getElementById('wr_fore_type');
        var wr_manager = document.getElementById('manager');
        var selected_manager_id = wr_manager.options[wr_manager.selectedIndex].value;
        var wr_name = document.getElementById('wr_name');

        if(type == "1"){
            wr_message.value = "닥터맘에 예약해 주셔서 감사합니다. 계약서를 보내드리니 확인하신 후 맨 아래 '동의'에 체크해 주시기 바랍니다. <?php echo G5_URL ?>/app_view.php?app_id=<?php echo $wr_id ?>";
        }else if(type == "2"){
            if($("#manager").val() == ""){
                alert("관리사 지정을 먼저 해주시기 바랍니다.");
                return false;
            }
            wr_message.value = "<?php echo $write['wr_name'] ?>고객님. 고객님의 산후조리를 도와주실 건강관리사님입니다. 감동스런 서비스로 보답해 드리겠습니다. 감사합니다. <?php echo G5_URL ?>/manager_view.php?mb_id="+selected_manager_id;
        }else if(type == "3"){
            wr_message.value = "<?php echo $write['wr_name'] ?>고객님. 닥터맘을 이용해 주셔서 진심으로 감사를 드립니다. 본 조사는 닥터맘의 서비스를 평가하여 향후 더 좋은 서비스를 제공하기 위함이니, 바쁘시더라도 솔직한 답변 부탁드립니다. 감사합니다.<?php echo G5_URL ?>/question_view.php?app_id=<?php echo $wr_id ?>";
        }else if(type == "4" || type == "8"){
            wr_message.value = "닥터맘 고객 정보 - 이름:<?php echo $write['wr_name'] ?> \n전화번호: "+hp_list.value+" \n주소:<?php echo $write['addr1'] ?><?php echo $write['addr2'] ?> \n서비스유형:<?php echo get_grade($write['service_type'])?> \n서비스시작:<?php echo $wr_service_start?>\n서비스종료:<?php echo $end_service?>\n메모:<?php echo $wr_content?> ";
            var manager_hp = "";
            if(type=="4"){
            manager_hp = $("#manager option:selected").attr("info");
            }else{
                manager_hp = $("#manager2 option:selected").attr("info");
            }

            if(manager_hp == "" || manager_hp == "undefined"){
                alert("관리사의 휴대폰 번호가 존재하지 않습니다.");
                return false;
            }
            hp_list.value = manager_hp;
        }else if(type == "5"){
            wr_message.value = "<?php echo $write['wr_name'] ?>고객님. 닥터맘에 예약해 주셔서 감사드립니다. 고객님의 예약현황은 다음과 같습니다. \n예약유형 : <?php echo get_grade($write['service_type'])?><?php echo get_genre($write['service_genre']);?><?php echo get_period($write['service_period']);?><?php echo get_workday($write['work_day']);?>\n서비스 총 금액 : <?php echo $write["wr_amount"]?>원\n예약금 : <?php echo $write["wr_deposit"]?>원\n 예약금 계좌번호 : <?php if($write["service_type"] == "5"){ echo $write["mb_voucher"];}else{echo $write["mb_bank_name"].$write["mb_bank_account"];} ?>\n 3일 내에 예약금 입금 부탁드립니다. 예약금 미확인시 예약 취소 되오니 이점 양해 바랍니다. 감사합니다.";
        }else if(type == "6"){
            wr_message.value = "<?php echo $write['wr_name'] ?>고객님 예약금 입금이 확인되었습니다. 출산후 출산소식을 닥터맘에 알려주시기 바랍니다. 감사드립니다.";
        }else if(type == "7"){
            wr_message.value = "<?php echo $write['wr_name'] ?>고객님 아래 URL로 접속하여 결제 요청 드립니다. 감사합니다.<?php echo G5_URL ?>/agspay/AGSMobile_start.php?bo_table=reservation&wr_id=<?php echo $wr_id?>";
        }

        wr_fore_type.value = type;
        if (!wr_message.value) {
            alert('메세지를 입력해주세요.');
            wr_message.focus();
            is_sms5_submitted = false;
            return false;
        }
        if( !wr_reply_regExp.test(wr_reply.value) ){
            alert('회신번호 형식이 잘못 되었습니다.');
            wr_reply.focus();
            is_sms5_submitted = false;
            return false;
        }
        if (hp_list.length < 1) {
            alert('고객님의 휴대전화를 먼저 입력해주세요.');
            is_sms5_submitted = false;
            return false;
        }

        if(confirm("문자를 전송하시겠습니까?")){
			w = document.body.clientWidth/2 - 200;
			h = document.body.clientHeight/2 - 100;
			act = window.open('./sms_admin/sms_ing.php', 'act', 'width=300, height=200, left=' + w + ', top=' + h);
			act.focus();
			$("#send_list").val('h,:'+hp_list.value+'/');
			$("#send_form").submit();
		}else{
			is_sms5_submitted = false;
		}

    } else {
        alert("데이터 전송중입니다.");
    }
}
    function fwrite_submit(f)
    {

        if($("#check_confirm").val() == ""){
            alert("회원체크를 해주세요");
            return false;
        }
        /*<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>
*/


        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: true,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }
        if($("#wr_branch option:selected").val()=="" || $("#wr_branch option:selected").val()==undefined){
            alert("서비스 지역을 선택해주시기 바랍니다.")
            return false;
        }
        if($("#wr_addr1").val() == "" || $("#wr_addr2").val() == ""){
            alert("주소를 입력해주시기 바랍니다.")
            return false;
        }
        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
         function Open_log()
        {
            $(".status_head").show();
            $(".status_log").show();
        }
        function Close_log()
        {
            $(".status_head").hide();
            $(".status_log").hide();
        }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->
