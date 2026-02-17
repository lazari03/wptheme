<?php
/**
 * LINKNEST template: saas-landing
 *
 * @package LINKNEST
 */
get_header();
?>
<section class="section"><div class="container content-card reveal"><h1><?php the_title(); ?></h1><?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?></div></section>
<?php get_footer(); ?>
