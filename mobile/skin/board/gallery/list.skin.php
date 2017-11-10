<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<script src="<?php echo G5_JS_URL; ?>/jquery.fancylist.js"></script>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
            		<div class="msub_container">
<h2 id="container_title"><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?><span class="sound_only"> 목록</span></h2>
				<fieldset class="">
					<legend>겔러리 게시판</legend>
					<div class="board_gall">
						<ul class="gall_list">
        <?php for ($i=0; $i<count($list); $i++) {
        ?>
							<li>
								<a href="<?php echo $list[$i]['href'] ?>">
                    <?php
                    if ($list[$i]['is_notice']) { // 공지사항 ?>
                        <strong style="width:<?php echo $board['bo_mobile_gallery_width'] ?>px;height:<?php echo $board['bo_mobile_gallery_height'] ?>px">공지</strong>
                    <?php
                    } else {
                        $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_mobile_gallery_width'], $board['bo_mobile_gallery_height']);

                        if($thumb['src']) {
                            $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_mobile_gallery_width'].'" >';
                        } else {
                            $img_content = '<span style="width:'.$board['bo_mobile_gallery_width'].'px;height:'.$board['bo_mobile_gallery_height'].'px">no image</span>';
                        }

                        echo $img_content;
                    }
                    ?>
                    </a>
									<span class="gall_txt m_subject"><?php
                    // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                    if ($is_category && $list[$i]['ca_name']) {
                    ?>
                    <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                    <?php } ?>
                    <a href="<?php echo $list[$i]['href'] ?>">
                        <?php echo $list[$i]['subject'] ?>
                        <?php
                    if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                    if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                    ?>
                    </a>
                    </span>

							</li>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
						</ul>
					</div>

				</fieldset>


				<div class="board_ft">
					<ul class="board_list">
<?php echo $write_pages;  ?>
					</ul>
				</div>


				<fieldset class="">
					<legend>게시물검색</legend>
					<ul class="board_search">
						<li>
							<label for="boardSearch" class="hide">분류 선택(라벨)</label>
    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
							<select title="검색 분류 선택" name="sfl" id="sfl" class="sub5_1_select">
								<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                                <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                                <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
							</select>
						</li>

						<li><input name="stx" value="<?php echo stripslashes($stx) ?>" placeholder="검색어(필수)" required id="stx" class="sub4_1_input" style="width:90%;"></li>
						<li><input type="submit" value="찾기" class="sub5_1add_btn" onclick=""/></li>
					</ul>
				</fieldset>


		</div><!--기본 레이아웃 msub_container 끝-->
        </div>

<script>
$(window).on("load", function() {
    $("#gall_ul").fancyList(".gall_li", "gall_clear");
});
</script>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>


<?php if ($is_checkbox) { ?>
<script>
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
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- 게시판 목록 끝 -->
