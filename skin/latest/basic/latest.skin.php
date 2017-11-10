<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>


    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php
            //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\">";
				if($bo_table != "review"){
					echo "<p class=\"t1_txt\">".$list[$i]['subject']."<p>";
				}else{
					echo "<p class=\"t1_txt\">".$list[$i]['wr_subject_ck']."<p>";
				}
            echo "<p class=\"t1_date\">[".date("Y.m.d", strtotime( $list[$i]['wr_datetime'] ) ) ."]</p>";
            echo "</a>";
             ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
