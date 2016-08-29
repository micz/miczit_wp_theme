<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/

get_header(); ?>

		<div class="container">
            <div class="row">
				<div id="primary" class="col-md-9 content-area">
					<main id="main" class="site-main" role="main">

				<?php get_template_part( 'template-parts/content', 'archives' ); ?>

					</main><!-- #main -->
				</div><!-- #primary -->

				<?php get_sidebar('sidebar-1'); ?>

			</div> <!--.row-->
        </div><!--.container-->
        <?php get_footer(); ?>