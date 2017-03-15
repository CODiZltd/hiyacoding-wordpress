<?php
$post_format = '';
$format = get_post_format( $module->post_id );
if( !empty( $format ) ) {
	$post_format = 'slz-format-'.$format;
}else{
	$post_format = '';
}
?>
<div class="slz-block-item-01 style-2 <?php echo esc_attr( $post_format ); ?>">
	<?php
	if( ( $module->attributes['list_show_image'] == 'no' && $module->attributes['layout'] == 'layout-1' ) || ( $module->attributes['layout'] == 'layout-2' && $module->attributes['list_show_image_2'] == 'no' ) ) {
	}else{
		if( $module->attributes['layout'] == 'layout-3' )  {
			$module->get_post_format_post_view();
		}
	}
	?>
	<div class="block-content">
		<div class="block-content-wrapper">
			<?php echo ( $module->get_category() ); ?>
			<?php echo ( $module->get_title() ); ?>
			<ul class="block-info">
				<?php echo ( $module->get_meta_data() ); ?>
			</ul>
			<?php
			if( ( $module->attributes['list_show_excerpt'] == 'no' && $module->attributes['layout'] == 'layout-1' ) || $module->attributes['layout'] == 'layout-2' && $module->attributes['list_show_excerpt_2'] == 'no'   || ( $module->attributes['layout'] == 'layout-3' && $module->attributes['list_show_excerpt_3'] == 'no' ) ) {
				
			}else{
			?>
				<div class="block-text"><?php echo wp_kses_post( nl2br( $module->get_excerpt() ) ); ?></div>
			<?php
			}
			?>
		</div>
	</div>
</div>