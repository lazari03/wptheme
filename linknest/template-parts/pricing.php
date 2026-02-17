<?php
/**
 * Pricing section.
 *
 * @package LINKNEST
 */

$highlight = get_theme_mod( 'linknest_highlight_plan', '' );
?>
<section class="section" id="pricing">
	<div class="container">
		<h2 class="section-title reveal"><?php echo esc_html( get_theme_mod( 'linknest_pricing_title', __( 'Simple pricing', 'linknest' ) ) ); ?></h2>
		<div class="grid-3 pricing-grid">
			<?php
			$query = new WP_Query(
				array(
					'post_type'      => 'linknest_pricing',
					'posts_per_page' => 3,
				)
			);

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					$is_featured = ( strtolower( trim( get_the_title() ) ) === strtolower( trim( $highlight ) ) );
					?>
					<article <?php post_class( 'content-card reveal pricing-card ' . ( $is_featured ? 'is-featured' : '' ) ); ?>>
						<h3><?php the_title(); ?></h3>
						<div><?php echo wp_kses_post( get_the_content() ); ?></div>
						<a href="#" class="ln-button ln-button-secondary"><?php esc_html_e( 'Choose Plan', 'linknest' ); ?></a>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
