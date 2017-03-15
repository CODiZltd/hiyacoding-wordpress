<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$default = array(
	'default'   => array(
		'small' => array(
			'height' => 70,
			'src'    => SEOGROW_OPTION_IMG_URI . '/default.png'
		),
		'large' => array(
			'height' => 214,
			'src'    => SEOGROW_OPTION_IMG_URI . '/default.png'
		),
	)
);
$regist_sidebars = array_merge( array( 'default' => esc_html__('-- Default --', 'seogrow') ), SLZ_Com::get_regist_sidebars() );

// revolution slider
$revolution_sliders = slz_extra_get_revolution_slider();

$page_header = slz()->theme->get_options( 'page-options' );

$footer_options =  slz()->theme->get_options( 'footer-options' );

$palette_color = SLZ_Com::get_palette_color();

// custom color
$site_default_colors = (array)slz()->theme->get_config('site_default_colors');
$site_custom_colors = (array) slz()->theme->get_config('site_custom_colors');
foreach( $site_custom_colors as $key => $variant ){
	$site_options[$key] = array(
		'label'   => $variant[1],
		'desc'    => $variant[2],
		'value'   => $variant[0],
		'choices' => $site_default_colors,
		'type'    => 'color-palette'
	);
}

$options = array(
	'page-settings'=> array(
		'type'    => 'box',
		'title'   => esc_html__(' Page Options','seogrow' ),
		'options' => array(
			'page-general-settings' => array(
				'title'   => esc_html__( 'General Settings', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'page-header-style' => array(
						'label'   => esc_html__( 'Header Style', 'seogrow' ),
						'type'    => 'image-picker',
						'attr'    => array('class' => 'slz-image-picker-max-width' ),
						'choices' => array_merge( $default, slz_ext('headers')->get_header_choices() ),
						'value'   => 'default'
					),
					'page-header-transparent' => array(
						'type'    => 'select',
						'label'   => esc_html__('Header Transparent', 'seogrow'),
						'choices' => array(
							''    =>  esc_html__('Default' ,'seogrow'),
							'header-transparent' =>  esc_html__('Yes' ,'seogrow'),
							'no'  =>  esc_html__('No' ,'seogrow')
						)
					),
                    'header-top-bg-color' => array(
                        'type'    => 'color-palette',
                        'label'   => esc_html__( 'Header Top Bar Background Color', 'seogrow' ),
                        'desc'    => esc_html__( 'Select header background color for top bar', 'seogrow' ),
                        'value'   => '',
                        'choices' => $palette_color,
                    ),
					'page-logo' => array(
						'type'        => 'upload',
						'label'       => esc_html__('Logo Image', 'seogrow'),
						'desc'        => esc_html__('Upload the site logo .png or .jpg', 'seogrow'),
						'images_only' => true,
					),
					'page-logo-transparent'   => array(
						'type'   => 'multi-picker',
						'label'  => false,
						'desc'   => false,
						'picker' => array(
							'logo_transparent_options' => array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__( 'Logo Transparent', 'seogrow' ),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__( 'Enable', 'seogrow' ),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__( 'Disable', 'seogrow' ),
								)
							),
						),
						'choices' => array(
							'enable' => array(
								'logo-transparent'	=>	array(
									'type'        => 'upload',
									'label'       => esc_html__('Logo Image Transparent', 'seogrow'),
									'desc'        => esc_html__('Upload the site logo .png or .jpg use for transparent', 'seogrow'),
									'images_only' => true,
								),
							),
						),
					),
					'page-slider'  => array(
						'type'     => 'select',
						'label'    => esc_html__('Revolution Slider', 'seogrow'),
						'desc'     => esc_html__('You can add revolution slider in header.','seogrow'),
						'choices'  => $revolution_sliders ,
						'value'    => ''
					),
					'page-footer-style' => array(
						'type'   => 'multi-picker',
						'label'  => false,
						'desc'   => false,
						'picker' => array(
							'footer-style' => array(
								'label'   => esc_html__( 'Footer Style', 'seogrow' ),
								'type'    => 'image-picker',
								'attr'    => array('class' => 'slz-image-picker-max-width' ),
								'choices' => array_merge( $default, slz_ext('footers')->get_footer_choices() ),
								'value'   => 'default'
							),
						),
						'choices'      => $footer_options,
						'show_borders' => false,
					),
					'page-sidebar-layout' => array(
						'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
						'desc'  => esc_html__( 'Set how to display page sidebar.', 'seogrow' ),
						'type'  => 'image-picker',
						'attr'  => array('class' => 'slz-image-picker-max-width' ),
						'choices' => array_merge( $default, array(
							'left' => array(
								'small' => array(
									'height' => 50,
									'src'    => SEOGROW_OPTION_IMG_URI . '/sidebar/left.png'
								)
							),
							'right' => array(
								'small' => array(
									'height' => 50,
									'src'    => SEOGROW_OPTION_IMG_URI . '/sidebar/right.png'
								)
							),
							'none' => array(
								'small' => array(
									'height' => 50,
									'src'    => SEOGROW_OPTION_IMG_URI . '/sidebar/full.png'
								)
							),
						) ),
						'value' => 'default'
					),
					'page-sidebar' => array(
						'type'    => 'select',
						'label'   => esc_html__('Choose Sidebar', 'seogrow'),
						'desc'    => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance','seogrow').' > '.esc_html__('Widgets','seogrow').'</a>',
						'choices' => $regist_sidebars,
						'value'   => 'default'
					),
					'ct-padding-top' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Content Padding Top', 'seogrow' ),
						'desc'  => esc_html__( 'Custom padding top for content (px).', 'seogrow' ),
						'value' => '',
					),
					'ct-padding-bottom' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Content Padding Bottom', 'seogrow' ),
						'desc'  => esc_html__( 'Custom padding bottom for content (px).', 'seogrow' ),
						'value' => '',
					),
					'styling-skin-colors' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'custom-style' => array(
								'type'         => 'switch',
								'value'        => 'default',
								'label'        => esc_html__( 'Custom Colors', 'seogrow' ),
								'left-choice'  => array(
									'value' => 'default',
									'label' => esc_html__( 'Default', 'seogrow' ),
								),
								'right-choice' => array(
									'value' => 'custom',
									'label' => esc_html__( 'Custom', 'seogrow' ),
								),
							),
						),
						'choices'      => array(
							'custom' => $site_options,
						),
					),
				)
			),
			$page_header,
		)
	)
);