<?php if (!defined('SLZ')) die('Forbidden');

if (! is_admin()) {
	function _slz_ext_shortcodes_enqueue_style(){
		$css_shortcodes = array(
			'about-me',
			'accordion',
			'author-list',
			'banner',
			'button',
			'counter',
			'icon-box',
			'image-carousel',
			'item-list',
			'main-title',
			'map',
			'newsletter',
			'partner',
			'posts-carousel',
			'posts-grid',
			'pricing-box',
			'progress-bar',
			'timeline',
			'contact'
		);
		$css_newver = array(
			'counter' => 'counterv2',
		);
		$ext = slz_ext('shortcodes');
		$active_shorcodes = $ext->get_shortcodes();
		foreach($css_shortcodes as $name ){
			$shortcode = str_replace('-', '_', $name);
			if( isset($active_shorcodes[$shortcode]) ) {
				wp_enqueue_style(
						'slz-extension-shortcodes-' . $name,
						$ext->locate_URI('/static/css/'.$name.'.css'),
						array(),
						$ext->manifest->get('version')
				);
			}
		}
		foreach($css_newver as $old => $new) {
			$old = str_replace('-', '_', $old);
			$new = str_replace('-', '_', $new);
			if( !isset($active_shorcodes[$old]) && isset($active_shorcodes[$new]) ) {
				wp_enqueue_style(
						'slz-extension-shortcodes-' . $old,
						$ext->locate_URI('/static/css/'.$old.'.css'),
						array(),
						$ext->manifest->get('version')
				);
			}
		}
	}
	_slz_ext_shortcodes_enqueue_style();

	
	wp_enqueue_script(
		'slz-extension-shortcodes-load-shortcodes-ajax',
		slz_ext('shortcodes')->get_uri('/static/js/shortcode-ajax.js'),
		array(),
		slz_ext('shortcodes')->manifest->get('version'),
		true
	);

	wp_localize_script(
		'slz-extension-shortcodes-load-shortcodes-ajax',
		'slzAjaxUrl',
		admin_url( 'admin-ajax.php', 'relative' )
	);

}

if (is_admin()) {
	wp_register_script(
		'slz-extension-shortcodes-editor-integration',
		slz_ext('shortcodes')->get_uri('/static/js/aggressive-coder.js'),
		array('slz'),
		slz_ext('shortcodes')->manifest->get('version'),
		true
	);

	wp_enqueue_script(
		'slz-extension-shortcodes-load-shortcodes-data',
		slz_ext('shortcodes')->get_uri('/static/js/load-shortcodes-data.js'),
		array('slz'),
		slz_ext('shortcodes')->manifest->get('version'),
		true
	);
}

