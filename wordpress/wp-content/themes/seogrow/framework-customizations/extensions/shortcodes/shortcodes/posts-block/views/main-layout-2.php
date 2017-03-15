<div class="slz-block-item-01 style-2">
	<?php
	if(!empty($module->attributes['show_date_main']) && $module->attributes['show_date_main']=='no' ) {
		$module->attributes['show_date'] = 'hide';
	}
	echo slz_render_view(slz_get_template_customizations_directory( '/theme/views/post-format/format-'.seogrow_get_post_format($module).'.php' ), compact( 'module' ));
	?>
	<div class="block-content">
		<div class="block-content-wrapper">
			<?php echo ( $module->get_title() ); ?>
			<ul class="block-info">
				<?php echo ( $module->get_meta_data() ); ?>
			</ul>
			<?php
			if( $module->attributes['main_show_excerpt'] == 'yes' && $module->attributes['layout'] == 'layout-1' ) {
			
				if( $excerpt_str = $module->get_excerpt() ){?>
					<div class="block-text"><?php echo wp_kses_post( nl2br( $excerpt_str ) ); ?></div>
				<?php }?>
				
			<?php
			}
			?>
			<?php 
			if( $module->attributes['main_show_read_more'] == 'yes' && $module->attributes['layout'] == 'layout-1' ) {
			?>
				<a href="<?php echo esc_url( $module->permalink ); ?>" class="block-read-more"><?php echo esc_html__( 'Read More', 'seogrow' ); ?><i class="fa fa-angle-double-right"></i></a>
			<?php
			}
			?>
		</div>
	</div>
</div>