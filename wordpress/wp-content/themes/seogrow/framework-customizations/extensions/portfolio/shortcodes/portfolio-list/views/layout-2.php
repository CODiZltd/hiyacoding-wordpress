<?php if ( ! defined( 'SLZ' ) ) { die( 'Forbidden' ); }

$column = !empty($model->attributes['column']) ? 'slz-column-'.$model->attributes['column'] : 'slz-column-2';

$html_options = array(
	'excerpt_format' => '%s',
	'image_format'   => '<a href="%2$s" class="link">%1$s</a>',
	'category_format' => '<a class="cat" href="%2$s">%1$s</a>',
);
$html_options = $model->set_default_options( $html_options );
$row_count = 0;
$thumb_size = 'large';

?>
<!-- max 6 column -->
<div class="slz-list-block <?php echo esc_attr( $column ); ?>">
	<?php
		while ( $model->query->have_posts() ) {
			$model->query->the_post();
			$model->loop_index();
			if($row_count == 0){
				$class_layout = 'slz-block-item-01 style-2';
			}else{
				$class_layout = 'slz-block-item-01';
			}?>
			<div class="item <?php echo esc_attr($model->get_post_class())?>">
				<div class="<?php echo esc_attr($class_layout);?> portfolio-item">
					<?php if( $image = $model->get_post_image( $html_options, $thumb_size, false, false ) ): ?>
						<div class="block-image">
							<?php echo wp_kses_post($image);?>
							<!-- <a class="link-preview" href="<?php echo esc_url($model->permalink)?>"><?php echo esc_html__('live review', 'seogrow')?></a> -->
						</div>
					<?php endif;?>
					<div class="block-content">
						<div class="block-content-wrapper">
							<?php if(!empty($model->attributes['show_date']) && $model->attributes['show_date']=='yes' ):
								echo ( $model->get_date());
							endif; ?>
							<?php $model->get_title( $html_options, true )?>
							<ul class="meta-wrapper">
								<?php 
								if(!empty($model->attributes['show_category']) && $model->attributes['show_category']=='yes' ):
								 	echo wp_kses_post($model->get_term_current_taxonomy());
								endif;?>
								<?php if(!empty($model->attributes['show_meta_info']) && $model->attributes['show_meta_info']=='yes' ):
									echo wp_kses_post( $model->get_author() ); ?>
								<?php endif;?>
							</ul>
							<div class="clearfix"></div>
							<?php $model->get_rating( $model->post_id, true )?>
						</div>
						<?php if( $desc = $model->get_meta_description() ) :?>
						<?php echo '<div class="block-text">'.$desc.'</div>';?>
						<?php $model->get_button_readmore(true)?>
						<?php endif;?>
					</div>
				</div>
			</div><?php
			$row_count++;
		}//end while
		$model->reset();
		$model->pagination();
	?>
</div>
