<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'main_title' );

$align = SLZ_Params::get('align');

$style = array();
if( $style_cfg = $shortcode->get_styles() ) {
	$style = array(
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Style', 'seogrow' ),
			'param_name'  => 'style',
			'value'       => $style_cfg ,
			'description' => esc_html__( 'Choose style to display.', 'seogrow' )
		),
	);
}
$params = array(
    array(
        'type'        => 'textfield',
        'admin_label' => true,
        'heading'     => esc_html__( 'Title', 'seogrow' ),
        'param_name'  => 'title',
        'description' => esc_html__( 'Title. If it blank the will not have a title', 'seogrow' )
    ),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Sub Title', 'seogrow' ),
        'param_name'  => 'subtitle',
        'value'       => '',
        'description' => esc_html__( 'Subtitle . If it blank will not have a subtitle', 'seogrow' )
    ),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Align', 'seogrow' ),
		'param_name'  => 'align',
		'value'       => $align ,
		'std'         => 'left',
		'description' => esc_html__( 'Block title align', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Title', 'seogrow' ),
		'param_name'  => 'extra_title',
		'value'       => '',
		'description' => esc_html__( 'Subtitle . If it blank will not have a extra title', 'seogrow' )
	),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Title Color', 'seogrow' ),
        'param_name'  => 'title_color',
        'description' => esc_html__( 'Choose a custom color for title.', 'seogrow' ),
        'group'       => esc_html__('Custom Options', 'seogrow'),
    ),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Sub Title Color', 'seogrow' ),
		'param_name'  => 'subtitle_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom color for sub title.', 'seogrow' ),
		'group'       => esc_html__('Custom Options', 'seogrow'),
	),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Line Color', 'seogrow' ),
        'param_name'  => 'line_color',
        'value'       => '',
        'dependency' => array(
            'element'   => 'style',
            'value'     => array('', 'style-2'),
        ),
        'description' => esc_html__( 'Choose a custom color for line.', 'seogrow' ),
        'group'       => esc_html__('Custom Options', 'seogrow'),
    ),
	array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Show Icon or Image', 'seogrow' ),
        'param_name'  => 'show_icon',
        'value'       => array(
            esc_html__('Display None', 'seogrow') => '2',
            esc_html__('Show Icon', 'seogrow') => '1',
            esc_html__('Show Image', 'seogrow') => '0'
        ),
        'description' => esc_html__( 'Show Icon or Show Image', 'seogrow' )
    ),
  array(
      'type' => 'iconpicker',
      'heading' => esc_html__( 'Icon', 'seogrow' ),
      'param_name' => 'icon_fontawesome',
      'settings' => array(
          'iconsPerPage' => 4000,
      ),
      'dependency' => array(
          'element' => 'show_icon',
          'value' => '1',
      ),
      'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
  ),
  array(
      'type'		 =>	'attach_image',
      'heading'    => esc_html__( 'Image', 'seogrow' ),
      'param_name' => 'image',
      'description' => esc_html__( 'Upload your image', 'seogrow' ),
      'dependency' => array(
          'element' => 'show_icon',
          'value' => '0',
      ),
  ),

	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Extra Title Color', 'seogrow' ),
		'param_name'  => 'extra_title_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom color for extra title.', 'seogrow' ),
		'group'       => esc_html__('Custom Options', 'seogrow'),
	),
	array(
		'type'        => 'css_editor',
		'heading'     => esc_html__( 'CSS box', 'seogrow' ),
		'param_name'  => 'css',
		'group'       => esc_html__( 'Design Options', 'seogrow' ),
	),
);

$extra_class = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to button', 'seogrow' )
	)
);

$vc_options = array_merge( 
	$style,
	$params,
	$extra_class
);