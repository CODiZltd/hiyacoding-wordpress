<?php 
if( defined ( 'WP_CACHE' ) && WP_CACHE == true && defined ( 'SLZ_Page_Cache_Home' ) && file_exists( WP_CONTENT_DIR . '/cache-config.php' ) ){
	include_once( WP_CONTENT_DIR . '/cache-config.php' );
	include_once( SLZ_Page_Cache_Home . '/class-slz-page-buffer.php' ); 
} 
