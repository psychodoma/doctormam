<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
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
    include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
}
?>

<?
// 본사는 mb_level = 9 이기 때문에 mb_nick 으로 구분 처리 
$sql_se = " select mb_branch,mb_tel,mb_no,mb_id from {$g5['member_table']} where mb_level = '7' and (".get_location('서울') . ") order by mb_no";
$result_se = sql_query($sql_se);

$sql_ic = " select mb_branch,mb_tel,mb_no,mb_id from {$g5['member_table']} where mb_level = '7' and (".get_location('경인') . ") order by mb_no";
$result_ic = sql_query($sql_ic);

$sql_gy = " select mb_branch,mb_tel,mb_no,mb_id from {$g5['member_table']} where mb_level = '7' and (".get_location('경기') . ") order by mb_no";
$result_gy = sql_query($sql_gy);

$sql_ch = " select mb_branch,mb_tel,mb_no,mb_id from {$g5['member_table']} where mb_level = '7' and (".get_location('충청/전북') . ") order by mb_no";
$result_ch = sql_query($sql_ch);

$sql_gs = " select mb_branch,mb_tel,mb_no,mb_id from {$g5['member_table']} where mb_level = '7' and (".get_location('경상남북') . ") order by mb_no";
$result_gs = sql_query($sql_gs);

?>

<script> 
$(document).ready(function(){
    $("#ban1").mouseenter(function(){
		$("#ban2").toggle(500,function(){});
    })
		/*
    $("#ban2").mouseleave(function(){
		$("#ban2").toggle(500,function(){});
    })*/

})

function closebranch(){
	$("#ban2").toggle(500,function(){});
}
</script> 

<!-- 상단 시작 { -->
<div class="al">
    <div id="quick1">
	
        <ul class="quick_c">
			
            <li><img src="<?php echo G5_IMG_URL ?>/main/quick1.jpg" alt=""/></li>
			<li>
				<img src="<?php echo G5_IMG_URL ?>/main/quick4.jpg" style="cursor:pointer;" id="ban1" alt="전국지사안내"/>
				
				<div class="s_info" id="ban2">
					<div class="s_info_close">
						<a href="javascript:closebranch();" style="display: block;">
							<i class="fa fa-times close_icon" aria-hidden="true"></i><p style="float:left; font-size: 13px; margin-top: 2px;">창닫기</p>
						</a>
					</div>
					<div class="s_info_area pb30">
						<h3>서울지역</h3>
						<ul class="s_info_list">
						<?php
						for ($i=0; $row=sql_fetch_array($result_se); $i++)
						{
						?>
							<li>
								<a href="/branch_map.php?branch=<?=$row['mb_id']?>&si=서울">
									<p class="s_store"><?=$row['mb_branch']?></p>
									<p class="s_tell"><?=$row['mb_tel']?></p>
								</a>
							</li>
						<?php
						}
						?>
						</ul>
					</div>

					<div class="s_info_area">
						<h3>경인지역</h3>
						<ul class="s_info_list">
						<?php
						for ($i=0; $row=sql_fetch_array($result_ic); $i++)
						{
						?>
							<li>
								<a href="/branch_map.php?branch=<?=$row['mb_id']?>&si=경인">
									<p class="s_store"><?=$row['mb_branch']?></p>
									<p class="s_tell"><?=$row['mb_tel']?></p>
								</a>
							</li>
						<?php
						}
						?>
						</ul>
					</div>

					<div class="s_info_area">
						<h3>경기지역</h3>
						<ul class="s_info_list">
						<?php
						for ($i=0; $row=sql_fetch_array($result_gy); $i++)
						{
						?>
							<li>
								<a href="/branch_map.php?branch=<?=$row['mb_id']?>&si=경기">
									<p class="s_store"><?=$row['mb_branch']?></p>
									<p class="s_tell"><?=$row['mb_tel']?></p>
								</a>
							</li>
						<?php
						}
						?>
						</ul>
					</div>

					<div class="s_info_area">
						<h3>충청/전북지역</h3>
						<ul class="s_info_list">
						<?php
						for ($i=0; $row=sql_fetch_array($result_ch); $i++)
						{
						?>
							<li>
								<a href="/branch_map.php?branch=<?=$row['mb_id']?>&si=충청/전북">
									<p class="s_store"><?=$row['mb_branch']?></p>
									<p class="s_tell"><?=$row['mb_tel']?></p>
								</a>
							</li>
						<?php
						}
						?>
						</ul>
					</div>

					<div class="s_info_area pb40">
						<h3>경상남북지역</h3>
						<ul class="s_info_list">
						<?php
						for ($i=0; $row=sql_fetch_array($result_gs); $i++)
						{
						?>
							<li>
								<a href="/branch_map.php?branch=<?=$row['mb_id']?>&si=경상남북">
									<p class="s_store"><?=$row['mb_branch']?></p>
									<p class="s_tell"><?=$row['mb_tel']?></p>
								</a>
							</li>
						<?php
						}
						?>
							<!-- <li>
								<a href="/branch_map.php?branch=drmam_dg&si=경상남북">
									<p class="s_store">대구·경산점</p>
									<p class="s_tell">053-792-3533</p>
								</a>
							</li>
							<li>
								<a href="/branch_map.php?branch=drmam_bs&si=경상남북">
									<p class="s_store">북부산점</p>
									<p class="s_tell">051-818-8222</p>
								</a>
							</li>
							<li>
								<a href="/branch_map.php?branch=drmam_us&si=경상남북">
									<p class="s_store">울산점</p>
									<p class="s_tell">052-223-7723</p>
								</a>
							</li>
							<li>
								<a href="/branch_map.php?branch=drmam_ph&si=경상남북">
									<p class="s_store">포항·경주점</p>
									<p class="s_tell">054-249-7771</p>
								</a>
							</li> -->
						</ul>
					</div>
					<div class="s_info_close">
						<a href="javascript:closebranch();" style="display: block;">
							<i class="fa fa-times close_icon" aria-hidden="true"></i><p style="float:left; font-size: 13px; margin-top: 2px;">창닫기</p>
						</a>
					</div>
				</div>
			</li>
            <li><a href="<?php echo G5_BBS_URL ?>/qalist.php"><img src="<?php echo G5_IMG_URL ?>/main/quick3.jpg" alt="예약하기"/></a></li>
			<li><img src="<?php echo G5_IMG_URL ?>/main/quick2.jpg" alt="카카오톡ID drmam2003"/></li>
            <!--<li><a href="http://cafe.naver.com/mamtalks" target="_black"><img src="<?php /*echo G5_IMG_URL */?>/main/quick5.jpg" alt="닥터맘블로그"/></a></li>-->
            <li><a href="http://cafe.naver.com/mamtalks" target="_black"><img src="<?php echo G5_IMG_URL ?>/main/quick6.jpg" alt="닥터맘카페"/></a></li>
        </ul>
    </div>

<style>
	.syslog{position:absolute;top:8px;z-index:5000;color:black;padding:5px 10px;font-size:11px;font-family:dotum,"돋움";color:#454545;}
	.sys_branch{background:#4a1a66;padding:4px 10px 3px;border-radius:3px;color:#f1f1f1;font-weight:bold;font-size:11px;}
	.syslog a{color:#666;margin:0 3px;padding:4px;}
	.syslog a.sys_logout{margin-left:20px;}
	/*.sys_logout{margin-left:10px;background:rgba(255,255,255,0.6);padding:3px 10px;margin-top:2px;}
	.sys_logout:visited,.sys_logout:focus,.sys_logout:link{color:black;text-decoration:none;}
	.sys_logout:hover{background:#4a1a66;;color:white;}*/
</style>

    <div id="header_tBG">
        <form method="get" action="<?php echo G5_URL ?>/branch_map.php" class="head_sear">

		<?
			if($member["mb_level"] > 6){
				echo "<div class='syslog'><span class='sys_branch'>".$member["mb_nick"]."</span> ".$member["mb_name"]."관리자님 로그인중입니다. <a href='/bbs/logout.php' class='sys_logout'>로그아웃</a>  |  <a href='/adm/'>관리자바로가기</a></div>";
			
			} 
		?>

            <fieldset class="fr_field">
                <legend>검색창</legend>

                <ul id="login">
                    <li class="ser_title">지사검색</li>
                    <li class="idbox">
                        <label for="serach_branch" class="hide">지사입력</label>
                        <input type="text" class="searchbar" title="지사입력" name="serach_branch" id="search_branch"/>
                    </li>
                    <li class="loginbtn">
                        <input type="image" src="<?php echo G5_IMG_URL ?>/main/search.png" alt="지사검색"  title="지사검색" />
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>

    <div id="header_mBG">
        <h1><a href="/"><img src="<?php echo G5_IMG_URL ?>/main/logo.jpg" alt="로고"/></a></h1>
        <ul class="navi">
            <?php
            $sql = " select *
                        from {$g5['menu_table']}
                        where me_use = '1'
                          and length(me_code) = '2'
                        order by me_order, me_id ";
            $result = sql_query($sql, false);

            for ($i=0; $row=sql_fetch_array($result); $i++) {
            ?>
                <li><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a></li>
            <?php
            }
            ?>

        </ul>
    </div>
    <div id="header_bBG">
        <ul>
            <li><a href="<?php echo G5_URL ?>/manager_intro.php"><img src="<?php echo G5_IMG_URL ?>/main/navi2_1.jpg" alt="산후도우미"/></a></li>
            <li><a href="<?php echo G5_URL ?>/fee_branch.php"><img src="<?php echo G5_IMG_URL ?>/main/navi2_2.jpg" alt="이용요금안내"/></a></li>
            <li><a href="javascript:PopupCalc();"><img src="<?php echo G5_IMG_URL ?>/main/navi2_3.jpg" alt="요금계산"/></a></li>
            <li style="padding-right:2px;"><a href="<?php echo G5_URL ?>/fee_online_app.php?type=manager"><img src="<?php echo G5_IMG_URL ?>/main/navi2_4.jpg" alt="예약하기"/></a></li>
        </ul>
    </div>
<!-- } 상단 끝 -->
<script>

$(function(){
	var lopathname = location.pathname;
	//alert(lopathname);
		var popupX = (window.screen.width / 2) - (1200 / 2);
		var popupY= (window.screen.height /2) - (700 / 2);
		//window.open("<?php echo G5_URL ?>/doc_popup.php","_blank","width=600, height=700,resizable=no, scrollbars=yes, status=no, left="+popupX+", top="+popupY+";")

	if(lopathname != "/" && lopathname != "/index.php"){
		if(lopathname.match("bbs")){
			lopathname = lopathname.split('bbs')[0];
		}else{
			lopathname = lopathname.split('_')[0];	
		}

		//alert(lopathname);

		$(".navi li a").each(function(){
			if(lopathname == $(this).attr('href').split('_')[0]){
				$(this).css('color','#7e23b1');
				//alert('1');
			}
			if(lopathname == $(this).attr('href').split('bbs')[0]){
				$(this).css('color','#7e23b1');
			}
		})
	}
})


    function PopupCalc(){
        window.open("<?php echo G5_URL ?>/charge.php","_blank","width=500, height=700,resizable=no, scrollbars=no, status=no;")
    }
	function PopupCalc1(){
		var popupX = (window.screen.width / 2) - (1200 / 2);
		var popupY= (window.screen.height /2) - (700 / 2);
		 window.open("<?php echo G5_URL ?>/familysite.html","_blank","width=1200, height=700,resizable=no, scrollbars=yes, status=no, left="+popupX+", top="+popupY+";")
	}
	function PopupCalc3(){
		var popupX = (window.screen.width / 2) - (1200 / 2);
		var popupY= (window.screen.height /2) - (700 / 2);
		 window.open("<?php echo G5_URL ?>/storeinfo.html","_blank","width=1200, height=700,resizable=no, scrollbars=yes, status=no, left="+popupX+", top="+popupY+";")
	}
	function PopupCalc2(){
		 window.open("<?php echo G5_URL ?>/mobile_voucher_table.html","_blank","width=100%,resizable=no, scrollbars=no, status=no;")
	}
</script>