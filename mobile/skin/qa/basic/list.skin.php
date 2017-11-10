<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css">', 0);

?>
<!--닥터맘 mobile/skin/qa/basic/-->


<script src="<?php echo G5_JS_URL ?>/jquery.modal.js"></script>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/jquery.mobile.modal.css">

<div class="m_wrap">
		<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
			<?php echo $board['bo_subject'] ?>
			<h2 id="container_title">문의하기</h2>

			<form name="fboardlist" id="fboardlist"  method="post">
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
			<input type="hidden" name="stx" value="<?php echo $stx ?>">
			<input type="hidden" name="spt" value="<?php echo $spt ?>">
			<input type="hidden" name="sst" value="<?php echo $sst ?>">
			<input type="hidden" name="sod" value="<?php echo $sod ?>">
			<input type="hidden" name="page" value="<?php echo $page ?>">
			<input type="hidden" name="sw" value="">


				<fieldset class="">
					<legend>문의하기 게시판</legend>

					<table class="sub5_1_table">
						<caption>문의하기 게시판</caption>
							<thead>
								<tr>
									<th scope="col" style="">제목</th>
									<th scope="col" style="width:20%">작성자</th>
									<th scope="col" style="">답변</th>
									<th scope="col" style="">등록일</th>
								</tr>
							</thead>
							<tbody>

					<?php
					for ($i=0; $i<count($list); $i++) {
					?>
					<tr>
					<td style="text-align:left;">
						<?if($is_admin){?>
						 <a href="<?php echo $list[$i]['view_href']; ?>" wr_id="<?php echo $list[$i]['qa_id']; ?>"><?php echo $list[$i]['subject']; ?></a>
						<?}else{?>
						<a  href="#ex" id="manual-ajax" class="manual-ajax" wr_id="<?php echo $list[$i]["qa_id"] ?>" rel="modal:open"><?php echo $list[$i]['subject']; ?></a>
						<?}?>
					<?php echo $list[$i]['icon_file']; ?></td>
					<td><?php echo $list[$i]['name']; ?></td>
					<td class="<?php echo ($list[$i]['qa_status'] ? 'txt_done' : 'txt_rdy'); ?>"><?php echo ($list[$i]['qa_status'] ? '답변완료' : '답변대기'); ?></td>
					<td><?php echo $list[$i]['date']; ?></td>
					</tr>
					<?php
					}
					?>

        <?php if ($i == 0) { echo '<tr><td colspan=4 class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
							</tbody>
					</table>
				</fieldset>

				<div class="board_ft">
				<a href="<?php echo $write_href ?>" class="board_m_btn">문의하기</a><!--1개 버튼 사용시-->
					<!--<ul class="board_list_btn"><!--2개 버튼 사용시-->
						<!--<li><a href="">목록</a></li>
						<li><a href="">쓰기</a></li>
					</ul>-->
				</div>
				
				<div style="text-align:center">
					<ul class="board_list">
						<?php echo $list_pages;  ?>
					</ul>
				</div>

				<fieldset id="bo_sch">
					<legend>게시물 검색</legend>
					<form name="fsearch" method="get">
						<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
						<input type="hidden" name="sca" value="<?php echo $sca ?>">
						<input type="hidden" name="sop" value="and">
					<ul class="board_search">
						<li>
							<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
							<select title="검색 분류 선택" name="firstNumber" id="firstNumber" class="sub5_1_select">
								 <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목 + 내용</option>
							</select>
						</li>

						<li><input type="text" class="sub4_1_input" title="검색어입력" size="16" name="stx" id="stx"  value="<?php echo stripslashes($stx) ?>"/></li>
						<li style="margin-left:6px;"><input type="submit" value="찾기" class="sub5_1add_btn"/></li>
					</ul>
				</fieldset>

			</form>

		</div><!--기본 레이아웃 msub_container 끝-->
</div>

<script>
$('.manual-ajax').click(function(event) {
	event.preventDefault();
	$("#wr_id").val($(this).attr("wr_id"));
});
</script>


<div id="ex" style="display:none;"><a href="#" rel="modal:close"></a>
    <form action="./qaview.php" method="post">
		
        <input type="hidden" name="qa_id" id="wr_id" value="">
		
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
<!-- } 게시판 목록 끝 -->