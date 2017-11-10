<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>
		                            <tr>
										<td colspan="6" class="board_re">
											<section class="re_peaple">
												<h4>답변: <?php echo get_text($answer['qa_subject']); ?></h4>
												<time><?php echo $answer['qa_datetime']; ?></time>
											</section>
											<section class="re_re">
												 <?php echo conv_content($answer['qa_content'], $answer['qa_html']); ?>
											</section>
										</td>
									</tr>
