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
                <h3 class="subpage_name">닥터맘 지점개설</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">
                    <h4 class="sub1_2_img1"><img src="img/sub1/sub1_2/sub1_2_store.jpg" alt=""/></h4>

                    <div class="sub1_2cont">
                        <h4><img src="img/sub1/sub1_2/sub1_2_title2.jpg" alt="지사개설안내"/></h4>

                        <ul class="sub1_2_list">
                            <li class="sub1_2_li li_bg1">
                                <h2>지사 모집지역</h2>

                                    <h3 class="sub1_2_liTitle">수도권 및 전국 전지역</h3>
                                    <p>서울제외(본사직영 서비스)<br/>
                                        현재지사개설지역제외<br/>
                                        (단, 협의를 통해 지사 개설 가능)</p>
                            </li>

                            <li class="sub1_2_li">
                                <h2>초기 투자 비용</h2>

                                    <h3 class="sub1_2_liTitle">사무실 임대료</h3>
                                    <p>7평 이상의 사무실</p>

                                    <h3 class="sub1_2_liTitle">가맹비</h3>
                                    <p>지역별 상이,본사문의</p>

                                    <h3 class="sub1_2_liTitle">물품구매비</h3>
                                    <p>무료대여용품 구비, 컴퓨터 및<br/>
                                        사무용품,홍보물<br/>
                                        (리플렛,명함등)</p>
                            </li>

                            <li class="sub1_2_li li_bg2">
                                <h2>지사운영자 자격조건</h2>

                                    <ul class="sub1_2_list2">
                                        <li>육아 경험과 교육에 관심있는<br/>
											30~50대 여성</li>
										<li>컴퓨터 기본활용 가능자</li>
										<li>간호사,의사,약사<br/>
										사회복지사2급이상<br/>
										간호조무사 출신 또는<br/>
										산후조리원 근무 경험자 우대</li>
                                    </ul>
                            </li>


                            <li class="sub1_2_li li_bg3">
                                <h2>본사 지원 사항</h2>

                                    <ul class="sub1_2_list2">
                                        <li>지사장 및 산후도우미 인력<br/>
                                            교육지원</li>
                                        <li>지사 운영 경영 컨설팅</li>
                                        <li>온/오프라인마케팅 지원</li>
                                        <li>물품구매지원</li>
                                    </ul>
                            </li>
                        </ul>

                        <p><img src="img/sub1/sub1_2/sub1_2_img2.jpg" alt="지사개설절차안내"/></p>
                    </div>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>