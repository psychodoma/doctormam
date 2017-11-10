<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<section id="bo_w">
	<h1 id="container_title">
		<?php
		if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
		echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
		?>
	</h1>
    <div class="tbl_frm01 tbl_wrap">
        <table>
        <tbody>
        <tr>
            <th scope="row"><label for="wr_name">지원자<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <?php echo $view['name'] ?>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="branch">사는지역<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <?php echo $view['branch'] ?>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_content">연락처<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <?php echo $view['content'] ?>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_1">지원시메모<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper" style="min-height:150px;">
					<?php echo nl2br($view['wr_1']) ?>
                </div>
            </td>
        </tr>
        </tbody>
        </table>
    </div>

    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top">
        <?php
        ob_start();
         ?>
        <?php if ($prev_href || $next_href) { ?>
        <ul class="bo_v_nb">
            <?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn_b01"><i class="fa fa-angle-left" aria-hidden="true" style="margin-right: 4px;"></i>이전글</a></li><?php } ?>
            <?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn_b01">다음글<i class="fa fa-angle-right" aria-hidden="true" style="margin-left: 4px;"></i></a></li><?php } ?>
        </ul>
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></li><?php } ?>
            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></li><?php } ?>
            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">이동</a></li><?php } ?>
            <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></li><?php } ?>
            <li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->
</section>
<!-- } 게시물 작성/수정 끝 -->