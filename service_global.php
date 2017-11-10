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
                <h3 class="subpage_name">닥터맘 Global Service</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">

                    <div class="sub3_5_tc">
                        <h3 class="sub3_5_tc_title">닥터맘에서 이루어지는 글로벌서비스 입니다.</h3>

                        <table summary="주,내용,프리미엄,명품" class="sub3_5_table">
                            <caption>교육과정</caption>
                            <colgroup>
                                <col width="25%"/>
                                <col width="25%"/>
                                <col width="25%"/>
                                <col width="25%"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">주</th>
                                <th scope="col">내용</th>
                                <th scope="col">프리미엄</th>
                                <th scope="col">명품</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td rowspan="2" class="t_strong">4주</td>
                                <td>초산</td>
                                <td>4,500,000</td>
                                <td>5,400,000</td>
                            </tr>
                            <tr>
                                <td>경산(1명)</td>
                                <td>4,800,000</td>
                                <td>5,700,000</td>
                            </tr>

                            <tr>
                                <td rowspan="2" class="t_strong">1주</td>
                                <td>초산</td>
                                <td>1,125,000</td>
                                <td>1,350,000</td>
                            </tr>
                            <tr>
                                <td>경산(1명)</td>
                                <td>1,200,000</td>
                                <td>1,425,000</td>
                            </tr>

                            <tr>
                                <td class="t_strong">비고</td>
                                <td colspan="3">
                                    <ul class="sub3_5_table_li">
                                        <li>- 기본 신청 단위: 4주</li>
                                        <li>- 요금책정방식: 산모도우미 왕복 항공권(별도) + 이용요금</li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <p class="sub3_5_txt1">*Global Service에 대한 자세한 문의는 02-903-2222로 문의해 주시거나 dr.mam903@gmail.com으로 문의해 주시면<br/>
                            친절한 상담 해드리겠습니다.</p>

                    </div>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>