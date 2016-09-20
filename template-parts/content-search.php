<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
	<header class="entry-header">

		<span class="screen-reader-text"><?php the_title();?></span>

		<?php
		 if(!has_tag(array('link','citazioni','video','foto','immagini'))) :
		 if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<div class="entry-meta"></div>
		<?php endif; // is_single()
		endif; // tag if for title ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
				<?php
					the_content('...<p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'nisarg') . '<span class="screen-reader-text"> '. __(' Read More', 'nisarg').'</span></a></p>');
				?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php miczit_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

