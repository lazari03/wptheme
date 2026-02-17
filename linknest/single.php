<?php
/**
 * Single template.
 *
 * @package LINKNEST
 */

get_header();
while ( have_posts() ) {
	the_post();
	?>
	<section class="section">
		<article class="container content-card reveal">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
	</section>
	<?php
}
get_footer();
