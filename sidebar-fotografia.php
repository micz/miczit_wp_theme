<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 */
?>

	<?php if ( is_active_sidebar( 'fotografia' ) ) : ?>
		<div id="secondary" class="col-md-3 sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'fotografia' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>