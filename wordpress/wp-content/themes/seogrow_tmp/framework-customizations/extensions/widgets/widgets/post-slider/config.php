<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['general'] = array(
	'id'             => esc_html__( 'slz_post_slider', 'seogrow' ),
	'name'           => esc_html__( 'SLZ: Post Slider', 'seogrow' ),
	'description'    => esc_html__( 'Show post with slider', 'seogrow' ),
	'classname'      => 'slz-widget-post-slider'
);
$cfg ['thumb-size'] = array (
	'large'             => '800x480'
);

