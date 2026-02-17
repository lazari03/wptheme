<header class="site-header header-classic <?php echo get_theme_mod( 'linknest_header_transparent', false ) ? 'is-transparent' : ''; ?>">
	<div class="container header-inner">
		<div class="site-branding logo-fixed">
			<?php the_custom_logo(); ?>
			<?php if ( ! has_custom_logo() ) : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		</div>
		<button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu"><span></span><span></span><span></span></button>
		<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'linknest' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false ) ); ?>
		</nav>
	</div>
</header>
