<?php
/**
 * The template used for displaying page content in archives.php
 *
 * @package Micz.it
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>

	<?php nisarg_featured_image_disaplay(); ?>

	<header class="entry-header">
		<span class="screen-reader-text"><?php the_title();?></span>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta"></div><!-- .entry-meta -->
	</header><!-- .entry-header -->


	<div class="entry-content">
		<div class="row">
			<div class="col-md-12">
				<b>Tag cloud</b>
				<ul>
				<?php wp_tag_cloud('smallest=8&largest=22'); ?>
				</ul>
			</div>
		</div>
		<div class="row">&nbsp;</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<b><?php echo miczit_get_user_lang()=='it'?'Indietro nel tempo...':'Going back in time...'?></b>
					<ul>
						<?php wp_get_archives('type=yearly'); ?>
					</ul>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-5">
				<b>Categorie<?php echo miczit_get_user_lang()=='it'?'':'s'?></b>
					<ul>
						 <?php wp_list_categories('title_li='); ?>
					</ul>
				</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'nisarg' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

