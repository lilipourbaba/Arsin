<?php $post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();

?>
<div class="swiper-area">
  <div class="swiper mySwiper2">
    <div class="swiper-wrapper">
      <?php
      for ($i = 0; $i < 12; $i++) {
        $image = get_field('img_' . $i);
        if ($image) {
          echo '<div class="swiper-slide">
          <img src="' . esc_url($image) . '" alt=""></div>';
        }
      }
      ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
 
<div class="swiper mySwiper1">
  <div class="swiper-wrapper">
    <?php
    for ($i = 0; $i < 12; $i++) {
      $image = get_field('img_' . $i);
      if ($image) {
        echo '<div class="swiper-slide"><img src="' . esc_url($image) . '" alt=""></div>';
      }
    }
    ?>
  </div>
</div>
<div class="rug-share"> 
          <button class="caalog">Download caalog</button>
        <button class="ARView">AR View</button>
    
        <button class=" "><i class="iconsax" icon-name="heart"></i></button>
        <button class=" "><i class="iconsax" icon-name="share"></i></button>

    </div> 
</div>



<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiperThumbs = new Swiper(".mySwiper1", {
      slidesPerView: 4,
      spaceBetween: 10,
      watchSlidesProgress: true,
    });

    const swiperMain = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiperThumbs,
      },
    });
  });
</script>