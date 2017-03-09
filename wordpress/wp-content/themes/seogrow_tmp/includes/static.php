<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( defined( 'SLZ' ) ) {
	$seogrow_version = slz()->theme->manifest->get_version();
} else {
	$seogrow_version = '1.0';
}

//font
wp_enqueue_style( 'seogrow-fonts', seogrow_fonts_url(), array(), null );
wp_enqueue_style( 'font-awesome.min',    SEOGROW_STATIC_URI . '/font/font-icon/font-awesome/css/font-awesome.min.css', array(), false );

//libs css
wp_enqueue_style( 'bootstrap.min',             SEOGROW_STATIC_URI . '/libs/bootstrap/css/bootstrap.min.css', array(), false );
wp_enqueue_style( 'bootstrap-datepicker.min',  SEOGROW_STATIC_URI . '/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css', array(), false );

//theme css
wp_enqueue_style( 'seogrow-style',       get_stylesheet_uri(), array(), $seogrow_version );
if ( ! seogrow_check_extension('headers') ) {
	wp_enqueue_style( 'seogrow-default', SEOGROW_STATIC_URI . '/css/default.css', array(), $seogrow_version );
}
wp_enqueue_style( 'seogrow-layout',      SEOGROW_STATIC_URI . '/css/layout.css', array(), $seogrow_version );
seogrow_slz_enqueue_style();
wp_enqueue_style( 'seogrow-responsive',  SEOGROW_STATIC_URI . '/css/responsive.css', array(), $seogrow_version );

// js
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_script( 'bootstrap.min',            SEOGROW_STATIC_URI . '/libs/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'bootstrap-datepicker.min', SEOGROW_STATIC_URI . '/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js', array( ), false, true );

wp_enqueue_script( 'seogrow-main',       SEOGROW_STATIC_URI . '/js/main.js', array( ), $seogrow_version, true );
wp_enqueue_script( 'seogrow-custom',     SEOGROW_STATIC_URI . '/js/custom.js', array( ), $seogrow_version, true );

if ( defined( 'SLZ' ) && function_exists('slz_get_db_settings_option') ) {
	$seogrow_custom_script = slz_get_db_settings_option('custom_scripts', '');
	if( !empty( $seogrow_custom_script ) ) {
		wp_enqueue_script( 'seogrow-custom-inline',    SEOGROW_STATIC_URI . '/js/custom-inline.js', array( ), $seogrow_version, true );
		wp_add_inline_script( 'seogrow-custom-inline', $seogrow_custom_script );
	}
}
if( SEOGROW_WC_ACTIVE ) {
	wp_enqueue_style( 'seogrow-woocommerce',     SEOGROW_STATIC_URI . '/css/seogrow-woocommerce.css', array(), $seogrow_version );
	wp_enqueue_script( 'seogrow-woocommerce',    SEOGROW_STATIC_URI . '/js/seogrow-woocommerce.js', array( ), $seogrow_version, true );
}