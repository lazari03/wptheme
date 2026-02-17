<?php
/**
 * Index template.
 *
 * @package LINKNEST
 */

get_header();
?>
<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'content-card reveal' ); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No content found.', 'linknest' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
