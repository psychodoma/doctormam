<?
include_once('./_common.php');


function MakeCheckbox($count,$number){
    $str = "";
    $label_str = array();
    if($count == "5")
        $label_str = array("매우불만족", "불만족","보통","만족","매우만족");
    else if($count == "3")
        $label_str = array("그렇다","보통이다","그렇지 않다");
    else if($count == "2")
        $label_str = array("그렇다","그렇지 않다");
    for($i=$count-1;$i>=0;$i--){
        $str .= '<li>';
        $str .= '<input type="radio" class="check_box" name="qs_'.$number.'" require value="'.($i+1).'" id="'.$number.'_'.$i.'"><label for="'.$number.'_'.$i.'">'.$label_str[$i].'</label>';
        $str .= '</li>';
    }
    return $str;
}
$query_question = "select mb_no, mb_nick from g5_member where mb_level = 7 ";
$qdata = sql_query($query_question);

$query = "select *, (select mb_nick from g5_member where mb_no = res.res_branch) as branch_name, (select mb_id from g5_member where mb_no = res.res_branch) as branch_id from g5_write_reservation res where wr_id = ". $_REQUEST["app_id"];
$data = sql_fetch($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=1.0,user-scalable=yes">
    <meta name="Author" content=""/>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
    <title><?php echo $g5_head_title; ?></title>
    <link rel="stylesheet" href="<?php echo G5_ADMIN_URL?>/css/admin.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body class="bd_bg">

<style>
	ul{margin-bottom:20px !important; display:block;}
	body{margin:0;padding:20px;}
	.question_div .card_title{padding:20px;vertical-align:middle;margin-bottom:0;}
	.question_div .card_title h4{font-size:0.8em}
	.question_div{width:auto;padding:10px;}
	.question_div p{margin:0;padding-top:10px;width:100%;}
	.question_div p.s2{background:#ccc;border:0;border-radius:10px;margin-top:50px;padding:5px 10px;width:auto;}
	.question_div .sub_title{width:100%;text-align:center;}
	.question_div .sub_title p{padding:30px 15px;width:auto;}
	.question_div .input_text{width:95%}
	.question_div ul li{margin-left:5px;}
	.question_div ul li label{margin-left:5px;}

	.btn_confirm01 a{padding:0;width:100%;height:48px;line-height:42px;font-size:1.3em;margin:0;}

            .input_text, .sub_question { display: none; }
            .qa_13 { display: block; }
</style>

<form name="check_form" id="check_form" action="<?php echo G5_URL ?>/question_save.php" method="post"enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" id="app_id" name="app_id" value="<?php echo $_REQUEST["app_id"] ?>">
    <input type="hidden" id="service_area" name="service_area" value="<?php echo $data["branch"] ?>">
    <input type="hidden" id="customer_name" name="customer_name" value="<?php echo $data["wr_name"] ?>">
    <input type="hidden" id="service_type" name="service_type" value="<?php echo get_genre($data["service_genre"]) ?>&nbsp;<?php echo get_workday($data["work_day"]) ?>">
    <input type="hidden" id="service_grade" name="service_grade" value="<?php echo get_grade($data["service_type"]) ?>">
    
	<div class="question_div" id="print_area">
        <div class="card_title"><img src="./img/main/logo.jpg" > <h4>서비스 만족도 조사</h4></div>
        <div class="sub_title">
    <p><strong>닥터맘을 이용해 주셔서 진심으로 감사를 드립니다.</br>
본 조사는 닥터맘의 서비스를 평가하여 <br>더 좋은 서비스를 제공하고 더 나아가 </br>향후 산후조리의 발젼에 기여하기 위함입니다.</br>
바쁘시지만 솔직한 답변 부탁드립니다. 감사합니다 ^^ <br>     
- 닥터맘 일동 -</strong></p></div>

        <ul>
            <li>1. 서비스 지역</li>
            <? foreach ($qdata as $key => $value) {
                if( $value["mb_no"] ==  $data["branch"] ) { ?>
                    <li class='branchtonumber'> <?php echo $value["mb_nick"] ?></li>
             <?   }
            } ?>
            
        </ul>
        <ul>
            <li>2. 고객명</li>
            <li><?php echo $data["wr_name"] ?></li>
        </ul>
        <ul>
            <li>3. 서비스 유형</li>
            <li><?php echo get_genre($data["service_genre"]) ?><?php echo " ".get_workday($data["work_day"]) ?></li>
        </ul>
        <ul>
            <li>4. 서비스 등급</li>
            <li><?php echo get_grade($data["service_type"]) ?></li>
        </ul>
<p class="s2">
  ＊5~9번 문항은 산후관리사님의 서비스 제공 능력에 관한 질문입니다.
</p>
        <ul class='qa_5'>
            <li>5. 산후관리사님의 성실성(근무시간)에 만족하십니까?</li>
            <?php echo MakeCheckbox(5,5) ?>
            <li class="sub_question">＊불만족 하신다면 이유는?</li>
            <li><input type="text" class="input_text" name="qs_5_txt"></li>
        </ul>
        <ul class='qa_6'>
            <li>6. 산후관리사님의 영양관리(식사,간식)에 대해 만족하십니까?</li>
            <?php echo MakeCheckbox(5,6) ?>
            <li class="sub_question">＊불만족 하신다면 이유는?</li>
            <li><input type="text" class="input_text" name="qs_6_txt"></li>
        </ul>
        <ul class='qa_7'>
            <li>7. 산후관리사님의 산후회복(마사지.111케어)관리에 대해 만족하십니까?</li>
            <?php echo MakeCheckbox(5,7) ?>
            <li class="sub_question">＊불만족 하신다면 이유는?</li>
            <li><input type="text" class="input_text" name="qs_7_txt"></li>
        </ul>
        <ul class='qa_8'>
            <li>8. 산후관리사님의 신생아 관리(케어)에 대해 만족하십니까?</li>
            <?php echo MakeCheckbox(5,8) ?>
            <li class="sub_question">＊불만족 하신다면 이유는?</li>
            <li><input type="text" class="input_text" name="qs_8_txt"></li>
        </ul>
        <ul class='qa_9'>
            <li>9. 산후관리사님의 위생관리(손씻기, 청소,세탁 등)에 대해 만족하십니까?</li>
            <?php echo MakeCheckbox(5,9) ?>
            <li class="sub_question">＊불만족 하신다면 이유는?</li>
            <li><input type="text" class="input_text" name="qs_9_txt"></li>
        </ul>
<p class="s2">
  ＊10~12번 문항은 담당 관리자(상담자 또는 지점관리자)에 관한 질문입니다.
</p>
        <ul class='qa_10'>
            <li>10. 담당 관리자의 고객응대 방법에 대해 만족하십니까?</li>
            <?php echo MakeCheckbox(5,10) ?>
            <li class="sub_question">＊불만족 하신다면 이유는?</li>
            <li><input type="text" class="input_text" name="qs_10_txt"></li>
        </ul>
        <ul>
            <li>11. 담당 관리자는 고객과의 상담시 서비스 내용에 대해 충분한 설명을 하였습니까? </li>
            <?php echo MakeCheckbox(3,11) ?>
        </ul>
<p class="s2">
  ＊12~13번 기타사항에 관한 질문입니다.
</p>
        <ul class='qa_12'>
            <li>12. 현재 이용하고 있는 제공기관(닥터맘)을 어떻게 알고 선택 하셨습니까? </li>
            <li><input type="radio" class="check_box" name="qs_12" require value="4" id="12_3"><label for="12_3"> 인터넷이나 인쇄물 광고 등을 통해</label></li>
			<li><input type="radio" class="check_box" name="qs_12" require value="3" id="12_2"><label for="12_2"> 주변 친척이나 지인의 소개로</label></li>
			<li><input type="radio" class="check_box" name="qs_12" require value="2" id="12_1"><label for="12_1"> 시/군/구 안내를 통해</label></li>
			<li><input type="radio" class="check_box" name="qs_12" require value="1" id="12_0"><label for="12_0"> 기타</li>
                                       <li class="sub_question">기타 사유를 적어주세요.</li>
                                       <li><input type="text" class="input_text" name="qs_12_txt"></li>
        </ul>
        <ul>
            <li>13. 닥터맘 서비스 이용시 좋았던 점 또는 개선할 부분이 있다면 적어주시기 바랍니다.  </li>
            <li><input type="text" class="input_text qa_13" name="qs_13_txt"></li>
        </ul>
    </div>

	
    <div class="btn_confirm01 btn_confirm">
        <a href="javascript:check_form()">설문조사 완료</a>
        
    </div>

</form>
    <script>
        $(function(){
            $('#5_0, #5_1').click(function(){
                $('.qa_5 .input_text').css("display","block");
                $('.qa_5 .sub_question').css("display","block");
            })
            $('#5_2, #5_3, #5_4').click(function(){
                $('.qa_5 .input_text').css("display","none");
                $('.qa_5 .sub_question').css("display","none");
            })            


            $('#6_0, #6_1').click(function(){
                $('.qa_6 .input_text').css("display","block");
                $('.qa_6 .sub_question').css("display","block");
            })
            $('#6_2, #6_3, #6_4').click(function(){
                $('.qa_6 .input_text').css("display","none");
                $('.qa_6 .sub_question').css("display","none");
            }) 


            $('#7_0, #7_1').click(function(){
                $('.qa_7 .input_text').css("display","block");
                $('.qa_7 .sub_question').css("display","block");
            })
            $('#7_2, #7_3, #7_4').click(function(){
                $('.qa_7 .input_text').css("display","none");
                $('.qa_7 .sub_question').css("display","none");
            })   

            $('#8_0, #8_1').click(function(){
                $('.qa_8 .input_text').css("display","block");
                $('.qa_8 .sub_question').css("display","block");
            })
            $('#8_2, #8_3, #8_4').click(function(){
                $('.qa_8 .input_text').css("display","none");
                $('.qa_8 .sub_question').css("display","none");
            })               

            $('#9_0, #9_1').click(function(){
                $('.qa_9 .input_text').css("display","block");
                $('.qa_9 .sub_question').css("display","block");
            })
            $('#9_2, #9_3, #9_4').click(function(){
                $('.qa_9 .input_text').css("display","none");
                $('.qa_9 .sub_question').css("display","none");
            })   

            $('#10_0, #10_1').click(function(){
                $('.qa_10 .input_text').css("display","block");
                $('.qa_10 .sub_question').css("display","block");
            })
            $('#10_2, #10_3, #10_4').click(function(){
                $('.qa_10 .input_text').css("display","none");
                $('.qa_10 .sub_question').css("display","none");
            })   

            $('#12_0').click(function(){
                $('.qa_12 .input_text').css("display","block");
                $('.qa_12 .sub_question').css("display","block");
            })
            $('#12_2, #12_3, #12_1').click(function(){
                $('.qa_12 .input_text').css("display","none");
                $('.qa_12 .sub_question').css("display","none");
            })   


        });


        var initBody;
        function beforePrint()
        {
            initBody = document.body.innerHTML;
            document.body.innerHTML = print_area.innerHTML;
        }

        function afterPrint()
        {
            document.body.innerHTML = initBody;
        }

        function pageprint()
        {
            window.onbeforeprint = beforePrint;
            window.onafterprint = afterPrint;
            window.print();
        }

        function check_form(){
			
            for(var i=5; 13 > i;i++){
                if($('input:radio[name="qs_'+i+'"]:checked').val() == undefined){
                    alert("객관식 설문"+i+" 번에 답을 해주세요");
                    return false;
                }
            }

            $("#check_form").submit();
        }
    </script>
</body>
</html>