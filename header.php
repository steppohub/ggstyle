<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php bloginfo('description') ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />   
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>


    <header class="top">  


        <div class="container">
        
        
            <a class="logo" href='<?php echo esc_url(home_url()); ?>'><img alt="<?php bloginfo(); ?>" class="logo__img" src='<?php echo get_template_directory_uri(); ?>/img/logo.png'></a>
            
            
            <div class="tagline"><?php bloginfo('description'); ?></div>
                          
            
            <?php get_search_form(); ?>
        
        
        </div>
        
    <nav class="top__menu">
        <a class="mobileToggle" href="#"><span class="mobileToggle-inner"></span></a>    
        <?php 
        	wp_nav_menu(
        	    array(
        	        "menu" => "primary",
        	        "container" => "",
        	        "menu_class" => "menu topMenu",
        	        "fallback_cb" => "gg_fallback_menu"
                )
            ); 
        ?> 
    </nav>   
        
    <?php gg_before_content(); ?>
    
          
    </header>