<?php /* Template Name: Home */ ?>

<?php get_header() ?>

<main class="homepage">
  <?php
  $front_page_id = get_the_ID();
  get_template_part('templates/home/head', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/tabs', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/rug-explore', null, ['front_page_id' => $front_page_id]);
    get_template_part('templates/home/rug-cat', null, ['front_page_id' => $front_page_id]);

  ?>
</main>

<?php get_footer(); ?>