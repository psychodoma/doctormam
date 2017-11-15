<?
include_once('../common.php');
if($bo_table != "reservation" || empty($wr_id)){
	alert("잘못된 접속입니다.",G5_URL);
}
    ///////////////////////////////////////////////////////
    //
    // 금액 위변조를 막기 위해,
    // 가격 정보 (Amt) 의 경우 JavaScript로 변경할 수 없습니다.
    // 반드시 ServerScript(asp,php,jsp)에서 가격정보를 세팅한 후 Form에 입력하여 주세요.
    //
    ///////////////////////////////////////////////////////

    $amt = str_replace(",","",$write["wr_5"]) ;
    $dutyfree = 0; //면세 금액 (amt 중 면세 금액 설정)
    $store_id = "khjinnurse";

    //올더게이트
    $strAegis = "https://www.allthegate.com";
    $strCsrf = "csrf.real.js";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Author" content=""/>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
<?php

    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
    echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
    echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;

if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>
<title>닥터맘 결제</title>
	<?php
    echo '<link rel="stylesheet" href="'.G5_CSS_URL.'/'.(G5_IS_MOBILE?'mobile':'default').'.css">'.PHP_EOL;

?>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
	<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.menu.js"></script>
<script src="<?php echo G5_JS_URL ?>/common.js"></script>
<script src="<?php echo G5_JS_URL ?>/wrest.js"></script>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/form_jquery.js"></script>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/jquery-ui.js"></script>

<?php
$mobile_str = "";

    echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
    echo '<script src="'.G5_JS_URL.'/jquery.word-break-keep-all.min.js"></script>'.PHP_EOL;
    echo '<script src="'.G5_JS_URL.'/javascript_ex.js"></script>'.PHP_EOL;
    $mobile_str = "mobile_";

?>


<script type="text/javascript" src="<?php echo G5_JS_URL ?>/javascript.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/jquery-ui.css"/>
<? if(!strpos($_SERVER["REQUEST_URI"],"adm/")){ ?>
<!-- bxSlider Javascript file -->
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/jquery.bxslider.js"></script>

<!-- bxSlider CSS file -->
<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/jquery.bxslider.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/<?php echo $mobile_str ?>main.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/<?php echo $mobile_str ?>sub.css"/>
<?php } ?>

<script type="text/javascript" charset="euc-kr" src="<?=$strAegis?>/payment/mobilev2/csrf/<?=$strCsrf?>"></script>
<script type="text/javascript" charset="euc-kr">

    function doPay(form) {

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //
        // 올더게이트 플러그인 설정값을 동적으로 적용하기 JavaScript 코드를 사용하고 있습니다.
        // 상점설정에 맞게 JavaScript 코드를 수정하여 사용하십시오.
        //
        // [1] 일반/무이자 결제여부
        // [2] 일반결제시 할부개월수
        // [3] 무이자결제시 할부개월수 설정
        // [4] 인증여부
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // [1] 일반/무이자 결제여부를 설정합니다.
        //
        // 할부판매의 경우 구매자가 이자수수료를 부담하는 것이 기본입니다. 그러나,
        // 상점과 올더게이트간의 별도 계약을 통해서 할부이자를 상점측에서 부담할 수 있습니다.
        // 이경우 구매자는 무이자 할부거래가 가능합니다.
        //
        // 예제)
        //  (1) 일반결제로 사용할 경우
        //  form.DeviId.value = "9000400001";
        //
        //  (2) 무이자결제로 사용할 경우
        //  form.DeviId.value = "9000400002";
        //
        //  (3) 만약 결제 금액이 100,000원 미만일 경우 일반할부로 100,000원 이상일 경우 무이자할부로 사용할 경우
        //  if(parseInt(form.Amt.value) < 100000)
        //      form.DeviId.value = "9000400001";
        //  else
        //      form.DeviId.value = "9000400002";
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
		form.DeviId.value = "9000400001";

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // [2] 일반 할부기간을 설정합니다.
        //
        // 일반 할부기간은 2 ~ 12개월까지 가능합니다.
        // 0:일시불, 2:2개월, 3:3개월, ... , 12:12개월
        //
        // 예제)
        //  (1) 할부기간을 일시불만 가능하도록 사용할 경우
        //  form.QuotaInf.value = "0";
        //
        //  (2) 할부기간을 일시불 ~ 12개월까지 사용할 경우
        //      form.QuotaInf.value = "0:2:3:4:5:6:7:8:9:10:11:12";
        //
        //  (3) 결제금액이 일정범위안에 있을 경우에만 할부가 가능하게 할 경우
        //  if((parseInt(form.Amt.value) >= 100000) || (parseInt(form.Amt.value) <= 200000))
        //      form.QuotaInf.value = "0:2:3:4:5:6:7:8:9:10:11:12";
        //  else
        //      form.QuotaInf.value = "0";
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //결제금액이 5만원 미만건을 할부결제로 요청할경우 일시불로 결제
        if(parseInt(form.Amt.value) < 50000)
            form.QuotaInf.value = "0";
        else {
            form.QuotaInf.value = "0:2:3:4:5:6:7:8:9:10:11:12";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // [3] 무이자 할부기간을 설정합니다.
        // (일반결제인 경우에는 본 설정은 적용되지 않습니다.)
        //
        // 무이자 할부기간은 2 ~ 12개월까지 가능하며,
        // 올더게이트에서 제한한 할부 개월수까지만 설정해야 합니다.
        //
        // 100:BC
        // 200:국민
        // 300:외환
        // 400:삼성
        // 500:신한
        // 800:현대
        // 900:롯데
        //
        // 예제)
        //  (1) 모든 할부거래를 무이자로 하고 싶을때에는 ALL로 설정
        //  form.NointInf.value = "ALL";
        //
        //  (2) 국민카드 특정개월수만 무이자를 하고 싶을경우 샘플(2:3:4:5:6개월)
        //  form.NointInf.value = "200-2:3:4:5:6";
        //
        //  (3) 외환카드 특정개월수만 무이자를 하고 싶을경우 샘플(2:3:4:5:6개월)
        //  form.NointInf.value = "300-2:3:4:5:6";
        //
        //  (4) 국민,외환카드 특정개월수만 무이자를 하고 싶을경우 샘플(2:3:4:5:6개월)
        //  form.NointInf.value = "200-2:3:4:5:6,300-2:3:4:5:6";
        //
        //  (5) 무이자 할부기간 설정을 하지 않을 경우에는 NONE로 설정
        //  form.NointInf.value = "NONE";
        //
        //  (6) 전카드사 특정개월수만 무이자를 하고 싶은경우(2:3:6개월)
        //  form.NointInf.value = "100-2:3:6,200-2:3:6,300-2:3:6,400-2:3:6,500-2:3:6,600-2:3:6,800-2:3:6,900-2:3:6";
        //
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//	모든 할부거래를 무이자
		if(form.DeviId.value == "9000400002") {
			form.NointInf.value = "ALL";
		}


        AllTheGate.pay(document.form);
        return false;
    }

</script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
	$('.service_cont_l p,.service_cont_r p,.rule_txt').wordBreakKeepAll();
});
</script>

<div style="overflow:hidden;">
<div id="black_bg" onclick="javascript:potfol_close()"></div>
<div id="headerBG_m">
	<h1 class="logo_m"><a href="/"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_logo.jpg" alt="닥터맘 산모도우미"/></a></h1>
</div>


	<form method="post" action="<?=$strAegis?>/payment/mobilev2/intro.jsp" name="form" >
        <div class="subcont_top"><!--100%-->
			<div class="sub_cont1" style="float:none;margin:10px;width:auto;">
                <h3 class="subpage_name" style="text-align:center;">닥터맘 서비스 요금 결제요청 <p > [신용카드결제] </p></h3>
                <div class="s_cont">
                    <!--<h4 class=""><img src="img/sub4/sub4_1_1/sub4_1_1title1.png" alt=""/></h4>-->
                        <fieldset class="">
                            <legend>산후도우미 예약하기</legend>

                            <table class="sub4_1_table" summary="이름 사는지역 연락처를 작성해주세요" >
                                <caption>지원하기</caption>
                                <colgroup>
                                    <col width="120px"/>
                                    <col width="*"/>
                                </colgroup>

                                <tbody>
									<tr>
										<th>이름</th>
										<td><?php echo $write["wr_name"]; ?></td>
									</tr>
									<tr>
										<th class="t_strong">서비스 종류</th>
										<td>닥터맘 <?php echo get_grade($write["service_type"]) ?> </td>
									</tr>
									<tr>
										<th class="t_strong">서비스 시작일</th>
										<td><?php echo date('Y년m월d일',strtotime($write["service_start"])) ?></td>
									</tr>
									<tr>
										<th class="t_strong">서비스 기간</th>
										<td><?php echo get_period($write["service_period"]) ?></td>
									</tr>
									<tr>
										<th class="t_strong">근무일수</th>
										<td><?php echo get_workday($write["work_day"]) ?></td>
									</tr>
									<tr>
										<th class="t_strong">서비스유형</th>
										<td><?php echo get_genre($write["service_genre"]) ?></td>
									</tr>
									<tr>
										<th class="t_strong">결제총액</th>
										<td><strong><?php echo $write["wr_5"] ?>원</strong></td>
									</tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <ul class="sub4_1_1_list_btn" style="margin:0;" >
                            <li style="display:block;margin:0;"><input type="submit" id="btn_submit" name="btn_submit" value="결제요청" onclick="doPay(document.form);" style="width:100%;"/></li>
                        </ul>
                </div>
            </div>

        </div><!--subcontent 1000px-->
    <table style="display:none;">

        <tr>
            <td>주문번호</td>
            <td><input type="text" name="OrdNo" value="<?php echo $write["wr_id"] ?>"/></td>
        </tr>
        <tr>
            <td>상품명</td>
            <td><input type="text" name="ProdNm"  value="<?php echo get_grade($write["service_type"]) ?>"/></td>
        </tr>
        <tr>
            <td>가격</td>
            <td><input type="text" name="Amt" value="<?=$amt?>"/></td>
        </tr>
        <tr>
            <td>면세금액</td>
            <td><input type="text" name="DutyFree" value="<?=$dutyfree?>"/></td>
        </tr>
        <tr>
            <td>구매자이름</td>
            <td><input type="text" name="OrdNm"  value="<?php echo $write["wr_name"] ?>"/></td>
        </tr>
        <tr>
            <td>상점이름</td>
            <td><input type="text" name="StoreNm"  value="닥터맘"/></td>
        </tr>
        <tr>
            <td>휴대폰번호</td>
            <td><input type="text" name="OrdPhone"  value="<?php echo $write["phone"] ?>"/></td>
        </tr>
        <tr>
            <td>이메일</td>
            <td><input type="text" name="UserEmail"  value="test@test.com"/></td>
        </tr>
        <tr>
            <td>결제방법</td>
            <td>
                <select name="Job">
                    <option value="card" selected>신용카드</option>
<!--                    <option value="cardnormal">신용카드만</option>
                    <option value="cardescrow">신용카드(에스크로)</option>
                    <option value="virtual">가상계좌</option>
                    <option value="virtualnormal">가상계좌만</option>
                    <option value="virtualescrow">가상계좌(에스크로)</option>
                    <option value="hp">휴대폰</option>-->
                </select>
            </td>
        </tr>
        <tr>
            <td>상점아이디</td>
            <td><input type="text" name="StoreId" maxlength="20" value="<?=$store_id?>"/></td>
        </tr>
        <tr>
            <td>상점URL</td>
            <td><input type="text"  name="MallUrl" value="http://<?=$_SERVER["HTTP_HOST"]?>"/></td>
        </tr>
        <tr>
            <td>회원아이디</td>
            <td><input type="text"  name="UserId" maxlength="20" value="<?php echo $write["wr_name"] ?>"></td>
        </tr>
        <tr>
            <td>주문자주소</td>
            <td><input type="text"  name="OrdAddr" value="<?php echo $write["addr1"].$write["addr2"].$write["addr3"] ?>"></td>
        </tr>
        <tr>
            <td>수신자명</td>
            <td><input type="text"  name="RcpNm" value="<?php echo $write["wr_name"] ?>"></td>
        </tr>
        <tr>
            <td>수신자연락처</td>
            <td><input type="text"  name="RcpPhone" value="<?php echo $write["phone"] ?>"></td>
        </tr>
        <tr>
            <td>배송지주소</td>
            <td><input type="text"  name="DlvAddr" value="<?php echo $write["addr1"].$write["addr2"].$write["addr3"] ?>"></td>
        </tr>
        <tr>
            <td>기타요구사항</td>
            <td><input type="text"  name="Remark" value=""></td>
        </tr>
        <tr>
            <td>카드사선택</td>
            <td><input type="text"  name="CardSelect"  value=""></td>
        </tr>
        <tr>
            <td>성공 URL</td>
            <td><input type="text"  name="RtnUrl" value="http://<?=$_SERVER["HTTP_HOST"]?>/agspay/AGSMobile_approve.php"></td>
        </tr>

        <tr>
			<td>앱 URL Scheme (독자앱일 경우)</td>
			<td>
				<input type="text"  name="AppRtnScheme" value="">
				<!--  네이버 예시 :  naversearchapp://inappbrowser?url= -->
				<br/>
				AppRtnScheme + RtnUrl을 합친 값으로 다시 앱을 호출합니다.<br/>
				독자앱이 아닌경우 빈값으로 세팅
			</td>
		</tr>


        <tr>
            <td>취소 URL</td>
            <td><input type="text"  name="CancelUrl" value="http://<?=$_SERVER["HTTP_HOST"]?>/agspay/AGSMobile_user_cancel.php"></td>
        </tr>
        <tr>
            <td>추가사용필드1</td>
            <td><input type="text"  name="Column1" maxlength="200" value="상점정보입력1"></td>
        </tr>
        <tr>
            <td>추가사용필드2</td>
            <td><input type="text"  name="Column2" maxlength="200" value="상점정보입력2"></td>
        </tr>
        <tr>
            <td>추가사용필드3</td>
            <td><input type="text"  name="Column3" maxlength="200" value="상점정보입력3"></td>
        </tr>
        <tr>
            <td colspan="2">가상계좌 결제 사용 변수</td>
        </tr>
        <tr>
            <td>통보페이지</td>
            <td><input type="text" name="MallPage" maxlength="100" value="/agspay/AGSMobile_virtual_result.php"></td>
        </tr>
        <tr>
            <td>입금예정일</td>
            <td><input type=text name="VIRTUAL_DEPODT" maxlength=8 value=""></td>
        <tr>
        <tr>
            <td colspan="2">핸드폰 결제 사용 변수</td>
        </tr>
        <tr>
            <td>CP아이디</td>
            <td><input type="text" name="HP_ID" maxlength="10" value=""></td>
        </tr>
        <tr>
            <td>CP비밀번호</td>
            <td><input type="text" name="HP_PWD" maxlength="10" value=""></td>
        </tr>
        <tr>
            <td>SUB-CP아이디</td>
            <td><input type="text" name="HP_SUBID" maxlength="10" value=""></td>
        </tr>
        <tr>
            <td>상품코드</td>
            <td><input type="text" name="ProdCode" maxlength="10" value=""></td>
        </tr>
        <tr>
            <td>상품종류</td>
            <td>
                <select name="HP_UNITType">
                    <option value="1">디지털:1
                    <option value="2">실물:2
                </select>
            </td>
        </tr>
        <tr>
            <td>상품제공기간</td>
            <td><input type="text" name="SubjectData" value="금액;품명;2014.09.21~28"></td>
        </tr>
    </table>

    <input type="hidden" name="DeviId" value="9000400001">
    <input type="hidden" name="QuotaInf" value="0">
    <input type="hidden" name="NointInf" value="NONE">
    <!--<input type="button" value="확인" class="ok_btn" onclick="doPay(document.form);" />-->


</form>
</body>
</html>
