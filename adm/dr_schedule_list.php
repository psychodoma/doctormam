<?php
$sub_menu = "600100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$member_type = $_REQUEST["member_type"];
$member_name = LevelToName($member_type);
$manager = array();
if($member["mb_level"] > 7){
    $sql = "select *,(select mb_nick from g5_member b where a.mb_branch = b.mb_no ) branch_name from g5_member a where a.mb_level = '5' ORDER BY a.mb_leave_date ASC, a.mb_grade DESC, a.mb_name ASC";
}else{
    $sql = "select * from g5_member where mb_level = '5' and mb_branch= '".$member["mb_no"]."' order by mb_name";
}


$result = sql_query($sql);
$k = 0;
    while ($row = sql_fetch_array($result)){
        $manager[$k] = $row;
        $k++;
    }
$search_start = date("Y-m-"."01");
$search_end = date("Y-m-"."01",strtotime($search_start."+1month"));

$sql = "select wr_id, service_start,service_period,date_add(service_start,interval +service_period week) as service_end, wr_name, manager
          from g5_write_reservation where (manager != '' or manager is not null) and (service_start <= '{$search_end}' and date_add(service_start,interval +service_period week) >= '{$search_start}') ";


if( substr($_SERVER["REMOTE_ADDR"],0,10) == "210.96.212" ){
   echo $sql;
}


$result = sql_query($sql);
$k = 0;
    while ($row = sql_fetch_array($result)){
        $customer[$k] = $row;
        $k++;
    }
/*if(empty($fee)){
}else{
    $w = "u";

    if ($is_admin != 'super' && $member['mb_level'] < 7)
        alert('자신보다 권한이 높은 회원은 수정할 수 없습니다.');
}*/



$g5['title'] .='월별 '."스케쥴";
include_once('./admin.head.php');
include_once('../lib/colorcode.php');

// add_javascript('js 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_javascript(G5_POSTCODE_JS, 0);    //다음 주소 js
?>
<link rel='stylesheet' href='css/fullcalendar.css' />
<link rel='stylesheet' href='css/scheduler.css' />
<link rel='stylesheet' href='css/fullcalendar.print.css' media='print'  />
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.js'></script>
<script src='js//locale/ko.js'></script>
<script src='js/scheduler.js'></script>
<script>
$(document).ready(function() {
	$.daycolor = function(){
		$(".fc-cell-text").each(function(){
			if($(this).text().match("토")){
				$(this).css('color','blue');
			}else if($(this).text().match("일")){
				$(this).css('color','red');
			}
		})
	}

    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
        locale : "ko",
        header: {
				left: 'today prev,next',
				center: 'title',
                right:''
		},
        defaultView: 'timelineMonth',
        aspectRatio: 1.8,
		resourceAreaWidth: '140px',
        resourceLabelText: '관리사',
        <?php if($member["mb_level"] > 7){?>
        resourceGroupField: 'branch',
        resources: [
            <?php for($i=0;$i < count($manager); $i++){?>
				{ id: '<?php echo $manager[$i]["mb_no"] ?>',branch:'<?php if(empty($manager[$i]["mb_leave_date"])){echo $manager[$i]["branch_name"]; }else{echo "퇴사자";}?>', title: '<?php echo $manager[$i]["mb_name"]; ?>(<?php echo $manager[$i]["mb_grade"]; ?>)',eventColor:'<?php echo $color_code[$i] ?>',id_str:'<?php echo $manager[$i]["mb_id"] ?>'},
            <?php } ?>
			],
        <?php }else{?>
        resources: [
            <?php for($i=0;$i < count($manager); $i++){?>
				{ id: '<?php echo $manager[$i]["mb_no"] ?>', title: '<?php echo $manager[$i]["mb_name"]; ?>',eventColor:'<?php echo $color_code[$i] ?>',id_str:'<?php echo $manager[$i]["mb_id"] ?>'},
            <?php } ?>
			],
        <?php } ?>
/*			events: [
                <?php for($i=0;$i < count($customer); $i++){?>
                { id: '<?php echo $customer[$i]["wr_id"] ?>', resourceId: '<?php echo $customer[$i]["manager"] ?>', start: '<?php echo $customer[$i]["service_start"] ?>', end: '<?php echo $customer[$i]["service_end"] ?>', title: '<?php echo $customer[$i]["wr_name"] ?> 산모' },
                <?php } ?>
			],*/

        events: function(start, end, timezone, callback) {
            /*console.log($.datepicker.formatDate('yy-mm-dd', start["_d"]));
            console.log($.datepicker.formatDate('yy-mm-dd', end["_d"]));*/
            $.ajax({
                url: '/adm/myfeed.php',
                type:'post',
                data: 's_type=month&start_date='+$.datepicker.formatDate('yy-mm-dd', start["_d"])+'&end_date='+$.datepicker.formatDate('yy-mm-dd', end["_d"])+"&member_level=<?php echo $member["mb_level"]; ?>&member_no=<?php echo $member["mb_no"]; ?>&member_name=<?php echo $member["mb_nick"]; ?>",
                dataType: 'json',
                success: function(data, text, request) {
                    console.log(data);
                    var events = eval(data);
                    callback(events);
					$.daycolor();
                },
                error: function(){
                    console.log("error");
                }
            });
        },
        eventMouseover: function( event, jsEvent, view ) {
            $(this).attr("title",event["wr_name"]+'('+event["service_type"]+')'+event["manager_start"]+"~"+event["manager_end"]);
            var tip = $(this).attr('title');        
            $(this).attr('title','');
            $(this).append('<div id="tooltip" style=""><div class="tipBody">'
                      + tip + '</div></div>');              
        },
        eventMouseout: function( event, jsEvent, view ) {
            $(this).attr('title',$('.tipBody').html());
            $(this).children('div#tooltip').remove();
        },
        resourceRender: function(resourceObj, labelTds, bodyTds) {
            var text_el = labelTds.find(".fc-cell-text");
            text_el.wrap("<a href='"+g5_url+"/adm/dr_member_form.php?member_type=5&mb_id="+resourceObj["id_str"]+"&w=u'>");
        },
         eventClick: function(calEvent, jsEvent, view) {
//                alert('해당 예약 정보로 이동:' + calEvent.title);
                window.location = "./dr_write.php?bo_table=reservation&w=u&wr_id="+calEvent.wr_id;
//                $(this).css('border-color', 'red');

            },
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives'
    })



	$.daycolor();



});
</script>
<div id='calendar'></div>

<button class="printBtn"><i class="fa fa-print" aria-hidden="true" style="margin-right:3px;"></i>Print</button>
<button id="btnExcel" class="button_0314_1"><i class="fa fa-file-excel-o" aria-hidden="true" style="margin-right:3px;"></i>엑셀다운</button>

<script type="text/javascript">
$("#btnExcel").click(function (e) {
    location.href = g5_admin_url + "/excel.schedule_month.php?date_str="+$(".fc-center h2").html();

});
    var initBody;
        function beforePrint()
        {
            initBody = document.body.innerHTML;
            document.body.innerHTML = wrapper.innerHTML;
        }

        function afterPrint()
        {
            document.body.innerHTML = initBody;
        }


  $('.printBtn').on('click', function (){
    window.onbeforeprint = beforePrint;
            window.onafterprint = afterPrint;
            window.print();
  });



</script>

<?php
include_once('./admin.tail.php');
?>
