<?php
if (!defined('_GNUBOARD_')) exit; // ���� ������ ���� �Ұ�

// ���ÿɼ����� ���� ����ġ�Ⱑ ���������� ����
$colspan = 6;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css ����', ��¼���); ���ڰ� ���� ���� ���� ��µ�
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<h1 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> ���</span></h1>
<!-- �Խ��� �˻� ���� { -->
<fieldset id="bo_sch">
    <legend>�Խù� �˻�</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">�˻����</label>
        <?php if($member["mb_level"] > 8){ ?>
        <?php echo get_branch_name_select("branch",$_REQUEST["branch"],"class='adm_sel1'","y") ?>
        <?php } ?>
    <select name="sfl" id="sfl" class="adm_sel1 ">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>����</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>����</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>����+����</option>
    </select>
    <label for="stx" class="sound_only">�˻���<strong class="sound_only"> �ʼ�</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" id="stx" class="frm_input" size="15" maxlength="20" style="background:none !important;">
    <input type="submit" value="�˻�" class="btn_submit">
    </form>
</fieldset>
<!-- } �Խ��� �˻� �� -->
<!-- �Խ��� ��� ���� { -->
<div id="bo_list" style="width:<?php echo $width; ?>">



    <!-- �Խ��� ī�װ� ���� { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> ī�װ�</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } �Խ��� ī�װ� �� -->

    <!-- �Խ��� ������ ���� �� ��ư ���� { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>��</span>
            <?php echo $page ?> ������
        </div>

    </div>
    <!-- } �Խ��� ������ ���� �� ��ư �� -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> ���</caption>
        <thead>
			<tr>
				<th scope="col">��ȣ</th>
				<?php if ($is_checkbox) { ?>
				<th scope="col">
					<label for="chkall" class="sound_only">���� ������ �Խù� ��ü</label>
					<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
				</th>
				<?php } ?>
				<th scope="col">����</th>
				<th scope="col">����</th>
				<th scope="col">�۾���</th>
				<th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>��¥</a></th>
				<th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>��ȸ</a></th>
				<?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>��õ</a></th><?php } ?>
				<?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>����õ</a></th><?php } ?>
			</tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list[$i]['is_notice']) // ��������
                echo '<strong>����</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">������</span>";
            else
                echo $list[$i]['num'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_name sv_use"><?php echo get_branch($list[$i]['branch']); ?></td>
            <td class="td_subject">
                <?php
                echo $list[$i]['icon_reply'];
                if ($is_category && $list[$i]['ca_name']) {
                 ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                <?php } ?>

                <a href="<?php echo $list[$i]['href'] ?>">
                    <?php echo $list[$i]['subject'] ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">���</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">��</span><?php } ?>
                </a>

                <?php
                if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

                 ?>
            </td>
            <td class="td_name sv_use"><?php echo $list[$i]['name'] ?></td>
            <td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
            <td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">�Խù��� �����ϴ�.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">

        <ul class="btn_bo_adm">
            <?php if ($is_checkbox) { ?>
            <li><input type="submit" name="btn_submit" value="���û���" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="���ú���" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="�����̵�" onclick="document.pressed=this.value"></li>
            <?php } ?>
            <li><a href="<?php echo G5_ADMIN_URL ?>/excel.board.php?<?php echo $_SERVER['QUERY_STRING'] ?>" class="btn_b02">�����ٿ�</a></li>
        </ul>


        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">���</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">�۾���</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>�ڹٽ�ũ��Ʈ�� ������� �ʴ� ���<br>������ Ȯ�� ���� ���� �ٷ� ���û��� ó���ϹǷ� �����Ͻñ� �ٶ��ϴ�.</p>
</noscript>
<?php } ?>

<!-- ������ -->
<?php echo $write_pages;  ?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "�� �Խù��� �ϳ� �̻� �����ϼ���.");
        return false;
    }

    if(document.pressed == "���ú���") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "�����̵�") {
        select_copy("move");
        return;
    }

    if(document.pressed == "���û���") {
        if (!confirm("������ �Խù��� ���� �����Ͻðڽ��ϱ�?\n\n�ѹ� ������ �ڷ�� ������ �� �����ϴ�\n\n�亯���� �ִ� �Խñ��� �����Ͻ� ���\n�亯�۵� �����ϼž� �Խñ��� �����˴ϴ�."))
            return false;

        f.removeAttribute("target");
        f.action = "./dr_board_list_update.php";
    }

    return true;
}

// ������ �Խù� ���� �� �̵�
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "����";
    else
        str = "�̵�";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./dr_move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } �Խ��� ��� �� -->
