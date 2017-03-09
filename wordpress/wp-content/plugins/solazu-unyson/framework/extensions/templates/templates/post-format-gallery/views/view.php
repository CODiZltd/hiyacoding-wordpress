<div class="block-image has-gallery">
	<?php echo ( $module->get_ribbon_date() );?>
	<div class="slz-gallery-format slz-image-carousel">
		<div class="carousel-overflow">
			<div class="slz-carousel">
			<?php 
			$data = slz_get_db_post_option( $module->post_id, 'feature-gallery-images', '' );
			if( !empty( $data ) ) {
				$thumb_url = array();
				if( get_post_thumbnail_id( $module->post_id ) ) {
					$thumb_id = get_post_thumbnail_id( $module->post_id );
					$thumb_url[] = array('attachment_id'=>$thumb_id);
				}
				$gallery_arr = array_merge($data,$thumb_url);
				$image_large = 'full';
				if( isset( $module->attributes['thumb-size']['large'] ) ) {
					$image_large = $module->attributes['thumb-size']['large'];
				}
				foreach ( $gallery_arr as $item ) {?>
					<div class="item">
					    <div class="featured-carousel-item">
					        <div class="wrapper-image">
					        <?php 
					        	echo wp_get_attachment_image($item['attachment_id'],$image_large);
					       	?>
					        </div>
					    </div>
					</div> 
				<?php }
			}
			?>
			</div>
		</div>
	</div>
</div>