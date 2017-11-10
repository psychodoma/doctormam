<?php
header( "Content-type: application/vnd.ms-excel" );
header( "Content-type: application/vnd.ms-excel; charset=utf-8");  
header( "Content-Disposition: attachment; filename = question_list.xls" );
header( "Content-Description: PHP4 Generated Data" );
echo "<meta content=\"application/vnd.ms-excel; charset=UTF-8\" name=\"Content-type\"> ";
?>
<?php
include_once('./_common.php');

$g5['title'] = '설문조사집계';
include_once(G5_LIB_PATH.'/visit.lib.php');
?>
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
});
</script>
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

if(!(isset($currentPage))){
     $currentPage = 1;
}        

if(!(isset($fr_date))){
     $fr_date = date("Y-m-d", strtotime("-10 year", time()));
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
    $sql = "select * from question where create_date >".'"'.$fr_date.'"'." and create_date <".'"'.$to_date.'"'."  order by create_date desc ";
}else if($member["mb_level"] == 7){
    $sql = "select * from question where service_area =".'"'.$member["mb_no"].'"'." and create_date >".'"'.$fr_date.'"'." and create_date <".'"'.$to_date.'"'."  order by create_date desc ";
}   
//echo $sql;
$result = sql_query($sql);
?>
<style>
    .td_category{width:83px;}
</style>
<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">이름</th>
        <th scope="col">지점</th>
        <th scope="col">서비스 유형</th>
        <th scope="col">서비스 등급</th>
        <th scope="col" title="산후관리사님의 성실성(근무시간)에 만족하십니까?">Q5</th>
        <th scope="col" title="산후관리사님의 영양관리(식사,간식)에 대해 만족하십니까?">Q6</th>
        <th scope="col" title="산후관리사님의 산후회복(마사지.111케어)관리에 대해 만족하십니까?">Q7</th>
        <th scope="col" title="산후관리사님의 신생아 관리(케어)에 대해 만족하십니까?">Q8</th>
        <th scope="col" title="산후관리사님의 위생관리(손씻기, 청소,세탁 등)에 대해 만족하십니까?">Q9</th>
        <th scope="col" title="담당 관리자의 고객응대 방법에 대해 만족하십니까?">Q10</th>
        <th scope="col" title="담당 관리자는 고객과의 상담시 서비스 내용에 대해 충분한 설명을 하였습니까?">Q11</th>
        <th scope="col" title="담당 관리자는 고객님의 서비스 중에 서비스 만족도에 관한 중간점검을 하였습니까?">Q12</th>
        <th scope="col" title="산후관리사님의 성실성(근무시간)에 만족하십니까?">Q13</th>
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

    ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_category"><?php echo $row["customer_name"] ?></td>
            <? 
            $ck = 0;
            foreach ($qdata as $key => $value) {
                
                if( $value["mb_no"] ==  $row["service_area"] ) { 
                  $ck = 1;       
            ?>
                    <td class='td_category'><?php echo $value["mb_nick"] ?></td>         
             <?}  
              } 
              if($ck != 1 ){  ?>
                    <td class='td_category'></td>
              <?
              $ck = 0;
              }
              ?>
        <td class="td_category"><?php echo $row["service_type"] ?></td>
        <td class="td_category"><?php echo $row["service_grade"] ?></td>
        <td class="td_category" title="<?php echo $row["qs_5_txt"] ?>"><?php echo get_answer5($row["qs_5"]); if($row["qs_5_txt"]) echo " - ".$row["qs_5_txt"]  ?></td>
        <td class="td_category" title="<?php echo $row["qs_6_txt"] ?>"><?php echo get_answer5($row["qs_6"]); if($row["qs_6_txt"]) echo " - ".$row["qs_6_txt"] ?></td>
        <td class="td_category" title="<?php echo $row["qs_7_txt"] ?>"><?php echo get_answer5($row["qs_7"]); if($row["qs_7_txt"]) echo " - ".$row["qs_7_txt"] ?></td>
        <td class="td_category" title="<?php echo $row["qs_8_txt"] ?>"><?php echo get_answer5($row["qs_8"]); if($row["qs_8_txt"]) echo " - ".$row["qs_8_txt"] ?></td>
        <td class="td_category" title="<?php echo $row["qs_9_txt"] ?>"><?php echo get_answer5($row["qs_9"]); if($row["qs_9_txt"]) echo " - ".$row["qs_9_txt"] ?></td>
        <td class="td_category" title="<?php echo $row["qs_10_txt"] ?>"><?php echo get_answer5($row["qs_10"]); if($row["qs_10_txt"]) echo " - ".$row["qs_10_txt"] ?></td>
        <td class="td_category" title=""><?php echo get_answers3($row["qs_11"]) ?></td>
        <td class="td_category"><?php echo get_answer12($row["qs_12"], $row["qs_12_txt"] ) ?></td>
        <td class="td_category"><?php echo get_answer2($row["qs_13_txt"]) ?></td>
    </tr>

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
            <td class="td_category"><?php echo $qs[5][$k] ?></td>
            <td class="td_category"><?php echo $qs[6][$k] ?></td>
            <td class="td_category"><?php echo $qs[7][$k] ?></td>
            <td class="td_category"><?php echo $qs[8][$k] ?></td>
            <td class="td_category"><?php echo $qs[9][$k] ?></td>
            <td class="td_category"><?php echo $qs[10][$k] ?></td>
            <td class="td_category"><?php echo $qs[11][$k] ?></td>
            <td class="td_category"><?php echo $qs[12][$k] ?></td>
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
