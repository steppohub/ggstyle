<?php

include 'code/ggtools.php';

// Add Javascript files
function ggstyle_scripts() {
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.10.2', false );
	wp_enqueue_script( 'general', get_template_directory_uri() . '/js/general.js', array('jquery'), false, true);
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '2.8.3', true );
}

add_action( 'wp_enqueue_scripts', 'ggstyle_scripts' );


// Add an HTML5 Shim

add_action( 'wp_head', 'html5_shim' ); 

if ( ! function_exists( 'html5_shim' ) ) {
	function html5_shim() {
	?>
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/selectivizr-min.js"></script>
<![endif]-->
	<?php
	} // End html5_shim()
}

?>
