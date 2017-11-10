<?php
$sub_menu = "200100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

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
include_once('./admin.head.php');

$sql = " select *,(select mb_branch from g5_member b where a.mb_branch=b.mb_no) as branch_name  {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";

$result = sql_query($sql);
$qstr .= "&member_type=".$member_type;
$colspan = 16;
if($member_type == "3"){
    include_once('./skin/member/customer.php');
}else if($member_type == "5"){
    include_once('./skin/member/manager.php');
}else if($member_type == "7"){
    include_once('./skin/member/branch.php');
}
?>
<script>
function fmemberlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}
</script>

<?php
include_once ('./admin.tail.php');
?>
