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
                <h3 class="subpage_name">윤리강령 및 에티켓</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">


                   <div class="sub4_0_tab">
						<ul class="tab_sub4_title">
							<li><a class="tab_link active" href="#tab1">윤리규정</a></li>
							<li><a href="#tab2" ids="1" class="tab_link">에티켓</a></li>
						</ul>

						<div class="tabDetails" style="border:none; margin:0">
							<div id="tab1" class="tabContents1">
								<h3 class="sub2_5_1noTitle"><img src="img/sub2/sub2_5/sub2_5_1txt.jpg" alt="닥터맘 윤리강령"/></h3>
								
								<ul class="sub2_5noLi">
									<li><img src="img/sub2/sub2_5/sub2_5_1no1.jpg" alt="건강 관리사로서의 책임과 의무를 다한다"/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no2.jpg" alt="건강 관리사로서 전문성 개발을 위해 노력한다"/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no3.jpg" alt="건강 관리사로서 올바른 정보를 제공하고 올바르게 사용한다."/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no4.jpg" alt="건강관리사로서 고객의 사생활을 존중하며 타인에게 누설하지 않는다"/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no5.jpg" alt="건강 관리사로서 어떠한 형태의 금전, 선물을 요구하거나 이해관계자에게 제공하지 않는다."/></li>

									<li><img src="img/sub2/sub2_5/sub2_5_1no6.jpg" alt="건강 관리사로서 업무시간 및 회사재산을 업무상 목적에 맞게 사용한다."/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no7.jpg" alt="건강 관리사로서 산모, 신생아에게 항상 바른 언어를 사용한다."/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no8.jpg" alt="산후관리사로서 개인의 품위와 회사의 명예를 유지할 수 있도록 노력한다"/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no9.jpg" alt="산후관리사로서 안전을 도모할 책임과 의무를 가지며 직무수행시 안전사고 예방에 최선을 다한다"/></li>
									<li><img src="img/sub2/sub2_5/sub2_5_1no10.jpg" alt="회사의 정책 및 방침에 따라 주어진 권한과 책임을 명확히 인식하고 직무를 수행하며 그 결과에 책임을 진다."/></li>
								</ul>
							</div><!--탭1 끝-->




							<div id="tab2" class="tabContents1">
								<p class="sub2_3_img1_1"><img src="img/sub2/sub2_5/sub2_5_img.jpg" alt=""/></p>
							</div><!--탭2 끝-->

						</div>

					</div><!--sub4_0_tab 전체 감싼 탭 끝-->


                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>