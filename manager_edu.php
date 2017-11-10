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
                <h3 class="subpage_name">교육과정</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">
                    <div class="sub2_2_txtArea">
                        <p class="sub2_2_txt_1">◎국제 자격증을 소지한 대표 및 강사진(간호사,국제모유수유전문가, 사회복지사,응급구조사)이 직접 교육합니다.</p>
                        <ul class="sub2_2_txt_2">
                            <li>닥터맘 산후관리사 교육시간 기본교육 : 60시간</li>
                            <li>경력자교육 : 40시간</li>
                            <li>프리미엄교육 : 20시간</li>
                            <li>명품플러스교육 : 40시간</li>
                            <li>보수교육 : 매년 8시간</li>
                        </ul>
                    </div>

                    <div class="sub2_2_tc">
                        <p class="sub2_2_tc_txt">기본교육 60시간 커리큘럼</p>

                        <table summary="교육과목명,과목교육(이론),과목교육(살가),교육내용" class="sub2_2_table">
                            <caption>교육과정</caption>
                            <colgroup>
                                <col width="37%"/>
                                <col width="12%"/>
                                <col width="12%"/>
                                <col width="*%"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">교육과목명</th>
                                <th scope="col">과목교육<br/>시간(이론)</th>
                                <th scope="col">과목교육<br/>시간(실기)</th>
                                <th scope="col">교육내용</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="t_strong">돌봄 서비스 및 바우처 제도의 이해</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 돌봄 서비스 이해</li>
                                        <li>2. 바우처 제도 이해</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="t_strong">산모신생아 건강관리사 지원서비스의 이해</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 서비스의 배경 및 목적</li>
                                        <li>2. 서비스 개요</li>
                                        <li>3. 서비스 지원체계 및 이해관계자별 역할</li>
                                        <li>4. 건강관리사 입직 경로 및 방법 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">직업윤리 및 직무태도</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 돌봄 서비스 윤리강령</li>
                                        <li>2. 건강관리사 역활</li>
                                        <li>3. 산모신생아 돌봄 서비스 원칙 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">건강관리사 근로기준</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 근로계약</li>
                                        <li>2. 급여 등 근로조건 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">건강관리사 자기관리</td>
                                <td class="t_center">1.</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 건강 및 스트레스 관리</li>
                                        <li>2. 성희롱 예방</li>
                                        <li>3. 자기계발 및 커리어 관리 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">출산 후 산모에 대한 이해</td>
                                <td class="t_center">1.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 출산 후 산모의 신체적 특성</li>
                                        <li>2. 출산 후 산모의 정서적 특성</li>
                                        <li>3. 산후 우울증의 이해 및 대처</li>
                                        <li>4. 특수 상황 산모에 대한 이해 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">신생아에 대한 이해</td>
                                <td class="t_center">1.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 신생아의 신체적, 생리적 특성</li>
                                        <li>2. 신생아의 발달특성 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">서비스 현장의 이해</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 산모의 기대심리</li>
                                        <li>2. 육아 환경 및 육아준비물의 이해</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">서비스 표준의 이해 </td>
                                <td class="t_center">0.5</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 서비스 표준</li>
                                        <li>2. 표준 일정</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">기본 에티켓</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 건강관리사 서비스 마인드</li>
                                        <li>2. 건강관리사 복장과 이미지</li>
                                        <li>3. 방문 시 유의사항</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">의사소틍</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">1</td>
                                <td>
                                    <ul>
                                        <li>1. 효율적인 산모와의 의사소통</li>
                                        <li>2. 질문에 대한 효과적인 대처와 상담</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">서비스 준비물 </td>
                                <td class="t_center"></td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 계약 및 서비스 제공 관련 서류</li>
                                        <li>2. 서비스 실행 보조 도구 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">가정환경 및 욕구파악</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 가정환경 별 서비스 제공</li>
                                        <li>2. 서비스 욕구 파악을 위한 산모상담</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">서비스 관련 정보제공 </td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 서비스 범위 및 이용자 준수사항 안내</li>
                                        <li>2. 계약서 작성 및 결제 방법 안내</li>
                                        <li>3. 개인정보보호</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">신생아 청결 및 위생관리</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 손 씻기</li>
                                        <li>2. 신생아 침구 관리</li>
                                        <li>3. 신생아 용품 소독</li>
                                        <li>4. 기저귀 교체</li>
                                        <li>5. 신생아 세탁물 관리</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">신생아 모유수유</td>
                                <td class="t_center">2.</td>
                                <td class="t_center">4.</td>
                                <td>
                                    <ul>
                                        <li>1. 모유수유 장점</li>
                                        <li>2. 수유지원 기본원칙</li>
                                        <li>3. 모유수유 방법</li>
                                        <li>4. 모유수유 곤란 산모 해결방법</li>
                                        <li>5. 유축기 사용</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">산신생아 인공수유</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 인공수유 필요 산모</li>
                                        <li>2. 분유 조제</li>
                                        <li>3. 분유 수유</li>
                                        <li>4. 혼합 수유</li>
                                        <li>5. 신생아 트림</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">신생아 목욕</td>
                                <td class="t_center">1.</td>
                                <td class="t_center">4.</td>
                                <td>
                                    <ul>
                                        <li>1. 신생아 목욕용품 종류 및 용도</li>
                                        <li>2. 신생아 목욕 시키는 법</li>
                                        <li>3. 신생아 피부보호 용품 사용</li>
                                        <li>4. 신생아 배꼽관리</li>
                                        <li>5. 신생아 옷 갈아입히기</li>
                                        <li>6. 신생아 강보 싸기</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">신생아 케어 일반</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">이론</td>
                                <td>
                                    <ul>
                                        <li>1. 신생아 반응표현 이해</li>
                                        <li>2. 우는 신생아 대처</li>
                                        <li>3. 신생아와 놀기</li>
                                        <li>4. 신생아 재우기</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">신생아 건강 및 안전관리</td>
                                <td class="t_center">1.5</td>
                                <td class="t_center">2.5</td>
                                <td>
                                    <ul>
                                        <li>1. 신생아 체온측정</li>
                                        <li>2. 신생아 예방접종</li>
                                        <li>3. 신생아 질환 이해</li>
                                        <li>4. 신생아 안전 위협요인 및 상황별 대처</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">산모 영양 관리</td>
                                <td class="t_center">1.</td>
                                <td class="t_center">4.</td>
                                <td>
                                    <ul>
                                        <li>1. 산모에게 필요한 영양성분 이해</li>
                                        <li>2. 산모 식단 요구사항 파악</li>
                                        <li>3. 식단구성</li>
                                        <li>4. 주요메뉴 조리법</li>
                                        <li>5. 식자재 등 사후처리</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">산모 건강 관리</td>
                                <td class="t_center">2.</td>
                                <td class="t_center">4.</td>
                                <td>
                                    <ul>
                                        <li>1. 산욕기 증상의 이해 및 대처</li>
                                        <li>2. 산욕기 위생관리</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">산모 신체회복 지원</td>
                                <td class="t_center">2.</td>
                                <td class="t_center">6.</td>
                                <td>
                                    <ul>
                                        <li>1. 산후 주요 문제부위</li>
                                        <li>2. 산모 체조</li>
                                        <li>3. 유방관리</li>
                                        <li>4. 부종 및 복부관리</li>
                                        <li>5. 산후 체중관리</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">가족 지원</td>
                                <td class="t_center">1.</td>
                                <td class="t_center"></td>
                                <td>
                                    <ul>
                                        <li>1. 가족 지원 범위</li>
                                        <li>2. 큰아이 양육보조</li>
                                        <li>3. 기타 가족 지원</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">가사 지원</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 가사 지원 범위</li>
                                        <li>2. 청소</li>
                                        <li>3. 장보기</li>
                                        <li>4. 각종 뒷정리</li>
                                        <li>5. 쓰레기 처리</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">정서 지원</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 상담, 조언 기본자세</li>
                                        <li>2. 위기 및 긴급 지원 네트워크</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">서비스 리뷰 </td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">2.5</td>
                                <td>
                                    <ul>
                                        <li>1. 서비스 단계별 주의 및 고려사항</li>
                                        <li>2. 역할연기</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">현장 문제 및 갈등해결 </td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">1.5</td>
                                <td>
                                    <ul>
                                        <li>1. 현장에서 발생하는 갈등사례</li>
                                        <li>2. 주요 상황별 대처 및 문제해결 방안</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">제공기록 관리</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">1.</td>
                                <td>
                                    <ul>
                                        <li>1. 제공기록지 작성원칙</li>
                                        <li>2. 제공기록지 작성방법</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">특이사항 보고</td>
                                <td class="t_center"></td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 보고대상 및 보고내용</li>
                                        <li>2. 보고방법</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="t_strong">서비스 비용결제</td>
                                <td class="t_center">0.5</td>
                                <td class="t_center">0.5</td>
                                <td>
                                    <ul>
                                        <li>1. 서비스 비용 결제 원칙</li>
                                        <li>2. 서비스 비용 결제방법</li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>