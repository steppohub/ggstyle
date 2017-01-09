<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ggstyle
 */

get_header(); ?>

    <div id="primary" class="content-area">
    <div class="container">
    <div class="row">

        <div class="col-8">
            <main id="main" class="site-main" role="main">

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');
                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div><!-- .col-8 -->

        <div class="col-4">
            <?php get_sidebar(); ?>
        </div><!-- .col-4 -->

    </div><!-- .row -->
    </div><!-- .container -->
    </div><!-- #primary -->

<?php
get_footer();
