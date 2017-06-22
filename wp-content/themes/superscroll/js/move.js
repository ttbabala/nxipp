$(document).ready(function(){   
     $(".menu_nav").css({"height":($(window). height())+"px"});
	 $(".menu_nav").append('<div class="hedet"><\/div>');
	 $(".sub-menu").parent("li").append('<b class="hover">+<\/b>');
	 $(".hover").click(function() {
		 if($(this).prev(".sub-menu").hasClass("up")){
			 
			  $(this).prev(".sub-menu").slideUp(300); 
			  $(this).prev(".sub-menu").removeClass("up");
			 }else{
				 	 $(this).prev(".sub-menu").slideDown(300); 
					  $(this).prev(".sub-menu").addClass("up");
				 }
	});
	
	$("#nav_btn").click(function() {
		if($(this).next(".menu_nav").hasClass("open")){
			$(this).next(".menu_nav").animate({"right":"-300px"},600,'easeOutCubic');$(this).next(".menu_nav").removeClass("open");
		    $(this).children( "a").animate({"right":"0"},600,'easeOutCubic');
		 }
		else{
		$(this).next(".menu_nav").addClass("open");
		$(this).next(".menu_nav").animate({"right":"0"},600,'easeOutCubic');
		$(this).children( "a").animate({"right":"-43px"},600,'easeOutCubic');
	
		}
		
		}); 
	

  $(".close_order").click(function() { $(".shop_form").fadeOut(500);}); 
$("#content_shop_btn").click(function(){
		$(this).addClass("cutyes");
		$("#comment_shop_btn").removeClass("cutyes");
		$("#comment_shop").fadeOut(300);
		$("#content_shop").fadeIn(300);

	});
	
		 $("#comment_shop_btn").click(function(){
		$(this).addClass("cutyes");
		$("#content_shop_btn").removeClass("cutyes");
			$("#content_shop").fadeOut(300);
		$("#comment_shop").fadeIn(300);
	

	});
	
	$(".des_page  a.btn").click(function() {
$(".shop_form").fadeIn(500);
var pos = $(".shop_form").offset().top -50;
$("html,body").animate({scrollTop: pos}, 1000);


}); 

  
});  
