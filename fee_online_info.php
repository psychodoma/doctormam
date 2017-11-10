<?php
include_once('./_common.php');


if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

    <div class="subcont_top"><!--100%-->
<?php include_once(G5_PATH.'/SNB.php'); ?>
            <div class="sub_cont1">
                <h3 class="subpage_name">온라인 예약</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">
					<h4 class=""><img src="img/sub4/sub4_1/sub4_1_title2.jpg" alt="온라인예약"/></h4>
                    <p class="sub4_1txt1" style="font-size: 20px; font-weight: bold;">예약하실 서비스를 선택하세요. ↓↓↓</p>

                    <ul class="sub4_1cont" style="height:240px;">
                        <li><a href="<?php echo G5_URL ?>/fee_online_app.php?type=manager"><img src="img/sub4/sub4_1/sub4_1_img2_1.png" alt="산후도우미"/></a></li>
                        <li><a href="<?php echo G5_URL ?>/fee_online_app.php?type=mommilk"><img src="img/sub4/sub4_1/sub4_1_img2_2.png" alt="모유수유전문가"/></a></li>
                        <!--<li style="margin-right:0;"><a href="<?php /*echo G5_URL */?>/fee_online_app.php?type=massage"><img src="img/sub4/sub4_1/sub4_1_img2_3.png" alt="산모마사지"/></a></li>-->
                    </ul>

                    <h4 class="sub4_1title1"><img src="img/sub4/sub4_1/sub4_1_title1.jpg" alt="온라인예약 진행순서"/></h4>
                    <p class="sub4_1txt1">닥터맘 산모도우미 서비스를 이용해 주셔서 감사합니다. 아래의 순서로 온라인 예약이 진행되오니 참고하시기 바랍니다.</p>
                    <p class="sub4_1img1"><img src="img/sub4/sub4_1/sub4_1_img1.jpg" alt="서비스안내및 이용요금확인 > 예약할 서비스 선택 > 예약정보 입력>지역담당자 해피콜 > 서비스상담 > 서비스 내용 및 이용요금 확정 > 이용약관 확인 > 서비스 금액입금"/></p>

                    <div class="sub4_1bg">
                        <p class="sub4_acc">예금주 : 닥터맘 앤 닥터베베 (고현진)<span class="sub4_acc1">국민은행 : 543001-01-396675</span></p>
                    </div>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>