<?
include_once('./_common.php');

$query = "select *, (select mb_nick from g5_member where mb_no = res.res_branch) as branch_name from g5_write_reservation res where wr_id = ". $_REQUEST["app_id"];
$data = sql_fetch($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Author" content=""/>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
    <title><?php echo $g5_head_title; ?></title>
    <link rel="stylesheet" href="<?php echo G5_ADMIN_URL?>/css/admin.css">;
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body class="bd_bg">
<form name="check_form" id="check_form" action="<?php echo G5_URL ?>/app_save.php" method="post">
    <input type="hidden" id="app_id" name="app_id" value="<?php echo $_REQUEST["app_id"] ?>">
    <div class="app_div" id="print_area">
        <div class="app_title"><img src="/img/main/logo.jpg"> 닥터맘 산모도우미 서비스 이용 계약서</div>
        <div class="sub_title">
            <p>이용자와 닥터맘 산모도우미는 서비스 이용에 대하여 다음과 같이 계약을 체결합니다.</p>
            <h6>제 1조【서비스 제공범위】</h6>

<p>1) 산후관리사는 '닥터맘 홈페이지 또는 이용약관' 서비스 프로그램에 의거하여 출산 후 산욕기 케어와 신생아관
   리, 정해진 가사업무를 제공합니다.</p>
<p>2) 산후관리사의  서비스 범위는 아래와 같습니다.</p>
   <p>&lt;산욕기 관리&gt;</br>
       &nbsp;&nbsp;- 산후회복마사지</br>
        &nbsp;&nbsp;111케어 : 복부, 팔다리, 유방 마사지를 하루에 한번 한 가지씩 케어 해 드립니다.</br>
        &nbsp;&nbsp;(베이직, 베스트 :  111케어 / 프리미엄 : 111케어+전신케어(일주일에 한번)</br>
         &nbsp;&nbsp;명품플러스 : 111케어+전신 케어(일주일에 두번)</br>
      &nbsp;&nbsp;- 영양관리 : 식사준비 및 상차림제공(장보기:30분거리, 음식재료만 가능)/산모 간식제공(1일1회~2회)</br>
      &nbsp;&nbsp;- 회음부 관리 : 좌욕 (자연분만시 출산 후 2주까지 하루 2회)</br>
   </p>

   <p>&lt;신생아 관리&gt;</br>
      &nbsp;&nbsp;- 목욕관리 : 1일1회 목욕하기</br>
      &nbsp;&nbsp;- 영양관리 :모유수유 지지, 젖병수유, 젖병소독</br>
      &nbsp;&nbsp;- 신생아 돌보기/기저귀 갈기</br>
   </p>
            <p>
   &lt;위생관리&gt;</br>
      &nbsp;&nbsp;- 산모 옷세탁(세탁기로)/신생아 옷 세탁(베넷저고리, 속싸개, 가재손수건 : 손빨래, 그 외 세탁기 빨래)</br>
      &nbsp;&nbsp;- 집안 청소 : 청소기로 청소(걸레질 제외, 스팀 또는 마대걸레 가능)(청소구역 : 산모방, 부엌, 거실)</br>
      &nbsp;&nbsp;- 식사 후 설거지</br>
                </p>
            <p>
   &lt;기타 서비스&gt;</br>
      &nbsp;&nbsp;- 남편 와이셔츠 다리기(1일1회)</br>
      &nbsp;&nbsp;- 큰아이 추가시 큰아이 등, 하원, 세탁, 방청소, 간식</br>
                </p>
<p>3) 산후관리사는 의료인이 아니므로 의료행위를 하지 않습니다. 이용자는 닥터맘(산후관리사)에게 요구하여서는 안됩니다.</p>

<h6>제 2조【서비스 예약 및 이용 절차】</h6>
<p>1) 닥터맘 홈페이지 및 모바일로 예약하기 메뉴를 통해 필요한 서비스를 입력합니다.</p>
<p>2) 닥터맘은 이용자에게 전화 상담을 하며 상담 후 계약을 합니다.</p>
<p>3) 닥터맘은 계약서를 이용자에게 발송하며 이용자는 숙지 후 동의하기에 체크를 합니다.</p>
<p>4) 이용자는 닥터맘에 소정의 예약금을 입급합니다.</p>
<p>5) 서비스 종료일에 이용자는 서비스 금액 중 예약금을 뺀 나머지 금액을 서비스를 제공해 주신 산후관리사에게 직접 지불해 줍니다(서비스가 4주를 넘어갈 때는 4주단위로 이용금액을 정산하도록 합니다)</p>
            <h6>제 3조【서비스 이용계약의 성립】</h6>
<p>1) "닥터맘"은  제2조 서비스 예약 및 이용절차 대하여 다음 각 호에 해당하지 않는 한 승낙합니다.</br>
   &nbsp;&nbsp;① 신청 내용에 허위, 고의적 기재누락 이 있는 경우</br>
   &nbsp;&nbsp;② 타인 명의를 무단 도용하여 신청한 경우</br>
   &nbsp;&nbsp;③ 서비스 신청계약 후 3일 이내 예약금이 미 입금된 경우</br>
   &nbsp;&nbsp;④ 상담/제출서류에 허위가 있는 경우 </br>
   &nbsp;&nbsp;⑤ 기타 '닥터맘'에 알릴의무를 성실히 이행하지 아니한 경우</br>
            </p>
<h6>제 4조【서비스 이용요금 및 결제】</h6>
<p>1) 서비스 이용요금은 닥터맘에서 정한 이용요금을 기준으로 하며, 서비스 예약시 이용자와 닥터맘의 협의된 견적
   금액입니다.</p>
<p>2) 이용자는 예약상담 후 3일 이내에 닥터맘이 정해준 일부의 금액(예약금)을 선입금하고 서비스 종료일에
   이용자는 서비스 금액 중 예약금을 뺀 나머지 금액을 서비스를 제공해 주신 산후관리사에게 직접 지불해 줍니다</p>
<p><span style="color:red">3) 이용자는 서비스 금액에 대해 현금영수증을 요청할 경우 현금영수증 발급이 가능하며 예약금에 대해서만 현금영수증이 가능합니다.</span></p>
            <h6>제 5조【서비스 예약 취소 및 예약금 환불】</h6>

            <p>1) 이용자는 출산 전 서비스 예약을 취소할 수 있습니다.</p>
<p>2) 계약서 자필서명 또는 음성녹음, 취소 환불건에 대한 문서 또는 핸드폰 메시지를 받고 지정된 계좌 에 예약금을 입금하고 입금한 시점으로부터 24시간이내 예약을 취소할 경우 예약금은 100% 환불 가능 합니다.</p>
<p>3) 계약서 자필서명 또는 음성녹음, 취소 환불건에 대한 문서 또는 핸드폰 메시지를 받고 예약금을 입금 후 개인사정에 의해 취소할 경우 예약시점부터 임신주수 36주까지 취소시 예약금은 전액 환불됩니다.</p>
<p>4) 예약금 입금 후 분만예정일로 36주 이후에 취소할 경우 서비스 전체 이용금액의 10% 제외한 나머지 금액은 환불 됩니다.</br>
       예) 베스트 2주5일제 예약시 : 총금액 93만원/예약금 21만원 입금했을 경우</br>
                210.000 - 93.000(93만원의 10%)=117.000원 환불)</p>

<h6>제 6조【서비스 변경】</h6>
            <p>1) 이용자는 출산 전에 서비스 시작일, 서비스 이용 기간 및 시간, 그 외 예약사항을 변경 할 경우 출산 예정일로 부터 <span style="color:red">2주 이전</span>에 반드시 ‘닥터맘’에게 해당 사실을 통보해야 합니다.</br>
            이를 소홀히 하여 서비스에 차질이 발생할 경우 ‘닥터맘’은 성실의 의무를 다하나, 책임은 이용자가 집니다.</p>
<h6>제 7조【서비스 중도해지 】</h6>
<p>1) 이용자 및 '닥터맘'은 제11조 2항, 제12조 1항에 의거 서비스를 중도 해지할 수 있습니다.</p>
<p>2) 서비스 중도해지시는 실제 서비스 이용기간 만큼의 요금을 별도 정산하여 지불 합니다.</br>
   &nbsp;&nbsp;단, 예약 서비스 기간의 50% 이내에 서비스 중도 해지 시 산후관리사의 배정 업무에 차질이 발생되어 잔여 서비스 기간의 서비스 금액에 10%의 위약금이 발생되어 집니다.</br>
   &nbsp;&nbsp;예) 베이직 출퇴근 3주5일제 예약 후 서비스 중 출퇴근 2주5일제 만 서비스 받고 중도 해지시</br>
      &nbsp;&nbsp;&nbsp;&nbsp;-> 2주 5일제 요금적용(홈페이지상 베이직 2주5일제요금 830.000)</br>
   &nbsp;&nbsp;예) 베이직 4주 5일제 예약 후 서비스 중 3주+2일 서비스 받고 중도 해지시</br>
    &nbsp;&nbsp;&nbsp;&nbsp;- 계약당시 4주5일제 총금액 1.570.000원</br>
      &nbsp;&nbsp;&nbsp;&nbsp;-> 3주 5일제 금액(1.205.000 ) + 4주 금액의 일할적용(1.570.000÷20일=78.500×2=157.000)</br>
         &nbsp;&nbsp;&nbsp;&nbsp;납부할 금액 1.205.000+157.000=1.362.000원</br>
   &nbsp;&nbsp;예) 베이직 출퇴근 2주 5일제 예약 후 서비스 중 3일만 서비스 받고 중도 해지시</br>
      &nbsp;&nbsp;&nbsp;&nbsp;-> 베이직 2주 5일제 금액 830.000</br>
         &nbsp;&nbsp;&nbsp;&nbsp;3일 근무 금액 ; 83.000 X 3일 = 249.000</br>
         &nbsp;&nbsp;&nbsp;&nbsp;7일에 대한 위약금 : 581.000의 10% 58.100원 위약금 발생</br>
</p>
<h6>제 8조【근무시간 및 의무】</h6>
<p>1) 출퇴근형의 근무시간은 평일 : 오전9부터 오후6시, 토요일 오전9시부터 오후2시까지이며 시간추가는 닥터 맘 홈페이지 이용요금에 따라 추가 적용됩니다.</p>
<p>2) 입주형의 주5일 근무시간은 월요일 09:00 ~ 토요일 09:00, 주6일 근무시간은~월요일 09:00 ~ 토요일16:00 입니다. 단, 입주형의 경우 밤 동안에 아기를 돌보는 일을 하였기에 낮 동안 산후관리사님을 위하여 2시간의 수면 또는 휴식 시간을 적용합니다.</p>
<p>3) 대명절 (추석, 설 연휴)/법정 공휴일/ 토요일/일요일은 휴무이며 서비스 제공날짜는 휴무날짜만큼 뒤로 연장됩니다. 만약 근무할 시 닥터맘 홈페이지 이용요금 따라 추가 요금이 적용됩니다.</p>

<h6>제 9조【 이용자의 권리 및 의무 】</h6>
<p>1) 이용자는 필요 시 전화 또는 방문을 통해 산후조리에 대한 상담을 하실 수 있습니다.</p>
<p>2) 산후관리사는 산후조리를 돕는 자로서 의료행위는 하지 않으며, 요구하거나 응해서도 안 됩니다. 병원에서 특별한 주의를 요하는 산모 또는 신생아의 사고에 대해서는 책임을 지지 않으니, 사전에 '닥터맘'에 통보하여야 합니다.</p>
<p>3) 귀중품 또는 파손되기 쉬운 물품은 이용자께서 사전에 안전하게 보관조치를 취하여 불필요한 오해가 발생치 않도록 합니다.</p>
<p>4) 이용자는 산모와 신생아의 건강상태 및 이상증상에 대해 '닥터맘'과 산후관리사에게 사전에 통보하여야 하며, 이상증상에 따른 주의사항 또는 금기식품을 알려주실 의무가 있습니다. 이를 소홀하여 발생한 사고에 대해서는 이용자가 책임을 집니다.</p>
<p>5) 신생아에게 발병 및 이상증상이 있을 경우, 병원검진 여부 등에 대한 최종 의사결정은 이용자가 하며, 병원검진 시 산후관리사가 동행 및 지원해 드릴 수 있습니다.</p>
<p>6) 이용자는 웹사이트 회원 비밀번호가 노출, 도용되지 않도록 주의 의무를 다하여야 하며, 제3자에 의한 노출을 인지한 경우 즉시 '닥터맘'에 통보하여 안내에 따른 조치를 취해야 합니다.</p>
<p>7) 외설 또는 폭력적인 메시지. 화상. 음성 기타 미풍양속에 반하는 정보를 '닥터맘' 웹사이트에 공개 또는 게시 하는 행위를 하여서는 안됩니다. </p>

<h6>제10조【 닥터맘의 권리 및 의무 】</h6>
<p>1) '닥터맘'은 관계법령과 이 약관이 금지하거나 미풍양속에 반하는 행위를 하지 않으며, 약관이 정하는 바에 따라 지속적이고, 안정적으로 서비스를 제공하는데 최선을 다합니다.</p>
<p>2‘닥터맘'은 이용자가 안전하게 인터넷 서비스를 이용할 수 있도록 이용자의 개인정보보호를 위한 보안 시스템을 갖춥니다.</p>
<h6>제 11조【 손해배상책임 】</h6>
<p>1)‘닥터맘은’ "산후관리사 배상책임" 보험에 가입되어 있습니다.</p>
<p>2) 서비스를 제공하는 중에 발생하는 사고(대인,대물)는 "산후관리사 배상책임 보험" 약관 규정에 준하여 처리됩니다. 다만, 천재지변, 제3자의 귀책사유로 인한 손해에 대해서는 배상책임을 지지 아니합니다.</p>

<h6>제 12조【 면책 】</h6>
<p>1) '닥터맘'은 이용자와의 공식 계약 범위(이용기간, 이용시간, 이용요금, 이용조건) 외에 이용자와 산후관리사간 임의의 거래행위에 대해서는 사고 및 민원 발생 시 일체의 책임을 지지 않습니다.</p>
<p>2) '닥터맘'과 산후관리사는 산모의 건강회복과 신생아의 건강증진을 위해 주의 성실의 책무를 다해 서비스에 임하나, 그럼에도 불구하고 산모 또는 신생아에게 질병이 발생한 경우, 산후관리사의 고의  또는 중대한 과실에 의한 것이 아닌 한, 그 책임을 '닥터맘'이나 산후관리사에게 지울 수 없습니다.</p>
<p>3) '닥터맘'은 웹사이트상에서 하이퍼링크 방식으로 연결되어 있는 제휴업체 또는 타 업체가 독자적으로 제공하는 재화. 용역에 의하여 이용자와 행하는 거래에 대해 보증책임을 지지 않습니다. </p>

<h6>제 13조【 계약의 효력 및 해석 】</h6>

<p>1) 본 계약은 이용자가 동의함에 체크한 날로부터 효력이 발생하며, 본 계약서에 명시되지 아니한 사항에 대해서는 닥터맘 이용약관에 따르며 계약사항의 해석에 차이가 발생할 때에는 이용자와 닥터맘이 상호 원만하게 합의하여 결정하도록 합니다.</p>

<div class="app_agree">
    <input type="checkbox" class="app_check" id="app_agree"><label class="app_check" for="app_agree">이용계약서에 동의합니다.</label>
    <div class="check_info"><span>20</span><input type="text" maxlength="1" name="date_1" id="date_1"><input type="text" maxlength="1" name="date_2" id="date_2">년 <input type="text" maxlength="2" name="date_3" id="date_3"> 월 <input type="text" maxlength="2" name="date_4" id="date_4">일</div>
<div class="check_info">이용자 <input type="text" class="app_name" id="name_1" name="name_1"></div>
</div>
        </div>


    <div class="btn_confirm01 btn_confirm">
        <a href="javascript:check_form();">완료</a>
        <!--<a href="javascript:pageprint()">인쇄</a>-->
    </div>
</form>
    <script>
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
            if($('input:checkbox[id="app_agree"]').is(":checked") == false){
                alert("체크 박스에 체크를 해주세요");
                return false;
            }
            if($("#date_1").val() == "" || $("#date_2").val() == "" || $("#date_3").val() == "" || $("#date_4").val() == "") {
                alert("날짜를 입력해주세요");
                return false;
            }
            if($.isNumeric($("#date_1").val()) == false || $.isNumeric($("#date_2").val()) == false || $.isNumeric($("#date_3").val()) == false || $.isNumeric($("#date_4").val()) == false) {
                alert("날짜는 숫자만 입력해주세요");
                return false;
            }
            if($("#name_1").val() == ""){
                alert("이용자란에 성함을 입력해주세요.");
                return false;
            }

            $("#check_form").submit();
        }
    </script>
</body>
</html>