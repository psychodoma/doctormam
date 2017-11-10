<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

include_once(G5_MOBILE_PATH.'/head.php');
?>

<script>
	$(document).ready(function(){
		var slider = "";
			slider = $('.bxslider').bxSlider({
			mode: 'fade',
			auto: true,
            autoControls: false
		});
		$(document).on('click','.bx-next, .bx-prev, .bx-pager-link',function() {
			slider.stopAuto();
			slider.startAuto();
		});
	});
</script>


<div class="m_wrap">
	<div class="m_container">

		<div class="m_visual_cont">
			<!-- <p class="m_visual"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_visual.jpg" alt="닥터맘 산후관리사 서비스"></p> -->
			<ul class="bxslider">
				<li><img style="width:100%; height:100%;" src="<?php echo G5_MOBILE_IMG ?>/main/m_main_visual1.jpg" /></li>
				<li><img style="width:100%; height:100%;" src="<?php echo G5_MOBILE_IMG ?>/main/m_main_visual2.jpg" /></li>
				<li><img style="width:100%; height:100%;" src="<?php echo G5_MOBILE_IMG ?>/main/m_main_visual3.jpg" /></li>
			</ul>

			<p class="m_txtimg1"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_txtimg1.jpg" alt="답터맘은 산후도우미 파견 기업입니다."></p>
			<!-- <p class="m_txtimg2"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_txtimg2.jpg" alt="감동 서비스가 상식인 기억"></p> -->
		</div>




		
		<div class="m_title">
			<p class="m_txt1"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_txt1.jpg" alt="산후관리사 서비스의 만족"/></p>
			<p class="m_txt2"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_txt2.jpg" alt="소비자들은 이런 서비스를 원했다 감동서비스가 상식인 기업"/></p>
		</div>


		
		<div class="m_listBtnCont">
			<ul class="m_listBtn">
				<li class="listBtn_1">
					<a href="/mobile/intro_introduce.php">
						<div>
							<p class="listBtn_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_listPhoto1.png" alt=""></p>

							<h3>닥터맘 산후관리사</h3>
							<p class="listBtn_txt">엄마가 되어서의 첫 기쁨,<br/>
							케어는 닥터맘에게 맡겨주세요!</p>
						</div>	
					</a>
				</li>

				<li class="listBtn_2">
					<a href="/mobile/intro_introduce.php?scroll=true">
						<div>
							<p class="listBtn_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_listPhoto2.png" alt=""></p>

							<h3>인증서 및 자격증</h3>
							<p class="listBtn_txt">믿을 수 있는 닥터맘의<br/>
							서비스 입니다.</p>
						</div>	
					</a>
				</li>

				<li class="listBtn_3">
					<a href="/mobile/service_info.php">
						<div>
							<p class="listBtn_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_listPhoto3.png" alt=""></p>

							<h3>서비스 안내</h3>
							<p class="listBtn_txt">오랜감동으로 간직할 수 있는 든든한<br/>
							산후관리 서비스를 제공하겠습니다.</p>
						</div>	
					</a>
				</li>
				
				<li class="listBtn_4">
					<a href="javascript:PopupCalc1();">
						<img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_listban4.jpg" alt="">
						<div>
							<h3>출산축하선물</h3>

							<p>감동 서비스가 상식인 기업<br/>닥터맘의 핫한 이벤트!</p>
						</div>
					</a>
				</li>
				
			</ul>
		</div>
		





		<!--
		<div class="m_cont1">
			<div class="service_l">
				<section class="service_cont_l">
					<h3><span class="point">Point01</span> 전문화+감동서비스</h3>

					<p>시대의 흐름에맞는 최적의서비스를 제공하기 위해 우수한 강사진들로 구성된 닥터맘 교육기관에서 산후관리사님의 교육을 책임지고 있으며, 더 나아가 단순히 서비스를 제공하는데 만족하지 않고 산모님의 마음까지 감동을 줄 수 있는 감동서비스로 다가갑니다.</p>
				</section>

				<p class="servicrImg_l"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_img1.jpg" alt="전문화 이미지"></p>
			</div>

			<div class="service_r">
				<section class="service_cont_r">
					<h3><span class="point">Point02</span> 모유수유 하는 닥터맘</h3>

					<p>아기는 엄마젖을 먹을 때가 가장 행복하고 편안한시간입니다. 닥터맘은 모유수유를 성공할 수 있도록 최선을 다해 산모님과 함께합니다. 국제 모유수유전문가와 함계 공동 개발한 모유수유 성공 프로젝트!! 닥터맘에서 만나실 수 있습니다.</p>
				</section>

				<p class="servicrImg_r"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_img2.jpg" alt="모유수유 이미지"></p>
			</div>

			<div class="service_l">
				<section class="service_cont_l">
					<h3 class="sm_slo"><span class="point">Point03</span> 주는 사랑이 기쁨이<span class="hei">되는 닥터맘</span></h3>

					<p>전세계 아이들이 행복해지는 간절한 바램으로 매년 닥터맘 지점장님들, 산후관리사님과 함께 가난한 나라를 방문하여 산모님께서 보내주신 많은 후원물품을 전달해 드리고 옵니다. 사랑을 전하는 것은 어려운일이 아닙니다. 작은 손길들을 모아 큰 행복을 주는 닥터맘에 여러분들도 함께 하실 수 있습니다.</p>
				</section>

				<p class="servicrImg_l"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_img3.jpg" alt="가족 이미지"></p>
			</div>
		</div>

		<div class="m_cont2">
			<h3><img src="<?php echo G5_MOBILE_IMG ?>/main/m_s_img_title.jpg" alt="doctormam"></h3>

			<ul class="m_license">
				<li>
					<p class="m_license_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_s_img1.jpg" alt="산모신생아 건강관리사 교육기관(서울특별시)"></p>
					<p class="m_license_txt"><span class="point2">1.</span>산모신생아<br/>건강관리사교육기관<br/>서울특별시</p>
				</li>

				<li>
					<p class="m_license_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_s_img2.jpg" alt="모유수유 전문기관"></p>
					<p class="m_license_txt"><span class="point2">2.</span>모유수유<br/>전문기관</p>
				</li>

				<li>
					<p class="m_license_img"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_s_img3.jpg" alt="한국보건복지 정보개발원 자문기관"></p>
					<p class="m_license_txt"><span class="point2">3.</span>한국보건복지<br/>정보개발원<br/>자문기관</p>
				</li>
			</ul>
		</div>


		<div class="mb5"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_txtimg3.jpg" alt="믿을수 있는 닥터맘의 서비스 확인하세요"></div>


		<div>
			<h3 class="mb40"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_main_txtimg4.jpg" alt="서비스에 감동을 더하다! 산후관리사의 차별화 선언 서비스 기본원칙"></h3>

			<div class="service_rule">
				<h3 class="rule_title"><span class="point3">Recovery</span><span class="point_sq"></span>111케어를 통한 산후회복 프로그램 서비스</h3>
				<section class="rule">
					<p class="rule_title_so">복부,팔다리,유방케어 프로그램</p>
					<p class="rule_txt">베이직,베스트:111케어<br/>프리미엄:111케어+전신케어(일주일1회)<br/>명품플러스:111케어+전신케어(일주일2회)</p>
				</section>

				<p class="ruleImg"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_c_img1.jpg" alt="수유관리 이미지"></p>
			</div>

			<div class="service_rule">
				<h3 class="rule_title"><span class="point3">Newborn Special</span><span class="point_sq"></span>신생아 전문직 서비스</h3>
				<section class="rule">
					<p class="rule_title_so">신생아 목욕관리</p>
					<p class="rule_txt">38~40℃의 물온도로 1일1회 목욕을 합니다. 관리사님의 능숙한 손놀림으로 아기의 체온이 떨어지지 않도록 주의하며 편안하게 목욕을 하여 아기가 스트레스 받지 않도록 배려합니다.</p>
				</section>

				<p class="ruleImg"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_c_img2.jpg" alt="신생아 전문직 이미지"></p>

				<div class="ruleaddTxt">
					<p class="rule_title_so">신생아 제대관리</p>
					<p class="rule_txt">목욕 후 알콜을 이용하여 제대를 소독합니다. 제대가 깔끔하게 잘 탈락되도록 하며 탈락 후 분비물이 멈출 때까지 제대관리를 해 드립니다.</p>

					<p class="rule_title_so">대소변관리</p>
					<p class="rule_txt">아기의 대소변시 기저귀를 갈아드립니다. 아기의 기저귀 발진이 생기지 않도록 노력합니다.</p>

					<p class="rule_title_so">신생아 체온관리</p>
					<p class="rule_txt">필요시 집에 있는 체온계를 이용해 신생아의 체온을 측정함으로 건강상태를 체크합니다.</p>

					<p class="rule_title_so">신생아 성장발달관리</p>
					<p class="rule_txt">필요시 신생아 성장발달에 필요한 터치(TOUCH)케어를 합니다.</p>

					<p class="rule_title_so">병원동행</p>
					<p class="rule_txt">예방접종 기간에 필요시 산후관리사님이 함께 병원 동행을 합니다.</p>
				</div>
			</div>

			<div class="service_rule">
				<h3 class="rule_title"><span class="point3">Feeding Special</span><span class="point_sq"></span>수유관리 서비스</h3>
				<section class="rule">
					<p class="rule_title_so">모유수유관리</p>
					<p class="rule_txt">닥터맘 관리사님은 모유수유 성공을 위해 최선을 다합니다. 모유수유시 수유자세를 교정해 드리며 직접 수유를 할 수 있도록 수유방법을 도와 드립니다. 유방의 울혈 또는 젖량이 부족하다면 유방 케어를 통해 문제를 해결해 드립니다.</p>
				</section>

				<p class="ruleImg mb15"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_c_img3.jpg" alt="수유관리 이미지"></p>

				<div class="ruleaddTxt">
					<p class="rule_title_so">분유수유관리</p>
					<p class="rule_txt">올바른 방법으로 분유수유를 합니다.<br/>위생적으로 젖병 소독을 하며 아기의성장에 맞게 수유를 도와드립니다.</p>
				</div>
			</div>

			<div class="service_rule">
				<h3 class="rule_title"><span class="point3">Sanitation</span><span class="point_sq"></span>위생관리 서비스</h3>
				<section class="rule">
					<p class="rule_title_so">손씻기</p>
					<p class="rule_txt">일을 하기전, 일을 한후 항상 손 씻기를 잊지 않습니다. 집안에 손소독제가 있다면 관리사님께 말씀해 주세요.</p>
				</section>

				<p class="ruleImg mb15"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_c_img4.jpg" alt="위생관리 이미지"></p>

				<div class="ruleaddTxt">
					<p class="rule_title_so">집안청소</p>
					<p class="rule_txt">간단하게 매일매일 청소기로 산모방, 부엌, 거실을 청소해 드립니다. 마대걸레가 있다면 함께 청소해 드립니다.<br/>
					(집안 대청소,화장실,베란다,무릎꿇고 걸레질은 포함되어 있지 않습니다.)</p>
				</div>

				<div class="ruleaddTxt">
					<p class="rule_title_so">세탁물관리</p>
					<p class="rule_txt">산모 옷을 세탁기로 돌려드리며 정리까지 도와드립니다.<br/>
					(기타 가족의 세탁은 별도의 추가요금이 적용되며 이불빨래, 계절 이외의 옷은 세탁에서 제외됩니다.)</p>
				</div>

				<div class="ruleaddTxt">
					<p class="rule_title_so">신생아 세탁물관리</p>
					<p class="rule_txt">베넷 저고리,속싸개,가재손수건을 손 빨래 후 세탁기로 탈수 합니다. 그외 이불,아기옷,큰타올 등은 분리해 세탁기를 이용하여 세탁합니다.</p>
				</div>
			</div>

			<div class="service_rule">
				<h3 class="rule_title"><span class="point3">Natrition</span><span class="point_sq"></span>산후회복 영양관리 서비스</h3>
				<section class="rule">
					<p class="rule_txt">산후조리에 영양은 빠질 수 없는 부분입니다. 잘 먹고 잘 쉬어야 조리가 잘된다고 합니다. 관리사님들께서 산모의 영양관리를 위해 매일 매일 좋은 재료를 가지고 산모님의 입맛을 고려하면서, 취향에 맞게 입맛을 되살려 주는 맛깔스런 음식을 해드립니다.</p>
				</section>

				<p class="ruleImg mb15"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_c_img5.jpg" alt="영양관리 이미지"></p>

				<div class="ruleaddTxt">
					<p class="rule_txt">장보기는 서비스 내용에 포함되며 산모 식사준비에 필요한 재료구입을 합니다. 장보는 시간은 30분내로 가능합니다.<br/>
					*영양관리업무:밥,미역국,반찬(하루에2~3가지)</p>
				</div>
			</div>

		</div>
		-->


		<div class="m_cont1 mb15">
			<div class="m_noticeTitle">
				<h3>닥터맘뉴스</h3>
				<p><a href="">더보기</a></p>
			</div>

			<ul class="m_noticeList">
			<?php echo latest("basic", "news", 3, 25); ?>
			</ul>
		</div>

		<div class="m_cont1">
			<ul class="m_main_btn">
				<!--<li class="floatl"><a href="tel:02-903-2222"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img1.jpg" alt="대표전화 02-903-2222"></a></li>-->
				<li class="floatr"><a href="<?php echo G5_MOBILE_URL ?>/branch_map.php"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img2.jpg" alt="전국지사 안내"></a></li>

				<li class="floatl"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=review"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img3.jpg" alt="따끈따끈한 이용후기"></a></li>
				<li class="floatr"><a href="<?php echo G5_MOBILE_URL?>/fee_branch.php"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img4.jpg" alt="이용요금 보기"></a></li>

				<li class="floatl"><a href="javascript:alert('준비중입니다.');"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img5.jpg" alt="글로벌서비스"></a></li>
				<li class="floatr"><a href="javascript:PopupCalc();" target="_blank"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img6.jpg" alt="이용요금계산"></a></li>

				<li class="floatl"><a href="<?php echo G5_MOBILE_URL?>/service_voucher.php"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img7.jpg" alt="산모신생아건강관리사 지원사업"></a></li>
				<li class="floatr"><a href="<?php echo G5_MOBILE_URL?>/fee_online_info.php"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img8.jpg" alt="예약하기"></a></li>

				<li class="floatl"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=edu&sca=산후관리사 양성교육"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img9.jpg" alt="닥터맘교육센터"></a></li>
				<!--
				<li class="floatl" style="width:100%;"><a href="javascript:PopupCalc1();" ><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img10.jpg" alt="협력업체"></a></li>
				-->
				<li class="floatl"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img11.jpg" alt=""></li>
				<li class="floatr"><a href="http://www.drbebe11.com/" target="_blank"><img src="<?php echo G5_MOBILE_IMG ?>/main/m_b_img12.jpg" alt=""></a></li>
			</ul>

			<ul class="m_main_btn" style="margin-top:30px;">
				
			</ul>
		</div>


	</div>
</div>
<script>
    function PopupCalc(){
        window.open("<?php echo G5_URL ?>/charge.php","_blank","width=500, height=700,resizable=no, scrollbars=no, status=no;")
    }
	function PopupCalc1(){
		 window.open("<?php echo G5_URL ?>/familysite.html","_blank","width=360, height=240,resizable=no, scrollbars=no, status=no;")
	}
</script>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>