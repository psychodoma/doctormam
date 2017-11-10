
<form name="fmember" id="fmember" action="./dr_member_form_update.php" onsubmit="return fmember_submit(this);" method="post" enctype="multipart/form-data">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="">
    <input type="hidden" name="member_type" value="<?php echo $member_type ?>">
    <input type="hidden" name="mb_open" value="1" id="mb_open_yes">
    <span style="display:none;"><?php echo get_member_level_select('mb_level', 1, $member['mb_level'], $member_type) ?></span>

    <div class="tbl_frm01 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?></caption>
            <colgroup>
                <col class="">
                <col>
            </colgroup>
            <tbody>

            <tr>
                <th scope="row"><label for="mb_id">아이디<?php echo $sound_only ?></label></th>
                <td>
                    <input type="text" name="mb_id" value="<?php echo $mb['mb_id'] ?>" id="mb_id" <?php echo $required_mb_id ?> class="frm_input <?php echo $required_mb_id_class ?>" size="15" minlength="3" maxlength="20">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_password">비밀번호<?php echo $sound_only ?></label></th>
                <td><input type="password" name="mb_password" id="mb_password" <?php echo $required_mb_password ?> class="frm_input <?php echo $required_mb_password ?>" size="15" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_name">대표자<strong class="sound_only">필수</strong></label></th>
                <td><input type="text" name="mb_name" value="<?php echo $mb['mb_name'] ?>" id="mb_name" required class="frm_input" size="15" minlength="2" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_branch">지사명<strong class="sound_only">필수</strong></label></th>
                <td><input type="text" name="mb_branch" value="<?php echo $mb['mb_branch'] ?>" id="mb_branch" required class="frm_input" size="15" minlength="2" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row" ><label for="mb_cover_area">담당지역</label></th>
                <td><input type="text" name="mb_cover_area" value="<?php echo $mb['mb_cover_area'] ?>" id="mb_cover_area" class="frm_input" size="30" minlength="2" maxlength="50"><label for="mb_cover_area" class="ml5">예) 강서구,양천구</label><br></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_email">E-mail</label></th>
                <td><input type="text" name="mb_email" value="<?php echo $mb['mb_email'] ?>" id="mb_email" maxlength="100" class="frm_input email" size="30"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_homepage">카카오톡아이디</label></th>
                <td><input type="text" name="mb_homepage" value="<?php echo $mb['mb_homepage'] ?>" id="mb_homepage" maxlength="100" class="frm_input" size="30"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_hp">휴대폰번호</label></th>
                <td>
                    <?php echo get_phone_select("mb_hp1",$mb_hp1,'required class="frm_input"') ?>-
                    <input type="text" name="mb_hp2" value="<?php echo $mb_hp2 ?>" id="mb_hp2" class="frm_input" size="5" maxlength="20">-
                    <input type="text" name="mb_hp3" value="<?php echo $mb_hp3 ?>" id="mb_hp3"  class="frm_input" size="5" maxlength="20">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_fax">팩스번호</label></th>
                <td>
                    <input type="text" name="mb_fax1" value="<?php echo $mb_fax1 ?>" id="mb_fax1" required class="frm_input" size="5" maxlength="20">-
                    <input type="text" name="mb_fax2" value="<?php echo $mb_fax2 ?>" id="mb_fax2" required class="frm_input" size="5" maxlength="20">-
                    <input type="text" name="mb_fax3" value="<?php echo $mb_fax3 ?>" id="mb_fax3" required class="frm_input" size="5" maxlength="20">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_tel">전화번호</label></th>
                <td>
                    <?php echo get_tel_select("mb_tel1",$mb_tel1,' class="frm_input"') ?>-
                    <input type="text" name="mb_tel2" value="<?php echo $mb_tel2 ?>" id="mb_tel2" required class="frm_input" size="5" maxlength="20">-
                    <input type="text" name="mb_tel3" value="<?php echo $mb_tel3 ?>" id="mb_tel3" required class="frm_input" size="5" maxlength="20">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_bank_name">은행명<strong class="sound_only">필수</strong></label></th>
                <td><input type="text" name="mb_bank_name" value="<?php echo $mb['mb_bank_name'] ?>" id="mb_bank_name" required class="frm_input" size="15" minlength="2" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_bank_account">계좌번호<strong class="sound_only">필수</strong></label></th>
                <td><input type="text" name="mb_bank_account" value="<?php echo $mb['mb_bank_account'] ?>" id="mb_bank_account" required class="frm_input" size="15" minlength="2" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_voucher">바우처</label></th>
                <td><input type="text" name="mb_voucher" value="<?php echo $mb['mb_voucher'] ?>" id="mb_voucher"  class="frm_input" size="35" minlength="2" maxlength="20"></td>
            </tr>
            <tr>
                <th scope="row">주소</th>
                <td class="td_addr_line">
                    <label for="mb_zip" class="sound_only">우편번호</label>
                    <input type="text" name="mb_zip" value="<?php echo $mb['mb_zip1'].$mb['mb_zip2']; ?>" id="mb_zip" class="frm_input readonly mb5" size="5" maxlength="6"> -
                    <button type="button" class="btn_frmline mb5" onclick="win_zip('fmember', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">주소 검색</button><br>
                    <input type="text" name="mb_addr1" value="<?php echo $mb['mb_addr1'] ?>" id="mb_addr1" class="frm_input readonly mb5" size="60">
                    <label for="mb_addr1">기본주소</label><br>
                    <input type="text" name="mb_addr2" value="<?php echo $mb['mb_addr2'] ?>" id="mb_addr2" class="frm_input" size="60">
                    <label for="mb_addr2">상세주소</label>
                    <input type="hidden" name="mb_addr3" value="<?php echo $mb['mb_addr3'] ?>" id="mb_addr3" class="frm_input" size="60">
                    <label for="mb_addr3" style="display:none;">참고항목</label>
                    <input type="hidden" name="mb_addr_jibeon" value="<?php echo $mb['mb_addr_jibeon']; ?>"><br>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_icon">대표이미지</label></th>
                <td>
					<ul class="adm_mam">
						<li class="mb5">
							<?php /*echo help('이미지 크기는 <strong>넓이 '.$config['cf_member_icon_width'].'픽셀 높이 '.$config['cf_member_icon_height'].'픽셀</strong>로 해주세요.') */?>
							<?php echo help('.jpg파일만 가능합니다.148X146 크기로 올려주세요') ?>
						</li>
						<li class="mb5">
							 <input type="file" name="mb_icon" id="mb_icon">
						</li>
							<?php
							$mb_dir = substr($mb['mb_id'],0,2);
							$icon_file = G5_DATA_PATH.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
							if (file_exists($icon_file)) {
								$icon_url = G5_DATA_URL.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
								echo '<li class="mb5"><img src="'.$icon_url.'" alt=""></li>';
								echo '<li><input type="checkbox" id="del_mb_icon" name="del_mb_icon" value="1">삭제</li>';
							}
							?>
					</ul>
					
					<!--
                    <?php /*echo help('이미지 크기는 <strong>넓이 '.$config['cf_member_icon_width'].'픽셀 높이 '.$config['cf_member_icon_height'].'픽셀</strong>로 해주세요.') */?>
                    <?php echo help('.jpg파일만 가능합니다.') ?>

                    <input type="file" name="mb_icon" id="mb_icon">

                    <?php
                    $mb_dir = substr($mb['mb_id'],0,2);
                    $icon_file = G5_DATA_PATH.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
                    if (file_exists($icon_file)) {
                        $icon_url = G5_DATA_URL.'/member/'.$mb_dir.'/'.$mb['mb_id'].'.jpg';
                        echo '<img src="'.$icon_url.'" alt="">';
                        echo '<input type="checkbox" id="del_mb_icon" name="del_mb_icon" value="1">삭제';
                    }
                    ?>
					-->
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="mb_memo">메모</label></th>
                <td><textarea name="mb_memo" id="mb_memo"><?php echo $mb['mb_memo'] ?></textarea></td>
            </tr>

            <?php if ($w == 'u') { ?>
                <tr>
                    <th scope="row">회원가입일</th>
                    <td><?php echo $mb['mb_datetime'] ?></td>
                </tr>
                <tr>
                    <th scope="row">최근접속일</th>
                    <td><?php echo $mb['mb_today_login'] ?></td>
                </tr>
                <tr>
                    <th scope="row">IP</th>
                    <td colspan="3"><?php echo $mb['mb_ip'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="확인" class="btn_submit" accesskey='s'>
        <a href="./dr_member_list.php?<?php echo $qstr ?>&member_type=<?php echo $member_type ?>">목록</a>
        <a href="./dr_fee_config.php?member_type=<?php echo $member_type ?>&mb_id=<?php echo $mb['mb_id'] ?>">요금 설정</a>
    </div>
</form>
