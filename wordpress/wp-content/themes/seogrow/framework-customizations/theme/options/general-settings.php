<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'seogrow' ),
		'type'    => 'tab',
		'options' => array(
			'general-tab' => array(
				'title'   => esc_html__( 'General', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'general-box' => array(
						'title'   => esc_html__( 'Global Settings', 'seogrow' ),
						'type'    => 'box',
						'options' => array(
							'layout-group' => array(
								'type'   => 'multi-picker',
								'label'  => false,
								'desc'   => false,
								'picker' => array(
									'layout' => array(
										'label' => esc_html__( 'Site Layout', 'seogrow' ),
										'desc'  => esc_html__( 'This option will change layout for all pages of theme.', 'seogrow' ),
										'type'  => 'image-picker',
										'choices' => array(
											'full' => array(
												'small' => array(
													'height' => 70,
													'src'    => SEOGROW_OPTION_IMG_URI .'/layout-full.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => SEOGROW_OPTION_IMG_URI .'/layout-full.jpg'
												),
											),
											'boxed' => array(
												'small' => array(
													'height' => 70,
													'src'    => SEOGROW_OPTION_IMG_URI .'/layout-boxed.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => SEOGROW_OPTION_IMG_URI .'/layout-boxed.jpg'
												),
											),
										),
										'value' => 'full'
									),
								),
								'choices' => array(
									'boxed' => array(
										'boxed-width' => array(
											'type'  => 'slider',
											'value' => 1200,
											'properties' => array(
												'min' => 700,
												'max' => 1920,
												'step' => 1,
											),
											'label' => esc_html__('Boxed Width', 'seogrow'),
											'desc'  => esc_html__('Select the website width', 'seogrow'),
										),
										'bg-color' => array(
											'label'   => esc_html__( 'Background Color', 'seogrow' ),
											'desc'    => esc_html__( "Select the boxed background color", 'seogrow' ),
											'value'   => '',
											'choices' => SLZ_Com::get_palette_color(),
											'type'    => 'color-palette'
										),
										'boxed-background'	=> array(
											'label'   => esc_html__( 'Background Image', 'seogrow' ),
											'type'    => 'background-image',
											'value'   => 'none',
											'choices' => array(
												'none' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/no_pattern.jpg',
													'css'  => 'none',
												),
												'bg-1' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-2' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-3' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/dots_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-4' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/romb_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-5' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/square_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-6' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/noise_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-7' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/vertical_lines_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-8' => array(
													'icon' => SEOGROW_OPTION_IMG_URI .'/patterns/waves_pattern_preview.jpg',
													'css' => 'none',
												),
											),
											'desc' => esc_html__( 'Select background image or try to upload new image.',
												'seogrow' ),
										),
										'boxed-alignment' => array(
											'label' => esc_html__( 'Website Alignment', 'seogrow' ),
											'desc'  => esc_html__( 'Choose the website alignment.', 'seogrow' ),
											'type'  => 'image-picker',
											'choices' => array(
												'left' => array(
													'small' => array(
														'height' => 60,
														'src'	=> SEOGROW_OPTION_IMG_URI .'/position/left-position.jpg'
													),
												),
												'center' => array(
													'small' => array(
														'height' => 60,
														'src'    => SEOGROW_OPTION_IMG_URI .'/position/center-position.jpg'
													),
												),
												'right' => array(
													'small' => array(
														'height' => 60,
														'src'    => SEOGROW_OPTION_IMG_URI. '/position/right-position.jpg'
													),
												),
											),
											'value' => 'center'
										),
									)
								),
								'show_borders' => true,
							),
                            'bg-header-main' => array(
                                'label'     => esc_html__( 'Header Main Background Color', 'seogrow' ),
                                'desc'      => esc_html__( 'Select the background color for header main', 'seogrow' ),
								'value'     => '',
								'choices'   => SLZ_Com::get_palette_color(),
								'type'      => 'color-palette'
                            ),
							'logo' => array(
								'type'  => 'upload',
								'label' => esc_html__('Site Logo Image', 'seogrow'),
								'desc'  => esc_html__('Upload the site logo .png or .jpg', 'seogrow'),
								'images_only' => true,
								'value' => '',
							),
							'logo-transparent'   => array(
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
										    'type'  => 'upload',
										    'label' => esc_html__('Site Logo Transparent', 'seogrow'),
										    'desc'  => esc_html__('Upload the site logo .png or .jpg use for header transparent', 'seogrow'),
										    'images_only' => true,
										    'value' => array(
										        'url' => SEOGROW_LOGO_IMG_URI . '/logo_trans.png'
										    )
										),
									),
								),
							),
							'logo-text' => array(
								'type'  => 'text',
								'label' => esc_html__('Site Logo Text', 'seogrow'),
								'desc'  => esc_html__('You can use this field instead of above field "Site Logo Image".', 'seogrow'),
								'value' => get_bloginfo('name'),
							),
							'logo-alt'  => array(
								'type'  => 'text',
								'label' => esc_html__('Logo Alt Attribute', 'seogrow'),
								'desc'  => esc_html__('Appears inside the image container when the image can not be displayed. It helps search engines understand what an image is about.', 'seogrow'),
							),
							'logo-title' => array(
								'type'  => 'text',
								'label' => esc_html__('Logo Title Attribute', 'seogrow'),
								'desc'  => esc_html__('Used to provide a title for your image. It is displayed in a popup when a user takes their mouse over to an image.', 'seogrow'),
							),
							'scroll-to-top-group' => array(
								'type'    => 'group',
								'options' => array(
									'scroll-to-top-styling' => array(
										'attr'  => array(
											'data-advanced-for' => 'scroll-to-top-styling',
											'class'             => 'slz-advanced-button'
										),
										'type'          => 'popup',
										'label'         => esc_html__( 'Custom Style', 'seogrow' ),
										'desc'          => esc_html__( 'Change the style / typography of this shortcode', 'seogrow' ),
										'button'        => esc_html__( 'Styling', 'seogrow' ),
										'size'          => 'medium',
										'popup-options' => array(
											'btt-styling'  => array(
												'type'   => 'multi-picker',
												'label'  => false,
												'desc'   => false,
												'picker' => array(
													'style'  => array(
														'label'     => esc_html__( 'Choose Style', 'seogrow' ),
														'desc'      => esc_html__( 'Select style for button "back to top"', 'seogrow' ),
														'attr'      => array( 'class' => 'slz-checkbox-float-left' ),
														'type'      => 'select',
														'choices'   => array('special' => esc_html__('Special','seogrow'),'nomal'=>esc_html__('Nomal','seogrow')),
													),
												),
												'choices' => array(
													'nomal'  => array(
														'icon-type'  => array(
														'type'   => 'multi-picker',
														'label'  => false,
														'desc'   => false,
														'picker' => array(
															'icon-box-img' => array(
																'label'   => esc_html__( 'Icon', 'seogrow' ),
																'desc'    => esc_html__( 'Select icon type', 'seogrow' ),
																'attr'    => array( 'class' => 'slz-checkbox-float-left' ),
																'type'    => 'radio',
																'value'   => 'icon-class',
																'choices' => array(
																	'icon-class'  => esc_html__( 'Font Awesome', 'seogrow' ),
																	'upload-icon' => esc_html__( 'Custom Upload', 'seogrow' ),
																),
															),
														),
														'choices' => array(
															'icon-class'  => array(
																'icon_class' => array(
																	'type'  => 'icon',

																),
															),
															'upload-icon' => array(
																'upload-custom-img' => array(
																	'label' => '',
																	'type'  => 'upload',
																	'help'  => esc_html__('For best results upload a square image, larger then 30px x 30px.', 'seogrow'),
																),
															),
														)
													),
													'bg-color' => array(
														'label'   => esc_html__( 'Background Color', 'seogrow' ),
														'desc'    => esc_html__( 'Select the background color', 'seogrow' ),
														'value'   => '',
														'choices' => SLZ_Com::get_palette_color(),
														'type'    => 'color-palette'
													),
													'text-color'  => array(
														'label'   => esc_html__( 'Text Color', 'seogrow' ),
														'desc'    => esc_html__( 'Select the text color', 'seogrow' ),
														'value'   => '',
														'choices' => SLZ_Com::get_palette_color(),
														'type'    => 'color-palette'
													),
													),
													
												)
											),
											
										)
									),
									'enable-scroll-to' => array(
										'attr'        => array( 'class' => 'scroll-to-top-styling' ),
										'type'        => 'switch',
										'value'       => 'yes',
										'label'       => esc_html__( 'Button To Top', 'seogrow' ),
										'desc'        => esc_html__( 'Enable scroll to top?', 'seogrow' ),
										'left-choice' => array(
											'value' => 'no',
											'label' => esc_html__( 'Disable', 'seogrow' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__( 'Enable', 'seogrow' ),
										)
									),
									'enable-woo-account' => array(
										'type'        => 'switch',
										'value'       => 'disable',
										'label'       => esc_html__( 'WooCommerce Account', 'seogrow' ),
										'desc'        => esc_html__( 'Show WooCommerce account on header top right.', 'seogrow' ),
										'left-choice' => array(
											'value' => 'disable',
											'label' => esc_html__( 'Disable', 'seogrow' ),
										),
										'right-choice' => array(
											'value' => 'enable',
											'label' => esc_html__( 'Enable', 'seogrow'),
										)
									),
									'enable-wpml' => array(
										'type'         => 'switch',
										'value'        => 'no',
										'label'        => esc_html__( 'Language Switcher', 'seogrow' ),
										'desc'         => esc_html__( 'Show language switcher of WPML plugin on header top', 'seogrow' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => esc_html__( 'Hide', 'seogrow' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__( 'Show', 'seogrow' ),
										),
									),
									'map-key-api' => array(
										'type'  => 'text',
										'value' => '',
										'label' => esc_html__( 'Google Map - API Key', 'seogrow' ),
										'desc'  => esc_html__( 'This key is used to run a some feature of Google Map. Please refer document to create a key', 'seogrow' ),
									),
                                    'subcribe-section' => array(
                                        'title'   => esc_html__( 'Subcribe Settings', 'seogrow' ),
                                        'type' => 'box',
                                        'options' => array(
                                            'subcribe' => array(
                                                'type'	=> 'multi-picker',
                                                'label'   => false,
                                                'desc'	=> false,
                                                'picker'  => array(
                                                    'enable-subcribe' => array(
                                                        'type'         => 'switch',
                                                        'value'        => 'hide',
                                                        'label'        => esc_html__( 'Show Subcribe?', 'seogrow' ),
                                                        'desc'         => esc_html__( 'Show subcribe in Header or Footer', 'seogrow' ),
                                                        'left-choice'  => array(
                                                            'value' => 'show',
                                                            'label' => esc_html__( 'Show', 'seogrow' ),
                                                        ),
                                                        'right-choice' => array(
                                                            'value' => 'hide',
                                                            'label' => esc_html__( 'Hide', 'seogrow' ),
                                                        ),
                                                    ),
                                                ),
                                                'choices' => array(
                                                    'show'=> array(
                                                        'position' => array(
                                                            'label'   => esc_html__( 'Subcribe Position', 'seogrow' ),
                                                            'desc'    => esc_html__( 'Select your prefer subcribe position', 'seogrow' ),
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
                                                        'subcribe_title' => array(
                                                            'type'  => 'text',
                                                            'label' => esc_html__('Subcribe Title', 'seogrow'),
                                                            'desc'  => esc_html__('Enter title of subcribe.', 'seogrow')
                                                        ),
                                                        'subcribe_content' => array(
                                                            'type'  => 'wp-editor',
                                                            'label' => esc_html__('Subcribe Description', 'seogrow'),
                                                            'desc'  => esc_html__('Enter description to display on subcribe.', 'seogrow'),
                                                            'size' => 'small',
                                                            'editor_height' => 200,
                                                            'wpautop' => true,
                                                            'editor_type' => false,
                                                        ),
                                                        'styling' => array(
                                                            'type'          => 'popup',
                                                            'attr'          => array( 'class' => 'slz-advanced-button' ),
                                                            'label'         => esc_html__( 'Subcribe Settings', 'seogrow' ),
                                                            'desc'          => esc_html__( 'Settings for subcribe', 'seogrow' ),
                                                            'button'        => esc_html__( 'Settings', 'seogrow' ),
                                                            'size'          => 'medium',
                                                            'popup-options' => array(
                                                                'block-bg-color'     => array(
                                                                    'label'   => esc_html__( 'Block Background Color', 'seogrow' ),
                                                                    'desc'  => esc_html__('Choose background color for subcribe.', 'seogrow'),
                                                                    'type'    => 'rgba-color-picker'
                                                                ),
                                                                'bg-image'	=> array(
                                                                    'label'   => esc_html__( 'Background Image', 'seogrow' ),
                                                                    'type'    => 'background-image',
                                                                    'value'   => 'none',
                                                                    'desc'    => esc_html__( 'Upload an image to make background image',
                                                                        'seogrow' ),

                                                                ),
                                                                'title-color' => array(
                                                                    'label'   => esc_html__( 'Title Color ', 'seogrow' ),
                                                                    'value'   => '',
                                                                    'choices' => SLZ_Com::get_palette_color(),
                                                                    'type'    => 'color-palette'
                                                                ),
                                                                'btn-text'     => array(
                                                                    'label'   => esc_html__( 'Button Text', 'seogrow' ),
                                                                    'type'    => 'text'
                                                                ),
                                                                'btn-icon'     => array(
                                                                    'type'      => 'multi-picker',
                                                                    'label'     => false,
                                                                    'des'       => false,
                                                                    'picker'    => array(
                                                                        'selected-value'    => array(
                                                                            'label'         => __( 'Button Icon', 'seogrow' ),
                                                                            'des'           => __( 'Icon for button?', 'seogrow' ),
                                                                            'type'          => 'switch',
                                                                            'right-choice'  => array(
                                                                                'value'     => 'yes',
                                                                                'label'     => __( 'Yes', 'seogrow' ),
                                                                            ),
                                                                            'left-choice'   => array(
                                                                                'value'     => 'no',
                                                                                'label'     => __( 'No', 'seogrow' ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                    'choices'    => array(
                                                                        'yes'   => array(
                                                                            'icon-class'    => array(
                                                                                'type'      => 'icon',
                                                                                'label'     => '',
                                                                                'value'     => ''
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                'btn-link'     => array(
                                                                    'label'   => esc_html__( 'Button Link', 'seogrow' ),
                                                                    'type'    => 'text'
                                                                ),
                                                                'btn-bg-color'     => array(
                                                                    'label'   => esc_html__( 'Button Background Color', 'seogrow' ),
                                                                    'type'    => 'rgba-color-picker'
                                                                ),
                                                                'btn-color' => array(
                                                                    'label'   => esc_html__( 'Button Text Color', 'seogrow' ),
                                                                    'value'   => '',
                                                                    'choices' => SLZ_Com::get_palette_color(),
                                                                    'type'    => 'color-palette'
                                                                ),
                                                            ),
                                                        ),
                                                    )
                                                )
                                            )
                                        ),
                                    ),
								)
							),	
						)
					),
				)
			),
			'social-tab'  => array(
				'title'   => esc_html__( 'Social Profiles', 'seogrow' ),
				'type'	=> 'tab',
				'options' => array(
					'social-box' => array(
						'title'   => esc_html__( 'Social Settings', 'seogrow' ),
						'type'	=> 'box',
						'options' => array(
							'socials' => array(
								'type'		  => 'addable-popup',
								'label'		 => esc_html__( 'Social Links', 'seogrow' ),
								'desc'		  => esc_html__( 'Add your social profiles', 'seogrow' ),
								'template'	  => '{{=social_name}}',
								'popup-options' => array(
									'social_name' => array(
										'label' => esc_html__( 'Name', 'seogrow' ),
										'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'seogrow' ),
										'type'  => 'text',
									),
									'social_type' => array(
										'type'	=> 'multi-picker',
										'label'   => false,
										'desc'	=> false,
										'picker'  => array(
											'social-type' => array(
												'label'   => esc_html__( 'Icon', 'seogrow' ),
												'desc'	=> esc_html__( 'Select social icon type', 'seogrow' ),
												'attr'	=> array( 'class' => 'slz-checkbox-float-left' ),
												'type'	=> 'radio',
												'value'   => 'icon-social',
												'choices' => array(
													'icon-social' => esc_html__( 'Font Awesome', 'seogrow' ),
													'upload-icon' => esc_html__( 'Custom Upload', 'seogrow' ),
												),
											),
										),
										'choices' => array(
											'icon-social' => array(
												'icon_class' => array(
													'type'  => 'icon',
													'value' => 'fa fa-adn',
													'label' => '',
												),
											),
											'upload-icon' => array(
												'upload-social-icon' => array(
													'label' => '',
													'type'  => 'upload',
												)
											),
										)
									),
									'social-link' => array(
										'label' => esc_html__( 'Link', 'seogrow' ),
										'desc'  => esc_html__( 'Enter your social URL link', 'seogrow' ),
										'type'  => 'text',
									)
								),
							),
						)
					),
				)
			),
			'customize-icon-tab'  => array(
				'title'   => esc_html__( 'Customize Icon', 'seogrow' ),
				'type'	=> 'tab',
				'options' => array(
					'customize-icon-box' => array(
						'title'   => esc_html__( 'Customize Icon', 'seogrow' ),
						'type'	=> 'box',
						'options' => array(
							'customize-icon' => array(
								'type'		  => 'addable-popup',
								'label'		 => esc_html__( 'Customize Icon', 'seogrow' ),
								'desc'		  => esc_html__( 'Add your customizable icon', 'seogrow' ),
								'template'	  => '{{=icon_name}}',
								'popup-options' => array(
									'icon_name' => array(
										'label' => esc_html__( 'Name', 'seogrow' ),
										'desc'  => esc_html__( 'Enter a name (it will show in front end)', 'seogrow' ),
										'type'  => 'text',
									),
									'icon_type' => array(
										'type'	=> 'multi-picker',
										'label'   => false,
										'desc'	=> false,
										'picker'  => array(
											'icon-type' => array(
												'label'   => esc_html__( 'Icon', 'seogrow' ),
												'desc'	=> esc_html__( 'Select customize icon type', 'seogrow' ),
												'attr'	=> array( 'class' => 'slz-checkbox-float-left' ),
												'type'	=> 'radio',
												'value'   => 'icon',
												'choices' => array(
													'icon' => esc_html__( 'Font Awesome', 'seogrow' ),
													'upload-icon' => esc_html__( 'Custom Upload', 'seogrow' ),
												),
											),
										),
										'choices' => array(
											'icon' => array(
												'icon_class' => array(
													'type'  => 'icon',
													'value' => 'fa fa-adn',
													'label' => '',
												),
											),
											'upload-icon' => array(
												'upload-icon' => array(
													'label' => '',
													'type'  => 'upload',
												)
											),
										)
									),
									'icon-link' => array(
										'label' => esc_html__( 'Link', 'seogrow' ),
										'desc'  => esc_html__( 'Enter your customize icon URL link', 'seogrow' ),
										'type'  => 'text',
									)
								),
							),
						)
					),
				)
			),
			'tracking-tab'  => array(
				'title'   => esc_html__( 'Tracking Scripts', 'seogrow' ),
				'type'	=> 'tab',
				'options' => array(
					'tracking-box' => array(
						'title'   => esc_html__( 'Tracking Scripts', 'seogrow' ),
						'type'	=> 'box',
						'options' => array(
							'tracking-popup' => array(
								'type'		  => 'addable-popup',
								'label'		 => esc_html__( 'Tracking Scripts', 'seogrow' ),
								'desc'		  => esc_html__( 'Add your tracking scripts (MixPanel, Google Analytics, etc)', 'seogrow' ),
								'template'	  => '{{=tracking_name}}',
								'popup-options' => array(
									'tracking_name' => array(
										'label' => esc_html__( 'Tracking Name', 'seogrow' ),
										'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'seogrow' ),
										'type'  => 'text',
										'value'	=> ''
									),
									'tracking_script' => array(
										'type'  => 'code-editor',
										'mode'	=> 'html',
										'attr'	=> array('rows' => 4),
										'label' => esc_html__('Script', 'seogrow'),
										'desc'  => esc_html__('Copy/Paste the tracking script here. Include &lt;script&gt; or &lt;style&gt; tag', 'seogrow'),
									)
								),
							),
						)
					),
				)
			),
		)
	)
);