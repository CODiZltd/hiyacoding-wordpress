<?php echo ( $module->get_ribbon_date() ); ?>
<div class="block-image has-quote">
	<?php if( $image = $module->get_featured_image() ):?>
		<a href="<?php echo esc_url( $module->permalink ); ?>" class="link">
			<?php echo wp_kses_post( $image ); 
			$data = slz_get_db_post_option( $module->post_id, 'feature-quote-info', '' );
			if( !empty( $data ) ) {
				printf('<div class="block-quote-wrapper">
						<div class="block-quote">%1$s</div>
						</div>', $data );
				
			}?>
		</a>
	<?php endif;?>
</div>