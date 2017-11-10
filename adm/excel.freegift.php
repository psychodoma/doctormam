<?php
header( "Content-type: application/vnd.ms-excel; charset=utf-8");
header( "Content-Disposition: attachment; filename = freegift.xls" );
header( "Content-Description: PHP4 Generated Data" );
echo "<meta content=\"application/vnd.ms-excel; charset=UTF-8\" name=\"Content-type\"> ";
?>
<html>
<head></head>
<body>
<?php
include_once('./_common.php');

if (!$board['bo_table']) {
   alert('존재하지 않는 게시판입니다.', G5_URL);
}

check_device($board['bo_device']);

if (isset($write['wr_is_comment']) && $write['wr_is_comment']) {
    goto_url('./board.php?bo_table='.$bo_table.'&amp;wr_id='.$write['wr_parent'].'#c_'.$wr_id);
}




if(!(isset($day))){
    $day = 7;
}
if(!(isset($option))){
    $option = "wr_name";
}


if($page){
	$page_math = ($page-1) * 10;
}else{
	$page_math = 0;
}



	if( $pro_option == "all" ){  //모두 보기일때///

		$sql = "select * from g5_write_reservation where wr_1 != '' and wr_2 = '' ";
		$sql_cnt = "select count(*) cnt from g5_write_reservation where wr_1 != '' and wr_2 = '' ";
		
	}else if( $pro_option == "complete" ){  // 보낸 사은품 일때//

		$sql = "select * from g5_write_reservation where wr_2 != '' ";
		$sql_cnt = "select count(*) cnt from g5_write_reservation where wr_2 != '' ";

	}else{  // 사은품 일때 //

		$sql = "select * from g5_write_reservation where wr_1 = ".$pro_option." and wr_2 = '' ";
		$sql_cnt = "select count(*) cnt from g5_write_reservation where wr_1 = ".$pro_option." and wr_2 = '' ";

	} 

	if( $member['mb_level'] == 7 ){
		$sql .= " and res_branch = ".$member['mb_no'];
		$sql_cnt .= " and res_branch = ".$member['mb_no'];	
	}


		if( $word ){
			$sql .= " and ".$option." like '%".$word."%' ";
			$sql_cnt .= " and ".$option." like '%".$word."%' ";
		}

		if( $res_branch ){
			$sql .= " and res_branch = ".$res_branch;
			$sql_cnt .= " and res_branch = ".$res_branch;
		}

		if( $month ){
			$sql .= " and substr(wr_2,1,7) = '".$month."' ";
			$sql_cnt .= " and substr(wr_2,1,7) = '".$month."' ";
		}

		if( $pro_option == "complete" ){
			$sql .= " order by wr_2  desc ";
		}

		//$sql .= " limit ".$page_math." ,10  ";

		$free_result = sql_query($sql);
		$free_result_cnt = sql_fetch($sql_cnt);
		
		$totalPage  = ceil($free_result_cnt['cnt'] / 10);  // 전체 페이지 계산
		if(!(isset($currentPage))){
			 $currentPage = 1;
		}
		$current_first  = (int)($currentPage-1)*10;
		$current_second  = (int)$currentPage*10;  


//문자 내용
$pro_result_message = sql_fetch('select * from g5_promotion_message where me_id = 1');


$free_tab_value = sql_query('select * from g5_write_freegift where wr_2 >= current_Date() order by wr_num desc ');

?>
<?php if($board['bo_skin']=="freegift"){?>
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col" style='width:80px;'>번호</th>
            <th scope="col" style='width:120px;'>지사</th>
            <th scope="col" style='width:70px;'>이름</th>
            <th scope="col" style='width:100px;'>연락처</th>
            <th scope="col" style='width:350px;'>주소</th>
            <th scope="col" style='width:350px;'>사은품 종류</th>
            <th scope="col" style='width:120px;'>아기성별</th>
			<th scope="col" style='width:130px;'>보낸 날짜</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($list = sql_fetch_array($free_result)){ 
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num" style='text-align:center;'>
			<?
            if ($list['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list['wr_id'];
             ?>
			</td>
            <td class="td_date" style='text-align:center;'><?=get_branch_nick($list['res_branch'])?></td>
            <td class="td_date sv_use" style='text-align:center;'><?php echo $list['wr_name'] ?></td>
            <td class="td_date sv_use" style='text-align:center;'><?php echo $list['phone'] ?></td>
            <td class="td_date sv_use" style='text-align:center;'><?php echo $list['addr1'] ?> <?php echo $list['addr2'] ?> <?php echo $list['addr3'] ?></td>
            <td class="td_date" style='text-align:center;'><?=get_freegift_subject($list['wr_1'])?></td>
            <td class="td_num" style='text-align:center;'><?php echo $list['wr_baby_sex']?></td>
			<td class="td_date" style='text-align:center;'><?=$list['wr_2']?></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>

</div>
</body>
<?php }else if($board['bo_skin']=="basic"){?>
<div id="bo_list" style="width:<?php echo $width; ?>">
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>

        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->


    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">글쓴이</th>
            <th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
            <th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['num'];
             ?>
            </td>
            <td class="td_subject">
                <?php
                echo $list[$i]['icon_reply'];
                if ($is_category && $list[$i]['ca_name']) {
                 ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                <?php } ?>

                <a href="<?php echo $list[$i]['href'] ?>">
                    <?php echo $list[$i]['subject'] ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
                </a>
            </td>
            <td class="td_name sv_use"><?php echo $list[$i]['name'] ?></td>
            <td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
            <td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>
</div>



<?php }else if($board['bo_skin']=="gallery"){?>
<div id="bo_gall" style="width:<?php echo $width; ?>">

    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
       </div>
    </div>

    <ul id="gall_ul">
        <?php for ($i=0; $i<count($list); $i++) {
            if($i>0 && ($i % $bo_gallery_cols == 0))
                $style = 'clear:both;';
            else
                $style = '';
            if ($i == 0) $k = 0;
            $k += 1;
            if ($k % $bo_gallery_cols == 0) $style .= "margin:0 !important;";
         ?>
        <li class="gall_li <?php if ($wr_id == $list[$i]['wr_id']) { ?>gall_now<?php } ?>" style="<?php echo $style ?>width:<?php echo $board['bo_gallery_width'] ?>px">

            <span class="sound_only">
                <?php
                if ($wr_id == $list[$i]['wr_id'])
                    echo "<span class=\"bo_current\">열람중</span>";
                else
                    echo $list[$i]['num'];
                 ?>
            </span>
            <ul class="gall_con">
                <li class="gall_href">
                    <a href="<?php echo $list[$i]['href'] ?>">
                    <?php
                    if ($list[$i]['is_notice']) { // 공지사항  ?>
                        <strong style="width:<?php echo $board['bo_gallery_width'] ?>px;height:<?php echo $board['bo_gallery_height'] ?>px">공지</strong>
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
                    </a>
                </li>
                <li class="gall_text_href" style="width:<?php echo $board['bo_gallery_width'] ?>px">
                    <?php
                    // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                    if ($is_category && $list[$i]['ca_name']) {
                     ?>
                    <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                    <?php } ?>
                    <a href="<?php echo $list[$i]['href'] ?>">
                        <?php echo $list[$i]['subject'] ?>
                        <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
                    </a>

                </li>
                <li><span class="gall_subject">작성자 </span><?php echo $list[$i]['name'] ?></li>
                <li><span class="gall_subject">작성일 </span><?php echo $list[$i]['datetime2'] ?></li>
                <li><span class="gall_subject">조회 </span><?php echo $list[$i]['wr_hit'] ?></li>
                <?php if ($is_good) { ?><li><span class="gall_subject">추천</span><strong><?php echo $list[$i]['wr_good'] ?></strong></li><?php } ?>
                <?php if ($is_nogood) { ?><li><span class="gall_subject">비추천</span><strong><?php echo $list[$i]['wr_nogood'] ?></strong></li><?php } ?>
            </ul>
        </li>
        <?php } ?>
    </ul>


</div>

<?php } ?>
</html>