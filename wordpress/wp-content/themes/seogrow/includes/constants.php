<?php
/**
 * Constants.
 * 
 * @package WordPress
 * @subpackage SEOGrow
 * @since 1.0
 */

defined( 'SEOGROW_THEME_URI' )         || define( 'SEOGROW_THEME_URI', get_template_directory_uri() );
defined( 'SEOGROW_STATIC_URI' )         || define( 'SEOGROW_STATIC_URI', get_template_directory_uri() . '/static');

defined( 'SEOGROW_INCLUDE_DIR' )       || define( 'SEOGROW_INCLUDE_DIR', get_template_directory() . '/includes' );
defined( 'SEOGROW_FW_CUSTOMIZE_DIR' )  || define( 'SEOGROW_FW_CUSTOMIZE_DIR', get_template_directory() . '/framework-customizations' );
defined( 'SEOGROW_PLUGIN_DIR' )        || define( 'SEOGROW_PLUGIN_DIR', get_template_directory() . '/plugins' );

defined( 'SEOGROW_OPTION_IMG_URI' )    || define( 'SEOGROW_OPTION_IMG_URI', SEOGROW_THEME_URI . '/static/img/theme-option' );
defined( 'SEOGROW_PLUGIN_IMG_URI' )    || define( 'SEOGROW_PLUGIN_IMG_URI', SEOGROW_THEME_URI . '/static/img/tgm-images' );
defined( 'SEOGROW_LOGO_IMG_URI' )    || define( 'SEOGROW_LOGO_IMG_URI', SEOGROW_THEME_URI . '/static/img/logo' );
defined( 'SEOGROW_IMG_URI' )           || define( 'SEOGROW_IMG_URI', SEOGROW_THEME_URI . '/static/img' );

//Active Woocommerce Plugin
defined( 'SEOGROW_WC_ACTIVE' )     || define( 'SEOGROW_WC_ACTIVE', class_exists( 'WooCommerce' ) );

if ( defined( 'YITH_WCWL' ) ) {
	define( 'SEOGROW_WC_WISHLIST', defined( 'YITH_WCWL' ) );
}
else {
	define( 'SEOGROW_WC_WISHLIST', '' );
}
