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
					$('.sub7_3_tc_txt').wordBreakKeepAll();

					//IE에서는 플러그인을 사용하지 않고 CSS로 처리하고 싶은 경우 이렇게 옵션을 주면 된다.
					//$('.test').wordBreakKeepAll({OffForIE:true});

					//IE에서 플러그인을 사용하되 CSS를 적용하는 게 아니라 비 IE 브라우저처럼 적용하고 싶을 때 이렇게 옵션을 준다.
					//$('.test').wordBreakKeepAll({useCSSonIE: false});
				});
			</script>

			<div class="sub4_0_tab">
				<ul class="tab_sub4_title">
					<li><a class="tab_link active" href="#tab1">가정방문시</a></li>
					<li><a href="#tab2" ids="1" class="tab_link">병원방문시</a></li>
					<li><a href="#tab3" ids="1" class="tab_link">전문가의 관리일지</a></li>
				</ul>

				<div class="tabDetails" style="border:none; margin:0">
					<div id="tab1" class="tabContents1">

						<div class="sub7_3_tc">
							<h3 class="sub7_3_tc_title">모유수유 전문가 프리미엄 패키지</h3>
							<p class="sub7_3_tc_txt">본 산모관리 프로그램은 닥터맘 산모 도우미에서 산모들의 실제적인 어려움을 해결하고자 모유수유 전문가와 전문 간호사들이 직접 연구개발한 서비스와 프로그램입니다. 또한 이 프로그램은 법적인 보호를 받습니다.</p>

							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="50%"/>
										<col width="50%"/>
									</colgroup>
									<thead>
										<tr>
											<th scope="col" class="borderl" style="width:50%;">첫째 날</td>
											<th scope="col" class="borderr" style="width:50%;">비고</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">1. 첫방문인사 : 회사 및 본인소개</td>
											<td class="t_center">각종 프로그램과 서비스 사항을 설명한다.</td>
										</tr>
										<tr>
											<td class="t_strong1">2. 진행되는 과정 설명</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">3. 산모사정</td>
											<td class="t_center">문진표를 이용한다.</td>
										</tr>
										<tr>
											<td class="t_strong1">- Vital Sign : 혈압, 맥박, 체온</td>
											<td class="t_center">집에 체중계가 있을 경우 체중도 체크한다.</td>
										</tr>
										<tr>
											<td class="t_strong1">- 자궁 수축 상태와 오로, 회음부, 수술부위에 대해 질문</td>
											<td class="t_center">필요시 좌용하는 방법 설명</td>
										</tr>
										<tr>
											<td class="t_strong1">4. 유방과 모유 수유에 대한 사정</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">- 유방의 외형적인 모양 관찰</td>
											<td class="t_center">울혈이 있는지 여부, 유두의 형태</td>
										</tr>
										<tr>
											<td class="t_strong1">- 모유수유 및 젖병수유 횟수</td>
											<td class="t_center">수유 자세 및 아기의 입모양 관찰</td>
										</tr>
										<tr>
											<td class="t_strong1">- 아기의 젖먹는 모습 관찰</td>
											<td class="t_center">평상시 수유하는 모습 그대로 관찰</td>
										</tr>
										<tr>
											<td class="t_strong1">5. 유방의 문제점 및 수정되어야 할 부분 관찰</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">6. 신생아 사정 : 아기의 전체적인 발달양상 관찰</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">- 체온 측정</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">- 신생아 맥박 자세히 측정</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">- 제대 상태 관찰 및 소독(필요 시)</td>
											<td class="t_center">에탄올</td>
										</tr>
										<tr>
											<td class="t_strong1">- 황달 상태 확인</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">- 신생아의 입구조 및 아구창 확인</td>
											<td class="t_center"></td>
										</tr>
									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

						<div class="sub7_3_tc">
							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="50%"/>
										<col width="50%"/>
									</colgroup>
									<thead>
										<tr>
											<th scope="col" class="borderl" style="width:50%;">둘째 날</td>
											<th scope="col" class="borderr" style="width:50%;">비고</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">1. 산모와 신생아의 전반적인 상태 체크</td>
											<td class="t_center">밤동안 있었던 수유패턴과 수면시간 확인<br/>혈압 및 체온 측정</td>
										</tr>
										<tr>
											<td class="t_strong1">2. 신생아 I/O 체크</td>
											<td class="t_center">대소변, 수유량, 토한 횟수 등</td>
										</tr>
										<tr>
											<td class="t_strong1">3. 산모 모유수유 교육</td>
											<td class="t_center">모유수유의 해부 및 기본교육</td>
										</tr>
										<tr>
											<td class="t_strong1">4. 유방의 문제점 및 수정되어야 할 부분 관찰</td>
											<td class="t_center">필요시 회음부 라인 직접 관찰하고 소독</td>
										</tr>
										<tr>
											<td class="t_strong1">5. 신생아 사정 : 아기의 전체적인 발달양상 관찰</td>
											<td class="t_center">태열및 아구창 확인</td>
										</tr>
										<tr>
											<td class="t_strong1">6. 신생아 목욕</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">7. 모유수유의 자세 변경 설명</td>
											<td class="t_center"></td>
										</tr>
									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

						<div class="sub7_3_tc">
							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="50%"/>
										<col width="50%"/>
									</colgroup>
									<thead>
										<tr>
											<th scope="col" class="borderl" style="width:50%;">셋째 날</td>
											<th scope="col" class="borderr" style="width:50%;">비고</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">1. 산모와 신생아의 전반적인 상태 체크</td>
											<td class="t_center">밤동안 있었던 수유패턴과 수면시간 확인<br/>혈압 및 체온 측정</td>
										</tr>
										<tr>
											<td class="t_strong1">2. 신생아 I/O 체크</td>
											<td class="t_center">대소변, 수유량, 토한 횟수 등</td>
										</tr>
										<tr>
											<td class="t_strong1">3. 모유수유의 상담 및 문제해결</td>
											<td class="t_center">유방 마사지 및 핫팩 사용</td>
										</tr>
										<tr>
											<td class="t_strong1">4. 산모 휴식</td>
											<td class="t_center">오전 오후 필요시 실시</td>
										</tr>
										<tr>
											<td class="t_strong1">5. 신생아 목욕</td>
											<td class="t_center">산모에게 직접 할 수 있도록 권유</td>
										</tr>
										<tr>
											<td class="t_strong1">6. 추후 수유의 계획 상담</td>
											<td class="t_center"></td>
										</tr>
									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

					</div>

					<div id="tab2" class="tabContents1">

						<div class="sub7_3_tc">
							<h3 class="sub7_3_tc_title">병원방문시 프로그램</h3>
							<p class="sub7_3_tc_txt">본 산모관리 프로그램은 닥터맘 산모 도우미에서 산모들의 실제적인 어려움을 해결하고자 모유수유 전문가와 전문 간호사들이 직접 연구개발한 서비스와 프로그램입니다. 또한 이 프로그램은 법적인 보호를 받습니다.</p>

							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="50%"/>
										<col width="50%"/>
									</colgroup>
									<thead>
										<tr>
											<th scope="col" class="borderl" style="width:50%;">첫째 날</td>
											<th scope="col" class="borderr" style="width:50%;">비고</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">1. 첫방문인사</td>
											<td class="t_center">회사 및 본인소개</td>
										</tr>
										<tr>
											<td class="t_strong1">2. 프로그램에 대한 설명 및 서비스 사항 설명</td>
											<td class="t_center"></td>
										</tr>
										<tr>
											<td class="t_strong1">3. 모자 동실을 권유한다.</td>
											<td class="t_center">병실이 1인실인 경우</td>
										</tr>
										<tr>
											<td class="t_strong1">4. 유방의 상태 확인</td>
											<td class="t_center">유방의 외형과 울혈 상태 파악</td>
										</tr>
										<tr>
											<td class="t_strong1">5. 유방의 전반적인 해부 및 모유수유 교육</td>
											<td class="t_center">산모의 현재 유방의 상태 설명</td>
										</tr>
										<tr>
											<td class="t_strong1">6. 신생아의 모유수유 형태 관찰</td>
											<td class="t_center">직접 평상시 모습 관찰</td>
										</tr>
										<tr>
											<td class="t_strong1">7. 올바른 젖물리기와 수유자세 설명</td>
											<td class="t_center">올바른 젖물리기에 대한 집중 설명</td>
										</tr>
									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

						<div class="sub7_3_tc">
							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="50%"/>
										<col width="50%"/>
									</colgroup>
									<thead>
										<tr>
											<th scope="col" class="borderl" style="width:50%;">둘째 날</td>
											<th scope="col" class="borderr" style="width:50%;">비고</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">1. 산모와 신생아의 전반적인 상태 체크</td>
											<td class="t_center">밤동안 있었던 수유패턴과 수면시간 확인<br/>혈압 및 체온 측정</td>
										</tr>
										<tr>
											<td class="t_strong1">2. 신생아 I/O 체크</td>
											<td class="t_center">대소변, 수유량, 토한 횟수 등</td>
										</tr>
										<tr>
											<td class="t_strong1">3. 산모 모유수유 교육</td>
											<td class="t_center">모유수유의 해부 및 기본교육</td>
										</tr>
										<tr>
											<td class="t_strong1">4. 회음부 상태 확인</td>
											<td class="t_center">필요시 회음부 관찰</td>
										</tr>
										<tr>
											<td class="t_strong1">5. 신생아 사정 : 맥박 및 체온 체크</td>
											<td class="t_center">태열및 아구창 확인</td>
										</tr>
										<tr>
											<td class="t_strong1">6. 모유수유의 자세 변경 설명</td>
											<td class="t_center"></td>
										</tr>
									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

						<div class="sub7_3_tc mb50">
							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="50%"/>
										<col width="50%"/>
									</colgroup>
									<thead>
										<tr>
											<th scope="col" class="borderl" style="width:50%;">셋째 날</td>
											<th scope="col" class="borderr" style="width:50%;">비고</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">1. 산모와 신생아의 전반적인 상태 체크</td>
											<td class="t_center">밤동안 있었던 수유패턴과 수면시간 확인<br/>혈압 및 체온 측정</td>
										</tr>
										<tr>
											<td class="t_strong1">2. 신생아 I/O 체크</td>
											<td class="t_center">대소변, 수유량, 토한 횟수 등</td>
										</tr>
										<tr>
											<td class="t_strong1">3. 모유수유의 상담 및 문제해결</td>
											<td class="t_center">유방 마사지 및 핫팩 사용</td>
										</tr>
										<tr>
											<td class="t_strong1">4. 추후 수유의 계획 상담</td>
											<td class="t_center"></td>
										</tr>
									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

					</div>



					<div id="tab3" class="tabContents1">

						<div class="sub7_3_tc">
							<h3 class="sub7_3_tc_title">전문가의 실제 관리일지 보기</h3>
							<p class="sub7_3_tc_txt">본 모유수유 전문가 관리일지는 닥터맘 산모도우미에서 산모들의실제적인 어려움을 해골하고자 모유수유 전문가와<br/>
							전문 간호사들이 직접 연구개발한 관리일지 입니다. 실제 관리일지를 통해 산모님들께서 모유수유 전문가 서비스를<br/>
							간접적으로나마 경험해 보실 수 있도록 준비했습니다.</p>

							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="20%"/>
										<col width="*%"/>
									</colgroup>
									<thead>
										<tr>
											<th colspan="4" scope="col" class="bordernone">관리일지 예1</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">산모 성명</td>
											<td class="t_center">OOO</td>
											<td class="t_strong1">담당 닥터맘</td>
											<td class="t_center">OOO</td>
										</tr>
										<tr>
											<td class="t_strong1">분만 유형</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">제왕 절개수술</td>
											<td class="t_strong1">방문 일자</td>
											<td class="t_center">OO/OO ~ OO/OO</td>
										</tr>
										<tr>
											<td class="t_strong1">주소 및 연락처</td>
											<td colspan="3" class="t_center">OO시 OO구 OO동 OO아파트</td>
										</tr>
										<tr>
											<td class="t_strong1">아기 출생일</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">OO월 OO일</td>
											<td class="t_strong1">성별</td>
											<td class="t_center">남</td>
										</tr>
										<tr>
											<td class="t_strong1">산모 구분</td>
											<td colspan="3" class="t_center">제왕 절개 수술</td>
										</tr>
										<tr>
											<td class="t_strong1">특이사항</td>
											<td colspan="3" class="t_center">&nbsp;</td>
										</tr>
										<tr>
											<td class="t_strong1">산모 혈압</td>
											<td class="t_center">110/70mmHg</td>
											<td class="t_strong1">산모 맥박</td>
											<td class="t_left">72회/min</td>
										</tr>
										<tr>
											<td class="t_strong1">자궁 높이<br />
											(정상분만)</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">&nbsp;</td>
											<td class="t_strong1">수술 부위사정</td>
											<td class="t_center">&nbsp;</td>
										</tr>
										<tr>
											<td class="t_strong1">모유수유 현 상태</td>
											<td colspan="3" class="t_left">오른쪽 젖만 먹으려고 하며 왼쪽 유방에선 얕게 물고 보채는 상태</td>
										</tr>
										<tr>
											<td class="t_strong1">예상되는 문제점1</td>
											<td colspan="3" class="t_left">왼쪽 유방에서 젖량이 주는 문제</td>
										</tr>
										 <tr>
											<td class="t_strong1">예상되는 문제점2</td>
											<td colspan="3" class="t_left">유방크기의 불균형</td>
										</tr>
										 <tr>
											<td class="t_strong1">신상아 제대 상태</td>
											<td colspan="3" class="t_left">양호</td>
										</tr>
										 <tr>
											<td class="t_strong1">신생아 황달</td>
											<td colspan="3" class="t_left">없음</td>
										</tr>
										 <tr>
											<td class="t_strong1">하루 모유수유 횟수</td>
											<td colspan="3" class="t_left">10회~14회 정도</td>
										</tr>
										 <tr>
											<td class="t_strong1">분유 보충</td>
											<td colspan="3" class="t_left">생후 2주동안은 조리원에서 분유수유하고 집에서는 거의 완모상태</td>
										</tr>
										 <tr>
											<td class="t_strong1">유방 사정</td>
											<td colspan="3" class="t_left">왼쪽유방에서 멍우리가 4개정도 촉지</td>
										</tr>
										 <tr>
											<td class="t_strong1">유방의 특이점</td>
											<td colspan="3" class="t_left">&nbsp;</td>
										</tr>
										 <tr>
											<td class="t_strong1">비고</td>
											<td colspan="3" class="t_left">아로마 오일을 이용해서 마사지 실시<br />
											유륜준위를 자극해서 계속 젖을 짜줌<br />
											부드러워지자 아기가 물기 시작함<br />
											깊게 무는 방법과 수유자세를 교정해줌</td>
										</tr>

									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

						<div class="sub7_3_tc">
							<table summary="지역,이름" class="sub7_3_table">
								<caption>명단</caption>
									<colgroup>
										<col width="20%"/>
										<col width="*%"/>
									</colgroup>
									<thead>
										<tr>
											<th colspan="4" scope="col" class="bordernone">관리일지 예2</tr>
									</thead>
									<tbody>
										<tr>
											<td class="t_strong1">산모 성명</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">OOO</td>
											<td class="t_strong1">담당 닥터맘</td>
											<td class="t_center">OOO</td>
										</tr>
										<tr>
											<td class="t_strong1">분만 유형</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">제왕 절개수술</td>
											<td class="t_strong1">방문 일자</td>
											<td class="t_center">OO/OO ~ OO/OO</td>
										</tr>
										<tr>
											<td class="t_strong1">주소 및 연락처</td>
											<td colspan="3" class="t_center">OO시 OO구 OO동 OO아파트</td>
										</tr>
										<tr>
											<td class="t_strong1">아기 출생일</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">OO월 OO일</td>
											<td class="t_strong1">성별</td>
											<td class="t_center">남</td>
										</tr>
										<tr>
											<td class="t_strong1">산모 구분</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">정상 분만 후</td>
											<td class="t_strong1">모유수유여부</td>
											<td class="t_center">예</td>
										</tr>
										<tr>
											<td class="t_strong1">특이사항</td>
											<td colspan="3" class="t_left">유두 길이가 2.5cm~3cm 정도로 긴편임</td>
										</tr>
										<tr>
											<td class="t_strong1">산모 혈압</td>
											<td class="t_center">110/70mmHg</td>
											<td class="t_strong1">산모 맥박</td>
											<td class="t_left">70회/min</td>
										</tr>
										<tr>
											<td class="t_strong1">체온</td>
											<td class="t_center">정상</td>
											<td class="t_strong1">과거 질환</td>
											<td class="t_center">&nbsp;</td>
										</tr>
										<tr>
											<td class="t_strong1">자궁 높이</br>(정상분만)</td>
											<td class="t_center" style="border-right: 1px solid #ccc !important;">&nbsp;</td>
											<td class="t_strong1">수술 부위사정</td>
											<td class="t_center">&nbsp;</td>
										</tr>
										<tr>
											<td class="t_strong1">신생아 연령</td>
											<td class="t_center">45일</td>
											<td class="t_strong1">신생아 맥박/체온</td>
											<td class="t_center">134회/min, 정상</td>
										</tr>
										<tr>
											<td class="t_strong1">모유수유 현 상태</td>
											<td colspan="3" class="t_left">산모가 웅크리는 수유자세를 취하며 하루종일 수유만 한다고 호소하심</td>
										</tr>
										<tr>
											<td class="t_strong1">예상되는 문제점1</td>
											<td colspan="3" class="t_left">산모의 육체적 피로감, 젖량부족이라고 느끼는데서 오는 스트레스</td>
										</tr>
										 <tr>
											<td class="t_strong1">예상되는 문제점2</td>
											<td colspan="3" class="t_left">불편한 수유자세로 아기 또한 자주 보채고 칭얼거림</td>
										</tr>
										 <tr>
											<td class="t_strong1">신상아 제대 상태</td>
											<td colspan="3" class="t_left">육아종이 있어서 이미 소아과에서 치료받은 상태</td>
										</tr>
										 <tr>
											<td class="t_strong1">신생아 황달</td>
											<td colspan="3" class="t_left">없음</td>
										</tr>
										 <tr>
											<td class="t_strong1">하루 모유수유 횟수</td>
											<td colspan="3" class="t_left">10회~12회 이상(밤중수유 2회-앉아서)</td>
										</tr>
										 <tr>
											<td class="t_strong1">분유 보충</td>
											<td colspan="3" class="t_left">1주일에 2회 정도 (시간강사로 일하셔서 아주 가끔씩만 하는 상태 60cc미만)</td>
										</tr>
										 <tr>
											<td class="t_strong1">유방 사정</td>
											<td colspan="3" class="t_left">울혈, 윧상처는 없는 상태임</td>
										</tr>
										 <tr>
											<td class="t_strong1">유방의 특이점</td>
											<td colspan="3" class="t_left">다만 유두길이가 긴 편임</td>
										</tr>
										 <tr>
											<td class="t_strong1">비고</td>
											<td colspan="3" class="t_left">1) 수유자세 교정<br />
											2) 대소변 횟수(정상), 체중증가(정상)로 보아 젖량부족이 아님을 인식시켜 드림<br />
											3)유두길이 또한 수유에 있어서 문제가 되지 않음으로 설명시 드리고 인식시킴<br />
											4) 지금 현 시점이 급성장 시기이며 빠는 욕구가 강하고 사랑을 필요로 하는 시기이므로 많이
빨고 먹고자 하는 자연스러운 신생아의 동작임을 설명드림</td>
										</tr>

									</tbody>
							</table>
						</div><!--sub3_3_tc 덩어리 끝-->

					</div>
			</div>

		</div><!--기본 레이아웃 msub_container 끝-->
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>