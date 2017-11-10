<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
?>
<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
			<p class="sub2_4_img1"><img src="<?php echo G5_MOBILE_IMG ?>/sub2/sub2_4/sub2_4_img1.jpg" alt=""/></p>

			<p class="sub2_1_btn"><a href="<?php echo G5_MOBILE_URL ?>/manager_apply.php" class="sub2_btn1">산후관리사 지원하기</a></p>
		</div>
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>