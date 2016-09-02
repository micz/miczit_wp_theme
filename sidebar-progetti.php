<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 */
?>

	<?php if ( is_active_sidebar( 'progetti' ) ) : ?>
		<div id="secondary" class="col-md-3 sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'progetti' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>