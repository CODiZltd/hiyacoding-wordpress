<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['id']                  = 'seogrow';
$manifest['skin']                = 'main';

$manifest['requirements']        = array(
	'wordpress' => array(
		'min_version' => '4.4',
	),
);

$manifest['prefix'] = 'seogrow';
$manifest['post_view_name']      = 'seogrow_postview_number';
$manifest['sidebar_name']        = 'seogrow-custom-sidebar';
$manifest['log_page_id']         = 'seogrow-log';

$manifest['count_view_to_post_type'] = array(
	'post', 'slz-portfolio'
);

$manifest['supported_extensions'] = array(
	'megamenu'       => array(),
	'portfolio'      => array(),
	'teams'          => array(),
	'gallery'        => array(),
	'testimonials'   => array(),
	'new-tweet'      => array(),
	'backups'        => array(),
	'services'       => array(),
	'recruitment'     => array(),
);
$manifest['theme_libs'] = array(
	'bootstrap', 'bootstrap-datepicker',
	'font-awesome', 'seogrow-fonts',
);
$manifest['server_requirements'] = array(
	'server' => array(
		'wp_memory_limit'          => '256M', // use M for MB, G for GB
		'php_version'              => '5.2.4',
		'post_max_size'            => '8M',
		'php_time_limit'           => '1500',
		'php_max_input_vars'       => '4000',
		'suhosin_post_max_vars'    => '3000',
		'suhosin_request_max_vars' => '3000',
		'mysql_version'            => '5.6',
		'max_upload_size'          => '8M',
	),
);

$manifest['register_image_sizes'] = array(
	//post-thumbnail (1200x650)
 	'seogrow-thumb-350x350'       => array( 'width' => 350, 'height' => 350, 'crop' => array('center', 'top' ) ), // testimonials

	'seogrow-thumb-800x600'       => array( 'width' => 800, 'height' => 600, 'crop' => array('center', 'top' ) ), // gallery,

	'seogrow-thumb-800x480'       => array( 'width' => 800, 'height' => 480, 'crop' => array('center', 'top' ) ), // grid, block

	'seogrow-thumb-370x180'       => array( 'width' => 370, 'height' => 180, 'crop' => array('center', 'top' ) ), // block ( small )

	'seogrow-thumb-150x150'       => array( 'width' => 150, 'height' => 150, 'crop' => array('center', 'top' ) ), // gallery
);

$manifest['css_supported_shortcodes'] = array(
	'about-me',
 	'accordion',
 	'contact',
 	'counter',
 	'header',
 	'icon-box',
 	'image-carousel',
 	'portfolio',
 	'post-block',
 	'pricing-box',
 	'team',
 	'testimonial',
 	'recruitment',
 	'footer',
 	'widget',
 	
);
$manifest['block_image_size'] = array(
	'team' => array( 
		'large'          => '600x600',
		'small'          => '350x350',
		'no-image-large' => '600x600',
		'no-image-small' => '350x350' 
	)
);