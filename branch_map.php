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
$mb_id = "drmamhead";
if($_REQUEST["branch"]){
	$mb_id = $_REQUEST["branch"];
}
$si = $_REQUEST["si"];
if(!empty($_REQUEST["serach_branch"])){
    //$result_branch = sql_fetch("select * from g5_member where mb_addr1 like '%".$_REQUEST["serach_branch"]."%' limit 0,1"); // 수정전
	$result_branch = sql_fetch("select * from g5_member where mb_branch like '%".$_REQUEST["serach_branch"]."%' && mb_level = 7 limit 0,1"); // 수정후
    if(!empty($result_branch["mb_id"])){
        $mb_id = $result_branch["mb_id"];
    }
}
$fee = sql_fetch("select * from branch_fee_config where branch = TRIM('$mb_id')");
$location = sql_fetch("select * from g5_member where mb_id = TRIM('$mb_id')");
if(empty($fee)){
    $fee = sql_fetch("select * from branch_fee_config where branch = TRIM('drmamhead')");
}
if(empty($location)) {
    $location = sql_fetch("select * from g5_member where mb_id = TRIM('drmamhead')");

}
include_once(G5_PATH.'/head.php');


	function geocode($addr, $cID, $sCode) {


        $ch = curl_init();
        $address = urlencode($addr);
        $encoding="utf-8"; //출력 결과 인코딩 값으로 'utf-8', 'euc-kr' 가능
        $coord="latlng"; //출력 좌표 체계 값으로 latlng(위경도), tm128(카텍) 가능
        $output="json" ;//json,xml

        $qry_str = "?encoding=".$encoding."&coord=".$coord."&output=".$output."&query=".$address;
        $headers = array(
            "X-Naver-Client-Id: $cID", //Client ID
            "X-Naver-Client-Secret: $sCode" //Client Secret
        );

        $url="https://openapi.naver.com/v1/map/geocode";
        curl_setopt($ch, CURLOPT_URL, $url.$qry_str);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res =curl_exec($ch);
        curl_close($ch);

        //echo($res);
        return $res;


    }
     $address1 = $location["mb_addr1"];
	$json = geocode($address1, "wjF2W98KQDCKIQVC1CBD", "uA9xeXn6Ps");
	//$json = utf8_encode($json);        //적용하는 사이트의 인코딩이 euc_kr인 경우 추가해 줌.
	$mapdata =  json_decode($json);
	$map_x_point = $mapdata->result->items[0]->point->x;
	$map_y_point =  $mapdata->result->items[0]->point->y;

?>

<style>
	.tabContents1{margin-bottom:100px;}
</style>

<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=wjF2W98KQDCKIQVC1CBD&submodules=geocoder"></script>
    <div class="subcont_top"><!--100%-->
<?php include_once(G5_PATH.'/SNB.php'); ?>
            <div class="sub_cont1">
                <h3 class="subpage_name">지사별 위치및 연락처</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">
                    <div class="sub6_2_c">
                        <h3 class="sub6_2title">전국 각 지역별 닥터맘 지점을 만나보세요.</h3>
                        <p class="sub6_2txt1">항상 고객님의 곁에서 든든한 파트너가 되어 드리겠습니다.</p>
                        <input type="hidden" id="seach_si" name="seach_si" value="<?php echo $_REQUEST["si"]; ?>">
                        <input type="hidden" id="seach_gu" name="seach_gu">
						<ul class="tab_sub6_title">
                            <li><a  <?php if($si == "서울") {?>class="active_si"<?php }?> id="si_1" href="javascript:SearchLocation('si','서울','si_1')">서울지역</a></li>
                            <li><a <?php if($si == "경인") {?>class="active_si"<?php }?> id="si_2" href="javascript:SearchLocation('si','경인','si_2')" >경인지역</a></li>
                            <li><a <?php if($si == "경기") {?>class="active_si"<?php }?> id="si_3" href="javascript:SearchLocation('si','경기','si_3')" >경기지역</a></li>
                            <li><a <?php if($si == "충청/전북") {?>class="active_si"<?php }?> id="si_4"href="javascript:SearchLocation('si','충청/전북','si_4')" >충청/전북지역</a></li>
                            <li><a <?php if($si == "경상남북") {?>class="active_si"<?php }?> id="si_5"href="javascript:SearchLocation('si','경상남북','si_5')" >경상남북지역</a></li>
                        </ul>

						<div class="tabDetails" style="border:none; margin:0">

							<div id="tab1" class="tabContents1">
								<div class="sub6_t2">
									<ul class="sub6_t2_li">
                                            <?php if(!empty($si)) {
                                                $add_sql = get_location($si);
                                                $sql = "select mb_id, mb_branch from g5_member where (mb_level = '7' or mb_level = '9') and mb_no !='2' and ({$add_sql}) order by mb_level desc, mb_nick asc";

                                                $result = sql_query($sql);
                                                while ($row = sql_fetch_array($result)) {
                                                    ?>
                                                    <li>
                                                        <a href=javascript:SearchLocation("gu","<?php echo $row["mb_id"]; ?>")><?php echo $row["mb_branch"] ?>
                                                            </a></li>
                                                <?php }
                                            }?>
									</ul>
								</div>


								<div id="information">
									<h3 class="sub6_2title">닥터맘 지사안내 입니다.</h3>
									<p class="sub6_2txt1">항상 고객님의 곁에서 든든한 파트너가 되어 드리겠습니다.</p>

									<? if($mb_id != 'drmamhead'){ ?>
										<div class="sub6_2_tc">
											<table summary="담당지역,전화번호,주소,이메일,계좌안내" class="sub6_2_table">
												<caption>명단</caption>
												<colgroup>
													<col width="17%"/>
													<col width="*%"/>
												</colgroup>
												<tbody>
												<tr>
													<td class="t_strong3">연락처</td>
													<td><span class="t_strong3">전화 :</span> <strong style="font-size:15px;"><?php echo $location["mb_tel"]?></strong></td>
													<td><span class="t_strong3">팩스 :</span> <?php echo $location["mb_fax"]?></td>
													<td><span class="t_strong3">카톡아이디 :</span>  <?php echo $location["mb_homepage"]?></td>
												</tr>
												<tr>
													<td class="t_strong3">지사명</td>
													<td><?php echo $location["mb_branch"]?></td>
													<td colspan="2"><span class="t_strong3">지사장 :</span><?php echo $location["mb_name"]?> </td>
												  </tr>
												<tr>
													<td  class="t_strong3">담당지역</td>
													<td colspan="3"><?php echo $location["mb_cover_area"]?></td>
												  </tr>

												<tr>
													<td class="t_strong3">주소</td>
													<td colspan="3"><?php echo $location["mb_addr1"].$location["mb_addr2"].$location["mb_addr3"]?></td>
												  </tr>
												<tr>
													<td class="t_strong3">이메일</td>
													<td colspan="3"><?php echo $location["mb_email"]?></td>
												  </tr>
												<tr>
													<td  class="t_strong3">계좌안내</td>
													<td colspan="3"><span class="strong"><?php echo $location["mb_bank_name"]?> <?php echo $location["mb_bank_account"]?></span></td>
												  </tr>
												</tbody>
											</table>
										</div>
										<!-- 네이버 지도 -->
										<div id="map" style=" width:750px; height:300px; margin-bottom:40px;"></div>
									<? } else { ?>
										<p style="text-align: center; font-size: 16px; padding:20px 0;">------ 지점을 선택해주세요. ------</p>
									<? } ?>


								</div>

								<script type="text/javascript">
									/*var oMap;
									var oPoint = new nhn.api.map.LatLng(<?php echo $map_y_point ?>, <?php echo $map_x_point ?>);
									nhn.api.map.setDefaultPoint('LatLng');
									oMap = new nhn.api.map.Map('map' ,{
										point : oPoint,
										zoom : 10,
										enableWheelZoom : true,
										enableDragPan : true,
										enableDblClickZoom : false,
										mapMode : 0,
										activateTrafficMap : false,
										activateBicycleMap : false,
										minMaxLevel : [ 1, 14 ]

									});
									var oSize = new nhn.api.map.Size(83, 86);
									var oOffset = new nhn.api.map.Size(40, 75);
									var oIcon = new nhn.api.map.Icon(g5_url+'/img/mam_location.png', oSize, oOffset);

									// 마커 찍기
									var oMarker1 = new nhn.api.map.Marker(oIcon,{title : '닥터맘'});  //마커 생성
									oMarker1.setPoint(oPoint); //마커 표시할 좌표 선택
									oMap.addOverlay(oMarker1); //마커를 지도위에 표현*/

									var HOME_PATH = window.HOME_PATH || '.';
									var position = new naver.maps.LatLng(<?php echo $map_y_point ?>, <?php echo $map_x_point ?>);

									var map = new naver.maps.Map('map', {
										center: position,
										zoom: 12
									});

									var markerOptions = {
										position: position.destinationPoint(0, 0),
										map: map,
										icon: {
											url:  g5_url+'/img/mam_location.png',
											size: new naver.maps.Size(84, 86),

										}
									};

									var marker = new naver.maps.Marker(markerOptions);

								</script>


<?if($mb_id != 'drmamhead'){?>

								<!--요금부분-->
							<div class="tabcont">
								<h3 class="sub4_0_tab_title">닥터맘 알뜰형 요금제</h3>
								<p class="detail_view_btn"><a href="<?php echo G5_URL ?>/service_good.php">서비스내용 자세히 보기</a></p>

								<p class="sub4_0_tab_txt1">
								서비스 시간이 4시간으로 산모, 신생아위주의 케어만을 중점으로 제공해 드리는 서비스입니다.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

								<div class="sub4_0_tc">
									<p class="sub4_0_tc_txt1"></p>

									<table summary="주,내용,프리미엄,명품" class="sub4_0_table">
										<caption>교육과정</caption>
										<colgroup>
											<col width="12%"/>
											<col width="30%"/>
											<col width="*%"/>
											<col width="*%"/>
											<col width="*%"/>
										</colgroup>
										<thead>
										<tr>
											<th scope="col">주</th>
											<th scope="col">서비스금액(5일제)</th>
											<th scope="col" colspan='3'>추가요금</th>
									<?php
									$good_work_5d = explode("|",$fee["good_work_5d"]);
									$good_chidren_fee = explode("|",$fee["good_chidren_fee"]);
									$good_time_fee = explode("|",$fee["good_time_fee"]);
									?>

										</tr>
										</thead>
										<tbody>

											<tr>
												<td class="t_strong" rowspan='2'>1주</td>
												<td rowspan='2' ><?=$good_work_5d[0]?>원</td>
												<td rowspan='2'>큰아이</td>
												<td>취학</td>
												<td><?=$good_chidren_fee[0]?>원/일</td>
											</tr>

											<tr>
												<td>미취학</td>
												<td><?=$good_chidren_fee[1]?>원/일</td>
											</tr>

											<tr>
												<td class="t_strong">2주</td>
												<td><?=$good_work_5d[1]?>원</td>
												<td>시간당</td>
												<td colspan='2'><?=$good_time_fee[0]?>원</td>
											</tr>


											<tr>
												<td class="t_strong">3주</td>
												<td><?=$good_work_5d[2]?>원</td>
												<td>휴일근무</td>
												<td colspan='2'><?=$good_time_fee[1]?>원</td>
											</tr>


											<tr>
												<td class="t_strong">4주</td>
												<td><?=$good_work_5d[3]?>원</td>
												<td>명절근무</td>
												<td colspan='2'><?=$good_time_fee[2]?>원</td>
											</tr>


										<tr>
											<td class="t_strong">비고</td>
											<td colspan="4">
												<ul>
													<li><?=nl2br($fee['good_work_info'])?></li>
												</ul>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div><!--tabcont end 덩어리의 끝나는 div//-->






							<div class="tabcont">
								<h3 class="sub4_0_tab_title">일반형(정부지원/바우처) 요금제</h3>
								<p class="detail_view_btn"><a href="<?php echo G5_URL ?>/service_basic.php">서비스내용 자세히 보기</a></p>

								<p class="sub4_0_tab_txt1">교육기관에서 기본교육 60시간을 이수한 산후관리사(건강관리사)가산모님 가정으로 파견하여 기본프로그램을 제공해주는 <br>서비스입니다.<br>
                       (정부지원에 해당되지 않는 산모님도 동일한 금액과 서비스 내용을 받으실 수 있습니다.<br>단. 쌍생아 및 삼태아이상/장애인산모는 제외)</p>

								<div class="sub4_0_tc">
									<p class="sub4_0_tc_txt1"></p>

                  <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
										<caption>교육과정</caption>
										<colgroup>
											<col />
											<col />
											<col />
											<col />
										</colgroup>
										<thead>
										<tr>
											<th scope="col" rowspan="2" colspan="2" style='width:16%;' >-</th>
                      <th scope="col" colspan="2" style='width:28%;' >단축형</th>
                      <th scope="col" colspan="2" style='width:28%;' >표준형</th>
                      <th scope="col" colspan="2" style='width:28%;' >연장형</th>
										</tr>

                    <tr>
                        <th scope="row"><label for="basic_subject">기간</label></th>
                        <th scope="row"><label for="basic_subject">이용요금</label></th>
                        <th scope="row"><label for="basic_subject">기간</label></th>
                        <th scope="row"><label for="basic_subject">이용요금</label></th>
                        <th scope="row"><label for="basic_subject">기간</label></th>
                        <th scope="row"><label for="basic_subject">이용요금</label></th>
                    </tr>

										</thead>
										<tbody>





                      <!-- 단태아  2017-12-04 김지환 -->
                      <tr>
                				<td class="adm_char_td t_strong" rowspan="3">단태아</td>
                        <td class="adm_char_td t_strong">첫째</td>
                        <td class="adm_char_td">5일</td>
                        <td class=""><?=$fee['dan_dan_1_5']?></td>
                        <td class="adm_char_td">10일</td>
                        <td class=""><?=$fee['pyo_dan_1_10']?></td>
                        <td class="adm_char_td">15일</td>
                        <td class=""><?=$fee['yeon_dan_1_15']?></td>
                			</tr>

                      <tr>
                        <td class="adm_char_td t_strong">둘째</td>
                        <td class="adm_char_td">10일</td>
                        <td class=""><?=$fee['dan_dan_2_10']?></td>
                        <td class="adm_char_td">15일</td>
                        <td class=""><?=$fee['pyo_dan_2_15']?></td>
                        <td class="adm_char_td">10일</td>
                        <td class=""><?=$fee['yeon_dan_2_10']?></td>
                			</tr>

                      <tr>
                        <td class="adm_char_td t_strong">셋째</td>
                        <td class="adm_char_td">15일</td>
                        <td class=""><?=$fee['dan_dan_3_15']?></td>
                        <td class="adm_char_td">10일</td>
                        <td class=""><?=$fee['pyo_dan_3_10']?></td>
                        <td class="adm_char_td">15일</td>
                        <td class=""><?=$fee['yeon_dan_3_15']?></td>
                			</tr>
                      <!-- 단태아 끝 -->


                      <!-- 쌍생아  2017-12-04 김지환 -->
                      <tr>
                				<td class="adm_char_td t_strong" rowspan="2">쌍생아</td>
                        <td class="adm_char_td t_strong">둘째</td>
                        <td class="adm_char_td">10일</td>
                        <td class=""><?=$fee['dan_twin_2_10']?></td>
                        <td class="adm_char_td">15일</td>
                        <td class=""><?=$fee['pyo_twin_2_15']?></td>
                        <td class="adm_char_td">20일</td>
                        <td class=""><?=$fee['yeon_twin_2_20']?></td>
                			</tr>

                      <tr>
                        <td class="adm_char_td t_strong">셋째</td>
                        <td class="adm_char_td">15일</td>
                        <td class=""><?=$fee['dan_twin_3_15']?></td>
                        <td class="adm_char_td">20일</td>
                        <td class=""><?=$fee['pyo_twin_3_20']?></td>
                        <td class="adm_char_td">25일</td>
                        <td class=""><?=$fee['yeon_twin_3_25']?></td>
                			</tr>
                      <!-- 쌍생아 끝 -->


                      <!-- 삼태아/중증장애인  2017-12-04 김지환 -->
                      <tr>
                				<td class="adm_char_td t_strong" colspan="2">삼태아/중증장애인</td>
                        <td class="adm_char_td">15일</td>
                        <td class=""><?=$fee['dan_sam_15']?></td>
                        <td class="adm_char_td">20일</td>
                        <td class=""><?=$fee['pyo_sam_20']?></td>
                        <td class="adm_char_td">25일</td>
                        <td class=""><?=$fee['yeon_sam_25']?></td>
                			</tr>
                      <!-- 삼태아/중증장애인 끝 -->




										</tbody>
									</table>
								</div>
							</div><!--tabcont end 덩어리의 끝나는 div//-->


                                <div class="tabcont">
                                    <h3 class="sub4_0_tab_title">닥터맘 베스트 요금제</h3>
                                    <p class="detail_view_btn"><a href="<?php echo G5_URL ?>/service_best.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">산후관리 근무경력이 2년이상이며, 년 교체건수가 1회미만인 산후관리사를 산모님 가정에&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
									파견하며, 산후관리 프로그램을 바탕으로 편안하고 안전하게 서비스를 제공해 드립니다.</p>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">베스트 출퇴근</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="20%"/>
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
                                                <col width="20%"/>
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

                                    <p class="sub4_0_tab_txt1">산후관리 근무경력이 3년 이상이며, 본사 프리미엄 교육 20시간을 이수한 산후관리사&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
									산모님 가정에 파견하며, 산후회복프로그램을 매일 제공해 주는 서비스가 포함됩니다.</p>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">프리미엄 출퇴근</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="20%"/>
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
                                                <col width="20%"/>
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
                                                <col width="20%"/>
                                                <col width="*"/>
                                                <col width="*"/>
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
                                                <col width="20%"/>
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

                                <div class="tabcont">
                                    <h3 class="sub4_0_tab_title">닥터맘 추가요금</h3>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">시간 추가요금(1시간)</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="20%"/>
                                                <col width="*"/>
                                                <col width="*"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">비고</th>
                                                <th scope="col">추가요금</th>
                                                <th scope="col">쌍둥이</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    <?php
                    $names = array("알뜰형","일반형","베스트","프리미엄","명품플러스");
                    $add_left = explode("|",$fee["add_left"]);
                    $add_right = explode("|",$fee["add_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $names[$i] ?></td>
                                                <td><?php echo $add_left[$i] ?>원</td>
                                                <td><?php echo $add_right[$i] ?>원</td>
                                            </tr>
                <?php
            }
            ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo $fee["add_info"] ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">쌍둥이 요금(1인1일)</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="20%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">비고</th>
                                                <th scope="col">출퇴근형</th>
                                                <th scope="col">입주형</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    <?php
                    $twin_left = explode("|",$fee["twin_left"]);
                    $twin_right = explode("|",$fee["twin_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $names[$i] ?></td>
                                                <td><?php echo $twin_left[$i] ?>원</td>
                                                <td><?php echo $twin_right[$i] ?>원</td>
                                            </tr>
                        <?php
                    }
                    ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo $fee["twin_info"] ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                     <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">휴일,추가시간 요금(1일)</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="20%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">비고</th>
                                                <th scope="col">출퇴근형</th>
                                                <th scope="col">입주형</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    <?php
                    $holi_left = explode("|",$fee["holi_left"]);
                    $holi_right = explode("|",$fee["holi_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $names[$i] ?></td>
                                                <td><?php echo $holi_left[$i] ?>원</td>
                                                <td><?php echo $holi_right[$i] ?>원</td>
                                            </tr>
                        <?php
                    }
                    ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo $fee["twin_info"] ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                     <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">명절 추가요금(1일)</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="20%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th scope="col">비고</th>
                                                <th scope="col">출퇴근형</th>
                                                <th scope="col">입주형</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    <?php
                    $thax_left = explode("|",$fee["thax_left"]);
                    $thax_right = explode("|",$fee["thax_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                                            <tr>
                                                <td class="t_strong"><?php echo $names[$i] ?></td>
                                                <td><?php echo $thax_left[$i] ?>원</td>
                                                <td><?php echo $thax_right[$i] ?>원</td>
                                            </tr>
                        <?php
                    }
                    ?>
                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="2">
                                                    <ul>
                                                        <li><?php echo $fee["thax_info"] ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                  <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">기타가족 추가요금(1일)</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="20%"/>
                                                <col width="*%"/>
                                                <col width="*%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                              <th scope="row"><label for="elem_subject">비고</label></th>
                                              <th scope="row"><label for="elem_subject">출퇴근 (알뜰형)</label></th>
                                              <th scope="row"><label for="elem_subject">출퇴근 (9시~18시)</label></th>
                                              <th scope="row"><label for="elem_subject">입주형</label></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $elem_name = array("미취학(상주)","어린이집/유치원","취학(초,중 고생)","성인가족(1인)");
                                            $elem_left = explode("|",$fee["elem_left"]);
                                            $elem_right = explode("|",$fee["elem_right"]);
                                            $elem_mid = explode("|",$fee["elem_mid"]);
                                            for($i=0;$i < count($elem_name);$i++) {
                                            ?>

                                              <tr>
                                                  <td class="t_strong"><?php echo $elem_name[$i] ?></td>
                                                  <td><?php echo $elem_left[$i] ?>원</td>
                                                  <td><?php echo $elem_mid[$i] ?>원</td>
                                                  <td><?php echo $elem_right[$i] ?>원</td>
                                              </tr>

                                            <?php
                                            }
                                            ?>

                                            <tr>
                                                <td class="t_strong">비고</td>
                                                <td colspan="3">
                                                    <ul>
                                                        <li><?php echo $fee["elem_info"] ?></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div><!--tabcont end 덩어리의 끝나는 div//-->
	<?}?>
							</div><!--탭1 끝-->

							<div id="tab2" class="tabContents1">
								2
							</div><!--탭2 끝-->

							<div id="tab3" class="tabContents1">
								3
							</div><!--탭3 끝-->

							<div id="tab4" class="tabContents1">
								4
							</div><!--탭4 끝-->

							<div id="tab5" class="tabContents1">
								5
							</div><!--탭5 끝-->
						</div>



                    </div><!--sub6_2_c 덩어리 끝 -->


                </div><!--s_cont 끝-->

            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->

<script>
    function SearchLocation(type,str,ids)
    {
        var search_val = $("#seach_si").val();
        var gu_val = $("#seach_gu").val();
        if(type == "si"){
            $("#seach_si").val(str);
            $(".active_si").removeClass();
            $("#"+ids).addClass("active_si");
            search_val = str;

                  $.ajax({
                    url: "./ajax.search_location.php",
                    type: "POST",
                    data: {
                        "type": type,
                        "val": search_val
                    },
                    dataType: "json",
                    async: true,
                    cache: false,
                    success: function(data, textStatus) {
                        if(data.result != "no"){
                                $(".sub6_t2_li").html('');
                            for(var i=0;data.length>i;i++){
                                $(".sub6_t2_li").append('<li><a href=javascript:SearchLocation("gu","'+data[i].mb_id+'")>'+data[i].mb_branch+'</a></li>');
                            }
                        }
                    }
                })
        }else{
            $("#seach_gu").val(str);
            gu_val = str;
            location.href = g5_url+"/branch_map.php?branch="+gu_val+"&si="+search_val + "#information";
        }
    }
</script>
<?php
include_once(G5_PATH.'/tail.php');
?>
