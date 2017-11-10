<?php
include_once('./_common.php');

//define('_INDEX_', true);
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
                <h3 class="subpage_name">산후관리사소개</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>
				
			

                <div class="s_cont">
				
                    <p class="sub2_1_img1"><img src="img/sub2/sub2_1/sub2_1_img11_2.jpg" alt=""/></p>
				
					<p class="sub2_1_btn"><a href="/service_premium.php"><img src="img/sub2/sub2_1/sub2_1_btn1.jpg" alt="프리미엄 산후관리사 명단 보러가기"/></a></p>
					<p class=""><img src="img/sub2/sub2_1/sub2_1_img22.jpg" alt=""/></p>
					<p class="sub2_1_btn mb100"><a href="/service_signiture.php"><img src="img/sub2/sub2_1/sub2_1_btn2.jpg" alt="명품플러스 산후관리사 명단 보러가기"/></a></p>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>