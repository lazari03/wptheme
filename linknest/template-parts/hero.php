<?php
/**
 * Hero section.
 *
 * @package LINKNEST
 */

$title    = get_theme_mod( 'linknest_hero_title', __( 'Everything you are. In one, simple link in bio.', 'linknest' ) );
$subtitle = get_theme_mod( 'linknest_hero_subtitle', __( 'Drive your audience to the right destination with a fast, conversion-focused SaaS website.', 'linknest' ) );
$btn_text = get_theme_mod( 'linknest_hero_button_text', __( 'Get Started Free', 'linknest' ) );
$btn_link = get_theme_mod( 'linknest_hero_button_link', '#pricing' );
?>
<section class="hero section" id="hero">
	<div class="container hero-inner">
		<div class="hero-content reveal">
			<h1><?php echo esc_html( $title ); ?></h1>
			<p><?php echo esc_html( $subtitle ); ?></p>
			<a class="ln-button ln-button-primary" href="<?php echo esc_url( $btn_link ); ?>"><?php echo esc_html( $btn_text ); ?></a>
		</div>
		<div class="hero-visual reveal" data-parallax>
			<div class="glass-card">
				<strong><?php esc_html_e( '45% more clicks', 'linknest' ); ?></strong>
				<p><?php esc_html_e( 'Optimized pages with high-converting layouts.', 'linknest' ); ?></p>
			</div>
		</div>
	</div>
</section>
