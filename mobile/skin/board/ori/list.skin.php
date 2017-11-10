<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
            		<div class="msub_container">

			<form method="post" action="" class="sub5_1_fc">
				<fieldset class="">
					<legend>겔러리 게시판</legend>

					<div class="board_gall">
						<ul class="gall_list">
							<li>
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동 자라와 거북이의 알콩달콩</span>
								</a>
							</li>
							<li style="margin-right:0;">
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동</span>
								</a>
							</li>

							<li>
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동</span>
								</a>
							</li>
							<li style="margin-right:0;">
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동</span>
								</a>
							</li>

							<li>
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동 자라와 거북이의 알콩달콩</span>
								</a>
							</li>
							<li style="margin-right:0;">
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동</span>
								</a>
							</li>

							<li>
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동</span>
								</a>
							</li>
							<li style="margin-right:0;">
								<a href="">
									<img src="<?php echo G5_MOBILE_IMG ?>/sub/gall_test.jpg" alt="갤러리"/>
									<span class="gall_txt">지점장님들의 봉사활동</span>
								</a>
							</li>
							
						</ul>
					</div>

				</fieldset>
		
				
				<div class="board_ft">
					<ul class="board_list">
						<li class="pprev"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_pprev.jpg" alt="맨끝으로 이동"/></a></li>
						<li class="prev"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_prev.jpg" alt="끝으로 이동"/></a></li>
						<li class="board_strong"><a href="">1</a></li>
						<li class=""><a href="">2</a></li>
						<li class=""><a href="">3</a></li>
						<li class=""><a href="">4</a></li>
						<li class=""><a href="">5</a></li>
						<li class=""><a href="">6</a></li>
						<li class=""><a href="">7</a></li>
						<li class=""><a href="">8</a></li>
						<li class=""><a href="">9</a></li>
						<li class=""><a href="">10</a></li>
						<li class="next"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_next.jpg" alt="앞으로 이동"/></a></li>
						<li class="nnext"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_nnext.jpg" alt="맨앞으로 이동"/></a></li>
					</ul>
					
					<p class="board_list_btn"><a href="">목록</a></p><!--1개 버튼 사용시-->

					<!--<ul class="board_list_btn"><!--2개 버튼 사용시-->
						<!--<li><a href="">목록</a></li>
						<li><a href="">쓰기</a></li>
					</ul>-->
				</div>

				<fieldset class="">
					<legend>산후도우미 예약하기</legend>
					<ul class="board_search">
						<li>
							<label for="boardSearch" class="hide">분류 선택(라벨)</label>
							<select title="검색 분류 선택" name="firstNumber" id="firstNumber" class="sub5_1_select">
								<option value="">전체</option>
								<option value="">이름</option>
								<option value="">내용</option>
							</select>
						</li>

						<li><input type="text" class="sub4_1_input" title="검새거입력" name="boardSearch" id=""/></li>
						<li><input type="button" value="찾기" class="sub5_1add_btn" onclick=""/></li>
					</ul>
				</fieldset>

			</form>

		</div><!--기본 레이아웃 msub_container 끝-->
		<div class="msub_container">

			<form method="post" action="" class="sub5_1_fc">
				<fieldset class="">
					<legend>뉴스 게시판</legend>

					<table summary="번호,지사,제목,작성자,등록일,조회수" class="sub5_1_table">
						<caption>뉴스 게시판</caption>
							<colgroup>
								<col width="10%"/>
								<col width="18%"/>
								<col width="*%"/>
								<col width="14%"/>
								<col width="14%"/>
								<col width="14%"/>
							</colgroup>
							<thead>
								<tr>
									<th scope="col" style="width:10%">번호</th>
									<th scope="col" style="width:18%">지사</th>
									<th scope="col" style="width:30%">제목</th>
									<th scope="col" style="width:14%">작성자</th>
									<th scope="col" style="width:14%">등록일</th>
									<th scope="col" style="width:14%">조회수</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>3</td>
									<td>수원점</td>
									<td class="sub5_borad_name"><a href="">닥터맘 고양김포파주지사 이벤트 닥터맘</a></td>
									<td>관리자</td>
									<td>2016-07-22</td>
									<td>100</td>
								</tr>
								<tr>
									<td>2</td>
									<td>본사</td>
									<td class="sub5_borad_name"><a href="">2016년 프리미엄 교육 현장^^</a></td>
									<td>관리자</td>
									<td>2016-07-22</td>
									<td>100</td>
								</tr>
								<tr>
									<td>1</td>
									<td>강북 동대문점</td>
									<td class="sub5_borad_name"><a href="">수원지사 응급처치 교육</a></td>
									<td>관리자</td>
									<td>2016-07-22</td>
									<td>100</td>
								</tr>
							</tbody>
					</table>
				</fieldset>

				<div class="board_ft">
					<ul class="board_list">
						<li class="pprev"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_pprev.jpg" alt="맨끝으로 이동"/></a></li>
						<li class="prev"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_prev.jpg" alt="끝으로 이동"/></a></li>
						<li class="board_strong"><a href="">1</a></li>
						<li class=""><a href="">2</a></li>
						<li class=""><a href="">3</a></li>
						<li class=""><a href="">4</a></li>
						<li class=""><a href="">5</a></li>
						<li class=""><a href="">6</a></li>
						<li class=""><a href="">7</a></li>
						<li class=""><a href="">8</a></li>
						<li class=""><a href="">9</a></li>
						<li class=""><a href="">10</a></li>
						<li class="next"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_next.jpg" alt="앞으로 이동"/></a></li>
						<li class="nnext"><a href=""><img src="<?php echo G5_MOBILE_IMG ?>/sub/con_nnext.jpg" alt="맨앞으로 이동"/></a></li>
					</ul>
					
					<p class="board_list_btn"><a href="">목록</a></p><!--1개 버튼 사용시-->

					<!--<ul class="board_list_btn"><!--2개 버튼 사용시-->
						<!--<li><a href="">목록</a></li>
						<li><a href="">쓰기</a></li>
					</ul>-->
				</div>

				<fieldset class="">
					<legend>산후도우미 예약하기</legend>
					<ul class="board_search">
						<li>
							<label for="boardSearch" class="hide">분류 선택(라벨)</label>
							<select title="검색 분류 선택" name="firstNumber" id="firstNumber" class="sub5_1_select">
								<option value="">전체</option>
								<option value="">이름</option>
								<option value="">내용</option>
							</select>
						</li>

						<li><input type="text" class="sub4_1_input" title="검새거입력" name="boardSearch" id=""/></li>
						<li><input type="button" value="찾기" class="sub5_1add_btn" onclick=""/></li>
					</ul>
				</fieldset>

			</form>

		</div><!--기본 레이아웃 msub_container 끝-->
        </div>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages; ?>

<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
    </select>
    <input name="stx" value="<?php echo stripslashes($stx) ?>" placeholder="검색어(필수)" required id="stx" class="required frm_input" size="15" maxlength="20">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>

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
