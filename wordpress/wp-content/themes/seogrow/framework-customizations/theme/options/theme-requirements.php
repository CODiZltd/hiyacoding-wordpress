<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$seogrow_server_requirements = slz()->theme->manifest->get('server_requirements');

// wp version
global $wp_version;
$seogrow_wp_required_version = slz()->theme->manifest->get('requirements/wordpress/min_version');
if( version_compare($wp_version, $seogrow_wp_required_version , '<=') ){
	$seogrow_wp_version_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.$wp_version.'</strong>';
	$seogrow_wp_version_description_text = '<span class="slz-error-message">' .esc_html__( "The version of WordPress installed on your site.", 'seogrow' ). ' '. esc_html__( 'We recommend you update WordPress to the latest version. The minimum required version for this theme is:', 'seogrow' ) .' <strong>'.$seogrow_wp_required_version. '</strong>. <a target="_blank" href="'.esc_url( admin_url('update-core.php') ).'">'.esc_html__('Do that right now', 'seogrow').'</a></span>';
}
else{
	$seogrow_wp_version_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$wp_version.'</strong>';
	$seogrow_wp_version_description_text = esc_html__( "The version of WordPress installed on your site", 'seogrow' );
}

// wp multisite
if ( is_multisite() ){
	$seogrow_multisite_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('Yes', 'seogrow').'</strong>';
}
else{
	$seogrow_multisite_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'seogrow').'</strong>';
}

// wp debug mode
if ( defined('WP_DEBUG') && WP_DEBUG ){
	$seogrow_wp_debug_mode_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.esc_html__('Yes', 'seogrow').'</strong>';
	$seogrow_wp_debug_mode_description_text = '<span class="slz-error-message">' .esc_html__( 'Displays whether or not WordPress is in Debug Mode. This mode is used by developers to test the theme. We recommend you turn it off for an optimal user experience on your website.', 'seogrow' ).' <a href="'.esc_url('https://codex.wordpress.org/WP_DEBUG').'" target="_blank">'.esc_html__('Learn how to do it', 'seogrow').'</a></span>';
}
else{
	$seogrow_wp_debug_mode_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'seogrow').'</strong>';
	$seogrow_wp_debug_mode_description_text = esc_html__( 'Displays whether or not WordPress is in Debug Mode', 'seogrow' );
}

// wp memory limit
$seogrow_memory = seogrow_return_memory_size( WP_MEMORY_LIMIT );
$seogrow_requirements_wp_memory_limit = seogrow_return_memory_size($seogrow_server_requirements['server']['wp_memory_limit']);
if ( $seogrow_memory < $seogrow_requirements_wp_memory_limit ) {
	$seogrow_wp_memory_limit_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.size_format( $seogrow_memory ).'</strong>';
	$seogrow_wp_memory_limit_description_text = '<span class="slz-error-message">' . esc_html__('The maximum amount of memory (RAM) that your site can use at one time.', 'seogrow') . ' '.wp_kses(__( 'We recommend setting memory to at least <strong>256MB</strong>. Please define memory limit in <strong>wp-config.php</strong> file.', 'seogrow'), array('<strong>' => array()) ).' <a href="'.esc_url('http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP').'" target="_blank">'.esc_html__('Learn how to do it', 'seogrow' ).'</a></span>';
} else {
	$seogrow_wp_memory_limit_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.size_format( $seogrow_memory ).'</strong>';
	$seogrow_wp_memory_limit_description_text = esc_html__('The maximum amount of memory (RAM) that your site can use at one time', 'seogrow');
}

// php version
if ( function_exists( 'phpversion' ) ) {
	if( version_compare(phpversion(), $seogrow_server_requirements['server']['php_version'], '<=') ){
		$seogrow_php_version_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$seogrow_php_version_description_text = '<span class="slz-error-message">' .esc_html__( 'The version of PHP installed on your hosting server.', 'seogrow' ).' '.esc_html__( 'We recommend you update PHP to the latest version. The minimum required version for this theme is:', 'seogrow' ) .' <strong>'.$seogrow_server_requirements['server']['php_version']. '</strong>. '.__('Contact your hosting provider, they can install it for you.', 'seogrow').'</span>';
	}
	else{
		$seogrow_php_version_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$seogrow_php_version_description_text =  esc_html__( 'The version of PHP installed on your hosting server', 'seogrow' );
	}
}
else{
	$seogrow_php_version_text = esc_html__('No PHP Installed', 'seogrow');
}

// php post max size
$seogrow_requirements_post_max_size = seogrow_return_memory_size($seogrow_server_requirements['server']['post_max_size']);
if ( seogrow_return_memory_size( ini_get('post_max_size') ) < $seogrow_requirements_post_max_size ) {
	$seogrow_php_post_max_size_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.size_format(seogrow_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$seogrow_php_post_max_size_description_text = '<span class="slz-error-message">' .esc_html__( 'The largest file size that can be contained in one post.', 'seogrow'  ).' '. esc_html__( 'We recommend setting the post maximum size to at least:', 'seogrow' ) .' <strong>'.size_format($seogrow_requirements_post_max_size). '</strong>'.'. <a href="'.esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size').'" target="_blank">'.esc_html__('Learn how to do it','seogrow').'</a></span>';
}
else{
	$seogrow_php_post_max_size_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(seogrow_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$seogrow_php_post_max_size_description_text = esc_html__( 'The largest file size that can be contained in one post', 'seogrow'  );
}

// php time limit
$seogrow_time_limit = ini_get('max_execution_time');
$seogrow_required_php_time_limit = (int)$seogrow_server_requirements['server']['php_time_limit'];
if ( $seogrow_time_limit < $seogrow_required_php_time_limit && $seogrow_time_limit != 0 ) {
	$seogrow_php_time_limit_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.$seogrow_time_limit.'</strong>';
	$seogrow_php_time_limit_description_text = '<span class="slz-error-message">'.esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups).', 'seogrow'  ).' '.esc_html__( 'We recommend setting the maximum execution time to at least', 'seogrow').' <strong>'.$seogrow_required_php_time_limit.'</strong>'.'. <a href="'.esc_url('http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded').'" target="_blank">'.esc_html__('Learn how to do it','seogrow').'</a></span>';
} else {
	$seogrow_php_time_limit_description_text = esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'seogrow'  );
	$seogrow_php_time_limit_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$seogrow_time_limit.'</strong>';
}

// php max input vars
$seogrow_max_input_vars = ini_get('max_input_vars');
$seogrow_required_input_vars = $seogrow_server_requirements['server']['php_max_input_vars'];
if ( $seogrow_max_input_vars < $seogrow_required_input_vars ) {
	$seogrow_php_max_input_vars_description_text = '<span class="slz-error-message">'.esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'seogrow'  ). ' '.esc_html__( 'Please increase the maximum input variables limit to:','seogrow').' <strong>' . $seogrow_required_input_vars . '</strong>'.'. <a href="'.esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-increase-the-maximum-input-variables-limit').'" target="_blank">'.esc_html__('Learn how to do it','seogrow').'</a></span>';
	$seogrow_php_max_input_vars_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.$seogrow_max_input_vars.'</strong>';
} else {
	$seogrow_php_max_input_vars_description_text = esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'seogrow'  );
	$seogrow_php_max_input_vars_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.$seogrow_max_input_vars.'</strong>';
}

// suhosin
if( extension_loaded( 'suhosin' ) ) {
	$seogrow_suhosin_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('Yes', 'seogrow').'</strong>';
	$seogrow_suhosin_description_text = '<span class="slz-error-message">'. esc_html__( 'Suhosin is an advanced protection system for PHP installations and may need to be configured to increase its data submission limits', 'seogrow'  ).'</span>';
	$seogrow_max_input_vars      = ini_get( 'suhosin.post.max_vars' );
	$seogrow_required_input_vars = $seogrow_server_requirements['server']['suhosin_post_max_vars'];
	if ( $seogrow_max_input_vars < $seogrow_required_input_vars ) {
		$seogrow_suhosin_description_text .= '<span class="slz-error-message">' . sprintf( wp_kses(__( '%s - Recommended Value is: %s. <a href="%s" target="_blank">Increasing max input vars limit.</a>', 'seogrow' ), array( 'a' => array('href' => array()) ) ), $seogrow_max_input_vars, '<strong>' . ( $seogrow_required_input_vars ) . '</strong>', esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-increase-the-maximum-input-variables-limit') ) . '</span>';
	}
}
else {
	$seogrow_suhosin_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('No', 'seogrow').'</strong>';
	$seogrow_suhosin_description_text = esc_html__( 'Suhosin is an advanced protection system for PHP installations.', 'seogrow'  );
}

// mysql version
global $wpdb;
if( version_compare($wpdb->db_version(), $seogrow_server_requirements['server']['mysql_version'], '<=') ){
	$seogrow_mysql_version_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.$wpdb->db_version().'</strong>';
	$seogrow_mysql_version_description_text = '<span class="slz-error-message">' . esc_html__( 'The version of MySQL installed on your hosting server.', 'seogrow'  ).' '. esc_html__( 'We recommend you update MySQL to the latest version. The minimum required version for this theme is:', 'seogrow' ) .' <strong>'.$seogrow_server_requirements['server']['mysql_version']. '</strong> '.esc_html__('Contact your hosting provider, they can install it for you.', 'seogrow').'</span>';
}
else{
	$seogrow_mysql_version_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.$wpdb->db_version().'</strong>';
	$seogrow_mysql_version_description_text = esc_html__( 'The version of MySQL installed on your hosting server', 'seogrow'  );
}

// max upload size
$seogrow_requirements_max_upload_size = seogrow_return_memory_size($seogrow_server_requirements['server']['max_upload_size']);
if ( wp_max_upload_size() < $seogrow_requirements_max_upload_size ) {
	$seogrow_max_upload_size_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$seogrow_max_upload_size_description_text = '<span class="slz-error-message">' . esc_html__( 'The largest file size that can be uploaded to your WordPress installation.', 'seogrow'  ). ' '.esc_html__( 'We recommend setting the maximum upload file size to at least:', 'seogrow' ) .' <strong>'.size_format($seogrow_requirements_max_upload_size). '</strong>. <a href="'.esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size').'" target="_blank">'.esc_html__('Learn how to do it', 'seogrow').'</a></span>';
}
else{
	$seogrow_max_upload_size_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$seogrow_max_upload_size_description_text = esc_attr__( 'The largest file size that can be uploaded to your WordPress installation', 'seogrow'  );
}

// fsockopen
if( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ) {
	$seogrow_fsockopen_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'seogrow').'</strong>';
	$seogrow_fsockopen_description_text = esc_html__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services', 'seogrow' );
}
else{
	$seogrow_fsockopen_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'seogrow').'</strong>';
	$seogrow_fsockopen_description_text = '<span class="slz-error-message">'.wp_kses(__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services. Your server does not have <strong>fsockopen</strong> or <strong>cURL</strong> enabled thus PayPal IPN and other scripts which communicate with other servers will not work. Contact your hosting provider, they can install it for you.', 'seogrow' ), array( '<strong>' => array() )).'</span>';
}

$options = array(
	'requirements_tab' => array(
		'title'   => esc_html__( 'Requirements', 'seogrow' ),
		'type'    => 'tab',
		'options' => array(
			'wordpress-environment-box' => array(
				'title'   => esc_html__( 'WordPress Environment', 'seogrow' ),
				'type'    => 'box',
				'options' => array(
					'home_url' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Home URL', 'seogrow' ),
						'desc'  => esc_html__( "The URL of your site's homepage", 'seogrow' ),
						'type'  => 'html',
						'html'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(home_url()).'</strong>',
					),
					'site_url' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Site URL', 'seogrow' ),
						'desc'  => esc_html__( "The root URL of your site", 'seogrow' ),
						'type'  => 'html',
						'html'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(site_url()).'</strong>',
					),
					'wp_version' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Version', 'seogrow' ),
						'desc'  => $seogrow_wp_version_description_text,
						'type'  => 'html',
						'html'  => $seogrow_wp_version_text,
					),
					'wp_multisite' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Multisite', 'seogrow' ),
						'type'  => 'html',
						'desc'  => esc_html__( 'Whether or not you have WordPress Multisite enabled', 'seogrow' ),
						'html'  => $seogrow_multisite_text,
					),
					'wp_debug_mode' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Debug Mode', 'seogrow' ),
						'type'  => 'html',
						'desc'  => $seogrow_wp_debug_mode_description_text,
						'html'  => $seogrow_wp_debug_mode_text,
					),
					'wp_memory_limit' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Memory Limit', 'seogrow' ),
						'desc'  => $seogrow_wp_memory_limit_description_text,
						'type'  => 'html',
						'html'  => $seogrow_wp_memory_limit_text,
					),
				)
			),
			'server-environment-box' => array(
				'title'   => esc_html__( 'Server Environment', 'seogrow' ),
				'type'    => 'box',
				'options' => array(
					'server_info' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Server Info', 'seogrow' ),
						'desc'  => esc_html__( "Information about the web server that is currently hosting your site", 'seogrow' ),
						'type'  => 'html',
						'html'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( $_SERVER['SERVER_SOFTWARE'] ).'</strong>',
					),
					'php_version' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Version', 'seogrow' ),
						'desc'  => $seogrow_php_version_description_text,
						'type'  => 'html',
						'html'  => $seogrow_php_version_text,
					),
					'php_post_max_size' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Post Max Size', 'seogrow' ),
						'desc'  => $seogrow_php_post_max_size_description_text,
						'type'  => 'html',
						'html'  => $seogrow_php_post_max_size_text,
					),
					'php_time_limit' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Time Limit', 'seogrow' ),
						'desc'  => $seogrow_php_time_limit_description_text,
						'type'  => 'html',
						'html'  => $seogrow_php_time_limit_text,
					),
					'php_max_input_vars' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Max Input Vars', 'seogrow' ),
						'desc'  => $seogrow_php_max_input_vars_description_text,
						'type'  => 'html',
						'html'  => $seogrow_php_max_input_vars_text,
					),
					'suhosin_installed' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'SUHOSIN Installed', 'seogrow' ),
						'desc'  => $seogrow_suhosin_description_text,
						'type'  => 'html',
						'html'  => $seogrow_suhosin_text,
					),
					'zip_archive' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'ZipArchive', 'seogrow' ),
						'desc'  => class_exists( 'ZipArchive' ) ? esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders', 'seogrow') : '<span class="slz-error-message">'.esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders.', 'seogrow').' '.esc_html__('Contact your hosting provider, they can install it for you.', 'seogrow').'</span>',
						'type'  => 'html',
						'html'  => class_exists( 'ZipArchive' ) ? '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'seogrow').'</strong>' : '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'seogrow').'</strong>',
					),
					'mysql_version' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'MySQL Version', 'seogrow' ),
						'desc'  => $seogrow_mysql_version_description_text,
						'type'  => 'html',
						'html'  => $seogrow_mysql_version_text,
					),
					'max_upload_size' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Max Upload Size', 'seogrow' ),
						'desc'  => $seogrow_max_upload_size_description_text,
						'type'  => 'html',
						'html'  => $seogrow_max_upload_size_text,
					),
					'fsockopen' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'fsockopen/cURL', 'seogrow' ),
						'desc'  => $seogrow_fsockopen_description_text,
						'type'  => 'html',
						'html'  => $seogrow_fsockopen_text,
					),
					'legend' => array(
						'label' => false,
						'type'  => 'html',
						'html'  => '',
						'desc'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i><span class="slz-success-message">'.esc_html__('Meets minimum requirements', 'seogrow').'</span><br><i class="slz-no-icon dashicons dashicons-info"></i><span class="slz-error-message">'.esc_html__("We have some improvements to suggest", 'seogrow').'</span>',
					),
				)
			),
		)
	),
);
