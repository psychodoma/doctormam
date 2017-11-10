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
					$('.sub7_2inrto').wordBreakKeepAll();

					//IE에서는 플러그인을 사용하지 않고 CSS로 처리하고 싶은 경우 이렇게 옵션을 주면 된다.
					//$('.test').wordBreakKeepAll({OffForIE:true});

					//IE에서 플러그인을 사용하되 CSS를 적용하는 게 아니라 비 IE 브라우저처럼 적용하고 싶을 때 이렇게 옵션을 준다.
					//$('.test').wordBreakKeepAll({useCSSonIE: false});
				});
			</script>

			<p class="sub7_2inrto">전문간호사 출신의 모유수유 전문가 서비스가 시작되자마자 산모님들께서 보여주신 많은 관심에 감사드리며 그동안 서비스를 제공하면서 모유수유 전문가 서비스가 1회적이지 않다는 산모님들의 의견을 수렴, 보다 저렴한 가격으로 산모님들의 문제를 해결해 드리기 위해 패키지 서비스를 준비했습니다. 합리적인 비용으로 닥터맘 서비스를 만나보세요.</p>

				<div class="sub7_2_tc">

					<h3 class="sub3_5_tc_title">모유수유 전문가 1회 방문비용</h3>

					<table summary="주,내용,프리미엄,명품" class="sub7_2_table">
						<caption>교육과정</caption>
							<colgroup>
								<col width="18%"/>
								<col width="15%"/>
								<col width="12%"/>
								<col width="*%"/>
							</colgroup>
							<thead>
								<tr>
									<th scope="col" style="width:18%;">형태</th>
									<th scope="col" style="width:15%;">횟수</th>
									<th scope="col" style="width:12%;">요금</th>
									<th scope="col" style="width:55%;">내용</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="t_strong">가정으로 방문</td>
									<td>1회<br/>방문</td>
									<td>100,000</td>
									<td>가정방문 : 모유수유 문제점 해결</td>
								</tr>
								<tr>
								  <td class="t_strong">클리닉으로 방문</td>
								  <td>1회<br/>방문</td>
								  <td>100,000</td>
								  <td>클리닉방문 : 모유수유 문제점 해결 및 정밀체중 측정,<br/>개인별 차트관리</td>
								</tr>
						  </tbody>
					</table>


					<h3 class="sub3_5_tc_title">모유수유 프리미엄 패키지</h3>

					<table summary="주,내용,프리미엄,명품" class="sub7_2_table">
						<caption>교육과정</caption>
							<colgroup>
								<col width="18%"/>
								<col width="15%"/>
								<col width="12%"/>
								<col width="*%"/>
							</colgroup>
							<thead>
								<tr>
									<th scope="col" style="width:18%;">형태</th>
									<th scope="col" style="width:15%;">횟수</th>
									<th scope="col" style="width:12%;">요금</th>
									<th scope="col" style="width:55%;">내용</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="t_strong">가정으로 방문</td>
									<td>3회<br/>방문</td>
									<td>270,000</td>
									<td>모유수유교육 및 수유자세교정, 유두손상케어<br/>신생아 목욕 및 아기케어</td>
								</tr>
						  </tbody>
					</table>



					<h3 class="sub3_5_tc_title">유방 케어 패키지</h3>

					<table summary="주,내용,프리미엄,명품" class="sub7_2_table">
						<caption>교육과정</caption>
							<colgroup>
								<col width="18%"/>
								<col width="15%"/>
								<col width="12%"/>
								<col width="*%"/>
							</colgroup>
							<thead>
								<tr>
									<th scope="col" style="width:18%;">형태</th>
									<th scope="col" style="width:15%;">횟수</th>
									<th scope="col" style="width:12%;">요금</th>
									<th scope="col" style="width:55%;">내용</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="t_strong">가정으로 방문</td>
									<td>2회<br/>방문</td>
									<td>180,000</td>
									<td rowspan="2">유방 울혈 / 유선염 / 젖량 증진 케어</td>
								</tr>
								<tr>
								  <td class="t_strong">클리닉으로 방문</td>
								  <td>2회 방문</td>
								  <td>140,000</td>
								</tr>
						  </tbody>
					</table>



					<h3 class="sub3_5_tc_title">유두혼동 교정 패키지</h3>

					<table summary="주,내용,프리미엄,명품" class="sub7_2_table">
						<caption>교육과정</caption>
							<colgroup>
								<col width="18%"/>
								<col width="15%"/>
								<col width="12%"/>
								<col width="*%"/>
							</colgroup>
							<thead>
								<tr>
									<th scope="col" style="width:18%;">형태</th>
									<th scope="col" style="width:15%;">횟수</th>
									<th scope="col" style="width:12%;">요금</th>
									<th scope="col" style="width:55%;">내용</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="t_strong">가정으로 방문</td>
									<td>3회<br/>방문</td>
									<td>280,000</td>
									<td rowspan="2">유방 울혈 / 유선염 / 젖량 증진 케어</td>
								</tr>
								<tr>
								  <td class="t_strong">클리닉으로 방문</td>
								  <td>3회<br/>방문</td>
								  <td>210,000</td>
								</tr>
						  </tbody>
					</table>
				</div>
		</div><!--기본 레이아웃 msub_container 끝-->
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>