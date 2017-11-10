<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
?>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
			<div class="sub4_select">
				<h3 class="sub3_5_tc_title mb30">모유수유 전문가 예약하기</h3>

				<form method="post" action="" name="" class="sub4_1_fc">
					<fieldset class="">
						<legend>산후도우미 예약하기</legend>

						<table class="sub4_1_table" summary="이름 사는지역 연락처를 작성해주세요">
							<caption>지원하기</caption>

							<tbody>
								<tr>
									<th width="width:28%;">신청자 성함</th>
									<td><input type="text" class="sub4_1_input" title="이름입력" name="name" id=""/></td>
								</tr>
								<tr>
									<th>입금인 성함</th>
									<td><input type="text" class="sub4_1_input" title="입금자이름" name="accname" id=""/></td>
								</tr>
								<tr>
									<th>이메일</th>
									<td><input type="text" class="sub4_1_input_b" title="이메일입력" name="email" id=""/></td>
								</tr>
								<tr>
									<th>전화번호</th>
									<td>
										<ul class="sub4_1_tell">
											<li style="width:20%">
												<label for="firstNumber" class="hide">분류 선택(라벨)</label>
												<select title="검색 분류 선택" name="firstNumber" id="firstNumber" class="sub4_1_select">
													<option value="">010</option>
													<option value="">011</option>
													<option value="">016</option>
													<option value="">017</option>
													<option value="">018</option>
													<option value="">019</option>
												</select>
											</li>
											<li style="width:73%">
												<input type="text" class="sub4_1_input_tell" title="두번째 자리" name="tell1" id=""/><span class="hypn">-</span>
												<input type="text" class="sub4_1_input_tell" title="마지막 자리" name="tell2" id=""/>
											</li>
										</ul>
									</td>
								</tr>
								<tr>
									<th>집 주소</th>
									<td>
										<ul class="sub4_1_add">
											<li>
												<input type="text" class="sub4_1_input_s" title="아이디입력" name="add" id="" readonly="readonly"/><span class="hypn">-</span>
												<input type="button" value="우편번호" class="sub4_1add_btn" onclick=""/>
											</li>
											<li>
												<input type="text" class="sub4_1_input_b" title="기본주소" name="address1" id="" readonly="readonly"/><span class="sub4_1addTxt">기본주소</span>
											</li>
											<li>
												<input type="text" class="sub4_1_input_b" title="나머지주소" name="address2" id=""/><span class="sub4_1addTxt">나머지주소</span>
											</li>
										</ul>
									</td>
								</tr>
								<tr>
									<th>서비스종류</th>
									<td>
										<label for="service2" class="hide">분류 선택(라벨)</label>
										<select title="검색 분류 선택" name="service2" id="service1" class="sub4_2_select_service1">
											<option value="">서비스 종류를 선택하세요</option>
											<option value="">모유수유 전문가 서비스</option>
											<option value="">패키지 - 프리미엄</option>
											<option value="">패키지 - 편명유두및 함몰유</option>
											<option value="">유두혼동교정</option>
											<option value="">유방울혈 및 유두상처</option>
											<option value="">목욕및 아기 마사지</option>
										</select>
									</td>
								</tr>

								<tr>
									<th>방문 희망 날짜</th>
									<td><input type="text" id="datepicker"></td>
								</tr>
								<tr>
									<th>방문 희망 장소</th>
									<td><input type="text" class="sub4_1_input" title="아이디입력" name="" id=""/></td>
								</tr>
								<tr>
									<th>남기실 말씀</th>
									<td>
										<fieldset class="fild_1_n">
											<legend>기타문의</legend>
											<textarea name="" id="" cols="" rows="6" class="fild_1_tex_n"></textarea>
										</fieldset>
									</td>
								</tr>

							</tbody>
						</table>
					</fieldset>



					<ul class="sub4_1_1_list_btn1">
						<li class="fl_right"><input type="button" value="등록" onclick=""/></li>
						<li class="fl_right"><input type="button" value="취소" onclick=""/></li>
					</ul>
				</form>

			</div>

		</div><!--기본 레이아웃 msub_container 끝-->
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>