<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Nisarg
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row site-info">
			<?/*?><a href="http://rss.micz.it/micz">feed rss</a>
			<span class="sep"> | </span><?*/?>
			<a target="_blank" href="http://creativecommons.org/licenses/by-nc-sa/2.5/it/">cc</a>
			<span class="sep"> | </span>
			<a target="_blank" href="http://twitter.com/micz">@micz</a>
			<?/*?><br/>
			<a href="mailto:m@micz.it">m@micz.it</a><?*/?>
<br/>proudly powered by <a target="_blank" href="http://wordpress.org/">WordPress</a><br/><img alt="wordpress.org" title="wordpress.org" src="<?=  get_stylesheet_directory_uri().'/images/wordpress.png'; ?>" border="0"/>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3931804-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>
