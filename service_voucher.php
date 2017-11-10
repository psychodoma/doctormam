<?php
include_once('./_common.php');


if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

    <div class="subcont_top"><!--100%-->
<?php include_once(G5_PATH.'/SNB.php'); ?>
            <div class="sub_cont1">
                <h3 class="subpage_name">바우처</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">

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
								<td class="t_strong">삼태아 이상, 중증장애 산모</td>
								<td>구분 없음</td>
								<td>15일</td>
								<td>20일</td>
								<td>25일</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="sub3_6_tc">
                        <h3 class="sub3_6_tc_title">산모신생아 건강관리 서비스 제공시간</h3>

                        <table summary="구분,제공시간,비고" class="sub3_6_table">
                            <caption>교육과정</caption>
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">제공기관</th>
                                <th scope="col">비고</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="t_strong">1주5일</td>
                                <td><span class="underLine mb10">09:00 ~ 18:00 (휴게시간 1시간 포함)</span><br/>
								휴게시간은 점심시간 또는 저녁시간으로 활용할 수 있음<br/>
								*필요한 경우, 별도계약을 통해 이용자가 추가 비용을<br/>
								전액 부담하고 제공시간을 연장할 수 있음</td>
                                <td><span class="underLine">휴게시간 1시간 포함</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="sub3_6_tc">
                        <h3 class="sub3_6_tc_title">산모신생아 건강관리 서비스 내용</h3>

                        <table summary="구분,표준서비스" class="sub3_6_table">
                            <caption>교육과정</caption>
                            <colgroup>
                                <col width="33%"/>
                                <col width="%%"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">표준서비스</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="t_strong">산모 건강관리</td>
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
                                <td class="t_strong">신생아 건강관리</td>
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
                                <td class="t_strong">산모 제공정보</td>
                                <td>
                                    <ul class="sub3_5_list1">
                                        <li>- 응급상황 발견 및 대응</li>
                                        <li>- 감염 예방 및 관리</li>
                                        <li>- 수유, 산후회복, 신생아 케어 관련 산모 교육</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">가사활동 지원</td>
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
										<td class="t_strong">삼태아 이상, 중증장애 산모</td>
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
									<table summary="구분,제공시간,비고" class="sub3_6_t">
                                        <caption>
                                        서비스 비용
                                        </caption>
                                        <thead>
                                        <tr>
                                            <th rowspan="3" scope="col">태아<br/>유형</th>
                                            <th rowspan="3" scope="col">출산<br/>순위</th>
                                            <th rowspan="3" scope="col">소득<br/>유형</th>
                                            <th colspan="9" scope="col" style="border-right:1px solid #ccc;">17년 서비스가격 및 정부지원금</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" scope="col">서비스 기간</th>
                                            <th colspan="3" scope="col">서비스 상한</th>
                                            <th colspan="3" scope="col" style="border-right:1px solid #ccc;">연장</th>
                                        </tr>
                                        <tr>
											<th scope="col">단축</th>
                                            <th scope="col">표준</th>
                                            <th scope="col">연장</th>
                                            <th scope="col">단축</th>
                                            <th scope="col">표준</th>
                                            <th scope="col">연장</th>
                                            <th scope="col">단축</th>
                                            <th scope="col">표준</th>
                                            <th scope="col" style="border-right:1px solid #ccc;">연장</th>
                                        </tr>
                                          
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td rowspan="12" class="t6_strong">단태아</td>
                                            <td rowspan="4">첫째아</td>
                                            <td>A-가-①형</td>
                                            <td rowspan="4">5</td>
                                            <td rowspan="4">10</td>
                                            <td rowspan="4">15</td>
                                            <td rowspan="4">445,000</td>
                                            <td rowspan="4">890,000</td>
                                            <td rowspan="4">1,335,000</td>
                                            <td>371,000</td>
                                            <td>618,000</td>
                                            <td>788,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-나-①형</td>
                                            <td>352,000</td>
                                            <td>587,000</td>
                                            <td>749,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-다-①형</td>
                                            <td>315,000</td>
                                            <td>525,000</td>
                                            <td>669,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-라-①형</td>
                                            <td>278,000</td>
                                            <td>464,000</td>
                                            <td>591,000</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="4">둘째아</td>
                                            <td>A-가-②형</td>
                                            <td rowspan="4">10</td>
                                            <td rowspan="4">15</td>
                                            <td rowspan="4">20</td>
                                            <td rowspan="4">890,000</td>
                                            <td rowspan="4">1,335,000</td>
                                            <td rowspan="4">1,780,000</td>
                                            <td>667,000</td>
                                            <td>834,000</td>
                                            <td>945,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-나-②형</td>
                                            <td>634,000</td>
                                            <td>792,000</td>
                                            <td>898,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-다-②형</td>
                                            <td>567,000</td>
                                            <td>709,000</td>
                                            <td>804,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-라-②형</td>
                                            <td>501,000</td>
                                            <td>626,000</td>
                                            <td>709,000</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="4">셋째아<br/>이상</td>
                                            <td>A-가-③형</td>
                                            <td rowspan="4">15</td>
                                            <td rowspan="4">20</td>
                                            <td rowspan="4">25</td>

                                            <td rowspan="4">1,335,000</td>
                                            <td rowspan="4">1,780,000</td>
                                            <td rowspan="4">2,225,000</td>
                                            <td>1,001,000</td>
                                            <td>1,112,000</td>
                                            <td>1,182,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-나-③형</td>
                                            <td>951,000</td>
                                            <td>1,057,000</td>
                                            <td>1,123,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-다-③형</td>
                                            <td>851,000</td>
                                            <td>946,000</td>
                                            <td>1,005,000</td>
                                        </tr>
                                        <tr>
                                          <td>A-라-③형</td>
                                            <td>751,000</td>
                                            <td>834,000</td>
                                            <td>886,000</td>
                                        </tr>
                                        <tr>
											<td rowspan="8" class="t6_strong">쌍생아</td>
											<td rowspan="4">둘쨰아</td>
											<td>B-가-①형</td>
											<td rowspan="4">10</td>
											<td rowspan="4">15</td>
											<td rowspan="4">20</td>
											<td rowspan="4">1,040,000</td>
											<td rowspan="4">1,560,000</td>
											<td rowspan="4">2,080,000</td>
											<td>905,000</td>
											<td>1,131,000</td>
											<td>1,282,000</td>
                                        </tr>
                                        <tr>
											<td>B-나-①형</td>
											<td>860,000</td>
											<td>1,074,000</td>
											<td>1,217,000</td>
                                        </tr>
                                        <tr>
											<td>B-다-①형</td>
											<td>769,000</td>
											<td>961,000</td>
											<td>1,089,000</td>
                                        </tr>
                                        <tr>
											<td>B-라-①형</td>
											<td>679,000</td>
											<td>848,000</td>
											<td>961,000</td>
                                        </tr>
                                        <tr>
											<td rowspan="4">셋째아<br/>이상</td>
											<td>B-가-②형</td>
											<td rowspan="4">15</td>
											<td rowspan="4">20</td>
											<td rowspan="4">25</td>
											<td rowspan="4">1,560,000</td>
											<td rowspan="4">2,080,000</td>
											<td rowspan="4">2,600,000</td>
											<td>1,221,000</td>
											<td>1,357,000</td>
											<td>1,442,000</td>
                                        </tr>
                                        <tr>
											<td>B-나-②형</td>
											<td>1,160,000</td>
											<td>1,289,000</td>
											<td>1,370,000</td>
                                        </tr>
                                        <tr>
											<td>B-다-②형</td>
											<td>1,038,000</td>
											<td>1,154,000</td>
											<td>1,226,000</td>
                                        </tr>
                                        <tr>
											<td>B-라-②형</td>
											<td>916,000</td>
											<td>1,018,000</td>
											<td>1,081,000</td>
                                        </tr>
                                        <tr>
											<td colspan="2" rowspan="4" class="t6_strong"><p>삼태아 이상,<br/>중증장애 산모</p></td>
											<td>C-가형</td>
											<td rowspan="4">15</td>
											<td rowspan="4">20</td>
											<td rowspan="4">25</td>
											<td rowspan="4">1,710,000</td>
											<td rowspan="4">2,280,000</td>
											<td rowspan="4">2,850,000</td>
											<td>1,502,000</td>
											<td>1,669,000</td>
											<td>1,891,000</td>
                                        </tr>
                                        <tr>
											<td>C-나형</td>
											<td>1,427,000</td>
											<td>1,585,000</td>
											<td>1,800,000</td>
                                        </tr>
                                        <tr>
											<td>C-다형</td>
											<td>1,276,000</td>
											<td>1,418,000</td>
											<td>1,607,000</td>
                                        </tr>
                                        <tr>
											<td>C-라형</td>
											<td>1,126,000</td>
											<td>1,251,000</td>
											<td>1,418,000</td>
                                        </tr>
                                        </tbody>
                                    </table>
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

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>