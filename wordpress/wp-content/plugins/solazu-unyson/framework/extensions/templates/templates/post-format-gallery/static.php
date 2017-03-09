<?php if (!defined('SLZ')) die('Forbidden');

$ext = slz_ext( 'templates' )->get_template('post_format_gallery');
$ext_instance = slz()->extensions->get( 'templates' );

if ( !is_admin() ) {

	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-format-gallery',
		$ext->locate_URI( '/static/js/format-gallery.js' ),
		array( 'jquery' ),
		slz()->manifest->get_version(),
		true
	);
}
