
<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    총<?php echo $member_name?>수 <?php echo number_format($total_count) ?>개
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
    <div class="search_form">
        <input type="hidden" name="member_type" value="<?php echo $member_type ?>">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl" class="adm_sel1">
            <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id"); ?>>아이디</option>
            <option value="mb_name"<?php echo get_selected($_GET['sfl'], "mb_name"); ?>>대표자</option>
            <option value="mb_tel"<?php echo get_selected($_GET['sfl'], "mb_tel"); ?>>전화번호</option>
            <option value="mb_datetime"<?php echo get_selected($_GET['sfl'], "mb_datetime"); ?>>가입일시</option>
            <option value="mb_ip"<?php echo get_selected($_GET['sfl'], "mb_ip"); ?>>IP</option>
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input" style="background:none !important;">
        <input type="submit" class="btn_submit" value="검색">
    </div>
</form>



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
                <th scope="col" id="mb_list_id"><?php echo subject_sort_link('mb_id','member_type='.$member_type) ?>아이디</a></th>
                <th scope="col" id="mb_list_name"><?php echo subject_sort_link('mb_name','member_type='.$member_type) ?>지사명</a></th>
                <th scope="col" id="mb_list_name"><?php echo subject_sort_link('mb_name','member_type='.$member_type) ?>대표자</a></th>
                <th scope="col" id="mb_list_tel">전화번호</th>
                <th scope="col" id="mb_list_lastcall"><?php echo subject_sort_link('mb_today_login', 'member_type='.$member_type, 'desc') ?>최종접속</a></th>
                <th scope="col" id="mb_list_join"><?php echo subject_sort_link('mb_datetime', 'member_type='.$member_type, 'desc') ?>가입일</a></th>
                <th scope="col" id="mb_list_auth">사업장주소</th>
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
                    <td headers="mb_list_id" class="td_name sv_use"><a href="./dr_member_form.php?<?php echo $qstr ?>&w=u&mb_id=<?php echo $row['mb_id']?>"><?php echo $mb_id ?><a></td>
                    <td headers="mb_list_branch" class="mb_branch"><a href="./dr_member_form.php?<?php echo $qstr ?>&w=u&mb_id=<?php echo $row['mb_id']?>"><?php echo get_text($row['mb_branch']); ?></a></td>
                    <td headers="mb_list_name" class="td_mbname"><a href="./dr_member_form.php?<?php echo $qstr ?>&w=u&mb_id=<?php echo $row['mb_id']?>"><?php echo get_text($row['mb_name']); ?></a></td>
                    <td headers="mb_list_tel" class="td_tel"><a href="./dr_member_form.php?<?php echo $qstr ?>&w=u&mb_id=<?php echo $row['mb_id']?>"><?php echo get_text($row['mb_tel']); ?></a></td>
                    <td headers="mb_list_lastcall" class="td_date"><a href="./dr_member_form.php?<?php echo $qstr ?>&w=u&mb_id=<?php echo $row['mb_id']?>"><?php echo substr($row['mb_today_login'],2,8); ?></a></td>
                    <td headers="mb_list_join" class="td_date"><a href="./dr_member_form.php?<?php echo $qstr ?>&w=u&mb_id=<?php echo $row['mb_id']?>"><?php echo substr($row['mb_datetime'],2,8); ?></a></td>
                    <td headers="mb_list_auth" class="td_mbstat"><a href="./dr_member_form.php?<?php echo $qstr ?>&w=u&mb_id=<?php echo $row['mb_id']?>">
                        <?php echo get_text($row['mb_addr1']); ?>
                        <?php echo get_text($row['mb_addr2']); ?></a>
                    </td>
                </tr>
                <?php
            }
            if ($i == 0)
                echo "<tr><td colspan=\"".$colspan."\" class=\"empty_table\">자료가 없습니다.</td></tr>";
            ?>
            </tbody>
        </table>
    </div>
	<div class="adm_btn">
		<div class="btn_list01 floatL">
			<!--<input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">-->
			<input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value">
		</div>
		<div class="btn_add01 floatR">
			<a href="./dr_member_form.php?member_type=<?php echo $member_type?>" id="member_add"><?php echo $member_name ?>추가</a>
		</div>
	</div>
</form>
<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&amp;page='); ?>