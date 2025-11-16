<section class="flex container">

	<div class="component">
		<div>
			<span>Keyword Discovery</span>
			<span>Discovery List Mode <i class="iconsax" icon-name="calendar-1"></i></span>
		</div>
		<ul>
			<li>Hand-knotted</li>
			<li>Hand-knotted</li>
		</ul>
	</div>
	
	<div class="component">
		<div>
			<h4>Filters</h4>
 		</div>
		<ul>
			<li> </li>
			<li>Hand-knotted</li>
		</ul>
	</div>
	<nav class="cards">
		<div class="rug-card">
			<?php
			$args = [
				'post_type'      => 'rug',
				'posts_per_page' => 12, // تعداد آیتم‌ها در هر صفحه
				'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
			];
			$query = new WP_Query($args);

			if ($query->have_posts()) :
				while ($query->have_posts()) :
					$query->the_post();
					$post_id = get_the_ID();
					get_template_part('/templates/components/cards/rug-cards/rug', 'card-home', ['post_id' => $post_id]);
				endwhile;
			else :
				echo '<p>no rug</p>';
			endif;

			wp_reset_postdata();
			?>
		</div>
	</nav>
	<?php
	if (function_exists('the_pagination')) {
		the_pagination($query);
	}
	?>
</section>