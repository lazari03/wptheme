<?php
/**
 * Front page template.
 *
 * @package LINKNEST
 */

get_header();

get_template_part( 'template-parts/heroes/hero', linknest_get_hero_layout() );
get_template_part( 'template-parts/sections/section', 'features' );
get_template_part( 'template-parts/sections/section', 'testimonials' );
get_template_part( 'template-parts/sections/section', 'pricing' );
get_template_part( 'template-parts/sections/section', 'cta' );

while ( have_posts() ) {
	the_post();
	the_content();
}

get_footer();
