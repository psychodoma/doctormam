<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}
?>


<script>
//메인 하단 제휴 슬라이드
$(document).ready(function(){
	$('.slider2').bxSlider({
		slideWidth: 120,
		minSlides: 2,
		maxSlides: 5,
		moveSlides: 1,
		//slideMargin: 5,
		//autoHover: true,
        //useCSS: false,
		auto: true,
		controls: false,
		pager: false,
		autoControls: true,
		speed: 1200
	});
});
</script>

<!-- <label class="partner_lb"><i class="fa fa-hand-o-right" aria-hidden="true"></i> 제휴/협력 업체<label> -->
<div class="f_partner">
	<div class="f_partnerSlide">
		<div class="slider2">
			<div class="slide">
				<a href="http://www.socialservice.or.kr/" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp1.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://www.mohw.go.kr/front_new/index.jsp" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp2.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://www.ssis.or.kr/index.do" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp3.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://www.ask.re.kr/" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp4.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://drbebe.morucompany.gethompy.com/" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp5.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://www.jigw.co.kr/" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp6.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://ehealth.gangbuk.go.kr/" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp7.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://morucompany.com" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp8.jpg" alt=""></a>
			</div>
			<div class="slide">
				<a href="http://jungbu.seoulwomen.or.kr/" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp9.jpg" alt=""></a>
			</div>


				<div class="slide">
					<a href="http://gannanagi.com" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp10.jpg" alt=""></a>
				</div>
				<div class="slide">
					<a href="http://www.multtaro.com" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp11.jpg" alt=""></a>
				</div>
				<div class="slide">
					<a href="http://www.ggomoosin.com" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp12.jpg" alt=""></a>
				</div>
				<div class="slide">
					<a href="http://bio-oil.or.kr" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp13.jpg" alt=""></a>
				</div>
				<div class="slide">
					<a href="http://www.bebenarin.com" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp14.jpg" alt=""></a>
				</div>


		</div>
	</div>
</div>


<footer>
	<div class="fbarea">
		<p class="finfo">상호 : 닥터맘 앤 닥터베베 ㅣ 대표자 : 고현진 <br>사업자등록번호 : <span class="footernum">210-17-61053</span> <br> 주소 : 서울시 강서구 양천로 60길 19 강영빌딩 4층 <br>국내유료직업소개사업 신고번호 : 제 2017-3150166-14-5-00008호  <br> 통신판매신고번호 : 제 2017-서울강서-0881호 <br> 개인정보관리책임자 : 고현진</p>

		<address style="color:#ccc;letter-spacing:0px;">COPYRIGHT <a href="<?php echo G5_ADMIN_URL ?>" style="color:#ccc">ⓒ</a> DOCTORMAM ALL RIGHTS RESREVED.</address>
	</div>
</footer>
</div>



<?php

if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
<!--<a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a>-->

<?php


}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>


<!---네이버공통스크립트 설치  161207_arcthan-->
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"> </script> 
<script type="text/javascript"> 
if (!wcs_add) var wcs_add={};
wcs_add["wa"] = "s_cde1c0d62ba";
if (!_nasa) var _nasa={};
wcs.inflow();
wcs_do(_nasa);
</script>


<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");
?>