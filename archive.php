<?php
if (is_tax()) {
  $taxonomy = get_queried_object()->taxonomy;
  get_template_part('templates/taxonomy/' . $taxonomy);
} elseif (is_post_type_archive()) {
  $post_type = get_post_type();
  get_template_part('templates/archive/' . $post_type);
} else {
  wp_die('no template found');
}
?>
