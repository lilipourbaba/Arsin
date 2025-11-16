<?php  
 
		 $image = get_field('img_col_0'); 
		 ?>
			 
            <a href="<?php the_permalink() ?>" class=" "> 
            
            <div class="card-component">
					<div class="cart-img">
						<img src="<?= esc_url($image) ?>" alt="" width="150" >
 					</div>
					<div class="card-collection-detail">
 						<div class="prices">
    <h6><?=   get_the_title(); ?></h6>
 						</div>
 
					</div>
				</div>
			</a>