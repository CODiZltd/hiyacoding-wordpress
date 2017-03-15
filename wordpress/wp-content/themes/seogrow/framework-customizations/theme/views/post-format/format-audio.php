<?php 
	echo ( $module->get_ribbon_date() );
	$data = slz_get_db_post_option( $module->post_id, 'feature-audio-link', '' );
    if (empty( $data )) {
        $data = slz_get_db_post_option( $module->post_id, 'feature-audio-file', '' );
        $data = $data['url'];
    }
    if( !empty( $data ) ) {
		$audio = sprintf('<div class="audio-wrapper">
						<audio controls="controls" src="%1$s"></audio>
						<div class="slz-audio-control">
							<span class="btn-play"></span>
						</div>
					</div>', esc_url( $data ) );
		echo  '<div class="slz-image-audio">';
			if( $image = $module->get_featured_image() ):
				echo wp_kses_post( $image );
			endif; 
			echo wp_kses_post($audio);
		echo '</div>';
		
	}