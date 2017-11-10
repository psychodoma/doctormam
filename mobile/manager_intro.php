<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
?>

	<div id="m_wrap">
<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
			<div class="msub_container">
			<p class="sub1_1_img2"><img src="/img/sub2/sub2_1/sub2_1_img11_2.jpg" alt=""/></p>
			<p class="sub2_1_btn"><a href="<?php echo G5_MOBILE_URL ?>/service_premium.php" class="sub2_btn">프리미엄 산후관리사 명단 보러가기</a></p>

			<p class=""><img src="/img/sub2/sub2_1/sub2_1_img22.jpg" alt=""/></p>
			<p class="sub2_1_btn"><a href="<?php echo G5_MOBILE_URL ?>/service_signiture.php" class="sub2_btn">명품플러스 산후관리사 명단 보러가기</a></p>
		</div>
		</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>