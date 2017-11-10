<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

$captcha_html = '';
$captcha_js   = '';
if ($is_guest) {
    $captcha_html = captcha_html();
    $captcha_js   = chk_captcha_js();
}

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

<style>
#fwrite .hp_input {border: 1px solid #ccc;width: 40px;height: 20px;padding-left: 8px;}
#fwrite .branch_input {border: 1px solid #ccc;width: 80px;height: 20px;padding-left: 8px;}
</style>

    <div class="subcont_top"><!--100%-->
<?php include_once(G5_PATH.'/SNB.php'); ?>
            <div class="sub_cont1">
                <h3 class="subpage_name">지원하기</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">
    <form name="fwrite" id="fwrite" action="<?php echo G5_BBS_URL ?>/write_update.php" onsubmit="return fwrite_submit(this);" class="sub2_6_fc" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
		<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
		<input type="hidden" name="w" value="">
		<input type="hidden" name="bo_table" value="app">
		<input type="hidden" name="wr_id" value="">
		<input type="hidden" name="sca" value="">
		<input type="hidden" name="sfl" value="">
		<input type="hidden" name="stx" value="">
		<input type="hidden" name="spt" value="">
		<input type="hidden" name="sst" value="">
		<input type="hidden" name="sod" value="">
		<input type="hidden" name="page" value="">
        <input type="hidden" name="wr_subject" value="산후관리사 지원">
        
                        <fieldset class="">
                            <legend>지원하기 양식</legend>

                            <table class="sub2_6_table" summary="이름 사는지역 연락처를 작성해주세요">
                                <caption>지원하기</caption>
                                <colgroup>
                                    <col width="155px"/>
                                    <col width="*"/>
                                </colgroup>

                                <tbody>
                                <tr>
                                    <th>이름</th>
                                    <td><input type="text" class="sub2_6_input" title="이름입력" name="wr_name" id="wr_name"/></td>
                                </tr>
                                <tr>
                                    <th>사는지역</th>
                                    <td>
									<input type="text" class="branch_input" title="사는지역입력" name="branch1" id="branch1"/> 시(도) 
									<input type="text" class="branch_input" title="사는지역입력" name="branch2" id="branch2"/> 구(군)
									<input type="hidden" class="" title="사는지역입력" name="wr_branch" id="wr_branch"/>
									</td>
                                </tr>
                                <tr>
                                    <th>연락처</th>
                                    <td>
										<input type="text" class="hp_input" title="연락처입력" name="hp1" id="hp1" maxlength="3"/> - 
										<input type="text" class="hp_input" title="연락처입력" name="hp2" id="hp2" maxlength="4"/> - 
										<input type="text" class="hp_input" title="연락처입력" name="hp3" id="hp3" maxlength="4"/>
										<input type="hidden" class="" title="연락처 hp1-hp2-hp3" name="wr_content" id="wr_content"/>
									</td>
                                </tr>
                                <tr>
                                    <th>지원시메모</th>
                                    <td><textarea title="지원시메모입력" name="wr_1" id="wr_1" style="width:100%; height:150px; border: 1px solid #ccc;" maxlength="255"></textarea></td>
                                </tr>

								<?php if ($is_guest) { //자동등록방지  ?>
								<tr>
									<th scope="row">자동등록방지</th>
									<td>
										<?php echo $captcha_html ?>
									</td>
								</tr>
								<?php } ?>
                                </tbody>
                            </table>

                            <p class="sub2_6_join">
                                <input type="submit" value="지원하기" />
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->

    <script>
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

		// 사는지역
		var branch = f.branch1.value + " " + f.branch2.value ;
		f.wr_branch.value = branch;
		// 연락처
		var hp = f.hp1.value + "-" + f.hp2.value + "-" + f.hp3.value;
		f.wr_content.value = hp;

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

		<?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
<?php
include_once(G5_PATH.'/tail.php');
?>