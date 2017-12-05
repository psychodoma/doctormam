<?php
$sub_menu = "200100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$member_type = $_REQUEST["member_type"];
$member_name = LevelToName($member_type);

$fee = sql_fetch("select * from branch_fee_config where branch = TRIM('$mb_id')");


if(empty($fee)){
    $fee = sql_fetch("select * from branch_fee_config where branch = TRIM('drmamhead')");
    $w = "n";
}else{
    $w = "u";

    if ($is_admin != 'super' && $member['mb_level'] < 7)
        alert('자신보다 권한이 높은 회원은 수정할 수 없습니다.');
}



$g5['title'] .= $member_name.' '."요금 설정";
include_once('./admin.head.php');

// add_javascript('js 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_javascript(G5_POSTCODE_JS, 0);    //다음 주소 js
?>



<form name="fmember" id="fmember" action="./dr_fee_config_update.php" onsubmit="return fmember_submit(this);" method="post" enctype="multipart/form-data">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="mb_id" value="<?php echo $mb_id ?>">
    <input type="hidden" name="member_type" value="<?php echo $member_type ?>">

<!--     <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">베이직 출퇴근</h2>
            <colgroup>
                <col class="grid_4">
                <col class="grid_4">
                <col class="grid_4">
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="basic_subject">주</label></th>
                <th scope="row"><label for="basic_subject">5일제</label></th>
                <th scope="row"><label for="basic_subject">6일제</label></th>
            </tr>
            <?php
                $basic_work_5d = explode("|",$fee["basic_work_5d"]);
                $basic_work_6d = explode("|",$fee["basic_work_6d"]);
                for($i=0;$i < count($basic_work_5d);$i++) {
                    ?>
                    <tr>
                        <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                        <td>
                            <input type="text" name="basic_work_5d[]" value="<?php echo $basic_work_5d[$i] ?>"
                                   id="basic_work_5d" class="frm_input num_input" size="15" maxlength="12"
                                   onkeyup="addComma(this)"> 원
                        </td>
                        <td>
                            <input type="text" name="basic_work_6d[]" value="<?php echo $basic_work_6d[$i] ?>"
                                   id="basic_work_6d" class="frm_input num_input" size="15" maxlength="12"
                                   onkeyup="addComma(this)"> 원
                        </td>
                    </tr>
                    <?php
                }
            ?>
            <tr>
                <th>비고</th>
                <td colspan="2"><textarea name="basic_work_info" class="frm_textarea wd98p"><?php echo $fee["basic_work_info"] ?></textarea></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatR adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">베스트 출퇴근</h2>
            <colgroup>
                <col class="grid_4">
                <col class="grid_4">
                <col class="grid_4">
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="best_subject">주</label></th>
                <th scope="row"><label for="best_subject">5일제</label></th>
                <th scope="row"><label for="best_subject">6일제</label></th>
            </tr>
            <?php
                $best_work_5d = explode("|",$fee["best_work_5d"]);
                $best_work_6d = explode("|",$fee["best_work_6d"]);
                for($i=0;$i < count($best_work_5d);$i++) {
                    ?>
                    <tr>
                        <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                        <td>
                            <input type="text" name="best_work_5d[]" value="<?php echo $best_work_5d[$i] ?>"
                                   id="best_work_5d" class="frm_input num_input" size="15" maxlength="12"
                                   onkeyup="addComma(this)"> 원
                        </td>
                        <td>
                            <input type="text" name="best_work_6d[]" value="<?php echo $best_work_6d[$i] ?>"
                                   id="best_work_6d" class="frm_input num_input" size="15" maxlength="12"
                                   onkeyup="addComma(this)"> 원
                        </td>
                    </tr>
                    <?php
                }
            ?>
            <tr>
                <th>비고</th>
                <td colspan="2"><textarea name="best_work_info" class="frm_textarea wd98p"><?php echo $fee["best_work_info"] ?></textarea></td>
            </tr>
            </tbody>
        </table>
    </div> -->








    <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char" style='float:none; width:100%;'>
        <table class="adm_char_table">
            <h2 class="adm_po">알뜰형 출퇴근</h2>
            <colgroup>
                <col class="grid_4">
                <col class="grid_4">
                <col class="grid_4">
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="basic_subject">주</label></th>
                <th scope="row"><label for="basic_subject">5일제</label></th>
                <th scope="row" colspan='3' ><label for="basic_subject">추가요금</label></th>
            </tr>
            <?php
                $good_work_5d = explode("|",$fee["good_work_5d"]);
                $good_chidren_fee = explode("|",$fee["good_chidren_fee"]);
				$good_time_fee = explode("|",$fee["good_time_fee"]);
			?>





			<tr>
				<td rowspan='2' class="adm_char_td" >1주</td>
				<td rowspan='2'><input type="text" name="good_work_5d[]" value="<?php echo $good_work_5d[0] ?>" id="good_work_5d" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
				<td rowspan='2' class="adm_char_td" >큰아이</td>
				<td class="adm_char_td" >취학</td>
				<td><input type="text" name="good_chidren_fee[]" value="<?php echo $good_chidren_fee[0] ?>" id="good_chidren_fee" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
			</tr>

			<tr>
				<td class="adm_char_td" >미취학</td>
				<td><input type="text" name="good_chidren_fee[]" value="<?php echo $good_chidren_fee[1] ?>" id="good_chidren_fee" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
			</tr>

			<tr>
				<td class="adm_char_td">2주</td>
				<td><input type="text" name="good_work_5d[]" value="<?php echo $good_work_5d[1] ?>" id="good_work_5d" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
				<td class="adm_char_td" >시간당</td>
				<td colspan='2'><input type="text" name="good_time_fee[]" value="<?php echo $good_time_fee[0] ?>" id="good_time_fee" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
			</tr>


			<tr>
				<td class="adm_char_td">3주</td>
				<td><input type="text" name="good_work_5d[]" value="<?php echo $good_work_5d[2] ?>" id="good_work_5d" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
				<td class="adm_char_td" >휴일근무</td>
				<td colspan='2'><input type="text" name="good_time_fee[]" value="<?php echo $good_time_fee[1] ?>" id="good_time_fee" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
			</tr>


			<tr>
				<td class="adm_char_td">4주</td>
				<td><input type="text" name="good_work_5d[]" value="<?php echo $good_work_5d[3] ?>" id="good_work_5d" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
				<td class="adm_char_td" >명절근무</td>
				<td colspan='2'><input type="text" name="good_time_fee[]" value="<?php echo $good_time_fee[2] ?>" id="good_time_fee" class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"> 원</td>
			</tr>


			<tr>
				<td>비고</td>
				<td colspan="4">
					<textarea name="good_work_info" class="frm_textarea wd98p"><?php echo $fee["good_work_info"] ?></textarea>
				</td>
			</tr>

            </tbody>
        </table>
    </div>



	<br><br><br>



  <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char" style='float:none; width:100%;'>
      <table class="adm_char_table">
          <h2 class="adm_po">일반형(정부지원/바우처) 요금제</h2>
          <colgroup>
              <col class="grid_4">
              <col class="grid_4">
              <col class="grid_4">
              <col class="grid_4">
          </colgroup>
          <tbody>
          <tr>
              <th scope="row" rowspan="2" colspan="2" style='width:16%;'><label for="basic_subject">-</label></th>
              <th scope="row" colspan="2" style='width:28%;'><label for="basic_subject">단축형</label></th>
              <th scope="row" colspan="2" style='width:28%;'><label for="basic_subject">표준형</label></th>
              <th scope="row" colspan="2" style='width:28%;'><label for="basic_subject">연장형</label></th>
          </tr>
          <tr>
              <th scope="row"><label for="basic_subject">기간</label></th>
              <th scope="row"><label for="basic_subject">이용요금</label></th>
              <th scope="row"><label for="basic_subject">기간</label></th>
              <th scope="row"><label for="basic_subject">이용요금</label></th>
              <th scope="row"><label for="basic_subject">기간</label></th>
              <th scope="row"><label for="basic_subject">이용요금</label></th>
          </tr>


          <!-- 단태아  2017-12-04 김지환 -->
          <tr>
    				<td class="adm_char_td" rowspan="3">단태아</td>
            <td class="adm_char_td">첫째</td>
            <td class="adm_char_td">5일</td>
            <td class=""><input type='text' name='dan_dan_1_5' value='<?=$fee['dan_dan_1_5']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">10일</td>
            <td class=""><input type='text' name='pyo_dan_1_10' value='<?=$fee['pyo_dan_1_10']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">15일</td>
            <td class=""><input type='text' name='yeon_dan_1_15' value='<?=$fee['yeon_dan_1_15']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
    			</tr>

          <tr>
            <td class="adm_char_td">둘째</td>
            <td class="adm_char_td">10일</td>
            <td class=""><input type='text' name='dan_dan_2_10' value='<?=$fee['dan_dan_2_10']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">15일</td>
            <td class=""><input type='text' name='pyo_dan_2_15' value='<?=$fee['pyo_dan_2_15']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">10일</td>
            <td class=""><input type='text' name='yeon_dan_2_10' value='<?=$fee['yeon_dan_2_10']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
    			</tr>

          <tr>
            <td class="adm_char_td">셋째</td>
            <td class="adm_char_td">15일</td>
            <td class=""><input type='text' name='dan_dan_3_15' value='<?=$fee['dan_dan_3_15']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">10일</td>
            <td class=""><input type='text' name='pyo_dan_3_10' value='<?=$fee['pyo_dan_3_10']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">15일</td>
            <td class=""><input type='text' name='yeon_dan_3_15' value='<?=$fee['yeon_dan_3_15']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
    			</tr>
          <!-- 단태아 끝 -->


          <!-- 쌍생아  2017-12-04 김지환 -->
          <tr>
    				<td class="adm_char_td" rowspan="2">쌍생아</td>
            <td class="adm_char_td">둘째</td>
            <td class="adm_char_td">10일</td>
            <td class=""><input type='text' name='dan_twin_2_10' value='<?=$fee['dan_twin_2_10']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">15일</td>
            <td class=""><input type='text' name='pyo_twin_2_15' value='<?=$fee['pyo_twin_2_15']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">20일</td>
            <td class=""><input type='text' name='yeon_twin_2_20' value='<?=$fee['yeon_twin_2_20']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
    			</tr>

          <tr>
            <td class="adm_char_td">셋째</td>
            <td class="adm_char_td">15일</td>
            <td class=""><input type='text' name='dan_twin_3_15' value='<?=$fee['dan_twin_3_15']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">20일</td>
            <td class=""><input type='text' name='pyo_twin_3_20' value='<?=$fee['pyo_twin_3_20']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">25일</td>
            <td class=""><input type='text' name='yeon_twin_3_25' value='<?=$fee['yeon_twin_3_25']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
    			</tr>
          <!-- 쌍생아 끝 -->


          <!-- 삼태아/중증장애인  2017-12-04 김지환 -->
          <tr>
    				<td class="adm_char_td" colspan="2">삼태아/중증장애인</td>
            <td class="adm_char_td">15일</td>
            <td class=""><input type='text' name='dan_sam_15' value='<?=$fee['dan_sam_15']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">20일</td>
            <td class=""><input type='text' name='pyo_sam_20' value='<?=$fee['pyo_sam_20']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
            <td class="adm_char_td">25일</td>
            <td class=""><input type='text' name='yeon_sam_25' value='<?=$fee['yeon_sam_25']?>' class="frm_input num_input" size="15" maxlength="12" onkeyup="addComma(this)"></td>
    			</tr>
          <!-- 삼태아/중증장애인 끝 -->


          </tbody>
      </table>
  </div>



  <br><br><br>







    <div class="tbl_frm01_1 tbl_wrap fee_div floatR adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">베스트 출퇴근<h2>
            <colgroup>
                <col class="grid_4">
                <col class="grid_4">
                <col class="grid_4">
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="best_subject">주</label></th>
                <th scope="row"><label for="best_subject">5일제</label></th>
                <th scope="row"><label for="best_subject">6일제</label></th>
            </tr>
            <?php
            $best_work_5d = explode("|",$fee["best_work_5d"]);
            $best_work_6d = explode("|",$fee["best_work_6d"]);
            for($i=0;$i < count($best_work_5d);$i++) {
                ?>
                <tr>
                    <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                    <td>
                        <input type="text" name="best_work_5d[]" value="<?php echo $best_work_5d[$i] ?>"
                               id="best_work_5d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                    <td>
                        <input type="text" name="best_work_6d[]" value="<?php echo $best_work_6d[$i] ?>"
                               id="best_work_6d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th>비고</th>
                <td colspan="2"><textarea name="best_home_info" class="frm_textarea wd98p"><?php echo $fee["best_work_info"] ?></textarea></td>
            </tr>
            </tbody>
        </table>
    </div>






    <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">베스트 입주<h2>
            <colgroup>
                <col class="grid_4">
                <col class="grid_4">
                <col class="grid_4">
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="best_subject">주</label></th>
                <th scope="row"><label for="best_subject">5일제</label></th>
                <th scope="row"><label for="best_subject">6일제</label></th>
            </tr>
            <?php
            $best_home_5d = explode("|",$fee["best_home_5d"]);
            $best_home_6d = explode("|",$fee["best_home_6d"]);
            for($i=0;$i < count($best_home_5d);$i++) {
                ?>
                <tr>
                    <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                    <td>
                        <input type="text" name="best_home_5d[]" value="<?php echo $best_home_5d[$i] ?>"
                               id="best_home_5d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                    <td>
                        <input type="text" name="best_home_6d[]" value="<?php echo $best_home_6d[$i] ?>"
                               id="best_home_6d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th>비고</th>
                <td colspan="2"><textarea name="best_home_info" class="frm_textarea wd98p"><?php echo $fee["best_home_info"] ?></textarea></td>
            </tr>
            </tbody>
        </table>
    </div>



    <div class="tbl_frm01_1 tbl_wrap fee_div floatR adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">프리미엄 출퇴근</h2>
            <colgroup>
                <col class="grid_4">
                <col class="grid_4">
                <col class="grid_4">
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="pre_subject">주</label></th>
                <th scope="row"><label for="pre_subject">5일제</label></th>
                <th scope="row"><label for="pre_subject">6일제</label></th>
            </tr>
            <?php
            $pre_work_5d = explode("|",$fee["pre_work_5d"]);
            $pre_work_6d = explode("|",$fee["pre_work_6d"]);
            for($i=0;$i < count($pre_work_5d);$i++) {
                ?>
                <tr>
                    <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                    <td>
                        <input type="text" name="pre_work_5d[]" value="<?php echo $pre_work_5d[$i] ?>"
                               id="pre_work_5d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                    <td>
                        <input type="text" name="pre_work_6d[]" value="<?php echo $pre_work_6d[$i] ?>"
                               id="pre_work_6d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th>비고</th>
                <td colspan="2"><textarea name="pre_work_info" class="frm_textarea wd98p"><?php echo $fee["pre_work_info"] ?></textarea></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">프리미엄 입주<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="pre_subject">주</label></th>
                        <th scope="row"><label for="pre_subject">5일제</label></th>
                        <th scope="row"><label for="pre_subject">6일제</label></th>
                    </tr>
                    <?php
                    $pre_home_5d = explode("|",$fee["pre_home_5d"]);
                    $pre_home_6d = explode("|",$fee["pre_home_6d"]);
                    for($i=0;$i < count($pre_home_5d);$i++) {
                        ?>
                        <tr>
                            <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                            <td>
                                <input type="text" name="pre_home_5d[]" value="<?php echo $pre_home_5d[$i] ?>"
                                       id="pre_work_5d" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="pre_home_6d[]" value="<?php echo $pre_home_6d[$i] ?>"
                                       id="pre_work_6d" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>비고</th>
                        <td colspan="2"><textarea name="pre_home_info" class="frm_textarea wd98p"><?php echo $fee["pre_home_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatR adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">명품플러스 출퇴근</h2>
            <colgroup>
                <col class="grid_4">
                <col class="grid_4">
                <col class="grid_4">
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="sign_subject">주</label></th>
                <th scope="row"><label for="sign_subject">5일제</label></th>
                <th scope="row"><label for="sign_subject">6일제</label></th>
            </tr>
            <?php
            $sign_work_5d = explode("|",$fee["sign_work_5d"]);
            $sign_work_6d = explode("|",$fee["sign_work_6d"]);
            for($i=0;$i < count($sign_work_5d);$i++) {
                ?>
                <tr>
                    <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                    <td>
                        <input type="text" name="sign_work_5d[]" value="<?php echo $sign_work_5d[$i] ?>"
                               id="sign_work_5d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                    <td>
                        <input type="text" name="sign_work_6d[]" value="<?php echo $sign_work_6d[$i] ?>"
                               id="sign_work_6d" class="frm_input num_input" size="15" maxlength="12"
                               onkeyup="addComma(this)"> 원
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th>비고</th>
                <td colspan="2"><textarea name="sign_work_info" class="frm_textarea wd98p"><?php echo $fee["sign_work_info"] ?></textarea></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">명품플러스 입주<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="sign_subject">주</label></th>
                        <th scope="row"><label for="sign_subject">5일제</label></th>
                        <th scope="row"><label for="sign_subject">6일제</label></th>
                    </tr>
                    <?php
                    $sign_home_5d = explode("|",$fee["sign_home_5d"]);
                    $sign_home_6d = explode("|",$fee["sign_home_6d"]);
                    for($i=0;$i < count($sign_home_5d);$i++) {
                        ?>
                        <tr>
                            <td class="adm_char_td"><?php echo $i+1 ?>주</td>
                            <td>
                                <input type="text" name="sign_home_5d[]" value="<?php echo $sign_home_5d[$i] ?>"
                                       id="sign_work_5d" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="sign_home_6d[]" value="<?php echo $sign_home_6d[$i] ?>"
                                       id="sing_work_6d" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>비고</th>
                        <td colspan="2"><textarea name="sign_home_info" class="frm_textarea wd98p"><?php echo $fee["sign_home_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
       <div class="tbl_frm01_1 tbl_wrap fee_div floatR adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">모유수유클리닉 방문<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="sign_subject"></label></th>
                        <th scope="row"><label for="sign_subject">요금</label></th>
                        <th scope="row"><label for="sign_subject">기타</label></th>
                    </tr>
                        <tr>
                            <td class="adm_char_td">1회방문</td>
                            <td>
                                <input type="text" name="milk_work_fee" value="<?php echo $fee["milk_work_fee"] ?>"
                                       id="milk_work_fee" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="milk_work_etc" value="<?php echo $fee["milk_work_etc"] ?>"
                                       id="milk_work_etc" class="frm_input num_input" size="15"
                                       >
                            </td>
                        </tr>

                    <tr>
                        <th>비고</th>
                        <td colspan="3"><textarea name="milk_work_info" class="frm_textarea wd98p"><?php echo $fee["milk_work_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
           <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">모유수유 가정방문<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="sign_subject"></label></th>
                        <th scope="row"><label for="sign_subject">요금</label></th>
                        <th scope="row"><label for="sign_subject">기타</label></th>
                    </tr>
                        <tr>
                    <?php
                    $milk_home_fee = explode("|",$fee["milk_home_fee"]);

                        ?>
                            <td class="adm_char_td">1회방문</td>
                            <td>
                                <input type="text" name="milk_home_fee[]" value="<?php echo $milk_home_fee[0] ?>"
                                       id="milk_work_fee_1" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td rowspan="3">
                                <input type="text" name="milk_home_etc" value="<?php echo $fee["milk_home_etc"] ?>"
                                       id="milk_home_etc" class="frm_input num_input" size="15"
                                       >
                            </td>
                        </tr>
                        <tr>
                            <td class="adm_char_td">3회방문</td>
                            <td>
                                <input type="text" name="milk_home_fee[]" value="<?php echo $milk_home_fee[1] ?>"
                                       id="milk_work_fee_2" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <tr>
                            <td class="adm_char_td">5회방문</td>
                            <td>
                                <input type="text" name="milk_home_fee[]" value="<?php echo $milk_home_fee[2] ?>"
                                       id="milk_work_fee_3" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                    <tr>
                        <th>비고</th>
                        <td colspan="3"><textarea name="milk_home_info" class="frm_textarea wd98p"><?php echo $fee["milk_home_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>

    <div style='width:100%; height:1px; border-top:2px solid gray; clear:both; padding-bottom:80px;'></div>


    <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">시간 추가요금(1시간)<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="add_subject">비고</label></th>
                        <th scope="row"><label for="add_subject">추가요금</label></th>
                        <th scope="row"><label for="add_subject">쌍둥이</label></th>
                    </tr>
                    <?php
                    $names = array("알뜰형","일반형","베스트","프리미엄","명품플러스");
                    $add_left = explode("|",$fee["add_left"]);
                    $add_right = explode("|",$fee["add_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                        <tr>
                            <td class="adm_char_td"><?php echo $names[$i] ?></td>
                            <td>
                                <input type="text" name="add_left[]" value="<?php echo $add_left[$i] ?>"
                                       id="add_left" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="add_right[]" value="<?php echo $add_right[$i] ?>"
                                       id="add_right" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>비고</th>
                        <td colspan="2"><textarea name="add_info" class="frm_textarea wd98p"><?php echo $fee["add_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatR adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">쌍둥이 요금(1인1일)<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="twin_subject">비고</label></th>
                        <th scope="row"><label for="twin_subject">출퇴근형</label></th>
                        <th scope="row"><label for="twin_subject">입주형</label></th>
                    </tr>
                    <?php
                    $twin_left = explode("|",$fee["twin_left"]);
                    $twin_right = explode("|",$fee["twin_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                        <tr>
                            <td class="adm_char_td"><?php echo $names[$i] ?></td>
                            <td>
                                <input type="text" name="twin_left[]" value="<?php echo $twin_left[$i] ?>"
                                       id="twin_left" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="twin_right[]" value="<?php echo $twin_right[$i] ?>"
                                       id="twin_right" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>비고</th>
                        <td colspan="2"><textarea name="twin_info" class="frm_textarea wd98p"><?php echo $fee["twin_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatR adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">휴일,추가시간 요금(1일)<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="holi_subject">비고</label></th>
                        <th scope="row"><label for="holi_subject">출퇴근형</label></th>
                        <th scope="row"><label for="holi_subject">입주형</label></th>
                    </tr>
                    <?php
                    $holi_left = explode("|",$fee["holi_left"]);
                    $holi_right = explode("|",$fee["holi_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                        <tr>
                            <td class="adm_char_td"><?php echo $names[$i] ?></td>
                            <td>
                                <input type="text" name="holi_left[]" value="<?php echo $holi_left[$i] ?>"
                                       id="holi_left" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="holi_right[]" value="<?php echo $holi_right[$i] ?>"
                                       id="holi_right" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>비고</th>
                        <td colspan="2"><textarea name="holi_info" class="frm_textarea wd98p"><?php echo $fee["holi_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char">
        <table class="adm_char_table">
            <h2 class="adm_po">명절 추가요금(1일)<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="thax_subject">비고</label></th>
                        <th scope="row"><label for="thax_subject">출퇴근형</label></th>
                        <th scope="row"><label for="thax_subject">입주형</label></th>
                    </tr>
                    <?php
                    $thax_left = explode("|",$fee["thax_left"]);
                    $thax_right = explode("|",$fee["thax_right"]);
                    for($i=0;$i < count($names);$i++) {
                        ?>
                        <tr>
                            <td class="adm_char_td"><?php echo $names[$i] ?></td>
                            <td>
                                <input type="text" name="thax_left[]" value="<?php echo $thax_left[$i] ?>"
                                       id="thax_left" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="thax_right[]" value="<?php echo $thax_right[$i] ?>"
                                       id="thax_right" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>비고</th>
                        <td colspan="2"><textarea name="thax_info" class="frm_textarea wd98p"><?php echo $fee["thax_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
    <div class="tbl_frm01_1 tbl_wrap fee_div floatL adm_char" style='width:100%;'>
        <table class="adm_char_table">
            <h2 class="adm_po">기타가족(큰아이) 요금제<h2>
                    <colgroup>
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                        <col class="grid_4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="elem_subject">비고</label></th>
                        <th scope="row"><label for="elem_subject">출퇴근 (알뜰형)</label></th>
                        <th scope="row"><label for="elem_subject">출퇴근 (9시~18시)</label></th>
                        <th scope="row"><label for="elem_subject">입주형</label></th>
                    </tr>
                    <?php
                    $elem_name = array("미취학(상주)","어린이집/유치원","취학(초,중 고생)","성인가족(1인)");
                    $elem_left = explode("|",$fee["elem_left"]);
                    $elem_right = explode("|",$fee["elem_right"]);
                    $elem_mid = explode("|",$fee["elem_mid"]);
                    for($i=0;$i < count($elem_name);$i++) {

                        ?>
                        <tr>
                            <td class="adm_char_td"><?php echo $elem_name[$i] ?></td>
                            <td>
                                <input type="text" name="elem_left[]" value="<?php echo $elem_left[$i] ?>"
                                       id="elem_left" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                            <td>
                                <input type="text" name="elem_mid[]" value="<?php echo $elem_mid[$i] ?>"
                                       id="elem_mid" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>

                            <td>
                                <input type="text" name="elem_right[]" value="<?php echo $elem_right[$i] ?>"
                                       id="elem_right" class="frm_input num_input" size="15" maxlength="12"
                                       onkeyup="addComma(this)"> 원
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>비고</th>
                        <td colspan="3"><textarea name="elem_info" class="frm_textarea wd98p"><?php echo $fee["elem_info"] ?></textarea></td>
                    </tr>
                    </tbody>
        </table>
    </div>
    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="확인" class="btn_submit" accesskey='s'>
        <a href="./dr_member_list.php?member_type=<?php echo $member_type ?>">목록</a>
    </div>
</form>

<script>
function fmember_submit(f)
{
    return true;
}
function addComma(obj,fLen)
{
    if(event.keyCode == 37 || event.keyCode == 39 )
    {
        return;
    }
    var fLen = fLen || 2;
    var strValue = obj.value.replace(/,|\s+/g,'');
    var strBeforeValue = (strValue.indexOf('.') != -1)? strValue.substring(0,strValue.indexOf('.')) :strValue ;
    var strAfterValue  = (strValue.indexOf('.') != -1)? strValue.substr(strValue.indexOf('.'),fLen+1) : '' ;
    if(isNaN(strValue))
    {
        alert(strValue.concat(' -> 숫자가 아닙니다.'));
        return false;
    }
    var intLast =  strBeforeValue.length-1;
    var arrValue = new Array;
    var strComma = '';
    for(var i=intLast,j=0; i >= 0; i--,j++)
    {
        if( j !=0 && j%3 == 0)
        {
            strComma = ',';
        }
        else
        {
            strComma = '';
        }
        arrValue[arrValue.length] = strBeforeValue.charAt(i) + strComma  ;
    }
    obj.value=  arrValue.reverse().join('') +  strAfterValue;
}
</script>

<?php
include_once('./admin.tail.php');
?>
