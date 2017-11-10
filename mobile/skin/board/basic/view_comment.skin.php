<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

    <?php
    for ($i=0; $i<count($list); $i++) {
        $comment_id = $list[$i]['wr_id'];
        $cmt_depth = ""; // 댓글단계
        $cmt_depth = strlen($list[$i]['wr_comment_reply']) * 20;
            $str = $list[$i]['content'];
            if (strstr($list[$i]['wr_option'], "secret"))
                $str = $str;
            $str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str);
    ?>
							<tr>
								<td colspan="6" class="board_re">
									<section class="re_peaple">
										<h4><?php echo get_text($list[$i]['wr_name']); ?></h4>
										<time><?php echo $list[$i]['datetime'] ?></time>
									</section>
									<section class="re_re">

                 <?php echo $str ?>

									</section>
								</td>
							</tr>

<?php } ?>


