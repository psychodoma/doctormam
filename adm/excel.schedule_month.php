<?php
header( "Content-type: application/vnd.ms-excel" );
header( "Content-type: application/vnd.ms-excel; charset=utf-8");  
header( "Content-Disposition: attachment; filename = schedule_table.xls" );
header( "Content-Description: PHP4 Generated Data" );
echo "<meta content=\"application/vnd.ms-excel; charset=UTF-8\" name=\"Content-type\"> ";
?>
<?php
include_once('./_common.php');
include_once('../lib/colorcode.php');
?>
<html>
<head>
</head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<style>
    .day_sun{background-color:#f9d8e6}
    .day_sat{background-color:#aaaaff;}
    .manager_name{text-align:center;}
    .schedule_table th{border-bottom: 1px solid #000;}
    .schedule_table td,th{border-right: 1px solid #000;}
    .schedule_table td{margin:1px;}
    .schedule_table{border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000}
</style>



<body>
<?
$date_str = $_REQUEST["date_str"];
/*$year = date('Y');
$month = date('m');*/
//$year = substr($date_str,0,4);
//$month = substr($date_str,8,2);
//echo $year.$month;
$year = explode("년" , $date_str)[0];
$d = explode("년" , $date_str)[1];
$d = explode("월" , $d)[0];
$month = explode(" " , $d)[1];

$time = strtotime($year.'-'.$month.'-01');
list($tday, $sweek) = explode('-', date('t-w', $time));  // 총 일수, 시작요일
$tweek = ceil(($tday + $sweek) / 7);  // 총 주차
$lweek = date('w', strtotime($year.'-'.$month.'-'.$tday));  // 마지막요일

$yoil = array("일","월","화","수","목","금","토");
if($member["mb_level"] > 7){
$sql = "select (select mb_nick from g5_member b where a.manager = b.mb_no) mb_nick,(select mb_branch from g5_member b where a.manager = b.mb_no) mb_branch,wr_id, service_start,date_add(service_start,interval +service_period week) as service_end, wr_name, manager, service_type, manager_start, manager_end
          from g5_write_reservation a where (manager != '' or manager is not null) and (service_start <= '". date("Y-m-d",strtotime($year.'-'.$month.'-01' . '+1 month')) ."' and date_add(service_start,interval +service_period week) >= '".date("Y-m-d",$time)."') order by mb_branch,mb_nick asc";

}else{
        $sql = "select (select mb_nick from g5_member b where a.manager = b.mb_no) mb_nick,(select mb_branch from g5_member b where a.manager = b.mb_no) mb_branch,wr_id, service_start,date_add(service_start,interval +service_period week) as service_end, wr_name, manager, service_type
          from g5_write_reservation a where (manager != '' or manager is not null) and (service_start <= '". date("Y-m-d",strtotime($year.'-'.$month.'-01' . '+1 month')) ."' and date_add(service_start,interval +service_period week) >= '".date("Y-m-d",$time)."') and (res_branch='{$member["mb_no"]}' or res_branch='{$member["mb_nick"]}') order by mb_branch,mb_nick asc";
}
$result = sql_query($sql);

?>
<h1 style="text-align:center"><?php echo $year ?>년 <?php echo $month ?>월 스케쥴</h1>
<table width='100%' cellpadding='1' cellspacing='1' class="schedule_table">

    <tr>
        <th>지사명</th>
        <th>관리사명</th>
        <th></th>
<? for ($n=1,$i=0; $i<$tweek; $i++): ?>
    <? for ($k=0; $k<7; $k++): ?>
            <?php
              $day_name = $yoil[date('w', strtotime($year.'-'.$month.'-'.$n))]
            ?>
     <? if (($i == 0 && $k < $sweek) || ($i == $tweek-1 && $k > $lweek)) {echo "\n";continue;}?><th style='text-align:center; width:50px;<?php if($day_name =="토")echo "color:blue";else if($day_name == "일")echo "color:red; border-right:thin solid #aaa;" ?>' class="<?php if($day_name =="토")echo "day_sat";else if($day_name == "일")echo "day_sun" ?>"><?php echo  $day_name ?><br><?=$n++?></td>
    <? endfor; ?>
<? endfor; ?>
    </tr>
<?php
    $z = 0;
$branch_str = "";
$manager_str = "";
$count = 1;
 while ($row = sql_fetch_array($result)){ ?>




	<? if($row["mb_nick"] && $row["manager_end"] ) {?>
	<?$a = 1?>
    <tr>
        <td class="manager_name" style='text-align:center;'><?php
            if($branch_str != get_branch($row["mb_branch"] )){
                echo get_branch($row["mb_branch"] );
                $branch_str =get_branch($row["mb_branch"] );
            }
            ?></td>
        <td class="manager_name" style='text-align:center;'><?php
            if($manager_str != $row["mb_nick"] ){
                echo $row["mb_nick"];
                $manager_str =$row["mb_nick"];
                $z++;
            }
            ?></td>
        <td class="manager_name" style='text-align:center;'></td>
        <? for ($n=1,$i=0; $i<$tweek; $i++): ?>
            <? for ($k=0; $k<7; $k++): ?>
            <?php
              $day_name = $yoil[date('w', strtotime($year.'-'.$month.'-'.$n))]
            ?>

             <? if (($i == 0 && $k < $sweek) || ($i == $tweek-1 && $k > $lweek)) {echo "\n";continue;}?>
                <?php
                    $service_end = new DateTime($row["manager_end"]);
                    $service_start = new DateTime($row["manager_start"]);
                    $date_day = new DateTime($year.'-'.$month.'-'.$n);
                ?>
					<?php if($service_end >= $date_day && $service_start <= $date_day){ ?>
                    <td class="<? echo "cnt_".$count."_".$i."_".$k ?>" style="border-bottom:1px dotted #ccc; background-color:<?php echo get_service_color($row["service_type"])?>; <?php if($day_name =="토");else if($day_name == "일")echo " border-right:thin solid #aaa;" ?>">
						<?if($a == 1){ echo $row["wr_name"]; $a++;}?>
                         <?$n++?>
                    </td>
					<?php }else{ ?>
					<td style="border-bottom:1px dotted #ccc; <?php if($day_name =="토");else if($day_name == "일")echo "border-right:thin solid #aaa;" ?>" class="<? echo "cnt_".$count."_".$i."_".$k ?>">
						<?$n++?>
					</td>
					<?  } ?>

            <? endfor; ?>
        <? endfor; ?>
    </tr>
	<? } ?>
<?php
$count++;
} ?>
</table>
</body>
</html>