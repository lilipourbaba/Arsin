		<?php
			$height_cm = get_field('rug-height');
			$width_cm = get_field('rug-width');
			 if ($width_cm && $height_cm){
					$height_ft = floor($height_cm / 30.48);  // تبدیل به فوت
			$width_ft = floor($width_cm / 30.48);    // تبدیل به فوت
			 }
		 $image = get_field('img_0'); 
		 ?>
			 
            
            
            <div class="card-component">
					<div class="cart-img">
						<img src="<?= esc_url($image) ?>" alt="" width="150" >
						<a href="<?php the_permalink() ?>" class="more"> <button class="btn-color">VIEW DETAILS </button></a>
					</div>
					<div class="detail">
						<h4><?= get_field("rug-name"); ?></h4>
						<h5 class="muted">ARN-<?= get_the_title(); ?></h5>
						<div class="prices">
							<h5> <span><?= $width_ft . " × " . $height_ft ?></span></h5>
							<h4> $ <?= get_field("rug-price"); ?></h4>
						</div>
						<div class="palets">
							<?php
							for ($i = 1; $i <= 4; $i++) {
								$color_hex = get_field("color$i");            // رنگ اصلی
								$color_name = get_field("rug-color$i");      // نام رنگ
								$pantone = get_field("rug-pantone-color-$i"); // Pantone
								if ($color_hex || $color_name || $pantone) { ?>
									<div title="<?= $color_name; ?>" class="palet" style="background-color:<?php echo esc_attr($color_hex); ?>;">
									</div>
							<?php  }
							}
							?>
						</div>
					</div>
				</div>