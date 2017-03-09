<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'testimonial' );
$vc_options = array(
    array(
        'type'          => 'textfield',
        'heading'     => esc_html__( 'Slides To Show ', 'seogrow' ),
        'param_name'  => 'num_item_show',
        'value'       => '',
        'description' => esc_html__( 'Please input number of item show in slider.', 'seogrow' ),
        'group'       => esc_html__('Slide Custom', 'seogrow'),
    ),
);