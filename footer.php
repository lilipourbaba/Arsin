<footer class="site-footer">
	
	<div class="footer-wrapper">
		<div class="footer-col">
			<div class="site-name">
					<a href="<?php echo esc_url(home_url('/')); ?>">
										<?php the_custom_logo() ?>
	<?php echo get_option('blogname'); ?> </a>
				</div>
 			<?php wp_nav_menu(['theme_location' => 'footer-col1']) ?>
		</div>
		<div class="footer-col ">
 					<?php wp_nav_menu(['theme_location' => 'footer-col2']) ?>

		</div>
		 
	</div>
		<div class="footer-rights">
 			<div>© 2024 Arsin Rug Gallery, All Rights Reserved</div>

		</div>
</footer>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>