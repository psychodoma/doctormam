<?
$sub_menu = "200100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$member_type = $_REQUEST["member_type"];
$member_name = LevelToName($member_type);
$html_title = '관리사 스케쥴';
if(empty($_REQUEST["mb_id"])){
    $meb = sql_fetch("select mb_id from g5_member limit 0,1");
    $mb_id = $meb["mb_id"];
}else{
    $mb_id = $_REQUEST["mb_id"];
}
$g5['title'] .= $member_name.' '.$html_title;
include_once('./admin.head.php');
?>
<link rel='stylesheet' href='css/fullcalendar.css' />
<link rel='stylesheet' href='css/fullcalendar.print.css' media='print'  />
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.js'></script>
<script src='js//locale/ko.js'></script>
<div class="tab_manager">
    <a href="./dr_member_form.php?member_type=5&w=u&mb_id=<?php echo $mb_id ?>"><span for="first">관리자정보</span></a>
    <span for="second" class="select_tab">관리자스케쥴</span>
    <form>
        <input type="hidden" name="member_type" value="<?php echo $member_type ?>">
    <?php echo get_manager_name_select("mb_id",$mb_id,"onChange='form.submit();'class='adm_sel1 floatR'"); ?>

    </form>
</div>
<script>
$(document).ready(function() {
    $('#calendar').fullCalendar({
        locale : "ko",
        header: {
				left: 'today prev,next',
				center: 'title',
                right:''
		},
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '/adm/myfeed.php',
                type:'post',
                data: 's_type=manager&mb_id=<?php echo $mb_id ?>&start_date='+$.datepicker.formatDate('yy-mm-dd', start["_d"])+'&end_date='+$.datepicker.formatDate('yy-mm-dd', end["_d"])+"&member_level=<?php echo $member["mb_level"]; ?>&member_no=<?php echo $member["mb_no"]; ?>&member_name=<?php echo $member["mb_nick"]; ?>",
                dataType: 'json',
                success: function(data, text, request) {
                    var events = eval(data);
                    callback(events);
                },
                error: function(){
                    console.log("error");
                }
            });
        },
         eventClick: function(calEvent, jsEvent, view) {
                /*alert('해당 예약 정보로 이동:' + calEvent.title);
                $(this).css('border-color', 'red');*/
                 window.location = "./dr_write.php?bo_table=reservation&w=u&wr_id="+calEvent.wr_id;

            },
        aspectRatio: 1.8
    })
});
</script>
<div id='calendar'></div>
<button class="printBtn button_0314_1"><i class="fa fa-print" aria-hidden="true" style="margin-right:3px;"></i>Print</button>
<script type="text/javascript">
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