<?php
/**
 * Template part for displaying photos (image post format).
 *
 * @package Nisarg
 */

?>

<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'nisarg' ) );
	} ?>
	<?php if(is_single()){miczit_get_i18n_page($post->ID);} ?>
	<?php miczit_featured_image_display('miczit-small-width'); ?>
			<div class="entry-content-miczit-small-width">
				<?php
					miczit_posted_on();
					the_content('...<p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'nisarg') . '<span class="screen-reader-text"> '. __(' Read More', 'nisarg').'</span></a></p>');
				?>
			</div><!-- .entry-content -->
	<footer class="entry-footer miczit-small-width">
	</footer><!-- .entry-footer -->