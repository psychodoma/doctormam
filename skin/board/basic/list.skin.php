<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<?php if($bo_table=="review"){ ?>
    <script src="<?php echo G5_JS_URL ?>/jquery.modal.js"></script>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/jquery.modal.css">
    <?php } ?>
<div class="subcont_top"><!--100%-->
        <?php include_once(G5_PATH.'/SNB.php'); ?>
<div class="sub_cont1">
    <h3 class="subpage_name"><?php echo $board['bo_subject'] ?></h3>
    <p class="subpage_slog"><img src="<?php echo G5_IMG_URL ?>/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

    <div class="s_cont">

        <form method="post" action="" class="sub5_1_fc">
            <fieldset class="">
                <legend>뉴스 게시판</legend>

                <table summary="번호,지사,제목,작성자,등록일,조회수" class="sub5_1_table">
                    <caption>뉴스 게시판</caption>
					<!--
                    <colgroup>
                        <col width="7%"/>
                        <?php if($bo_table == "review"){?><col width="15%"/><?php } ?>
                        <col width="*%"/>
                        <col width="15%"/>
                        <col width="9%"/>
                        <col width="7%"/>
                    </colgroup>
					-->
                    <thead>
                    <tr>
                        <th scope="col">번호</th>
                        <?php if($bo_table == "review"){?><th scope="col">지점</th><?php } ?>
                        <th scope="col">제목</th>
                        <th scope="col">작성자</th>
                        <th scope="col">등록일</th>
                        <th scope="col">조회수</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
                    <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
                        <td>
							<?php
							if ($list[$i]['is_notice']) // 공지사항
								echo '<strong>공지</strong>';
							else
								echo $list[$i]['num'];
							 ?>
						</td>
                        <?php if($bo_table == "review"){?><td><?php echo get_branch($list[$i]['branch'])?></td><?php } ?>
                        <td class="sub5_borad_name">
						<?php
                echo $list[$i]['icon_reply'];
                if ($is_category && $list[$i]['ca_name']) {
                 ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                <?php } ?>

                <a href="<?php echo $list[$i]['href'] ?>" class="board_Icon">
                    <?php echo $list[$i]['subject'] ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
					<?php
					// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
					// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

					if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
					if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
					if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
					if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
					if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

					 ?>
                </a>

                </td>
					<td><?php echo $list[$i]['name'] ?></td>
					<td><?php echo $list[$i]['datetime2'] ?></td>
					<td><?php echo $list[$i]['wr_hit'] ?></td>
				</tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
                       </tbody>
                </table>
            </fieldset>
                <?php if($bo_table == "review"){?>
						<p class="board_list_btn"><a  href="#ex" id="manual-ajax" class="manual-ajax" rel="modal:open">글쓰기</a></p>
						<!--
						<div class="board_ft">
							<p class="board_list_btn"><a  href="#ex" id="manual-ajax" class="manual-ajax" rel="modal:open">글쓰기</a></p>
						</div>
						-->
                <?php } ?>
                    <?php echo $write_pages;  ?>


    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
                <legend>검색</legend>
                <ul class="board_search">
                    <?php
                    if($bo_table == "review"){?>
                        <?php echo get_all_branch_select("branch",$_REQUEST["branch"],"class='sub5_1_select'","y") ?>
                    <?php } ?>
                    <li>
                        <label for="boardSearch" class="hide">분류 선택(라벨)</label>
                        <select title="검색 분류 선택" name="sfl" id="sfl" class="sub5_1_select">
                            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                        </select>
                    </li>
                    <li><input type="text" class="sub4_1_input" title="검색어입력" name="stx" id="stx" maxlength="20" value="<?php echo stripslashes($stx) ?>" /></li>
                    <li><input type="submit" value="찾기" class="sub5_1add_btn btn_submit" onclick=""/></li>
                </ul>
        </form>


    </div>
</div>
    </div><!--subcontent 1000px-->

</div><!--subcont_top 100%-->
<?php if($bo_table=="review"){?>
    <script>
$('.manual-ajax').click(function(event) {
  event.preventDefault();

});
</script>
<div id="ex" style="display:none;"><a href="#" rel="modal:close"></a>
    <form action="./write.php?bo_table=review" method="post">
        <p class="sub4_3_password"><label for="wr_service_start">이름 : </label><input type="text" class="sub4_1_input required" title="이름입력" name="wr_name" id="wr_name"style="width:50px;" required minlength="2" maxlength="20">
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="wr_service_start">휴대번호 : </label><?php echo get_phone_select("wr_hp1",$wr_hp1,'required class="sub4_1_input" ') ?> -
            <input type="text" class="sub4_1_input" title="두번째 자리" name="wr_hp2" id="wr_hp2" size="4"required maxlength="4"/><span class="hypn">-</span>
            <input type="text" class="sub4_1_input" title="마지막 자리" name="wr_hp3" id="wr_hp3"  size="4" required maxlength="4"/>
            <input type="submit" name="btn_submit" id="btn_submit" class="pass_btn" value="확인">
        </p>

    </form>
</div>

<?php } ?>