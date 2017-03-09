<?php
$post_format = '';
$format = '';
if( ( $module->attributes['layout'] == 'layout-3' && $module->attributes['list_column_3'] == '1' ) || ( $module->attributes['layout'] == 'layout-3' && $module->attributes['list_column_3'] == '2' ) || ( $module->attributes['layout'] == 'layout-3' && $module->attributes['list_column_3'] == '3' ) || ( $module->attributes['layout'] == 'layout-1' && $module->attributes['list_column'] == '1' ) ) {
}else{
	$format = get_post_format( $module->post_id );
	if( !empty( $format ) ) {
		$post_format = 'slz-format-'.$format;
	}else{
		$post_format = '';
	}
}
?>
<div class="slz-block-item-01 style-1 <?php echo esc_attr( $post_format ); ?>">
	<?php
	if( ( $module->attributes['layout'] == 'layout-3' && $module->attributes['list_column_3'] == '1' ) || ( $module->attributes['layout'] == 'layout-3' && $module->attributes['list_column_3'] == '2' ) || ( $module->attributes['layout'] == 'layout-3' && $module->attributes['list_column_3'] == '3' ) || ( $module->attributes['layout'] == 'layout-1' && $module->attributes['list_column'] == '1' ) ) {
		$module->get_post_format_post_view();
	}else{
	?>
		<div class="block-image">
			<a href="<?php echo esc_url( $module->permalink ); ?>" class="link">
				<?php echo ( $module->get_featured_image() ); ?>
				<?php
					if( !empty( $format ) ) {
						echo '<i class="icons-'. esc_attr( $format ) .'"></i>';
					}
				?>
			</a>
		</div>
	<?php
	}
	?>
	<div class="block-content">
		<div class="block-content-wrapper">
			<?php echo ( $module->get_category() ); ?>
			<?php echo ( $module->get_title() ); ?>
			<?php
			if( $module->attributes['layout'] != 'layout-2' ) {
			?>
				<ul class="block-info">
					<?php echo ( $module->get_meta_data() ); ?>
				</ul>
			<?php
			}
			?>
			<?php
			if( ( $module->attributes['list_show_excerpt'] == 'no' && $module->attributes['layout'] == 'layout-1' ) || ( $module->attributes['list_show_excerpt_3'] == 'no' && $module->attributes['layout'] == 'layout-3' ) ) {
				
			}else{
			?>
				<div class="block-text"><?php echo wp_kses_post( nl2br( $module->get_excerpt() ) ); ?></div>
			<?php
			}
			?>
		</div>
	</div>
</div>