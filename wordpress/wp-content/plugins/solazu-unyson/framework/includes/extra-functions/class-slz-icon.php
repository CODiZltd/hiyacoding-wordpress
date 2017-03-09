<?php
/**
* Icon Class
*/
class SLZ_Icon
{	
	public function __construct(){
		// Register Backend and Frontend CSS Styles
		add_action( 'vc_base_register_front_css', array(&$this, '_action_iconpicker_base_register_css') );
		add_action( 'vc_base_register_admin_css', array(&$this, '_action_iconpicker_base_register_css') );

		// Enqueue Backend and Frontend CSS Styles
		add_action( 'vc_backend_editor_enqueue_js_css', array(&$this, '_action_iconpicker_editor_js_css') );
		add_action( 'vc_frontend_editor_enqueue_js_css', array(&$this, '_action_iconpicker_editor_js_css') );

		// Enqueue CSS in Frontend when it's used
		add_action('vc_enqueue_font_icon_element', array(&$this, '_action_enqueue_font_flaticon') );
		
		// Define Icons for VC Iconpicker
		add_filter( 'vc_iconpicker-type-flaticon', array(&$this, '_filter_iconpicker_type_flaticon')  );
	}

	public function _action_iconpicker_base_register_css(){
	    wp_register_style('flaticon', slz_get_framework_directory_uri( '/static/libs/flaticon/flaticon.css'));
	}

	public function _action_iconpicker_editor_js_css(){
	    wp_enqueue_style( 'flaticon' );
	}

	public function _action_enqueue_font_flaticon($font){
	    switch ( $font ) {
	        case 'flaticon': wp_enqueue_style( 'flaticon' );
	    }
	}
	
	public function _filter_iconpicker_type_flaticon( $icons ) {
		$flaticons = array(
			array('flaticon-basket'            => 'Basket'),
			array('flaticon-binoculars'        => 'Binoculars'),
			array('flaticon-brain'             => 'Brain'),
			array('flaticon-calculator'        => 'Calculator'),
			array('flaticon-calendar'          => 'Calendar'),
			array('flaticon-clock'             => 'Clock'),
			array('flaticon-coffee-cup'        => 'Coffee Cup'),
			array('flaticon-coffee-cup-1'      => 'Coffee Cup 1'),
			array('flaticon-cogwheel'          => 'Cogwheel'),
			array('flaticon-coins'             => 'Coins'),
			array('flaticon-command'           => 'Command'),
			array('flaticon-compass'           => 'Compass'),
			array('flaticon-cup'               => 'Cup'),
			array('flaticon-diagram'           => 'Diagram'),
			array('flaticon-dialog'            => 'Dialog'),
			array('flaticon-documentation'     => 'Documentation'),
			array('flaticon-dollar-bill'       => 'Dollar Bill'),
			array('flaticon-dollar-coins'      => 'Dollar Coins'),
			array('flaticon-employee'          => 'Employee'),
			array('flaticon-employees'         => 'Employees'),
			array('flaticon-flag'              => 'Flag'),
			array('flaticon-flask'             => 'Flask'),
			array('flaticon-glasses'           => 'Glasses'),
			array('flaticon-horse'             => 'Horse'),
			array('flaticon-laptop'            => 'Laptop'),
			array('flaticon-lifebuoy'          => 'Lifebuoy'),
			array('flaticon-light-bulb'        => 'Light Bulb'),
			array('flaticon-line-graph'        => 'Line Graph'),
			array('flaticon-loupe'             => 'Loupe'),
			array('flaticon-medal'             => 'Medal'),
			array('flaticon-megaphone'         => 'Megaphone'),
			array('flaticon-microscope'        => 'Microscope'),
			array('flaticon-mortarboard'       => 'Mortarboard'),
			array('flaticon-mountain'          => 'Mountain'),
			array('flaticon-paper-plane'       => 'Paper Plane'),
			array('flaticon-piggy-bank'        => 'Piggy Bank'),
			array('flaticon-pointer'           => 'Pointer'),
			array('flaticon-rocket'            => 'Rocket'),
			array('flaticon-smartphone'        => 'Smartphone'),
			array('flaticon-smartphone-1'      => 'Smartphone 1'),
			array('flaticon-speedometer'       => 'Speedometer'),
			array('flaticon-statistics'        => 'Statistics'),
			array('flaticon-store'             => 'Store'),
			array('flaticon-suitcase'          => 'Suitcase'),
			array('flaticon-target'            => 'Target'),
			array('flaticon-tasks'             => 'Tasks'),
			array('flaticon-telescope'         => 'Telescope'),
			array('flaticon-tie'               => 'Tie'),
			array('flaticon-ufo'               => 'UFO'),
			array('flaticon-website'           => 'Website')
		);
		return array_merge( $icons, $flaticons );
	}

} new SLZ_Icon();