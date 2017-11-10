

//ег1
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