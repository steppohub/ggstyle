<?php get_header(); ?>
    <section class='main'>
        
        
        
        <aside class="content content--left">
            
        </aside>
        
        
        
        
        <article class='content content--right'>           

    
        <?php
        while (have_posts()) : the_post();
    
            
            echo "<h1 class='content__title'>".get_the_title()."</h1>";

            the_content();
                
                	
        endwhile; 
        ?>
    
    
        </article><!-- .content -->
        
        
        
        
    </section><!-- .main -->
<?php get_footer(); ?>