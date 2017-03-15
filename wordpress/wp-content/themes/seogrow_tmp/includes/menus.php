<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

register_nav_menus( array(
	'top-nav'     	=> esc_html__('Top menu', 'seogrow' ),
	'main-nav'    	=> esc_html__('Main menu', 'seogrow' ),
	'sub-nav'    	=> esc_html__('Sub menu', 'seogrow' ),
	'bottom-nav'  	=> esc_html__('Bottom menu', 'seogrow' ),
	'feature-nav'  	=> esc_html__('Feature menu', 'seogrow' )
) );
