<?php if ( ! defined( 'SLZ' ) ) {
    die( 'Forbidden' );
}
$title_type = array(
	'default'    => esc_html__(' Default','seogrow'),
	'title'      => esc_html__(' Post Title','seogrow'),
	'level'      => esc_html__(' Category','seogrow'),
	'custom'     => esc_html__(' Custom','seogrow'),
);
if( is_admin() ) {
	$screen = get_current_screen();
	if($screen && $screen->post_type == 'page' ) {
		$title_type = array(
			'default'    => esc_html__(' Default','seogrow'),
			'title'      => esc_html__(' Page Title','seogrow'),
			'custom'     => esc_html__(' Custom','seogrow'),
		);
	}
}

$options = array(
	'page-title' => array(
		'title'   => esc_html__( 'Page Header', 'seogrow' ),
		'type'    => 'tab',
		'options' => array(
			'pagetitle-options'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'enable-page-option' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Default Setting', 'seogrow' ),
						'left-choice'  => array(
							'value' => 'disable',
							'label' => esc_html__( 'Default', 'seogrow' ),
						),
						'right-choice' => array(
							'value' => 'enable',
							'label' => esc_html__( 'Custom', 'seogrow' ),
						)
					),
				),
				'choices'      => array(
					'enable' => array(
                        'bg-header-main'    => array(
                            'label'   => esc_html__( 'Header Main Background Color', 'seogrow' ),
                            'desc'    => esc_html__( "Choose custom background color for header main", 'seogrow' ),
                            'value'   => '',
                            'choices' => SLZ_Com::get_palette_color(),
                            'type'    => 'color-palette'
                        ),
						'group-pagetitle'   => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'enable-page-title' => array(
									'type'         => 'switch',
									'value'        => 'enable',
									'label'        => esc_html__( 'Page Header Area', 'seogrow' ),
									'left-choice'  => array(
										'value' => 'disable',
										'label' => esc_html__( 'Disable', 'seogrow' ),
									),
									'right-choice' => array(
										'value' => 'enable',
										'label' => esc_html__( 'Enable', 'seogrow' ),
										
									)
								),
							),
							'choices'      => array(
								'enable' => array(
									'bg-image'   => array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'bg-image-type'	=> array(
												'type'  => 'radio',
												'value' => 'upload-image',
												'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
												'label' => esc_html__('Background Image', 'seogrow'),
												'choices' => array(
													'upload-image' => esc_html__('Upload Image', 'seogrow'),
													'feature-image' => esc_html__('Featured Image', 'seogrow'),
												),
												'inline' => true,
											),
										),
										'choices'      => array(
											'upload-image' => array(
												'background-image'	=> array(
													'label'   => esc_html__( 'Image', 'seogrow' ),
													'type'    => 'background-image',
													'value'   => 'none',
													'desc'    => esc_html__( 'Upload an image to make background image',
														'seogrow' ),
			
												),
											)
										),
									),
									'height'        => array(
										'type'  => 'short-text',
										'label' => esc_html__( 'Page Header Height', 'seogrow' ),
										'desc'  => esc_html__( 'Enter heigth in pixels. Ex:80 ', 'seogrow' ),
										'value' => '80',
									),
									'enable-pt-title' => array(
										'type'         => 'switch',
										'value'        => 'enable',
										'label'        => esc_html__( 'Title On Page Header', 'seogrow' ),
										'left-choice'  => array(
											'value' => 'disable',
											'label' => esc_html__( 'Disable', 'seogrow' ),
										),
										'right-choice' => array(
											'value' => 'enable',
											'label' => esc_html__( 'Enable', 'seogrow' ),
										)
									),
									'type-of-title'	=>	array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'title-type' => array(
												'type'  => 'radio',
												'value' => '',
												'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
												'label' => esc_html__('Choose Title', 'seogrow'),
												'choices' => $title_type,
												'desc'    => esc_html__( 'Choose title to display in page header. To get setting from "Theme Setting", choose "Default"','seogrow' ),
												'inline' => true,
											),
										),
										'choices'      => array(
											'custom' => array(
												'custom-title' => array(
													'label'   => esc_html__( 'Custom Title', 'seogrow' ),
													'type'    => 'text',
													'value'   => '',
													'desc'    => esc_html__( 'Enter custom title to display in page header', 'seogrow' ),
												),
											)
										),
									),
									'enable-pt-breadcrumb' => array(
										'type'         => 'switch',
										'value'        => 'enable',
										'label'        => esc_html__( 'Breadcrumb On Page Header', 'seogrow' ),
										'left-choice'  => array(
											'value' => 'disable',
											'label' => esc_html__( 'Disable', 'seogrow' ),
										),
										'right-choice' => array(
											'value' => 'enable',
											'label' => esc_html__( 'Enable', 'seogrow' ),
										)
									),
								),
							),
						),
					),
				),
				'show_borders' => true,
			),
		)
	),

    'subcribe-section' => array(
        'title'   => esc_html__( 'Subcribe Settings', 'seogrow' ),
        'type' => 'tab',
        'options' => array(
            'subcribe' => array(
                'type'	=> 'multi-picker',
                'label'   => false,
                'desc'	=> false,
                'picker'  => array(
                    'subcribe-setting' => array(
						'type'         => 'switch',
						'value'        => 'default',
						'label'        => esc_html__( 'Subcribe', 'seogrow' ),
						'left-choice'  => array(
							'value' => 'default',
							'label' => esc_html__( 'Default', 'seogrow' ),
						),
						'right-choice' => array(
							'value' => 'custom',
							'label' => esc_html__( 'Custom', 'seogrow' ),
						)
					),
                ),
                'choices' => array(
                    'custom'=> array(
                    	'subcribe-enable' => array(
							'type'         => 'switch',
							'value'        => 'hide',
							'label'        => esc_html__( 'Show Subcribe?', 'seogrow' ),
							'left-choice'  => array(
								'value' => 'show',
								'label' => esc_html__( 'Show', 'seogrow' ),
							),
							'right-choice' => array(
								'value' => 'hide',
								'label' => esc_html__( 'Hide', 'seogrow' ),
							)
						),
                        'position' => array(
							'label'   => esc_html__( 'Subcribe Position', 'seogrow' ),
							'desc'    => esc_html__( 'Select your prefered subcribe position', 'seogrow' ),
							'type'     => 'switch',
								'right-choice' => array(
									'value' => 'header',
									'label' => esc_html__( 'Header', 'seogrow' )
								),
								'left-choice'  => array(
									'value' => 'footer',
									'label' => esc_html__( 'Footer', 'seogrow' )
								),
							'value'        => 'footer',
						),
                    ),
                ),
            )
        ),
    ),
);