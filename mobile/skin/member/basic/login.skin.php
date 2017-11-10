<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);


include_once(G5_PATH.'/mobile/head.php');

?>



<div id="mb_login" class="mbskin" style="min-height:400px;">
    <h1><?php echo $g5['title'] ?></h1>

    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
    <input type="hidden" name="url" value="<?php echo $login_url ?>">
	
	<style>
		#login_frm .frm_input{height:40px;line-height:40px;width:96%;margin-bottom:10px;position:relative;margin-left:0;padding-left:10px;letter-spacing:0.5px;}
		#login_frm .btn_submit{width:100%;display:block;position:relative;right:0;background:#d85e91;font-size:16px;height: 60px !important;}
	</style>
    <div id="login_frm">
        <label for="login_id" class="sound_only">아이디<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="mb_id" id="login_id" placeholder="아이디(필수)" required class="frm_input required" maxLength="20">
        <label for="login_pw" class="sound_only">비밀번호<strong class="sound_only"> 필수</strong></label>
        <input type="password" name="mb_password" id="login_pw" placeholder="비밀번호(필수)" required class="frm_input required" maxLength="20">
		
		<div style="clear:both;display:block;">
        <input type="submit" value="로그인" class="btn_submit"></div>
        <div style="margin-bottom:20px;font-size:14px;">
            <input type="checkbox" name="auto_login" id="login_auto_login">
            <label for="login_auto_login">자동로그인</label>
        </div>
    </div>
	<!--
    <section>
        <h2>회원로그인 안내</h2>
        <p>
            회원아이디 및 비밀번호가 기억 안나실 때는 아이디/비밀번호 찾기를 이용하십시오.<br>
            아직 회원이 아니시라면 회원으로 가입 후 이용해 주십시오.
        </p>
        <div>
            <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost" class="btn02">아이디 비밀번호 찾기</a>
            <a href="./register.php" class="btn01">회원 가입</a>
        </div>
    </section>
	-->
    <div class="btn_confirm">
        <a href="<?php echo G5_URL ?>/" style="border:1px solid #bbb;width:100%;line-height:40px;display:block;">메인으로 돌아가기</a>
    </div>

    </form>

</div>

<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    return true;
}
</script>

<?
include_once(G5_PATH.'/mobile/tail.php');
?>