<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(!(isset($day))){
    $day = 7;
}
if(!(isset($option))){
    $option = "wr_name";
}


if($member['mb_level'] == 7){  //지사  7레벨

    $pro_result_cnt = sql_fetch("
    select count(*) cnt from (select * from (

    select *, to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 1 
    union 
    select *, to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 2 
    union 
    select *, to_days('3001-01-01') - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 3 

    order by a asc) AS list where list.pro_send_date is null and res_branch = ".$member['mb_no']."
    and list.a <= ".$day." and list.a >= 0 and ".$option." like '%".$word."%') test");


//$pro_result_cnt = sql_fetch('select count(*) cnt from g5_write_promotion  where pro_send_date is null');
$totalPage  = ceil($pro_result_cnt['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage))){
     $currentPage = 1;
}
$current_first  = (int)($currentPage-1)*10;
$current_second  = (int)$currentPage*10;  


    $pro_result = sql_query("
    select * from (

    select *, to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 1 
    union 
    select *, to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 2 
    union 
    select *, to_days('3001-01-01') - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 3 

    order by a asc) AS list where list.pro_send_date is null and res_branch = ".$member['mb_no']." 
    and list.a <= ".$day." and list.a >= 0 and ".$option." like '%".$word."%'
    limit ".$current_first.",10"
    );






//100일
$pro_result_cnt2 = sql_fetch('
    
    select count(*) cnt from (select * from (select *,to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=1 order by pro_100_d_ck asc) list 
    
    where res_branch = '.$member['mb_no'].' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%") test');
//$pro_result_cnt2 = sql_fetch('select count(*) cnt from g5_write_promotion where pro_send_date is null and pro_type=1');
$totalPage2  = ceil($pro_result_cnt2['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage2))){
     $currentPage2 = 1;
}
$current_first2  = (int)($currentPage2-1)*10;
$current_second2  = (int)$currentPage2*10;  


    $pro_result_100 = sql_query('
    
    select * from (select *,to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=1 order by pro_100_d_ck asc) list 
    
    where res_branch = '.$member['mb_no'].' and list.a >= 0  and list.a <= '.$day.' and '.$option.' like "%'.$word.'%"
    
     order by list.a asc limit '.$current_first2.',10'
    );








//돌잔치
$pro_result_cnt3 = sql_fetch('
    
    select count(*) cnt from (select * from (select *,to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc) list 
    
    where res_branch = '.$member['mb_no'].' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%") test');
//$pro_result_cnt3 = sql_fetch('select count(*) cnt from g5_write_promotion where pro_send_date is null and pro_type=2');
$totalPage3  = ceil($pro_result_cnt3['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage3))){
     $currentPage3 = 1;
}
$current_first3  = (int)($currentPage3-1)*10;
$current_second3  = (int)$currentPage3*10;  


    $pro_result_1 = sql_query('
    
    select * from (select *,to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc) list 
    
    where res_branch = '.$member['mb_no'].' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%"
    
     order by list.a asc limit '.$current_first3.',10'
    );







// $pro_result_1 = sql_query('
// select * from g5_write_promotion where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc limit '.$current_first3.',10'
// );





//이벤트
//$pro_result_event = sql_query('select * from g5_write_promotion where pro_send_date is null and pro_type=3 order by pro_event asc');
//$pro_result_event_cnt = sql_fetch('select count(*) cnt from g5_write_promotion where pro_send_date is null and pro_type=3');
$pro_result_cnt4 = sql_fetch('
 select count(*) cnt from (select * from g5_write_promotion 
 
 where pro_send_date is null and pro_type=3 
 
 and res_branch = '.$member['mb_no'].' and '.$option.' like "%'.$word.'%"

 order by wr_id asc) test');
//$pro_result_cnt4 = sql_fetch('select count(*) cnt from g5_write_promotion where pro_send_date is null and pro_type=3');
$totalPage4  = ceil($pro_result_cnt4['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage4))){
     $currentPage4 = 1;
}
$current_first4  = (int)($currentPage4-1)*10;
$current_second4  = (int)$currentPage4*10; 




 $pro_result_event = sql_query('
 select * from g5_write_promotion 
 
 where pro_send_date is null and pro_type=3 
 
 and res_branch = '.$member['mb_no'].' and '.$option.' like "%'.$word.'%"

 order by wr_id asc limit '.$current_first4.',10'
 );



//  $pro_result_event = sql_query('
//  select * from g5_write_promotion where pro_send_date is null and pro_type=3 order by pro_1_y_ck asc limit '.$current_first4.',10'
//  );




//보낸 문자 
$pro_result_cnt5 = sql_fetch('
 select count(*) cnt from (select * from g5_write_promotion 
 
 where pro_send_date is not null 
 
 and res_branch = '.$member['mb_no'].' and '.$option.' like "%'.$word.'%"

 order by pro_send_date desc) test');      
//$pro_result_cnt5 = sql_fetch('select count(*) cnt from g5_write_promotion where pro_send_date is not null');
$totalPage5  = ceil($pro_result_cnt5['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage5))){
     $currentPage5 = 1;
}
$current_first5  = (int)($currentPage5-1)*10;
$current_second5  = (int)$currentPage5*10;  



 $pro_result_suc = sql_query('
 select * from g5_write_promotion 
 
 where pro_send_date is not null 
 
 and res_branch = '.$member['mb_no'].' and '.$option.' like "%'.$word.'%"

 order by pro_send_date desc limit '.$current_first5.',10'
 );



















}else{// 7레벨 이상~/////////////////////////////////////////////
if($res_branch == ""){
    $res_branch = "0";
}




//모두
if($res_branch == 0){
    $pro_result_cnt = sql_fetch("
    select count(*) cnt from (select * from (

    select *, to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 1 
    union 
    select *, to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 2 
    union 
    select *, to_days('3001-01-01') - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 3 

    order by a asc) AS list where list.pro_send_date is null and res_branch > ".$res_branch."
    and list.a <= ".$day." and list.a >= 0 and ".$option." like '%".$word."%') test");

    $totalPage  = ceil($pro_result_cnt['cnt'] / 10);  // 전체 페이지 계산
    if(!(isset($currentPage))){
        $currentPage = 1;
    }
    $current_first  = (int)($currentPage-1)*10;
    $current_second  = (int)$currentPage*10;  



    $pro_result = sql_query("
    select * from (

    select *, to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 1 
    union 
    select *, to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 2 
    union 
    select *, to_days('3001-01-01') - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 3 

    order by a asc) AS list where list.pro_send_date is null and res_branch > ".$res_branch."
    and list.a <= ".$day." and list.a >= 0  and ".$option." like '%".$word."%'
    limit ".$current_first.",10"
    );
}else{

    $pro_result_cnt = sql_fetch("
    select count(*) cnt from (select * from (

    select *, to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 1 
    union 
    select *, to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 2 
    union 
    select *, to_days('3001-01-01') - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 3 

    order by a asc) AS list where list.pro_send_date is null and res_branch = ".$res_branch."
    and list.a <= ".$day." and list.a >= 0 and ".$option." like '%".$word."%') test");

    $totalPage  = ceil($pro_result_cnt['cnt'] / 10);  // 전체 페이지 계산
    if(!(isset($currentPage))){
        $currentPage = 1;
    }
    $current_first  = (int)($currentPage-1)*10;
    $current_second  = (int)$currentPage*10;  



    $pro_result = sql_query("
    select * from (

    select *, to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 1 
    union 
    select *, to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 2 
    union 
    select *, to_days('3001-01-01') - TO_DAYS(now()) as a from g5_write_promotion where pro_type = 3 

    order by a asc) AS list where list.pro_send_date is null and res_branch = ".$res_branch."
    and list.a <= ".$day." and list.a >= 0 and ".$option." like '%".$word."%'
    limit ".$current_first.",10"
    );
}














//100일
 

if($res_branch == 0){

$pro_result_cnt2 = sql_fetch('
    
    select count(*) cnt from (select * from (select *,to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=1 order by pro_100_d_ck asc) list 
    
    where res_branch > '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%") test');
$totalPage2  = ceil($pro_result_cnt2['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage2))){
     $currentPage2 = 1;
}
$current_first2  = (int)($currentPage2-1)*10;
$current_second2  = (int)$currentPage2*10; 



    $pro_result_100 = sql_query('
    
    select * from (select *,to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=1 order by pro_100_d_ck asc) list 
    
    where res_branch > '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%"
    
     order by list.a asc limit '.$current_first2.',10'
    );
}else{
$pro_result_cnt2 = sql_fetch('
    
    select count(*) cnt from (select * from (select *,to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=1 order by pro_100_d_ck asc) list 
    
    where res_branch = '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%") test');
$totalPage2  = ceil($pro_result_cnt2['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage2))){
     $currentPage2 = 1;
}
$current_first2  = (int)($currentPage2-1)*10;
$current_second2  = (int)$currentPage2*10; 



    $pro_result_100 = sql_query('
    
    select * from (select *,to_days(pro_100_d_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=1 order by pro_100_d_ck asc) list 
    
    where res_branch = '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%"
    
     order by list.a asc limit '.$current_first2.',10'
    );
}







//돌잔치
 if($res_branch == 0){
$pro_result_cnt3 = sql_fetch('
    
    select count(*) cnt from (select * from (select *,to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc) list 
    
    where res_branch > '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%") test');
$totalPage3  = ceil($pro_result_cnt3['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage3))){
     $currentPage3 = 1;
}
$current_first3  = (int)($currentPage3-1)*10;
$current_second3  = (int)$currentPage3*10; 

    $pro_result_1 = sql_query('
    
    select * from (select *,to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc) list 
    
    where res_branch > '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%"
    
     order by list.a asc limit '.$current_first3.',10'
    );
}else{
$pro_result_cnt3 = sql_fetch('
    
    select count(*) cnt from (select * from (select *,to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc) list 
    
    where res_branch = '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%") test');
$totalPage3  = ceil($pro_result_cnt3['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage3))){
     $currentPage3 = 1;
}
$current_first3  = (int)($currentPage3-1)*10;
$current_second3  = (int)$currentPage3*10; 

    $pro_result_1 = sql_query('
    
    select * from (select *,to_days(pro_1_y_ck)-1 - TO_DAYS(now()) as a from g5_write_promotion 
    
    where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc) list 
    
    where res_branch = '.$res_branch.' and list.a >= 0 and list.a <= '.$day.' and '.$option.' like "%'.$word.'%"
    
     order by list.a asc limit '.$current_first3.',10'
    );
}






// $pro_result_1 = sql_query('
// select * from g5_write_promotion where pro_send_date is null and pro_type=2 order by pro_1_y_ck asc limit '.$current_first3.',10'
// );





//이벤트
//$pro_result_event = sql_query('select * from g5_write_promotion where pro_send_date is null and pro_type=3 order by pro_event asc');
//$pro_result_event_cnt = sql_fetch('select count(*) cnt from g5_write_promotion where pro_send_date is null and pro_type=3');




if($res_branch == 0){
$pro_result_cnt4 = sql_fetch('
 select count(*) cnt from (select * from g5_write_promotion 
 
 where pro_send_date is null and pro_type=3 
 
 and res_branch > '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by wr_id asc) test');
$totalPage4  = ceil($pro_result_cnt4['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage4))){
     $currentPage4 = 1;
}
$current_first4  = (int)($currentPage4-1)*10;
$current_second4  = (int)$currentPage4*10; 



 $pro_result_event = sql_query('
 select * from g5_write_promotion 
 
 where pro_send_date is null and pro_type=3 
 
 and res_branch > '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by wr_id asc limit '.$current_first4.',10'
 );

}else{
$pro_result_cnt4 = sql_fetch('
 select count(*) cnt from (select * from g5_write_promotion 
 
 where pro_send_date is null and pro_type=3 
 
 and res_branch = '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by wr_id asc) test');
$totalPage4  = ceil($pro_result_cnt4['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage4))){
     $currentPage4 = 1;
}
$current_first4  = (int)($currentPage4-1)*10;
$current_second4  = (int)$currentPage4*10; 



 $pro_result_event = sql_query('
 select * from g5_write_promotion 
 
 where pro_send_date is null and pro_type=3 
 
 and res_branch = '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by wr_id asc limit '.$current_first4.',10'
    );
}

//  $pro_result_event = sql_query('
//  select * from g5_write_promotion where pro_send_date is null and pro_type=3 order by pro_1_y_ck asc limit '.$current_first4.',10'
//  );




//보낸 문자       
 


if($res_branch == 0){
$pro_result_cnt5 = sql_fetch('
 select count(*) cnt from (select * from g5_write_promotion 
 
 where pro_send_date is not null 
 
 and res_branch > '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by pro_send_date desc) test');
 
$totalPage5  = ceil($pro_result_cnt5['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage5))){
     $currentPage5 = 1;
}
$current_first5  = (int)($currentPage5-1)*10;
$current_second5  = (int)$currentPage5*10; 

 $pro_result_suc = sql_query('
 select * from g5_write_promotion 
 
 where pro_send_date is not null 
 
 and res_branch > '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by pro_send_date desc limit '.$current_first5.',10'
 );

}else{
$pro_result_cnt5 = sql_fetch('
 select count(*) cnt from (select * from g5_write_promotion 
 
 where pro_send_date is not null 
 
 and res_branch = '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by pro_send_date desc) test');
$totalPage5  = ceil($pro_result_cnt5['cnt'] / 10);  // 전체 페이지 계산
if(!(isset($currentPage5))){
     $currentPage5 = 1;
}
$current_first5  = (int)($currentPage5-1)*10;
$current_second5  = (int)$currentPage5*10; 




 $pro_result_suc = sql_query('
 select * from g5_write_promotion 
 
 where pro_send_date is not null 
 
 and res_branch = '.$res_branch.' and '.$option.' like "%'.$word.'%"

 order by pro_send_date desc limit '.$current_first5.',10'
 );
}


// $pro_result_suc = sql_query('
// select * from g5_write_promotion where pro_send_date is not null order by pro_send_date desc limit '.$current_first5.',10'
// );



//$pro_result_suc_cnt = sql_fetch('select count(*) cnt from g5_write_promotion where pro_send_date is not null');

}/////////////////////////////////////////////////////// 여기까지 관리자





//문자 내용
$pro_result_message = sql_fetch('select * from g5_promotion_message where me_id = 1');
?>



<style>
    /* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.pro_100_d, .pro_1_y, .pro_event, .suc{
    display: none;
}
.cjy_list_170331{
    color:#333;
    font-weight:normal;
    cursor:pointer;
}
.cjy_list_170331:hover{
    background-color:#aaa !important;
}
.pro_date{
    color:white;
}
.info_text{
	background:rgba(242,244,247,1);
	color:black;
	font-weight:bold;
	padding: 10px 20px;
	margin:0 0 20px 0;
	font-size:13px;
	border-radius:5px;
}
.info_text i{margin-right:10px;}
</style>

<div class="info_text"><i class="fa fa-check" aria-hidden="true"></i>남은기간이 0 일이 되면 자동으로 SMS 문자가 발송됩니다.</div>

<div class="tab">

<? if($pro_option == 'all'){ ?>
  <button class="tablinks active" id='all'>모두</button>
  <button class="tablinks" id='pro_100_d'>100일</button>
  <button class="tablinks" id='pro_1_y'>첫돌</button>
  <button class="tablinks" id='pro_event'>이벤트</button>
  <button class="tablinks" id='suc'>보내기 완료</button>
<? } ?>

<? if($pro_option == 'pro_100_d'){ ?>
  <button class="tablinks" id='all'>모두</button>
  <button class="tablinks active" id='pro_100_d'>100일</button>
  <button class="tablinks" id='pro_1_y'>첫돌</button>
  <button class="tablinks" id='pro_event'>이벤트</button>
  <button class="tablinks" id='suc'>보내기 완료</button>
<? } ?>

<? if($pro_option == 'pro_1_y'){ ?>
  <button class="tablinks" id='all'>모두</button>
  <button class="tablinks" id='pro_100_d'>100일</button>
  <button class="tablinks active" id='pro_1_y'>첫돌</button>
  <button class="tablinks" id='pro_event'>이벤트</button>
  <button class="tablinks" id='suc'>보내기 완료</button>
<? } ?>

<? if($pro_option == 'pro_event'){ ?>
  <button class="tablinks" id='all'>모두</button>
  <button class="tablinks" id='pro_100_d'>100일</button>
  <button class="tablinks" id='pro_1_y'>첫돌</button>
  <button class="tablinks active" id='pro_event'>이벤트</button>
  <button class="tablinks" id='suc'>보내기 완료</button>
<? } ?>

<? if($pro_option == 'suc'){ ?>
  <button class="tablinks" id='all'>모두</button>
  <button class="tablinks" id='pro_100_d'>100일</button>
  <button class="tablinks" id='pro_1_y'>첫돌</button>
  <button class="tablinks" id='pro_event'>이벤트</button>
  <button class="tablinks active" id='suc'>보내기 완료</button>
<? } ?>


<fieldset id="bo_sch" style='margin-top:4px; margin-right:20px;'>
    <legend>게시물 검색</legend>
    <form name="fsearch" action='./dr_board.php' method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
        <label for="option" class="sound_only">검색대상</label>
        <?php if($member['mb_level'] > 7) echo get_branch_name_select("res_branch",$res_branch, ' class="frm_input" ') ?>
        <select name="day" id="day" class="day te">
            <option value="1" <?if($day==1) echo "selected"?>  >1일전</option> 
            <option value="3" <?if($day==3) echo "selected"?>  >3일전</option>  
            <option value="7" <?if($day==7) echo "selected"?>  >7일전</option>            
            <option value="15" <?if($day==15) echo "selected"?>  >15일전</option>
            <option value="30" <?if($day==30) echo "selected"?>  >30일전</option>
            <option value="1000000" <?if($day==1000000) echo "selected"?>  >모두보기</option>
        </select>
        <select name="option" id="option" class="option">
            <option value="wr_name" <?if($option=="wr_name") echo "selected"?> >이름</option>
            <option value="phone" <?if($option=="phone") echo "selected"?> >전화번호</option>
        </select>
        <label for="word" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="word"  id="word" class="frm_input" size="15" maxlength="20" value=<?=$word?>>
        <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>


</div>
<br><br>



<div id="" class="tabcontent all">
<div id="bo_list" style="width:<?php echo $width; ?>">



    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($pro_result_cnt['cnt']) ?>건</span>
            <?php echo $totalPage ?> 페이지
        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" id='bo_table' value="<?php echo $bo_table ?>">
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="day" id='day' value="<?php echo $day ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" class='checked1' id="chkall" ck='no'>
            </th>
            <?php } ?>
            <th scope="col">이름</th>
            <th scope="col">연락처</th>
            <th scope="col">문자 종류</th>
            <th scope="col">남은 기간</th>
            <th scope="col">메시지 보내기</th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
         while ($list = sql_fetch_array($pro_result)){ 
         ?>
        
        <tr class="<?php if ($list['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list['wr_id'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list['subject'] ?></label>
                <input type="checkbox" class='checked1_1' name="chk_wr_id[]" value="<?php echo $list['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_date">
                <a href="./dr_write.php?bo_table=reservation&w=u&wr_id=<?php echo $list['pro_id'] ?>&page=<?php echo $page.$qstr ?>">
                <?php echo $list['wr_name'] ?>
                    </a>
            </td>
            <td class="td_date sv_use"><?php echo $list['phone'] ?></td>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div class=""><?php echo $list['pro_type_name'] ?></div>
	        </td>
            <?php if ($list['pro_type'] == 1) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_100_d_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 2) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_1_y_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 3) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_event'] ?></td><?php } ?>
            <?php if (!($list['pro_send_date'])) { ?><td class="td_num"><div class='cjy_list_170331' wr='<?=$list['wr_id']?>'  wrtpe='<?=$list['pro_type']?>'  >보내기</div></td><?php } ?>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if ($list) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택보내기" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<div class='page1' resBranch="<?php echo $res_branch ?>" day="<?php echo $day?>" option="<?php echo $option?>" word="<?php echo $word?>" >


<?php
if($totalPage > 1){
    include_once('promotion_pagenation.php');
}
?>
</div>

</div>





















<div id="" class="tabcontent pro_100_d">
<div id="bo_list" style="width:<?php echo $width; ?>">



    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($pro_result_cnt2['cnt']) ?>건</span>
            <?php echo $totalPage2 ?> 페이지
        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" id='bo_table' value="<?php echo $bo_table ?>">
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="day" id='day' value="<?php echo $day ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" class='checked2' onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">이름</th>
            <th scope="col">연락처</th>
            <th scope="col">문자 종류</th>
            <th scope="col">남은 기간</th>
            <th scope="col">메시지 보내기</th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php

         while ($list = sql_fetch_array($pro_result_100)){ 
         ?>
        <tr class="<?php if ($list['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list['wr_id'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]"  class='checked2_2' value="<?php echo $list['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_date">
                <a href="./dr_write.php?bo_table=reservation&w=u&wr_id=<?php echo $list['pro_id'] ?>&page=<?php echo $page.$qstr ?>">
                <?php echo $list['wr_name'] ?>
                    </a>
            </td>
            <td class="td_date sv_use"><?php echo $list['phone'] ?></td>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div class=""><?php echo $list['pro_type_name'] ?></div>
	        </td>
            <?php if ($list['pro_type'] == 1) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_100_d_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 2) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_1_y_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 3) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_event'] ?></td><?php } ?>
            <td class="td_num"><div class='cjy_list_170331' wr='<?=$list['wr_id']?>' wrtpe='<?=$list['pro_type']?>'>보내기</div></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if ($list) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택보내기" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<div class='page2'>
<?php
if($totalPage2 > 1){
include_once('promotion_pagenation2.php');
}
?>
</div>

</div>
































<div id="" class="tabcontent pro_1_y">
<div id="bo_list" style="width:<?php echo $width; ?>">



    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($pro_result_cnt3['cnt']) ?>건</span>
            <?php echo $totalPage3 ?> 페이지
        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" id='bo_table' value="<?php echo $bo_table ?>">
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="day" id='day' value="<?php echo $day ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" class='checked3' onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">이름</th>
            <th scope="col">연락처</th>
            <th scope="col">문자 종류</th>
            <th scope="col">남은 기간</th>
            <th scope="col">메시지 보내기</th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php

         while ($list = sql_fetch_array($pro_result_1)){ 
         ?>
        <tr class="<?php if ($list['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list['wr_id'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" class='checked3_3' value="<?php echo $list['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_date">
                <a href="./dr_write.php?bo_table=reservation&w=u&wr_id=<?php echo $list['pro_id'] ?>&page=<?php echo $page.$qstr ?>">
                <?php echo $list['wr_name'] ?>
                    </a>
            </td>
            <td class="td_date sv_use"><?php echo $list['phone'] ?></td>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div class=""><?php echo $list['pro_type_name'] ?></div>
	        </td>
            <?php if ($list['pro_type'] == 1) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_100_d_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 2) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_1_y_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 3) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_event'] ?></td><?php } ?>
            <td class="td_num"><div class='cjy_list_170331' wr='<?=$list['wr_id']?>' wrtpe='<?=$list['pro_type']?>'>보내기</div></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if ($list) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택보내기" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<div class='page3'>
<?php
if($totalPage3 > 1){
include_once('promotion_pagenation3.php');
}
?>
</div>

</div>







































<div id="" class="tabcontent pro_event">
<div id="bo_list" style="width:<?php echo $width; ?>">



    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($pro_result_cnt4['cnt']) ?>건</span>
            <?php echo $totalPage4  ?> 페이지
        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" id='bo_table' value="<?php echo $bo_table ?>">
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="day" id='day' value="<?php echo $day ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" class='checked4' onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">이름</th>
            <th scope="col">연락처</th>
            <th scope="col">문자 종류</th>
            <th scope="col">남은 기간</th>
            <th scope="col">메시지 보내기</th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php

         while ($list = sql_fetch_array($pro_result_event)){ 
         ?>
        <tr class="<?php if ($list['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list['wr_id'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" class='checked4_4' value="<?php echo $list['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_date">
                <a href="./dr_write.php?bo_table=reservation&w=u&wr_id=<?php echo $list['pro_id'] ?>&page=<?php echo $page.$qstr ?>">
                <?php echo $list['wr_name'] ?>
                    </a>
            </td>
            <td class="td_date sv_use"><?php echo $list['phone'] ?></td>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div class=""><?php echo $list['pro_type_name'] ?></div>
	        </td>
            <?php if ($list['pro_type'] == 1) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_100_d_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 2) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_1_y_ck'] ?></td><?php } ?>
            <?php if ($list['pro_type'] == 3) { ?><td class="td_date pro_date" typ='<?=$list['pro_type']?>' id='pro_date'><?php echo $list['pro_event'] ?></td><?php } ?>
            <td class="td_num"><div class='cjy_list_170331' wr='<?=$list['wr_id']?>' wrtpe='<?=$list['pro_type']?>'>보내기</div></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if ($list) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택보내기" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>
<div class='page4'>
<?php
if($totalPage4 > 1){
include_once('promotion_pagenation4.php');
}
?>
</div>

</div>































<div id="" class="tabcontent suc">
<div id="bo_list" style="width:<?php echo $width; ?>">



    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($pro_result_cnt5['cnt']) ?>건</span>
            <?php echo $totalPage5 ?> 페이지
        </div>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" id='bo_table' value="<?php echo $bo_table ?>">
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="day" id='day' value="<?php echo $day ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" class='checked5' onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">이름</th>
            <th scope="col">연락처</th>
            <th scope="col">문자 종류</th>
            <th scope="col">발송 날짜</th>
            <th scope="col">메시지 보내기</th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php

         while ($list = sql_fetch_array($pro_result_suc)){ 
         ?>
        <tr class="<?php if ($list['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list['wr_id'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" class='checked5_5' value="<?php echo $list['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_date">
                <a href="./dr_write.php?bo_table=reservation&w=u&wr_id=<?php echo $list['pro_id'] ?>&page=<?php echo $page.$qstr ?>">
                <?php echo $list['wr_name'] ?>
                    </a>
            </td>
            <td class="td_date sv_use"><?php echo $list['phone'] ?></td>
            <td class="td_date sv_use td_type" style="padding:5px;">
				<div class=""><?php echo $list['pro_type_name'] ?></div>
	        </td>
            <td class="td_date"><?php echo $list['pro_send_date'] ?></td>
            <td class="td_num"><div class='cjy_list_170331' wr='<?=$list['wr_id']?>' wrtpe='<?=$list['pro_type']?>'>보내기 완료</div></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if ($list) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택보내기" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>


<form name="pro_submit" id="pro_submit" action="./promotion_send.php" method="post">
    <input type='hidden' name='test' value='123'>
    <input type='hidden' name='wr_id'id='wr_id' value=''>
    <input type="hidden" name="pro_option" id='pro_option' value="<?php echo $pro_option ?>">
    <input type="hidden" name="res_branch" id='res_branch' value="<?php echo $res_branch ?>">
    <input type="hidden" name="day" id='day' value="<?php echo $day ?>">
    <input type="hidden" name="option" id='option' value="<?php echo $option ?>">
    <input type="hidden" name="word" id='word' value="<?php echo $word ?>">
</form>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>
<div class='page5'>
<?php
if($totalPage5 > 1){
include_once('promotion_pagenation5.php');
}
?>
</div>

</div>


<div class='pro_result_message' val1='<?=$pro_result_message["pro_message_100"]?>' val2=<?=$pro_result_message['pro_message_1']?> val3=<?=$pro_result_message['pro_message_event']?>  > </div>




























<script>
    $(function(){
        if( $('#pro_option').attr('value') == 'suc' || $('#pro_option').attr('value') == 'pro_event'  ){
            $('.te').attr('disabled','disabled');
        }

        $('#bo_list .td_type div').each(function(){
            if($(this).text() == '100일'){
                $(this).css('color','red');
            }else if($(this).text() == '첫돌'){
                $(this).css('color','blue');
            }else if($(this).text() == '이벤트'){
                $(this).css('color','gray');
            }
        })


        $('.cjy_list_170331').click(function(){
            var ck = $(this).attr('wrtpe');

            if(ck == 1){
                var result = confirm($('.pro_result_message').attr('val1')+'\n\n메시지를 보내시겠습니까?');
            }else if(ck == 2){
                var result = confirm($('.pro_result_message').attr('val2')+'\n\n메시지를 보내시겠습니까?');
            }else if(ck == 3){
                var result = confirm($('.pro_result_message').attr('val3')+'\n\n메시지를 보내시겠습니까?');
            }
            


            if(result) { 
                $('#wr_id').attr('value', $(this).attr('wr'));
                $('#pro_submit').submit();
            }
        })



        $('.pro_date').each(function(){
            var today = new Date();  
            var dateString = $(this).text();  
            var dateArray = dateString.split("-");  
            
            var dateObj = new Date(dateArray[0], Number(dateArray[1])-1, dateArray[2]);  
            
            var betweenDay = (today.getTime() - dateObj.getTime())/1000/60/60/24;  
            

            var text;
            if($(this).attr('typ') == 1){
                var text = -1*(parseInt(betweenDay));
            }else if($(this).attr('typ') == 2){
                var text = -1*(parseInt(betweenDay));
            } 

            if(text >= 0){
                if(text < 10){
                    $(this).css('color','red'); 
                }else{
                    $(this).css('color','black');
                }
                    $(this).text(text + "일");
            }else{
                //$(this).css('color','black');
               $(this).text(""); 
            }
           
        })
        
        $('.tablinks').click(function(){
            $('.tablinks').removeClass('active');
            $(this).addClass('active');
            $('.tabcontent').css('display','none');
            $('.'+$(this).attr('id')).css('display','block');
            $('#pro_option').attr('value',$(this).attr("id"));
        })

        $('#all').click(function(){
            $('.te').removeAttr('disabled');
        })

        $('#pro_100_d').click(function(){
            $('.te').removeAttr('disabled');
        }) 

        $('#pro_1_y').click(function(){
            $('.te').removeAttr('disabled');
        })

          $('#pro_event').click(function(){
            $('.te').attr('disabled','disabled');
        })      

        $('#suc').click(function(){
             $('.te').attr('disabled','disabled');
        })        

        <?if($pro_option == 'all'){?>
            $('.tabcontent').css('display','none');
            $('.all').css('display','block');
        <?}?>

        <?if($pro_option == 'pro_100_d'){?>
            $('.tabcontent').css('display','none');
            $('.pro_100_d').css('display','block');
        <?}?>

        <?if($pro_option == 'pro_1_y'){?>
            $('.tabcontent').css('display','none');
            $('.pro_1_y').css('display','block');
        <?}?>

        <?if($pro_option == 'pro_event'){?>
            $('.tabcontent').css('display','none');
            $('.pro_event').css('display','block');
        <?}?>

        <?if($pro_option == 'suc'){?>
            $('.tabcontent').css('display','none');
            $('.suc').css('display','block');
        <?}?>



        $('.checked1').click(function(){
            if( $('.checked1').attr('ck') == 'yes' ){
                $('.checked1_1').prop('checked',false);    
                $('.checked1').attr('ck','no');
            }else{
                $('.checked1_1').prop('checked',true);    
                $('.checked1').attr('ck','yes');
            }
        })

        $('.checked2').click(function(){
            if( $('.checked2').attr('ck') == 'yes' ){
                $('.checked2_2').prop('checked',false);    
                $('.checked2').attr('ck','no');
            }else{
                $('.checked2_2').prop('checked',true);    
                $('.checked2').attr('ck','yes');
            }
        })

        $('.checked3').click(function(){
            if( $('.checked3').attr('ck') == 'yes' ){
                $('.checked3_3').prop('checked',false);    
                $('.checked3').attr('ck','no');
            }else{
                $('.checked3_3').prop('checked',true);    
                $('.checked3').attr('ck','yes');
            }
        })

        $('.checked4').click(function(){
            if( $('.checked4').attr('ck') == 'yes' ){
                $('.checked4_4').prop('checked',false);    
                $('.checked4').attr('ck','no');
            }else{
                $('.checked4_4').prop('checked',true);    
                $('.checked4').attr('ck','yes');
            }
        })

        $('.checked5').click(function(){
            if( $('.checked5').attr('ck') == 'yes' ){
                $('.checked5_5').prop('checked',false);    
                $('.checked5').attr('ck','no');
            }else{
                $('.checked5_5').prop('checked',true);    
                $('.checked5').attr('ck','yes');
            }
        })

    })
</script>