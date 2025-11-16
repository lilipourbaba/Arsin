<?php get_header(); ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$sku = get_field("rug-sku");

?>
<main class="single-rug">
    <?php
    get_template_part(
      'templates/components/rug-parts/rug-slider',
      null,
    );
    ?>
<div class=" container">
  <div class="details">
    <?php
    get_template_part(
      'templates/components/rug-parts/rug-name',
      null,
    );
     
    get_template_part(
      'templates/components/rug-parts/rug-details',
      null,
    );
    ?>
 </div>
        <?php
    get_template_part(
      'templates/components/rug-parts/rug-collection',
      null,
    );
    ?>
    </div>   
</main>

<?php get_footer() ?>