<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$headers_extension = slz_ext( 'headers' )->get_header('header_03');

$cfg['general'] = array(
	'name' 			 => __( 'Header 03', 'slz' ),
	'description'    => __( 'Header 03', 'slz' ),
	'small_img'  	 => array(
        'height' => 70,
        'src'    => $headers_extension->locate_URI('/static/img/thumbnail.png')
    ),
    'large_img'  	 => array(
        'height' => 214,
        'src'    => $headers_extension->locate_URI('/static/img/thumbnail.png')
    )
);
