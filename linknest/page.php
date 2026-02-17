<?php
/**
 * Page template.
 *
 * @package LINKNEST
 */

get_header();
while ( have_posts() ) {
	the_post();
	?>
	<section class="section">
		<div class="container content-card reveal">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</section>
	<?php
}
get_footer();
