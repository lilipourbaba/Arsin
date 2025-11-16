<?php /*Template Name: rug */ get_header() ?>

<?php
$image = get_field('img_0');

?>




<main class="rug-archive container">
	<section>
		<h1> <?= post_type_archive_title();
				?></h1>
		<p class="muted"> <?php echo term_description() ?>

		</p>

	</section>

	<section class="cards">

		<div class="rag-card">

			<?php
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