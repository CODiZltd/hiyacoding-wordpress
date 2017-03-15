<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden. This theme requires the Solazu Unyson plugin installed!' );
}
$site_default_colors = (array)slz()->theme->get_config('site_default_colors');
// This is config follow to theme
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
$skin_box = array(
	'title'   => esc_html__( 'Styling Settings', 'seogrow' ),
	'type'    => 'box',
	'options' => array(
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
);
$link_box = array(
	'title'   => esc_html__( 'Link Settings', 'seogrow' ),
	'type'    => 'box',
	'options' => array(
		'styling-link-colors' => array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'custom-style' => array(
					'type'         => 'switch',
					'value'        => 'default',
					'label'        => esc_html__( 'Custom Link Colors', 'seogrow' ),
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
				'custom' => array(
					'regular-color' => array(
						'label'   => esc_html__( 'Regular Color', 'seogrow' ),
						'type'    => 'color-picker',
						'value'   => '#333333',
						'desc'    => esc_html__( 'Select a color for link', 'seogrow' ),
					),
					'hover-color'  => array(
						'label'   => esc_html__( 'Hover Color', 'seogrow' ),
						'desc'    => esc_html__( 'Select a color for link hover', 'seogrow' ),
						'value'   => '#31c290',
						'type'    => 'color-picker',
					),
					'active-color'  => array(
						'label'   => esc_html__( 'Active Color', 'seogrow' ),
						'desc'    => esc_html__( 'Select a color for link active', 'seogrow' ),
						'value'   => '#31c290',
						'type'    => 'color-picker',
					),
				),
			),
		),
	)
);
$font_box = array(
	'label' => esc_html__( 'Typography', 'seogrow' ),
	'type'  => 'typography-v2',
	'desc'  => '',
	'value' => array(
		'family'        => 'Noto Sans',
		// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
		'variation'      => 'regular',
		'size'           => 15,
		'line-height'    => 24,
		'letter-spacing' => '',
		'color'          => '#777777'
	),
	'components' => array(
		'family'         => true,
		'size'           => true,
		'line-height'    => true,
		'letter-spacing' => true,
		'color'          => true,
		'subset'         => false,
	),
);
$setting_array = array(
	'body' => esc_html__( 'Body Text', 'seogrow' ),
	'paragraph' => esc_html__( 'Paragraph', 'seogrow' ),
	'h1' => esc_html__( 'H1 Text', 'seogrow' ),
	'h2' => esc_html__( 'H2 Text', 'seogrow' ),
	'h3' => esc_html__( 'H3 Text', 'seogrow' ),
	'h4' => esc_html__( 'H4 Text', 'seogrow' ),
	'h5' => esc_html__( 'H5 Text', 'seogrow' ),
	'h6' => esc_html__( 'H6 Text', 'seogrow' ),
);
$typo_options = array();
foreach($setting_array as $key => $label ) {
	$typo_options['typo-' . $key] = array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'custom-style' => array(
				'type'         => 'switch',
				'value'        => 'default',
				'label'        => $label,
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
			'custom' => array(
				'typography' => $font_box,
			),
		)
	);
}
$typography_content_box = array(
	'title'   => esc_html__( 'Typography Settings', 'seogrow' ),
	'type'    => 'box',
	'options' => $typo_options,
);
$options = array(
	'title'   => esc_html__( 'Styling / Typography', 'seogrow' ),
	'type'    => 'tab',
	'options' => array(
		'skin-content-box' => $skin_box,
		'link-content-box' => $link_box,
		'typography-content-box' => $typography_content_box,
	),
);