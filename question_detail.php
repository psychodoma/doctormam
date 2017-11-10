<?
include_once('./_common.php');



$query = "select *, (select mb_nick from g5_member where mb_no = res.res_branch) as branch_name, (select mb_id from g5_member where mb_no = res.res_branch) as branch_id from g5_write_reservation res where wr_id = ". $_REQUEST["app_id"];
$data = sql_fetch($query);
//echo $query;
$detail_query = "select * from question where app_key = ".$_REQUEST["app_id"];

$detail_data = sql_fetch($detail_query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<style>
.cjy_head_170330{
	display: inline-block; 
	width:100%;
	padding:20px 20px 0px 20px;
	letter-spacing:-1px;
}
.cjy_head_170330 section{float:left;}
.cjy_head_170330 h2{
	padding: 0;
    margin: 0;
    margin-bottom: 20px;
}
.cjy_head_170330 p{
	margin: 0;
    color: #404040;
}

.cjy_head_170330 footer{
	float: right;
    color: #656565;
    position: absolute;
    right: 20px;
    top: 30px;
}




.cjy_table_170330{
	border-collapse: separate;
    border: 1px solid #cecece;
    border-radius: 6px;
	text-align:center;
	    margin-bottom: 60px;
}

.cjy_table_170330 thead tr th{
	border-bottom: none;
    background-color: #d25041;
    color: #e2e2e2;
    text-align: center;
}

.cjy_borderRa_170330_L{border-radius: 5.5px 0 0 0;}
.cjy_borderRa_170330_R{border-radius: 0 5.5px 0 0;}

.cjy_table_170330 tbody tr td{font-weight:bold;}




.cjy_question_170330{
	border: 1px solid #cecece;
    border-radius: 6px;
    margin-bottom: 20px;
}
.cjy_question_170330 header{
	background-color: #eaeaea;
    padding: 15px;
}
.cjy_question_170330 header h3{
	margin: 0;
    font-size: 15px;
    font-weight: bold;
}

.cjy_question_170330 article{padding: 15px;}
.cjy_question_170330 article aside{
	display: inline-block;
    width: 100%;
}
.cjy_question_170330 article aside p{
	text-align:center;
	margin: 0;
	float: left;
}
.cjy_question_170330 article aside p.qs_number_div1{
    width: 110px;
    background-color: #63A69F;
    font-size: 13px;
    font-weight: bold;
    color: #fff;
    padding: 3px 0;
}
.cjy_question_170330 article aside p.qs_number_div2{}

.qs_number11{
	width: 110px;
    background-color: #63A69F;
    font-size: 13px;
    font-weight: bold;
    color: #fff;
    padding: 3px 0;
}


</style>	


<body class="bd_bg" >

<header class="cjy_head_170330">
	<section>	
		<h2>설문조사</h2>
		<p>안녕하세요, 본 설문은 고객님께 더 좋은 제품으로 보답하기 위한 방향을 모색하기 위한 일환입니다.<br/>
		고객님의 귀중한 의견은 추후 닥터맘이 나아갈 정책에 반영됩니다. 더 나은 닥터맘이 되도록 노력하겠습니다.</p>
	</section>
  <footer>등록일 : <?=$detail_data["create_date"]?></footer>
</header>

<div style='padding:20px;'>
	<table class="table cjy_table_170330" style="">   
		<thead>
			<tr>
				<th class="cjy_borderRa_170330_L">이름</th> 
				<th>지점</th> 
				<th>서비스 유형</th> 
				<th class="cjy_borderRa_170330_R">서비스 등급</th> 			
			</tr>
		</thead>

		<tbody>
			<tr>
				<td><?=$detail_data["customer_name"]?> </td>
				<td><?=$data["branch_name"]?> </td>
				<td><?=$detail_data["service_type"]?> </td>
				<td><?=$detail_data["service_grade"]?> </td>
			</tr>       
		</tbody>
	</table>



	<section class="cjy_question_170330">   
		<header>
			<h3>Q5. 산후관리사님의 성실성(근무시간)에 만족하십니까?</h3>
		</header>

		<article>
			<aside class='qs_number'>
				<p class='qs_number_div1'><?=$detail_data["qs_5"]?></p>
				<p class='qs_number_div2' style='width:80%;'><?=$detail_data["qs_5_txt"]?></p>
			</aside>      
		</article>
	</section>
	
	<!-- 백업
	<table class="table table-bordered" >   
		<thead>
			<tr>
				<th>Q6. 산후관리사님의 영양관리(식사,간식)에 대해 만족하십니까?</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td class='qs_number'>
					<div class='qs_number_div1' style='float:left; width:5%;'><?=$detail_data["qs_6"]?></div>
					<div class='qs_number_div2' style='float:left; width:90%;'><?=$detail_data["qs_6_txt"]?></div>
				</td>
			</tr>       
		</tbody>
	</table>
	-->

	<section class="cjy_question_170330">   
		<header>
			<h3>Q6. 산후관리사님의 영양관리(식사,간식)에 대해 만족하십니까?</h3>
		</header>

		<article>
			<aside class='qs_number'>
				<p class='qs_number_div1'><?=$detail_data["qs_6"]?></p>
				<p class='qs_number_div2' style='width:80%;'><?=$detail_data["qs_6_txt"]?></p>
			</aside>
		</article>
	</section>

	<section class="cjy_question_170330">    
		<header>
			<h3>Q7. 산후관리사님의 산후회복(마사지.111케어)관리에 대해 만족하십니까?</h3>
		</header>

		<article>
			<aside class='qs_number'>
				<p class='qs_number_div1'><?=$detail_data["qs_7"]?></p>
				<p class='qs_number_div2' style='float:left; width:80%;'><?=$detail_data["qs_7_txt"]?></p>
			</aside>    
		</article>
	</section>

	<section class="cjy_question_170330">    
		<header>
			<h3>Q8. 산후관리사님의 신생아 관리(케어)에 대해 만족하십니까?</h3>
		</header>

		<article>
			<aside class='qs_number'>
				<p class='qs_number_div1'><?=$detail_data["qs_8"]?></p>
				<p class='qs_number_div2' style='float:left; width:80%;'><?=$detail_data["qs_8_txt"]?></p>
			</aside>    
		</article>
	</section>

	<section class="cjy_question_170330">   
		<header>
			<h3>Q9. 산후관리사님의 위생관리(손씻기, 청소,세탁 등)에 대해 만족하십니까?</h3>
		</header>

		<article>
			<aside class='qs_number'>
				<p class='qs_number_div1'><?=$detail_data["qs_9"]?></p>
				<p class='qs_number_div2' style='float:left; width:80%;'><?=$detail_data["qs_9_txt"]?></p>
			</aside>  
		</article>
	</section>

	<section class="cjy_question_170330">
		<header>
			<h3>Q10. 담당 관리자의 고객응대 방법에 대해 만족하십니까?</h3>
		</header>

		<article>
			<aside class='qs_number'>
				<p class='qs_number_div1'><?=$detail_data["qs_10"]?></p>
				<p class='qs_number_div2' style='float:left; width:80%;'><?=$detail_data["qs_10_txt"]?></p>
			</aside>       
		</article>
	</section>



	<section class="cjy_question_170330">
		<header>
			<h3>11. 담당 관리자는 고객과의 상담시 서비스 내용에 대해 충분한 설명을 하였습니까?</h3>
		</header>

		<article>
			<aside class='qs_number'>
				<p class='qs_number11'><?=$detail_data["qs_11"]?></p>
			</aside>    
		</article>
	</section>



	<section class="cjy_question_170330">
		<header>
			<h3>12. 현재 이용하고 있는 제공기관을 어떻게 알고 선택 하셨습니까?</h3>
		</header>

		<article>
			<aside>
				<p class='qs_number12' value=<?=$detail_data["qs_12_txt"]?>><?=$detail_data["qs_12"]?> </p>
			</aside>       
		</article>
	</section>


	<section class="cjy_question_170330">
		<header>
			<h3>13. 닥터맘 서비스 이용시 좋았던 점 또는 개선할 부분이 있다면 적어주시기 바랍니다.</h3>
		</header>

		<article>
			<aside>
				<p><?=$detail_data["qs_13_txt"]?> </p>
			</aside>       
		</article>
	</section>
</div>



<script >
    $(function(){
        $('.qs_number_div1').each(function(){
             if($(this).text() == 5){
                $(this).text("매우만족");
                $(this).css('background','#2d4654');
            }else if($(this).text()== 4){
                $(this).text("만족");
                $(this).css('background','#487584');
                //$(this).css('color','#282d2d');
            }else if($(this).text() == 3){
                $(this).text("보통");
                $(this).css('background','#c3bca3');
				//$(this).css('color','#282d2d');
            }else if($(this).text()== 2){
               $(this).text("불만족");
               $(this).css('background','#cc6b48');
            }else if($(this).text() == 1){
                 $(this).text("매우불만족");
                 $(this).css('background','#e8361f');
				 $(this).css('color','#fff');
            }
        })

        $('.qs_number11').each(function(){
             if($(this).text() == 3){
                $(this).text("그렇지 않다");
                $(this).css('background','#e8361f');
            }else if($(this).text() == 2){
                $(this).text("보통이다");
                $(this).css('background','#c3bca3');
            }else if($(this).text() == 1){
                $(this).text("그렇다");
                $(this).css('background','#2d4654');
            }
        })

        $('.qs_number12').each(function(){
             if($(this).text() == 4){
                $(this).text("인터넷이나 인쇄물 광고 등을 통해");
            }else if($(this).text() == 3){
                $(this).text("주변 친척이나 지인의 소개로");
            }else if($(this).text() == 2){
                $(this).text("시/군/구 안내를 통해");
            }else if($(this).text() == 1){
               $(this).text("기타 : "+$(this).attr('value'));
            }
        })                
    })    
</script>


</body>
</html>