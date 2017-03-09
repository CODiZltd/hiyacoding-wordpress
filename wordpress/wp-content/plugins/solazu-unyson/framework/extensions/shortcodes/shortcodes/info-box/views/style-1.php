<div class="item">
	<div class="slz-icon-box-1 style-vertical">
		<div class="icon-cell">
			<?php if( $item['show_options'] == 'image' ) : ?>
				<?php if( !empty( $item['image'] ) ) : ?>
					<div class="wrapper-icon-image"><?php echo wp_get_attachment_image( $item['image'], 'full', false, array('class' => 'slz-icon-img') ); ?></div>
				<?php endif; ?>
			<?php else:
				$icon = $item['icon_library'];
				if ( !empty( $item['icon_'.$icon] ) ):
					SLZ_Util::slz_icon_fonts_enqueue($item['icon_library'] );?>
					<div class="wrapper-icon"><i class="slz-icon <?php echo esc_attr( $item['icon_'.$icon] ); ?>"></i></div>

				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php if( !empty( $item['text'] ) ): ?>
			<div class="content-cell">
				<div class="wrapper-info">
					<div class="title"><?php echo wp_kses_post( nl2br( $item['text'] ) ); ?></div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
