<?php


function gg_before_content() {
    $output = $title = $img = '';
    
    $title = ( is_front_page() ? get_bloginfo() : wp_title('', false) );
    if(is_tax()) $title = get_the_archive_title();
    
    
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'slideL' );
    if(isset($img[0])) $img = $img[0];
    if($img == '') $img = get_template_directory_uri().'/img/slide.jpg';
    
    
    //echo "<pre><code>".print_r( $img, true )."</code></pre>";
        	
	
    $output = "<header class='beforeContent'><img alt='$title' class='beforeContent__img' src='$img'><h1 class='beforeContent__title'>$title</h1></header>";
    
    
    // content output
    echo $output;
}




function gg_fallback_menu() {
    
    $menu = wp_page_menu(
        array(
            'depth' => 3,
            'echo' => false
        )
    );
    
    echo "<nav class='top__menu'>$menu</nav>";
}




function gg_menu_css_class($classes, $item) {    
    
    return $classes;
}
add_filter( 'nav_menu_css_class', 'gg_menu_css_class', 10, 2 );