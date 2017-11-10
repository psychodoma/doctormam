//모바일 메뉴

$(function(){
	$(".allmenuIn").height($(document).height());
	
	$("#open_btn").click(function(){
		$(".allmenu").animate({marginRight:0+"px"},500); /*0은 속도 50은 속도값*/ /*메뉴가 나왔을때의 width값*/
	})
	$("#close_btn").click(function(){
		$(".allmenu").animate({marginRight:300+"px"},500); /*0은 속도 50은 속도값*/ /*메뉴가 다시 들어갈때 width값*/
	})
	$("#black_bg").click(function(){
		$(".allmenu").animate({marginRight:300+"px"},500); /*0은 속도 50은 속도값*/ /*메뉴가 다시 들어갈때 width값*/
	})
	

	$(".sub_ul").hide();
	$(".small_menu").click(function(){
		var class_name = $(this).attr("class");
		var class_name_arr = class_name.split(" ");
		var menu_number = class_name_arr[0];
		$("#" + menu_number).slideToggle();
		$(this).toggleClass("sub_active")
			.siblings(".allmenuIn ul li.menu1").removeClass("sub_active");
	})



	$(".agreesign").click(function(){
		$(".chk").removeAttr("checked");
		$(".process_black").css("display","none");		
		var mask_black = $(this).parents(".entry_choice").prev();
		mask_black.css("display","block");
	});
})





function potfol_fn()
{
	$("#black_bg").css("display","block");	
}

function potfol_close()
{	
	$("#black_bg").css("display","none");	
}



/*function process_fn()
{
	console.log($(this).attr("for"));
	var mask_black = $(this).parents(".entry_choice").children().first();
	mask_black.css("display","block");	

}
*/
function process_close()
{	
	$(".process_black").css("display","none");	
	$(".chk").removeAttr("checked");
	reset2();
}



$(document).ready(function(){
	$(".tabContents,.tabContents1,.tabContents2,.tabContents3,.tabContents4").hide(); // Hide all tab content divs by default
	$(".tabDetails,.tabDetails1").each(function(index){
		$(this).find(".tabContents:first,.tabContents1:first,.tabContents2:first,.tabContents3:first,.tabContents4:first").show();
	});
	
	$(".tab_link").click(function(){ 
		var activeTab = $(this).attr("href"); 
		//$(this).removeClass("active"); 
		$(this).parent().parent().find("li a").removeClass("active")
		$(this).addClass("active"); 
		$(this).parent().parent().siblings("div").find(".tabContents,.tabContents1,.tabContents2,.tabContents3,.tabContents4").hide();
		//$(".tabContents").hide();
		$(activeTab).fadeIn(); 
		
		return false; 
	});
});