<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$palette_color = SLZ_Com::get_palette_color();

$regist_menu = array( 'default' => __('-- Select Menu --', 'slz') ) + SLZ_Com::get_regist_menu();

$menu_locations = get_nav_menu_locations();

$menu_align = array(
	'left'   => esc_html__('Left','slz'),
	'right'  => esc_html__('Right','slz'),
	);
	
$contact_form = SLZ_Com::get_contact_form();

$breaking_news_arr = array(
	'type'    => 'group',
	'options' => array(),
);
if ( slz_ext( 'headers' )->get_config('enable_breakingnews') ) {
	$breaking_news_arr = array(
				'type'    => 'group',
				'options' => array(
					'breaking-news-options' => array(
						'attr'          => array(
							'data-advanced-for' => 'breaking-news-options',
							'class'             => 'slz-advanced-button'
						),
						'type'          => 'popup',
						'label'         => __( 'Custom Style', 'slz' ),
						'desc'          => __( 'Change the style / typography of search box', 'slz' ),
						'button'        => __( 'Options', 'slz' ),
						'size'          => 'medium',
						'popup-options' => array(
							'style-breaking-news' => array(
								'attr'    => array( 'class' => 'breaking-news-options' ),
								'type'         => 'switch',
								'value'        => 'style-1',
								'label'        => __( 'Style', 'slz' ),
								'desc'         => __( 'Choose style to show.', 'slz' ),
								'left-choice'  => array(
									'value' => 'style-1',
									'label' => __( 'Style 1', 'slz' ),
								),
								'right-choice' => array(
									'value' => 'style-2',
									'label' => __( 'Style 2', 'slz' ),
								)
							),
							'limit_post'	=>	array(
								'type'  => 'text',
								'value' => '7',
								'label' => esc_html__('Limit Post', 'slz'),
								'desc'  => esc_html__('Input number of post to show', 'slz'),
							),
							'offset_post'	=>	array(
								'type'  => 'text',
								'label' => esc_html__('Offset Post', 'slz'),
								'desc'  => esc_html__('Input number of offset post', 'slz'),
							),
							'category_list' => array(
								'label'  => __( 'Category Filter', 'slz' ),
								'type'   => 'addable-option',
								'option' => array(
									'type' => 'select',
									'choices' => SLZ_Com::get_category2name_array(),
								),
								'value'  => array( '' ),
								'desc'   => __( 'Default no filter by category.', 'slz' ),
							),
							'tag_list' => array(
								'label'  => __( 'Tag Filter', 'slz' ),
								'type'   => 'addable-option',
								'option' => array(
									'type' => 'select',
									'choices' => SLZ_Com::get_tax_options2name( 'post_tag', array('empty' => esc_html__( '-All tags-', 'slz' )) ),
								),
								'value'  => array( '' ),
								'desc'   => __( 'Default no filter by tag.', 'slz' ),
							),
						)
					),
					'enable-breaking-news' => array(
						'attr'    => array( 'class' => 'breaking-news-options' ),
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Breaking News', 'slz' ),
						'desc'         => __( 'Enable breaking news ?', 'slz' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => __( 'Disable', 'slz' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => __( 'Enable', 'slz' ),
						)
					),
				)
			);
}

$options = array(
	'general-box' => array(
	    'type' => 'box',
	    'title' => __('General Settings', 'slz'),
	    'options' => array(
	    	'header-transparent' => array(
				'label'        => __( 'Header Transparent', 'slz' ),
				'desc'         => __( 'Make header transparent', 'slz' ),
				'type'         => 'switch',
				'left-choice' => array(
					'value' => '',
					'label' => __( 'No', 'slz' )
				),
				'right-choice'  => array(
					'value' => 'header-transparent',
					'label' => __( 'Yes', 'slz' )
				),
				'value'        => '',
			),
			'header-styling' => array(
				'type'          => 'popup',
				'attr'          => array( 'class' => 'slz-advanced-button' ),
				'label'         => __( 'Custom Style', 'slz' ),
				'desc'          => __( 'Change the style of this header', 'slz' ),
				'button'        => __( 'Styling', 'slz' ),
				'size'          => 'medium',
				'popup-options' => array(
					'header-bg-color'      => array(
						'label'   => __( 'Background Color', 'slz' ),
						'desc'    => __( 'Select header background color', 'slz' ),
						'value'   => '',
						'choices' => $palette_color,
						'type'    => 'color-palette'
					),
					'header-bg-image'	=>	array(
					    'type'  => 'upload',
					    'label' => __('Background Image', 'slz'),
					    'desc'  => __('Upload the background image .png or .jpg', 'slz'),
					    'images_only' => true,
					),
					'header-bg-attachment' =>	array(
					    'type'    => 'select',
					    'label'   => esc_html__('Background Attachment', 'slz'),
					    'choices' => SLZ_Params::get('option-bg-attachment'),
					),
					'header-bg-size' =>	array(
					    'type'    => 'select',
					    'label'   => esc_html__('Background Size', 'slz'),
					    'choices' => SLZ_Params::get('option-bg-size'),
					),
					'header-bg-position' =>	array(
					    'type'    => 'select',
					    'label'   => esc_html__('Background Position', 'slz'),
					    'choices' => SLZ_Params::get('option-bg-position'),
					),
					'header-text-color'      => array(
						'label'   => __( 'Text Color', 'slz' ),
						'desc'    => __( 'Select header text color', 'slz' ),
						'value'   => '',
						'choices' => $palette_color,
						'type'    => 'color-palette'
					),
				)
			),
			'enable-sticky-header'    => array(
				'type'         => 'switch',
				'value'        => '',
				'attr'         => array(),
				'label'        => __( 'Sticky Header', 'slz' ),
				'desc'         => __( 'Make the header stick with the scroll?', 'slz' ),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'slz' ),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'slz' ),
				),
			),
			'menu-group' => array(
				'type'    => 'group',
				'options' => array(
					'show-main-menu'    => array(
						'type'         => 'switch',
						'value'        => 'show',
						'attr'         => array(),
						'label'        => __( 'Main Header?', 'slz' ),
						'right-choice'  => array(
							'value' => 'show',
							'label' => __( 'Show', 'slz' ),
						),
						'left-choice' => array(
							'value' => 'hide',
							'label' => __( 'Hide', 'slz' ),
						),
					),
					'main-menu' 	=>	array(
					    'type'  => 'select',
					    'attr'	=>	array('data-saved-value' => ( !empty ( $menu_locations['main-nav'] ) ? $menu_locations['main-nav'] : '')),
					    'label' => __('Select Main Menu', 'slz'),
					    'desc'  => __('Select menu for main menu. This changes will be apply for all headers.', 'slz'),
					    'choices' => $regist_menu,
					    'value'	=> ( !empty ( $menu_locations['main-nav'] ) ? $menu_locations['main-nav'] : '')
					),
					'menu-styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'scroll-to-top-styling',
							'class'             => 'slz-advanced-button'
						),
						'type'          => 'popup',
						'label'         => esc_html__( 'Custom Style', 'slz' ),
						'desc'          => esc_html__( 'Change the style for menu', 'slz' ),
						'button'        => esc_html__( 'Styling', 'slz' ),
						'size'          => 'medium',
						'popup-options' => array(
							'menu-item-color' => array(
								'label'   => esc_html__( 'Item Color', 'slz' ),
								'desc'    => esc_html__( "Select color for menu item", 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
							'menu-item-active-color' => array(
								'label'   => esc_html__( 'Item Active Color', 'slz' ),
								'desc'    => esc_html__( "Select color for menu item active", 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
							'menu-border-color' => array(
								'label'   => esc_html__( 'Menu Border Color', 'slz' ),
								'desc'    => esc_html__( "Select color for border of dropdown menu and mega menu", 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
							'dropdown-align'  => array(
							    'type'  => 'select',
							    'label' => esc_html__('Dropdown Menu Align', 'slz'),
							    'choices' => $menu_align,
                                'value'   => 'right',
							)
						)
					),
				)
			),
			'enable-subheader'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'enable' => array(
						'label'        => __( 'Sub Header?', 'slz' ),
						'desc'         => __( 'Enable the sub header in header main?', 'slz' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'show',
							'label' => __( 'Show', 'slz' )
						),
						'left-choice'  => array(
							'value' => 'hide',
							'label' => __( 'Hide', 'slz' )
						),
						'value'        => 'hide',
					)
				),
				'choices'      => array(
					'show' => array(
						'subheader-styling' => array(
							'attr'          => array(
								'data-advanced-for' => 'scroll-to-top-styling',
								'class'             => 'slz-advanced-button'
							),
							'type'          => 'popup',
							'label'         => esc_html__( 'Custom Style', 'slz' ),
							'desc'          => esc_html__( 'Change the style for sub header', 'slz' ),
							'button'        => esc_html__( 'Styling', 'slz' ),
							'size'          => 'medium',
							'popup-options' => array(
								'menu-item-color' => array(
									'label'   => esc_html__( 'Main Color', 'slz' ),
									'desc'    => esc_html__( "Select main color for session", 'slz' ),
									'value'   => '',
									'choices' => SLZ_Com::get_palette_color(),
									'type'    => 'color-palette'
								),
							),
						),
						'submenu-tab' => array(
							'title'   => esc_html__( 'Sub Menu Settings', 'slz' ),
							'type'    => 'tab',
							'options' => array(
								'enable-submenu' => array(
									'label'        => __( 'Sub Menu?', 'slz' ),
									'desc'         => __( 'Enable the menu in header main?', 'slz' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'show',
										'label' => __( 'Show', 'slz' )
									),
									'left-choice'  => array(
										'value' => 'hide',
										'label' => __( 'Hide', 'slz' )
									),
									'value'        => 'hide',
								),
								'menu-list' 	=>	array(
								    'type'  => 'select',
								    'attr'	=>	array('data-saved-value' => ( !empty ( $menu_locations['sub-nav'] ) ? $menu_locations['sub-nav'] : '')),
								    'label' => __('Select Sub Menu', 'slz'),
								    'desc'  => __('Select menu for sub menu. This changes will be apply for all headers.', 'slz'),
								    'choices' => $regist_menu,
								    'value'	=> ( !empty ( $menu_locations['sub-nav'] ) ? $menu_locations['sub-nav'] : '')
								),
							)
						),
						'contact_tab' => array(
							'title'   => esc_html__( 'Contact Settings', 'slz' ),
							'type'    => 'tab',
							'options' => array(
								'enable-contact' => array(
									'label'        => __( 'Button Contact?', 'slz' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'show',
										'label' => __( 'Show', 'slz' )
									),
									'left-choice'  => array(
										'value' => 'hide',
										'label' => __( 'Hide', 'slz' )
									),
									'value'        => 'hide',
								),
								'contact-text'   => array(
								    'type'  => 'text',
								    'label' => __('Button Text', 'slz'),
								),
								'contact-form' =>	array(
								    'type'    => 'select',
								    'label'   => esc_html__('Contact Form', 'slz'),
								    'desc'  => __('Choose contact from plugin "Contact Form 7"', 'slz'),
								    'choices' => $contact_form,
								),
							)
						),
						'other_tab' => array(
							'title'   => esc_html__( 'Other Settings', 'slz' ),
							'type'    => 'tab',
							'options' => array(
								'add_shortcode'   => array(
								    'type'  => 'textarea',
								    'label' => __('Add Shortcode', 'slz'),
								    'desc'  => __('Paste any shortcode what you want to display on sub header', 'slz'),
								),
							)
						),
					),
				),
				'show_borders' => false,
			),
			'adspot' 	=>	array(
			    'type'  => 'select',
			    'label' => __('Select Adspot', 'slz'),
			    'desc'  => __('Select adspot for ads banner.', 'slz'),
			    'choices' => array_merge( array( '' => '-- Choose adspot --' ), SLZ_Com::get_advertisement_list() ),
			),
	    ),
	    'show_borders' => true,
	),
	'topbar-box' => array(
	    'type' => 'box',
	    'title' => __('Topbar Settings', 'slz'),
	    'options' => array(
	        'enable-header-top-bar'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'selected-value' => array(
						'label'        => __( 'Header Top Bar', 'slz' ),
						'desc'         => __( 'Enable the header top bar?', 'slz' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => __( 'Yes', 'slz' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => __( 'No', 'slz' )
						),
						'value'        => 'no',
					)
				),
				'choices'      => array(
					'yes' => array(
						'styling' => array(
							'type'          => 'popup',
							'attr'          => array( 'class' => 'slz-advanced-button' ),
							'label'         => __( 'Custom Style', 'slz' ),
							'desc'          => __( 'Change the style of topbar', 'slz' ),
							'button'        => __( 'Styling', 'slz' ),
							'size'          => 'medium',
							'popup-options' => array(
								'bg-color'     => array(
									'label'   => __( 'Background Color', 'slz' ),
									'desc'    => __( "Select the header's top bar background color", "slz" ),
									'value'   => '',
									'choices' => $palette_color,
									'type'    => 'color-palette'
								),
								'bg-image'	=>	array(
								    'type'  => 'upload',
								    'label' => __('Background Image', 'slz'),
								    'desc'  => __('Upload the background image .png or .jpg', 'slz'),
								    'images_only' => true,
								),
								'bg-attachment' =>	array(
								    'type'    => 'select',
								    'label'   => esc_html__('Background Attachment', 'slz'),
								    'choices' => SLZ_Params::get('option-bg-attachment'),
								),
								'bg-size' =>	array(
								    'type'    => 'select',
								    'label'   => esc_html__('Background Size', 'slz'),
								    'choices' => SLZ_Params::get('option-bg-size'),
								),
								'bg-position' =>	array(
								    'type'    => 'select',
								    'label'   => esc_html__('Background Position', 'slz'),
								    'choices' => SLZ_Params::get('option-bg-position'),
								),
								'border-color'     => array(
									'label'   => __( 'Border Color', 'slz' ),
									'desc'    => __( "Select the header's top bar border color", "slz" ),
									'value'   => '',
									'choices' => $palette_color,
									'type'    => 'color-palette'
								),
								'text-color'      => array(
									'label'   => __( 'Text Color', 'slz' ),
									'desc'    => __( 'Select header\'s top bar text color', 'slz' ),
									'value'   => '',
									'choices' => $palette_color,
									'type'    => 'color-palette'
								),
								'social-color'       => array(
									'label'   => __( 'Social Color', 'slz' ),
									'desc'    => __( 'Select the social icons color', 'slz' ),
									'value'   => '',
									'choices' => $palette_color,
									'type'    => 'color-palette'
								),
								'social-hover-color' => array(
									'label'   => __( 'Social Hover Color', 'slz' ),
									'desc'    => __( 'Select the social icons hover color', 'slz' ),
									'value'   => '',
									'choices' => $palette_color,
									'type'    => 'color-palette'
								),
								'social-icon-size'           => array(
									'type'  => 'short-text',
									'label' => __( 'Social Icon Size', 'slz' ),
									'desc'  => __( 'Enter icon size in pixels. Ex: 16', 'slz' ),
									'value' => '16',
								),
							)
						),
						'left-position'            => array(
							'label'  => __( 'Left Content', 'slz' ),
							'type'   => 'addable-option',
							'option' => array(
								'type' => 'select',
								'choices' => array(
									'menu'		=>	__('Menu', 'slz'),
									'social'	=>	__('Social Profile', 'slz'),
									'icon'		=>	__('Customize Icon', 'slz'),
									'button'	=>	__('Button', 'slz'),
								),
							),
							'value'  => array( 'menu' ),
							'desc'   => __( 'Choose content will be show in topbar left.',
								'slz' ),
						),
						'right-position'            => array(
							'label'  => __( 'Right Content', 'slz' ),
							'type'   => 'addable-option',
							'option' => array(
								'type' => 'select',
								'choices' => array(
									'menu'		=>	__('Menu', 'slz'),
									'social'	=>	__('Social Profile', 'slz'),
									'icon'		=>	__('Customize Icon', 'slz'),
									'button'	=>	__('Button', 'slz'),
								),
							),
							'value'  => array( 'social' ),
							'desc'   => __( 'Choose content will be show in topbar right.',
								'slz' ),
						),
						'menu' 	=>	array(
						    'type'  => 'select',
						    'attr'	=>	array('data-saved-value' => ( !empty ( $menu_locations['top-nav'] ) ? $menu_locations['top-nav'] : '')),
						    'label' => __('Select Menu', 'slz'),
						    'desc'  => __('Select menu for topbar menu. This changes will be apply for all headers.', 'slz'),
						    'choices' => $regist_menu,
						    'value'	=> ( !empty ( $menu_locations['top-nav'] ) ? $menu_locations['top-nav'] : '')
						),
						'customize-icon'   => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'icon-display' 	=>	array(
								    'type'  => 'select',
								    'label' => __('Customize Icon', 'slz'),
								    'desc'  => __('Select option to choose how to display the customize icon.', 'slz'),
								    'choices' => array(
								    	'icon'		=>	__('Show icon only', 'slz'),
								    	'text'		=>	__('Show text only', 'slz'),
								    	'both'		=>	__('Show text and icon', 'slz'),
								    ),
								    'value'	=> ''
								)
							),
							'choices'      => array(
								'both' => array(
									'text-position' => array(
										'label'        => __( 'Text Position', 'slz' ),
										'desc'         => __( 'Select your prefered text position', 'slz' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'right',
											'label' => __( 'Right', 'slz' )
										),
										'left-choice'  => array(
											'value' => 'left',
											'label' => __( 'Left', 'slz' )
										),
										'value'        => 'right',
									),
								),
							),
							'show_borders' => true,
						),
						'button' => array(
							'type'          => 'popup',
							'attr'          => array( 'class' => 'slz-advanced-button' ),
							'label'         => __( 'Button Style', 'slz' ),
							'desc'          => __( 'Change the style for button', 'slz' ),
							'button'        => __( 'Styling', 'slz' ),
							'size'          => 'medium',
							'popup-options' => array(
								'btn-text'     => array(
									'label'   => __( 'Button Text', 'slz' ),
									'type'    => 'text'
								),
								'btn-link'     => array(
									'label'   => __( 'Button Link', 'slz' ),
									'type'    => 'text'
								),
								'bg-color'     => array(
									'label'   => __( 'Button Background Color', 'slz' ),
									'type'    => 'rgba-color-picker'
								),
								'bg-hv-color'     => array(
									'label'   => __( 'Button Background Hover Color', 'slz' ),
									'type'    => 'rgba-color-picker'
								),
								'text-color'      => array(
									'label'   => __( 'Button Text Color', 'slz' ),
									'type'    => 'rgba-color-picker'
								),
								'text-hv-color'      => array(
									'label'   => __( 'Button Text Hover Color', 'slz' ),
									'type'    => 'rgba-color-picker'
								),
								'bd-color'     => array(
									'label'   => __( 'Border Color', 'slz' ),
									'type'    => 'rgba-color-picker'
								),
								'bd-hv-color'     => array(
									'label'   => __( 'Border Hover Color', 'slz' ),
									'type'    => 'rgba-color-picker'
								),
							),
						),

					),
				),
				'show_borders' => true,
			),
	    ),
	    'show_borders' => true,
	),
	'other-box' => array(
	    'type' => 'box',
	    'title' => __('Other Settings', 'slz'),
	    'options' => array(
	        'search-group'      => array(
				'type'    => 'group',
				'options' => array(
					'search-group-styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'search-group-styling',
							'class'             => 'slz-advanced-button'
						),
						'type'          => 'popup',
						'label'         => __( 'Custom Style', 'slz' ),
						'desc'          => __( 'Change the style / typography of search box', 'slz' ),
						'button'        => __( 'Styling', 'slz' ),
						'size'          => 'medium',
						'popup-options' => array(
							'icon-class' => array(
								'type'  => 'icon',
								'value' => '',
								'label' => __( 'Search Icon', 'slz' )
							),
							'bg-color' => array(
								'label'   => __( 'Background Color', 'slz' ),
								'desc'    => __( 'Select the background color for search box', 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
							'text-color' => array(
								'label'   => __( 'Text Color', 'slz' ),
								'desc'    => __( 'Select the text color for search box', 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							)
						)
					),
					'enable-search' => array(
						'attr'    => array( 'class' => 'search-group-styling' ),
						'type'         => 'switch',
						'value'        => 'no',
						'label'        => __( 'Search Box', 'slz' ),
						'desc'         => __( 'Enable search box ?', 'slz' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => __( 'Disable', 'slz' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => __( 'Enable', 'slz' ),
						)
					),
				)
			),
	        'breaking-news-group' => $breaking_news_arr,
	    ),
	    'show_borders' => true,
	),
);