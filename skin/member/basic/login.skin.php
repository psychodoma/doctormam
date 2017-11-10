<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
$urllogin = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; 


if(strpos($urllogin, "www") !== false) {  
	$newurl = str_replace("www.", "", $urllogin);
    echo("<script>location.href='".$newurl."';</script>");  
}  

?>

<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">

	<div class="admin_wrap">
		<div class="admin_con">
			<h3>The Doctormam</h3>
			<form name="flogin" id="flogin" action="<?php echo $login_action_url ?>" method="post" class="login_fm">
                <input type="hidden" name="url" value="<?php echo $login_url ?>">
				<fieldset class="login_fm_a">
					<legend>아이디와 비밀번호를 입력하세요.</legend>
					<div class="login_box">
						<dl class="ad_longin">
							<dt class="ad_id">
								<label for="userid" class="longin_txt">아이디</label>
							</dt>
							<dd>
								<input type="text" id="login_id" name="mb_id" required class="login_write" maxLength="20" title="아이디를 입력하세요"/>
							</dd>
						</dl>
						<dl class="ad_pw">
							<dt class="ad_pass">
								<label for="userpw" class="longin_txt">비밀번호</label>
							</dt>
							<dd class="login_last">
								<input type="password" id="login_pw" name="mb_password" required class="login_write" title="비밀번호를 입력하세요"/>
							</dd>
						</dl>
					</div>
				</fieldset>
			<div class="login_btn_a">
				<input type="submit"  class="login_btn" value="로그인">
			</div>
			</form>


		</div>
	</div>


<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});
function submit_login(){

    $("#flogin").submit();
}
function flogin_submit(f)
{
    return true;
}
</script>
<!-- } 로그인 끝 -->