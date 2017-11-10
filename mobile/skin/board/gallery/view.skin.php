<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
        <h2 id="container_title"><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> <?php if ($is_category) { ?>| <?php echo $_REQUEST["sca"]?><?php } ?><span class="sound_only"> 목록</span></h2>
			<form method="post" action="" class="sub5_1_fc">
				<fieldset class="">
					<legend>뉴스 게시판</legend>

					<table summary="제목, 이름, 작성일, 조회수, 첨부파일, 지사" class="board_view">
						<caption>게시판</caption>
						<tbody>
							<tr>
								<td class="board_strong">제목</td>
								<td colspan="5"> <?php

                                echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
                                ?></td>
							</tr>
							<tr>
								<td class="board_strong">이름</td>
								<td><?php echo $view['name'] ?></td>
								<td class="board_strong">작성일</td>
								<td><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></td>
							</tr>
							<tr>
								<td class="board_strong">첨부파일</td>
								<td colspan="5">
                                <ul>
                                    <?php
                                    // 가변 파일
                                    for ($i=0; $i<count($view['file']); $i++) {
                                        if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
                                     ?>
                                        <li>
                                            <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                                                <img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
                                                <strong><?php echo $view['file'][$i]['source'] ?></strong>
                                                <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                                            </a>
                                            <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span>
                                            <span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
                                        </li>
                                    <?php
                                        }
                                    }
                                     ?>
                                    </ul>

                                </td>
							</tr>
							<tr>
								<td class="board_strong">조회</td>
								<td colspan="5"><?php echo number_format($view['wr_hit']) ?>회</td>
							</tr>
							<tr>
								<td colspan="6" class="board_con" style="padding:10px;">

        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img m_subject\">\n";

            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }

            echo "</div>\n";
        }
         ?>

        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>


                                </td>
							</tr>
   <?php
    // 코멘트 입출력
    include_once(G5_BBS_PATH.'/view_comment.php');
     ?>
						</tbody>
					</table>
				</fieldset>


				<div class="board_ft">
					<p class="board_list_btn"><a href="<?php echo $list_href ?>">목록</a></p>
				</div>



			</form>

		</div><!--기본 레이아웃 msub_container 끝-->
	</div>

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<!-- 게시글 보기 끝 -->

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>