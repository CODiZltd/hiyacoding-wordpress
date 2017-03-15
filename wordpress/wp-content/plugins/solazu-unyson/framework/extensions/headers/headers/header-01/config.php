<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$headers_extension = slz_ext( 'headers' )->get_header('header_01');

$cfg['general'] = array(
	'name' 			 => __( 'Header 01', 'slz' ),
	'description'    => __( 'Header 01', 'slz' ),
	'small_img'  	 => array(
        'height' => 70,
        'src'    => $headers_extension->locate_URI('/static/img/thumbnail.png')
    ),
    'large_img'  	 => array(
        'height' => 214,
        'src'    => $headers_extension->locate_URI('/static/img/thumbnail.png')
    )
);
