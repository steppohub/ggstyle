<aside class="sidebar">

<?php
    if(is_archive() || is_single()) :
    
    	$postType = get_post_type();
    	$postTaxs = get_object_taxonomies($postType);
    	// Remove Tags from $postTaxs array
    	foreach($postTaxs as $k => $v) {
            if(strpos($v, 'tags')) {
                unset($postTaxs[$k]);
            }
    	}
    	$terms = get_terms($postTaxs);
    	
    	
        // Category List
        echo "<ul class='catList'><h3 class='catList__title'>Categories</h3>";
        
            // All Cats link
            $is_current = '';
            
            if(is_post_type_archive($postType)) 
            {
                $is_current = 'catList__list--current';
            }
            
            echo "<li class='catList__list $is_current'><a class='catList__link' href='".get_post_type_archive_link($postType)."'>All</a></li>"; 
        
        foreach( $terms as $term ) {
            $is_cat = '';
            
            if(is_tax($postTaxs, $term))
            {
                $is_cat = 'catList__list--current';
            }
            
            
            echo "<li class='catList__list $is_cat'><a class='catList__link' href='".get_term_link($term)."'>$term->name</a></li>";
            
        }
        echo "</ul>";    	    
    
    
    
    
    
        // Post Tags
        $postType = get_post_type();
    	$postTaxs = get_object_taxonomies($postType);
    	// Remove Tags from $postTaxs array
    	foreach($postTaxs as $k => $v) {
            if(strpos($v, 'cat')) {
                unset($postTaxs[$k]);
            }
    	}    	

    	
/* This is to get the Terms for just this single post
    	if(is_single()) {
        	$terms = get_the_terms(get_the_id(), implode($postTaxs));
    	} else {
        	$terms = get_terms($postTaxs);
    	}
*/


    	$terms = get_terms($postTaxs);
    	
        echo "<ul class='tagList'><h3 class='tagList__title'>Tags</h3>";       
        foreach( $terms as $term ) {
            $is_cat = '';
            
            if(is_tax($postTaxs, $term))
            {
                $is_cat = 'tagList__list--current';
            }
            
            
            echo "<li class='tagList__list $is_cat'><a class='tagList__link' href='".get_term_link($term)."'>$term->name</a></li>";
            
        }
        echo "</ul>";        
    else :
?>








<ul class="sideMenu">
    <li class="sideMenu__item"><a class="sideMenu__link" href="#">Sub menu item to go here</a></li>
    <li class="sideMenu__item"><a class="sideMenu__link" href="#">Sub menu item to go here</a></li>
    <li class="sideMenu__item"><a class="sideMenu__link" href="#">Sub menu item to go here</a></li>
</ul>


<?php endif; ?>


</aside>