<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

	<?php wp_head() ?>
	<meta name="google-site-verification" content="" />
</head>

<body <?php body_class() ?>>
	<header>
		  
		<div class="desktop-header">
 				<div class="site-name">
							<?php the_custom_logo(); ?>
 					<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?> </a>
				</div>

 		
				<?php wp_nav_menu([
				
					'theme_location' => 'header',
					'menu_class' => 'primary mb-hide'
				]) ?>
		</div>
			<div class="container">
 
				 
				<div class="header-search mb-hide">
					<?php
					get_template_part(
						'templates/components/forms/search-box',
						null,
					);
					?>
				</div>
			</div>
		
 
	</header>

	<?php wp_body_open() ?>