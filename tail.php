<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}
?>

<script>
//메인 하단 제휴 슬라이드
$(document).ready(function(){
	$('.slider2').bxSlider({
		slideWidth: 180,
		minSlides: 2,
		maxSlides: 5,
		moveSlides: 1,
		slideMargin: 5,
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

<!-- 하단 시작 { -->
	
	<div class="f_partner">
		<div style="">
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
					<a href="http://www.morucompany.com" target="_blank"><img src="<?php echo G5_IMG_URL ?>/main/fp8.jpg" alt=""></a>
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
	
	<div class="footerBG">
		<footer>
			<h1><a href="/"><img src="<?php echo G5_IMG_URL ?>/main/footer_logo.jpg" alt="하단로고"></a></h1>

			<ul>
				<li><img src="<?php echo G5_IMG_URL ?>/main/footer_tell1.jpg" alt="대표전화 02-903-2222"></li>
				<li><img src="<?php echo G5_IMG_URL ?>/main/footer_tell2.jpg" alt="대표전화 02-3144-2585"></li>
			</ul>

			<address>상호:닥터맘 앤 닥터베베 ㅣ 대표자 : 고현진 ㅣ 개인정보관리책임자 : 고현진 ㅣ 통신판매신고번호 : 제 2017-서울강서-0881호 ㅣ 팩스번호 : 02-326-2556<br/>
			사업자 등록번호 : 210-17-61053 | 국내유료직업소개사업 신고번호 : 제 2017-3150166-14-5-00008호 ㅣ 주소 : 서울시 강서구 양천로 60길 19 강영빌딩 4층 </address>

			<p class="copy">COPYRIGHT <a href="<?php echo G5_ADMIN_URL ?>">ⓒ</a> DOCTORMAM ALL RIGHTS RESREVED.</p>
		</footer>
	</div>

</div>
</body>
</html>

<!---네이버공통스크립트 설치  161207_arcthan-->
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"> </script> 
<script type="text/javascript"> 
if (!wcs_add) var wcs_add={};
wcs_add["wa"] = "s_cde1c0d62ba";
if (!_nasa) var _nasa={};
wcs.inflow();
wcs_do(_nasa);
</script>

<?php
if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<?php
include_once(G5_PATH."/tail.sub.php");
?>