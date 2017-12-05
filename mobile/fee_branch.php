<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
$mb_id = $_REQUEST["branch"];
$si = $_REQUEST["si"];
$fee = sql_fetch("select * from branch_fee_config where branch = TRIM('$mb_id')");

if(empty($fee)){
    $fee = sql_fetch("select * from branch_fee_config where branch = TRIM('drmamhead')");
}
?>




<!-- // 요금관련 및 탭수정  161111_arcthan  -->


<style>
.sub4_li li.sub4_li_title{line-height:20px;padding-bottom:0;font-size:18px;}
.tab_sub4_title{padding-bottom:30px;margin-top:30px;}
.tab_sub4_title li {width:47%;}
.tab_sub4_title li + li{margin-left:5px;}
.tab_sub4_title li a.tab_link{padding:10px;margin:0; font-size:18px;}
.sub4_select select {font-size:13px;}
.sub4_select option{font-size:13px;line-height:50px;}

.sub4_li li.sub4_li_title{width:25%;margin:0;line-height:40px}
.sub4_li li.sub4_li_inp{width:75%;margin:0;}

.sub4_srf {border-bottom:1px dashed #ccc;}
</style>




		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>

		<div class="msub_container" style="min-height:600px">

			<h3 class="sub3_5_tc_title" style="margin-top:15px;">서비스 및 지역별 요금보기</h3>

				<ul class="tab_sub4_title" >
					<li><a class="tab_link active" href="#tab1">산후도우미</a></li>
					<li><a href="#tab2" ids="1" class="tab_link">모유수유전문가</a></li>
				</ul>

			<div class="sub4_select">

				<form method="" name="" id="" action="" class="sub4_srf">
					<fieldset>
						<legend>지역 선택</legend>
						<ul class="sub4_li mr30">
							<li class="sub4_li_title" >지역 선택</li>
							<li class="sub4_li_inp" >
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

						<legend>지점 선택</legend>
						<ul class="sub4_li">
							<li class="sub4_li_title">지점 선택</li>
							<li class="sub4_li_inp">
								<label for="search" class="hide">분류 선택(라벨)</label>
								<select title="2차 분류 선택" name="seach_gu" id="seach_gu" class="sub4_sr" onchange="SearchLocation('gu')">
                                            <?php if(!empty($si)){
                                                    $add_sql = get_location($si);
                                                    $sql = "select mb_id, mb_branch from g5_member where (mb_level = '7' or mb_level = '9') and mb_no !='2' and ({$add_sql})  order by mb_level desc, mb_nick asc";
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
				</form>
			</div>


<!-- 지점선택시에만 노출 	-->
<?if($mb_id){?>


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
								<p class="detail_view_btn"><a href="<?php echo G5_URL ?>/mobile/service_basic.php">서비스내용 자세히 보기</a></p>

								<p class="sub4_0_tab_txt1">교육기관에서 기본교육 60시간을 이수한 산후관리사(건강관리사)가산모님 가정으로 파견하여 기본프로그램을 제공해주는 서비스입니다.<br>
                       (정부지원에 해당되지 않는 산모님도 동일한 금액과 서비스 내용을 받으실 수 있습니다. 단. 쌍생아 및 삼태아이상/장애인산모는 제외)</p>

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
                                    <p class="detail_view_btn"><a href="<?php echo G5_MOBILE_URL ?>/mobile/service_best.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">산후관리 근무경력이 2년이상이며, 년 교체건수가 1회미만인 산후관리사를 산모님 가정에 파견하며,<br>산후관리 프로그램을 바탕으로 편안하고 안전하게 서비스를 제공해 드립니다.</p>

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
                                    <p class="detail_view_btn"><a href="<?php echo G5_MOBILE_URL ?>/service_premium.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">산후관리 근무경력이 3년 이상이며, 본사 프리미엄 교육 20시간을 이수한 산후관리사
									산모님 가정에 파견하며,<br/>산후회복프로그램을 매일 제공해 주는 서비스가 포함됩니다.</p>

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
                                    <p class="detail_view_btn"><a href="<?php echo G5_MOBILE_URL ?>/service_signiture.php">서비스내용 자세히 보기</a></p>

                                    <p class="sub4_0_tab_txt1">프리미엄 산후관리사로 산후관리근무 경력이 1600시간 이상이며, 교체건이 없는 분들로<br/>
								본사 명품플러스 교육 40시간을 이수한 산후관리사가 산모님 가정에 파견됩니다.<br/>
								숙련된 관리사님을 엄격한 기준으로 선발하여 닥터맘의 최고의 서비스를 받을 수 있다고 자부합니다.</p>

                                    <div class="sub4_0_tc">
                                        <p class="sub4_0_tc_txt1">명품플러스 출퇴근</p>

                                        <table summary="주,내용,프리미엄,명품" class="sub4_0_table">
                                            <caption>교육과정</caption>
                                            <colgroup>
                                                <col width="33%"/>
                                                <col width="33%"/>
                                                <col width="33%"/>
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

							<div class="tabcont">
								<h3 class="sub4_0_tab_title">닥터맘 추가요금</h3>

                                    <p class="detail_view_btn"></p>

                                    <p class="sub4_0_tab_txt1"></p>

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
													<li><?php echo $fee["holi_info"] ?></li>
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



							</div><!--탭1 끝-->

					</div>





					<!---------------------------// 두번째 탭 //--------------------------->

					<div id="tab2" class="tabContents1">
						<div class="tabcont">
							<div class="sub4_baby_title">
								<p class="sub4_baby_txt">모유에 이로운점 보다 모유를 하지 않을때 아기에게 발생되어질 문제들에 대해 생각해 보십시오.
								우리가 아는 것 그 이상의 문제점을 발견하게 될 것 입니다.
								모유수유가 힘들 수도 있습니다. 결코 쉽다라고 이야기 하지 않겠습니다.
								어렵고 힘들때, 모유수유를 포기할까 라는 생각이 들때, 늦지 않았습니다. 문을 두르려 주세요.
								모유수유를 할 수 있도록 도와드리고 지지합니다.
								닥터맙은 국제 모유수유 전문가와 함께합니다.</p>
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

<?}?>

				</div>
			</div>

		</div><!--기본 레이아웃 msub_container 끝-->
	</div>


	<script>

		var idx;
		$(document).ready(function() {

		   $('.tab_link').click(function() {
			 idx = $('.tab_link').index(this);
		   });

		   $('.tab_link').eq(<?=$_GET['idx']?>).trigger('click');
		});


		function SearchLocation(str)
		{
			var search_val = $("#seach_si option:selected").val();
			var gu_val = $("#seach_gu option:selected").val();
			if(str == "si"){
					  $.ajax({
						url: "../ajax.search_location.php",
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
				location.href = g5_url+"/mobile/fee_branch.php?branch="+gu_val+"&si="+search_val +"&idx="+idx;;
			}
		}
	</script>

<!-- 전환페이지 설정 -->
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
<script type="text/javascript">
var _nasa={};
_nasa["cnv"] = wcs.cnv("5","10"); // 전환유형(5:기타), 전환가치 설정해야함. 설치매뉴얼 참고
</script>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>
