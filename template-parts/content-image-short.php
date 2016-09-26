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
					//print the post meta if not blank
					$miczit_photo_exif = trim(get_post_meta($post->ID, '_miczit_photo_exif', true));
					$miczit_photo_data = trim(get_post_meta($post->ID, '_miczit_photo_data', true));
					if($miczit_photo_exif!=''){
						?><p style="text-align: right;"><em><?php echo $miczit_photo_exif;?></em></p><?php
					}
					if(($miczit_photo_exif!='')&&($miczit_photo_data!='')){
						?><p style="text-align: center;"><strong><?php the_title();?></strong><?php
					}
					if($miczit_photo_data!=''){
						?><br/><em><?php echo $miczit_photo_data;?></em></p><?php
					}
					the_content('...<p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'nisarg') . '<span class="screen-reader-text"> '. __(' Read More', 'nisarg').'</span></a></p>');
				?>
			</div><!-- .entry-content -->
	<footer class="entry-footer miczit-small-width">
	</footer><!-- .entry-footer -->