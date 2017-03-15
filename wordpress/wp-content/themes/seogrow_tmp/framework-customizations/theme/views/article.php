<?php 
	echo slz_render_view(slz_get_template_customizations_directory( '/theme/views/post-format/format-'.seogrow_get_post_format($module).'.php' ), compact( 'module' ));
?>

<div class="block-content">
	<?php echo ( $module->get_title() );?>
	<ul class="block-info">
		<?php echo ( $module->get_meta_data() );?>
	</ul>

	<div class="block-text"><?php echo ( $module->get_excerpt() ); ?></div>

	<a href="<?php echo ( $module->get_url() ); ?>" class="block-read-more">
		<?php echo esc_html__('Read More', 'seogrow'); ?>
		<i class="fa fa-angle-double-right"></i>
	</a>
</div>
