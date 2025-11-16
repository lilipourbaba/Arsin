 <?php
   $titr = get_field('section1_titr');
   $titr2 = get_field('section2_titr');
   $titr3 = get_field('section3_titr');
   $PAR1 = get_field("section1_text");
   $PAR2 = get_field("section2_text");
   $PAR3 = get_field("section3_text");
   $LINK1 = get_field("section1_link");
   $LINK2 = get_field("section2_link");
   $LINK3 = get_field("section3_link");
   $LINKT1 = get_field("section1_link_txt");
   $LINKT2 = get_field("section2_link_txt");
   $LINKT3 = get_field("section3_link_txt");
   ?>
 <section class="flex">
    <?php if ($titr): ?>
       <div class="component">
          <h2><?= $titr ?? "ARSIN"; ?></h2>
          <?php if ($PAR1): ?>
             <p><?= $PAR1 ?? ""; ?></p>
          <?php endif; ?>
          <a href="<?= $LINKT1 ?? "#"; ?>" class="btn-head"><?= $LINKT1 ?? "Login / Sign up"; ?><i class="iconsax" icon-name="arrow-right"></i></a>
       </div>
    <?php endif; ?>
    <?php if ($titr2): ?>
       <div class="component">
          <h2><?= $titr2 ?? "Visit Us"; ?></h2>
          <?php if ($PAR2): ?>
             <p><?= $PAR2 ?? ""; ?></p>
          <?php endif; ?>
          <a href="<?= $LINKT2 ?? "#"; ?>" class="btn-head"><?= $LINKT2 ?? "Book Appointment"; ?><i class="iconsax" icon-name="arrow-right"></i></a>
       </div>
    <?php endif; ?>
    <?php if ($titr3): ?>
       <div class="component">
          <h2><?= $titr3 ?? "Our Story"; ?></h2>
          <?php if ($PAR3): ?>
             <p><?= $PAR3 ?? ""; ?></p>
          <?php endif; ?>
          <a href="<?= $LINKT3 ?? "#"; ?>" class="btn-head"><?= $LINKT3 ?? "Read our story"; ?><i class="iconsax" icon-name="arrow-right"></i></a>
       </div>
    <?php endif; ?>
 </section>