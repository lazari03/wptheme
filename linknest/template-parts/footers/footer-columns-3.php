<footer class="site-footer footer-columns-3">
	<div class="container footer-grid cols-3">
		<div><h3><?php bloginfo( 'name' ); ?></h3></div>
		<div><?php dynamic_sidebar( 'footer-1' ); ?></div>
		<div><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false ) ); ?></div>
	</div>
</footer>
