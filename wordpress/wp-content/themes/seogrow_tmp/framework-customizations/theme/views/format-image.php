<?php
	if ( $module->has_post_thumbnail() ) : ?>
		<div class="block-image">
			<a href="<?php echo ( $module->get_url() ); ?>" class="link">
				<?php echo ( $module->get_featured_image() ); ?>
			</a>
		</div>
	<?php endif;