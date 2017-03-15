<?php

$styles = array(
	esc_html__('Horizontal','seogrow') => '',
	esc_html__('Vertical','seogrow')   => 'style-vertical'
);

$vc_options = array(
	array(
		'type'            => 'dropdown',
		'heading'         => esc_html__( 'Style', 'seogrow' ),
		'param_name'      => 'style-3',
		'value'           => $styles,
		'description'     => esc_html__( 'Choose style to display on frontend.', 'seogrow' ),
	),
	
);