<?php
$sub_menu = "800400";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$g5['title'] = '설문조사집계';
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once('./admin.head.php');

if(!(isset($currentPage))){
     $currentPage = 1;
}        



if(!(isset($fr_date))){
     $fr_date = date("Y-m-d", strtotime("-1 month", time()));
      $date_ck = "1month";
} 
if(!(isset($to_date))){
     $to_date = date("Y-m-d", strtotime("+1 day", time()));
}     



?>

<style type="text/css">
.one_month_btn:hover, .two_month_btn:hover, .all_month_btn:hover{
    background: #d23474;
    border : #d23474;
    color:white;
}    

.res_chart_title{
    text-align: left;
    height:30px;
    padding-top :30px;
    font-weight: bold;
    font-size:  15px;
    color:#383838;
    letter-spacing: -0.1em;
}
.res_chart_num{
    text-align: left;
    height:20px;
    font-weight: bold;
    font-size:  13px;
    color:#383838;
    letter-spacing: -0.1em;

}

</style>

<script>

jQuery(function($){
    $.datepicker.regional["ko"] = {
        closeText: "닫기",
        prevText: "이전달",
        nextText: "다음달",
        currentText: "오늘",
        monthNames: ["1월(JAN)","2월(FEB)","3월(MAR)","4월(APR)","5월(MAY)","6월(JUN)", "7월(JUL)","8월(AUG)","9월(SEP)","10월(OCT)","11월(NOV)","12월(DEC)"],
        monthNamesShort: ["1월","2월","3월","4월","5월","6월", "7월","8월","9월","10월","11월","12월"],
        dayNames: ["일","월","화","수","목","금","토"],
        dayNamesShort: ["일","월","화","수","목","금","토"],
        dayNamesMin: ["일","월","화","수","목","금","토"],
        weekHeader: "Wk",
        dateFormat: "yymmdd",
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: ""
    };
	$.datepicker.setDefaults($.datepicker.regional["ko"]);

$('.detail_view').click(function(){
var winHeight = document.body.clientHeight; // 현재창의 높이
var winWidth = document.body.clientWidth;   // 현재창의 너비
var winX = window.screenLeft;   // 현재창의 x좌표
var winY = window.screenTop;    // 현재창의 y좌표

var popX = winX + (winWidth - 800)/2;
var popY = winY + (winHeight - 1600)/2;
//window.open("http://www.google.co.kr","popup","width="+500+"px,height="+700+"px,top="+popY+",left="+popX);

   // location.href = "http://doctormam.morucompany.com/question_view.php?app_id="+$(this).val();

     window.open("http://doctormam.com/question_detail.php?app_id="+$(this).attr('value'),"_blank","width=700,height=700px,top=popY,left=popX, scrollbars=yes");

 //window.open("<?php echo G5_URL ?>/charge.php","_blank","width=500, height=700,resizable=no, scrollbars=no, status=no;")

})


});
</script>
<form name="fvisit" id="fvisit" class="local_sch02 local_sch" method="get">
<div class="sch_last">
    <strong>기간별검색</strong>
    <input type="text" name="fr_date" value="<?php echo $fr_date ?>" id="fr_date" class="frm_input" size="11" maxlength="10">
    <label for="fr_date" class="sound_only">시작일 </label>
    ~
    <input type="text" name="to_date" value="<?php echo $to_date ?>" id="to_date" class="frm_input" size="11" maxlength="10">
    <label for="to_date" class="sound_only">종료일</label>
    <input type="submit" value="검색" class="btn_submit">
</div>
</form>

<div class="cjy_button_130330" style="">
	<button class='all_month_btn'>전체보기</button>
	<button class='one_month_btn'>한달전</button>
	<button class='two_month_btn'>두달전</button>
</div>
<div  style='display: none;' id='date_ck' value='<?=$date_ck?>'></div>


<form class='one_month' name="fvisit" id="fvisit" class="local_sch02 local_sch" method="get" style='display: none;' >
<div class="sch_last">
    <strong>기간별검색</strong>
    <input type="hidden" name="date_ck" value='1month'>
    <input type="text" name="fr_date" value="<?php echo date("Y-m-d", strtotime("-1 month", time())); ?>" id="fr_date" class="frm_input" size="11" maxlength="10">
    <label for="fr_date" class="sound_only">시작일</label>
    ~
    <input type="text" name="to_date" value="<?php echo date("Y-m-d", strtotime("+1 day", time())); ?>" id="to_date" class="frm_input" size="11" maxlength="10">
    <label for="to_date" class="sound_only">종료일</label>
    <input type="submit" value="검색" class="btn_submit one_month ">
</div>
</form>

<form class='two_month' name="fvisit" id="fvisit" class="local_sch02 local_sch" method="get" style='display: none;'>
<div class="sch_last">
    <strong>기간별검색</strong>
    <input type="hidden" name="date_ck" value='2month'>
    <input type="text" name="fr_date" value="<?php echo date("Y-m-d", strtotime("-2 month", time())); ?>" id="fr_date" class="frm_input" size="11" maxlength="10">
    <label for="fr_date" class="sound_only">시작일</label>
    ~
    <input type="text" name="to_date" value="<?php echo date("Y-m-d", strtotime("+1 day", time())); ?>" id="to_date" class="frm_input" size="11" maxlength="10">
    <label for="to_date" class="sound_only">종료일</label>
    <input type="submit" value="검색" class="btn_submit two_month">
</div>
</form>

<form class='all_month' name="fvisit" id="fvisit" class="local_sch02 local_sch" method="get" style='display: none;'>
<div class="sch_last">
    <strong>기간별검색</strong>
    <input type="hidden" name="date_ck" value='allmonth'>
    <input type="text" name="fr_date" value="<?php echo date("Y-m-d", strtotime("-10 year", time())); ?>" id="fr_date" class="frm_input" size="11" maxlength="10">
    <label for="fr_date" class="sound_only">시작일</label>
    ~
    <input type="text" name="to_date" value="<?php echo date("Y-m-d", strtotime("+1 day", time()));	 ?>" id="to_date" class="frm_input" size="11" maxlength="10">
    <label for="to_date" class="sound_only">종료일</label>
    <input type="submit" value="검색" class="btn_submit all_month">
</div>
</form>
<!--<ul class="anchor">
    <li><a href="./question_list.php<?php /*echo $query_string */?>">설문조사 목록</a></li>
    <li><a href="./question_branch.php<?php /*echo $query_string */?>">지점별 집계</a></li>
</ul>-->

<?php

$colspan = 12;

$sql_search = " where a.create_date between '{$fr_date}' and date_add('{$to_date}',interval +1 day) ";
//if (isset($domain))
    //$sql_search .= " and vi_referer like '%{$domain}%' ";
if($member["mb_level"] < 9)
    $sql_search .= " and res_branch = '".get_member($member["mb_id"],"mb_no")["mb_no"]."' ";
$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

/*$sql = " select * from question a join g5_write_reservation b on a.app_key = b.wr_id
            {$sql_common}
            {$sql_search}
            order by a.create_date desc
            limit {$from_record}, {$rows} ";
*/
//$sql = " select * from question";
//$sql = "select * from question order by create_date";

 

$current_first  = (int)($currentPage-1)*10;
$current_second  = (int)$currentPage*10;    

//$sql = "select * from question order by create_date desc limit 0,10";
if($member["mb_level"] >= 9){
    $sql = "select * from question where create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc ";
    $sql_cnt = "select count(1) as cnt from question where create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc ";
}else if($member["mb_level"] == 7){
    $sql = "select * from question where service_area =".'"'.$member["mb_no"].'"'." and create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc ";
    $sql_cnt = "select count(1) as cnt from question where service_area =".'"'.$member["mb_no"].'"'." and create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc ";
}   
//echo $sql;
$result = sql_query($sql);
$result_total = sql_fetch($sql_cnt);

?>
<style>
    .td_category{width:83px;}
</style>
<div class="tbl_head01 tbl_wrap">
<div class='res_chart_title'><? echo $fr_date;?> ~ <? echo $to_date;?> 설문조사 통계표</div>   
<div class='res_chart_num'>설문인원 : <? echo $result_total["cnt"] ?></div>
<div id='barChart' style="margin-left:-150px;"></div>
    <table style="display: none;">
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">이름</th>
        <th scope="col">지점</th>
        <th scope="col">만족도</th>
        <th scope="col">만족도</th>
        <th scope="col" title="산후관리사님의 성실성(근무시간)에 만족하십니까?">Q5</th>
        <th scope="col" title="산후관리사님의 영양관리(식사,간식)에 대해 만족하십니까?">Q6</th>
        <th scope="col" title="산후관리사님의 산후회복(마사지.111케어)관리에 대해 만족하십니까?">Q7</th>
        <th scope="col" title="산후관리사님의 신생아 관리(케어)에 대해 만족하십니까?">Q8</th>
        <th scope="col" title="산후관리사님의 위생관리(손씻기, 청소,세탁 등)에 대해 만족하십니까?">Q9</th>
        <th scope="col" title="담당 관리자의 고객응대 방법에 대해 만족하십니까?">Q10</th>
        <th scope="col" title="담당 관리자는 고객과의 상담시 서비스 내용에 대해 충분한 설명을 하였습니까?">Q11</th>
        <th scope="col" title="현재 이용하고 있는 제공기관(닥터맘)을 어떻게 알고 선택 하셨습니까?">Q12</th> 





<!--         <th scope="col" title="산후관리사님의 성실성(근무시간)에 만족하십니까?">Q5</th>
        <th scope="col" title="산후관리사님의 영양관리(식사,간식)에 대해 만족하십니까?">Q6</th>
        <th scope="col" title="산후관리사님의 산후회복(마사지.111케어)관리에 대해 만족하십니까?">Q7</th>
        <th scope="col" title="산후관리사님의 신생아 관리(케어)에 대해 만족하십니까?">Q8</th>
        <th scope="col" title="산후관리사님의 위생관리(손씻기, 청소,세탁 등)에 대해 만족하십니까?">Q9</th>
        <th scope="col" title="담당 관리자의 고객응대 방법에 대해 만족하십니까?">Q10</th>
        <th scope="col" title="담당 관리자는 고객과의 상담시 서비스 내용에 대해 충분한 설명을 하였습니까?">Q11</th>
        <th scope="col" title="현재 이용하고 있는 제공기관(닥터맘)을 어떻게 알고 선택 하셨습니까?">Q12</th> -->
		<!--<th scope="col" title="닥터맘 서비스 이용시 좋았던 점 또는 개선할 부분이 있다면 적어주시기 바랍니다.">Q13</th>-->
    </tr>
    </thead>
   

    <tbody>
    <?php
    $qs = array();
    for($i=5;$i < 13;$i++){
        $qs[$i] = array(0,0,0,0,0,0);
    }
    $i = 0;
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $link = '';
        $link2 = '';
        $referer = '';
        $title = '';
        if ($row['vi_referer']) {

            $referer = get_text(cut_str($row['vi_referer'], 255, ''));
            $referer = urldecode($referer);

            if (!is_utf8($referer)) {
                $referer = iconv_utf8($referer);
            }

            $title = str_replace(array('<', '>', '&'), array("&lt;", "&gt;", "&amp;"), $referer);
            $link = '<a href="'.$row['vi_referer'].'" target="_blank">';
            $link = str_replace('&', "&amp;", $link);
            $link2 = '</a>';
        }

        if ($is_admin == 'super')
            $ip = $row['vi_ip'];
        else
            $ip = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", G5_IP_DISPLAY, $row['vi_ip']);

        if ($brow == '기타') { $brow = '<span title="'.get_text($row['vi_agent']).'">'.$brow.'</span>'; }
        if ($os == '기타') { $os = '<span title="'.get_text($row['vi_agent']).'">'.$os.'</span>'; }

        $bg = 'bg'.($i%2);

        for($j=5;13 > $j;$j++){
            if($j == 11){
                if($row["qs_".$j] == 3) $qs[$j][5]++;
                $qs[$j][4] = 0;
                if($row["qs_".$j] == 2) $qs[$j][3]++;
                $qs[$j][2] = 0;
                if($row["qs_".$j] == 1) $qs[$j][1]++;
            }else if($j == 12){
                if($row["qs_".$j] == 2) $qs[$j][5]++;
                $qs[$j][4] = 0;
                $qs[$j][3] = 0;
                $qs[$j][2] = 0;
                if($row["qs_".$j] == 1) $qs[$j][1]++;
            }else{
                if($row["qs_".$j] == 5) $qs[$j][5]++;
                if($row["qs_".$j] == 4) $qs[$j][4]++;
                if($row["qs_".$j] == 3) $qs[$j][3]++;
                if($row["qs_".$j] == 2) $qs[$j][2]++;
                if($row["qs_".$j] == 1) $qs[$j][1]++;
            }
        }
	//print_r($row);
    ?>


    <?php
    }
    ?>
    <?php
    if ($i != 0){
    $str_array = array("","매우불만족","불만족","보통","만족","매우만족");
    for($k=5;0<$k;$k--) {
        ?>
        <tr>
            <?php if ($k == 5) { ?>
                <td class="bg2 td_category" rowspan="5" colspan="2">집계</br>(총<?php echo $total_count ?>개)</td><?php } ?>
            <td class="td_category" colspan="2"><?php echo $str_array[$k] ?></td>
            <td class="td_category total_value_5_<?=$k?>" value='<?=$qs[5][$k] ?>'><?php echo $qs[5][$k] ?></td>
            <td class="td_category total_value_6_<?=$k?>" value='<?=$qs[6][$k] ?>'><?php echo $qs[6][$k] ?></td>
            <td class="td_category total_value_7_<?=$k?>" value='<?=$qs[7][$k] ?>'><?php echo $qs[7][$k] ?></td>
            <td class="td_category total_value_8_<?=$k?>" value='<?=$qs[8][$k] ?>'><?php echo $qs[8][$k] ?></td>
            <td class="td_category total_value_9_<?=$k?>" value='<?=$qs[9][$k] ?>'><?php echo $qs[9][$k] ?></td>
            <td class="td_category total_value_10_<?=$k?>" value='<?=$qs[10][$k] ?>'><?php echo $qs[10][$k] ?></td>
<!--             <td class="td_category"><?php echo $qs[11][$k] ?></td>
            <td class="td_category"><?php echo $qs[12][$k] ?></td> -->
        </tr>
        <?php
    }
    }
    ?>
    <?php
    if ($i == 0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없거나 관리자에 의해 삭제되었습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>




<?php
$colspan = 12;

$sql_search = " where a.create_date between '{$fr_date}' and date_add('{$to_date}',interval +1 day) ";
//if (isset($domain))
    //$sql_search .= " and vi_referer like '%{$domain}%' ";
if($member["mb_level"] < 9)
    $sql_search .= " and res_branch = '".get_member($member["mb_id"],"mb_no")["mb_no"]."' ";
$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

/*$sql = " select * from question a join g5_write_reservation b on a.app_key = b.wr_id
            {$sql_common}
            {$sql_search}
            order by a.create_date desc
            limit {$from_record}, {$rows} ";
*/
//$sql = " select * from question ";
            //echo "ADFSADF";
if(!(isset($currentPage))){
     $currentPage = 1;
}        

if(!(isset($fr_date))){
     $fr_date = date("Y-m-d", strtotime("-1 month", time()));
}    
if(!(isset($to_date))){
     $to_date = date("Y-m-d", strtotime("+1 day", time()));
}      

$current_first  = (int)($currentPage-1)*10;
$current_second  = (int)$currentPage*10;    

$query_question = "select mb_no, mb_nick from g5_member where mb_level = 7 ";
$qdata = sql_query($query_question);

//$sql = "select * from question order by create_date desc limit 0,10";
if($member["mb_level"] >= 9){
    $sql = "select * from question where create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc limit ".$current_first.",10";
    $sql_cnt = "select count(*) as cnt from question where create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc";
}else if($member["mb_level"] == 7){
    $sql = "select * from question where service_area =".'"'.$member["mb_no"].'"'." and create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc limit ".$current_first.",10";
    $sql_cnt  = "select count(*) as cnt from question where service_area =".'"'.$member["mb_no"].'"'." and create_date >=".'"'.$fr_date.'"'." and create_date <=".'"'.$to_date.'"'."  order by create_date desc ";
}
//echo $member["mb_no"];
//echo $sql;
$result_cnt = sql_query($sql_cnt);
$result = sql_query($sql);
$cnt = sql_fetch_array($result_cnt);
$totalRow = $cnt["cnt"];
//echo $totalRow;
?>
<style>
    .td_category{width:83px;}
</style>
<div id='current_first' value='<?=$fr_date?>'></div>
<div id='current_second' value='<?=$to_date?>'></div>
<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
    <th scope="col">번호</th>
        <th scope="col">이름</th>
        <th scope="col">지점</th>
        <th scope="col">서비스 유형</th>
        <th scope="col">서비스 등급</th>
        <th scope="col"  style='width:40%;' title="닥터맘 서비스 이용시 좋았던 점 또는 개선할 부분이 있다면 적어주시기 바랍니다." >Q13 ( 좋았던 점 또는 개선할 부분이 있다면 적어주시기 바랍니다. ) </th>
        <th scope="col">보기</th>




<!--         <th scope="col" title="산후관리사님의 성실성(근무시간)에 만족하십니까?">Q5</th>
        <th scope="col" title="산후관리사님의 영양관리(식사,간식)에 대해 만족하십니까?">Q6</th>
        <th scope="col" title="산후관리사님의 산후회복(마사지.111케어)관리에 대해 만족하십니까?">Q7</th>
        <th scope="col" title="산후관리사님의 신생아 관리(케어)에 대해 만족하십니까?">Q8</th>
        <th scope="col" title="산후관리사님의 위생관리(손씻기, 청소,세탁 등)에 대해 만족하십니까?">Q9</th>
        <th scope="col" title="담당 관리자의 고객응대 방법에 대해 만족하십니까?">Q10</th>
        <th scope="col" title="담당 관리자는 고객과의 상담시 서비스 내용에 대해 충분한 설명을 하였습니까?">Q11</th>
        <th scope="col" title="현재 이용하고 있는 제공기관(닥터맘)을 어떻게 알고 선택 하셨습니까?">Q12</th> -->
        <!--<th scope="col" title="닥터맘 서비스 이용시 좋았던 점 또는 개선할 부분이 있다면 적어주시기 바랍니다.">Q13</th>-->
    </tr>
    </thead>
   

    <tbody>
    <?php
    $qs = array();
    for($i=5;$i < 13;$i++){
        $qs[$i] = array(0,0,0,0,0,0);
    }
    $i = 0;
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $link = '';
        $link2 = '';
        $referer = '';
        $title = '';
        if ($row['vi_referer']) {

            $referer = get_text(cut_str($row['vi_referer'], 255, ''));
            $referer = urldecode($referer);

            if (!is_utf8($referer)) {
                $referer = iconv_utf8($referer);
            }

            $title = str_replace(array('<', '>', '&'), array("&lt;", "&gt;", "&amp;"), $referer);
            $link = '<a href="'.$row['vi_referer'].'" target="_blank">';
            $link = str_replace('&', "&amp;", $link);
            $link2 = '</a>';
        }

        if ($is_admin == 'super')
            $ip = $row['vi_ip'];
        else
            $ip = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", G5_IP_DISPLAY, $row['vi_ip']);

        if ($brow == '기타') { $brow = '<span title="'.get_text($row['vi_agent']).'">'.$brow.'</span>'; }
        if ($os == '기타') { $os = '<span title="'.get_text($row['vi_agent']).'">'.$os.'</span>'; }

        $bg = 'bg'.($i%2);

        for($j=5;13 > $j;$j++){
            if($j == 11){
                if($row["qs_".$j] == 3) $qs[$j][5]++;
                $qs[$j][4] = 0;
                if($row["qs_".$j] == 2) $qs[$j][3]++;
                $qs[$j][2] = 0;
                if($row["qs_".$j] == 1) $qs[$j][1]++;
            }else if($j == 12){
                if($row["qs_".$j] == 2) $qs[$j][5]++;
                $qs[$j][4] = 0;
                $qs[$j][3] = 0;
                $qs[$j][2] = 0;
                if($row["qs_".$j] == 1) $qs[$j][1]++;
            }else{
                if($row["qs_".$j] == 5) $qs[$j][5]++;
                if($row["qs_".$j] == 4) $qs[$j][4]++;
                if($row["qs_".$j] == 3) $qs[$j][3]++;
                if($row["qs_".$j] == 2) $qs[$j][2]++;
                if($row["qs_".$j] == 1) $qs[$j][1]++;
            }
        }
    //print_r($row);
    ?>
    <tr class="<?php echo $bg; ?>">
    <td class="td_category"><a href="#" class='detail_view' value="<?php echo $row["app_key"] ?>"><?php echo $row["app_key"] ?></a></td>
        <td class="td_category"><a href="#" class='detail_view' value="<?php echo $row["app_key"] ?>"><?php echo $row["customer_name"] ?></a></td>


            <? 
            $ck = 0;
            foreach ($qdata as $key => $value) {
                
                if( $value["mb_no"] ==  $row["service_area"] ) { 
                  $ck = 1;       
            ?>
                    <td class='td_category'><a href="#" class='detail_view' value="<?php echo $row["app_key"] ?>"><?php echo $value["mb_nick"] ?></a></td>         
             <?}  
              } 
              if($ck != 1 ){  ?>
                    <td class='td_category'><a href="#" class='detail_view' value="<?php echo $row["app_key"] ?>"></a></td>
              <?
              $ck = 0;
              }
              ?>

        
        <td class="td_category"><a href="#" class='detail_view' value="<?php echo $row["app_key"] ?>"><?php echo $row["service_type"] ?></a></td>
        <td class="td_category"><a href="#" class='detail_view' value="<?php echo $row["app_key"] ?>"><?php echo $row["service_grade"] ?></a></td>
        <td class="td_category"><a href="#" class='detail_view' value="<?php echo $row["app_key"] ?>"><?php echo $row["qs_13_txt"] ?></a></td>
        <td class="td_category"><button class='detail_view btn_b02 cjy_view_170330' value="<?php echo $row["app_key"] ?>">자세히 보기</button></td>
    </tr>

    <?php
    }
    ?>
  
    <?php
    if ($i == 0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없거나 관리자에 의해 삭제되었습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>

    <a href="./excel.question_list.php?fr_date=<?php echo $fr_date ?>&to_date=<?php echo $to_date ?>" class="btn_b02">엑셀다운</a>

<?php
include_once('./pagenation.php');
$pagelist = get_paging3(10,$currentPage, $totalPage, "http://doctormam.com/adm/question_list.php?", "&date_ck=".$date_ck."&fr_date=".$fr_date."&to_date=".$to_date."&token=".$token);
echo $pagelist;
?>
<script src="./js/chart.js" charset="utf-8"></script>
<script src="./js/c3.min.js" charset="utf-8"></script>
<script>
$(function(){
    $("#fr_date, #to_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" });

    $('.one_month_btn').click(function(){
        $('.one_month').click();
    })
    $('.two_month_btn').click(function(){
        $('.two_month').click();
    })    
    $('.all_month_btn').click(function(){
         $('.all_month').click();
    })   

    if( $('#date_ck').attr('value') == "1month"){
        $('.one_month_btn').css('background','#d23474');
        $('.one_month_btn').css('color','white');
        $('.one_month_btn').css('border','#d23474');
    }else if( $('#date_ck').attr('value') == "2month"){
        $('.two_month_btn').css('background','#d23474');
        $('.two_month_btn').css('color','white');
        $('.two_month_btn').css('border','#d23474');
    }else if( $('#date_ck').attr('value') == "allmonth"){
        $('.all_month_btn').css('background','#d23474');
        $('.all_month_btn').css('color','white');
        $('.all_month_btn').css('border','#d23474');
    }
   
/*    $('.one_month_btn').hover(function(){
        $('.one_month_btn').css('background','#d23474');
        $('.one_month_btn').css('color','white');
        $('.one_month_btn').css('border','#d23474');
    })
    $('.two_month_btn').hover(function(){
        $('.two_month_btn').css('background','#d23474');
        $('.two_month_btn').css('color','white');
        $('.two_month_btn').css('border','#d23474');
    })    
    $('.all_month_btn').hover(function(){
        $('.all_month_btn').css('background','#d23474');
        $('.all_month_btn').css('color','white');
        $('.all_month_btn').css('border','#d23474');
    })   */


});








function fvisit_submit(act)
{
    var f = document.fvisit;
    f.action = act;
    f.submit();
}




      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
      var data = google.visualization.arrayToDataTable([
        ['처음', '매우불만족', '불만족', '보통', '만족','매우만족',
          { role: 'style' } ],
        ['Q5 성실성',parseInt($('.total_value_5_1').attr("value")), parseInt($('.total_value_5_2').attr("value")), parseInt($('.total_value_5_3').attr("value")), parseInt($('.total_value_5_4').attr("value")), parseInt($('.total_value_5_5').attr("value")), ''],
        ['Q6 영양관리', parseInt($('.total_value_6_1').attr("value")), parseInt($('.total_value_6_2').attr("value")), parseInt($('.total_value_6_3').attr("value")), parseInt($('.total_value_6_4').attr("value")), parseInt($('.total_value_6_5').attr("value")), ''],
        ['Q7 산후회복 관리',  parseInt($('.total_value_7_1').attr("value")), parseInt($('.total_value_7_2').attr("value")), parseInt($('.total_value_7_3').attr("value")), parseInt($('.total_value_7_4').attr("value")), parseInt($('.total_value_7_5').attr("value")), ''],
        ['Q8 신생아 관리',  parseInt($('.total_value_8_1').attr("value")), parseInt($('.total_value_8_2').attr("value")), parseInt($('.total_value_8_3').attr("value")), parseInt($('.total_value_8_4').attr("value")), parseInt($('.total_value_8_5').attr("value")), ''],
        ['Q9 위생관리 관리', parseInt($('.total_value_9_1').attr("value")), parseInt($('.total_value_9_2').attr("value")), parseInt($('.total_value_9_3').attr("value")), parseInt($('.total_value_9_4').attr("value")), parseInt($('.total_value_9_5').attr("value")), ''],
        ['Q10 관리자 고객응대',  parseInt($('.total_value_10_1').attr("value")), parseInt($('.total_value_10_2').attr("value")), parseInt($('.total_value_10_3').attr("value")), parseInt($('.total_value_10_4').attr("value")), parseInt($('.total_value_10_5').attr("value")), '']])






      var options = {
        width: 1310,
        height: 500,
        legend: { position: 'top', maxLines: 2 },
        colors: ['#c64332', '#cc6b48', '#c3bca3', '#487584', '#334d5c'],
        bar: { groupWidth: '75%' },
        isStacked: true,
      };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('barChart'));
        chart.draw(data, options);
      }












</script>
<?php
if (isset($domain))
    $qstr .= "&amp;domain=$domain";
$qstr .= "&amp;page=";

$pagelist = get_paging($config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr");




include_once('./admin.tail.php');
?>
