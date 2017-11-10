<?php
include_once('../common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_MOBILE_PATH.'/head.php');
?>

	<div id="m_wrap">
<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="m_wrap">
			<?php include_once(G5_MOBILE_PATH.'/snb.php'); ?>
		<div class="msub_container">
			<table summary="교육과목명,과목교육(이론),과목교육(살가),교육내용" class="sub2_3_table">
				<caption>교육과정</caption>
				<thead>
					<tr>
						<th scope="col" style="width:250px;">시간</th>
						<th scope="col" style="width:500px;">일정</th>
					</tr>
				</thead>

				<tbody>
				<tr>
					<td class="t_strong txtct">09:00 ~ 09:00</td>
					<td>
						<ul>
							<li>손씻기, 앞치마 갈아입기.</li>
							<li>서비스 제공 첫날 경우<br/>
							- 제공인력 신분확인 증명제시<br/>
							- 서비스 안내(계약사항전반,서비스내용,표준일정,결제방법 및 산모 협조사항 등)<br/>
							- 계약서 서명(2부 작성 후 1부씩 보관)</li>
						</ul>
					</td>
				</tr>

				<tr>
					<td rowspan="4" class="t_strong  txtct">09:10 ~ 11:00</td>
					<td>
						<ul>
							<li>산모식사 지원 및 뒷정리</li>
							<li>식사 후 환기 및 간단한 청소</li>
							<li>산모 세탁관리</li>
						</ul>
					</td>
				</tr>

				<tr>
					<td>
						<ul>
							<li>산모, 아기 기초체온 체크</li>
							<li>산모 좌욕지원</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>젖병 세척 및 소독</li>
							<li>(유축기 사용시) 유축기 깔대기 세척,소독</li>
						</ul>
					</td>
				</tr>

				<tr>
					<td>
						<ul>
							<li>모유 수유 돕기(필요시,유방마사지)<br/>
							* 인공수유 산모는 인공 수유 돕기</li>
							<li>(유축기 사용기) 유축 돕기 및 유축모유 보관</li>
						</ul>
					</td>
				</tr>
				  
				<tr>
					<td class="t_strong txtct">11:00 ~ 12:00</td>
					<td>
						<ul>
							<li>산모 점심식사 준비</li>
							<li>(수시로) 아기 수면상태 및 기저귀 상태확인</li>
						</ul>
					</td>
				</tr>
				  
				<tr>
					<td class="t_strong txtct">12:00 ~ 13:00</td>
					<td>
						<ul>
							<li>점심식사 겸 휴식시간<br/>
							* 제공인력 점심식사는 산모가 제공함</li>
						</ul>
					</td>
				</tr>
				  
				<tr>
					<td class="t_strong txtct">13:00 ~ 14:00</td>
					<td>
						<ul>
							<li>산모 식사 지원 및 뒷정리</li>
						</ul>
					</td>
				</tr>
				  
				<tr>
					<td class="t_strong txtct">14:00 ~ 15:00</td>
					<td>
						<ul>
							<li>아기 목욕 및 제대관리</li>
							<li>모유수유 돕기(또는 인공 수유 돕기)</li>
							<li>아기 세탁물 관리</li>
						</ul>
					</td>
				</tr>
				  
				<tr>
					<td class="t_strong txtct">15:00 ~ 16:00</td>
					<td>
						<ul>
							<li>복부관리 또는 부종관리<br/>
							* 제왕절개시 복부관리 제외</li>
							<li>산모 좌욕지원</li>
						</ul>
					</td>
				</tr>
				  
				<tr>
					<td rowspan="2" class="t_strong txtct">16:00 ~ 18:00</td>
					<td>
						<ul>
							<li>젖병 세척, 소독</li>
							<li>(유축기 사용기) 유축기 깔대기 세척, 소독</li>
							<li>산모 저녁식사 준비 및 상차림</li>
						</ul>
					</td>
				</tr>

				<tr>
					<td>
						 <ul>
							<li>서비스 제공 기록지 작성</li>
							<li>비용결제(이용자카드 및 제공인력 카드 결제)</li>
							<li>마무리 정리</li>
						</ul>
					</td>
				</tr>
				 
				</tbody>
			</table>

			<p class="sub2_3_img1"><img src="<?php echo G5_MOBILE_IMG ?>/sub2/sub2_3/sub2_3_img1.jpg" alt=""/></p>
		</div>
	</div>

<?php
include_once(G5_MOBILE_PATH.'/tail.php');
?>