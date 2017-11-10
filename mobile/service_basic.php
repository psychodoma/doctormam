<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
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

			<div class="sub3_cont">
				<h3 class="sub3_t"><img src="<?php echo G5_IMG_URL ?>/sub3/basic_title.jpg" alt="베이직서비스란?"></h3>
				<p class="sub3_imgTxt0"><img src="<?php echo G5_IMG_URL ?>/sub3/basic_title2.jpg" alt="기본교육 60시간을 이수하고 산후관리근무 경력이 800시간 미만인 산후관리사가 파견되어 편안한 서비스를 제공"></p>

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
									<li class="sub3_con_txt">* 자연분만시 복부,팔다리,유방케어 중 택1<br>
									  * 제왕절개시 팔, 다리, 유방케어 중 택 1 <br>
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

									<li class="sub3_con_txt">어른이나 친척 등 집에 상주하여 서비스를 필요로 할때 제공해 드립니다.단, 추가요금이 발생됩니다.</li>
								</ul>
							</li>
						</ul>
					</div>

				</div><!--sub3_cont 끝-->

				<p><img src="<?php echo G5_MOBILE_IMG ?>/sub3/sub3_txt3.jpg" alt="서비스 프로그램은 각 가정 상황에 따라 변경 될 수 있습니다."></p>

				<p class="sub2_1_btn"><a href="<?php echo G5_MOBILE_URL ?>/fee_online_app.php?type=manager" class="sub2_btn1">예약하기</a></p>
		</div>
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>