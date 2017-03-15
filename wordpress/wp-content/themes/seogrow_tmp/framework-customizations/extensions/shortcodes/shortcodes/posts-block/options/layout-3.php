<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'posts_block' );

$vc_options = array(
	
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Columns', 'seogrow' ),
		'param_name'  => 'list_column_3',
		'value'       => $shortcode->get_config('column'),
		'description' => esc_html__( 'Choose number of column.', 'seogrow' ),
		'group'       => esc_html__( 'List Layout', 'seogrow' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Excerpt?', 'seogrow' ),
		'param_name'  => 'list_show_excerpt_3',
		'value'       => $shortcode->get_config('yes_no'),
		'std'         => 'yes',
		'description' => esc_html__( 'Choose if want to show excerpt', 'seogrow' ),
		'group'       => esc_html__( 'List Layout', 'seogrow' ),
	),
);