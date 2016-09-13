<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nisarg
 */

get_header();
?>
	<div class="container">
        <div class="row">
			<?php while ( have_posts() ) : the_post();
						$curr_post_format=get_post_format();?>
			<div id="primary" class="col-md-<?php echo $curr_post_format=='image'?'12':'9';?> content-area">
				<main id="main" role="main">

				<?php
						get_template_part( 'template-parts/content',$curr_post_format); ?>
				</main><!-- #main -->

				<div class="post-navigation">
					<?php /*nisarg_post_navigation();*/	?>
				</div>

				<div class="post-comments">
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						if(!comments_open())
							_e('Comments are closed.','nisarg');

					?>
				</div>

				<?php endwhile; // End of the loop. ?>


			</div><!-- #primary -->

			<?php
			 if($curr_post_format=='image'){ //we are showing a photo
				 //get_sidebar('fotografia');
			 }else{
				 get_sidebar('sidebar-1');
			 }?>
		</div> <!--.row-->
    </div><!--.container-->
    <?php get_footer(); ?>
