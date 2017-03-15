<?php 
 $vc_options = array(
    array(
        'type'       => 'param_group',
        'heading'    => esc_html__( 'List of Feature', 'seogrow' ),
        'param_name' => 'feature_list_slider',
        'params'     => array(
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'seogrow' ),
                'param_name'  => 'title',
                'description' => esc_html__( 'Please input title of item', 'seogrow' )
            ),
            array(
                'type'        => 'textarea',
                'heading'     => esc_html__( 'Description', 'seogrow' ),
                'param_name'  => 'description',
                'description' => esc_html__( 'Please input description of item', 'seogrow' )
            ),
            array(
                'type'           => 'attach_image',
                'heading'        => esc_html__( 'Image', 'seogrow' ),
                'param_name'     => 'slider_img',
                'description'    => esc_html__('upload an image into this item.', 'seogrow'),
            ),
        ),
        'value'       => '',
    ),
    array(
        'type'          => 'colorpicker',
        'heading'       => esc_html__( 'Slide Arrow Color', 'seogrow' ),
        'param_name'    => 'arrows_color',
        'value'         => '',
        'description'   => esc_html__( 'Choose color slide arrow for slide.', 'seogrow' ),
       'group'       => esc_html__('Custom CSS', 'seogrow'),
    ),
    array(
        'type'          => 'colorpicker',
        'heading'       => esc_html__( 'Slide Arrow Color Hover', 'seogrow' ),
        'param_name'    => 'arrows_hv_color',
        'value'         => '',
        'description'   => esc_html__( 'Choose color slide arrow for slide when hover.', 'seogrow' ),
        'group'       => esc_html__('Custom CSS', 'seogrow'),
    ),
);