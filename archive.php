<?php get_header(); ?>

<main class="main">

<div class="main__top">

<?php 
    if (is_post_type_archive('tools') || is_tax('tools_cat') || is_tax('tools_tags')) {
		
		echo "<a class='USLink popmake-37'>Click here to view the US versions of these documents.</a>";
	
	} elseif (is_post_type_archive('descriptions') || is_tax('descriptions_cat') || is_tax('descriptions_tags')) {
		
		echo "<a class='USLink popmake-56'>Click here to view the US versions of these documents.</a>";
 
    } elseif (is_post_type_archive('materials') || is_tax('materials_cat') || is_tax('materials_tags')) {
		
		echo "<a class='USLink popmake-59'>Click here to view the US versions of these documents.</a>";
	 
    } 

	$post = get_post(5);
	echo apply_filters('the_content', $post->post_content);
?>	

</div>

<?php
    echo "<div class='left'>"; 	  	

    	     	
		if (have_posts()) : while (have_posts()) : the_post(); 		


        echo '<article class="content content--post">';


            echo "<a class='post post--gallery' href='".get_the_permalink()."'><h2 class='post__title'>".get_the_title()."</h2></a>";
            
            the_excerpt();
            

        echo '</article>';


        endwhile; 
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



	<?php else : ?>

        <article class="content content--none">

    		<h2 class="post__title">Not Found</h2>
    		
    		<p>Nothing here yet!</p>
    		<p>Stay tuned for content soon...</p>
		
        </article>
	
	<?php endif; ?>
	

    </div>
	
	
	<?php get_sidebar(); ?>
		
	
</main><!-- .main -->

<?php get_footer(); ?>