<?php if (!defined('SLZ')) die('Forbidden');
$gallery = slz_ext( 'widgets' )->get_widget('SLZ_Widget_Gallery_Carousel');
$ext_instance = slz()->extensions->get( 'widgets' );

if (! is_admin()) {
	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-gallery-carousel',
		$gallery->locate_URI('/static/js/gallery-carousel.js'),
		array( 'jquery' ),
		slz()->manifest->get_version(),
		true
	);
}