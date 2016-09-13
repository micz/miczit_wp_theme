<?php
/**
 * Template Name: Pagina Fotografia
 */

get_header(); ?>

	<div class="container">
            <div class="row">
                <div id="primary" class="col-md-12 content-area">
						<main id="main" class="site-main fotografia" role="main">

							<?php
							if ( !is_paged() ) {
									  if ( have_posts() ) : the_post() //print page text ?>
								<?php
		        						get_template_part( 'template-parts/content', 'page-fotografia' );
		        				?>
								<?php endif;
							}
							?>
<?php
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query( array(
		 'tax_query' => array(
        	array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array(
					/*'post-format-aside',
					'post-format-audio',
					'post-format-chat',
					'post-format-gallery',*/
					'post-format-image',	//image post format are not shown in the homepage
				   /* 'post-format-link',
					'post-format-quote',
					'post-format-status',
					'post-format-video'*/
				),
				'operator' => 'IN'
       		)
    	  ),
    	));
?>

						<?php if ( have_posts() ) : ?>

							<?php if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
							<?php endif; ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
		        						get_template_part( 'template-parts/content', get_post_format() );
		        				?>

							<?php endwhile; ?>

							<?php miczit_posts_navigation(); ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>

						</main><!-- #main -->
				</div><!-- #primary -->
				<?php  wp_reset_postdata(); ?>

				<?php //get_sidebar('fotografia'); ?>
			    </div><!--row-->

		</div><!--.container-->
		<?php get_footer(); ?>



