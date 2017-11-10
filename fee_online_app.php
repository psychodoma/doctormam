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
add_javascript(G5_POSTCODE_JS, 0);    //다음 주소 js

?>


<script>
    $( function() {
        $( "#wr_estimate,#wr_service_start" ).datepicker({
            showOn: "button",
            buttonImage: g5_url+"/img/calendar.gif",
            buttonImageOnly: true,
            buttonText: "Select date",
            dateFormat: 'yy-mm-dd',
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            showMonthAfterYear: true,
            changeYear: true,
            changeMonth: true,
            yearSuffix: '년'
        });
    });
</script>
    <div class="subcont_top"><!--100%-->
<?php include_once(G5_PATH.'/SNB.php'); ?>
            <div class="sub_cont1">
                <h3 class="subpage_name">산후도우미 온라인 예약</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">
                    <!--<h4 class=""><img src="img/sub4/sub4_1_1/sub4_1_1title1.png" alt=""/></h4>-->

                    <form method="post"  id="fwrite" name="fwrite" action="<?php echo G5_BBS_URL?>/write_update.php" onsubmit="return fwrite_submit(this);" class="sub4_1_fc" enctype="multipart/form-data">
                        <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
                        <input type="hidden" name="w" value="<?php echo $w ?>">
                        <input type="hidden" name="bo_table" value="reservation">
                        <input type="hidden" name="wr_id" value="0">
                        <input type="hidden" name="sca" value="<?php echo $sca ?>">
                        <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
                        <input type="hidden" name="stx" value="<?php echo $stx ?>">
                        <input type="hidden" name="spt" value="<?php echo $spt ?>">
                        <input type="hidden" name="sst" value="<?php echo $sst ?>">
                        <input type="hidden" name="sod" value="<?php echo $sod ?>">
                        <input type="hidden" name="page" value="<?php echo $page ?>">
                        <input type="hidden" name="wr_subject" value="예약">
                        <input type="hidden" name="dup_member" id="dup_member" value="Y">
                        <input type="hidden" name="check_confirm" id="check_confirm" value="Y">
                        <fieldset class="">
                            <legend>산후도우미 예약하기</legend>

                            <table class="sub4_1_table" summary="이름 사는지역 연락처를 작성해주세요">
                                <caption>지원하기</caption>
                                <colgroup>
                                    <col width="155px"/>
                                    <col width="*"/>
                                </colgroup>

                                <tbody>
                                <tr>
                                    <th>이름</th>
                                    <td><input type="text" class="sub4_1_input required" title="아이디입력" name="wr_name" id="wr_name" onkeyup="CheckChange();" required minlength="2" maxlength="20" /></td>
                                </tr>
                                <tr>
                                    <th>휴대번호</th>
                                    <td>
                                        <ul class="sub4_1_tell">
                                            <li>
                                                <label for="firstNumber" class="hide">분류 선택(라벨)</label>
                                                <?php echo get_phone_select("wr_hp1",$wr_hp1,'required class="sub4_1_input" onchange="CheckChange();" ') ?> -
                                            </li>
                                            <li><input type="text" class="sub4_1_input" title="두번째 자리" name="wr_hp2" id="wr_hp2" onkeyup="CheckChange();" size="10"required maxlength="4"/><span class="hypn">-</span></li>
                                            <li><input type="text" class="sub4_1_input" title="마지막 자리" name="wr_hp3" id="wr_hp3" onkeyup="CheckChange();" size="10" required maxlength="4"/></li>

                                            <li><input type="button" value="회원검색" onclick="SearchMember()"class="sub4_1add_btn"><span class="desc_dup"></span></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>생년월일</th>
                                    <td><input type="text" class="sub4_1_input" title="아이디입력" name="wr_birth"  id="wr_birth" maxlength="20" placeholder="1980-12-17"/><label for="wr_birth"> ex)1980-12-17</label></td>
                                </tr>

                                <tr>
                                    <th>이메일</th>
                                    <td><input type="text" class="sub4_1_input_b" title="이메일입력" name="wr_email" id="wr_email" maxlength="100" /></td>
                                </tr>
                                <tr>
                                    <th>주소</th>
                                    <td>
                                        <ul class="sub4_1_add">
                                            <li>
                                                <input type="text" class="sub4_1_input_s" title="아이디입력" name="wr_zip" id="wr_zip" readonly="readonly" maxlength="6"/>
                                                <input type="button" value="주소검색" class="sub4_1add_btn" onclick="win_zip('fwrite', 'wr_zip', 'wr_addr1', 'wr_addr2', 'wr_addr3', 'wr_addr_jibeon');"/>
                                            </li>
                                            <li>
                                                <input type="text" class="sub4_1_input_b" title="기본주소" name="wr_addr1" id="wr_addr1" readonly="readonly"/><span class="sub4_1addTxt">기본주소</span>
                                            </li>
                                            <li>
                                                <input type="text" class="sub4_1_input_b" title="나머지주소" name="wr_addr2" id="wr_addr2"/><span class="sub4_1addTxt">나머지주소</span>
                                                 <input type="hidden" name="wr_addr3"  id="wr_addr3" >
                                                <input type="hidden" name="wr_addr_jibeon" ><br>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>서비스지역</th>
                                    <td>
                                        <label for="branch" class="hide">분류 선택(라벨)</label>
                                        <?php echo get_all_branch_select("wr_branch",'', ' required class="sub4_1_select_branch" ') ?>
                                    </td>
                                </tr>
                                <?php if($_REQUEST["type"] == "manager"){?>
                                <input type="hidden" name="wr_type" value="0">




                                <tr>
                                    <th>분만예정일</th>
                                    <td><input type="text" name="wr_estimate" id="wr_estimate" readonly maxlength="20"></td>
                                </tr>
                              
                                <tr>
                                    <th>문자수신</th>
                                    <td>
                                        <input type="checkbox" id='promotion' name="pro_100_d" value="1">&nbsp;100일 축하 메시지&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" id='promotion1' name="pro_1_y" value="1">&nbsp;첫돌 축하 메시지&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="pro_event" value="1">&nbsp;이벤트 메시지&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>



                                <tr>
                                    <th>분만경력</th>
                                    <td>
                                        <ul class="sub4_1_delivery">
                                            <li>
                                            <?php echo radio_selected("wr_history","1",$write['history'],"첫째출산예정"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_history","2",$write['history'],"둘째출산예정"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_history","3",$write['history'],"셋째출산예정"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_history","4",$write['history'],"그이상"); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>


                                <tr>
                                    <th>아기성별</th>
                                    <td>
                                        <ul class="sub4_1_delivery">
                                            <li>
                                            <?php echo radio_selected("wr_baby_sex","남자",$write['wr_baby_sex'],"남자"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_baby_sex","여자",$write['wr_baby_sex'],"여자"); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>


                                <tr>
                                    <th>서비스시작일</th>
                                    <td><!-- <label for="wr_service_start">시작일 : </label><input type="text" id="wr_service_start" name="wr_service_start" readonly maxlength="20">
                                         </br>
                                        </br> -->

                                        <ul class="sub4_1_coop"> <li><label for="wr_service_period">기간 : </label></li>
                                            <li>
                                                <?php echo radio_selected("wr_service_period","1",$write['service_period'],"1주"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_period","2",$write['service_period'],"2주"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_period","3",$write['service_period'],"3주"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_period","4",$write['service_period'],"4주이상"); ?>
                                            </li>
                                        </ul>
                                        </br>
                                        </br>

                                         <ul class="sub4_1_coop">
                                             <li>
                                             <label for="wr_service_work">근무일수 : </label>
                                             </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_work_day","1",$write['work_day'],"5일"); ?>
                                            </li>
                                             <li>
                                                <?php echo radio_selected("wr_service_work_day","2",$write['work_day'],"6일"); ?>
                                             </li>
                                             </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>조리원여부</th>
                                    <td>
                                        <ul class="sub4_1_coop">
                                            <li>
                                            <?php echo radio_selected("wr_after_care","1",$write['after_care'],"1주"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_after_care","2",$write['after_care'],"2주"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_after_care","3",$write['after_care'],"3주"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_after_care","4",$write['after_care'],"4주"); ?>
                                            </li>
                                            <li>
                                            <?php echo radio_selected("wr_after_care","5",$write['after_care'],"안감"); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>서비스유형</th>
                                    <td>
                                        <label for="service1" class="hide">분류 선택(라벨)</label>
                                        <ul class="sub4_1_coop">
                                            <li>
                                                <?php echo radio_selected("wr_service_genre","1",$write['service_genre'],"입주"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_genre","2",$write['service_genre'],"출퇴근"); ?>
                                            </li>
                                    </td>
                                </tr>
                                <tr>
                                    <th>서비스종류</th>
                                    <td>
                                        <label for="service2" class="hide">분류 선택(라벨)</label>
                                        <ul class="sub4_1_coop">
                                            <li>
                                                <?php echo radio_selected("wr_service_type","0",$write['service_type'],"알뜰형"); ?>
                                            </li>

                                            <li>
                                                <?php echo radio_selected("wr_service_type","1",$write['service_type'],"일반형"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_type","2",$write['service_type'],"베스트"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_type","3",$write['service_type'],"프리미엄"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_type","4",$write['service_type'],"명품플러스"); ?>
                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_service_type","5",$write['service_type'],"바우처"); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>CCTV 유무</th>
                                    <td>
                                        <ul class="sub4_1_cctv">
                                            <li>
                                                <?php echo radio_selected("wr_cctv","1",$write['cctv'],"유"); ?>

                                            </li>
                                            <li>
                                                <?php echo radio_selected("wr_cctv","2",$write['cctv'],"무"); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>어머님직업</th>
                                    <td><input type="text" class="sub4_1_input" title="어머니직업" name="wr_mother_job" id="wr_mother_job" maxlength="100"/></td>
                                </tr>
                                <tr>
                                    <th>기타가족</th>
                                    <td>
                                        <ul class="sub4_1_cctv">
                                            <li>
                                                <input type="checkbox" id="wr_mate_1"value="1" name="wr_mate[]" title="큰아이"/>
                                                <label for="wr_mate_1">큰아이</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="wr_mate_2"value="2" name="wr_mate[]" title="부모님"/>
                                                <label for="wr_mate_2">부모님</label>
                                            </li>
                                            <li>
                                                <input type="text" class="sub4_1_input" title="아이디입력" name="wr_mate_etc" id="wr_mate_3"/>
                                                <label for="wr_mate_3">그외</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
<!--                                <tr>
                                    <th>첨부파일</th>
                                    <td><input type="file" class="realFile" name="file[]" id="" onchange=""/></td>
                                </tr>-->
                                <?php }else{ ?>
                                <input type="hidden" name="wr_type" value="1">
                                    <tr>
                                        <th>서비스종류</th>
                                        <td>
                                            <label for="service2" class="hide">분류 선택(라벨)</label>
                                            <select title="검색 분류 선택" name="service2" id="service1" class="sub4_1_select_service1" style="width:200px;">
                                                <option value="">서비스종류를 선택하세요</option>
                                                <option value="">모유수유 전문가서비스</option>
                                                <option value="">패키지-프리미엄</option>
                                                <option value="">패키지-편명유두및함몰유</option>
                                                <option value="">패키지-유두혼동교정</option>
                                                <option value="">패키지-유방울혈및유두상처</option>
                                                <option value="">패키지-목욕및아기마사지</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>방문희망날짜</th>
                                        <td><input type="text" id="wr_service_start" name="wr_service_start"></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </fieldset>

                        <fieldset class="fild_1">
                            <legend>개인정보 수집 및 이용안내</legend>
                            <label for="" class="fild_1_title">개인정보 수집 및 이용안내</label>
							<textarea name="개인정보 수집 이용안내" id="" cols="" rows="16" class="fild_1_tex" readonly="readonly">닥터맘 이용약관 제 15조【 개인정보보호 】

1) '닥터맘'은 이용자의 정보수집 시 서비스 제공에 필요한 최소한의 정보를 수집합니다. 다음 사항을 필수사항으로 하며 그 외 사항은 선택사항으로 합니다.

① 성명
② 생년월일
③ 주소
④ 자택전화번호 / 핸드폰 번호

2) 제공된 개인정보는 당해 이용자의 동의 없이 목적 외의 이용이나 제3자에게 제공할수 없으며, 이에 대한 모든 책임은 ‘닥터맘’이 집니다. 단, 다음의 경우에는 예외로 합니다.
① 임대용품 및 사은품 배송시 배송업체에게 배송에 필요한 최소한의 이용자의 정보(성명, 주소, 전화번호)를 알려주는 경우
② 통계작성, 학술연구 또는 시장조사를 위한 것으로서 특정 개인을 식별할 수 없는형태로 제공하는 경우
③ ‘닥터맘’은 개인정보 보호를 위하여 개인정보보호 책임자를 지정 운영합니다.</textarea>

                            <p class="fild_1_agree">
                                <input type="checkbox" name="agree" id="agree" value="" class="">
                                <label for="agreeprivate" id="agreeprivate">상담신청 및 문의(예약)을 위한 개인정보를 수집하는데 동의합니다.</label>
                            </p>
                        </fieldset>

                        <fieldset class="fild_1">
                            <legend>기타문의</legend>

                            <label for="" class="fild_1_title">기타문의</label>
                            <textarea name="wr_content" id="wr_content" cols="" rows="16" class="fild_1_tex"></textarea>
                        </fieldset>



                        <ul class="sub4_1_1_list_btn">
                            <li><input type="submit" id="btn_submit" name="btn_submit" value="신청"/></li>
                        </ul>
                    </form>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<script>


$(function(){
    $('#promotion').click(function(){
        if($('#wr_estimate').val() == "" || $('#wr_estimate').val() == "0000-00-00"){
            alert('분만예정일을 입력해야합니다.')
            return false;
        }

    })
     $('#promotion1').click(function(){
        if($('#wr_estimate').val() == "" || $('#wr_estimate').val() == "0000-00-00"){
            alert('분만예정일을 입력해야합니다.')
            return false;
        }
    })   

})




function CheckChange(){
            $("#check_confirm").val("");
        }
function SearchMember(){
    var wr_name = $("#wr_name").val();

    var phone_num = $("#wr_hp1 option:selected").val() +"-"+ $("#wr_hp2").val() +"-"+ $("#wr_hp3").val();
    $("#check_confirm").val("Y");
      $.ajax({
        url: "./ajax.checkmember.php",
        type: "POST",
        data: {
            "wr_name": wr_name,
            "phone_num": phone_num
        },
        dataType: "json",
        async: true,
        cache: false,
        success: function(data, textStatus) {
            if(data.result != "no"){
                $(".desc_dup").html("");
                $("#wr_zip").val(data[0].mb_zip1+data[0].mb_zip2);
                $("#wr_addr1").val(data[0].mb_addr1);
                $("#wr_addr2").val(data[0].mb_addr2);
                $("#wr_branch").val(data[0].mb_branch).prop("selected","true");
                $("#wr_birth").val(data[0].mb_birth);
                $("#wr_email").val(data[0].mb_email);
                $("#dup_member").val("Y");
                $(".desc_dup").html("<class class='color_blue'>이전 정보를 불러왔습니다.</class>");
            }else{
                $(".desc_dup").html("<class class='color_blue'>기존 회원이없습니다.</class>");
                $("#dup_member").val("N");
            }
        }
    });
}
        function fwrite_submit(f)
    {

        if($("#check_confirm").val() == ""){
            alert("회원검색을 해주세요");
            return false;
        }
        /*<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>
*/


        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: true,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }
        if($("#wr_branch option:selected").val()=="" || $("#wr_branch option:selected").val()==undefined){
            alert("서비스 지역을 선택해주시기 바랍니다.")
            return false;
        }
        if( $('input:checkbox[id="agree"]').is(":checked") == false){
            alert("개인정보 수집에 동의해 주시기 바랍니다.")
            return false;
        }
        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
</script>
<?php
include_once(G5_PATH.'/tail.php');
?>