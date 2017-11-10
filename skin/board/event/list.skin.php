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

                        <div class="board_gall2">
                            <ul class="gall_list2">
                                <li>
                                    <a href="">
                                        <img src="<?php echo G5_IMG_URL ?>/sub/event_test.jpg" alt="이벤트"/>
                                        <span class="gall_txt">지점장님들의 봉사활동 자라와 거북이의 알콩달콩</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo G5_IMG_URL ?>/sub/event_test.jpg" alt="이벤트"/>
                                        <span class="gall_txt">지점장님들의 봉사활동</span>
                                    </a>
                                </li>
                                <li style="margin-right:0;">
                                    <a href="">
                                        <img src="<?php echo G5_IMG_URL ?>/sub/event_test.jpg" alt="이벤트"/>
                                        <span class="gall_txt">지점장님들의 봉사활동</span>
                                    </a>
                                </li>


                                <li>
                                    <a href="">
                                        <img src="<?php echo G5_IMG_URL ?>/sub/event_test.jpg" alt="이벤트"/>
                                        <span class="gall_txt">지점장님들의 봉사활동 자라와 거북이의 알콩달콩</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo G5_IMG_URL ?>/sub/event_test.jpg" alt="이벤트"/>
                                        <span class="gall_txt">지점장님들의 봉사활동</span>
                                    </a>
                                </li>
                                <li style="margin-right:0;">
                                    <a href="">
                                        <img src="<?php echo G5_IMG_URL ?>/sub/event_test.jpg" alt="이벤트"/>
                                        <span class="gall_txt">지점장님들의 봉사활동</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </fieldset>


                    <div class="board_ft">
                        <ul class="board_list">
                            <li class="pprev"><a href=""><img src="<?php echo G5_IMG_URL ?>/sub/con_pprev.jpg" alt="맨끝으로 이동"/></a></li>
                            <li class="prev"><a href=""><img src="<?php echo G5_IMG_URL ?>/sub/con_prev.jpg" alt="끝으로 이동"/></a></li>
                            <li class="board_strong"><a href="">1</a></li>
                            <li class=""><a href="">2</a></li>
                            <li class=""><a href="">3</a></li>
                            <li class=""><a href="">4</a></li>
                            <li class=""><a href="">5</a></li>
                            <li class=""><a href="">6</a></li>
                            <li class=""><a href="">7</a></li>
                            <li class=""><a href="">8</a></li>
                            <li class=""><a href="">9</a></li>
                            <li class=""><a href="">10</a></li>
                            <li class="next"><a href=""><img src="<?php echo G5_IMG_URL ?>/sub/con_next.jpg" alt="앞으로 이동"/></a></li>
                            <li class="nnext"><a href=""><img src="<?php echo G5_IMG_URL ?>/sub/con_nnext.jpg" alt="맨앞으로 이동"/></a></li>
                        </ul>

                        <!--<p class="board_list_btn"><a href="">목록</a></p><!--1개 버튼 사용시-->

                        <!--<ul class="board_list_btn"><!--2개 버튼 사용시-->
                        <!--<li><a href="">목록</a></li>
                        <li><a href="">쓰기</a></li>
                    </ul>-->
                    </div>

                    <fieldset class="">
                        <legend>산후도우미 예약하기</legend>
                        <ul class="board_search">
                            <li>
                                <label for="boardSearch" class="hide">분류 선택(라벨)</label>
                                <select title="검색 분류 선택" name="firstNumber" id="firstNumber" class="sub5_1_select">
                                    <option value="">전체</option>
                                    <option value="">이름</option>
                                    <option value="">내용</option>
                                </select>
                            </li>

                            <li><input type="text" class="sub4_1_input" title="검새거입력" name="boardSearch" id=""/></li>
                            <li><input type="button" value="찾기" class="sub5_1add_btn" onclick=""/></li>
                        </ul>
                    </fieldset>

                </form>


            </div>
        </div>

    </div><!--subcontent 1000px-->

</div><!--subcont_top 100%-->
