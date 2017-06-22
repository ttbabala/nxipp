<?php get_header(); 
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	get_template_part( 'move/index' );
	}
else{
?>

<div class="waper">
<div class="main"> 

<?php get_template_part( 'index/pic' ); ?>
<?php get_template_part( 'index/Service' ); ?>
<?php get_template_part( 'index/about' ); ?>
<?php get_template_part( 'index/case' ); ?> 
<?php get_template_part( 'index/news' ); ?> 
<?php get_template_part( 'index/band' ); ?> 
<?php get_template_part( 'index/contact' ); ?>
</div>
</div>
<?php get_template_part( 'index/nav' ); ?>
<?php wp_footer(); ?>
<script>
$("#top").bind("click",function(e) {$(this).scrolld();
 $(".nav_bottom_in").children("b").removeClass("hereis");
	 $("#top").addClass("hereis");
	  $.sercive_close();
 $.about_close();$.case_close();$.news_close();$.band_close();$.contact_close();
});

$("#Service").bind("click",function(e) { $(this).scrolld(); $.sercive_work();
 $.about_close();$.case_close();$.news_close();$.band_close();$.contact_close();});

$("#about").bind("click",function(e) { $(this).scrolld(); $.about_work();
 $.sercive_close();$.case_close();$.news_close();$.band_close();$.contact_close();}); 
 
$("#case").bind("click",function(e) { $(this).scrolld(); $.case_work();
 $.sercive_close();$.about_close();$.news_close();$.band_close();$.contact_close();});
 
$("#news").bind("click",function(e) { $(this).scrolld(); $.news_work();
 $.sercive_close();$.about_close();$.case_close();$.band_close();$.contact_close();});
 
 $("#band").bind("click",function(e) { $(this).scrolld(); $.band_work();
 $.sercive_close();$.about_close();$.case_close();$.news_close();$.contact_close();});
 
 $("#contact").bind("click",function(e) { $(this).scrolld(); $.contact_work();
 $.sercive_close();$.about_close();$.case_close();$.band_close();$.band_close();});

var mmmmm=0;
$("#pages1").bind("mousewheel",function(event, delta) {

if(delta<0){
		if(mmmmm<1) {	mmmmm=1;			
             var pos = $(this).next("div").offset().top;
			 $.sercive_work();
              $("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0; 
});}
     }

});

/* page1 --------*/




$("#pages2").bind("mousewheel",function(event, delta) {
$.sercive_close();
if(delta>0){
		if(mmmmm<1) {	mmmmm=1;
		$(".nav_bottom_in").children("b").removeClass("hereis");
	 $("#top").addClass("hereis");			
             var pos = $(this).prev("div").offset().top;
              $("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0;});}
     }
  else if(delta<0){	
  if(mmmmm<1) {	 mmmmm=1;
  $.about_work();
var pos =  $(this).next("div").offset().top;
$("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0; });}

}
});

/* page2 --------*/

$("#pages3").bind("mousewheel",function(event, delta) {
$.about_close();
if(delta>0){
		if(mmmmm<1) { mmmmm=1;	
		 $.sercive_work();	
             var pos = $(this).prev("div").offset().top;
              $("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0;});}
     }
  else if(delta<0){	 
  $.case_work();	
  if(mmmmm<1) {	 mmmmm=1;
var pos = $(this).next("div").offset().top;
$("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0; });}

}
});
/* page3 --------*/


$("#pages4").bind("mousewheel",function(event, delta) {
$.case_close();
if(delta>0){
	
		if(mmmmm<1) { mmmmm=1;	
		  $.about_work();	
             var pos = $(this).prev("div").offset().top;
              $("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0;});}
     } 
	 else if(delta<0){	
 	
	  $.news_work();	
  if(mmmmm<1) {	 mmmmm=1;
var pos =  $(this).next("div").offset().top;
$("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0; });}

}

});
/* page4 --------*/

$("#pages5").bind("mousewheel",function(event, delta) {
$.news_close();
if(delta>0){
	
		if(mmmmm<1) { mmmmm=1;	
		$.case_work();
             var pos = $(this).prev("div").offset().top;
              $("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0;});}
     }  else if(delta<0){	
 $.band_work();
  if(mmmmm<1) {	 mmmmm=1;
var pos =  $(this).next("div").offset().top;
$("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0; });}

}	
});

/* page5 --------*/

$("#pages6").bind("mousewheel",function(event, delta) {
$.band_close();
if(delta>0){
	
		if(mmmmm<1) { mmmmm=1;	
		$.news_work();
             var pos = $(this).prev("div").offset().top;
              $("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0;});}
     }  else if(delta<0){	
  $.contact_work();
  if(mmmmm<1) {	 mmmmm=1;
  var pos =  $(this).next("div").offset().top;
$("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0; });}

}	
});

/* page6 --------*/

$("#pages7").bind("mousewheel",function(event, delta) {

if(delta>0){
	 $.band_work();
	 $.contact_close();
		if(mmmmm<1) { mmmmm=1;	
	
             var pos = $(this).prev("div").offset().top;
              $("html,body").animate({scrollTop: pos},1000,'easeInQuart',function(){
mmmmm=0;});}
     }  
});

/* page7 --------*/

</script>

<?php }; get_footer(); ?>
