<?php get_header(); ?>
  
    <section class='main'>
      
        
        <article class='content'>           


        <?php
        while (have_posts()) : the_post();
    
            
            the_content();
                
                	
        endwhile; 
        ?>
    
    
        </article><!-- .content -->
        
        
        <?php get_sidebar(); ?>


    </section><!-- .main -->
    
<?php get_footer(); ?>