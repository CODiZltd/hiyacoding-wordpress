<div class="block-element block-element-<?php echo esc_attr( $post_count ); ?>">
	<div class="slz-block-item-01 style-3">
		<div class="block-image">
			<a href="<?php echo esc_url( $module->permalink ); ?>" class="link">
				<?php echo ( $module->get_featured_image( 'large' ) ); ?>
			</a>
		</div>
		<div class="block-content">
			<div class="block-content-wrapper">
				<?php echo ( $module->get_category() ); ?>
				<?php echo ( $module->get_title() ); ?>
				<ul class="block-info">
					<?php echo ( $module->get_meta_data() ); ?>
				</ul>
				<div class="block-text"><?php echo wp_kses_post( nl2br( $module->get_excerpt() ) ); ?></div>
			</div>
		</div>
	</div>
</div>