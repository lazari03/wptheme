<?php
/**
 * Front page template.
 *
 * @package LINKNEST
 */

get_header();

if ( get_theme_mod( 'linknest_hero_enable', true ) ) {
	get_template_part( 'template-parts/hero' );
}

if ( get_theme_mod( 'linknest_features_enable', true ) ) {
	get_template_part( 'template-parts/features' );
}

if ( get_theme_mod( 'linknest_testimonials_enable', true ) ) {
	get_template_part( 'template-parts/testimonials' );
}

if ( get_theme_mod( 'linknest_pricing_enable', true ) ) {
	get_template_part( 'template-parts/pricing' );
}

get_template_part( 'template-parts/cta' );

while ( have_posts() ) {
	the_post();
	if ( trim( (string) get_the_content() ) ) {
		?>
		<section class="section">
			<div class="container content-card reveal">
				<?php the_content(); ?>
			</div>
		</section>
		<?php
	}
}

get_footer();
