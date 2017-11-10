<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
?>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
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
					
					<!--<p class="board_list_btn"><a href="">목록</a></p><!--1개 버튼 사용시-->

					<ul class="board_list_btn"><!--2개 버튼 사용시-->
						<li><a href="">목록</a></li>
						<li><a href="">쓰기</a></li>
					</ul>
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

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>