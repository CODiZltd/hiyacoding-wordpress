<?php if (!defined('SLZ')) die('Forbidden');

if (! is_admin()) {
	//css
	wp_register_style(
		'font-awesome.min',
		slz_get_framework_directory_uri('/static/libs/font-awesome/css/font-awesome.min.css')
	);
	
	wp_enqueue_style(
		'ionicons.min',
		slz_get_framework_directory_uri('/static/libs/font-onicons/css/ionicons.min.css')
	);

	wp_enqueue_style(
		'open-iconic-bootstrap.min',
		slz_get_framework_directory_uri('/static/libs/font-open-iconic/css/open-iconic-bootstrap.min.css'),
		array(),
		slz_ext( 'autoload' )->manifest->get_version()
	);

	wp_enqueue_style(
		'animate.min',
		slz_ext('autoload')->get_uri('/static/libs/animate/animate.min.css'),
		array(),
		slz_ext( 'autoload' )->manifest->get_version()
	);
	
	wp_enqueue_style(
		'slick',
		slz_ext('autoload')->get_uri('/static/libs/slick-slider/slick.css'),
		array(),
		slz_ext( 'autoload' )->manifest->get_version()
	);
	
	wp_enqueue_style(
		'slick-theme',
		slz_ext('autoload')->get_uri('/static/libs/slick-slider/slick-theme.css'),
		array(),
		slz_ext( 'autoload' )->manifest->get_version()
	);
	
	wp_enqueue_style(
		'jquery.fancybox',
		slz_ext('autoload')->get_uri('/static/libs/fancybox/css/jquery.fancybox.css'),
		array(),
		slz_ext( 'autoload' )->manifest->get_version()
	);
	
	wp_enqueue_style(
		'jquery.fancybox-thumbs',
		slz_ext('autoload')->get_uri('/static/libs/fancybox/css/jquery.fancybox-thumbs.css')
	);
	wp_enqueue_style(
		'jquery.mcustom-scrollbar',
		slz_ext('autoload')->get_uri('/static/libs/custom-scroll/jquery.mCustomScrollbar.min.css')
	);
	wp_enqueue_style(
		'mediaelementplayer.min',
		slz_ext('autoload')->get_uri('/static/libs/mediaelement/mediaelementplayer.min.css')
	);
	
	wp_enqueue_style(
		'slz-extension-autoload-layout',
		slz_ext('autoload')->get_uri('/static/css/layout.css'),
		slz()->theme->manifest->get('theme_libs'),
		slz_ext( 'autoload' )->manifest->get_version()
	);

	wp_enqueue_style(
		'slz-extension-autoload-components',
		slz_ext('autoload')->get_uri('/static/css/components.css'),
		slz()->theme->manifest->get('theme_libs'),
		slz_ext( 'autoload' )->manifest->get_version()
	);
	// js
	wp_enqueue_script(
		'wow.min',
		slz_ext('autoload')->get_uri('/static/libs/wow/wow.min.js'),
		array('jquery'),
		false,
		true
	);
	wp_enqueue_script(
		'slick.min',
		slz_ext('autoload')->get_uri('/static/libs/slick/js/slick.min.js'),
		array('jquery'),
		false,
		true
	);

	wp_enqueue_script(
		'isotope.pkgd.min',
		slz_ext('autoload')->get_uri('/static/libs/isotope/isotope.pkgd.min.js'),
		array('jquery'),
		false,
		true
	);
	
	wp_enqueue_script(
		'circle-progress',
		slz_ext('autoload')->get_uri('/static/libs/circle-progress.js'),
		array('jquery'),
		false,
		true
	);
	
	wp_enqueue_script(
		'jquery.appear',
		slz_ext('autoload')->get_uri('/static/libs/jquery.appear.js'),
		array('jquery'),
		false,
		true
	);
	
	wp_enqueue_script(
		'jquery.countTo',
		slz_ext('autoload')->get_uri('/static/libs/jquery.countTo.js'),
		array('jquery'),
		false,
		true
	);

	wp_enqueue_script( 
		'jquery.fancybox',
		slz_ext('autoload')->get_uri('/static/libs/fancybox/js/jquery.fancybox.js'),
		array( ),
		false,
		true
	);

	wp_enqueue_script(
		'jquery.directional-hover',
		slz_ext('autoload')->get_uri('/static/libs/directional-hover/jquery.directional-hover.js'),
		array( ),
		false,
		true
	);

	wp_enqueue_script(
		'jquery.fancybox-thumbs',
		slz_ext('autoload')->get_uri('/static/libs/fancybox/js/jquery.fancybox-thumbs.js'),
		array( ),
		false,
		true
	);

	wp_enqueue_script(
		'jquery.easing.min',
		slz_ext('autoload')->get_uri('/static/libs/easy-ticker/jquery.easing.min.js'),
		array( ),
		false,
		true
	);
	
	wp_enqueue_script(
		'jquery.easy-ticker.min',
		slz_ext('autoload')->get_uri('/static/libs/easy-ticker/jquery.easy-ticker.min.js'),
		array( ),
		false,
		true
	);
	
	wp_enqueue_script(
		'jquery.mCustomScrollbar.concat.min',
		slz_ext('autoload')->get_uri('/static/libs/custom-scroll/jquery.mCustomScrollbar.concat.min.js'),
		array( ),
		false,
		true
	);
	wp_enqueue_script(
		'mediaelement-and-player.min',
		slz_ext('autoload')->get_uri('/static/libs/mediaelement/mediaelement-and-player.min.js'),
		array( ),
		false,
		true
	);

	wp_enqueue_script(
		'slz-extension-autoload-main',
		slz()->extensions->get( 'autoload' )->locate_js_URI( 'main' ),
		array( 'jquery' ),
		slz_ext( 'autoload' )->manifest->get_version(),
		true
	);
}