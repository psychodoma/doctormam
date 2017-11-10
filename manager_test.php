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
				
				<style>
					.grade{clear:both;padding:10px auto;margin:15px 30px; font-weight:bold;font-size:14px;line-height:14px;}

					dt{float:left; width:145px;height:30px; line-height:30px; text-align:center;border-radius:5px;color:white;}
					dd{float:left;line-height:30px;margin-left:18px;width:550px;}

					.grade_1 {background:#ff6600; }
					.grade_2 {background:#194b96; }
					.grade_3 {background:#145517; }

					.fgrade_1 {color:#ff6600;}
					.fgrade_2{color:#194b96;}
					.fgrade_3{color:#145517;}
				</style>

                <div class="s_cont">
				
                    <p class="sub2_1_img1"><img src="img/sub2/sub2_1/sub2_1_img1.jpg" alt=""/></p>
				<!--
					<div class="grade">
						<dt class="grade_1">베이직 산후관리사</dt> 
						<dd><span class="fgrade_1">기본교육 60시간</span>을 이수하고 산후관리근무 경력이 800시간 미만인 산후관리사를 말합니다.</dd>
					</div>
					<div class="grade">
						<dt class="grade_2">베스트 산후관리사</dt> 
						<dd>베이직 산후관리사로 산후관리근무 <span class="fgrade_2">경력이 800시간</span> 이상이며, 교체건이 년 <span class="fgrade_2">3회 이하</span>인 산후관리사를 말합니다.</dd>
					</div>
					<div class="grade">
						<dt class="grade_3">프리미엄 산후관리사</dt>
						<dd>베스트 산후관리사로 산후관리근무<span class="fgrade_3">경력이1600시간</span>이상이며, 교체건이 년 <span class="fgrade_3">2회 이하</span>신분들로 <span class="fgrade_3">본사 프리미엄 교육 20시간을 이수</span>한 산후관리사를 말합니다.</dd>
					</div>
				-->
					<p class="sub2_1_btn"><a href="/service_premium.php"><img src="img/sub2/sub2_1/sub2_1_btn1.jpg" alt="프리미엄 산후관리사 명단 보러가기"/></a></p>
					<p class=""><img src="img/sub2/sub2_1/sub2_1_img2.jpg" alt=""/></p>
					<p class="sub2_1_btn mb100"><a href="/service_signiture.php"><img src="img/sub2/sub2_1/sub2_1_btn2.jpg" alt="명품플러스 산후관리사 명단 보러가기"/></a></p>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>