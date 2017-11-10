<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->
<div id="bo_v_table"><?php echo $qaconfig['qa_title']; ?></div>
<div class="subcont_top"><!--100%-->
        <?php include_once(G5_PATH.'/SNB.php'); ?>
    <div class="sub_cont1">
        <h3 class="subpage_name"><?php echo $board['bo_subject'] ?></h3>
        <p class="subpage_slog"><img src="<?php echo G5_IMG_URL ?>/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>
        <div class="s_cont">
					<form method="post" action="" class="sub5_1_fc">
						<fieldset class="">
							<legend>뉴스 게시판</legend>

							<table summary="제목, 이름, 작성일, 조회수, 첨부파일, 지사" class="board_view">
								<caption>게시판</caption>
								<tbody>
									<tr>
										<td class="board_strong">제목</td>
										<td colspan="3"><?php echo $view['subject']?></td>
									</tr>
									<tr>
										<td class="board_strong">이름</td>
										<td><?php echo $view['name'] ?></td>
										<td class="board_strong">작성일</td>
										<td><?php echo $view['datetime']; ?></td>
									</tr>
   <?php
    if ($view['file']['count']) {
        $cnt = 0;
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>
<?php if($cnt) { ?>
									<tr>
										<td class="board_strong">첨부파일</td>
										<td colspan="5"><span class="borad_file"></span>
                                                <?php
                                        // 가변 파일
                                        for ($i=0; $i<count($view['file']); $i++) {
                                            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
                                         ?>
                                                                            <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                                                    <img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
                                                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                                                    <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                                                </a>
                                <?php
                                            }
                                        }
                                         ?>
                                        </td>
									</tr>
<?php } ?>
									<tr>
										<td class="board_strong">지사</td>
										<td colspan="5"><?php echo get_branch($view['branch'],"mb_nick") ?></td>
									</tr>
									<tr>
										<td colspan="6" class="board_con">
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
        <!-- } 본문 내용 끝 -->
                                        </td>
									</tr>
    <?php
    // 코멘트 입출력
    if($view["qa_status"]=="1"){
    include_once($qa_skin_path.'/view.answer.skin.php');
    }
     ?>
								</tbody>
							</table>
						</fieldset>

						<div class="board_ft">
							<p class="board_list_btn"><a href="<?php echo $list_href ?>" style="background-color: #949494;">목록</a></p>
						</div>
					</form>


				</div>
			</div>
    </div>
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