<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<link rel="Shortcut Icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="language" content="en" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?>| <?php } ?> <?php wp_title(); ?></title>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<header class="clearer">

<div class="wrapper">

	<a id="logo" href="<?php bloginfo('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png"></a>
	

	<a href="#" id="menu-bit">Menu</a>
	
	<?php 
		wp_nav_menu( 
			array(
				"theme_location" => "mainnav",
				"container" => "nav",
				"container_id" => "main-menu"
			)
		); 
	?>
	
	</div>
	
</header><!--end header-->

<div class="wrapper">
