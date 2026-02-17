<?php
/**
 * Features section.
 *
 * @package LINKNEST
 */
?>
<section class="section" id="features">
	<div class="container">
		<h2 class="section-title reveal"><?php echo esc_html( get_theme_mod( 'linknest_features_title', __( 'Powerful features', 'linknest' ) ) ); ?></h2>
		<div class="grid-3">
			<?php
			$query = new WP_Query(
				array(
					'post_type'      => 'linknest_feature',
					'posts_per_page' => 6,
				)
			);

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<article <?php post_class( 'content-card reveal feature-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium', array( 'loading' => 'lazy' ) ); ?>
						<?php endif; ?>
						<h3><?php the_title(); ?></h3>
						<div><?php the_excerpt(); ?></div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
