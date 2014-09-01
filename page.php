<?php get_header(); ?>

<section class="main clearer">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
	<article class="content">
	
		<h1><?php the_title(); ?></h1> 
	
		<?php the_content('Continue Reading &raquo;'); ?>
				
	</article><!--end content-->

<?php endwhile; else : ?>
	
	<article class="content">
		<h2>Not Found</h2>
		<p>Sorry we can't find what anything that matches your search.</p>
		<p>You could try another search or browse our categories.</p>
		<p><?php get_search_form(); ?></p>
		<p><ul><?php wp_list_categories('title_li=<h2>Categories</h2>'); ?></ul><p
	</article><!--end content-->

<?php endif; ?>

<?php get_sidebar(); ?>

</section><!--end main-->

<?php get_footer(); ?>
