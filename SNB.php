<script>
$(document).ready(function(){
	$('.bxslider1').bxSlider({
		auto: true,
		autoControls: false,
        pager:false,
        controls:false
	});
});
</script>

<div class="subslo_img bx-wrapper">
	<ul class="bxslider1">
		<li><img src="<?php echo G5_IMG_URL ?>/sub/sub_slo.jpg" /></li>
		<li><img src="<?php echo G5_IMG_URL ?>/sub/sub_slo1.jpg" /></li>
		<li><img src="<?php echo G5_IMG_URL ?>/sub/sub_slo2.jpg" /></li>
	</ul>
</div>
<div class="subcontent"><!--1000px-->
<div class="sub_leftNavi">
    <?php
    $basename=explode("_",basename($_SERVER["PHP_SELF"]));
    $page_name = $basename[0];
    $page_sub_name = str_replace(".php","",$basename[1]);
     if($page_name == "intro"  ){?>
    <h3><img src="<?php echo G5_IMG_URL ?>/sub/sub1_title.jpg" alt="닥터맘소개"/></h3>
    <ul class="leftNavi">
        <li class="<?php if($page_sub_name == "history"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/intro_history.php">인사말 및 연혁</a></li>
		<li class="<?php if($page_sub_name == "auth"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/intro_auth.php">인증서 및 자격증</a></li>
		<li class="<?php if($page_sub_name == "entry"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/intro_entry.php">조직도</a></li>
        <li class="<?php if($page_sub_name == "branch"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/intro_branch.php">닥터맘 지점개설</a></li>
        <li class="<?php if($page_sub_name == "map"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/intro_map.php">위치 및 연락처</a></li>
    </ul>
    <?php }else if($page_name == "manager"){ ?>
    <h3><img src="<?php echo G5_IMG_URL ?>/sub/sub2_title.jpg" alt="산후관리사"/></h3>
    <ul class="leftNavi">
        <li class="<?php if($page_sub_name == "intro"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/manager_intro.php">산후관리사소개</a></li>
        <li class="<?php if($page_sub_name == "edu"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/manager_edu.php">교육과정</a></li>
		<li class="<?php if($page_sub_name == "etiquette"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/manager_etiquette.php">윤리강령 및 에티켓</a></li>
        <li class="<?php if($page_sub_name == "timetable"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/manager_timetable.php">일과표</a></li>
        <li class="<?php if($page_sub_name == "bemanager"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/manager_bemanager.php">산후관리사가 되려면?</a></li>
        <li class="<?php if($page_sub_name == "app"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/manager_app.php">지원하기</a></li>
    </ul>
         <?php }else if($page_name == "service") { ?>
   				<h3><img src="<?php echo G5_IMG_URL ?>/sub/sub3_title.jpg" alt="서비스안내"/></h3>
				<ul class="leftNavi">
					<li class="<?php if($page_sub_name == "good"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_good.php">닥터맘 알뜰형</a></li>
					<li class="<?php if($page_sub_name == "basic"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_basic.php">닥터맘 일반형</a></li>
					<li class="<?php if($page_sub_name == "best"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_best.php">닥터맘 베스트</a></li>
					<li class="<?php if($page_sub_name == "premium"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_premium.php">닥터맘 프리미엄</a></li>
					<li class="<?php if($page_sub_name == "signiture"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_signiture.php">닥터맘 명품플러스</a></li>
					<li class="<?php if($page_sub_name == "global"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_global.php">닥터맘 Global Service</a></li>
					<li class="<?php if($page_sub_name == "voucher"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_voucher.php">바우처</a></li>
					<li class="<?php if($page_sub_name == "terms"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/service_terms.php">이용약관</a></li>
				</ul>
    <?php }else if($page_name == "fee"){ ?>
    <h3><img src="<?php echo G5_IMG_URL ?>/sub/sub4_title.jpg" alt="이용요금"/></h3>
    <ul class="leftNavi">
		<li class="<?php if($page_sub_name == "branch"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/fee_branch.php">서비스 요금 보기</a></li>
        <li class="<?php if($page_sub_name == "online"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/fee_online_info.php">온라인 예약</a></li>
    </ul>
    <?php }else if($page_name == "write.php" || $page_name == "board.php" || strstr($page_name,"qa")){ ?>
         <h3><img src="<?php echo G5_IMG_URL ?>/sub/sub5_title.jpg" alt="닥터맘 커뮤니티"/></h3>
         <ul class="leftNavi">
             <li class="<?php if($bo_table == "news"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=news">닥터맘뉴스</a></li>
             <li class="<?php if($bo_table == "review"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=review">이용후기</a></li>
             <li style="padding:0;">
                 <p>닥터맘교육</p>
                 <ul class="leftNavi_ul2">
                     <li class="<?php if($_REQUEST["sca"] == "산모교실"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=edu&sca=<?=urlencode("산모교실")?>">산모교실</a></li>
                     <li class="<?php if($_REQUEST["sca"] == "산후관리사 양성교육"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=edu&sca=<?=urlencode("산후관리사 양성교육")?>">산후관리사 양성교육</a></li>
                     <li class="<?php if($_REQUEST["sca"] == "베이비시터 양성교육"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=edu&sca=<?=urlencode("베이비시터 양성교육")?>">베이비시터 양성교육</a></li>
                 </ul>
             </li>
             <li class="<?php if($bo_table == "gallery"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=gallery">닥터맘 갤러리</a></li>
             <li class="<?php if(strstr($page_name,"qa")){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/qalist.php">문의하기</a></li>
             <li class="<?php if($bo_table == "event"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=event">이벤트</a></li>
         </ul>
    <?php }else if($page_name == "branch"){ ?>
         <h3><img src="<?php echo G5_IMG_URL ?>/sub/sub1_title.jpg" alt="닥터맘소개"/></h3>
         <ul class="leftNavi">
             <!--<li class="<?php /*if($page_sub_name == "intro"){ */?>leftActive<?php /*} */?>"><a href="<?php /*echo G5_URL */?>/branch_intro.php">지사소개</a></li>-->
             <li class="<?php if($page_sub_name == "map"){ ?>leftActive<?php } ?>"><a href="<?php echo G5_URL ?>/branch_map.php">지사별 위치및 연락처</a></li>
         </ul>
    <?php } ?>
    <ul class="leftInfo">
        <li><img src="<?php echo G5_IMG_URL ?>/sub/sub_time.jpg" alt="근무시간 평일:09:00 ~ 19:00, 토요일:09:00 ~ 16:00"/></li>
        <!--<li><img src="<?php echo G5_IMG_URL ?>/sub/sub_call.jpg" alt="고객센터 02-903-2222"/></li>-->
    </ul>
</div>