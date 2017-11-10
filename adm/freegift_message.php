<?php
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

check_device($board['bo_device']);

if (isset($write['wr_is_comment']) && $write['wr_is_comment']) {
    goto_url('./board.php?bo_table='.$bo_table.'&amp;wr_id='.$write['wr_parent'].'#c_'.$wr_id);
}



// wr_id 값이 있으면 글읽기
if (isset($wr_id) && $wr_id) {
    // 글이 없을 경우 해당 게시판 목록으로 이동
    if (!$write['wr_id']) {
        $msg = '글이 존재하지 않습니다.\\n\\n글이 삭제되었거나 이동된 경우입니다.';
        alert($msg, './dr_board.php?bo_table='.$bo_table);
    }

    // 그룹접근 사용
    if (isset($group['gr_use_access']) && $group['gr_use_access']) {
        if ($is_guest) {
            $msg = "비회원은 이 게시판에 접근할 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.";
            alert($msg, '/bbs/login.php?wr_id='.$wr_id.$qstr.'&amp;url='.urlencode(G5_ADMIN_URL.'/dr_board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr));
        }

        // 그룹관리자 이상이라면 통과
        if ($is_admin == "super" || $is_admin == "group") {
            ;
        } else {
            // 그룹접근
            $sql = " select count(*) as cnt from {$g5['group_member_table']} where gr_id = '{$board['gr_id']}' and mb_id = '{$member['mb_id']}' ";
            $row = sql_fetch($sql);
            if (!$row['cnt']) {
                alert("접근 권한이 없으므로 글읽기가 불가합니다.\\n\\n궁금하신 사항은 관리자에게 문의 바랍니다.", G5_URL);
            }
        }
    }

    // 로그인된 회원의 권한이 설정된 읽기 권한보다 작다면
    if ($member['mb_level'] < $board['bo_read_level']) {
        if ($is_member)
            alert('글을 읽을 권한이 없습니다.', G5_URL);
        else
            alert('글을 읽을 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.', '/bbs/login.php?wr_id='.$wr_id.$qstr.'&amp;url='.urlencode(G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr));
    }

    // 본인확인을 사용한다면
    if ($config['cf_cert_use'] && !$is_admin) {
        // 인증된 회원만 가능
        if ($board['bo_use_cert'] != '' && $is_guest) {
            alert('이 게시판은 본인확인 하신 회원님만 글읽기가 가능합니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.', './login.php?wr_id='.$wr_id.$qstr.'&amp;url='.urlencode(G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr));
        }

        if ($board['bo_use_cert'] == 'cert' && !$member['mb_certify']) {
            alert('이 게시판은 본인확인 하신 회원님만 글읽기가 가능합니다.\\n\\n회원정보 수정에서 본인확인을 해주시기 바랍니다.', G5_URL);
        }

        if ($board['bo_use_cert'] == 'adult' && !$member['mb_adult']) {
            alert('이 게시판은 본인확인으로 성인인증 된 회원님만 글읽기가 가능합니다.\\n\\n현재 성인인데 글읽기가 안된다면 회원정보 수정에서 본인확인을 다시 해주시기 바랍니다.', G5_URL);
        }

        if ($board['bo_use_cert'] == 'hp-cert' && $member['mb_certify'] != 'hp') {
            alert('이 게시판은 휴대폰 본인확인 하신 회원님만 글읽기가 가능합니다.\\n\\n회원정보 수정에서 휴대폰 본인확인을 해주시기 바랍니다.', G5_URL);
        }

        if ($board['bo_use_cert'] == 'hp-adult' && (!$member['mb_adult'] || $member['mb_certify'] != 'hp')) {
            alert('이 게시판은 휴대폰 본인확인으로 성인인증 된 회원님만 글읽기가 가능합니다.\\n\\n현재 성인인데 글읽기가 안된다면 회원정보 수정에서 휴대폰 본인확인을 다시 해주시기 바랍니다.', G5_URL);
        }
    }

    // 자신의 글이거나 관리자라면 통과
    if (($write['mb_id'] && $write['mb_id'] == $member['mb_id']) || $is_admin) {
        ;
    } else {
        // 비밀글이라면
        if (strstr($write['wr_option'], "secret"))
        {
            // 회원이 비밀글을 올리고 관리자가 답변글을 올렸을 경우
            // 회원이 관리자가 올린 답변글을 바로 볼 수 없던 오류를 수정
            $is_owner = false;
            if ($write['wr_reply'] && $member['mb_id'])
            {
                $sql = " select mb_id from {$write_table}
                            where wr_num = '{$write['wr_num']}'
                            and wr_reply = ''
                            and wr_is_comment = 0 ";
                $row = sql_fetch($sql);
                if ($row['mb_id'] == $member['mb_id'])
                    $is_owner = true;
            }

            $ss_name = 'ss_secret_'.$bo_table.'_'.$write['wr_num'];

            if (!$is_owner)
            {
                //$ss_name = "ss_secret_{$bo_table}_{$wr_id}";
                // 한번 읽은 게시물의 번호는 세션에 저장되어 있고 같은 게시물을 읽을 경우는 다시 비밀번호를 묻지 않습니다.
                // 이 게시물이 저장된 게시물이 아니면서 관리자가 아니라면
                //if ("$bo_table|$write['wr_num']" != get_session("ss_secret"))
                if (!get_session($ss_name))
                    goto_url('./password.php?w=s&amp;bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr);
            }

            set_session($ss_name, TRUE);
        }
    }

    // 한번 읽은글은 브라우저를 닫기전까지는 카운트를 증가시키지 않음
    $ss_name = 'ss_view_'.$bo_table.'_'.$wr_id;
    if (!get_session($ss_name))
    {
        sql_query(" update {$write_table} set wr_hit = wr_hit + 1 where wr_id = '{$wr_id}' ");

        // 자신의 글이면 통과
        if ($write['mb_id'] && $write['mb_id'] == $member['mb_id']) {
            ;
        } else if ($is_guest && $board['bo_read_level'] == 1 && $write['wr_ip'] == $_SERVER['REMOTE_ADDR']) {
            // 비회원이면서 읽기레벨이 1이고 등록된 아이피가 같다면 자신의 글이므로 통과
            ;
        } else {
            // 글읽기 포인트가 설정되어 있다면
            if ($config['cf_use_point'] && $board['bo_read_point'] && $member['mb_point'] + $board['bo_read_point'] < 0)
                alert('보유하신 포인트('.number_format($member['mb_point']).')가 없거나 모자라서 글읽기('.number_format($board['bo_read_point']).')가 불가합니다.\\n\\n포인트를 모으신 후 다시 글읽기 해 주십시오.');

            insert_point($member['mb_id'], $board['bo_read_point'], ((G5_IS_MOBILE && $board['bo_mobile_subject']) ? $board['bo_mobile_subject'] : $board['bo_subject']).' '.$wr_id.' 글읽기', $bo_table, $wr_id, '읽기');
        }

        set_session($ss_name, TRUE);
    }

    $g5['title'] = strip_tags(conv_subject($write['wr_subject'], 255))." > ".((G5_IS_MOBILE && $board['bo_mobile_subject']) ? $board['bo_mobile_subject'] : $board['bo_subject']);
} else {
    if ($member['mb_level'] < $board['bo_list_level']) {
        if ($member['mb_id'])
            alert('목록을 볼 권한이 없습니다.', G5_URL);
        else
            alert('목록을 볼 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.', './login.php?'.$qstr.'&url='.urlencode(G5_BBS_URL.'/board.php?bo_table='.$bo_table.($qstr?'&amp;':'')));
    }

    // 본인확인을 사용한다면
    if ($config['cf_cert_use'] && !$is_admin) {
        // 인증된 회원만 가능
        if ($board['bo_use_cert'] != '' && $is_guest) {
            alert('이 게시판은 본인확인 하신 회원님만 글읽기가 가능합니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.', './login.php?wr_id='.$wr_id.$qstr.'&amp;url='.urlencode(G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr));
        }

        if ($board['bo_use_cert'] == 'cert' && !$member['mb_certify']) {
            alert('이 게시판은 본인확인 하신 회원님만 글읽기가 가능합니다.\\n\\n회원정보 수정에서 본인확인을 해주시기 바랍니다.', G5_URL);
        }

        if ($board['bo_use_cert'] == 'adult' && !$member['mb_adult']) {
            alert('이 게시판은 본인확인으로 성인인증 된 회원님만 글읽기가 가능합니다.\\n\\n현재 성인인데 글읽기가 안된다면 회원정보 수정에서 본인확인을 다시 해주시기 바랍니다.', G5_URL);
        }

        if ($board['bo_use_cert'] == 'hp-cert' && $member['mb_certify'] != 'hp') {
            alert('이 게시판은 휴대폰 본인확인 하신 회원님만 글읽기가 가능합니다.\\n\\n회원정보 수정에서 휴대폰 본인확인을 해주시기 바랍니다.', G5_URL);
        }

        if ($board['bo_use_cert'] == 'hp-adult' && (!$member['mb_adult'] || $member['mb_certify'] != 'hp')) {
            alert('이 게시판은 휴대폰 본인확인으로 성인인증 된 회원님만 글읽기가 가능합니다.\\n\\n현재 성인인데 글읽기가 안된다면 회원정보 수정에서 휴대폰 본인확인을 다시 해주시기 바랍니다.', G5_URL);
        }
    }

    if (!isset($page) || (isset($page) && $page == 0)) $page = 1;

    $g5['title'] = ((G5_IS_MOBILE && $board['bo_mobile_subject']) ? $board['bo_mobile_subject'] : $board['bo_subject']).' '.$page.' 페이지';
}

include_once(G5_PATH.'/head.sub.php');

$width = $board['bo_table_width'];
if ($width <= 100)
    $width .= '%';
else
    $width .='px';

// IP보이기 사용 여부
$ip = "";
$is_ip_view = $board['bo_use_ip_view'];
if ($is_admin) {
    $is_ip_view = true;
    if (array_key_exists('wr_ip', $write)) {
        $ip = $write['wr_ip'];
    }
} else {
    // 관리자가 아니라면 IP 주소를 감춘후 보여줍니다.
    if (isset($write['wr_ip'])) {
        $ip = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", G5_IP_DISPLAY, $write['wr_ip']);
    }
}

// 분류 사용
$is_category = false;
$category_name = '';
if ($board['bo_use_category']) {
    $is_category = true;
    if (array_key_exists('ca_name', $write)) {
        $category_name = $write['ca_name']; // 분류명
    }
}

// 추천 사용
$is_good = false;
if ($board['bo_use_good'])
    $is_good = true;

// 비추천 사용
$is_nogood = false;
if ($board['bo_use_nogood'])
    $is_nogood = true;

$admin_href = "";

// 최고관리자 또는 그룹관리자라면
if ($member['mb_id'] && ($is_admin == 'super' || $group['gr_admin'] == $member['mb_id']))
    $admin_href = G5_ADMIN_URL.'/dr_board_form.php?w=u&amp;bo_table='.$bo_table;
if($bo_table == "reservation" || "promotion"){
	$sub_menu = "600000";
    $board_skin_path = G5_ADMIN_PATH.'/skin/board/'.$bo_table;
}else{
	$sub_menu = "400000";
}

include_once(G5_ADMIN_PATH.'/admin.head.php');

$por_value = sql_fetch('select * from g5_promotion_message');

$free_tab_value = sql_query('select * from g5_write_freegift where wr_2 >= current_Date() order by wr_num desc ');
$free_tab_textarea = sql_query('select * from g5_write_freegift where wr_2 >= current_Date() order by wr_num desc ');


?>



<style>
    /* Style the tab */
div.tab_m {
    overflow: hidden;
    border: 1px solid #ccc; 
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab_m */
div.tab_m button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
	border-right:1px solid #ccc;
}

/* Change background color of buttons on hover */
div.tab_m button:hover {
    background-color: #ddd;
}

/* Create an active/current tab_mlink class */
div.tab_m button.active {
    background-color: rgba(0,0,0,0.2);
	font-weight:bold;
}

/* Style the tab_m content */
.pro_100_d_m, .pro_1_y_m{
    display: none;
}
.cjy_list_170331{
    color:#333;
    font-weight:normal;
    cursor:pointer;
}
.cjy_list_170331:hover{
    background-color:#aaa !important;
}
.dis p{

}
.tabcontent_m textarea{
	border:2px solid #555;
	margin:0 auto;
	
}

</style>






<div class="tab_m">
	<?$free_cnt=0;while($row = sql_fetch_array($free_tab_value) ){ ?>
		<?if( $free_cnt == 0 ){?>
			<button class="tablinks_m active" val='<?=$row['wr_id']?>' vals='tab_textarea_<?=$free_cnt?>' id='tab_<?=$free_cnt?>'><?=$row['wr_4']?></button>
		<?}else{?>
			<button class="tablinks_m" val='<?=$row['wr_id']?>'  vals='tab_textarea_<?=$free_cnt?>' id='tab_<?=$free_cnt?>'><?=$row['wr_4']?></button>
		<?}?>
	<? $free_cnt++;} ?>
</div>





<br><br>
문자발송시 보내실 내용을 입력해주세요.
<br><br>


<form action='/adm/write_update_freegift.php' method='post' class='wr_3_submit'  onclick='return false;'>

<?$free_cnt=0;while($row1 = sql_fetch_array($free_tab_textarea) ){ ?>


	<div id="" class="tabcontent_m all_m tab_<?=$free_cnt?>"  <?if($free_cnt != 0) echo "style='display:none;'"?>>
	<textarea name="wr_3" rows="10" cols="80" style='width:98.8%;' class='wr_3_teaxarea tab_textarea_<?=$free_cnt?>' ><?=$row1['wr_3'];?></textarea>
	</div>


	<input type='hidden' class='wr_3_val' name='wr_3' >
	<input type='hidden' name='w' value='p' >
	<input type='hidden' class='wr_id_val'  name='wr_id' >


<?$free_cnt++;}?>
</form>
<br>
<button type='submit' class='btn freeform' style='float:right;width:120px; height:40px; border:none; background:#373333; color:white;' onclick='return false;' >저장하기</button>


<!-- <div class='dis'>
<p>* 고객이름 표기는 [name] 입니다.<br>* 이미지 발송은 불가합니다.</P>
</div> -->




<script>

$(function(){
	$('#chkall').click(function(){
		if( $(this).is(':checked') ){
			$('.checked1_1').each(function(){
				$(this).prop('checked', true);
			})
		}else{
			$('.checked1_1').each(function(){
				$(this).prop('checked', false) ;
			})
		}
	})


	$('.tablinks_m').click(function(){
		$('.tabcontent_m').each(function(index){
			$(this).css('display','none');
			$('#tab_'+index).removeClass('active');
		})
		$(this).addClass('active');
		$('.'+$(this).attr('id')).css('display','block');
		
	})

	$('.freeform').click(function(){
		
		$('.wr_3_val').attr('value', $('.'+$('.active').attr('vals')).val() );
		$('.wr_id_val').attr('value', $('.active').attr('val') );
		
		$('.wr_3_submit').submit();
		

	})

})


</script>   



<?
//include_once(G5_ADMIN_PATH.'/admin.tail.php');

//include_once(G5_PATH.'/tail.sub.php');
?>





