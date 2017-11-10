<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/jquery.mobile.modal.css">
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
        <h2 id="container_title"><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> <?php if ($is_category) { ?>| <?php echo $_REQUEST["sca"]?><?php } ?><span class="sound_only"> 목록</span></h2>

    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= PHP_EOL.'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= PHP_EOL.'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= PHP_EOL.'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= PHP_EOL.'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>
				<fieldset class="cjy_170410_form">
					<legend>뉴스 게시판</legend>

					<table summary="제목, 이름, 작성일, 조회수, 첨부파일, 지사" class="board_view">
						<caption>게시판</caption>
						<tbody>
							<tr>
								<td class="board_strong" style="width:18%;">이름</td>
								<td colspan="3"><input type="text" name="wr_name" id="wr_name" required class="frm_input" maxlength="255" style="width:95%; padding-left:5px;"></td>
							</tr>
							<tr>
								<td class="board_strong">지사</td>
								<td colspan="5"><?php echo get_all_branch_select("wr_branch",'', ' required class="" style="border: 1px solid #e4eaec; width:97%; padding-left:5px; background: #f7f7f7;"') ?></td>
							</tr>
							<tr>
								<td class="board_strong">제목</td>
								<td colspan="5"><input type="text" name="wr_subject" value="<?php echo get_text($write['wr_subject']); ?>" id="wr_subject" required class="frm_input"  style="width:95%; padding-left:5px;"></td>
							</tr>
							<tr>
								<td colspan="6" class="board_con" style="padding:10px;">
                                    <textarea id="wr_content" name="wr_content" style="width:97%; border:none; padding:5px;" maxlength="65536" rows="10"></textarea>
                                </td>
							</tr>
									<tr>
										<td colspan="6" ><div class="g-recaptcha" data-sitekey="6LdzPygUAAAAAOjEU4XUe53QJmIJORWgs0-RufVE"></div></td>
									</tr>
						</tbody>

					</table>
				</fieldset>

				
				<div class="board_ft">
					<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="mo_finishBtn">
                    <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="mo_listBtn">목록</a>
					
				</div>



			</form>

		</div><!--기본 레이아웃 msub_container 끝-->
	</div>


<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
    $("#wr_content").on("keyup", function() {
        check_byte("wr_content", "char_count");
    });
});

<?php } ?>
function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f)
{
    <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: g5_bbs_url+"/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        if (typeof(ed_wr_content) != "undefined")
            ed_wr_content.returnFalse();
        else
            f.wr_content.focus();
        return false;
    }

    if (document.getElementById("char_count")) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(check_byte("wr_content", "char_count"));
            if (char_min > 0 && char_min > cnt) {
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            }
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }
		if ($('#g-recaptcha-response').val() == "") { 
			alert("자동등록방지를 확인해 주십시오."); 
			return false; 
		} 
     <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}
</script>
