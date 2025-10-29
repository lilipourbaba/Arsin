<footer class="site-footer">
	<div class="footer-wrapper">
		<div class="footer-col">
			<h4 class="footer-col-title">discover</h4>
			<?php wp_nav_menu(['theme_location' => 'footer-col1']) ?>
		</div>
		<div class="footer-col col-contact">
			<h4 class="footer-col-title">Contact</h4>
		 <div><a href='#'> </a></div> 
  				<div class="icon-social-media">
	 
			</div>
		</div>
		<div class="footer-col">
			<h4 class="footer-col-title">Our Compony</h4>
			<?php wp_nav_menu(['theme_location' => 'footer-col2']) ?>
		</div>
		<div class="footer-col col-support">
			<h4 class="footer-col-title">Support</h4>
			<?php wp_nav_menu(['theme_location' => 'footer-col3']) ?>

		</div>
		<?php if (!empty ($address)): ?>
			<div class="footer-col footer-address">
				<h4 class="footer-col-title">Address</h4>
				<div>
					<a href="<?= $map_link?>"><?= $address ?></a>
				</div>
			</div>
		<?php endif ?>
		<div class="footer-col col-newsletter" id="newsletter">
			<h4 class="footer-col-title">Join Our Newsletter</h4>
			<div>Subscribe To Our Blog Posts</div>
			<form class="form-newsletter" id="subscribe" action="">
				<input class="input-primary" name="email" type="email" id="email_input" placeholder="email">
				<button class="button-primary" id="Subscribe-button">Subscribe</button>
				<p class=" " id="success"></p>
			</form>
		</div>
	</div>
</footer>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>