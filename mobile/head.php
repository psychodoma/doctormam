<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

?>
    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.service_cont_l p,.service_cont_r p,.rule_txt').wordBreakKeepAll();
});
</script>

<style>
	.syslog{text-align:right;background:rgba(0,0,0,0.8);color:#ccc;font-family:dotum,"돋움";font-size:11px;}
	.syslog .branch{color:white;font-weight:bold;}
	.syslog a{padding:10px;margin:0;display:inline-block;color:#ccc;}
	.syslog a.sys_logout{border-left:1px solid #000;background:rgba(255,255,255,0.3);padding:10px 14px;margin-left:5px;}
	.syslog a.adm{float:left;border-right:2px solid #000;background:black;}

</style>
<?
	if($member["mb_level"] > 6){
		echo "<div class='syslog'><span class='branch'>".$member["mb_nick"]." </span>| ".$member["mb_name"]."관리자 <a href='/bbs/logout.php' class='sys_logout'>X</a> <a href='/adm/' class='adm'> 관리자   </a></div></div>";
	} 
?>

<div style="overflow:hidden;">
<div id="black_bg" onclick="javascript:potfol_close()"></div>
<div id="headerBG_m">

	<h1 class="logo_m"><a href="/"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_logo.jpg" alt="닥터맘 로고"/></a></h1>

	<header class="headSect" id="header_768">
		<p class="menu" id="open_btn" onclick="javascript:potfol_fn()"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_menu.jpg" alt="전체메뉴열기"/></p>
			<div id="allmenuH" class="allmenu">
				<div class="allmenuIn">
					<strong class="btclose"><a href="javascript:potfol_close()"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_close.jpg" alt="전체메뉴 닫기" id="close_btn"/ ></a></strong>
					<nav>
						<ul class="f_line_top">
							<h3></h3>
							<li class="menu1 small_menu">
								<p class="bgm">닥터맘소개</p>
							</li>
							<ul class="sub_ul" id="menu1">
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/intro_history.php"><li class="sgm">인사말 및 연혁</li></a>
								<a class="bodr0" href="<?php echo G5_MOBILE_URL ?>/intro_auth.php"><li class="sgm">인증서 및 자격증</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/intro_entry.php"><li class="sgm">조직도</li></a>
								<a class="bodr0" href="<?php echo G5_MOBILE_URL ?>/intro_branch.php"><li class="sgm">닥터맘 지점개설</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/intro_map.php""><li class="sgm">위치 및 연락처</li></a>
								<a class="bodr0" href="<?php echo G5_MOBILE_URL ?>/intro_introduce.php"><li class="sgm">닥터맘 소개</li></a>
							</ul>

							<li class="menu2 small_menu">
								<p class="bgm">산후관리사</p>
							</li>
							<ul class="sub_ul" id="menu2">
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/manager_intro.php"><li class="sgm">산후관리사소개</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/manager_edu.php"><li class="sgm">교육과정</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/manager_etiquette.php"><li class="sgm">윤리강령 및 에티켓</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/manager_timetable.php"><li class="sgm">일과표</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/manager_bemanager.php"><li class="sgm">산후관리사가 되려면?</li></a>
							</ul>

							<li class="menu3 small_menu">
								<p class="bgm">서비스안내</p>
							</li>
							<ul class="sub_ul" id="menu3">
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/service_good.php"><li class="sgm">닥터맘 알뜰형</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/service_basic.php"><li class="sgm">닥터맘 일반형</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/service_best.php"><li class="sgm">닥터맘 베스트</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/service_premium.php"><li class="sgm">닥터맘 프리미엄</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/service_signiture.php"><li class="sgm">닥터맘 명품플러스</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/service_global.php"><li class="sgm">닥터맘Global Service</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/service_voucher.php"><li class="sgm">바우처</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/service_terms.php"><li class="sgm">이용약관</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/service_info.php"><li class="sgm">서비스 안내</li></a>
							</ul>
							
							<!--
							<li class="menu4 small_menu">
								<p class="bgm">모유수유</p>
							</li>
							<ul class="sub_ul" id="menu4">
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/feeding_about.php"><li class="sgm">모유수유 전문가란?</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/feeding_package.php"><li class="sgm">모유수유 패키지</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/feeding_program.php"><li class="sgm">프로그램</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/feeding_consult.php"><li class="sgm">모유수유 상담</li></a>
							</ul>
							-->

							<li class="menu4 small_menu">
								<p class="bgm">이용요금</p>
							</li>
							<ul class="sub_ul" id="menu4">
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/fee_branch.php"><li class="sgm">서비스요금 모두 보기</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/fee_online_info.php"><li class="sgm">온라인예약</li></a>
							</ul>
							
							<!--
							<li class="menu6 small_menu">
								<p class="bgm">산모교실</p>
							</li>
							<ul class="sub_ul" id="menu6">
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/education_intro.php"><li class="sgm">산모교실</li></a>
								<a class="" href="<?php echo G5_MOBILE_URL ?>/education_schedule.php"><li class="sgm">산모교실 일정</li></a>
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/education_review.php"><li class="sgm">산모교실 후기</li></a>
							</ul>
							-->

							<li class="menu5 small_menu">
								<p class="bgm">지점안내</p>
							</li>
							<ul class="sub_ul" id="menu5">
								<!--<a class="bodr1" href="<?php /*echo G5_MOBILE_URL */?>/branch_intro.php"><li class="sgm">지사소개</li></a>-->
								<a class="bodr1" href="<?php echo G5_MOBILE_URL ?>/branch_map.php"><li class="sgm">지사별 위치및 연락처</li></a>
							</ul>

							<li class="menu6 small_menu">
								<p class="bgm">커뮤니티</p>
							</li>
							<ul class="sub_ul" id="menu6">
								<a class="bodr1" href="/bbs/board.php?bo_table=edu&sca=산모교실"><li class="sgm">산모교실</li></a>
								<a class="bodr1" href="/bbs/board.php?bo_table=edu&sca=산후관리사 양성교육"><li class="sgm">산후관리사 양성교육</li></a>
								<a class="" href="/bbs/board.php?bo_table=edu&sca=베이비시터 양성교육"><li class="sgm">베이비시터 양성교육</li></a>
								<a class="bodr1" href="/bbs/board.php?bo_table=gallery"><li class="sgm">닥터맘갤러리</li></a>
								<a class="" href="/bbs/qalist.php"><li class="sgm">문의하기</li></a>
								<a class="bodr1" href="/bbs/board.php?bo_table=review"><li class="sgm">이용후기</li></a>
								<a class="" href="/bbs/board.php?bo_table=news"><li class="sgm">닥터맘 뉴스</li></a>
								<a class="bodr1" href="/bbs/board.php?bo_table=event"><li class="sgm">이벤트</li></a>
							</ul>

							<!--<a href="#" class="bgm">
								<li class="menu9 small_menu">결제하기</li>
							</a>-->

						</ul>
					</nav>
				</div>
			</div>
	</header>
</div>

<script>
	function PopupCalc2(){
		 window.open("<?php echo G5_URL ?>/mobile/mobile_voucherTable.html","_blank","width=100%,resizable=no, scrollbars=no, status=no;")
	}
</script>
<!-----------------------------------------------------//   header end  //-------------------------------------------------------------->