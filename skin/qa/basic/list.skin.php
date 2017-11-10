<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
$colspan = 6;
if ($is_checkbox) $colspan++;
?>

<script src="<?php echo G5_JS_URL ?>/jquery.modal.js"></script>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/jquery.modal.css">
<div class="subcont_top"><!--100%-->
            <?php include_once(G5_PATH.'/SNB.php'); ?>
        <div class="sub_cont1">
            <h3 class="subpage_name">문의하기</h3>
            <p class="subpage_slog"><img src="<?php echo G5_IMG_URL ?>/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜감동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>
		
            <div class="s_cont">

                <form method="post" action="" class="sub5_1_fc">
                    <fieldset class="">
                        <legend>문의하기 게시판</legend>

                        <table summary="번호,지사,제목,작성자,등록일,조회수" class="sub5_1_table">
                            <caption>문의하기 게시판</caption>
							<!--
                            <colgroup>
                                <col width="7%"/>
                                <col width="18%"/>
                                <col width="*%"/>
                                <col width="10%"/>
                                <col width="15%"/>
                                <col width="15%"/>
                            </colgroup>
							-->
                            <thead>
                            <tr>
                                <th scope="col" width="7%">번호</th>
                                <th scope="col" width="18%">지사</th>
                                <th scope="col" width="*%">제목</th>
                                <th scope="col" width="10%">작성자</th>
                                <th scope="col" width="11%">답변</th>
                                <th scope="col" width="11%">등록일</th>
                            </tr>
                            </thead>
                            <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
        ?>
                            <tr>
                                <td><?php echo $list[$i]['num']; ?></td>
                                <td><?php echo get_branch($list[$i]['branch'],"mb_nick") ?></td>
                                <td class="sub5_borad_name"><!--<a href="<?php /*echo $list[$i]['view_href']; */?>">-->
                                        <?if($is_admin){?>
											<a href="<?php echo $list[$i]['view_href']; ?>" wr_id="<?php echo $list[$i]['qa_id']; ?>"><?php echo $list[$i]['subject']; ?>
										<?}else{?>
											<a  href="#ex" id="manual-ajax" class="manual-ajax" wr_id="<?php echo $list[$i]["qa_id"] ?>" rel="modal:open"><?php echo $list[$i]['subject']; ?>
										</a>
										<?}?>
                  
                </a>
                <?php echo $list[$i]['icon_file']; ?></td>
                                <td><?php echo $list[$i]['name']; ?></td>
                                <td class="<?php echo ($list[$i]['qa_status'] ? 'txt_done' : 'txt_rdy'); ?>"><?php echo ($list[$i]['qa_status'] ? '답변완료' : '답변대기'); ?></td>
                                <td><?php echo $list[$i]['date']; ?></td>
                            </tr>
        <?php
        }
        ?>

        <?php if ($i == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
                            </tbody>
                        </table>
                    </fieldset>
<p class="board_list_btn"><a href="qawrite.php">문의하기</a></p>
                    <?php echo $list_pages;  ?>

                    
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



<script>
$('.manual-ajax').click(function(event) {
  event.preventDefault();
	$("#wr_id").val($(this).attr("wr_id"));
});
</script>


<div id="ex" style="display:none;"><a href="#" rel="modal:close"></a>
    <form action="./qaview.php" method="post">
        <input type="hidden" name="qa_id" id="wr_id" value="">
        <p class="sub4_3_password"><label for="wr_service_start">이름 : </label><input type="text" class="sub4_1_input required" title="이름입력" name="wr_name" id="wr_name"style="width:50px;" required minlength="2" maxlength="20">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <label for="wr_service_start">휴대번호 : </label><?php echo get_phone_select("wr_hp1",$wr_hp1,'required class="sub4_1_input" ') ?> -
            <input type="text" class="sub4_1_input" title="두번째 자리" name="wr_hp2" id="wr_hp2" size="4"required maxlength="4"/><span class="hypn">-</span>
            <input type="text" class="sub4_1_input" title="마지막 자리" name="wr_hp3" id="wr_hp3"  size="4" required maxlength="4"/>
            <input type="submit" name="btn_submit" id="btn_submit" class="pass_btn" value="확인">
        </p>

    </form>
</div>
