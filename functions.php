<?php

/* altering inc/parts/class-footer-footer_main.php
    Credits osa muutmiseks.
 */
add_filter('tc_credits_display', 'my_custom_credits', 20);
function my_custom_credits(){ 
	return '
	<div class="span6 credits">
						<p> &middot; &copy; '.esc_attr( date( 'Y' ) ).' <a href="'.esc_url( home_url() ).'" title="'.esc_attr(get_bloginfo()).'" rel="bookmark">'.esc_attr(get_bloginfo()).'</a> &middot; Design by <a href="http://www.presscustomizr.com/">Press Customizr</a> &middot; Customized by Ranno &middot;</p>
	</div>';
}


//RR lisa TEST
function ranno_cmzr_scripts() {
	// fancybox
	wp_enqueue_script('fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.js', array('jquery'), '3.0.1');
	wp_enqueue_style( 'fancybox-css', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css', array(), '3.0.1' );
	// photoswipe skriptid
	wp_enqueue_script('psw-klass', get_stylesheet_directory_uri() . '/js/klass.min.js', array('jquery'), '3.0.5');
	wp_enqueue_script('psw-jquery', get_stylesheet_directory_uri() . '/js/code.photoswipe.jquery-3.0.5.js', array('jquery', 'psw-klass'), '3.0.5');
	wp_enqueue_style('psw-css-rr', get_stylesheet_directory_uri() . '/css/photoswipe.css', '1.1');
}
add_action( 'wp_enqueue_scripts', 'ranno_cmzr_scripts');

//Ranno after footer
function ranno_cmzr_afterfooter(){
?>
	<!-- FancyboxPhotoswipe -->
		<script type="text/javascript">
		jQuery(document).ready(function($) { 
			 if("ontouchstart" in document.documentElement)
			  {
				console.log("Photoswipe");
			$("a[href$='jpg']").photoSwipe({
				imageScaleMethod: 'fit',
				autoStartSlideshow: false,
				captionAndToolbarAutoHideDelay: 5000,
				loop: false,
				doubleTapZoomLevel: 1.5,
				enableDrag: true,
				enableMouseWheel: true,
				enableKeyboard: true,
				zIndex: 1000
					}); 

			  }
			  else
			  {
				console.log("Fancybox");
			$("a[href$='.jpg']").attr('rel', 'gallery').fancybox({
				padding:1,
				loop:false,
				afterLoad: function() {
					//this.title = this.title + '<a href="' + this.href + '"> Download</a> ';
				}
			});     
			  }
		});
		</script>
<?php
}
add_action ( '__after_footer'  , 'ranno_cmzr_afterfooter' );

##testing 02.02.2016
#  replace /th/ with /w600/ for development checking

//add_filter('the_content', 'replace_th', 20);
function replace_th($content){ 
	$content = str_replace("/th/","/w600/",$content);
	return $content;
}

## end 02.02.2016
?>