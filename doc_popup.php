<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="Author" content=""/>
<meta name="Keywords" content=""/>
<meta name="Description" content=""/>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/quick.js"></script>

<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="css/sub.css"/>



<title>닥더맘 출산축하선물</title>
</head>
<body>

	<div class="">
		<section class="cooperator_cont">
			<!--
			<h3><img src="img/main/cooperator_title.png" alt="닥터맘 협력업체"></h3>

			<ul>
				<li class="borderBottom"><a href="http://www.socialservice.or.kr/" target="_blank"><img src="img/main/fa1.jpg" alt="사회서비스 전자바우처"></a></li>
				<li class="borderBottom"><a href="http://www.mohw.go.kr/front_new/index.jsp" target="_blank"><img src="img/main/fa2.jpg" alt="보건복지부"></a></li>
				<li class="borderNone borderBottom"><a href="http://www.ssis.or.kr/index.do" target="_blank"><img src="img/main/fa3.jpg" alt="사회보장정보원"></a></li>

				<li class="borderBottom"><a href="http://jungbu.seoulwomen.or.kr/" target="_blank"><img src="img/main/fa4.jpg" alt="중부여성발전센터"></a></li>
				<li class="borderBottom"><a href="http://www.ask.re.kr/" target="_blank"><img src="img/main/fa5.jpg" alt="고령사회고령진흥원"></a></li>
				<li class="borderNone borderBottom"><a href="http://drbebe.morucompany.gethompy.com/" target="_blank"><img src="img/main/fa6.jpg" alt="닥터베베"></a></li>

				<li class=""><a href="http://www.jigw.co.kr/" target="_blank"><img src="img/main/fa7.jpg" alt="종이거울 스튜디오"></a></li>
				<li class=""><a href="http://ehealth.gangbuk.go.kr/" target="_blank"><img src="img/main/fa8.jpg" alt="강북보건소"></a></li>
				<li class="borderNone"><a href="http://morucompany.com" target="_blank"><img src="img/main/fa9.jpg" alt="모루컴퍼니"></a></li>
			</ul>
			-->
			<p>

				<img src="http://doctormam.com/img/popup/event1.jpg" alt="" usemap="#Map" border="0"/>
				<map name="Map" id="Map">
					<area shape="rect" coords="174,1908,370,1967" href="http://bebenarin.com/" target="_blank" />
				</map>

     <div id="hd_pops_3" class="hd_pops">
        <div class="hd_pops_con">
            <?php echo conv_content($nw['nw_content'], 1); ?>
        </div>
        <div class="hd_pops_footer">
            <button class="hd_pops_reject hd_pops_3 24"><strong>24</strong>시간 동안 다시 열람하지 않습니다.</button>
            <button class="hd_pops_close hd_pops_3">닫기</button>
        </div>
    </div>

			</p>



		</section>






	</div>
</body>
</html>



<script>
$(function() {
    $(".hd_pops_reject").click(function() {
        var id = $(this).attr('class').split(' ');
        var ck_name = id[1];
        var exp_time = parseInt(id[2]);
        $("#"+id[1]).css("display", "none");
        set_cookie(ck_name, 1, exp_time, g5_cookie_domain);
    });
    $('.hd_pops_close').click(function() {
        var idb = $(this).attr('class').split(' ');
        $('#'+idb[1]).css('display','none');
    });
    $("#hd").css("z-index", 1000);
});
</script>