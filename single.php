<?php get_header(); ?>
<main class="main">
					
	
	<div class="left">
	
	
	<?php    	
		if (have_posts()) : while (have_posts()) : the_post(); 		


        echo '<article class="content content--noPad">';

            the_content();

        echo '</article>';


        endwhile; 
    ?>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
	
	<?php endif; ?>


    </div>


    <?php get_sidebar(); ?>
    

</main><!-- .main -->
<?php get_footer(); ?>