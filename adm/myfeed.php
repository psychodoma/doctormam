<?php
header("Content-Type:application/json");
include_once('./_common.php');
include_once('../lib/colorcode.php');
/*echo $_REQUEST["start_date"];
echo $_REQUEST["end_date"];*/
/*$search_start = date("Y-m-"."01");
$search_end = date("Y-m-"."01",strtotime($search_start."+1month"));*/
$search_start = $_REQUEST["start_date"];
$search_end = $_REQUEST["end_date"];
$member_level = $_REQUEST["member_level"];
$member_no = $_REQUEST["member_no"];
$member_name = $_REQUEST["member_name"];
if($_REQUEST["s_type"]=="month"){
if($member_level > 7){
$sql = "select wr_id, service_start,date_add(service_start,interval +service_period week) as service_end, wr_name, manager, service_type, manager_start,manager_end, manager_start2,manager_end2,manager2, manager_confirm, manager_confirm2, end_service
          from g5_write_reservation where (manager_start != '' or manager_start is not null) and (service_start <= '{$search_end}' and date_add(service_start,interval +service_period week) >= '{$search_start}') ";
}else{
$sql = "select wr_id, service_start,date_add(service_start,interval +service_period week) as service_end, wr_name, manager, service_type, manager_start,manager_end, manager_start2,manager_end2,manager2, manager_confirm, manager_confirm2, end_service
          from g5_write_reservation where (manager_start != '' or manager_start is not null) and (service_start <= '{$search_end}' and date_add(service_start,interval +service_period week) >= '{$search_start}') and (branch='{$member_no}' or branch='{$member_name}' or res_branch='{$member_no}')";
}
$result = sql_query($sql);
$customer = array();
$k = 0;

    while ($row = sql_fetch_array($result)){
        /*$service_type = $row["service_type"];
        $row["id"] = $row["wr_id"];
        $row["start"] = $row["service_start"];
        $row["end"] = date("Y-m-d",strtotime($row["service_end"]."+1 days"));
        $row["title"] = urlencode($row["wr_name"].' 산모');
        $row["service_type"] = get_grade(urlencode($row["service_type"]));
        $row["resourceId"] = $row["manager"];
        $row["color"] = get_service_color($service_type);

        array_push($customer, $row);*/
            $service_type = $row["service_type"];
            $row["id"] = $row["wr_id"];
            $row["start"] = $row["manager_start"];
            $row["end"] = date("Y-m-d",strtotime($row["manager_end"]."+1 days"));
            $row["title"] = urlencode($row["wr_name"].' 산모');
            $row["service_type"] = get_grade(urlencode($row["service_type"]));
            $row["resourceId"] = $row["manager"];
            $row["end_service"] = $row["end_service"];
        $row["sql"] = $sql;
        if($row["manager_confirm"] == "1"){
            $row["color"] = get_service_color($service_type);
        }else{
            $row["color"] = get_service_color("no");
        }

            array_push($customer, $row);
        if($row["manager2"]){
            $row["id"] = $row["wr_id"];
            $row["start"] = $row["manager_start2"];
            $row["end"] = date("Y-m-d",strtotime($row["manager_end2"]."+1 days"));
            $row["title"] = urlencode($row["wr_name"].' 산모');
            $row["service_type"] = get_grade(urlencode($row["service_type"]));
            $row["resourceId"] = $row["manager2"];
            $row["end_service"] = $row["end_service"];
            if($row["manager_confirm2"] == "1"){
            $row["color"] = get_service_color($service_type);
            }else{
            $row["color"] = get_service_color("no");
            }
            array_push($customer, $row);
        }
        //$arr = array('id'=>$row["wr_id"], 'resourceId'=>$row["manager"], 'start'=>$row["service_start"]);
    }
$customer_json = json_encode($customer);
echo urldecode($customer_json);
}else if($_REQUEST["s_type"] == "manager"){
    $mb_id = $_REQUEST["mb_id"];
    $meb = get_member($mb_id,"mb_no");
    $mb_no =  $meb[mb_no];
$sql = "select wr_id, service_start,date_add(service_start,interval +service_period week) as service_end, wr_name, manager, service_type, manager_start,manager_end, manager_start2,manager_end2,manager2, manager_confirm, manager_confirm2, end_service
          from g5_write_reservation where (manager ='{$mb_no}' or manager2 ='{$mb_no}' ) and (service_start <= '{$search_end}' and date_add(service_start,interval +service_period week) >= '{$search_start}')";
$result = sql_query($sql);
$customer = array();
$k = 0;

    while ($row = sql_fetch_array($result)){
        if($row["manager"] == $mb_no){
        $service_type = $row["service_type"];
        $row["id"] = $row["wr_id"];
        $row["start"] = $row["manager_start"];
        $row["end"] = date("Y-m-d",strtotime($row["manager_end"]."+1 days"));
        $row["title"] = urlencode($row["wr_name"].' 산모');
        $row["service_type"] = get_grade(urlencode($row["service_type"]));
        $row["resourceId"] = $row["manager"];
        if($row["manager_confirm"] == "1"){
            $row["color"] = get_service_color($service_type);
        }else{
            $row["color"] = get_service_color("no");
        }
        array_push($customer, $row);
        }else if($row["manager2"] == $mb_no){
           $service_type = $row["service_type"];
            $row["id"] = $row["wr_id"];
            $row["start"] = $row["manager_start2"];
            $row["end"] = date("Y-m-d",strtotime($row["manager_end2"]."+1 days"));
            $row["title"] = urlencode($row["wr_name"].' 산모');
            $row["service_type"] = get_grade(urlencode($row["service_type"]));
            $row["resourceId"] = $row["manager2"];
            if($row["manager_confirm2"] == "1"){
                $row["color"] = get_service_color($service_type);
            }else{
                $row["color"] = get_service_color("no");
            }
            array_push($customer, $row);
        }
        //$arr = array('id'=>$row["wr_id"], 'resourceId'=>$row["manager"], 'start'=>$row["service_start"]);
    }
$customer_json = json_encode($customer);
echo urldecode($customer_json);

}
?>