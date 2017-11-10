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
$mb_id = $_REQUEST["branch"];
$si = $_REQUEST["si"];
$fee = sql_fetch("select * from branch_fee_config where branch = TRIM('$mb_id')");

if(empty($fee)){
    $fee = sql_fetch("select * from branch_fee_config where branch = TRIM('drmamhead')");
}

include_once(G5_PATH.'/head.php');
if($_REQUEST["mom_milk"] =="yes"){
?>
    <script>
        $(document).ready(function(){
            $('#mom_milk').trigger('click');
        })
    </script>
<?php } ?>



    <div class="subcont_top"><!--100%-->
<?php include_once(G5_PATH.'/SNB.php'); ?>
            <div class="sub_cont1">
                <h3 class="subpage_name">서비스 요금 보기</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont" style="min-height:400px;">
				<style>
					.tab_sub4_title li + li{margin-left:10px;}
					li a.tab_link{width:320px;padding:20px;margin:0; font-size:18px;}
					
				</style>
				<h3 class="sub3_5_tc_title mb30">서비스 및 지역별 요금보기</h3>
				<ul class="tab_sub4_title" style="padding-bottom:30px;padding-top:0;">
					<li><a class="tab_link active" href="#tab1">산후도우미</a></li>
					<li><a class="tab_link" href="#tab2" ids="1" id="mom_milk" >모유수유전문가 서비스</a></li>
				</ul>

					<div class="sub4_select">

							<fieldset>
								<legend>1차 선택</legend>
								<ul class="sub4_li mr30">
									<li class="sub4_li_title">지역 선택</li>
									<li>
										<label for="search" class="hide">분류 선택(라벨)</label>
										<select title="1차 분류 선택" name="seach_si" id="seach_si" class="sub4_sr" onchange="SearchLocation('si')">
											<option value="" >---- 지역을 선택해 주세요 ----</option>
											<option value="서울" <?php if($si == "서울") echo "selected"?>>서울지역</option>
											<option value="경인" <?php if($si == "경인") echo "selected"?>>경인지역</option>
											<option value="경기" <?php if($si == "경기") echo "selected"?>>경기지역</option>
											<option value="충청/전북" <?php if($si == "충청/전북") echo "selected"?>>충청/전북지역</option>
											<option value="경상남북" <?php if($si == "경상남북") echo "selected"?>>경상남북지역</option>
										</select>
									</li>
								</ul>
								<legend>2차 선택</legend>
								<ul class="sub4_li">
									<li class="sub4_li_title">지점 선택</li>
									<li>
										<label for="search" class="hide">분류 선택(라벨)</label>
										<select title="2차 분류 선택" name="seach_gu" id="seach_gu" class="sub4_sr" onchange="SearchLocation('gu')">
                                            <?php if(!empty($si)){
                                                    $add_sql = get_location($si);
                                                    $sql = "select mb_id, mb_branch from g5_member where (mb_level = '7' or mb_level = '9') and ({$add_sql})";
                                                    $result = sql_query($sql);
                                                    echo "<option value=\"\">---- 선택 해주세요 ----</option>";
                                                    while($row = sql_fetch_array($result)){
                                                ?>
                                                        <option value="<?php echo $row["mb_id"]; ?>" <?php if($mb_id == $row["mb_id"]) echo "selected";?> ><?php echo $row["mb_branch"] ?></option>
                                             <?php } ?>
                                            <?php }else{ ?>
											<option value="">---- 지역 선택을 먼저 해주세요 ----</option>
                                            <?php } ?>
										</select>
									</li>
								</ul>
							</fieldset>
					</div>

<!--비노출-->

                    <div class="sub4_0_tab">
                        

                        <div class="tabDetails" style="border:none; margin:0">
                            <div id="tab1" class="tabContents1">

                                <div class="tabcont">
                                    <h3 class="sub4_0_tab_title">닥터맘 베이직 요금제</h3>
                                    <p class="detail_view_btn"><a href="<?php echo G5_URL ?>/service_basic.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">기본교육 60시간을 이수하고 산후관리근무 경력이 800시간 미만인 산후관리사가 산모님 가정을 파견하여<br/>
                                        산후관리프로그램을 바탕으로 편안한 서비스를 제공해 드립니다.</p>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">베이직 출퇴근</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="12%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">주</th>
                                                <th scope="col">5일제</th>
                                                <th scope="col">6일제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
            <?php
                $basic_work_5d = explode("|",$fee["basic_work_5d"]);
                $basic_work_6d = explode("|",$fee["basic_work_6d"]);
                for($i=0;$i < count($basic_work_5d);$i++) {
                    ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $i+1 ?>주</td>
                                                <td><?php echo $basic_work_5d[$i] ?>원</td>
                                                <td><?php echo $basic_work_6d[$i] ?>원</td>
                                            </tr>
                                <?php
                }
            ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo nl2br($fee["basic_work_info"]); ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--tabcont end 덩어리의 끝나는 div//-->


                                <div class="tabcont">
                                    <h3 class="sub4_0_tab_title">닥터맘 베스트 요금제</h3>
                                    <p class="detail_view_btn"><a href="<?php echo G5_URL ?>/service_best.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">베이직 산후관리사로 산후관리근무 경력이 800시간 이상이며, 교체건이 년 3회 이하인 산후관리사가 산모님의<br/>
                                        가정에 파견하여 산후관리프로그램을 바탕으로 편안하고 안전하게 서비스를 제공해 드립니다.</p>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">베스트 출퇴근</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="12%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">주</th>
                                                <th scope="col">5일제</th>
                                                <th scope="col">6일제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
            <?php
                $best_work_5d = explode("|",$fee["best_work_5d"]);
                $best_work_6d = explode("|",$fee["best_work_6d"]);
                for($i=0;$i < count($best_work_5d);$i++) {
                    ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $i+1 ?>주</td>
                                                <td><?php echo $best_work_5d[$i] ?>원</td>
                                                <td><?php echo $best_work_6d[$i] ?>원</td>
                                            </tr>
                    <?php
                }
            ?>

                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo nl2br($fee["best_work_info"]); ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">베스트 입주</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="12%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">주</th>
                                                <th scope="col">5일제</th>
                                                <th scope="col">6일제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
            <?php
            $best_home_5d = explode("|",$fee["best_home_5d"]);
            $best_home_6d = explode("|",$fee["best_home_6d"]);
            for($i=0;$i < count($best_home_5d);$i++) {
                ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $i+1 ?>주</td>
                                                <td><?php echo $best_home_5d[$i] ?>원</td>
                                                <td><?php echo $best_home_6d[$i] ?>원</td>
                                            </tr>
                <?php
            }
            ?>

                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo nl2br($fee["best_home_info"]); ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--tabcont end 덩어리의 끝나는 div//-->

                                <div class="tabcont">
                                    <h3 class="sub4_0_tab_title">닥터맘 프리미엄 요금제</h3>
                                    <p class="detail_view_btn"><a href="<?php echo G5_URL ?>/service_premium.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">베스트 산후관리사로 산후관리근무 경력이 1600시간 이상이며, 교체건이 년 2회 이하이신 분들로<br/>
                                        본사 프리미엄 교육 20시간을 이수한 산후관리사가 산모님 가정에 파견됩니다.</p>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">프리미엄 출퇴근</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="12%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">주</th>
                                                <th scope="col">5일제</th>
                                                <th scope="col">6일제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
            <?php
            $pre_work_5d = explode("|",$fee["pre_work_5d"]);
            $pre_work_6d = explode("|",$fee["pre_work_6d"]);
            for($i=0;$i < count($pre_work_5d);$i++) {
                ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $i+1 ?>주</td>
                                                <td><?php echo $pre_work_5d[$i] ?></td>
                                                <td><?php echo $pre_work_6d[$i] ?></td>
                                            </tr>
                <?php
            }
            ?>

                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo nl2br($fee["pre_work_info"]) ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">프리미엄 입주</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="12%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">주</th>
                                                <th scope="col">5일제</th>
                                                <th scope="col">6일제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    <?php
                    $pre_home_5d = explode("|",$fee["pre_home_5d"]);
                    $pre_home_6d = explode("|",$fee["pre_home_6d"]);
                    for($i=0;$i < count($pre_home_5d);$i++) {
                        ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $i+1 ?>주</td>
                                                <td><?php echo $pre_home_5d[$i] ?>원</td>
                                                <td><?php echo $pre_home_6d[$i] ?>원</td>
                                            </tr>
                        <?php
                    }
                    ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo nl2br($fee["pre_home_info"]) ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--tabcont end 덩어리의 끝나는 div//-->

                                <div class="tabcont">
                                    <h3 class="sub4_0_tab_title">닥터맘 명품플러스 요금제</h3>
                                    <p class="detail_view_btn"><a href="<?php echo G5_URL ?>/service_signiture.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">프리미엄 산후관리사로 산후관리근무 경력이 1600시간 이상이며, 교체건이 없는 분들로<br/>
                                        본사 명품플러스 교육 40시간을 이수한 산후관리사가 산모님 가정에 파견됩니다.<br/>
                                        숙련된 관리사님을 엄격한 기준으로 선발하여 닥터맘의 최고의 서비스를 받을 수 있다고 자부합니다.</p>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">명품플러스 출퇴근</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="12%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">주</th>
                                                <th scope="col">5일제</th>
                                                <th scope="col">6일제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
            <?php
            $sign_work_5d = explode("|",$fee["sign_work_5d"]);
            $sign_work_6d = explode("|",$fee["sign_work_6d"]);
            for($i=0;$i < count($sign_work_5d);$i++) {
                ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $i+1 ?>주</td>
                                                <td><?php echo $sign_work_5d[$i] ?>원</td>
                                                <td><?php echo $sign_work_6d[$i] ?>원</td>
                                            </tr>
                <?php
            }
            ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo nl2br($fee["sign_work_info"]) ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">명품플러스 입주</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="12%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">주</th>
                                                <th scope="col">5일제</th>
                                                <th scope="col">6일제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    <?php
                    $sign_home_5d = explode("|",$fee["sign_home_5d"]);
                    $sign_home_6d = explode("|",$fee["sign_home_6d"]);
                    for($i=0;$i < count($sign_home_5d);$i++) {
                        ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $i+1 ?>주</td>
                                                <td><?php echo $sign_home_5d[$i] ?>원</td>
                                                <td><?php echo $sign_home_6d[$i] ?>원</td>
                                            </tr>
                        <?php
                    }
                    ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo $fee["sign_home_info"] ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--tabcont end 덩어리의 끝나는 div//-->

                            </div><!--탭1 끝-->



                            <!---------------------------// 두번째 탭 //--------------------------->

                            <div id="tab2" class="tabContents1">
                                <div class="tabcont">
									<div class="sub4_baby_title">
										<p class="sub4_baby_img"></p>
										<p class="sub4_baby_txt">모유에 이로운점 보다 모유를 하지 않을때 아기에게 발생되어질 문제들에 대해 생각해 보십시오.<br/>
										우리가 아는 것 그 이상의 문제점을 발견하게 될 것 입니다.<br/>
										모유수유가 힘들 수도 있습니다. 결코 쉽다라고 이야기 하지 않겠습니다.<br/>
										어렵고 힘들때, 모유수유를 포기할까 라는 생각이 들때, 늦지 않았습니다. 문을 두르려 주세요.<br/>
										모유수유를 할 수 있도록 도와드리고 지지합니다.<br/>
										닥터맘은 국제 모유수유 전문가와 함께합니다.</p>
									</div>

                                    <h3 class="sub4_0_tab_title">모유수유 클리닉 방문</h3>

                                    <div class="sub4_0_tc">

                                        <table summary="요금,내용,기타" class="sub4_0_table">
                                            <caption>모유수유 전문가 프리미엄 패키지</caption>
                                            <thead>
                                            <tr>
                                                <th scope="col" style="width:100px;">&nbsp;</th>
												<th scope="col" style="width:100px;">요금</th>
                                                <th scope="col" style="width:350px;">내용</th>
                                                <th scope="col" style="width:200px;">기타</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="t_strong">1회방문</td>
                                                <td><?php echo $fee["milk_work_fee"] ?>원</td>
                                                <td>모유수유 자세 교정<br />
                                                  유방 울혈 관리<br />
                                                  유두혼동 관리</td>
                                                <td><?php echo $fee["milk_work_etc"] ?></td>
                                            </tr>
                                            <tr>
                                              <td colspan="4" style="text-align:left;">
												  <ul class="tab2_ul">
													  <li><?php echo nl2br($fee["milk_work_info"]) ?></li>
												  </ul>
                                              </td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--tabcont end 덩어리의 끝나는 div//-->

                                <div class="tabcont">
                                    <h3 class="sub4_0_tab_title">가정으로 방문</h3>

                                    <div class="sub4_0_tc">

                                        <table summary="요금,내용,기타" class="sub4_0_table">
                                            <caption>가정으로 방문</caption>
                                            <thead>
                                            <tr>
                                                <th scope="col" style="width:100px;">&nbsp;</th>
												<th scope="col" style="width:100px;">요금</th>
                                                <th scope="col" style="width:350px;">내용</th>
                                                <th scope="col" style="width:200px;">방문시간</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    <?php
                    $milk_home_fee = explode("|",$fee["milk_home_fee"]);

                        ?>
                                            <tr>
                                                <td class="t_strong">1회방문</td>
                                                <td><?php echo $milk_home_fee[0]?>원</td>
                                                <td rowspan="3">모유수유 자세 교정<br />
                                                  유방 울혈 관리<br />
                                                  유두혼동 관리</td>
                                                <td rowspan="3"><?php echo $fee["milk_home_etc"] ?></td>
                                            </tr>
                                            <tr>
                                              <td class="t_strong">3회방문</td>
                                              <td><?php echo $milk_home_fee[1]?>원</td>
                                              </tr>
                                            <tr>
                                              <td class="t_strong">5회방문</td>
                                              <td><?php echo $milk_home_fee[2]?>원</td>
                                              </tr>
                                            <tr>
                                              <td colspan="4" style="text-align:left;">
												  <ul class="tab2_ul">
													   <li><?php echo nl2br($fee["milk_home_info"]) ?></li>
												  </ul>
                                              </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--tabcont end 덩어리의 끝나는 div//-->

                            </div><!--탭2 끝-->


                        </div>
                    </div>


                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<script>
    function SearchLocation(str)
    {
        var search_val = $("#seach_si option:selected").val();
        var gu_val = $("#seach_gu option:selected").val();
        if(str == "si"){
                  $.ajax({
                    url: "./ajax.search_location.php",
                    type: "POST",
                    data: {
                        "type": str,
                        "val": search_val
                    },
                    dataType: "json",
                    async: true,
                    cache: false,
                    success: function(data, textStatus) {
                        if(data.result != "no"){
                            $("#seach_gu").html('<option value="">---- 선택 해주세요 ----</option>');
                            for(var i=0;data.length>i;i++){
                                $("#seach_gu").append('<option value="'+data[i].mb_id+'">'+data[i].mb_branch+'</option>');
                            }
                        }
                    }
                })
        }else{
            location.href = g5_url+"/fee_branch.php?branch="+gu_val+"&si="+search_val;
        }
    }
</script>
<?php
include_once(G5_PATH.'/tail.php');
?>