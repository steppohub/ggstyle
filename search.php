<?php 
	get_header(); 

	global $wp_query;	

?>

<section class="main row">
		
	<article class="content">

		<h1 class='beforeContent__title aligncenter'>Search Results</h1>
	
		<h2 class=""><?php echo $wp_query->found_posts; ?> results found.</h2>
		
		<?php 
    		if (have_posts()) : while (have_posts()) : the_post(); 
    		
                $pics = $attachment = $img_src = '';
                $pics = get_field('pictures');
                
                if(is_array($pics) && $pics[0]['profile_picture'] != null) {
                    $img_src = $pics[0]['profile_picture']['sizes']['thumbnail'];
                } elseif(has_post_thumbnail() && wp_get_attachment_image_src( get_post_thumbnail_id() ) ) {
                    $attachment = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail', false);
                    $img_src = $attachment[0];
                } else {
                    $img_src = get_template_directory_uri().'/img/default.jpg';
                }			
				
						
				$url = get_permalink();
				$alt = get_the_title();


				echo "<a href='$url' title='$alt'", post_class('content__post') ,">";
					echo "<img alt='$alt' class='contentPost__img' src='$img_src' />";
					echo "<h3 class='contentPost__title'><span>$alt</span></h3>";	
				echo '</a>';
    			
    			
            endwhile; endif; 
        ?>
        
        
		<div class="paginate">
		
		<?php
			global $wp_query;
			
			$big = 999999999; // need an unlikely integer
			
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
		?>
		
		</div>
        
		
	</article><!-- .content -->
</section><!-- .main -->

<?php get_footer(); ?>