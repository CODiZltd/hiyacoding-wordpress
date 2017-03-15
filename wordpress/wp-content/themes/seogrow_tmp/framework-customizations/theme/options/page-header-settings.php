<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$align = array(
	'left'   => esc_html__('Left','seogrow'),
	'right'  => esc_html__('Right','seogrow'),
	'center' => esc_html__('Center','seogrow')
	);

$general_box = array(
	'general-content-box' => array(
		'title'   => esc_html__( 'Area Setting', 'seogrow' ),
		'type'    => 'box',
		'options' => array(
			'bg-color'    => array(
				'label'   => esc_html__( 'Background Color', 'seogrow' ),
				'desc'    => esc_html__( "Select the page header background color", 'seogrow' ),
				'value'   => '',
				'choices' => SLZ_Com::get_palette_color(),
				'type'    => 'color-palette'
			),
			'bg-image'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'bg-image-type' => array(
						'type'  => 'radio',
						'value' => 'upload-image',
						'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
						'label' => esc_html__('Background Image', 'seogrow'),
						'choices' => array(
							'upload-image'  => esc_html__('Upload Image', 'seogrow'),
							'feature-image' => esc_html__('Featured Image', 'seogrow'),
						),
						'inline' => true,
					),
				),
				'choices'      => array(
					'upload-image' => array(
						'background-image' => array(
							'label'   => esc_html__( 'Image', 'seogrow' ),
							'type'    => 'background-image',
							'value'   => 'none',
							'desc'    => esc_html__( 'Upload an image to make background image', 'seogrow' ),
						),
					)
				),
			),
			'bg-attachment' => array(
				'type'    => 'select',
				'label'   => esc_html__('Background Attachment', 'seogrow'),
				'choices' => SLZ_Params::get('option-bg-attachment'),
			),
			'bg-size' => array(
				'type'    => 'select',
				'label'   => esc_html__('Background Size', 'seogrow'),
				'choices' => SLZ_Params::get('option-bg-size'),
			),
			'bg-position' => array(
				'type'    => 'select',
				'label'   => esc_html__('Background Position', 'seogrow'),
				'choices' => SLZ_Params::get('option-bg-position'),
			),
			'text-align'  => array(
				'type'    => 'select',
				'label'   => esc_html__('Page Header Align', 'seogrow'),
				'choices' => $align,
			),
			'height'    => array(
				'type'  => 'short-text',
				'label' => esc_html__( 'Page Header Height', 'seogrow' ),
				'desc'  => esc_html__( 'Enter heigth in pixels. Ex:50 ', 'seogrow' ),
				'value' => '50',
			),
		),
	),
);
$general_title_box = array(
	'title-content-box' => array(
		'title'   => esc_html__( 'Title Setting', 'seogrow' ),
		'type'    => 'box',
		'options' => array(
			'general-pagetitle-title'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
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
				),
				'choices'      => array(
					'enable' => array(
						'type-of-title' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'title-type' => array(
									'type'  => 'radio',
									'value' => 'title',
									'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label' => esc_html__('Choose Title', 'seogrow'),
									'choices' => array(
										'title'      => esc_html__('Page Title','seogrow'),
										'custom'     => esc_html__('Custom','seogrow'),
									),
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
						'title-typography' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Styling', 'seogrow' ),
							'value' => array(
								'size'   => 28,
								'color'  => '#fff'
							),
							'components' => array(
								'family' => false,
							),
						),
					),
				),
			),
		),
	),
);
$post_title_box = array(
	'title-content-box' => array(
		'title'   => esc_html__( 'Title Setting', 'seogrow' ),
		'type'    => 'box',
		'options' => array(
			'general-pagetitle-title'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
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
				),
				'choices'      => array(
					'enable' => array(
						'type-of-title' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'title-type' => array(
									'type'  => 'radio',
									'value' => 'level',
									'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label' => esc_html__('Choose Title', 'seogrow'),
									'choices' => array(
										'title'      => esc_html__( 'Post Title','seogrow' ),
										'level'      => esc_html__( 'Category','seogrow' ),
										'custom'     => esc_html__( 'Custom','seogrow' ),
									),
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
						'title-typography' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Styling', 'seogrow' ),
							'value' => array(
								'size'   => 28,
								'color'  => '#fff'
							),
							'components' => array(
								'family' => false,
							),
						),
					),
				),
			),
		),
	),
);
$breadcrumb_box = array(
	'breadcrumb-content-box'	=> array(
		'title'   => esc_html__( 'Breadcrumb Setting', 'seogrow' ),
		'type'    => 'box',
		'options' => array(
			'general-pagetitle-bc'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
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
				'choices'      => array(
					'enable' => array(
						'breadcrumb' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Breadcrumb Styling', 'seogrow' ),
							'value' => array(
								'size'   => 14,
								'color'  => 'rgba(255,255,255,0.7)'
							),
							'components' => array(
								'family' => false,
							),
						),
						'breadcrumb-active' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Breadcrumb Active Styling', 'seogrow' ),
							'value' => array(
								'size'   => 14,
								'color'  => '#fff'
							),
							'components' => array(
								'family' => false,
							),
						),
					),
				),
			),
		),
	)
);

$general_tab = array(
	'title'   => esc_html__( 'General', 'seogrow' ),
	'type'    => 'tab',
	'options' => array(
		'general-pagetitle'   => array(
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
					$general_box,
					$general_title_box,
					$breadcrumb_box
				),
			),
		),
	),
); // general tab

$post_tab = array(
	'title'   => esc_html__( 'Posts', 'seogrow' ),
	'type'    => 'tab',
	'options' => array(
		'post-pagetitle'   => array(
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
					$general_box,
					$post_title_box,
					$breadcrumb_box
				),
			),
		),
	),
); // post tab

$options_tab = array(
	$general_tab,
	$post_tab,
); // option tab
$active_posttype_ext = slz()->theme->get_config('active_posttype_ext');
$option_title = array(
	'slz-portfolio'   => esc_html__( 'Portfolio', 'seogrow' ),
	'slz-team'        => esc_html__( 'Team', 'seogrow' ),
	'slz-service'     => esc_html__( 'Service', 'seogrow'),
	'slz-recruitment' => esc_html__( 'Recruitment', 'seogrow'),
);
foreach( $active_posttype_ext as $option => $extension ) {
	// check extension is activated
	if( ! slz_ext($extension ) ) {
		continue;
	}
	$posttype = str_replace( 'slz-', '', $option );
	$options_tab[] =  array(
		$posttype.'-tab' => array(
			'title'   => $option_title[$option],
			'type'    => 'tab',
			'options' => array(
				$option.'-pagetitle' => array(
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
							),
						),
					),
					'choices'      => array(
						'enable' => array(
							$general_box,
							$post_title_box,
							$breadcrumb_box
						),
					),
				),
			),
		),
	);
}

$options = array(
	'page-title' => array(
		'title'   => esc_html__( 'Page Header', 'seogrow' ),
		'type'    => 'tab',
		'options' => $options_tab,
	)
);
