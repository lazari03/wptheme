<?php
/**
 * Testimonials section.
 *
 * @package LINKNEST
 */
?>
<section class="section section-alt" id="testimonials">
	<div class="container">
		<h2 class="section-title reveal"><?php echo esc_html( get_theme_mod( 'linknest_testimonials_title', __( 'Loved by creators', 'linknest' ) ) ); ?></h2>
		<div class="grid-3">
			<?php
			$query = new WP_Query(
				array(
					'post_type'      => 'linknest_testimonial',
					'posts_per_page' => 3,
				)
			);

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<article <?php post_class( 'content-card reveal' ); ?>>
						<blockquote><?php echo wp_kses_post( get_the_content() ); ?></blockquote>
						<cite><?php the_title(); ?></cite>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
