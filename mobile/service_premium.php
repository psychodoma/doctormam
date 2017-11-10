<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');


function get_branch_name_select1()
{	
    $sql = " select mb_branch,mb_no from g5_member where (mb_level = '7' or mb_level = '9') and (".get_location('서울').") order by mb_level desc, mb_nick asc";
    $result = sql_query($sql);
    $str = '<div class="sub3_3_tc">
	        	<h3 class="sub3_3_tc_title">서울지역</h3>
				<table summary="지역,이름" class="sub3_3_table">
					<caption>명단</caption>
						<colgroup>
							<col width="17%"/>
							<col width="*%"/>
						</colgroup>
						<tbody>';
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
		if($row['mb_no'] != 2){
			$ck = 0;
			$str .= '<tr>
						<td class="t_strong1">'.$row['mb_branch'].'</td>
						<td class="borderR_none">';
			$sql_level5 = " select mb_name,mb_branch from g5_member where mb_level = 5 and mb_grade = '프리미엄'  and (mb_leave_date = '' or  mb_leave_date > date(now()) )";
			$result_5 = sql_query($sql_level5);		
			for($j=0; $lv5=sql_fetch_array($result_5); $j++){
				if ($row['mb_no'] == $lv5['mb_branch']){
					if($ck == 0){
						$str .= $lv5['mb_name'];
						$ck = 1;
					}else{
						$str .= ', '.$lv5['mb_name'];
					}
					
				} 
			}
		}
		$str .= '</td></tr>';
    }
	$str .= '</tbody></table></div>';

	echo $str;












    $sql = " select mb_branch,mb_no from g5_member where (mb_level = '7' or mb_level = '9') and (".get_location('경인').") order by mb_level desc, mb_nick asc";
    $result = sql_query($sql);
    $str = '<div class="sub3_3_tc">
	        	<h3 class="sub3_3_tc_title">경인지역</h3>
				<table summary="지역,이름" class="sub3_3_table">
					<caption>명단</caption>
						<colgroup>
							<col width="17%"/>
							<col width="*%"/>
						</colgroup>
						<tbody>';
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
		if($row['mb_no'] != 2){
			$ck = 0;
			$str .= '<tr>
						<td class="t_strong1">'.$row['mb_branch'].'</td>
						<td class="borderR_none">';
			$sql_level5 = " select mb_name,mb_branch from g5_member where mb_level = 5 and mb_grade = '프리미엄'  and (mb_leave_date = '' or  mb_leave_date > date(now()) )";
			$result_5 = sql_query($sql_level5);		
			for($j=0; $lv5=sql_fetch_array($result_5); $j++){
				if ($row['mb_no'] == $lv5['mb_branch']){
					if($ck == 0){
						$str .= $lv5['mb_name'];
						$ck = 1;
					}else{
						$str .= ', '.$lv5['mb_name'];
					}
					
				} 
			}
		}
		$str .= '</td></tr>';
    }
	$str .= '</tbody></table></div>';

	echo $str;















    $sql = " select mb_branch,mb_no from g5_member where (mb_level = '7' or mb_level = '9') and (".get_location('경기').") order by mb_level desc, mb_nick asc";
    $result = sql_query($sql);
    $str = '<div class="sub3_3_tc">
	        	<h3 class="sub3_3_tc_title">경기</h3>
				<table summary="지역,이름" class="sub3_3_table">
					<caption>명단</caption>
						<colgroup>
							<col width="17%"/>
							<col width="*%"/>
						</colgroup>
						<tbody>';
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
		if($row['mb_no'] != 2){
			$ck = 0;
			$str .= '<tr>
						<td class="t_strong1">'.$row['mb_branch'].'</td>
						<td class="borderR_none">';
			$sql_level5 = " select mb_name,mb_branch from g5_member where mb_level = 5 and mb_grade = '프리미엄'  and (mb_leave_date = '' or  mb_leave_date > date(now()) )";
			$result_5 = sql_query($sql_level5);		
			for($j=0; $lv5=sql_fetch_array($result_5); $j++){
				if ($row['mb_no'] == $lv5['mb_branch']){
					if($ck == 0){
						$str .= $lv5['mb_name'];
						$ck = 1;
					}else{
						$str .= ', '.$lv5['mb_name'];
					}
					
				} 
			}
		}
		$str .= '</td></tr>';
    }
	$str .= '</tbody></table></div>';

	echo $str;









    $sql = " select mb_branch,mb_no from g5_member where (mb_level = '7' or mb_level = '9') and (".get_location('충청/전북').") order by mb_level desc, mb_nick asc";
    $result = sql_query($sql);
    $str = '<div class="sub3_3_tc">
	        	<h3 class="sub3_3_tc_title">충청/전북</h3>
				<table summary="지역,이름" class="sub3_3_table">
					<caption>명단</caption>
						<colgroup>
							<col width="17%"/>
							<col width="*%"/>
						</colgroup>
						<tbody>';
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
		if($row['mb_no'] != 2){
			$ck = 0;
			$str .= '<tr>
						<td class="t_strong1">'.$row['mb_branch'].'</td>
						<td class="borderR_none">';
			$sql_level5 = " select mb_name,mb_branch from g5_member where mb_level = 5 and mb_grade = '프리미엄'  and (mb_leave_date = '' or  mb_leave_date > date(now()) )";
			$result_5 = sql_query($sql_level5);		
			for($j=0; $lv5=sql_fetch_array($result_5); $j++){
				if ($row['mb_no'] == $lv5['mb_branch']){
					if($ck == 0){
						$str .= $lv5['mb_name'];
						$ck = 1;
					}else{
						$str .= ', '.$lv5['mb_name'];
					}
					
				} 
			}
		}
		$str .= '</td></tr>';
    }
	$str .= '</tbody></table></div>';

	echo $str;















    $sql = " select mb_branch,mb_no from g5_member where (mb_level = '7' or mb_level = '9') and (".get_location('경상남북').") order by mb_level desc, mb_nick asc";
    $result = sql_query($sql);
    $str = '<div class="sub3_3_tc">
	        	<h3 class="sub3_3_tc_title">경상남북</h3>
				<table summary="지역,이름" class="sub3_3_table">
					<caption>명단</caption>
						<colgroup>
							<col width="17%"/>
							<col width="*%"/>
						</colgroup>
						<tbody>';
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
		if($row['mb_no'] != 2){
			$ck = 0;
			$str .= '<tr>
						<td class="t_strong1">'.$row['mb_branch'].'</td>
						<td class="borderR_none">';
			$sql_level5 = " select mb_name,mb_branch from g5_member where mb_level = 5 and mb_grade = '프리미엄'  and (mb_leave_date = '' or  mb_leave_date > date(now()) )";
			$result_5 = sql_query($sql_level5);		
			for($j=0; $lv5=sql_fetch_array($result_5); $j++){
				if ($row['mb_no'] == $lv5['mb_branch']){
					if($ck == 0){
						$str .= $lv5['mb_name'];
						$ck = 1;
					}else{
						$str .= ', '.$lv5['mb_name'];
					}
					
				} 
			}
		}
		$str .= '</td></tr>';
    }
	$str .= '</tbody></table></div>';

	echo $str;
}



function get_location1($location_str){
    if($location_str=="서울"){
    $sql_str = " mb_addr1 like '%서울%' and mb_nick != '하남점' ";
}else if($location_str=="경인"){
    $sql_str = " mb_addr1 like '%인천%' ";
}else if($location_str=="경기"){
    $sql_str = " mb_addr1 like '%경기%' or mb_nick = '하남점' ";
}else if($location_str=="충청/전북"){
    $sql_str = " mb_addr1 like '%충북%' or mb_addr1 like '%충남%' or mb_addr1 like '%전남%' or mb_addr1 like '%전북%' or mb_addr1 like '%세종%' or mb_addr1 like '%대전%'or mb_addr1 like '%광주%' or mb_addr1 like '%전주%'";
}else if($location_str=="경상남북"){
    $sql_str = " mb_addr1 like '%경남%' or mb_addr1 like '%경북%' or mb_addr1 like '%부산%' or mb_addr1 like '%대구%' or mb_addr1 like '%울산%'";
}else if($location_str=="제주"){
    $sql_str = " mb_addr1 like '%제주%'";
}else{
        $sql_str = $location_str;
    }

    return $sql_str;
}



?>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">

			<script type="text/javascript">
				$(document).ready(function(){
					$('.sub3_con_txt').wordBreakKeepAll();

					//IE에서는 플러그인을 사용하지 않고 CSS로 처리하고 싶은 경우 이렇게 옵션을 주면 된다.
					//$('.test').wordBreakKeepAll({OffForIE:true}); 

					//IE에서 플러그인을 사용하되 CSS를 적용하는 게 아니라 비 IE 브라우저처럼 적용하고 싶을 때 이렇게 옵션을 준다.
					//$('.test').wordBreakKeepAll({useCSSonIE: false});
				});
			</script>

			<div class="sub4_0_tab">
				<ul class="tab_sub4_title">
					<li><a class="tab_link active" href="#tab1">프리미엄 소개</a></li>
					<li><a href="#tab2" ids="1" class="tab_link">관리사 명단</a></li>
				</ul>

				<div class="tabDetails" style="border:none; margin:0">
					<div id="tab1" class="tabContents1">

						<h3 class="sub3_t"><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_title0_3.jpg" alt="프리미엄서비스란?"></h3>
						<p class="sub3_imgTxt0"><img src="<?php echo G5_IMG_URL ?>/sub3/premium_title2.jpg" alt="베이직 산후관리사로 산후근무경력이 1600시간 이상이며, 교체건이 년 2회 이하인 산후관리사"></p>

						<div class="sub3_service">
							<div class="sub3_cont">
								<h3 class="sub3_stitle"><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_title1.jpg" alt="산후 회복 케어 프로그램"></h3>

								<div class="sub3_c_rela">
									<p class="sub3_bg1"></p>
									<ul class="sub3_contents_l">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong1">복부케어</li>

												<li class="sub3_con_txt">자궁수축을 도와 오로배출을 원활하게 해주며 자궁회복에 도움을 줍니다. 또한 장 운동을 활발하게 하여 소화에도 도움을 줍니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong1">팔,다리케어</li>

												<li class="sub3_con_txt">뭉처있는 근육을 이완시키고 혈액순환을 촉진시켜 부종을 완화하는데 도움을 줍니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong1">유방케어</li>

												<li class="sub3_con_txt">유방의 울혈시 불편감을 완화시키고, 젖량이 부족시 유방의 자극을 통해 젖량을 증진시키는데 도움을 줍니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">

												<li class="sub3_con_txt">* 자연분만시 복부,팔다리,유방케어 중 택1 (매일 제공)<br>
																		  * 제왕절개시 팔, 다리, 유방케어 중 택 1 (매일 제공)<br> 
																		  &nbsp;&nbsp;(케어 시간 15분~20분)</li>
											</ul>
										</li>

									</ul>
								</div>

							</div><!--sub3_cont 끝-->

							<div class="sub3_cont">
								<h3 class="sub3_stitle"><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_title2.jpg" alt="신생아관리 프로그램"></h3>

								<div class="sub3_c_rela mb30">
									<p class="sub3_bg2"></p>
									<ul class="sub3_contents_l">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong2">신생아 목욕관리</li>

												<li class="sub3_con_txt">38~40의 물온도로 1일 1회 목욕을 합니다. 관리사님의 능숙한 손놀림으로 아기의 체온이 떨어지지 않도록 따뜻한 환경에서 편안하게 목욕을 하여 아기가 스트레스 받지 않도록 배려합니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong2">제대관리</li>

												<li class="sub3_con_txt">목욕 후 알콜을 이용하여 제대를 소독합니다. 제대가 깔끔하게 잘 탈락 되도록 하며 탈락 후 분비물이 멈출 때까지 제대관리를 해드립니다.</li>
											</ul>
										</li>
									</ul>
								</div>

								<div class="sub3_c_rela">
									<p class="sub3_bg3"></p>
									<ul class="sub3_contents_r">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong2">대소변관리</li>

												<li class="sub3_con_txt">아기의 대소변시 기저귀를 갈아드립니다. 아기의 기저귀 발진이 생기지 않도록 노력합니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong2">신생아 체온관리</li>

												<li class="sub3_con_txt">필요시 집에 있는 체온계를 이용해 신생아의 체온을 측정함으로 건강상태를 체크합니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong2">신생아 성장발달관리</li>

												<li class="sub3_con_txt">필요시 신생아 성장발달에 필요한 터치(TOUCH)케어를 합니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong2">병원동행</li>

												<li class="sub3_con_txt">예방접종 기간에 필요시 산후관리사님이 함께 병원 동행을 합니다.</li>
											</ul>
										</li>
									</ul>
								</div>

							</div><!--sub3_cont 끝-->

							<div class="sub3_cont">
								<h3 class="sub3_stitle"><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_title3.jpg" alt="위생관리 프로그램"></h3>

								<div class="sub3_c_rela mb30">
									<p class="sub3_bg4"></p>
									<ul class="sub3_contents_l">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong3">손씻기</li>

												<li class="sub3_con_txt">일을 하기전, 일을 한후 항상 손씻기를 잊지 않습니다. 집안에 손소독제가 있다면 관리사님께 말씀해 주세요.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong3">집안청소</li>

												<li class="sub3_con_txt">간단하게 매일매일 청소기로 산모방,부엌,거실을 청소해 드립니다. 마대걸레가 있다면 함께 청소해 드립니다. (집안 대청소,화장실,베란다,무릎꿇고 걸레질은 포함되어 있지 않습니다.)</li>
											</ul>
										</li>
									</ul>
								</div>

								<div class="sub3_c_rela">
									<p class="sub3_bg5"></p>
									<ul class="sub3_contents_r">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong3">세탁물관리</li>

												<li class="sub3_con_txt">산모 옷을 세탁기로 돌려드리며 정리까지 도와드립니다. (기타 가족의 세탁은 별도의 추가요금이 적용되며 이불빨래, 계절 이외의 옷은 세탁에서 제외됩니다.)</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong3">신생아 세탁물 관리</li>

												<li class="sub3_con_txt">베넷 저고리, 속싸개, 가재손수건을 손빨래 후세탁기로 탈수합니다. 그외 이불,아기옷, 큰타올 등은 분리하여 세탁기를 이용하여 세탁합니다.</li>
											</ul>
										</li>
									</ul>
								</div>

							</div><!--sub3_cont 끝-->

							<div class="sub3_cont">
								<h3 class="sub3_stitle"><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_title4.jpg" alt="수유관리 프로그램"></h3>

								<div class="sub3_c_rela">
									<p class="sub3_bg6"></p>
									<ul class="sub3_contents_l">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong4">모유수유관리</li>

												<li class="sub3_con_txt">닥터맘 관리사님은 모유수유 성공을 위해 최선을 다합니다. 모유수유시 수유자세를 교정해 드리며 직접 수유를 할수 있도록 수유방법을 도와 드립니다. 유방의 울혈 또는 젖량이 부족하다면 유방 케어를 통해 문제를 해결해 드립니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong4">분유수유관리</li>

												<li class="sub3_con_txt">올바른 방법으로 분유수유를 합니다 위생적으로 젖병소독을 하며 아기의성장에 맞게 수유를 도와드립니다.</li>
											</ul>
										</li>
									</ul>
								</div>

							</div><!--sub3_cont 끝-->

							<div class="sub3_cont">
								<h3 class="sub3_stitle"><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_title5.jpg" alt="영양관리 프로그램"></h3>

								<div class="sub3_c_rela">
									<p class="sub3_bg7"></p>
									<ul class="sub3_contents_l">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_txt">산후조리에 영양은 빠질 수 없는 부분입니다. 잘 먹고 잘 쉬어야 조리가 잘된다고 합니다. 관리사님들께서 산모의 영양관리를 위해 매일 매일 좋은 재료를 가지고 산모님의 입맛을 고려하면서, 취향에 맞게 입맛을 되살려 주는 맛깔스런 음식을 해드립니다. 장보기는 서비스 내용에 포함되며 산모 식사준비에 필요한 재료구입을 합니다. 장보는 시간은 30분내로 가능합니다.</li>
											</ul>
										</li>
									</ul>

									<p class="sub3_con_txt1">*영양관리업무 : 밥, 미역, 반찬(하루에 2~3가지)</p>
								</div>

							</div><!--sub3_cont 끝-->

							<div class="sub3_cont">
								<h3 class="sub3_stitle"><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_title6.jpg" alt="기타관리 프로그램"></h3>

								<div class="sub3_c_rela">
									<p class="sub3_bg8"></p>
									<ul class="sub3_contents_l">
										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong5">남편 서비스</li>

												<li class="sub3_con_txt">남편 와이셔츠를 하루에 한 장씩 다려드립니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong5">큰아이 서비스</li>

												<li class="sub3_con_txt">큰아이에 대해 식사,세탁,큰아이 방청소,정리정돈,필요시 유치원 및 어린이집 등하원을 도와드립니다. 단, 추가요금이 발생됩니다.</li>
											</ul>
										</li>

										<li>
											<ul class="sub3_conIn">
												<li class="sub3_con_strong5">기타가족 서비스</li>

												<li class="sub3_con_txt">어른이나 친척 등 집에 상주하여 서비스를 필요로 할때 제공해 드립니다. 단, 추가요금이 발생됩니다.</li>
											</ul>
										</li>
									</ul>
								</div>

							</div><!--sub3_cont 끝-->

							<p><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_txt3.jpg" alt="서비스 프로그램은 각 가정 상황에 따라 변경 될 수 있습니다."></p>

							<p class="sub2_1_btn"><a href="<?php echo G5_MOBILE_URL ?>/fee_online_app.php?type=manager" class="sub2_btn1">예약하기</a></p>

						</div>
					</div>









					<div id="tab2" class="tabContents1">

						<div class="sub3_3_tc">
							<? get_branch_name_select1() ?>
<!-- 							<h3 class="sub3_3_tc_title">서울지역</h3>
							
							<table summary="지역,이름" class="sub3_3_table">
								<caption>명단</caption>
									<tbody>
										<tr>
											<td class="t_strong1" width="20%">강남,서초</td>
											<td>김금순,박명옥,박숙이,조수연,유금옥,함희숙</td>
										</tr>
										<tr>
											<td class="t_strong1">강동,송파,하남</td>
											<td>강맹심,김정아,김수현,우종수,유재순,홍재진,최화자</td>
										</tr>
										<tr>
											<td class="t_strong1">강서,양천</td>
											<td>박유숙,정현숙,김정숙,이두성,김경애</td>
										</tr>
										<tr>
											<td class="t_strong1">강북,성북,도봉,동대문,광진,중랑,노원</td>
											<td>김봉선,김성숙,박수현,서금숙,신경윤,이상희,이순복,이순자,이정수,황정선,황정연,홍근숙,김경수,홍경순</td>
										</tr>
										<tr>
											<td class="t_strong1">관악,동작,구로,영등포,금천</td>
											<td>강덕례,김점순,김진순,김혜영,김혜조,문혜숙,박옥경,심영숙,이명숙,이정숙,윤영복,윤행심,이정숙,조이정,채경자,손순주</td>
										</tr>
										<tr>
											<td class="t_strong1">용산,성동,중구</td>
											<td>김평순,이원</td>
										</tr>
										<tr>
											<td class="t_strong1">마포,은평,서대문,종로</td>
											<td>김창순,윤향국,이순옥,임유진,최영희,이혜성,최현숙,김영자,김영진</td>
										</tr>
									</tbody>
							</table>
													</div>sub3_3_tc 덩어리 끝
							
							
							
													<div class="sub3_3_tc">
							<h3 class="sub3_3_tc_title">경인지역</h3>
							
							<table summary="지역,이름" class="sub3_3_table">
								<caption>명단</caption>
									<tbody>
										<tr>
											<td class="t_strong1" width="20%">인천</td>
											<td>권정란,김기윤,김경희,김영순,김형순,이옥희,엄기순,정혜영,김경옥,유경승,육희영,정경자,최명숙,한남희,한정례,현경옥,홍춘희,조순자,박순향</td>
										</tr>
										<tr>
											<td class="t_strong1">부천,광명</td>
											<td>김경자,김외숙,최정희</td>
										</tr>
									</tbody>
							</table>
													</div>sub3_3_tc 덩어리 끝
							
							
													<div class="sub3_3_tc">
							<h3 class="sub3_3_tc_title">경기</h3>
							
							<table summary="지역,이름" class="sub3_3_table">
								<caption>명단</caption>
									<tbody>
									
										<tr>
											<td class="t_strong1" width="20%">고양,김포,파주</td>
											<td>박영,홍보희,노정옥,기미숙,김영임</td>
										</tr>
										<tr>
											<td class="t_strong1">구리</td>
											<td>손옥연,최정숙,문미애</td>
										</tr>
										<tr>
											<td class="t_strong1">성남,분당,광주</td>
											<td>김영미,김영화,김옥자,김복자,김덕순,나현숙,박광윤,이미숙,이영순,이현순,윤영숙,원희정,정성순,정미애,정광희,김미경</td>
										</tr>
										<tr>
											<td class="t_strong1">용인,수지</td>
											<td>김금임,김자순,김영희,부순실,이복임,유옥선,최영숙,한희규,홍종숙,윤명순,한경희,손정미,김시현,김숙희</td>
										</tr>
										<tr>
											<td class="t_strong1">수원</td>
											<td>김미자,김상옥,김정희,변영희,양태분,임정애,주명희,전순옥,전영희,정은숙</td>
										</tr>
										<tr>
											<td class="t_strong1">화성,동탄</td>
											<td>김미자,김락자,김임숙,권순복,민명자,신현주,이건녀,이옥경,이숙희,오금미,안영귀,윤유정,최금란,심재분</td>
										</tr>
										<tr>
											<td class="t_strong1">안양,군포,안산,시흥,과천</td>
											<td>김영주,이보경,유광림,왕용자,강순희,박연숙,임희자,손순애,이희분,김용애,이용숙,최순옥</td>
										</tr>
										<tr>
											<td class="t_strong1">평택,안성</td>
											<td>양길운,안정옥,이형단,최은희,황혜분</td>
										</tr>
									</tbody>
							</table>
													</div>sub3_3_tc 덩어리 끝
							
													<div class="sub3_3_tc">
							<h3 class="sub3_3_tc_title">충청</h3>
							
							<table summary="지역,이름" class="sub3_3_table">
								<caption>명단</caption>
									<tbody>
										<tr>
											<td class="t_strong1" width="20%">천안,아산</td>
											<td>김점순,김종분,박미란,박임순,신명순,이명화,오성애,유순분,유영숙,윤옥자,엄향숙,전순자,최명난,남정희,김종선,김향자,장연실,이봉원,조정애,유선희</td>
										</tr>
									</tbody>
							</table>
													</div>sub3_3_tc 덩어리 끝
							
													<div class="sub3_3_tc">
							<h3 class="sub3_3_tc_title">영동</h3>
							
							<table summary="지역,이름" class="sub3_3_table">
								<caption>명단</caption>
									<tbody>
										<tr>
											<td class="t_strong1" width="20%">구미,김천,칠곡</td>
											<td>김순화,김연숙,류남희,박미숙,박옥기,배경애,배미자,박경희,이순란,이애희,이숙자,이을순,이순귀,지명화,최여진,이정희,우명희,이화자,김명회,민은,서정금,전영란,장성희</td>
										</tr>
										<tr>
											<td class="t_strong1">대구,경산</td>
											<td>김경미,배숙자,백경옥,빈영희,이영미,이정자,정점희</td>
										</tr>
										<tr>
											<td class="t_strong1">대전,세종</td>
											<td>김춘분,최혜경,노해정,고은미</td>
										</tr>
									</tbody>
							</table>
													</div>sub3_3_tc 덩어리 끝 -->

					</div>
				</div>
			</div>
		</div>
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>

<script>
	$(function(){
		$('.sub3_3_table .borderR_none').each(function(){
			if(!($(this).text())){
				$(this).parent().css('display','none');
			}
		})
	})

</script>