<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/naver_syndi.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

$g5['title'] = '�Խñ� ����';

$msg = array();

if($board['bo_use_category']) {
    $ca_name = trim($_POST['ca_name']);
    if(!$ca_name) {
        $msg[] = '<strong>�з�</strong>�� �����ϼ���.';
    } else {
        $categories = array_map('trim', explode("|", $board['bo_category_list'].($is_admin ? '|����' : '')));
        if(!empty($categories) && !in_array($ca_name, $categories))
            $msg[] = '�з��� �ùٸ��� �Է��ϼ���.';

        if(empty($categories))
            $ca_name = '';
    }
} else {
    $ca_name = '';
}

$wr_subject_ck = '';
if (isset($_POST['wr_subject_ck'])) {
    $wr_subject_ck = substr(trim($_POST['wr_subject_ck']),0,255);
    $wr_subject_ck = preg_replace("#[\\\]+$#", "", $wr_subject_ck);
}
if ($wr_subject_ck == '') {
    $msg[] = '<strong>����</strong>�� �Է��ϼ���.';
}

$wr_content = '';
if (isset($_POST['wr_content'])) {
    $wr_content = substr(trim($_POST['wr_content']),0,65536);
    $wr_content = preg_replace("#[\\\]+$#", "", $wr_content);
}
if ($wr_content == '') {
    $msg[] = '<strong>����</strong>�� �Է��ϼ���.';
}

$wr_link1 = '';
if (isset($_POST['wr_link1'])) {
    $wr_link1 = substr($_POST['wr_link1'],0,1000);
    $wr_link1 = trim(strip_tags($wr_link1));
    $wr_link1 = preg_replace("#[\\\]+$#", "", $wr_link1);
}

$wr_link2 = '';
if (isset($_POST['wr_link2'])) {
    $wr_link2 = substr($_POST['wr_link2'],0,1000);
    $wr_link2 = trim(strip_tags($wr_link2));
    $wr_link2 = preg_replace("#[\\\]+$#", "", $wr_link2);
}

$msg = implode('<br>', $msg);
if ($msg) {
    alert($msg);
}

// 090710
if (substr_count($wr_content, '&#') > 50) {
    alert('���뿡 �ùٸ��� ���� �ڵ尡 �ټ� ���ԵǾ� �ֽ��ϴ�.');
    exit;
}

$upload_max_filesize = ini_get('upload_max_filesize');

if (empty($_POST)) {
    alert("���� �Ǵ� �۳����� ũ�Ⱑ �������� ������ ���� �Ѿ� ������ �߻��Ͽ����ϴ�.\\npost_max_size=".ini_get('post_max_size')." , upload_max_filesize=".$upload_max_filesize."\\n�Խ��ǰ����� �Ǵ� ���������ڿ��� ���� �ٶ��ϴ�.");
}

$notice_array = explode(",", $board['bo_notice']);

if ($w == 'u' || $w == 'r') {
    $wr = get_write($write_table, $wr_id);
    if (!$wr['wr_id']) {
        alert("���� �������� �ʽ��ϴ�.\\n���� �����Ǿ��ų� �̵��Ͽ��� �� �ֽ��ϴ�.");
    }
}

// �ܺο��� ���� ����� �� �ִ� ���װ� �����ϹǷ� ��б��� ����� ��쿡�� �����ؾ� ��
if (!$is_admin && !$board['bo_use_secret'] && (stripos($_POST['html'], 'secret') !== false || stripos($_POST['secret'], 'secret') !== false || stripos($_POST['mail'], 'secret') !== false)) {
	alert('��б� �̻�� �Խ��� �̹Ƿ� ��б۷� ����� �� �����ϴ�.');
}

$secret = '';
if (isset($_POST['secret']) && $_POST['secret']) {
    if(preg_match('#secret#', strtolower($_POST['secret']), $matches))
        $secret = $matches[0];
}

// �ܺο��� ���� ����� �� �ִ� ���װ� �����ϹǷ� ��б� ������ ����϶��� �����ڸ� ����(����)�ϰ� ������ ��б۷� ���
if (!$is_admin && $board['bo_use_secret'] == 2) {
    $secret = 'secret';
}

$html = '';
if (isset($_POST['html']) && $_POST['html']) {
    if(preg_match('#html(1|2)#', strtolower($_POST['html']), $matches))
        $html = $matches[0];
}

$mail = '';
if (isset($_POST['mail']) && $_POST['mail']) {
    if(preg_match('#mail#', strtolower($_POST['mail']), $matches))
        $mail = $matches[0];
}

$notice = '';
if (isset($_POST['notice']) && $_POST['notice']) {
    $notice = $_POST['notice'];
}

for ($i=1; $i<=10; $i++) {
    $var = "wr_$i";
    $$var = "";
    if (isset($_POST['wr_'.$i]) && settype($_POST['wr_'.$i], 'string')) {
        $$var = trim($_POST['wr_'.$i]);
    }
}

@include_once($board_skin_path.'/write_update.head.skin.php');

if ($w == '' || $w == 'u') {

    // �輱�� 1.00 : �۾��� ���Ѱ� ������ ������ ó���Ǿ�� ��
    if($w =='u' && $member['mb_id'] && $wr['mb_id'] == $member['mb_id']) {
        ;
    } else if ($member['mb_level'] < $board['bo_write_level']) {
        alert('���� �� ������ �����ϴ�.');
    }

	// �ܺο��� ���� ����� �� �ִ� ���װ� �����ϹǷ� ������ �����ڸ� ����� �����ؾ� ��
	if (!$is_admin && $notice) {
		alert('�����ڸ� ������ �� �ֽ��ϴ�.');
    }

} else if ($w == 'r') {

    if (in_array((int)$wr_id, $notice_array)) {
        alert('�������� �亯 �� �� �����ϴ�.');
    }

    if ($member['mb_level'] < $board['bo_reply_level']) {
        alert('���� �亯�� ������ �����ϴ�.');
    }

    // �Խñ� �迭 ����
    $reply_array = &$wr;

    // �ִ� �亯�� ���̺� ��Ƴ��� wr_reply �����ŭ�� �����մϴ�.
    if (strlen($reply_array['wr_reply']) == 10) {
        alert("�� �̻� �亯�Ͻ� �� �����ϴ�.\\n�亯�� 10�ܰ� ������ �����մϴ�.");
    }

    $reply_len = strlen($reply_array['wr_reply']) + 1;
    if ($board['bo_reply_order']) {
        $begin_reply_char = 'A';
        $end_reply_char = 'Z';
        $reply_number = +1;
        $sql = " select MAX(SUBSTRING(wr_reply, $reply_len, 1)) as reply from {$write_table} where wr_num = '{$reply_array['wr_num']}' and SUBSTRING(wr_reply, {$reply_len}, 1) <> '' ";
    } else {
        $begin_reply_char = 'Z';
        $end_reply_char = 'A';
        $reply_number = -1;
        $sql = " select MIN(SUBSTRING(wr_reply, {$reply_len}, 1)) as reply from {$write_table} where wr_num = '{$reply_array['wr_num']}' and SUBSTRING(wr_reply, {$reply_len}, 1) <> '' ";
    }
    if ($reply_array['wr_reply']) $sql .= " and wr_reply like '{$reply_array['wr_reply']}%' ";
    $row = sql_fetch($sql);

    if (!$row['reply']) {
        $reply_char = $begin_reply_char;
    } else if ($row['reply'] == $end_reply_char) { // A~Z�� 26 �Դϴ�.
        alert("�� �̻� �亯�Ͻ� �� �����ϴ�.\\n�亯�� 26�� ������ �����մϴ�.");
    } else {
        $reply_char = chr(ord($row['reply']) + $reply_number);
    }

    $reply = $reply_array['wr_reply'] . $reply_char;

} else {
    alert('w ���� ����� �Ѿ���� �ʾҽ��ϴ�.');
}

if ($is_guest && !chk_captcha()) {
    alert('�ڵ���Ϲ��� ���ڰ� Ʋ�Ƚ��ϴ�.');
}

if ($w == '' || $w == 'r') {
    if (isset($_SESSION['ss_datetime'])) {
        if ($_SESSION['ss_datetime'] >= (G5_SERVER_TIME - $config['cf_delay_sec']) && !$is_admin)
            alert('�ʹ� ���� �ð����� �Խù��� �����ؼ� �ø� �� �����ϴ�.');
    }

    set_session("ss_datetime", G5_SERVER_TIME);
}

if (!isset($_POST['wr_subject_ck']) || !trim($_POST['wr_subject_ck']))
    alert('������ �Է��Ͽ� �ֽʽÿ�.');

if ($w == '' || $w == 'r') {

    if ($member['mb_id']) {
        $mb_id = $member['mb_id'];
        $wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
        $wr_password = $member['mb_password'];
        $wr_email = addslashes($member['mb_email']);
        $wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
    } else {
        $mb_id = '';
        // ��ȸ���� ��� �̸��� �����Ǵ� ��찡 ����
        $wr_name = clean_xss_tags(trim($_POST['wr_name']));
        if (!$wr_name)
            alert('�̸��� ���� �Է��ϼž� �մϴ�.');
        $wr_password = get_encrypt_string($wr_password);
        $wr_email = get_email_address(trim($_POST['wr_email']));
        $wr_homepage = clean_xss_tags($wr_homepage);
    }

    if ($w == 'r') {
        // �亯�� ������ ��б��̶�� ��й�ȣ�� ���۰� �����ϰ� �ִ´�.
        if ($secret)
            $wr_password = $wr['wr_password'];

        $wr_id = $wr_id . $reply;
        $wr_num = $write['wr_num'];
        $wr_reply = $reply;
    } else {
        $wr_num = get_next_num($write_table);
        $wr_reply = '';
    }

    $sql = " insert into $write_table
                set wr_num = '$wr_num',
                     wr_reply = '$wr_reply',
                     wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_option = '$html,$secret,$mail',
                     wr_subject_ck = '$wr_subject_ck',
                     wr_content = '$wr_content',
                     wr_link1 = '$wr_link1',
                     wr_link2 = '$wr_link2',
                     wr_link1_hit = 0,
                     wr_link2_hit = 0,
                     wr_hit = 0,
                     wr_good = 0,
                     wr_nogood = 0,
                     mb_id = '{$member['mb_id']}',
                     wr_password = '$wr_password',
                     wr_name = '$wr_name',
                     wr_email = '$wr_email',
                     wr_homepage = '$wr_homepage',
					 branch = '$wr_branch',
                     wr_datetime = '".G5_TIME_YMDHIS."',
                     wr_last = '".G5_TIME_YMDHIS."',
                     wr_ip = '{$_SERVER['REMOTE_ADDR']}',
                     wr_1 = '$wr_1',
                     wr_2 = '$wr_2',
                     wr_3 = '$wr_3',
                     wr_4 = '$wr_4',
                     wr_5 = '$wr_5',
                     wr_6 = '$wr_6',
                     wr_7 = '$wr_7',
                     wr_8 = '$wr_8',
                     wr_9 = '$wr_9',
                     wr_10 = '$wr_10' ";
    sql_query($sql);

    $wr_id = sql_insert_id();

    // �θ� ���̵� UPDATE
    sql_query(" update $write_table set wr_parent = '$wr_id' where wr_id = '$wr_id' ");

    // ���� INSERT
    sql_query(" insert into {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '{$bo_table}', '{$wr_id}', '{$wr_id}', '".G5_TIME_YMDHIS."', '{$member['mb_id']}' ) ");

    // �Խñ� 1 ����
    sql_query("update {$g5['board_table']} set bo_count_write = bo_count_write + 1 where bo_table = '{$bo_table}'");

    // ���� ����Ʈ �ο�
    if ($w == '') {
        if ($notice) {
            $bo_notice = $wr_id.($board['bo_notice'] ? ",".$board['bo_notice'] : '');
            sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
        }

        insert_point($member['mb_id'], $board['bo_write_point'], "{$board['bo_subject']} {$wr_id} �۾���", $bo_table, $wr_id, '����');
    } else {
        // �亯�� �ڸ�Ʈ ����Ʈ�� �ο���
        // �亯 ����Ʈ�� ���� ��� �ڸ�Ʈ ��� �亯�� �ϴ� ��찡 ����
        insert_point($member['mb_id'], $board['bo_comment_point'], "{$board['bo_subject']} {$wr_id} �۴亯", $bo_table, $wr_id, '����');
    }
}  else if ($w == 'u') {
    if (get_session('ss_bo_table') != $_POST['bo_table'] || get_session('ss_wr_id') != $_POST['wr_id']) {
        alert('�ùٸ� ������� �����Ͽ� �ֽʽÿ�.', G5_BBS_URL.'/board.php?bo_table='.$bo_table);
    }

    $return_url = './board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id;

    if ($is_admin == 'super') // �ְ������ ���
        ;
    else if ($is_admin == 'group') { // �׷������
        $mb = get_member($write['mb_id']);
        if ($member['mb_id'] != $group['gr_admin']) // �ڽ��� �����ϴ� �׷��ΰ�?
            alert('�ڽ��� �����ϴ� �׷��� �Խ����� �ƴϹǷ� ������ �� �����ϴ�.', $return_url);
        else if ($member['mb_level'] < $mb['mb_level']) // �ڽ��� ������ ũ�ų� ���ٸ� ���
            alert('�ڽ��� ���Ѻ��� ���� ������ ȸ���� �ۼ��� ���� ������ �� �����ϴ�.', $return_url);
    } else if ($is_admin == 'board') { // �Խ��ǰ������̸�
        $mb = get_member($write['mb_id']);
        if ($member['mb_id'] != $board['bo_admin']) // �ڽ��� �����ϴ� �Խ����ΰ�?
            alert('�ڽ��� �����ϴ� �Խ����� �ƴϹǷ� ������ �� �����ϴ�.', $return_url);
        else if ($member['mb_level'] < $mb['mb_level']) // �ڽ��� ������ ũ�ų� ���ٸ� ���
            alert('�ڽ��� ���Ѻ��� ���� ������ ȸ���� �ۼ��� ���� ������ �� �����ϴ�.', $return_url);
    } else if ($member['mb_id']) {
        if ($member['mb_id'] != $write['mb_id'])
            alert('�ڽ��� ���� �ƴϹǷ� ������ �� �����ϴ�.', $return_url);
    } else {
        if ($write['mb_id'])
            alert('�α��� �� �����ϼ���.', './login.php?url='.urlencode($return_url));
    }

    if ($member['mb_id']) {
        // �ڽ��� ���̶��
        if ($member['mb_id'] == $wr['mb_id']) {
            $mb_id = $member['mb_id'];
            $wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
            $wr_email = addslashes($member['mb_email']);
            $wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
        } else {
            $mb_id = $wr['mb_id'];
            if(isset($_POST['wr_name']) && $_POST['wr_name'])
                $wr_name = clean_xss_tags(trim($_POST['wr_name']));
            else
                $wr_name = addslashes(clean_xss_tags($wr['wr_name']));
            if(isset($_POST['wr_email']) && $_POST['wr_email'])
                $wr_email = get_email_address(trim($_POST['wr_email']));
            else
                $wr_email = addslashes($wr['wr_email']);
            if(isset($_POST['wr_homepage']) && $_POST['wr_homepage'])
                $wr_homepage = addslashes(clean_xss_tags($_POST['wr_homepage']));
            else
                $wr_homepage = addslashes(clean_xss_tags($wr['wr_homepage']));
        }
    } else {
        $mb_id = "";
        // ��ȸ���� ��� �̸��� �����Ǵ� ��찡 ����
        if (!trim($wr_name)) alert("�̸��� ���� �Է��ϼž� �մϴ�.");
        $wr_name = clean_xss_tags(trim($_POST['wr_name']));
        $wr_email = get_email_address(trim($_POST['wr_email']));
    }

    $sql_password = $wr_password ? " , wr_password = '".get_encrypt_string($wr_password)."' " : "";

    $sql_ip = '';
    if (!$is_admin)
        $sql_ip = " , wr_ip = '{$_SERVER['REMOTE_ADDR']}' ";

    $sql = " update {$write_table}
                set ca_name = '{$ca_name}',
                     wr_option = '{$html},{$secret},{$mail}',
                     wr_subject_ck = '{$wr_subject_ck}',
                     wr_content = '{$wr_content}',
                     wr_link1 = '{$wr_link1}',
                     wr_link2 = '{$wr_link2}',
                     mb_id = '{$mb_id}',
                     wr_name = '{$wr_name}',
                     wr_email = '{$wr_email}',
                     wr_homepage = '{$wr_homepage}',
					 branch = '$wr_branch',
                     wr_1 = '{$wr_1}',
                     wr_2 = '{$wr_2}',
                     wr_3 = '{$wr_3}',
                     wr_4 = '{$wr_4}',
                     wr_5 = '{$wr_5}',
                     wr_6 = '{$wr_6}',
                     wr_7 = '{$wr_7}',
                     wr_8 = '{$wr_8}',
                     wr_9 = '{$wr_9}',
                     wr_10= '{$wr_10}'
                     {$sql_ip}
                     {$sql_password}
              where wr_id = '{$wr['wr_id']}' ";
    sql_query($sql);

    // �з��� �����Ǵ� ��� �ش�Ǵ� �ڸ�Ʈ�� �з��� ��� ������
    // �ڸ�Ʈ�� �з��� �������� ������ �˻��� ����� ���� ����
    $sql = " update {$write_table} set ca_name = '{$ca_name}' where wr_parent = '{$wr['wr_id']}' ";
    sql_query($sql);

    /*
    if ($notice) {
        //if (!preg_match("/[^0-9]{0,1}{$wr_id}[\r]{0,1}/",$board['bo_notice']))
        if (!in_array((int)$wr_id, $notice_array)) {
            $bo_notice = $wr_id . ',' . $board['bo_notice'];
            sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
        }
    } else {
        $bo_notice = '';
        for ($i=0; $i<count($notice_array); $i++)
            if ((int)$wr_id != (int)$notice_array[$i])
                $bo_notice .= $notice_array[$i] . ',';
        $bo_notice = trim($bo_notice);
        //$bo_notice = preg_replace("/^".$wr_id."[\n]?$/m", "", $board['bo_notice']);
        sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
    }
    */

    $bo_notice = board_notice($board['bo_notice'], $wr_id, $notice);
    sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
}

// �Խ��Ǳ׷����ٻ���� ���� �ʾƾ� �ϰ� ��ȸ�� ���бⰡ �����ؾ� �ϸ� ��б��� �ƴϾ�� �մϴ�.
if (!$group['gr_use_access'] && $board['bo_read_level'] < 2 && !$secret) {
    naver_syndi_ping($bo_table, $wr_id);
}

// ���ϰ��� üũ
$file_count   = 0;
$upload_count = count($_FILES['bf_file']['name']);

for ($i=0; $i<$upload_count; $i++) {
    if($_FILES['bf_file']['name'][$i] && is_uploaded_file($_FILES['bf_file']['tmp_name'][$i]))
        $file_count++;
}

if($w == 'u') {
    $file = get_file($bo_table, $wr_id);
    if($file_count && (int)$file['count'] > $board['bo_upload_count'])
        alert('���� ������ �����Ͻ� �� ÷�������� '.number_format($board['bo_upload_count']).'�� ���Ϸ� ���ε� ���ֽʽÿ�.');
} else {
    if($file_count > $board['bo_upload_count'])
        alert('÷�������� '.number_format($board['bo_upload_count']).'�� ���Ϸ� ���ε� ���ֽʽÿ�.');
}

// ���丮�� ���ٸ� �����մϴ�. (�۹̼ǵ� �����ϱ���.)
@mkdir(G5_DATA_PATH.'/file/'.$bo_table, G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH.'/file/'.$bo_table, G5_DIR_PERMISSION);

$chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));

// ���� ���� ���ε�
$file_upload_msg = '';
$upload = array();
for ($i=0; $i<count($_FILES['bf_file']['name']); $i++) {
    $upload[$i]['file']     = '';
    $upload[$i]['source']   = '';
    $upload[$i]['filesize'] = 0;
    $upload[$i]['image']    = array();
    $upload[$i]['image'][0] = '';
    $upload[$i]['image'][1] = '';
    $upload[$i]['image'][2] = '';

    // ������ üũ�� �Ǿ��ִٸ� ������ �����մϴ�.
    if (isset($_POST['bf_file_del'][$i]) && $_POST['bf_file_del'][$i]) {
        $upload[$i]['del_check'] = true;

        $row = sql_fetch(" select bf_file from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");
        @unlink(G5_DATA_PATH.'/file/'.$bo_table.'/'.$row['bf_file']);
        // ����ϻ���
        if(preg_match("/\.({$config['cf_image_extension']})$/i", $row['bf_file'])) {
            delete_board_thumbnail($bo_table, $row['bf_file']);
        }
    }
    else
        $upload[$i]['del_check'] = false;

    $tmp_file  = $_FILES['bf_file']['tmp_name'][$i];
    $filesize  = $_FILES['bf_file']['size'][$i];
    $filename  = $_FILES['bf_file']['name'][$i];
    $filename  = get_safe_filename($filename);

    // ������ ������ ������ ū������ ���ε� �Ѵٸ�
    if ($filename) {
        if ($_FILES['bf_file']['error'][$i] == 1) {
            $file_upload_msg .= '\"'.$filename.'\" ������ �뷮�� ������ ����('.$upload_max_filesize.')�� ������ ũ�Ƿ� ���ε� �� �� �����ϴ�.\\n';
            continue;
        }
        else if ($_FILES['bf_file']['error'][$i] != 0) {
            $file_upload_msg .= '\"'.$filename.'\" ������ ���������� ���ε� ���� �ʾҽ��ϴ�.\\n';
            continue;
        }
    }

    if (is_uploaded_file($tmp_file)) {
        // �����ڰ� �ƴϸ鼭 ������ ���ε� ������� ũ�ٸ� �ǳʶ�
        if (!$is_admin && $filesize > $board['bo_upload_size']) {
            $file_upload_msg .= '\"'.$filename.'\" ������ �뷮('.number_format($filesize).' ����Ʈ)�� �Խ��ǿ� ����('.number_format($board['bo_upload_size']).' ����Ʈ)�� ������ ũ�Ƿ� ���ε� ���� �ʽ��ϴ�.\\n';
            continue;
        }

        //=================================================================\
        // 090714
        // �̹����� �÷��� ���Ͽ� �Ǽ��ڵ带 �ɾ� ���ε� �ϴ� ��츦 ����
        // �����޼����� ������� �ʴ´�.
        //-----------------------------------------------------------------
        $timg = @getimagesize($tmp_file);
        // image type
        if ( preg_match("/\.({$config['cf_image_extension']})$/i", $filename) ||
             preg_match("/\.({$config['cf_flash_extension']})$/i", $filename) ) {
            if ($timg['2'] < 1 || $timg['2'] > 16)
                continue;
        }
        //=================================================================

        $upload[$i]['image'] = $timg;

        // 4.00.11 - �۴亯���� ���� ���ε�� ������ ������ �����Ǵ� ������ ����
        if ($w == 'u') {
            // �����ϴ� ������ �ִٸ� �����մϴ�.
            $row = sql_fetch(" select bf_file from {$g5['board_file_table']} where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$i' ");
            @unlink(G5_DATA_PATH.'/file/'.$bo_table.'/'.$row['bf_file']);
            // �̹��������̸� ����ϻ���
            if(preg_match("/\.({$config['cf_image_extension']})$/i", $row['bf_file'])) {
                delete_board_thumbnail($bo_table, $row['bf_file']);
            }
        }

        // ���α׷� ���� ���ϸ�
        $upload[$i]['source'] = $filename;
        $upload[$i]['filesize'] = $filesize;

        // �Ʒ��� ���ڿ��� �� ������ -x �� �ٿ��� ����θ� �˴��� ������ ���� ���ϵ��� ��
        $filename = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $filename);

        shuffle($chars_array);
        $shuffle = implode('', $chars_array);

        // ÷������ ÷�ν� ÷�����ϸ� ������ ���ԵǾ� ������ �Ϻ� PC���� ������ �ʰų� �ٿ�ε� ���� �ʴ� ������ �ֽ��ϴ�. (����� �� 090925)
        $upload[$i]['file'] = abs(ip2long($_SERVER['REMOTE_ADDR'])).'_'.substr($shuffle,0,8).'_'.replace_filename($filename);

        $dest_file = G5_DATA_PATH.'/file/'.$bo_table.'/'.$upload[$i]['file'];

        // ���ε尡 �ȵȴٸ� �����޼��� ����ϰ� �׾�����ϴ�.
        $error_code = move_uploaded_file($tmp_file, $dest_file) or die($_FILES['bf_file']['error'][$i]);

        // �ö� ������ �۹̼��� �����մϴ�.
        chmod($dest_file, G5_FILE_PERMISSION);
    }
}

// ���߿� ���̺� �����ϴ� ������ $wr_id ���� �����ؾ� �ϱ� �����Դϴ�.
for ($i=0; $i<count($upload); $i++)
{
    if (!get_magic_quotes_gpc()) {
        $upload[$i]['source'] = addslashes($upload[$i]['source']);
    }

    $row = sql_fetch(" select count(*) as cnt from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");
    if ($row['cnt'])
    {
        // ������ üũ�� �ְų� ������ �ִٸ� ������Ʈ�� �մϴ�.
        // �׷��� �ʴٸ� ���븸 ������Ʈ �մϴ�.
        if ($upload[$i]['del_check'] || $upload[$i]['file'])
        {
            $sql = " update {$g5['board_file_table']}
                        set bf_source = '{$upload[$i]['source']}',
                             bf_file = '{$upload[$i]['file']}',
                             bf_content = '{$bf_content[$i]}',
                             bf_filesize = '{$upload[$i]['filesize']}',
                             bf_width = '{$upload[$i]['image']['0']}',
                             bf_height = '{$upload[$i]['image']['1']}',
                             bf_type = '{$upload[$i]['image']['2']}',
                             bf_datetime = '".G5_TIME_YMDHIS."'
                      where bo_table = '{$bo_table}'
                                and wr_id = '{$wr_id}'
                                and bf_no = '{$i}' ";
            sql_query($sql);
        }
        else
        {
            $sql = " update {$g5['board_file_table']}
                        set bf_content = '{$bf_content[$i]}'
                        where bo_table = '{$bo_table}'
                                  and wr_id = '{$wr_id}'
                                  and bf_no = '{$i}' ";
            sql_query($sql);
        }
    }
    else
    {
        $sql = " insert into {$g5['board_file_table']}
                    set bo_table = '{$bo_table}',
                         wr_id = '{$wr_id}',
                         bf_no = '{$i}',
                         bf_source = '{$upload[$i]['source']}',
                         bf_file = '{$upload[$i]['file']}',
                         bf_content = '{$bf_content[$i]}',
                         bf_download = 0,
                         bf_filesize = '{$upload[$i]['filesize']}',
                         bf_width = '{$upload[$i]['image']['0']}',
                         bf_height = '{$upload[$i]['image']['1']}',
                         bf_type = '{$upload[$i]['image']['2']}',
                         bf_datetime = '".G5_TIME_YMDHIS."' ";
        sql_query($sql);
    }
}

// ���ε�� ���� ���뿡�� ���� ū ��ȣ�� ��� �Ųٷ� Ȯ���� ���鼭
// ���� ������ ���ٸ� ���̺��� ������ �����մϴ�.
$row = sql_fetch(" select max(bf_no) as max_bf_no from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ");
for ($i=(int)$row['max_bf_no']; $i>=0; $i--)
{
    $row2 = sql_fetch(" select bf_file from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");

    // ������ �ִٸ� �����ϴ�.
    if ($row2['bf_file']) break;

    // �׷��� �ʴٸ� ������ �����մϴ�.
    sql_query(" delete from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");
}

// ������ ������ �Խù��� ������Ʈ �Ѵ�.
$row = sql_fetch(" select count(*) as cnt from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ");
sql_query(" update {$write_table} set wr_file = '{$row['cnt']}' where wr_id = '{$wr_id}' ");

// �ڵ������ ���ڵ带 �����Ѵ�.
sql_query(" delete from {$g5['autosave_table']} where as_uid = '{$uid}' ");
//------------------------------------------------------------------------------

// ��б��̶�� ���ǿ� ��б��� ���̵� �����Ѵ�. �ڽ��� ���� �ٽ� ��й�ȣ�� ���� �ʱ� ����
if ($secret)
    set_session("ss_secret_{$bo_table}_{$wr_num}", TRUE);

// ���Ϲ߼� ��� (�������� �߼����� ����)
if (!($w == 'u' || $w == 'cu') && $config['cf_email_use'] && $board['bo_use_email']) {

    // �������� ������ ���
    $super_admin = get_admin('super');
    $group_admin = get_admin('group');
    $board_admin = get_admin('board');

    $wr_subject_ck = get_text(stripslashes($wr_subject_ck));

    $tmp_html = 0;
    if (strstr($html, 'html1'))
        $tmp_html = 1;
    else if (strstr($html, 'html2'))
        $tmp_html = 2;

    $wr_content = conv_content(conv_unescape_nl(stripslashes($wr_content)), $tmp_html);

    $warr = array( ''=>'�Է�', 'u'=>'����', 'r'=>'�亯', 'c'=>'�ڸ�Ʈ', 'cu'=>'�ڸ�Ʈ ����' );
    $str = $warr[$w];

    $subject = '['.$config['cf_title'].'] '.$board['bo_subject'].' �Խ��ǿ� '.$str.'���� �ö�Խ��ϴ�.';

    $link_url = G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.'&amp;'.$qstr;

    include_once(G5_LIB_PATH.'/mailer.lib.php');

    ob_start();
    include_once ('./write_update_mail.php');
    $content = ob_get_contents();
    ob_end_clean();

    $array_email = array();
    // �Խ��ǰ����ڿ��� ������ ����
    if ($config['cf_email_wr_board_admin']) $array_email[] = $board_admin['mb_email'];
    // �Խ��Ǳ׷�����ڿ��� ������ ����
    if ($config['cf_email_wr_group_admin']) $array_email[] = $group_admin['mb_email'];
    // �ְ�����ڿ��� ������ ����
    if ($config['cf_email_wr_super_admin']) $array_email[] = $super_admin['mb_email'];

    // ���۰Խ��ڿ��� ������ ����
    if ($config['cf_email_wr_write']) {
        if($w == '')
            $wr['wr_email'] = $wr_email;

        $array_email[] = $wr['wr_email'];
    }

    // �ɼǿ� ���ϹޱⰡ üũ�Ǿ� �ְ�, �Խ����� ������ �ִٸ�
    if (strstr($wr['wr_option'], 'mail') && $wr['wr_email'])
        $array_email[] = $wr['wr_email'];

    // �ߺ��� ���� �ּҴ� ����
    $unique_email = array_unique($array_email);
    $unique_email = array_values($unique_email);
    for ($i=0; $i<count($unique_email); $i++) {
        mailer($wr_name, $wr_email, $unique_email[$i], $subject, $content, 1);
    }
}

// ����� �ڵ� ����
@include_once($board_skin_path.'/write_update.skin.php');
@include_once($board_skin_path.'/write_update.tail.skin.php');

delete_cache_latest($bo_table);

if ($file_upload_msg)
    alert($file_upload_msg, G5_HTTP_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.'&amp;page='.$page.$qstr);
else
    goto_url(G5_ADMIN_URL.'/dr_board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr);
?>
