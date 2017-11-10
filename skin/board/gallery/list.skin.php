<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<div class="subcont_top"><!--100%-->
        <?php include_once(G5_PATH.'/SNB.php'); ?>

        <div class="sub_cont1">
            <h3 class="subpage_name"><?php echo $board['bo_subject'] ?></h3>
            <p class="subpage_slog"><img src="<?php echo G5_IMG_URL ?>/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

            <div class="s_cont">

                <form method="post" action="" class="sub5_1_fc">
                    <fieldset class="">
                        <legend>겔러리 게시판</legend>

                        <div class="board_gall">
                            <ul class="gall_list">
        <?php for ($i=0; $i<count($list); $i++) {
            if($i>0 && ($i % $bo_gallery_cols == 0))
                $style = 'clear:both;';
            else
                $style = '';
            if ($i == 0) $k = 0;
            $k += 1;
            if ($k % $bo_gallery_cols == 0) $style .= "margin-right:0 !important;";
         ?>
                                <li style="<?php echo $style ?>">
                                    <a href="<?php echo $list[$i]['href'] ?>">
                                                        <?php
                                    if ($list[$i]['is_notice']) { // 공지사항  ?>
                                    <?php } else {
                                        $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);

                                        if($thumb['src']) {
                                            $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
                                        } else {
                                            $img_content = '<span style="width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px">no image</span>';
                                        }

                                        echo $img_content;
                                    }
                                     ?>
                                        <a href="<?php echo $list[$i]['href'] ?>"><span class="gall_txt"><?php echo $list[$i]['subject'] ?></span></a>
                                    </a>
                                </li>
                <?php } ?>
                <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
                            </ul>
                        </div>
                    </fieldset>
                  <?php echo $write_pages;  ?>

      <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
                <legend>검색</legend>
                <ul class="board_search">
                    <li>
                        <label for="boardSearch" class="hide">분류 선택(라벨)</label>
                        <select title="검색 분류 선택" name="sfl" id="sfl" class="sub5_1_select">
                            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                        </select>
                    </li>
                    <li><input type="text" class="sub4_1_input required" title="검색어입력" name="stx" required id="stx" maxlength="20" value="<?php echo stripslashes($stx) ?>" /></li>
                    <li><input type="submit" value="찾기" class="sub5_1add_btn btn_submit" onclick=""/></li>
                </ul>
        </form>


            </div>
        </div>

    </div><!--subcontent 1000px-->

</div><!--subcont_top 100%-->