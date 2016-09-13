<?php
/**
 * Template part for displaying photos (image post format).
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>"  <?php post_class('post-content'); ?>>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'nisarg' ) );
	} ?>
	<?php if(is_single()){miczit_get_i18n_page($post->ID);} ?>
	<?php
		if(!is_tax()&&is_archive()){	//show short version
			get_template_part( 'template-parts/content','image-short');
		}else{							//show full version
			get_template_part( 'template-parts/content','image-full');
		}
	?>
</article><!-- #post-## -->