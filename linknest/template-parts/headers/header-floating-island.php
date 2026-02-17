<header class="site-header header-floating-island <?php echo get_theme_mod( 'linknest_header_transparent', false ) ? 'is-transparent' : ''; ?>">
	<div class="container">
		<div class="header-island">
			<div class="site-branding logo-fixed">
				<?php the_custom_logo(); ?>
				<?php if ( ! has_custom_logo() ) : ?>
					<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</div>
			<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'linknest' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
			</nav>
			<a class="ln-button ln-button-primary" href="#pricing"><?php esc_html_e( 'Start Free', 'linknest' ); ?></a>
		</div>
	</div>
</header>
