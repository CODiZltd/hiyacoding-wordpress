<div class="slz-block-item-01 style-2">
	<div class="block-image">
		<a href="<?php echo ( $module->permalink ); ?>" class="link">
			<?php echo ( $module->get_featured_image( 'large', array( 'thumb_class' => 'img-responsive img-full' ) ) ); ?>
		</a>
	</div>
	<div class="block-content">
		<div class="block-content-wrapper">
			<?php echo ( $module->get_title() );?>
			<ul class="block-info">
				<?php echo ( $module->get_meta_data() ); ?>
			</ul>
		</div>
	</div>
</div>