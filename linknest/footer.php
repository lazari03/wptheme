<?php
/**
 * The footer for LINKNEST.
 *
 * @package LINKNEST
 */
?>
</main>
<footer class="site-footer">
	<div class="container footer-inner">
		<p><?php echo esc_html( get_bloginfo( 'name' ) ); ?> &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?></p>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'container'      => false,
				'fallback_cb'    => '__return_empty_string',
			)
		);
		?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
