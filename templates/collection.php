<?php /*Template Name: collection */ ?>
<?php get_header() ?>

<?php
$image = get_field('img_0');
$term = get_queried_object();
$about = get_field('about-cat', 'rug-cat');
$property1 = get_field('cat-property1' );
$property2 = get_field('cat-property2', 'rug-cat'  );
$property3 = get_field('cat-property3');
$property4 = get_field('cat-property4');
?>
<main class=" container">
	<section class="rug-archive">
		<h1><?php single_term_title(); ?></h1>
		<?php
		if ($about) {
			echo '<p>' . esc_html($about) . '</p>';
		}
		?>
		<div class="component">
			<p><?php echo term_description(); ?></p>
		</div>
		<div class="cat-propertty flex">
			<div class="flex"> <?php
								if ($property1) {
									echo '<button class="btn-color">' . esc_html($property1) . '</button>';
								}
								if ($property2) {
									echo '<button class="btn-color">' . esc_html($property2) . '</button>';
								}
								if ($property3) {
									echo '<button class="btn-color">' . esc_html($property3) . '</button>';
								}
								if ($property4) {
									echo '<button class="btn-color">' . esc_html($property4) . '</button>';
								}
								?>
			</div>
			<button class="btn-parent">show story </button>
		</div>
	</section>
	<nav class="cards">

		<div class="rag-card">

			<?php
			$height_cm = get_field('rug-height');
			$width_cm = get_field('rug-width');
			$height_ft = floor($height_cm / 30.48);  // تبدیل به فوت
			$width_ft = floor($width_cm / 30.48);    // تبدیل به فوت
			while (have_posts()) :
				the_post();
			 
					$post_id = get_the_ID();
					get_template_part('/templates/components/cards/rug-cards/rug', 'card', ['post_id' => $post_id]);
			 
			 endwhile ?>
		</div>
	</nav>
	<?= the_pagination(); ?>


</main>

<?php get_footer() ?>