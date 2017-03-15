<div class="block-element block-element-<?php echo esc_attr( $post_count ); ?> small-block">
	<div class="slz-block-item-01 style-3">
		<div class="block-image">
			<a href="<?php echo esc_url($module->permalink); ?>" class="link">
				<?php echo ( $module->get_featured_image('small') ); ?>
			</a>
		</div>
		<div class="block-content">
			<div class="block-content-wrapper">
				<?php echo ( $module->get_category() ); ?>
				<?php echo ( $module->get_title() ); ?>
				<?php 
					if( !isset( $block ) ) :
				?>
						<ul class="block-info">
							<?php echo ( $module->get_meta_data() ); ?>
						</ul>
				<?php 
					elseif ( $block->attributes['style'] == 'style-7' ):
				?>
						<ul class="block-info">
							<?php echo ( $module->get_meta_data() ); ?>
						</ul>
				<?php 
					endif;
				?>
			</div>
		</div>
	</div>
</div>