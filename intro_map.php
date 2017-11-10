<?php
include_once('./_common.php');

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

	function geocode($addr, $cID, $sCode) {


        $ch = curl_init();
        $address = urlencode($addr);
        $encoding="utf-8"; //출력 결과 인코딩 값으로 'utf-8', 'euc-kr' 가능
        $coord="latlng"; //출력 좌표 체계 값으로 latlng(위경도), tm128(카텍) 가능
        $output="json" ;//json,xml

        $qry_str = "?encoding=".$encoding."&coord=".$coord."&output=".$output."&query=".$address;
        $headers = array(
            "X-Naver-Client-Id: $cID", //Client ID
            "X-Naver-Client-Secret: $sCode" //Client Secret
        );

        $url="https://openapi.naver.com/v1/map/geocode";
        curl_setopt($ch, CURLOPT_URL, $url.$qry_str);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res =curl_exec($ch);
        curl_close($ch);

        //echo($res);
        return $res;


    }
     //$address1 = $location["mb_addr1"];
	$json = geocode("서울시 강서구 양천로 60길 19 강영빌딩 4층", "wjF2W98KQDCKIQVC1CBD", "uA9xeXn6Ps");
	//$json = utf8_encode($json);        //적용하는 사이트의 인코딩이 euc_kr인 경우 추가해 줌.
	$mapdata =  json_decode($json);
	$map_x_point = $mapdata->result->items[0]->point->x;
	$map_y_point =  $mapdata->result->items[0]->point->y;



?>

<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=wjF2W98KQDCKIQVC1CBD&submodules=geocoder"></script>


    <div class="subcont_top"><!--100%-->
<?php include_once(G5_PATH.'/SNB.php'); ?>
            <div class="sub_cont1">
                <h3 class="subpage_name">위치및 연락처</h3>
                <p class="subpage_slog"><img src="img/sub1/sub1_4/sub1_4_banner1.jpg" alt="사랑스런 아이의 모습 오랜돔동으로 간직할 수 있는 서비스로 만들어 드리겠습니다."/></p>

                <div class="s_cont">
                    <div class="sub1_5_c">
                        <div id="map" style=" width:750px; height:400px; margin-bottom:20px;"></div>

								<script type="text/javascript">
									/*var oMap;
									var oPoint = new nhn.api.map.LatLng(<?php echo $map_y_point ?>, <?php echo $map_x_point ?>);
									nhn.api.map.setDefaultPoint('LatLng');
									oMap = new nhn.api.map.Map('map' ,{
										point : oPoint,
										zoom : 10,
										enableWheelZoom : true,
										enableDragPan : true,
										enableDblClickZoom : false,
										mapMode : 0,
										activateTrafficMap : false,
										activateBicycleMap : false,
										minMaxLevel : [ 1, 14 ]

									});
									var oSize = new nhn.api.map.Size(83, 86);
									var oOffset = new nhn.api.map.Size(40, 75);
									var oIcon = new nhn.api.map.Icon(g5_url+'/img/mam_location.png', oSize, oOffset);

									// 마커 찍기
									var oMarker1 = new nhn.api.map.Marker(oIcon,{title : '닥터맘'});  //마커 생성
									oMarker1.setPoint(oPoint); //마커 표시할 좌표 선택
									oMap.addOverlay(oMarker1); //마커를 지도위에 표현*/

									var HOME_PATH = window.HOME_PATH || '.';
									var position = new naver.maps.LatLng(<?php echo $map_y_point ?>, <?php echo $map_x_point ?>);

									var map = new naver.maps.Map('map', {
										center: position,
										zoom: 12
									});

									var markerOptions = {
										position: position.destinationPoint(0, 0),
										map: map,
										icon: {
											url:  g5_url+'/img/mam_location.png',
											size: new naver.maps.Size(84, 86),

										}
									};

									var marker = new naver.maps.Marker(markerOptions);

								</script>



                        <ul class="sub1_5_loca">
                            <li class="loca_li">
                                <div class="loca_icon"><img src="img/sub1/sub1_5/map_icon1.jpg" alt=""/></div>
                                <div class="loca_info">
                                    <h4 style="color:#2285af;">닥터맘 주소</h4>
                                    <p class="loca_add">서울시 강서구 양천로 60길 19 강영빌딩 4층</p>

                                    <ul class="loca_tell">
                                        <li class="l_tell">02-903-2222</li>
                                        <li class="l_fax">02-326-2556</li>
                                    </ul>
                                </div>
                            </li>

                            <li class="loca_li">
                                <div class="loca_icon"><img src="img/sub1/sub1_5/map_icon2.jpg" alt=""/></div>
                                <div class="loca_info">
                                    <h4 style="padding-top:0; color:#5185be;">지하철</h4>
                                    <p class="loca_txt_strong">9호선 증미역 4번 출구, 9호선 가양역 6번 출구</p>
                                    <p class="loca_txt">9호선 증미역 4번출구로 직진하셔서 맥도날드. KIA자동차 건물 사이 골목으로 직진<br/>강영빌딩 4층에 위치해 있습니다.</p>
                                </div>
                            </li>
							
							<!--
                            <li class="loca_li">
                                <div class="loca_icon"><img src="img/sub1/sub1_5/map_icon3.jpg" alt=""/></div>
                                <div class="loca_info">
                                    <h4 style="padding-top:13px; color:#2a5486;">버스</h4>
                                    <ul class="loca_bus">
                                        <li class="loca_txt_strong" style="margin-right: 60px;">내방역 3번출구(22-389)<span class="txt_normal">마을서초 07,서초 15</span></li>
                                        <li class="loca_txt_strong">제일병원(22-836)<span class="txt_normal">마을서초 07,서초 15</span></li>
                                        <li class="loca_txt_strong">내방역 2번출구()<span class="txt_normal">간선 142, 148, 406 / 지선4319</span></li>
                                    </ul>
                                </div>
                            </li>
							-->
							
							<!--
                            <li class="loca_li">
                                <div class="loca_icon"><img src="img/sub1/sub1_5/map_icon4.jpg" alt=""/></div>
                                <div class="loca_info">
                                    <h4 style="padding-top:13px; color:#27354f;">주차장 이용안내</h4>
                                    <p class="loca_add mb20">닥터맘 건물 주차장을 무료로 이용하실 수 있습니다.</p>
                                    <p><img src="img/sub1/sub1_5/sub1_5_map2.jpg" alt=""/></p>
                                </div>
                            </li>
							-->

                            <li class="loca_li">
                                <div class="loca_icon"><img src="img/sub1/sub1_5/map_icon5.jpg" alt=""/></div>
                                <div class="loca_info">
                                    <h4 style="padding-top:13px; color:#c0691d;">주변안내</h4>
                                    <p class="loca_add mb20">주변안내를 좀 더 자세히 해드리겠습니다.</p>
                                    <p><img src="img/sub1/sub1_5/sub1_5_map3.jpg" alt=""/></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div><!--subcontent 1000px-->

    </div><!--subcont_top 100%-->
<?php
include_once(G5_PATH.'/tail.php');
?>