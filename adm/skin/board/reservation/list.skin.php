<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가



// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 7;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);


for($i=0; $i<count($status_r); $i++){
	$str_status_r .= "&status_r[]=".$status_r[$i];
	if( $status_r[$i] == 1 ){
		$sta[1] = $status_r[$i];
	}else if( $status_r[$i] == 2 ){
		$sta[2] = $status_r[$i];
	}else if( $status_r[$i] == 3 ){
		$sta[3] = $status_r[$i];
	}else if( $status_r[$i] == 4 ){
		$sta[4] = $status_r[$i];
	}else if( $status_r[$i] == 5 ){
		$sta[5] = $status_r[$i];
	}
}

?>


<STYLE>
 i{margin-left:3px; padding-top:-5px;}   
</STYLE>

<link rel="stylesheet" href="./css/font-awesome.min.css">


<h1 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h1>
<!-- 게시판 검색 시작 { -->
<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
        <input type="checkbox" name="status_r[]" id="status_1" value="1" <?php if($sta[1]){?>checked<?php } ?>><label for="status_1">예약접수</label>
        <!--<input type="checkbox" name="status_r[]" id="status_2" value="2" <?php if(strpos($status_in,"2")  > 0 ){?>checked<?php } ?>><label for="status_2">예약확인</label>-->
        <input type="checkbox" name="status_r[]" id="status_3" value="3" <?php if($sta[3]){?>checked<?php } ?>><label for="status_3">예약완료</label>
        <input type="checkbox" name="status_r[]" id="status_4" value="4" <?php if($sta[4]){?>checked<?php } ?>><label for="status_4">예약취소</label>
        <input type="checkbox" name="status_r[]" id="status_5" value="5" <?php if($sta[5]){?>checked<?php } ?>><label for="status_5">서비스종료</label>

    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
        <?php if($member["mb_level"] > 8){ ?>
        <?php echo get_branch_name_select("branch",$_REQUEST["branch"],"class='adm_sel1'","y") ?>
        <?php } ?>
    <select name="sfl" id="sfl" class="adm_sel1">
        <option value="wr_name"<?php echo get_selected($sfl, 'wr_name', true); ?>>이름</option>
        <option value="phone"<?php echo get_selected($sfl, 'phone'); ?>>전화번호</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>메모</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" id="stx" class="frm_input" size="15" maxlength="20" style="background:none !important;">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">예약추가</a></li><?php } ?>
        </ul>
        <?php } ?>
<!-- } 게시판 검색 끝 -->
<!-- 게시판 목록 시작 { -->
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
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
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
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">접수형태</th>
			<th scope="col">지사</th>
            <th scope="col"><?php echo subject_sort_link('wr_name', $qstr2, '1') ?> 이름 <i class="fa fa-sort-desc" aria-hidden="true"></i></th>
            <th scope="col"><?php echo subject_sort_link('phone', $qstr2, 1) ?>연락처 <i class="fa fa-sort-desc" aria-hidden="true"></th>
            <th scope="col"><?php echo subject_sort_link('service_start', $qstr2, 1) ?>서비스시작일 <i class="fa fa-sort-desc" aria-hidden="true"></th>
            <th scope="col">서비스기간</th>
            <th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>등록날짜<i class="fa fa-sort-desc" aria-hidden="true"></th>
            <th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>예약상태<i class="fa fa-sort-desc" aria-hidden="true"></th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['num'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div class="cjy_list_170331"><?php echo $list[$i]['wr_type'] ?></div>
			</td>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div><?=get_branch_nick($list[$i]['res_branch'])?></div>
			</td>
            <td class="td_date">
                <a href="./dr_write.php?bo_table=<?php echo $bo_table ?>&w=u&wr_id=<?php echo $list[$i]['wr_id'] ?>&page=<?php echo $page.$qstr ?>">
                <?php echo $list[$i]['name'] ?>
                </a>
            </td>
            <td class="td_date sv_use"><?php echo $list[$i]['phone'] ?></td>
            <td class="td_date sv_use"><?php echo $list[$i]['service_start'] ?></td>
            <td class="td_date sv_use"><?php echo $list[$i]['service_period'].주 ?></td>
            <td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
            <td class="td_num"><div class='cjy_list_170331'><?php echo StatusToName($list[$i]['status']) ?></div></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><a href="<?php echo G5_ADMIN_URL ?>/excel.board.php?<?php echo $_SERVER['QUERY_STRING'] ?>" class="btn_b02">엑셀다운</a></li>
        </ul>
        <?php } ?>
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">예약추가</a></li><?php } ?>
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

<!-- 페이지 -->
<?php 
$write_pages = get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, './dr_board.php?bo_table='.$bo_table.'&'.$qstr2.'&amp;page=',"&stx=".$stx."&sfl=".$sfl."&sca=".$sca.$str_status_r);
echo $write_pages;  

?>




	


<?php if ($is_checkbox) { ?>
<script>
$(function(){
    $('.td_type').each(function(){
        if( $(this).text() ){
            if( $(this).text() == 0){
                $(this).children().text('산후도우미');
                $(this).children().css('color','#d23474');
            }else if( $(this).text() == 1) {
                $(this).children().text('모유수유');
                $(this).children().css('color','#3cad9c');
            }
        }
    })

    $('.td_num').each(function(){
        if( $(this).text()== '예약접수'){
            $(this).children().css('background','rgb(218, 52, 82)');
        }else if( $(this).text()== '예약완료'){
             $(this).children().css('background','#e2d2b8');
        }else if( $(this).text()== '예약확인'){
             $(this).children().css('background','#267d7d');
        }else if( $(this).text()== '예약취소'){
             $(this).children().css('background','#011C26');
        }else if( $(this).text()== '서비스종료'){
             $(this).children().css('background','#797979');
        }

    })

})


function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./dr_board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./dr_move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
