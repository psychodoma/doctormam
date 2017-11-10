<?php
if (!defined('_GNUBOARD_')) exit;

$begin_time = get_microtime();

include_once(G5_PATH.'/head.sub.php');

function print_menu1($key, $no)
{
    global $menu;

    $str = print_menu2($key, $no);

    return $str;
}

function print_menu2($key, $no)
{
    global $menu, $auth_menu, $is_admin, $auth, $g5;

    $str .= "<ul class=\"gnb_2dul\">";
    for($i=1; $i<count($menu[$key]); $i++)
    {
        if ($is_admin != 'super' && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], 'r')))
            continue;

        if (($menu[$key][$i][4] == 1 && $gnb_grp_style == false) || ($menu[$key][$i][4] != 1 && $gnb_grp_style == true)) $gnb_grp_div = 'gnb_grp_div';
        else $gnb_grp_div = '';

        if ($menu[$key][$i][4] == 1) $gnb_grp_style = 'gnb_grp_style';
        else $gnb_grp_style = '';

        $str .= '<li class="gnb_2dli"><a href="'.$menu[$key][$i][2].'" class="gnb_2da '.$gnb_grp_style.' '.$gnb_grp_div.'">'.$menu[$key][$i][1].'</a></li>';

        $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
    }
    $str .= "</ul>";

    return $str;
}

if($_REQUEST["bo_table"] == "reservation"){
$board_skin_path = str_replace("/www/","/www/adm/",$board_skin_path."/../reservation");
$board_skin_url = str_replace("/skin/","/adm/skin/",$board_skin_url."/../reservation");
//echo $board_skin_path;
}else if($_REQUEST["bo_table"] == "promotion"){
$board_skin_path = str_replace("/www/","/www/adm/",$board_skin_path."/../promotion");
$board_skin_url = str_replace("/skin/","/adm/skin/",$board_skin_url."/../promotion");
//echo $board_skin_path;
}else if($_REQUEST["bo_table"] == "freegift" && !$_REQUEST["p"] ){
$board_skin_path = str_replace("/www/","/www/adm/",$board_skin_path."/../freegift");
$board_skin_url = str_replace("/skin/","/adm/skin/",$board_skin_url."/../freegift");
//echo $board_skin_path;
}else{
$board_skin_path = str_replace("/www/","/www/adm/",$board_skin_path."/../basic");
$board_skin_url = str_replace("/skin/","/adm/skin/",$board_skin_url."/../basic");
}
if(is_mobile()){
$board_skin_path = str_replace("mobile/","",$board_skin_path);
$board_skin_url = str_replace("mobile/","",$board_skin_url);
}
/*$board_skin_path = str_replace("/www/","/www/adm/",$board_skin_path."/../basic");
$board_skin_url = str_replace("/skin/","/adm/skin/",$board_skin_url."/../basic");*/

$qa_skin_path = str_replace("/www/","/www/adm/",get_skin_path('qa', $qaconfig['qa_skin']));
$qa_skin_url = str_replace("/skin/","/adm/skin/",$qaconfig['qa_skin']);

?>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


<script>
var tempX = 0;
var tempY = 0;

function imageview(id, w, h)
{

    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - ( w + 11 );
    submenu.top  = tempY - ( h / 2 );

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}
</script>


<?if($is_mobile){
	echo '<link rel="stylesheet" href="'.G5_ADMIN_URL.'/css/admin_mobile.css">';}
?>

<style>
	.badge {background:#555;border-radius:10px;color:white;padding:5px 10px;margin-left:-20px;font-size:12px;position:relative;top:3px;line-height:18px;}
	.badge2 {background:#eee;border-radius:10px;color:black;padding:5px 10px;margin-left:-20px;font-size:12px;position:relative;top:3px;line-height:18px;}
	/*.badge2{position:absolute;top:0;background:#888;color:white;padding:10px 15px 30px;}*/
</style>

<div id="to_content"><a href="#container">본문 바로가기</a></div>

<header id="hd">
    <div id="hd_wrap">
        <!--<h1><?php echo $config['cf_title'] ?></h1>-->

        <div id="logo">
			<a href="<?php echo G5_ADMIN_URL ?>"><img src="<?php echo G5_ADMIN_URL ?>/img/adm/adm_logo.jpg" alt="<?php echo $config['cf_title'] ?> 관리자"></a>
			<div style="display:inline-block;" class="badge2">
			<?
				echo "<strong>".$member['mb_nick']."</strong>";
				echo " | ".$member['mb_name']." 관리자";
			?>
			</div>
		</div>
			
        <ul id="tnb">
			<li><a href="/">사이트바로가기</li>
			<li><a href="/adm/admin_fix.php">유지보수 신청</li>
            <li><a href="<?php echo G5_ADMIN_URL ?>/dr_board.php?bo_table=document">관리자인트라넷</a></li>
            <li><a href="<?php echo G5_ADMIN_URL ?>/dr_member_form.php?w=u&amp;mb_id=<?php echo $member['mb_id'] ?>&member_type=<?php echo $member['mb_level'];?>">관리자정보</a></li>
            <!--<li><a href="<?php /*echo G5_ADMIN_URL */?>/config_form.php">기본환경</a></li>
            <li><a href="<?php /*echo G5_ADMIN_URL */?>/service.php">부가서비스</a></li>
            <li><a href="<?php /*echo G5_URL */?>/">커뮤니티</a></li>
            <?php /*if(defined('G5_USE_SHOP')) { */?>
            <li><a href="<?php /*echo G5_ADMIN_URL */?>/shop_admin/configform.php">쇼핑몰환경</a></li>
            <li><a href="<?php /*echo G5_SHOP_URL */?>/">쇼핑몰</a></li>
            --><?php /*} */?>
            <li id="tnb_logout"><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
        </ul>

    </div>

	<nav id="gnb">
		<h2>관리자 주메뉴</h2>
		<?php
		$gnb_str = "<ul id=\"gnb_1dul\">";
		foreach($amenu as $key=>$value) {
			$href1 = $href2 = '';
			if ($menu['menu'.$key][0][2]) {
				$href1 = '<a href="'.$menu['menu'.$key][0][2].'" class="gnb_1da">';
				$href2 = '</a>';
			} else {
				continue;
			}
			$current_class = "";
			if (isset($sub_menu) && (substr($sub_menu, 0, 3) == substr($menu['menu'.$key][0][0], 0, 3)))
				$current_class = " gnb_1dli_air";
			$current_display ="";
			if($is_admin != 'super' && !strstr($auth[$key."100"],"r"))
				$current_display = " style='display:none;' ";
			$gnb_str .= '<li class="gnb_1dli'.$current_class.'" '.$current_display.'>'.PHP_EOL;
			$gnb_str .=  $href1 . $menu['menu'.$key][0][1]. $href2;
			$gnb_str .=  print_menu1('menu'.$key, 1);
			$gnb_str .=  "</li>";


		}
		$gnb_str .= "</ul>";
		echo $gnb_str;
		?>
	</nav>

</header>

<?php if($sub_menu) { ?>
<ul id="lnb" style="width:1000px;margin: 0 auto;">
<?php
$menu_key = substr($sub_menu, 0, 3);
$nl = '';
foreach($menu['menu'.$menu_key] as $key=>$value) {
    if($key > 0) {
        if ($is_admin != 'super' && (!array_key_exists($value[0],$auth) || !strstr($auth[$value[0]], 'r')))
            continue;

        if($value[3] == 'cf_service')
            $svc_class = ' class="lnb_svc"';
        else
            $svc_class = '';

        echo $nl.'<li><a href="'.$value[2].'"'.$svc_class.'>'.$value[1].'</a></li>';
        $nl = PHP_EOL;
    }
}
?>
</ul>
<?php } ?>
<div id="wrapper">
    <div id="container" <?php if(basename($_SERVER["PHP_SELF"]) == "dr_schedule_month.php"){ ?> style="width:1320px;" <?php } ?>>
        <?php if(empty($bo_table)){ ?>
        <h1><?php echo $g5['title'] ?></h1>
        <?php } ?>