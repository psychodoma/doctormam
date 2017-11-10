<?php
	$active_navi = "";

	function active_menu($str){
		if(basename($_SERVER["PHP_SELF"]) == $str) return 'class="m_subnavi_active"';
		if($_REQUEST["bo_table"] == $str) return 'class="m_subnavi_active"';
		if($_REQUEST["sca"] == $str) return 'class="m_subnavi_active"';
	}
	$page_name_arr = explode("_",basename($_SERVER["PHP_SELF"]));
	if($page_name_arr[0] == "intro"){
?>

		<div class="m_subnavi">
			<ul>
				<li><a href="<?php echo G5_MOBILE_URL ?>/intro_history.php" <?php echo active_menu("intro_history.php") ?>>인사말 및 연혁</a></li>
				<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/intro_auth.php" <?php echo active_menu("intro_auth.php") ?>>인증서 및 자격증</a></li>

				<li><a href="<?php echo G5_MOBILE_URL ?>/intro_entry.php" <?php echo active_menu("intro_entry.php") ?>>조직도</a></li>
				<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/intro_branch.php" <?php echo active_menu("intro_branch.php") ?>>닥터맘 지점개설</a></li>

				<li class="borderb borderb"><a href="<?php echo G5_MOBILE_URL ?>/intro_map.php" <?php echo active_menu("intro_map.php") ?>>위치 및 연락처</a></li>
				<li class="borderr borderb"><a href="<?php echo G5_MOBILE_URL ?>/intro_introduce.php" <?php echo active_menu("intro_introduce.php") ?>>닥터맘 소개</a></li>
			</ul>
		</div>
<?php }else if($page_name_arr[0] == "manager"){?>
		<div class="m_subnavi">
			<ul>
			<li><a href="<?php echo G5_MOBILE_URL ?>/manager_intro.php" <?php echo active_menu("manager_intro.php") ?>>산후관리사 소개</a></li>
			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/manager_edu.php" <?php echo active_menu("manager_edu.php") ?>>교육과정</a></li>

			<li><a href="<?php echo G5_MOBILE_URL ?>/manager_etiquette.php" <?php echo active_menu("manager_etiquette.php") ?>>윤리강령 및 에티켓</a></li>
			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/manager_timetable.php" <?php echo active_menu("manager_timetable.php") ?>>일과표</a></li>

			<li class="borderb"><a href="<?php echo G5_MOBILE_URL ?>/manager_bemanager.php" <?php echo active_menu("manager_bemanager.php") ?>>산후관리사가 되려면?</a></li>
			<li class="borderr borderb"><a href="<?php echo G5_MOBILE_URL ?>/manager_apply.php" <?php echo active_menu("manager_apply.php") ?>>지원하기</a></li>
		</ul>
		</div>
<?php }else if($page_name_arr[0] == "service"){?>
			<div class="m_subnavi">
		<ul>
			<!-- <li ><a href="<?php echo G5_MOBILE_URL ?>/service_info.php" <?php echo active_menu("service_info.php") ?>>서비스안내</a></li> -->
			<li ><a href="<?php echo G5_MOBILE_URL ?>/service_good.php" <?php echo active_menu("service_good.php") ?>>닥터맘알뜰형</a></li>


			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/service_basic.php" <?php echo active_menu("service_basic.php") ?>>닥터맘일반형</a></li>
			<li ><a href="<?php echo G5_MOBILE_URL ?>/service_best.php" <?php echo active_menu("service_best.php") ?>>닥터맘베스트</a></li>

			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/service_premium.php" <?php echo active_menu("service_premium.php") ?>>닥터맘프리미엄</a></li>
			<li ><a href="<?php echo G5_MOBILE_URL ?>/service_signiture.php" <?php echo active_menu("service_signiture.php") ?>>닥터맘명품플러스</a></li>

			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/service_global.php" <?php echo active_menu("service_global.php") ?>>닥터맘Global Service</a></li>
			<li><a href="<?php echo G5_MOBILE_URL ?>/service_voucher.php" <?php echo active_menu("service_voucher.php") ?>>바우처</a></li>

			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/service_terms.php" <?php echo active_menu("service_terms.php") ?>>이용약관</a></li>
			<li class="borderb"><a href="<?php echo G5_MOBILE_URL ?>/service_info.php" <?php echo active_menu("service_info.php") ?>>서비스안내</a></li>
		</ul>
	</div>
<?php }else if($page_name_arr[0] == "feeding"){?>
			<div class="m_subnavi">
		<ul>
			<li><a href="<?php echo G5_MOBILE_URL ?>/feeding_about.php" <?php echo active_menu("feeding_about.php") ?>>모유수유 전문가란?</a></li>
			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/feeding_package.php" <?php echo active_menu("feeding_package.php") ?>>모유수유 패키지</a></li>

			<li class="borderb"><a href="<?php echo G5_MOBILE_URL ?>/feeding_program.php" <?php echo active_menu("feeding_program.php") ?> >프로그램</a></li>
			<li class="borderr borderb"><a href="<?php echo G5_MOBILE_URL ?>/feeding_consult.php" <?php echo active_menu("feeding_consult.php") ?>>모유수유 상담</a></li>
		</ul>
	</div>
<?php }else if($page_name_arr[0] == "fee"){?>
	<div class="m_subnavi">
		<ul>
			<li class="borderr borderb"><a href="<?php echo G5_MOBILE_URL ?>/fee_branch.php" <?php echo active_menu("fee_branch.php") ?>>서비스요금 모두 보기</a></li>
			<li class="borderb"><a href="<?php echo G5_MOBILE_URL ?>/fee_online_info.php" <?php echo active_menu("fee_online_info.php") ?> <?php echo active_menu("fee_online_app.php") ?><?php echo active_menu("fee_online_feeding.php") ?> <?php echo active_menu("fee_online_massage.php") ?>>온라인 예약</a></li>
		</ul>
	</div>
<?php }else if($page_name_arr[0] == "education"){?>
	<div class="m_subnavi">
		<ul>
			<li><a href="<?php echo G5_MOBILE_URL ?>/education_intro.php" <?php echo active_menu("education_intro.php") ?>>산모교실</a></li>
			<li class="borderr"><a href="<?php echo G5_MOBILE_URL ?>/education_schedule.php" <?php echo active_menu("education_schedule.php") ?>>산모교실 일정</a></li>

			<li class="borderb"><a href="<?php echo G5_MOBILE_URL ?>/education_review.php" <?php echo active_menu("education_review.php") ?>>산모교실 후기</a></li>
		</ul>
	</div>
<?php }else if($page_name_arr[0] == "branch"){?>
	<div class="m_subnavi">
		<ul>
			<!--<li class="borderb"><a href="<?php /*echo G5_MOBILE_URL */?>/branch_intro.php" <?php /*echo active_menu("branch_intro.php") */?>>지사소개</a></li>-->
			<li class="borderr borderb"><a href="<?php echo G5_MOBILE_URL ?>/branch_map.php" <?php echo active_menu("branch_map.php") ?>>지사별 위치및 연락처</a></li>
		</ul>
	</div>
<?php }else if($page_name_arr[0] == "board.php" || $page_name_arr[0] == "qalist.php" || $page_name_arr[0] == "qaview.php" || $page_name_arr[0] == "qawrite.php"){?>
	<div class="m_subnavi">
		<ul>
			<li><a href="/bbs/board.php?bo_table=edu&sca=산모교실" <?php echo active_menu("산모교실") ?>>산모교실</a></li>
			<li class="borderr"><a href="/bbs/board.php?bo_table=edu&sca=산후관리사 양성교육" <?php echo active_menu("산후관리사 양성교육") ?>>산후관리사 양성교육</a></li>
			<li ><a href="/bbs/board.php?bo_table=edu&sca=베이비시터 양성교육" <?php echo active_menu("베이비시터 양성교육") ?>>베이비시터 양성교육</a></li>

			<li class="borderr"><a href="/bbs/board.php?bo_table=gallery" <?php echo active_menu("gallery") ?>>닥터맘갤러리</a></li>
			<li ><a href="/bbs/qalist.php" <?php echo active_menu("qalist.php") ?><?php echo active_menu("qaview.php") ?><?php echo active_menu("qawrite.php") ?>>문의하기</a></li>

			<li class="borderr"><a href="/bbs/board.php?bo_table=review" <?php echo active_menu("review") ?>>이용후기</a></li>
			<li ><a href="/bbs/board.php?bo_table=news" <?php echo active_menu("news") ?>>닥터맘 뉴스</a></li>

			<li class="borderr"><a href="/bbs/board.php?bo_table=event" <?php echo active_menu("event") ?>>이벤트</a></li>
			
		</ul>
	</div>
<?php } ?>
