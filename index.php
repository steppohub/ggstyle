<?php get_header(); ?>

<section id="content">

	<article class="entry">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			

		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1> 
	
		<div class="the_content">

		<?php the_content('Continue Reading &raquo;'); ?>
		
		</div><!--end the_content-->
		

<?php endwhile; else : ?>
	
		<h2>Page not found</h2>
		<div class="the_content">
		<p>Sorry we can't find that.</p>
		<p>You could try another search or <a href="<?php bloginfo('home'); ?>">return to our homepage</a>.</p>
		<?php get_search_form(); ?>
		</div><!--end the_content-->

<?php endif; ?>

	</article><!--end entry-->

<?php get_sidebar(); ?>

<div class="clearer"></div>

</section><!--end content-->

<?php get_footer(); ?>
