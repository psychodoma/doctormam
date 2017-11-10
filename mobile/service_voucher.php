<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
?>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">

			<script type="text/javascript">
				$(document).ready(function(){
					$('.sub3_6cn ul li').wordBreakKeepAll();

					//IE에서는 플러그인을 사용하지 않고 CSS로 처리하고 싶은 경우 이렇게 옵션을 주면 된다.
					//$('.test').wordBreakKeepAll({OffForIE:true});

					//IE에서 플러그인을 사용하되 CSS를 적용하는 게 아니라 비 IE 브라우저처럼 적용하고 싶을 때 이렇게 옵션을 준다.
					//$('.test').wordBreakKeepAll({useCSSonIE: false});
				});
			</script>

			<div class="sub3_6_tc">
				<h3 class="sub3_6_tc_title">산모신생아 건강관리 서비스 지원기간</h3>

				<table summary="태아유혀으출산순위,서비스기간" class="sub3_6_table">
					<caption>서비스 지원기간</caption>
					<thead>
					<tr>
						<th rowspan="2" scope="col">태아 유형</th>
						<th rowspan="2" scope="col">출산 순위</th>
						<th colspan="3" scope="col">서비스기간</th>
					  </tr>
					<tr>
					  <th scope="col">단축형</th>
					  <th scope="col">표준형</th>
					  <th scope="col">연장형</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td rowspan="3" class="t_strong">단태아</td>
						<td>첫째아</td>
						<td>5일</td>
						<td>10일</td>
						<td>15일</td>
					</tr>
					<tr>
						<td>둘째아</td>
						<td>10일</td>
						<td>15일</td>
						<td>20일</td>
					</tr>
					<tr>
						<td>셋째아 이상</td>
						<td>15일</td>
						<td>20일</td>
						<td>25일</td>
					</tr>
					<tr>
						<td rowspan="2" class="t_strong">쌍태아</td>
						<td>둘째아</td>
						<td>10일</td>
						<td>15일</td>
						<td>20일</td>
					</tr>
					<tr>
						<td>셋째아 이상</td>
						<td>15일</td>
						<td>20일</td>
						<td>25일</td>
					</tr>
					<tr>
						<td class="t_strong">삼태아 이상,<br/>중증장애 산모</td>
						<td>구분 없음</td>
						<td>15일</td>
						<td>20일</td>
						<td>25일</td>
					</tr>
					</tbody>
				</table>

				<p class="sub3_6_txt1">*필요한 경우, 별도 계약을 통해 이용자가 추가비용을 전액 부담하고 제공일 수를 연장할 수 있음</p>
			</div>

			<div class="sub3_6_tc">
				<h3 class="sub3_6_tc_title">산모신생아 건강관리 서비스 제공시간</h3>

				<table summary="구분,제공시간,비고" class="sub3_6_table">
					<caption>교육과정</caption>
					<thead>
					<tr>
						<th scope="col" style="width:15%;">구분</th>
						<th scope="col">제공기관</th>
						<th scope="col" style="width:25%;">비고</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td class="t_strong">1주5일</td>
						<td><span class="underLine">09:00 ~ 18:00<br/>(휴게시간 1시간 포함)</span><br/>
						휴게시간은 점심시간 또는 저녁시간으로 활용할 수 있음<br/>
						*필요한 경우, 별도계약을 통해 이용자가 추가 비용을<br/>
						전액 부담하고 제공시간을 연장할 수 있음</td>
						<td><span class="underLine">휴게시간<br/>1시간 포함</span></td>
					</tr>
					</tbody>
				</table>
			</div>

			<div class="sub3_6_tc">
				<h3 class="sub3_6_tc_title">산모신생아 건강관리 서비스 내용</h3>

				<table summary="구분,표준서비스" class="sub3_6_table">
					<caption>교육과정</caption>
						<colgroup>
							<col width="25%"/>
							<col width="*%"/>
						</colgroup>
						<thead>
							<tr>
								<th scope="col">구분</th>
								<th scope="col">표준서비스</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="t_strong">산모<br/>건강관리</td>
								<td>
									<ul class="sub3_5_list1">
										<li>- 산모 신체 상태 조사</li>
										<li>- 산모 영양관리</li>
										<li>- 산후 체조 또는 마사지 지원</li>
									</ul>

									<ul class="sub3_5_list2">
										<li>- 산후 부종관리</li>
										<li>- 산모 위생관리</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td class="t_strong">신생아<br/>건강관리</td>
								<td>
									<ul class="sub3_5_list1">
										<li>- 신생아 건강상태 확인</li>
										<li>- 신생아 청결관리</li>
										<li>- 신생아 수유지원 </li>
									</ul>

									<ul class="sub3_5_list2">
										<li>- 신생아 위생관리</li>
										<li>- 예방접종 지원 </li>
									</ul>
								</td>
							</tr>

							<tr>
								<td class="t_strong">산모<br/>제공정보</td>
								<td>
									<ul class="sub3_5_list1">
										<li>- 응급상황 발견 및 대응</li>
										<li>- 감염 예방 및 관리</li>
										<li>- 수유, 산후회복, 신생아 케어 관련 산모 교육</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td class="t_strong">가사활동<br>지원</td>
								<td>
									<ul class="sub3_5_list1">
										<li>- 산모 식사준비</li>
										<li>- 산모ㆍ신생아 주 생활공간 청소</li>
										<li>- 산모ㆍ신생아 의류 등 세탁</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td class="t_strong">정서 지원</td>
								<td>
									<ul class="sub3_5_list1">
										<li>- 정서 상태 이해</li>
										<li>- 정서적 지지</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td class="t_strong">기타</td>
								<td>
									<ul class="sub3_5_list1">
										<li>- 제공기록 작성</li>
										<li>- 특이사항 보고</li>
									</ul>
								</td>
							</tr>
						</tbody>
				</table>

				<div class="sub3_6cont">
					<div class="sub3_6cn">
						<h3>가. 추진근거</h3>
						<ul>
							<li>「사회서비스 이용 및 이용권 관리에 관한 법률」</li>
							<li>「 저출산ㆍ고령사회기본법」 제8조 내지 제10조</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>나. 사업목적</h3>
						<ul>
							<li>출산가정에 건강관리사를 파견하여 산후관리를 지원함으로써 산모와 신생아의 건강을 증진하고 출산가정의 경제적 부담을 경감<br/>
							산모·신생아 건강관리사 양성을 통해 사회적 일자리 창출</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>다. 지원대상</h3>
						<ul>
							<li>-산모 및 배우자의 건강보험 본인부담금 합산액이 기준중위소득 80%이하 금액에 해당하는 출산가정</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>라. 신청기간</h3>
						<ul>
							<li>신청기간 : 출산 예정일 40일 전부터 출산일로부터 30일까지</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>마. 지원 내용</h3>
						<ul>
							<li>산모·신생아 건강관리사가 일정 기간 출산가정을 방문하여 산후관리를 도와주는 산모·신생아 건강관리 서비스 이용권 지급</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>바.지원기간</h3>

						<table summary="구분,제공시간,비고" class="sub3_6_table">
							<caption>지원기간</caption>
							<thead>
							<tr>
								<th scope="col" style="width:35%;">태아 유형</th>
								<th scope="col">출산 순위</th>
								<th scope="col">서비스 기간</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td rowspan="3" class="t_strong">단태아</td>
								<td class="t_strong">첫째아</td>
								<td>10일</span></td>
							</tr>
							<tr>
								<td class="t_strong">둘째아</td>
								<td>15일</td>
							</tr>
							<tr>
								<td class="t_strong">셋째아 이상</td>
								<td>20일</td>
								</tr>
							<tr>
								<td rowspan="2" class="t_strong">쌍태아</td>
								<td class="t_strong">둘째아</td>
								<td>15일</td>
							</tr>
							<tr>
								<td class="t_strong">셋째아 이상</td>
								<td>20일</td>
							</tr>
							<tr>
								<td class="t_strong">삼태아 이상<br/>중증장애 산모</td>
								<td class="t_strong">구분없음</td>
								<td>20일</td>
							</tr>
							</tbody>
						</table>

						<p class="sub3_6_txt2">*바우처 생성 이후에는 선택한 서비스 상품(단축/표준/연장) 변경불가</p>
					</div>

					<div class="sub3_6cn">
						<h3>사. 유효기간</h3>
						<ul>
							<li>출산일로부터 60일 이내(60일이 경과되면 바우처 자격 소멸)</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>아. 신청 장소</h3>
						<ul>
							<li>산모의 주민등록 주소지 관할 시·군·구 보건소</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>자.신청자격</h3>
						<ul class="sub3_6cn_list1">
							<li class="sub3_6cn_title">1) 대상 : 국내에 주민등록 또는 외국인 등록을 둔 출산 가정</li>
							<li>- 단 부부 모두가 외국인인 경우 당해 외국인은 국내 체류자격비자(사증) 종류가 F-2(거주), F-5(영주), F-6(결혼이민)인 경우에 한함</li>
						</ul>

						<ul>
							<li class="sub3_6cn_title">2) 신청권자 : 산모 본인,친족 또는 후견인, 법정대리인</li>
							<li>*친족범위(민법 제777조): 배우자, 8촌이내의 혈족, 4촌이내의 인척</li>
						</ul>
					</div>

					<div class="sub3_6cn">
						<h3>차. 서비스 비용</h3>
						<ul>
							<li>서비스 총 가격 : 보건복지부가 정한 상한선 범위 내에서 개별 제공기관이 자율적으로 서비스 가격 책정</li>
							<li>정부지원금 : 소득수준 및 신생아 유형에 따라 차등 지원</li>
							<li>본인부담금 : 서비스 총 가격에서 정부지원금을 뺀 차액 부담</li>
						</ul>

						<div class="sub3_6td">
							<a href="javascript:PopupCalc2()" target="_black" class="char_tableBtn">서비스 비용 표 확인하러 가기</a>
						</div>
					</div>

					<div class="sub3_6cn">
						<h3>카. 정부지원 바우처 표준서비스 제외사항</h3>
						<ul class="sub3_6cn_list2">
							<li>- 산모신생아 주생활 공간 이외 청소; 다른가족방, 화장실, 공용공간</li>
							<li>(현관, 서재, 냉장고, 장롱, 찬장, 신발장 등),기타 비 일상적인 집안 대청소.</li>
						</ul>

						<ul class="sub3_6cn_list2">
							<li>- 산모신생아 의류 등 이외세탁 : 다른가족빨래, 고가의류, 대형빨래</li>
							<li>(침구,커튼,신발류,가방류,부피 큰 계절옷,묵은 빨래 등)</li>
						</ul>

						<ul class="sub3_6cn_list2">
							<li>- 산모신생아 이외 가족,친지 식사준비, 자택 외 다른 장소에서의 식사준비, 잔치음식, 저장식품(김치,장류,장아찌등)<br/>차 접대수준을 넘는 손님접대.</li>
							<li>- 부피가 크거나 무거운 가구/물건 옮기기, 큰아이 또는 다른가족 돌보기, 운전대행, 애완동물 돌보기등</li>
						</ul>
					</div>

				</div>

			</div>

		</div>
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>