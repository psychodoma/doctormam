<?php
header( "Content-type: application/vnd.ms-excel" );
header( "Content-type: application/vnd.ms-excel; charset=utf-8");  
header( "Content-Disposition: attachment; filename = member_list.xls" );
header( "Content-Description: PHP4 Generated Data" );
echo "<meta content=\"application/vnd.ms-excel; charset=UTF-8\" name=\"Content-type\"> ";
?>
<?php
include_once('./_common.php');
$member_type = $_REQUEST["member_type"];

if($member_type == "7"){
    $member_name = "지사";
}else if($member_type == "5"){
    $member_name = "관리사";
}else if($member_type == "3"){
    $member_name = "고객";
}
$sql_common = " from {$g5['member_table']} a ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_point' :
            $sql_search .= " ({$sfl} >= '{$stx}') ";
            break;
        case 'mb_level' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        case 'mb_tel' :
        case 'mb_hp' :
            $sql_search .= " ({$sfl} like '%{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}
if(!empty($_REQUEST["mb_grade"])){
    $sql_search .= " and mb_grade = '{$_REQUEST["mb_grade"]}' ";
}
if(!empty($_REQUEST["mb_branch"])){
    $sql_search .= " and mb_branch = '{$_REQUEST["mb_branch"]}' ";
}
if($member["mb_level"] < 9){
    $sql_search .= " and mb_branch = '". $member["mb_no"]."' ";
}
    $sql_search .= " and mb_level = '{$member_type}' ";

if (!$sst) {
    $sst = "mb_datetime";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

// 탈퇴회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_leave_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$leave_count = $row['cnt'];

// 차단회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_intercept_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$intercept_count = $row['cnt'];

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'?member_type='.$member_type.'" class="ov_listall">전체목록</a>';

$g5['title'] = $member_name.'관리';

$sql = " select *,(select mb_branch from g5_member b where a.mb_branch=b.mb_no) as branch_name  {$sql_common} {$sql_search} {$sql_order}";

$result = sql_query($sql);
$qstr .= "&member_type=".$member_type;
$colspan = 16;
if($member_type == "3"){
?>
    <html>
    <head></head><body>
    <div class="tbl_head02 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
            <tr>
                <th scope="col" id="mb_list_branch">지사</th>
                <th scope="col" id="mb_list_name">이름</th>
                <th scope="col" id="mb_list_mobile">휴대폰</th>
                <th scope="col" id="mb_list_tel">전화번호</th>
                <th scope="col" id="mb_list_tel">이메일</th>
                <th scope="col" id="mb_list_tel">생년월일</th>
                <th scope="col" id="mb_list_tel">주소</th>
                <th scope="col" id="mb_list_join">가입일</th>
                <th scope="col" id="mb_list_ip">아이피</th>
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
                    <td headers="mb_list_branch" class="td_name sv_use"><?php echo ($row['branch_name']) ?></td>
                    <td headers="mb_list_name" class="td_mbname"><?php echo get_text($row['mb_name']); ?></a></td>
                    <td headers="mb_list_mobile" class="td_tel"><?php echo get_text($row['mb_hp']); ?></td>
                    <td headers="mb_list_tel" class="td_tel"><?php echo get_text($row['mb_tel']); ?></td>
                    <td headers="mb_list_tel" class="td_tel"><?php echo get_text($row['mb_email']); ?></td>
                    <td headers="mb_list_tel" class="td_tel"><?php echo get_text($row['mb_birth']); ?></td>
                    <td headers="mb_list_tel" class="td_tel"><?php echo get_text($row['mb_zip1']); ?><?php echo get_text($row['mb_zip2']); ?><?php echo get_text($row['mb_addr1']); ?><?php echo get_text($row['mb_addr2']); ?><?php echo get_text($row['mb_addr3']); ?></td>
                    <td headers="mb_list_join" class="td_date"><?php echo substr($row['mb_datetime'],2,8); ?></td>
                    <td headers="mb_list_ip" class="td_tel"><?php echo get_text($row['mb_ip']); ?></td>
                </tr>
                <?php
            }
            if ($i == 0)
                echo "<tr><td colspan=\"".$colspan."\" class=\"empty_table\">자료가 없습니다.</td></tr>";
            ?>
            </tbody>
        </table>
    </div>
    </body>
    </html>
<?php
}else if($member_type == "5") { ?>
    <html>
    <head></head>
    <body>
    <div class="tbl_head02 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
            <tr>
                <th scope="col" id="mb_list_branch">지사</th>
                <th scope="col" id="mb_list_grade">등급</th>
                <th scope="col" id="mb_list_name">이름</th>
                <th scope="col" id="mb_list_address">주소</th>
                <th scope="col" id="mb_list_mobile" style="width:110px;">휴대폰</th>
                <th scope="col" id="mb_list_date">가입일</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $row = sql_fetch_array($result); $i++) {
                // 접근가능한 그룹수
                $sql2 = " select count(*) as cnt from {$g5['group_member_table']} where mb_id = '{$row['mb_id']}' ";
                $row2 = sql_fetch($sql2);
                $group = '';
                if ($row2['cnt'])
                    $group = '<a href="./boardgroupmember_form.php?mb_id=' . $row['mb_id'] . '">' . $row2['cnt'] . '</a>';

                if ($is_admin == 'group') {
                    $s_mod = '';
                } else {
                    $s_mod = '<a href="./dr_member_form.php?' . $qstr . '&amp;w=u&amp;mb_id=' . $row['mb_id'] . '">수정</a>';
                }
                $s_grp = '<a href="./boardgroupmember_form.php?mb_id=' . $row['mb_id'] . '">그룹</a>';

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
                } else if ($row['mb_intercept_date']) {
                    $mb_id = $mb_id;
                    $intercept_msg = '<span class="mb_intercept_msg">차단됨</span>';
                    $intercept_title = '차단해제';
                }
                if ($intercept_title == '')
                    $intercept_title = '차단하기';

                $address = $row['mb_zip1'] ? print_address($row['mb_addr1'], $row['mb_addr2'], $row['mb_addr3'], $row['mb_addr_jibeon']) : '';

                $bg = 'bg' . ($i % 2);

                switch ($row['mb_certify']) {
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
                    <td headers="mb_list_branch" class="td_tel"><?php echo($row['branch_name']) ?></td>
                    <td headers="mb_list_branch" class="td_tel sv_use"><?php echo($row['mb_grade']) ?></td>
                    <td headers="mb_list_name" class="td_tel"><?php echo get_text($row['mb_name']); ?></td>
                    <td headers="mb_list_tel" class="td_addr"> <?php echo get_text($row['mb_addr1']); ?>
                        <?php echo get_text($row['mb_addr2']); ?></td>
                    <td headers="mb_list_mobile" class="td_tel"><?php echo get_text($row['mb_hp']); ?></td>

                    <td headers="mb_list_join" class="td_date"><?php echo substr($row['mb_datetime'], 2, 8); ?></td>
                </tr>
                <?php
            }
            if ($i == 0)
                echo "<tr><td colspan=\"" . $colspan . "\" class=\"empty_table\">자료가 없습니다.</td></tr>";
            ?>
            </tbody>
        </table>
    </div>
    </html>
    <?php
    }else if($member_type == "7"){
    include_once('./skin/member/branch.php');
}
?>


