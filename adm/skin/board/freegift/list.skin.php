<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 7;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>


<STYLE>
 i{margin-left:3px; padding-top:-5px;}   
</STYLE>

<link rel="stylesheet" href="./css/font-awesome.min.css">
<link rel="stylesheet" href="/css/jquery-ui.css" />


<h1 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h1>
<!-- 게시판 검색 시작 { -->



<?php
include('freegift_message.php');
?>
<br><br><br>
<div style='background:#aaa; width:100%; height:3px;'></div>
<br><br><br>
<?
include('tap.php');
?>


<!-- } 게시판 검색 끝 -->
<!-- 게시판 목록 시작 { -->


<!-- 페이지 -->
<?php echo $write_pages;  ?>


	


<?php if ($is_checkbox) { ?>
<script>
$(function(){
    $('.td_num').each(function(){
        if( $(this).text()== '보내기'){
            $(this).children().css('color','white');
            $(this).children().css('background','rgb(38, 125, 125)');
        }else if( $(this).text()== '보내기 완료'){
            $(this).children().css('color','white');
            $(this).children().css('background','rgb(121, 121, 121)');
        }

    })

})


// function all_checked(sw) {
//     var f = document.fboardlist;


//     for (var i=0; i<f.length; i++) {
//         if (f[i].elements.chk_wr_id_5.name == "chk_wr_id[]")
//             f[i].elements[9].checked = sw;
//     }
// }

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./dr_board_list_update.php";
    }


    if(document.pressed == "선택문자보내기") {
        if (!confirm("선택한 게시물을 정말 보내시겠습니까?"))
            return false;

        f.removeAttribute("target");
        f.action = "./dr_board_list_update.php";
    } 

    if(document.pressed == "선택완료하기") {
        if (!confirm("선택한 게시물을 정말 보내시겠습니까?"))
            return false;

        f.removeAttribute("target");
        f.action = "./dr_board_list_update.php";
    } 

    if(document.pressed == "선택보내기") {
        if (!confirm("선택한 게시물을 정말 보내시겠습니까?"))
            return false;

        f.removeAttribute("target");
        f.action = "./dr_board_list_update.php";
    }    

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./dr_move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
