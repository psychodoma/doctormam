<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
?>



	<div id="m_wrap">
		<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>

		<p class="m_txtimg2"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_txtimg2.jpg" alt="감동 서비스가 상식인 기억" style="width:100%;"/></p>

		<div class="msub_container">


			<div class="">
				<div class="service_l">
					<section class="service_cont_l">
						<h3><span class="point">Point01</span> 전문화+감동서비스</h3>

						<p>시대의 흐름에맞는 최적의서비스를 제공하기 위해 우수한 강사진들로 구성된 닥터맘 교육기관에서 산후관리사님의 교육을 책임지고 있으며, 더 나아가 단순히 서비스를 제공하는데 만족하지 않고 산모님의 마음까지 감동을 줄 수 있는 감동서비스로 다가갑니다.</p>
					</section>

					<p class="servicrImg_l"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_img1.jpg" alt="전문화 이미지"></p>
				</div>

				<div class="service_r">
					<section class="service_cont_r">
						<h3><span class="point">Point02</span> 모유수유 하는 닥터맘</h3>

						<p>아기는 엄마젖을 먹을 때가 가장 행복하고 편안한시간입니다. 닥터맘은 모유수유를 성공할 수 있도록 최선을 다해 산모님과 함께합니다. 국제 모유수유전문가와 함계 공동 개발한 모유수유 성공 프로젝트!! 닥터맘에서 만나실 수 있습니다.</p>
					</section>

					<p class="servicrImg_r"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_img2.jpg" alt="모유수유 이미지"></p>
				</div>

				<div class="service_l">
					<section class="service_cont_l">
						<h3 class="sm_slo"><span class="point">Point03</span> 주는 사랑이 기쁨이<span class="hei">되는 닥터맘</span></h3>

						<p>전세계 아이들이 행복해지는 간절한 바램으로 매년 닥터맘 지점장님들, 산후관리사님과 함께 가난한 나라를 방문하여 산모님께서 보내주신 많은 후원물품을 전달해 드리고 옵니다. 사랑을 전하는 것은 어려운일이 아닙니다. 작은 손길들을 모아 큰 행복을 주는 닥터맘에 여러분들도 함께 하실 수 있습니다.</p>
					</section>

					<p class="servicrImg_l"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_img3.jpg" alt="가족 이미지"></p>
				</div>

			</div>


			<div class="div1">
				<h3 style="font-size:16px; margin-bottom:15px; color:#7f36ab;">인증서 및 자격증</h3>
				<ul class="m_license" style="padding:0;">
					<li>
						<p class="m_license_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_s_img1.jpg" alt="산모신생아 건강관리사 교육기관(서울특별시)"></p>
						<p class="m_license_txt"><span class="point2">1.</span>산모신생아<br/>건강관리사교육기관<br/>서울특별시</p>
					</li>

					<li>
						<p class="m_license_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_s_img2.jpg" alt="모유수유 전문기관"></p>
						<p class="m_license_txt"><span class="point2">2.</span>모유수유<br/>전문기관</p>
					</li>

					<li>
						<p class="m_license_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_s_img3.jpg" alt="한국보건복지 정보개발원 자문기관"></p>
						<p class="m_license_txt"><span class="point2">3.</span>한국보건복지<br/>정보개발원<br/>자문기관</p>
					</li>
				</ul>
			</div>



		</div>

	</div>


<?if($scroll){?>

	<script>
		$(function(){
			var offset = $(".div1").offset();
			var top = offset.top+1000;
			$('body').animate({scrollTop : top},0);
		})

	</script>

<?}?>


<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>