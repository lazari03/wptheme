<?php
/**
 * 404 template.
 *
 * @package LINKNEST
 */

get_header();
?>
<section class="section">
	<div class="container content-card reveal">
		<h1><?php esc_html_e( 'Page not found', 'linknest' ); ?></h1>
		<p><?php esc_html_e( 'Sorry, we could not find what you are looking for.', 'linknest' ); ?></p>
		<a class="ln-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back Home', 'linknest' ); ?></a>
	</div>
</section>
<?php
get_footer();
