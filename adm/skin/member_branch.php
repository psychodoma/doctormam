
<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    총<?php echo $member_name?>수 <?php echo number_format($total_count) ?>명 중,
    <a href="?sst=mb_intercept_date&amp;sod=desc&amp;sfl=<?php echo $sfl ?>&amp;stx=<?php echo $stx ?>">차단 <?php echo number_format($intercept_count) ?></a>명,
    <a href="?sst=mb_leave_date&amp;sod=desc&amp;sfl=<?php echo $sfl ?>&amp;stx=<?php echo $stx ?>">탈퇴 <?php echo number_format($leave_count) ?></a>명
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
    <input type="hidden" name="member_type" value="<?php echo $member_type ?>">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id"); ?>>회원아이디</option>
        <option value="mb_nick"<?php echo get_selected($_GET['sfl'], "mb_nick"); ?>>닉네임</option>
        <option value="mb_name"<?php echo get_selected($_GET['sfl'], "mb_name"); ?>>이름</option>
        <option value="mb_email"<?php echo get_selected($_GET['sfl'], "mb_email"); ?>>E-MAIL</option>
        <option value="mb_tel"<?php echo get_selected($_GET['sfl'], "mb_tel"); ?>>전화번호</option>
        <option value="mb_hp"<?php echo get_selected($_GET['sfl'], "mb_hp"); ?>>휴대폰번호</option>
        <option value="mb_datetime"<?php echo get_selected($_GET['sfl'], "mb_datetime"); ?>>가입일시</option>
        <option value="mb_ip"<?php echo get_selected($_GET['sfl'], "mb_ip"); ?>>IP</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
    <input type="submit" class="btn_submit" value="검색">

</form>

<div class="local_desc01 local_desc">
    <p>
        회원자료 삭제 시 다른 회원이 기존 회원아이디를 사용하지 못하도록 회원아이디, 이름, 닉네임은 삭제하지 않고 영구 보관합니다.
    </p>
</div>


<div class="btn_add01 btn_add">
    <a href="./dr_member_form.php?member_type=<?php echo $member_type?>" id="member_add"><?php echo $member_name ?>추가</a>
</div>


<form name="fmemberlist" id="fmemberlist" action="./member_list_update.php" onsubmit="return fmemberlist_submit(this);" method="post">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="member_type" value="<?php echo $member_type ?>">
    <input type="hidden" name="token" value="">

    <div class="tbl_head02 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
            <tr>
                <th scope="col" id="mb_list_chk">
                    <label for="chkall" class="sound_only">회원 전체</label>
                    <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                </th>
                <?if($member_type!="7"){ ?>
                    <th scope="col" id="mb_list_branch"><?php echo subject_sort_link('branch') ?>지사</a></th>
                <?}?>
                <th scope="col" id="mb_list_id"><?php echo subject_sort_link('mb_id') ?>아이디</a></th>
                <th scope="col" id="mb_list_name"><?php echo subject_sort_link('mb_name') ?>이름</a></th>
                <?if($member_type!="7"){ ?>
                    <th scope="col" id="mb_list_nick"><?php echo subject_sort_link('mb_nick') ?>닉네임</a></th>
                <?}?>
                <?if($member_type!="7"){ ?>
                    <th scope="col" id="mb_list_mobile">휴대폰</th>
                <?}?>
                <th scope="col" id="mb_list_tel">전화번호</th>
                <th scope="col" id="mb_list_sms"><?php echo subject_sort_link('mb_sms', '', 'desc') ?>SMS<br>수신</a></th>
                <th scope="col" id="mb_list_lastcall"><?php echo subject_sort_link('mb_today_login', '', 'desc') ?>최종접속</a></th>
                <th scope="col" id="mb_list_join"><?php echo subject_sort_link('mb_datetime', '', 'desc') ?>가입일</a></th>
                <th scope="col" id="mb_list_auth">상태<?php echo subject_sort_link('mb_level', '', 'desc') ?></a></th>
                <th scope="col" id="mb_list_mng">관리</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i=0; $row=sql_fetch_array($result); $i++) {
                // 접근가능한 그룹수
                $sql2 = " select count(*) as cnt from {$g5['group_member_table']} where mb_id = '{$row['mb_id']}' ";
                $row2 = sql_fetch($sql2);
                $group = '';
                if ($row2['cnt'])
                    $group = '<a href="./boardgroupmember_form.php?mb_id='.$row['mb_id'].'">'.$row2['cnt'].'</a>';

                if ($is_admin == 'group') {
                    $s_mod = '';
                } else {
                    $s_mod = '<a href="./dr_member_form.php?'.$qstr.'&amp;w=u&amp;mb_id='.$row['mb_id'].'">수정</a>';
                }
                $s_grp = '<a href="./boardgroupmember_form.php?mb_id='.$row['mb_id'].'">그룹</a>';

                $leave_date = $row['mb_leave_date'] ? $row['mb_leave_date'] : date('Ymd', G5_SERVER_TIME);
                $intercept_date = $row['mb_intercept_date'] ? $row['mb_intercept_date'] : date('Ymd', G5_SERVER_TIME);

                $mb_nick = get_sideview($row['mb_id'], get_text($row['mb_nick']), $row['mb_email'], $row['mb_homepage']);

                $mb_id = $row['mb_id'];
                $leave_msg = '';
                $intercept_msg = '';
                $intercept_title = '';
                if ($row['mb_leave_date']) {
                    $mb_id = $mb_id;
                    $leave_msg = '<span class="mb_leave_msg">탈퇴함</span>';
                }
                else if ($row['mb_intercept_date']) {
                    $mb_id = $mb_id;
                    $intercept_msg = '<span class="mb_intercept_msg">차단됨</span>';
                    $intercept_title = '차단해제';
                }
                if ($intercept_title == '')
                    $intercept_title = '차단하기';

                $address = $row['mb_zip1'] ? print_address($row['mb_addr1'], $row['mb_addr2'], $row['mb_addr3'], $row['mb_addr_jibeon']) : '';

                $bg = 'bg'.($i%2);

                switch($row['mb_certify']) {
                    case 'hp':
                        $mb_certify_case = '휴대폰';
                        $mb_certify_val = 'hp';
                        break;
                    case 'ipin':
                        $mb_certify_case = '아이핀';
                        $mb_certify_val = '';
                        break;
                    case 'admin':
                        $mb_certify_case = '관리자';
                        $mb_certify_val = 'admin';
                        break;
                    default:
                        $mb_certify_case = '&nbsp;';
                        $mb_certify_val = 'admin';
                        break;
                }
                ?>

                <tr class="<?php echo $bg; ?>">
                    <td headers="mb_list_chk" class="td_chk">
                        <input type="hidden" name="mb_id[<?php echo $i ?>]" value="<?php echo $row['mb_id'] ?>" id="mb_id_<?php echo $i ?>">
                        <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo get_text($row['mb_name']); ?> <?php echo get_text($row['mb_nick']); ?>님</label>
                        <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
                    </td>
                    <?if($member_type!="7"){ ?>
                        <td headers="mb_list_branch" class="td_name sv_use"><?php echo ($row['branch']) ?></td>
                    <? } ?>
                    <td headers="mb_list_id" class="td_name sv_use"><?php echo $mb_id ?></td>
                    <td headers="mb_list_name" class="td_mbname"><?php echo get_text($row['mb_name']); ?></td>
                    <?if($member_type!="7"){ ?>
                        <td headers="mb_list_nick" class="td_name sv_use"><div><?php echo $mb_nick ?></div></td>
                    <? } ?>
                    <?if($member_type!="7"){ ?>
                        <td headers="mb_list_mobile" class="td_tel"><?php echo get_text($row['mb_hp']); ?></td>
                    <? } ?>
                    <td headers="mb_list_tel" class="td_tel"><?php echo get_text($row['mb_tel']); ?></td>
                    <td headers="mb_list_sms" class="td_chk"><input type="checkbox" name="mb_sms[<?php echo $i; ?>]" <?php echo $row['mb_sms']?'checked':''; ?> value="1" id="mb_sms_<?php echo $i; ?>"></td>
                    <td headers="mb_list_lastcall" class="td_date"><?php echo substr($row['mb_today_login'],2,8); ?></td>
                    <td headers="mb_list_join" class="td_date"><?php echo substr($row['mb_datetime'],2,8); ?></td>
                    <td headers="mb_list_auth" class="td_mbstat">
                        <?php
                        if ($leave_msg || $intercept_msg) echo $leave_msg.' '.$intercept_msg;
                        else echo "정상";
                        ?>
                        <?php /*echo get_member_level_select("mb_level[$i]", 1, $member['mb_level'], $row['mb_level']) */?>
                    </td>
                    <td headers="mb_list_mng"  class="td_mngsmall"><?php echo $s_mod ?></td>
                </tr>
                <?php
            }
            if ($i == 0)
                echo "<tr><td colspan=\"".$colspan."\" class=\"empty_table\">자료가 없습니다.</td></tr>";
            ?>
            </tbody>
        </table>
    </div>

    <div class="btn_list01 btn_list">
        <!--<input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">-->
        <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value">
    </div>

</form>
<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&amp;page='); ?>