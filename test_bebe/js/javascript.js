
$(function(){
	$("#menu").find("ul a").mouseover(function(){
		$(this).css("color","#ffde92")
		$(this).css("background","url(http://doctormam.morucompany.gethompy.com/test_bebe/img/main/navi_hover.jpg) no-repeat")
		mouse_over_fn()
	})
	$("#menu").find("ul a").mouseout(function(){
		$(this).css("color","#fff")
		$(this).css("background","none")
		mouse_out_fn()
	})
	$("#sub1000").find("li").mouseover(function(){
		var index_of_num=$(this).parent().index(".sub")		//.sub클레스 중 자기자신이 몇번째인지 정수로 저장
		$("#menu").find("ul a").eq(index_of_num).css("background","url(http://doctormam.morucompany.gethompy.com/test_bebe/img/main/navi_hover.jpg) no-repeat")
		$("#menu").find("ul a").eq(index_of_num).css("color","#ffde92")
		$(this).css("color","#F00")
		mouse_over_fn()
		
	})
	$("#sub1000").find("li").mouseout(function(){
		var index_of_num=$(this).parent().index(".sub")		//.sub클레스 중 자기자신이 몇번째인지 정수로 저장
		$("#menu").find("ul a").eq(index_of_num).css("background","none")
		$("#menu").find("ul a").eq(index_of_num).css("color","#fff")
		$(this).css("color","#fff")
		mouse_out_fn()
	})

})
var speed=500;
function mouse_over_fn()
{
	$("#submenu").stop().animate({
			height: $("#sub1000").innerHeight()+'px'
		  }, speed, function() {
			// Animation complete.
		  });
	$("#sub1000").stop().animate({
			marginTop:0+"px"
		  }, speed, function() {
			// Animation complete.
		  });
}

function mouse_out_fn()
{
	$("#submenu").stop().animate({
				height: 0+'px'
			  }, speed, function() {
				// Animation complete.
			  });
		$("#sub1000").stop().animate({
				marginTop:-100+"px"
			  }, speed, function() {
				// Animation complete.
			  });
}
















//탭1
/*
$(document).ready(function(){
	$(".tabContents").hide(); // Hide all tab content divs by default
	$(".tabContents:first").show(); // Show the first div of tab content by default
	
	$(".tab_title1 li a").click(function(){ //Fire the click event
		
		var activeTab = $(this).attr("href"); // Catch the click link
		$(".tab_title1 li a").removeClass("active"); // Remove pre-highlighted link
		$(this).addClass("active"); // set clicked link to highlight state
		$(".tabContents").hide(); // hide currently visible tab content div
		$(activeTab).fadeIn(); // show the target tab content div by matching clicked link.
		
		return false; //prevent page scrolling on tab click
	});
});
*/

$(document).ready(function(){
	$(".tabContents,.tabContents1,.tabContents2,.tabContents3").hide(); // Hide all tab content divs by default
	$(".tabDetails,.tabDetails1").each(function(index){
		$(this).find(".tabContents:first,.tabContents1:first,.tabContents2:first,.tabContents3:first").show();
	});
	
	$(".tab_link").click(function(){ 
		var activeTab = $(this).attr("href"); 
		//$(this).removeClass("active"); 
		$(this).parent().parent().find("li a").removeClass("active")
		$(this).addClass("active"); 
		$(this).parent().parent().siblings("div").find(".tabContents,.tabContents1,.tabContents2,.tabContents3").hide();
		//$(".tabContents").hide();
		$(activeTab).fadeIn(); 
		
		return false; 
	});
});