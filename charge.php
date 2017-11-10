<?php
include_once('./_common.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="Author" content=""/>
<meta name="Keywords" content=""/>
<meta name="Description" content=""/>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/quick.js"></script>

<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="css/sub.css"/>


<title>닥터맘 요금계산</title>
</head>
<body>
	<div class="charge_cont">
		<form method="post" action="" name="" class="charge_fc">
			<fieldset class="">
			  <legend>지원하기 양식</legend>

				<table  class="charge_table" summary="이름 사는지역 연락처를 작성해주세요">
					<caption>지원하기</caption>
					<colgroup>
						<col width="155px"/>
						<col width="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th>지점</th>
							<td>
								<label for="val0" class="hide">분류 선택(라벨)</label>
									<?php echo get_all_branch_select("val0",""," class=\"charge_select\"") ?>
							</td>
						</tr>
						<tr>
							<th>서비스</th>
							<td>
								<label for="val1" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val1" id="val1" class="charge_select">
									<option value="1">알뜰형</option>
									<option value="2">베스트</option>
									<option value="3">프리미엄</option>
									<option value="4">명품플러스</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>서비스유형</th>
							<td>
								<label for="val2" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val2" id="val2" class="charge_select">
									<option value="2">출퇴근</option>
									<option value="1" class='good_ck' style='display:none;' >입주형</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>서비스유형상세</th>
							<td>
								<label for="val3" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val3" id="val3" class="charge_select">
									<option value="1">출퇴근 5일제</option>
									<option value="2" class='good_ck'style='display:none;'  >출퇴근 6일제</option>
								</select>
							</td>
						</tr>
						<tr>
						  <th colspan="2" class="charge_add">--- 추가 요금에 관한 선택 사항입니다. ---</th>
					  </tr>
						<tr>
							<th style="background-color: #d5edef;">이용기간</th>
							<td>
								<label for="val4" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val4" id="val4" class="charge_select">
									<option value="0">1주</option>
									<option value="1">2주</option>
									<option value="2">3주</option>
									<option value="3">4주</option>
								</select>
							</td>
						</tr>
						<tr>
							<th style="background-color: #d5edef;">취학아동</th>
							<td>
								<label for="val5" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val5" id="val5" class="charge_select">
									<option value="0">유아원/취학 선택</option>
									<option value="1">1명</option>
									<option value="2">2명</option>
									<option value="3">3명</option>
									<option value="4">4명</option>
								</select>
							</td>
						</tr>
						<tr>
							<th style="background-color: #d5edef;">미취학아동</th>
							<td>
								<label for="val6" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val6" id="val6" class="charge_select">
									<option value="0">미취학 선택</option>
									<option value="1">1명</option>
									<option value="2">2명</option>
									<option value="3">3명</option>
									<option value="4">4명</option>
								</select>
							</td>
						</tr>
						<tr>
							<th style="background-color: #d5edef;">일요일(공휴일)</th>
							<td>
								<label for="val7" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val7" id="val7" class="charge_select">
									<option value="0">제외</option>
									<option value="1">1일추가</option>
									<option value="2">2일추가</option>
									<option value="3">3일추가</option>
									<option value="4">4일추가</option>
									<option value="5">5일추가</option>
								</select>
								<p class="charge_txt2">근무 9~16시간(출퇴근)</p>
							</td>
						</tr>
						<tr>
							<th style="background-color: #d5edef;">명절(설,추석 당일)</th>
							<td>
								<label for="val8" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val8" id="val8" class="charge_select">
									<option value="0">제외</option>
									<option value="1">1일추가</option>
									<option value="2">2일추가</option>
									<option value="3">3일추가</option>
									<option value="4">4일추가</option>
									<option value="5">5일추가</option>
								</select>
								<p class="charge_txt2">근무 9~16시간(출퇴근)</p>
							</td>
						</tr>
						<tr>
							<th style="background-color: #d5edef;">쌍둥이</th>
							<td>
								<label for="val9" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val9" id="val9" class="charge_select">
									<option value="0">무</option>
									<option value="1">쌍둥이</option>
								</select>
							</td>
						</tr>
						<tr>
							<th colspan="2" style="background-color: #fff; height:10px;"></th>
						</tr>
						<tr>
							<th>기타가족</th>
							<td>
								<label for="val10" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val10" id="val10" class="charge_select">
									<option value="0">선택하세요</option>
									<option value="1">1명</option>
									<option value="2">2명</option>
									<option value="3">3명</option>
									<option value="4">4명</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>시간추가</th>
							<td>
								<label for="val11" class="hide">분류 선택(라벨)</label>
								<select title="검색 분류 선택" name="val11" id="val11" class="charge_select">
									<option value="0">이용시간</option>
									<option value="1">1시간</option>
									<option value="2">2시간</option>
									<option value="3">3시간</option>
									<option value="4">4시간</option>
									<option value="5">쌍둥이 1시간</option>
									<option value="6">쌍둥이 2시간</option>
									<option value="7">쌍둥이 3시간</option>
									<option value="8">쌍둥이 4시간</option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				

				<table id='add_table' class='charge_table'>
				</table>

				<p class="charge_txt1">지점마다 금액이다를수 있습니다.</p>

				<ul class="charge_join">
					<li><input type="button" value="계산해보기" onclick="Calculate()"/></li>
					<li><input type="button" value="닫기" onclick="window.close()"/></li>
				</ul>
			</fieldset>
		</form>
	</div>
</body>
<script>


	$('#val1').change(function(){
		if($(this).val() == 1 ){
			$('.good_ck').css('display','none');
		}else{
			$('.good_ck').css('display','block');
		}

		$("#val3").val("1").prop("selected", true);
		$("#val2").val("2").prop("selected", true);

	})


	 function commaNum(num) {
        var len, point, str;

        num = num + "";
        point = num.length % 3
        len = num.length;

        str = num.substring(0, point);
        while (point < len) {
            if (str != "") str += ",";
            str += num.substring(point, point + 3);
            point += 3;
        }
        return str;
    }
    function Calculate()
    {
		if($("#val0 option:selected").val() == ""){
			alert("지점을 선택해주세요");
			return false;
		}
                  $.ajax({
                    url: "./ajax.calculate.php",
                    type: "POST",
                    data: {
                        "val0": $("#val0 option:selected").val(),
                        "val1": $("#val1 option:selected").val(),
						"val2": $("#val2 option:selected").val(),
						"val3": $("#val3 option:selected").val(),
						"val4": $("#val4 option:selected").val(),
						"val5": $("#val5 option:selected").val(),
						"val6": $("#val6 option:selected").val(),
						"val7": $("#val7 option:selected").val(),
						"val8": $("#val8 option:selected").val(),
						"val9": $("#val9 option:selected").val(),
						"val10": $("#val10 option:selected").val(),
						"val11": $("#val11 option:selected").val()

                    },
                    dataType: "json",
                    async: true,
                    cache: false,
                    success: function(data, textStatus) {
						console.log(data);
						if(data.total_amount){
							//console.log(data.total_amount);
							//$("#add_table").html("<tbody style='border-top:1px solid #ccc;' ><tr><th>계산금액</th><td>"+ commaNum(data.total_amount)+"원</td></tr></tbody>")
						}
                    }
                })

    }
</script>
</html>
