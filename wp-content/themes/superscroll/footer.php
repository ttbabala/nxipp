<?php $detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	get_template_part( 'move/footer' );
	}else{  ?>
<div id="footer">
<?php get_template_part( 'index/contact' );

get_template_part( 'kefu' );
 ?>
</div>


	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->

</body>

</html>
<?php } ?>