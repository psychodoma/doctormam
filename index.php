<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<script>
	$(document).ready(function(){
		var slider = "";
			slider = $('.bxslider').bxSlider({
			auto: true,
			mode: 'fade',
			//speed: 1000,
            autoControls: false
		});
		$(document).on('click','.bx-next, .bx-prev, .bx-pager-link',function() {
			slider.stopAuto();
			slider.startAuto();
		});
	});

	$(document).ready(function(){
		var slider = "";
			slider = $('.slider1').bxSlider({
			slideWidth: 158,
			minSlides: 1,
			maxSlides: 10,
			slideMargin: 51,
			auto: true
		});
		$(document).on('click','.bx-next, .bx-prev, .bx-pager-link',function() {
			slider.stopAuto();
			slider.startAuto();
		});
	});

</script>


    <div class="main_wrap"><!--100%-->
        <ul class="bxslider">
            <li><img style="width:100%; height:100%;" src="img/main/main_visual1.jpg" /></li>
            <li><img style="width:100%; height:100%;" src="img/main/main_visual2.jpg" /></li>
            <li><img style="width:100%; height:100%;" src="img/main/main_visual3.jpg" /></li>
        </ul>
    </div>




    <div>
        <div class="maincontent">

            <div class="content1">
                <div class="cont1">
                    <div class="main_tab1">
                        <ul class="tab_title1">
                            <li><a class="tab_link active" href="#tab1">닥터맘</a></li>
                            <li style="margin-left:-1px;"><a href="#tab2" ids="1" class="tab_link">닥터베베</a></li>
                        </ul>

                        <div class="tabDetails" style="border:none; margin:0">
                            <div id="tab1" class="tabContents">
                                <p><a href="/"><img src="img/main/bebe.jpg" alt="닥터맘"/></a></p>
                            </div>

                            <div id="tab2" class="tabContents">
                                <p><a href="http://www.drbebe11.com/" target="_blank"><img src="img/main/mama.jpg" alt="닥터베베"/></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="main_tab2">
                        <ul class="tab_title1">
                            <li><a class="tab_link active" href="#tab11">고객센터</a></li>
                            <li style="margin-left:-1px;"><a href="#tab22" class="tab_link">상담시간</a></li>
                        </ul>

                        <div class="tabDetails" style="height:120px;">
                            <div id="tab11" class="tabContents">
                                <ul class="tabst_li">
                                    <li>대표전화<span class="tellpo"><a href="<?php echo G5_URL ?>/branch_map.php">지사안내</a></span></li>
									<li>팩스번호<span class="tell"><a href="<?php echo G5_URL ?>/branch_map.php">지사안내</a></span></li>
									<li class="holyday">일요일,공휴일은 휴무입니다.</li>
                                </ul>
                            </div>

                            <div id="tab22" class="tabContents">
                                <ul class="tabst_li">
                                    <li>평일 09:00 ~ 19:00</li>
                                    <li>토요일 9:00 ~ 16:00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- 닥터맘 글로벌 서비스 : <?php echo G5_URL ?>/service_global.php-->
                <div class="cont2">
                    <div class="banner1">
                        <ul class="banner1_img_btn">
                            <li><a href="<?php echo G5_URL ?>/fee_branch.php?mom_milk=yes"><img src="img/main/banner1_1.jpg" alt="모유수유 클리닉"/></a></li>
                            <li><a href="<?php echo G5_URL ?>/service_voucher.php"><img src="img/main/banner1_2.jpg" alt="바우처 서비스"/></a></li>
                            <li><a href="javascript:alert('준비중입니다.');"><img src="img/main/banner1_3.jpg" alt="글로벌 서비스"/></a></li>
                            <li><a href="http://www.drbebe11.com/" target="_blank"><img src="img/main/banner1_4.jpg" alt="닥터베베"/></a></li>
                        </ul>

                        <div class="banner1_tab1">
                            <p class="more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=news"><img src="img/main/more.jpg" alt="더보기"/></a></p>

                            <ul class="tab_title2">
                                <li><a class="tab_link active" href="#tab111">공지사항</a></li>
                                <li style="margin-left:-1px;"><a href="#tab222" ids="1" class="tab_link">고객상담실</a></li>
                            </ul>

                            <div class="tabDetails1">
                                <div id="tab111" class="tabContents1">
                                    <ul class="tabst_li1">
                                        <?php echo latest("basic", "news", 6, 25); ?>
                                    </ul>
                                </div>

                                <div id="tab222" class="tabContents1">
                                    <ul class="tabst_li1">
                                        <?php
                                        $sql = "select * from g5_qa_content order by qa_datetime desc limit 0,6";
                                        $result = sql_query($sql);
                                        for ($i=0; $row = sql_fetch_array($result); $i++) { ?>
                                            <li>
                                                <a href="<?php echo G5_URL ?>/bbs/qaview.php?qa_id=<?php echo $row["qa_id"] ?>">
                                                <p class="t1_txt"><?php echo $row["qa_subject"] ?></p>
                                                <p class="t1_date">[<?php echo date("Y.m.d", strtotime( $row["qa_datetime"]  ) ) ?>]</p>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>




                        <div class="banner1_tab2">
                            <p class="more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=review"><img src="img/main/more.jpg" alt="더보기"/></a></p>

                            <ul class="tab_title2">
                                <li><a class="tab_link active" href="#tab1111">이용후기</a></li>
                                <li style="margin-left:-1px;"><a href="#tab2222" ids="1" class="tab_link">예약신청</a></li>
                            </ul>

                            <div class="tabDetails1">
                                <div id="tab1111" class="tabContents1">
                                    <ul class="tabst_li1">
                                        <?php echo latest("basic", "review", 6, 25); ?>
                                    </ul>
                                </div>

                                <div id="tab2222" class="tabContents1">
                                    <ul class="tabst_li1">
                                        <?php echo latest("basic", "edu", 6, 25); ?>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>





            <div class="content2">
                <div class="cont3">
                    <div class="contst_li">
                        <h3><img src="img/main/main_s_title1.jpg" alt="닥터맘교육"/></h3>
                        <ul>
                            <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=edu&sca=<?=urlencode("산모교실")?>"><img src="img/main/banner2_1.jpg" alt="닥터맘 산모교실"/></a></li>
                            <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=edu&sca=<?=urlencode("산후관리사 양성교육")?>"><img src="img/main/banner2_2.jpg" alt="산후관리사 양성교육"/></a></li>
                            <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=edu&sca=<?=urlencode("베이비시터 양성교육")?>"><img src="img/main/banner2_3.jpg" alt="베이비시터 양성교육"/></a></li>
                        </ul>
                    </div>


                    <div class="contst_li1">
                        <h3><img src="img/main/main_s_title2.jpg" alt="닥터맘 갤러리"/></h3>
                        <ul>
                        <?php
                        $sql = "select * from g5_write_gallery order by wr_datetime desc limit 0,3";
                        $result = sql_query($sql);
                        for ($i=0; $row = sql_fetch_array($result); $i++) {
                            $thumb = get_list_thumbnail("gallery", $row['wr_id'], "143", "104");
                        if($thumb['src']) {
                            ?>

                            <li>
                                <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=gallery&wr_id=<?php echo $row["wr_id"] ?>">
                                    <img src="<?php echo $thumb['src'] ?>" alt=""/>
                                </a>
                            </li>
                            <?php
                        }
                        } ?>

                        </ul>
                    </div>
                </div>

                <div class="cont4">
                    <ul class="contst_li2">
                        <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=event"><img src="img/main/banner3_1.jpg" alt="이벤트"/></a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=gallery"><img src="img/main/banner3_2.jpg" alt="닥터맘 나눔프로젝트"/></a></li>
                    </ul>

                    <ul class="contst_li3">
                        <li><a href="javascript:PopupCalc1();"><img src="img/main/banner3_3.jpg" alt="출산축하선물"/></a></li>
                        <li><a href="javascript:PopupCalc3();"><img src="img/main/banner3_4.jpg" alt="전국지사모집 02-903-2222"/></a></li>
                    </ul>
                </div>
            </div>

        </div>






        <div class="t_roll_bg">
            <h3 class="t_roll_title"><img src="img/main/main_s_title3.jpg" alt="닥터맘지사 안내"/></h3>
            <div class="t_roll">
                <div class="slider1">
                    <?php
                            $sql = "select * from g5_member where mb_level = 7";
                            $result = sql_query($sql);

                            for ($i=0; $row = sql_fetch_array($result); $i++) {
                                $filepath = "./data/member/dr/". $row["mb_id"].".jpg";
                    ?>
                                <a href="<?php echo G5_URL ?>/branch_map.php?branch=<?php echo $row["mb_id"]?>">
                                <?php if(file_exists($filepath )){?>
                                <div class="slide"><img src="<?php echo $filepath ?>"><span class="t_roll_txt"><?php echo $row["mb_nick"] ?></span></div>
                                <?php } else{?>
                                <div class="slide"><img src="<?php echo G5_IMG_URL ?>/main/logo.jpg" style="width:168px; height:208px;"><span class="t_roll_txt"><?php echo $row["mb_nick"] ?></span></div>
                                <?php } ?>
                                    </a>

                    <?php } ?>


                </div>
            </div>
        </div>

    </div>







    <div class="banner4bg">
        <p><img src="img/main/banner4.png" alt="사랑스런 아기의 산후관리사 닥터맘 산후도우미"></p>
    </div>


<?php
include_once(G5_PATH.'/tail.php');
?>