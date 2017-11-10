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
                <h3 class="subpage_name">지사소개</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">

                    <ul class="sub6_1_list">
                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people1.jpg" alt="강남송파점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">강남 송파점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>금정구/남구/기장군/해운대구/동래구/연제구/부산진구</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>051-818-8222</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people2.jpg" alt="강서 양천점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">강서 양천점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>강서구/양천구</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>02-357-3927</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people3.jpg" alt="강북동대문점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">강북 동대문점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>노원구/강북구/성북구/도봉구/동대문구/중랑구/광진구 </td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>02-984-3272</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people4.jpg" alt="관악,영등포점 "/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">관악,영등포점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td> 관악구/동작구/구로구/금천구/영등포구 </td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>02-868-5457</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people5.jpg" alt="마포 은평점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">마포 은평점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>은평구/종로구/서대문구/마포구</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>02-384-3721</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people0.jpg" alt="용산 성동점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">용산 성동점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>중구/성동구/용산구</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td> 02-796-3575</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people6.jpg" alt="인천점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">인천점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td> 계양구/서구/동구/중구/남구/연수구/남동구/부평구</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td> 032-299-0901</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people7.jpg" alt=" 부천 광명점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2"> 부천 광명점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td> 오정구/원미구/소사구/광명시/부천시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td> 032-511-3383</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people8.jpg" alt="용인 수지점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">용인 수지점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td> 서인구/기흥구/수지구</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>031-8005-8872</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people9.jpg" alt="수원점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">수원점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>장안구/수지구/팔달구/권선구</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>031-221-3532</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people10.jpg" alt="평택안성점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">평택안성점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>평택시/안성시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>031-653-1996</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people11.jpg" alt="안양안산점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">안양안산점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>안양시/안산시/군포시/과천시/의왕시/시흥시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>031-383-3006</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people12.jpg" alt="성남분당점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">성남분당점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>성남시/광주시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>031-752-5228</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people13.jpg" alt="구리남양주점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">구리남양주점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>구리시/남양주시/의정부시/양주시/포천시/ 가평/양평</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>031-555-5358</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people0.jpg" alt="김포고양점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">김포고양점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>일산서구/일산동구/덕양구/김포시/파주시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>031-998-5945</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people0.jpg" alt="대전,세종점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">대전,세종점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>대전광역시전지역/ 세종시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>042-825-2607</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people0.jpg" alt="천안 아산점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">천안 아산점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>천안시/당진시/아산시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>041-567-3579</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people14.jpg" alt="대구경산점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">강서 양천점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>대구광역시 전지역/ 경산시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>053-792-3533</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people5.jpg" alt="구미 칠곡점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">구미 칠곡점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>구미시/칠곡군/김천시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>054-443-7222</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people16.jpg" alt="북부산점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">북부산점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>금정구/남구/기장군/해운대구/동래구/연제구/부산진구/수</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>051-818-8222</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people17.jpg" alt="화성동탄점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">화성동탄점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>화성시/오산시</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td> 031-297-1401</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people18.jpg" alt="전북점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">전북점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>전라북도 전지역</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>063-221-1577</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people19.jpg" alt="포항 경주점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">포항 경주점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>포항/경주</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>054-249-7771</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="sub6_1bg fl_right">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people20.jpg" alt="울산점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">울산점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>울산</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>052-223-7723</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="sub6_1bg">

                                <div class="sub6_1cont">
                                    <p class="sub6_1pt"><img src="img/sub6/sub6_1/people21.jpg" alt="강동점"/></p>

                                    <table summary="지사,담당지역,연락처" class="sub6_1_table">
                                        <caption>지사소개</caption>
                                        <colgroup>
                                            <col width="35%"/>
                                            <col width="*"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="t_strong2">지사</td>
                                            <td class="t_strong2">강동점</td>
                                        </tr>
                                        <tr>
                                            <td class="">담당지역</td>
                                            <td>강동</td>
                                        </tr>
                                        <tr>
                                            <td>연락처</td>
                                            <td>02-486-3873</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </li>


                    </ul>

                </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>