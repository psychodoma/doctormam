<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(!(isset($day))){
    $day = 7;
}
if(!(isset($option))){
    $option = "wr_name";
}


if($page){
	$page_math = ($page-1) * 10;
}else{
	$page_math = 0;
}



	if( $pro_option == "all" ){  //모두 보기일때///

		$sql = "select * from g5_write_reservation where wr_1 != '' and wr_2 = '' ";
		$sql_cnt = "select count(*) cnt from g5_write_reservation where wr_1 != '' and wr_2 = '' ";
		
	}else if( $pro_option == "complete" ){  // 보낸 사은품 일때//

		$sql = "select * from g5_write_reservation where wr_2 != '' ";
		$sql_cnt = "select count(*) cnt from g5_write_reservation where wr_2 != '' ";

	}else{  // 사은품 일때 //

		$sql = "select * from g5_write_reservation where wr_1 = ".$pro_option." and wr_2 = '' ";
		$sql_cnt = "select count(*) cnt from g5_write_reservation where wr_1 = ".$pro_option." and wr_2 = '' ";

	} 

	if( $member['mb_level'] == 7 ){
		$sql .= " and res_branch = ".$member['mb_no'];
		$sql_cnt .= " and res_branch = ".$member['mb_no'];	
	}


		if( $word ){
			$sql .= " and ".$option." like '%".$word."%' ";
			$sql_cnt .= " and ".$option." like '%".$word."%' ";
		}

		if( $res_branch ){
			$sql .= " and res_branch = ".$res_branch;
			$sql_cnt .= " and res_branch = ".$res_branch;
		}

		if( $month ){
			$sql .= " and substr(wr_2,1,7) = '".$month."' ";
			$sql_cnt .= " and substr(wr_2,1,7) = '".$month."' ";
		}

		if( $pro_option == "complete" ){
			$sql .= " order by wr_2  desc ";
		}

		$sql .= " limit ".$page_math." ,10  ";

		$free_result = sql_query($sql);
		$free_result_cnt = sql_fetch($sql_cnt);
		
		$totalPage  = ceil($free_result_cnt['cnt'] / 10);  // 전체 페이지 계산
		if(!(isset($currentPage))){
			 $currentPage = 1;
		}
		$current_first  = (int)($currentPage-1)*10;
		$current_second  = (int)$currentPage*10;  


//문자 내용
$pro_result_message = sql_fetch('select * from g5_promotion_message where me_id = 1');


$free_tab_value = sql_query('select * from g5_write_freegift where wr_2 >= current_Date() order by wr_num desc ');

?>



<style>
    /* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab a {
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
div.tab a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab a.active {
    background-color: #ccc;
}

/* Style the tab content */
.pro_100_d, .pro_1_y, .pro_event, .suc{
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
.pro_date{
    color:white;
}
.info_text{
	background:rgba(242,244,247,1);
	color:black;
	font-weight:bold;
	padding: 10px 20px;
	margin:0 0 20px 0;
	font-size:13px;
	border-radius:5px;
}
.info_text i{margin-right:10px;}

		#monthpicker {
			width: 60px;
		}
		#btn_monthpicker {
			background: url('./datepicker.png');
			border: 0;
			height: 24px;
			overflow: hieen;
			text-indent: 999;
			width: 24px;
		}

.btn-img{
	background-image: url('http://doctormam.com/img/calendar.gif') !important;
	width: 16px !important;
	height: 15px !important;
	cursor:pointer;
}
</style>







<div class="info_text"><i class="fa fa-check" aria-hidden="true"></i>보내기 버튼을 누르면 SMS 문자가 발송됩니다.</div>

<div class="tab">
	
	<a href='/adm/dr_board.php?bo_table=freegift&pro_option=all' class="tablinks_m <?if( $pro_option == 'all' ) echo "active"; ?>" val='<?=$row['wr_id']?>' vals='tab_textarea_<?=$free_cnt?>' id='tab_<?=$free_cnt?>'>모두보기</a>
	<?$free_cnt=0;while($row = sql_fetch_array($free_tab_value) ){ ?>
		<?if($pro_option == $row['wr_id'] ){?>
			<a href='/adm/dr_board.php?bo_table=freegift&pro_option=<?=$row['wr_id']?>' class="tablinks_m active" val='<?=$row['wr_id']?>' vals='tab_textarea_<?=$free_cnt?>' id='tab_<?=$free_cnt?>'><?=$row['wr_4']?></a>
		<?}else{?>
			<a href='/adm/dr_board.php?bo_table=freegift&pro_option=<?=$row['wr_id']?>' class="tablinks_m" val='<?=$row['wr_id']?>' vals='tab_textarea_<?=$free_cnt?>' id='tab_<?=$free_cnt?>'><?=$row['wr_4']?></a>
		<?}?>
	<? $free_cnt++;} ?>

	<a href='/adm/dr_board.php?bo_table=freegift&pro_option=complete' class="tablinks_m <?if( $pro_option == 'complete' ) echo "active"; ?>" val='<?=$row['wr_id']?>' vals='tab_textarea_<?=$free_cnt?>' id='tab_<?=$free_cnt?>'>보낸사은품</a>


</div>
<br>
<fieldset id="bo_sch" style='margin-top:4px; float:right;'>
    <legend>게시물 검색</legend>
    <form name="fsearch" action='./dr_board.php' method="get">
		
			<?if($pro_option == 'complete'){?>
				<input class="frm_input" name='month' value='<?=$month?>' id='monthpicker' type='text'>
				<input class='btn-img' type='button' id='btn_monthpicker'>&nbsp;&nbsp;&nbsp;
			<?}?>

        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
        <label for="option" class="sound_only">검색대상</label>

        <?php if($member['mb_level'] > 7) echo get_branch_name_select("res_branch",$res_branch, ' class="frm_input" ') ?>
        <select name="option" id="option" class="option">
            <option value="wr_name" <?if($option=="wr_name") echo "selected"?> >이름</option>
            <option value="phone" <?if($option=="phone") echo "selected"?> >전화번호</option>
        </select>

        <label for="word" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="word"  id="word" class="frm_input" size="15" maxlength="20" value=<?=$word?>>
        <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>
<br><br>

<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jquery.mtz.monthpicker.js"></script>
	<script>
		/* MonthPicker 옵션 */
		options = {
			pattern: 'yyyy-mm', // Default is 'mm/yyyy' and separator char is not mandatory
			selectedYear: 2017,
			startYear: 2010,
			finalYear: 2019,
			monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월']
		};
		
		/* MonthPicker Set */
		$('#monthpicker').monthpicker(options);
		
		/* 버튼 클릭시 MonthPicker Show */
		$('#btn_monthpicker').bind('click', function () {
			$('#monthpicker').monthpicker('show');
		});
		

	</script>
<div id="" class="tabcontent all">
<div id="bo_list" style="width:<?php echo $width; ?>">



    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($free_result_cnt['cnt']) ?>건</span>
            <?php echo $totalPage ?> 페이지
        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" id='bo_table' value="<?php echo $bo_table ?>">
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="day" id='day' value="<?php echo $day ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col" style='width:5%;'>번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col" style='width:3%;'>
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" class='checked1' id="chkall" ck='no'>
            </th>
            <?php } ?>
			<th scope="col">지사</th>
            <th scope="col" style='width:5%;'>이름</th>
            <th scope="col">연락처</th>
			<th scope="col" style='width:25%;'>주소</th>
            <th scope="col" style='width:20%;'>사은품 종류</th>
			<th scope="col">아기성별</th>
			<?if( $pro_option == "complete" ){?>
				<th scope="col" style='width:13%;'>보낸 날짜</th>
			<?}else{?>
				<th scope="col">메시지 보내기</th>
				<th scope="col">완료</th>
			<?}?>

            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
         while ($list = sql_fetch_array($free_result)){ 
         ?>
        
        <tr class="<?php if ($list['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list['wr_id'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list['subject'] ?></label>
                <input type="checkbox" class='checked1_1' name="chk_wr_id[]" value="<?php echo $list['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
			<td style='width:10%; text-align:center;'><?=get_branch_nick($list['res_branch'])?> </td>
            <td class="td_date">
                <a href="./dr_write.php?bo_table=reservation&w=u&wr_id=<?php echo $list['wr_id'] ?>&page=<?php echo $page.$qstr ?>">
					<?php echo $list['wr_name'] ?>
                </a>
            </td>
            <td class="td_date sv_use"><?php echo $list['phone'] ?></td>
			<td class="td_date sv_use"><?php echo $list['addr1'] ?> <?php echo $list['addr2'] ?> <?php echo $list['addr3'] ?></td>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div class=""><?=get_freegift_subject($list['wr_1'])?></div>
	        </td>
            <td class="td_date sv_use td_type" style="padding:5px;"><?php echo $list['wr_baby_sex']?></td>
			<?if( $pro_option == "complete" ){?>
				<td class="td_date"><?=$list['wr_2']?></td>
			<?}?>


			<?if( $pro_option != "complete" ){?>
				<td class="td_num"><div class='cjy_list_170331' wr='<?=$list['wr_id']?>' val=1  wrtpe='<?=get_freegift_msg($list['wr_1'])?>'  >보내기</div></td>
				<td class="td_num"><div class='cjy_list_170331' wr='<?=$list['wr_id']?>' val=2  wrtpe='<?=get_freegift_msg($list['wr_1'])?>' >보내기 완료</div></td>
			<?}?>
			
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list['wr_nogood'] ?></td><?php } ?>


        </tr>
        <?php } ?>
        <?php if ($list) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택문자보내기" onclick="document.pressed=this.value" style='width:130px;'></li>
            <li><input type="submit" name="btn_submit" value="선택완료하기" onclick="document.pressed=this.value" style='width:130px;'></li>
        </ul>

		
        <ul class="btn_bo_adm" style='float:right;'>
			<li><a href="<?php echo G5_ADMIN_URL ?>/excel.freegift.php?bo_table=freegift&pro_option=<?=$pro_option?>&month=<?=$month?>&res_branch=<?=$res_branch?>&option=<?=$option?>&word=<?=$word?>" class="btn_b02">엑셀다운</a></li>
        </ul>
		

        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<form name="pro_submit" id="pro_submit" action="./freegift_send.php" method="post">
    <input type='hidden' name='test' value='123'>
    <input type='hidden' name='wr_id'id='wr_id' value=''>
	<input type='hidden' name='val'id='val' value=''>
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
</form>

<style>

#container{ padding-bottom:20px; }
</style>

<?php 
$write_pages = get_paging($config[cf_write_pages], $page, $totalPage, "/adm/dr_board.php?bo_table=freegift&pro_option=".$pro_option."&word=".$word."&res_branch=".$res_branch."&option=".$option."&month=".$month);
?>


</div>

</div>





<script>
    $(function(){
        $('.cjy_list_170331').click(function(){
			if ( $(this).attr('val')  == 1 ){
				var result = confirm('문자를 보내시겠습니까?');
			}else{
				var result = confirm('완료 하시겠습니까?\n완료한 고객은 보낸사은품 리스로 이동 됩니다.');
			}

            if(result) { 
                $('#wr_id').attr('value', $(this).attr('wr'));
				$('#val').attr('value', $(this).attr('val'));
                $('#pro_submit').submit();
            }
        })
    })
</script>