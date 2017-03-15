<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'item_list' );

$icon_options = $shortcode->get_icon_library_options();

$params = array(
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color', 'seogrow' ),
		'param_name'  => 'icon_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom icon color.', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Text Info', 'seogrow' ),
		'param_name'  => 'text',
		'value'       => '',
		'description' => esc_html__( 'Please input text to show.', 'seogrow' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Text Color', 'seogrow' ),
		'param_name'  => 'text_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom text color.', 'seogrow' )
	),
	array(
		'type'        => 'textarea',
		'heading'     => esc_html__( 'Description', 'seogrow' ),
		'param_name'  => 'description',
		'value'       => '',
		'description' => esc_html__( 'Please input description to show.', 'seogrow' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Description Color', 'seogrow' ),
		'param_name'  => 'description_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom description color.', 'seogrow' )
	),
);

$vc_options = array(
	array(
		'type'       => 'param_group',
		'heading'    => esc_html__( 'Add New Item', 'seogrow' ),
		'param_name' => 'item_list',
		'params'     => array_merge( $icon_options, $params )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color', 'seogrow' ),
		'param_name'  => 'icon_color',
		'value'       => '',
		'description' => esc_html__( 'Set color for all item.', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Margin Top', 'seogrow' ),
		'param_name'  => 'margin_top',
		'value'       => '8',
		'description' => esc_html__( 'Please input margin top between items. Exp: If want to margin 8px then input 8', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Margin Bottom', 'seogrow' ),
		'param_name'  => 'margin_bottom',
		'value'       => '8',
		'description' => esc_html__( 'Please input margin bottom between items. Exp: If want to margin 8px then input 8', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'seogrow' )
	)
);