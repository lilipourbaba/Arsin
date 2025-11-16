<?php
if ( ! class_exists( 'meta_box' ) ) {
	class meta_box {
		function __construct() {
			add_action( 'add_meta_boxes', [ $this, 'form_meta_box' ] );
			add_filter( 'manage_form_posts_columns', [ $this, 'form_table_head' ] );
			add_action( 'manage_form_posts_custom_column', [ $this, 'form_table_column' ], 10, 2 );
		}
		public function form_meta_box() {
			add_meta_box( 'information', 'Information', function () {
				global $post;
				?>
				<table>
							<tr>
						<td><?php _e('name', 'web-dm') ?></td>
								<td><?= get_post_meta($post->ID, 'name', true) ?></td>
							</tr>
					<tr>
						<td><?php _e( 'number', 'web-dm' ) ?></td>
						<td><?= get_post_meta( $post->ID, 'number', true ) ?></td>
					</tr>
				 
					<tr>
						<td><?php _e( 'email', 'wec-dm' ) ?></td>
						<td>
							<a href="mailto:<?= get_post_meta( $post->ID, 'email', true ) ?> ">
								<?= get_post_meta( $post->ID, 'email', true ) ?>
							</a>
						</td>
					</tr>
					<tr>
						<td><?php _e( 'describe', 'web-dm' ) ?></td>
						<td><?= get_post_meta( $post->ID, 'describe', true ) ?></td>
					</tr>

				</table>
				<?php

			}, 'form', 'advanced', 'high' );
		}

		public function form_table_head( $columns ) {
			$columns['telephone'] = 'number';
			$columns['email'] = 'email';
			return $columns;
		}

		public function form_table_column( $column_name, $post_id ) {
			if ( $column_name == 'telephone' ) {
				echo get_post_meta( $post_id, 'telephone', true );
			}

			if ( $column_name == 'email' ) {
				echo get_post_meta( $post_id, 'email', true );
			}


		}
	}
}
?>