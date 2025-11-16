<nav class="rug-related ">
	<h3>Collections</h3>
 			<?php
			$args = [
				'post_type'      => 'collection',
				'posts_per_page' => 12, // تعداد آیتم‌ها در هر صفحه
				'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
			];
			$query = new WP_Query($args);

			if ($query->have_posts()) :
				while ($query->have_posts()) :
					$query->the_post();
					$post_id = get_the_ID();
					get_template_part('/templates/components/cards/rug-cards/rug', 'collection-card', ['post_id' => $post_id]);
				endwhile;
			else :
				echo '<p>no rug</p>';
			endif;

			wp_reset_postdata();
			?>
 	</nav>
	<?php
	if (function_exists('the_pagination')) {
		the_pagination($query);
	}
	?>
 