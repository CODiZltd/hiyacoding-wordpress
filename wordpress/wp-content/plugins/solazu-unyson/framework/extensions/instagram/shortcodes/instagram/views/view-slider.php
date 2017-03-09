<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$block_cls = $block['extra_class'] . ' instagram-' . $unique_id;
?>

<div class="slz-shortcode slz-gallery sc_instagram slz-instagram <?php echo esc_attr($block_cls) ?>">

<?php

if ($block['block_title'] != '')

	echo '<div class="' . esc_attr( $block['block_title_class'] ) . '">' . esc_html($block['block_title']) . '</div>';

?>

	<div class="slz-carousel-photos">
		<div data-slidestoshow="6" class="slz-carousel slz-carousel-global">
			<?php 

				if($media != false)
				{

					$count = 0;

					foreach ($media as $node) {

						if($count >= $block['limit_image'])
							break;


						$url = $node['thumbnail_src'];

						$url2 = str_replace(array('/s150x150/', '/s640x640/', '/s1080x1080/'), array('/s320x320/', '/s320x320/', '/s320x320/'), $url);

						echo 	'<div class="item">
                                        <a href="' . esc_url( $url ) . '" data-fancybox-group="gallery-' . esc_attr ( $unique_id ) . '" class="thumb fancybox"><img src="' . esc_url( $url2 ) . '" alt="" class="img-responsive"><span class="dh-overlay"></span></a>
                                    </div>
									';

						$count++;
					}
				}
			?>
		</div>
	</div>
</div>
