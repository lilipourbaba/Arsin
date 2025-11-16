<?php $price = get_field("rug-price");
$formatted_price = number_format($price, 0, '', ','); // جدا کردن سه رقم سه رقم
$height_cm = get_field('rug-height');
$width_cm = get_field('rug-width');
$rug_sku = get_field("rug-sku");
 $material = get_field("rug-material");
$origin = get_field("rug-origin");
$age = get_field("rug-age");
$condition = get_field("rug-condition");
?>
<div class="rug-name">
    <h1><?=  get_the_title(); ?></h1>
    <p class="property">
        <span class="property-titr">Price:</span> <span>$ <?= $formatted_price; ?></span>
    </p>

    <?php if ($height_cm || $width_cm) {
        $height_ft = floor($height_cm / 30.48);  // تبدیل به فوت
        $width_ft = floor($width_cm / 30.48);    // تبدیل به فوت
    ?>
        <div class="property">
            <span class="property-titr">size</span>
            <div> <span>"<?= $width_ft . "' × " . $height_ft . "'</span> (<span class='muted'>" .  $width_cm . " × " . $height_cm . " cm)</span>";
                            ?>
            </div>
        </div>
    <?php } ?>
    <div class=" ">
        <span class="property-titr">Color Pallets</span>

        <div class="palets">


            <?php
            for ($i = 1; $i <= 4; $i++) {
                $color_hex = get_field("color$i");            // رنگ اصلی
                 $percent = get_field("rug-percent-color-$i"); // Pantone

                if ($color_hex  || $percent) { ?>
                    <div class="palet" style="background-color:<?php echo esc_attr($color_hex); ?>;">

                        <div>
                            <div  class="squre" style="background-color:<?php echo esc_attr($color_hex); ?>;">
                                <?php                 if ( $percent) { ?>
 <p><?= $percent; ?>%</p> <?php } ?>
                            </div>
                            <p> HEX COLOR </p>
                            <p><?= $color_hex; ?> </p>
                        </div>
                    </div>

            <?php  }
            }

            ?>
        </div>

    </div>

    <?php
    if ($material) { ?>
        <div class="property">
            <span class="property-titr">Material</span>
            <span><?= $material; ?></span>
        </div>
    <?php }
    if ($origin) { ?>
        <div class="property">
            <span  class="property-titr">Origin</span>
            <span><?= $origin;  ?></span>
        </div>
    <?php }
    if ($age) { ?>
        <div class="property">
            <span class="property-titr">Age</span>
            <span><?= $age; ?></span>
        </div>
    <?php }
    if ($condition) { ?>
        <div class="property Condition">
            <span class="property-titr">Condition</span>
            <span><?= $condition; ?></span>
        </div>
    <?php }  ?>
<div class="flex"> 

    <button id="Purchase">Purchase now</button>
        <button id="showroom">Add to showroom visit list</button>

</div>


</div>