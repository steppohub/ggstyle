<?php get_header(); ?>

<section id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
	<article class="entry">
	
		<h1><?php the_title(); ?></h1> 
	
		<div class="the_content">

		<?php the_content('Continue Reading &raquo;'); ?>
		
		</div><!--end the_content-->
		
	</article><!--end entry-->

<?php endwhile; else : ?>
	
	<article class="entry">
		<h2>Not Found</h2>
		<div class="the_content">
		<p>Sorry we can't find what anything that matches your search.</p>
		<p>You could try another search or browse our categories.</p>
		<?php get_search_form(); ?>
		</div><!--end the_content-->
		<ul><?php wp_list_categories('title_li=<h2>Categories</h2>'); ?></ul>
	</article><!--end entry-->

<?php endif; ?>

<?php get_sidebar(); ?>

<div class="clearer"></div>

</section><!--end content-->

<?php get_footer(); ?>
