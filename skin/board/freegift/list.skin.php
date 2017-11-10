<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

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
                <legend>뉴스 게시판</legend>

                <table summary="번호,지사,제목,작성자,등록일,조회수" class="sub5_1_table">
                    <caption>뉴스 게시판</caption>
                    <colgroup>
                        <col width="7%"/>
                        <col width="18%"/>
                        <col width="*%"/>
                        <col width="10%"/>
                        <col width="15%"/>
                        <col width="8%"/>
                    </colgroup>
                    <thead>
                    <tr>
                        <th scope="col">번호</th>
                        <th scope="col">지사</th>
                        <th scope="col">제목</th>
                        <th scope="col">작성자</th>
                        <th scope="col">등록일</th>
                        <th scope="col">조회수</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>3</td>
                        <td>수원점</td>
                        <td class="sub5_borad_name"><a href="">닥터맘 고양김포파주지사 이벤트 닥터맘</a><span class="borad_file"></span></td>
                        <td>관리자</td>
                        <td>2016-07-22</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>본사</td>
                        <td class="sub5_borad_name"><a href="">2016년 프리미엄 교육 현장^^</a></td>
                        <td>관리자</td>
                        <td>2016-07-22</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>강북 동대문점</td>
                        <td class="sub5_borad_name"><a href="">수원지사 응급처치 교육</a></td>
                        <td>관리자</td>
                        <td>2016-07-22</td>
                        <td>100</td>
                    </tr>
                    </tbody>
                </table>
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

                <p class="board_list_btn"><a href="">목록</a></p>
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