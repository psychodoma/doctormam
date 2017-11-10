<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
        <h2 id="container_title">문의하기</h2>
			<form method="post" action="" class="sub5_1_fc">
				<fieldset class="">
					<legend>뉴스 게시판</legend>

					<table summary="제목, 이름, 작성일, 조회수, 첨부파일, 지사" class="board_view">
						<caption>게시판</caption>
						<tbody>
							<tr>
								<td class="board_strong">제목</td>
								<td colspan="5"> <?php

            echo $view['subject']; // 글제목 출력
            ?></td>
							</tr>
							<tr>
								<td class="board_strong">이름</td>
								<td><?php echo $view['name'] ?></td>
								<td class="board_strong">작성일</td>
								<td><?php echo $view['datetime']; ?></td>
							</tr>
							<tr>
								<td class="board_strong">첨부파일</td>
								<td colspan="5">
                                <ul>
                                   <?php
        // 가변 파일
        for ($i=0; $i<$view['download_count']; $i++) {
         ?>
            <li>
                <a href="<?php echo $view['download_href'][$i];  ?>" class="view_file_download">
                    <img src="<?php echo $qa_skin_url ?>/img/icon_file.gif" alt="첨부">
                    <strong><?php echo $view['download_source'][$i] ?></strong>
                </a>
            </li>
        <?php
        }
         ?>
                                    </ul>

                                </td>
							</tr>
							<tr>
								<td class="board_strong">지사</td>
								<td colspan="5"><?php echo get_branch($view['branch'],"mb_nick") ?></td>
							</tr>
							<tr>
								<td colspan="6" class="board_con" style="padding:20px 10px 10px 10px;">

      <?php
        // 파일 출력
        if($view['img_count']) {
            echo "<div id=\"bo_v_img\">\n";

            for ($i=0; $i<$view['img_count']; $i++) {
                //echo $view['img_file'][$i];
                echo get_view_thumbnail($view['img_file'][$i], $qaconfig['qa_image_width']);
            }

            echo "</div>\n";
        }
         ?>

        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content'], $qaconfig['qa_image_width']); ?></div>


                                </td>
							</tr>
   <?php
    // 코멘트 입출력
    include_once($qa_skin_path.'/view.answer.skin.php');
     ?>
						</tbody>
					</table>
				</fieldset>


				<div class="board_ft">
					<?if($is_admin)?>
					<p class="board_list_btn">
						<a href="<?php echo $list_href ?>" style="float:left; background-color: #909090; border:1px solid #909090">목록</a>
						<a href="/adm/dr_qaview.php?qa_id=<?=$view['qa_id']?>" style="float:right;">관리자</a>
					</p>
				</div>



			</form>

		</div><!--기본 레이아웃 msub_container 끝-->
	</div>
<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});
</script>