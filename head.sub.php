<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 테마 head.sub.php 파일
if(!defined('G5_IS_ADMIN') && defined('G5_THEME_PATH') && is_file(G5_THEME_PATH.'/head.sub.php')) {
    require_once(G5_THEME_PATH.'/head.sub.php');
    return;
}

$begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    $g5_head_title = $g5['title']; // 상태바에 표시될 제목
    $g5_head_title .= " | ".$config['cf_title'];
}

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="Author" content=""/>
    <meta name="Keywords" content="닥터맘,산모도우미,산후도우미,산후조리원,산후관리사,모유수유전문가"/>
    <meta name="Description" content="산모도우미, 산후관리사 전문업체, 모유수유 전문가, 방문서비스 안내, 산후관리사 교육실시"/>
	<link rel="canonical" href="http://www.doctormam.com">

<?php
if (G5_IS_MOBILE) {
    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
    echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
    echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
} else {
    echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
    echo '<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">'.PHP_EOL;
}

if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>
<!--<title><?php echo $g5_head_title; ?></title>-->
<title>닥터맘 산모도우미</title>




<?php
if (defined('G5_IS_ADMIN')) {
    if(!defined('_THEME_PREVIEW_'))
        echo '<link rel="stylesheet" href="'.G5_ADMIN_URL.'/css/admin.css">'.PHP_EOL;
} else {
    echo '<link rel="stylesheet" href="'.G5_CSS_URL.'/'.(G5_IS_MOBILE?'mobile':'default').'.css">'.PHP_EOL;
}
?>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->





<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
<?php if(defined('G5_IS_ADMIN')) { ?>
var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
<?php } ?>
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.menu.js"></script>
<script src="<?php echo G5_JS_URL ?>/common.js"></script>
<script src="<?php echo G5_JS_URL ?>/wrest.js"></script>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/form_jquery.js"></script>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/jquery-ui.js"></script>



<!-- 탑버튼 -->
<script>
	$(document).ready(function(){
			
		$(".top_btn").hide(); // 탑 버튼 숨김
		$(function () {
					 
			$(window).scroll(function () {
				if ($(this).scrollTop() > 700) { // 스크롤 내릴 표시
					$('.top_btn').fadeIn();
				} else {
					$('.top_btn').fadeOut();
				}
			});
					
			$('.top_btn').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);  // 탑 이동 스크롤 속도
				return false;
			});
		});
	 
	});
</script>


<?php
$mobile_str = "";
if(G5_IS_MOBILE) {
    echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
    echo '<script src="'.G5_JS_URL.'/jquery.word-break-keep-all.min.js"></script>'.PHP_EOL;
    echo '<script src="'.G5_JS_URL.'/javascript_ex.js"></script>'.PHP_EOL;
    $mobile_str = "mobile_";
}else{
    if (!defined('G5_IS_ADMIN')) {
        echo '<script type="text/javascript" src="' . G5_JS_URL . '/quick.js"></script>';
    }
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/javascript.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/jquery-ui.css"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<? if(!strpos($_SERVER["REQUEST_URI"],"adm/")){ ?>
<!-- bxSlider Javascript file -->
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/jquery.bxslider.js"></script>

<!-- bxSlider CSS file -->
<?if(G5_IS_MOBILE) {?>
	<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/mobile_jquery.bxslider.css"/>
<?}else{?>
	<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/jquery.bxslider.css"/>
<?}?>
<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/<?php echo $mobile_str ?>main.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/<?php echo $mobile_str ?>sub.css"/>
<?php } ?>

</head>
<body>

<img class="top_btn" src="<?php echo G5_IMG_URL ?>/top_btn.png" style="right:102px; bottom:20px; position:fixed; z-index:9999; cursor:pointer" alt="위로가기"/>
