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
	<?php miczit_featured_image_display('miczit-full-width'); ?>

	<header class="entry-header-fotografia">

		<span class="screen-reader-text"><?php the_title();?></span>

		<?php
		 /*if(!has_tag(array('link','citazioni','video','foto','immagini'))) :
		 if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<div class="entry-meta"></div>
		<?php endif; // is_single()
		endif; // tag if for title */?>

	</header><!-- .entry-header -->

			<div class="entry-content miczit-fotografia-content">
				<?php
					the_content('...<p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'nisarg') . '<span class="screen-reader-text"> '. __(' Read More', 'nisarg').'</span></a></p>');
				?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nisarg' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php miczit_entry_footer(); ?>
	</footer><!-- .entry-footer -->