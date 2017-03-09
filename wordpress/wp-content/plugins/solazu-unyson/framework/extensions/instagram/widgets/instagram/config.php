<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['general'] = array(
	'id'       		 => __( 'instagram', 'slz' ),
	'name' 			 => __( 'SLZ: Instagram', 'slz' ),
	'description'    => __( 'Show instagram image', 'slz' ),
	'classname'		 => 'slz-widget-instagram'
);

$cfg['default_value'] = array(
	'block_title'  				=> esc_html__( "Instagram", 'slz'),
	'block_title_color'			=> '#',
	'instagram_id' 				=> '',
	'column' 					=> 4,
	'template' 					=> 'grid',
	'limit_image'		 		=> 12,
);