
<?php
$terms = get_terms(array(
  'taxonomy' => 'rug-cat',
  'hide_empty' => false,
    'number' => 3,
));
 
$image = get_field('img_0');
$term = get_queried_object();
$about =        get_field('about-cat', 'rug-cat_' . $term->term_id);


 
if (!empty($terms) && !is_wp_error($terms)) { ?>
<p class="Collections-title">Curated Collections</h2>
<section class="flex container">
  <?php foreach ($terms as $term) {
     $image_id = get_field('rug-cat-img', 'rug-cat_' . $term->term_id);
$property1 = get_field('cat-property1', 'rug-cat_' . $term->term_id);
$property2 = get_field('cat-property2', 'rug-cat_' . $term->term_id);
$property3 = get_field('cat-property3', 'rug-cat_' . $term->term_id);
$property4 = get_field('cat-property4', 'rug-cat_' . $term->term_id);
     $image_url = wp_get_attachment_image_url($image_id, 'full');
  ?>
    <div class="component">
         <img src="<?= $image_url ? esc_url($image_url) : "https://arsin.us/wp-content/uploads/2025/11/Pcture-Placeholder-1-scaled.png"; ?>" alt="<?= esc_attr($term->name); ?>">
         <p><?= $term->name; ?></p>
         <?php
		if ($about) {
			echo '<p>' . esc_html($about) . '</p>';
		}
		?>
         <div class="grid">
		  <?php
								if ($property1) {
									echo '<button class="btn-parent ">' . esc_html($property1) . '</button>';
								}
								if ($property2) {
									echo '<button class="btn-parent ">' . esc_html($property2) . '</button>';
								}
								if ($property3) {
									echo '<button class="btn-parent ">' . esc_html($property3) . '</button>';
								}
								if ($property4) {
									echo '<button class="btn-parent ">' . esc_html($property4) . '</button>';
								}
								?>
			</div>
       <a class="btn-head" href="<?= esc_url(get_term_link($term)); ?>">See full detail <i class="iconsax" icon-name="arrow-right"></i></a>
    </div>
  <?php } ?>
</section>
<?php } else {
  echo '<p>دسته‌ای یافت نشد.</p>';
} ?>

 