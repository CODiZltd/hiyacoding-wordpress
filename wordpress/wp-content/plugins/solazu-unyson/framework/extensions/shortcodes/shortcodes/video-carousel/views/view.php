<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'video_carousel' );

$unique_id = $shortcode->get_config('unique_id');
$block_class = 'video-carousel-'.$unique_id;
$block_cls = $block_class.' '.$data['extra_class'];
$data['list_video'] = (array) vc_param_group_parse_atts( $data['list_video'] );
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'video_carousel' );
$temp_arr = $shortcode->get_config('params_group_list');
$url_video = '';
$image_video = '';

$class_style_wrapper = 'horizontal-style';
$class_style_item = 'slz-carousel';
if( $data['style'] == 'style-2' ) {
	$class_style_wrapper = 'vertical-style';
	$class_style_item = 'slz-carousel-vertical';
}
?>

<div class="slz-shortcode sc_video_carousel <?php echo esc_attr( $block_cls ) ?>">
	<?php if( !empty( $data['block_title'] ) ) : ?>
		<div class="slz-title-shortcode"><?php echo esc_html( $data['block_title'] ) ?></div>
	<?php endif; ?>
	<?php if( !empty( $data['list_video'] ) ) : ?>
		<?php 
			echo '
				<div id="videoModal-'. esc_attr( $unique_id ) .'" tabindex="-1" role="dialog" aria-labelledby="videoModal-'. esc_attr( $unique_id ) .'" aria-hidden="true" class="slz-video-modal modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
								<div>
									<iframe width="700" height="400"></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			';
		?>
		<div class="slz-carousel-wrapper slz-video-carousel <?php echo esc_attr( $class_style_wrapper ); ?>">
			<div class="carousel-overflow">
				<div data-slidestoshow="1" class="<?php echo esc_attr( $class_style_item ); ?> sc-video-carousel-item">
					
					<?php
					foreach ( $data['list_video'] as $video ) {
						$url_video = '';
						$image_video = '';
						$video = array_merge( $temp_arr, $video );
						if( ( $video['video_type'] == 'youtube' && empty( $video['youtube_id'] ) ) || ( $video['video_type'] == 'vimeo' && empty( $video['vimeo_id'] ) ) ) {
							continue;
						}
						if( $video['video_type'] == 'youtube' && !empty( $video['youtube_id'] ) ) {
							$url_video = 'https://www.youtube.com/embed/'.esc_attr( $video['youtube_id'] ).'?rel=0&autoplay=1';
							$image_video = $instance->get_video_thumb_general( 'youtube', $video['youtube_id'] );
						}elseif ( $video['video_type'] == 'vimeo' && !empty( $video['vimeo_id'] ) ) {
							$url_video = 'https://player.vimeo.com/video/'.esc_attr( $video['vimeo_id'] ).'?rel=0&autoplay=1';
							$image_video = $instance->get_video_thumb_general( 'vimeo', $video['vimeo_id'] );
						}

						echo '
						<div class="item">
							<div class="slz-block-video style-4">
								<div class="block-video">
						';
						
								echo '<a href="javascript:void(0)" data-toggle="modal" data-target="#videoModal-'. esc_attr( $unique_id ) .'" data-thevideo="'. esc_url( $url_video ) .'" class="link"></a>';
									echo '
										<div class="btn-play">
											<i class="icons fa fa-play"></i>
										</div>
									';
								echo '<img src="'. esc_url( $image_video ) .'" alt="" class="img-full">';
						echo '
								</div>
							</div>
						</div>
						';
					}
					?>
					
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
