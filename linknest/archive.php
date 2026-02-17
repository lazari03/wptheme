<?php
/**
 * Archive template.
 *
 * @package LINKNEST
 */

get_header();
?>
<section class="section">
	<div class="container">
		<h1><?php the_archive_title(); ?></h1>
		<?php if ( have_posts() ) : ?>
			<div class="grid-3">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'content-card reveal' ); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
