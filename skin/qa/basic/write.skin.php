<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css">', 0);
?>
<div id="bo_v_table"><?php echo $qaconfig['qa_title']; ?></div>
<div class="subcont_top"><!--100%-->
        <?php include_once(G5_PATH.'/SNB.php'); ?>
    <div class="sub_cont1">
        <h3 class="subpage_name"><?php echo $board['bo_subject'] ?></h3>
        <p class="subpage_slog"><img src="<?php echo G5_IMG_URL ?>/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>"class="sub5_1_fc" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="qa_id" value="<?php echo $qa_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    $option = '';

    if ($is_dhtml_editor) {
        $option_hidden .= '<input type="hidden" name="qa_html" value="1">';
    } else {
        $option .= "\n".'<input type="checkbox" id="qa_html" name="qa_html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="qa_html">html</label>';
    }

    echo $option_hidden;
    ?>
        <div class="s_cont">
						<fieldset class="">
							<legend>문의 게시판</legend>

							<table summary="제목, 이름, 작성일, 조회수, 첨부파일, 지사" class="board_view">
								<caption>게시판</caption>
								<tbody>
									<tr>
										<td class="board_strong">이름</td>
										<td><input type="text" name="qa_name" value="<?php echo get_text($write['qa_name']); ?>" id="qa_name" required class="frm_input required" size="30" maxlength="255"></td>
									</tr>
									<tr>
										<td class="board_strong">휴대폰</td>
										<td colspan="5">
                                            <?php echo get_phone_select("qa_hp1",$wr_hp1,'required class="sub4_1_input" ') ?> -
                                            <input type="text" class="sub4_1_input" title="두번째 자리" name="qa_hp2" id="qa_hp2" size="4"required maxlength="4"/><span class="hypn">-</span>
                                            <input type="text" class="sub4_1_input" title="마지막 자리" name="qa_hp3" id="qa_hp3"  size="4" required maxlength="4"/>
                                        </td>
									</tr>
									<tr>
										<td class="board_strong">지사</td>
										<td colspan="5"><?php echo get_all_branch_select("qa_branch",'', ' required class="sub4_1_input" ') ?></td>
									</tr>
									<tr>
										<td class="board_strong">제목</td>
										<td colspan="3"><input type="text" name="qa_subject" value="<?php echo get_text($write['qa_subject']); ?>" id="qa_subject" required class="frm_input required" size="50" maxlength="255"></td>
									</tr>

									<tr>
										<td colspan="6" class="board_con">
                                            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                                        </td>
									</tr>
								</tbody>
							</table>
                            <p class="board_list_btn">
								<a href="<?php echo $list_href ?>" style="background-color: #949494;">목록</a>
								<input style="" type="submit" value="작성완료" id="btn_submit" accesskey="s">
							</p>
						</fieldset>
					</form>


				</div>
			</div>
    </div>
</div>

    <script>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "2";
            else
                obj.value = "1";
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
                "subject": f.qa_subject.value,
                "content": f.qa_content.value
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
            f.qa_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_qa_content) != "undefined")
                ed_qa_content.returnFalse();
            else
                f.qa_content.focus();
            return false;
        }

        <?php if ($is_hp) { ?>
        var hp = f.qa_hp.value.replace(/[0-9\-]/g, "");
        if(hp.length > 0) {
            alert("휴대폰번호는 숫자, - 으로만 입력해 주십시오.");
            return false;
        }
        <?php } ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>

<!-- } 게시물 작성/수정 끝 -->