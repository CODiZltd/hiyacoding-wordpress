<div class="slz-block-item-01 style-1">
	<?php
	if( $module->attributes['layout'] == 'layout-3' ) {
		$module->attributes['column'] = $module->attributes['list_column_3'];
		echo slz_render_view(slz_get_template_customizations_directory( '/theme/views/post-format/format-'.seogrow_get_post_format($module).'.php' ), compact( 'module' ));
	}else{?>
		<div class="block-image">
			<a href="<?php echo esc_url( $module->permalink ); ?>" class="link">
				<?php echo ( $module->get_featured_image() ); ?>
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