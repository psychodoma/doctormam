<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>


<?php if($bo_table=="review"){ ?>
    <script src="<?php echo G5_JS_URL ?>/jquery.modal.js"></script>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/jquery.mobile.modal.css">
    <?php } ?>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
<h2 id="container_title"><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> <?php if ($is_category) { ?>| <?php echo $_REQUEST["sca"]?><?php } ?><span class="sound_only"> 목록</span></h2>
			<form method="post" action="" class="sub5_1_fc">
				<fieldset class="">
					<legend>뉴스 게시판</legend>
    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
					<table summary="번호,지사,제목,작성자,등록일,조회수" class="sub5_1_table">
						<caption>뉴스 게시판</caption>
							<thead>
								<tr>
									<?php if($bo_table == "review"){?><th scope="col" width="30%">지점</th><?php } ?>
									<th scope="col">제목</th>
									<th scope="col" width="15%">등록일</th>
								</tr>
							</thead>
							<tbody>
							<?php
							for ($i=0; $i<count($list); $i++) {
							?>
								<tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
                        <?php if($bo_table == "review"){?><td><?php echo get_branch($list[$i]['branch'])?></td><?php } ?>
									<td class="m_subject" style="text-align:left;">
										<?php
										echo $list[$i]['icon_reply'];
										if ($is_category && $list[$i]['ca_name']) {
										?>
										<!--<a href="<?php /*echo $list[$i]['ca_name_href'] */?>" class="bo_cate_link"><?php /*echo $list[$i]['ca_name'] */?></a>-->
										<?php } ?>

										<a href="<?php echo $list[$i]['href'] ?>">
											<?php echo $list[$i]['subject'] ?>
											<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
											<?php
											// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
											// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

											if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
											if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
											if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
											if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
											if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

											?>
										</a>
									</td>
									<td><?php echo $list[$i]['datetime2'] ?></td>
								</tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
							</tbody>
					</table>
		</form>
				</fieldset>



				<div class="board_ft">
					<?php if($bo_table=="review"){?> <p class="board_list_btn"><a href="#ex" id="manual-ajax" class="manual-ajax board_wri_btn" style="width:100%;" rel="modal:open">글 쓰기</a><?php } ?></p>
					<ul class="board_list">
						<?php echo $write_pages; ?>
					</ul>
				</div>

				<fieldset class="">
					<legend>게시물검색</legend>
					<ul class="board_search">

                           <form name="fsearch" method="get">
						                       <?php
                    if($bo_table == "review"){?>
                        <?php echo get_all_branch_select("branch",$_REQUEST["branch"],"class='sub5_1_select'","y") ?>
                    <?php } ?>
						<li>
							<label for="boardSearch" class="hide">분류 선택(라벨)</label>

                            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                            <input type="hidden" name="sca" value="<?php echo $sca ?>">
                            <input type="hidden" name="sop" value="and">
                            <label for="sfl" class="sound_only">검색대상</label>
							<select title="검색 분류 선택" name="sfl" id="sfl" class="sub5_1_select" style="width:75px;">
								<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                                <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                                <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
							</select>
						</li>

						<li style="width:35%;"><input name="stx" value="<?php echo stripslashes($stx) ?>" placeholder="검색어(필수)" id="stx" class="sub4_1_input" style="width:90%;"></li>
						<li><input type="submit" value="찾기" class="sub5_1add_btn" onclick=""/></li>
					</ul>
					</form>
				</fieldset>



		</div><!--기본 레이아웃 msub_container 끝-->
        </div>

<?php if($bo_table=="review"){?>
    <script>
$('.manual-ajax').click(function(event) {
  event.preventDefault();

});
</script>

<div id="ex" style="display:none;"><a href="#" rel="modal:close"></a>
    <!-- <form action="./qaview.php" method="post"> -->
	<form action="./write.php?bo_table=review" method="post">

        <div class="mo_name">
			<label for="wr_service_start" class="" style="">이름 : </label>
			<input type="text" class="" title="이름입력" name="wr_name" id="wr_name" style="" required minlength="2" maxlength="20">
		</div>
		
		 <div class="mo_cell">
			<label for="wr_service_start">휴대번호 : </label>
			<?php echo get_phone_select("wr_hp1",$wr_hp1,'required class=""') ?>
			<input type="text" class="" title="두번째 자리" name="wr_hp2" id="wr_hp2" required maxlength="4"/>
			<input type="text" class="" title="마지막 자리" name="wr_hp3" id="wr_hp3" required maxlength="4"/>
		</div>

		 <div class="mo_btn">
			<input type="submit" name="btn_submit" id="btn_submit" class="pass_btn" value="확인">
		</div>
    </form>
</div>
<?php } ?>
<!-- 게시판 목록 끝 -->
