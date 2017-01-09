<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ggstyle
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">

        <div class="site-info">
            <?php printf( esc_html__( 'Copyright &copy; %1$s %2$s. All rights reserved.', 'ggstyle' ), date('Y'), "<a href='".esc_url(home_url('/'))."'>".get_bloginfo('name')."</a>" ); ?>
            <span class="sep"> | </span>
            <?php printf( esc_html__( 'Website by %1$s.', 'ggstyle' ), '<a href="http://greengraphics.com.au/" rel="designer" target="_blank">Greengraphics</a>' ); ?>
        </div><!-- .site-info -->
        
    </div><!-- .container -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
