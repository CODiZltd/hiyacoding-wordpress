<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'working-type-bg-color' => array(
		'label'   => esc_html__( 'Background Color', 'seogrow' ),
		'desc'    => esc_html__( 'Select the background color(be used in shortcode)', 'seogrow' ),
		'value'   => '',
		'choices' => SLZ_Com::get_palette_color(),
		'type'    => 'color-palette'
	),
	'working-type-text-color'  => array(
		'label'   => esc_html__( 'Text Color', 'seogrow' ),
		'desc'    => esc_html__( 'Select the text color(be used in shortcode)', 'seogrow' ),
		'value'   => '',
		'choices' => SLZ_Com::get_palette_color(),
		'type'    => 'color-palette'
	),
	
);