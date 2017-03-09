<?php
$sort_by = SLZ_Params::get('sort-other');

$yes_no  = array(
	esc_html__('Yes', 'seogrow')			=> 'yes',
	esc_html__('No', 'seogrow')			=> 'no',
);
$method = array(
	esc_html__( 'Category', 'seogrow' )	=> 'cat',
	esc_html__( 'Testimonial', 'seogrow' ) => 'testimonial'
);

$args = array('post_type'     => 'slz-testimonial');
$options = array('empty'      => esc_html__( '-All Testimonial-', 'seogrow' ) );
$testimonials = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy = 'slz-testimonial-cat';
$params_cat = array('empty'   => esc_html__( '-All Testimonial Categories-', 'seogrow' ) );
$testimonial_cat = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );

$animation  = array(
	esc_html__('Slide', 'seogrow')		=> '0',
	esc_html__('Fade', 'seogrow')		=> '1'
);


$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'testimonial' );

/* layout */
$layouts = array(
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Layout', 'seogrow' ),
		'admin_label'   => true,
		'param_name'    => 'layout',
		'value'         => $shortcode->get_layouts(),
		'std'           => 'layout-1',
		'description'   => esc_html__( 'Choose layout will be displayed.', 'seogrow' ),

	),

    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Style', 'seogrow' ),
        'param_name'  => 'style',
        'value'       => $shortcode->get_styles(),
        'std'         => '1',
        'description' => esc_html__( 'Choose style to show', 'seogrow' ),
        'dependency'  => array(
            'element'   => 'layout',
            'value'     => array( 'layout-5' )
        ),
    ),

);

/* layout options */
$layouts_option = $shortcode->get_layout_options();

/* title options */
$title = array(

    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Shortcode Title', 'seogrow' ),
        'param_name'  => 'sc_title',
        'value'       => '',
        'description' => esc_html__( 'Title. If it blank the will not have a title', 'seogrow' )
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Shortcode Title Color', 'seogrow' ),
        'param_name'  => 'sc_title_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom title text color.', 'seogrow' )
    ),
);
/* params */
$params = array(
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Show Position ?', 'seogrow' ),
		'param_name'  	=> 'show_position',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'If choose Yes, block will be show position.', 'seogrow' ),
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Show Description ?', 'seogrow' ),
		'param_name'  	=> 'show_description',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'If choose Yes, block will be show description.', 'seogrow' ),
	),
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Avatar Image', 'seogrow' ),
        'param_name'  => 'show_image_1',
        'value'       => array(
            esc_html__('Show Feature Image', 'seogrow') => '2',
            esc_html__('Show Icon', 'seogrow') => '1',
            esc_html__('Show Thumbnail Image', 'seogrow') => '0'
        ),
        'std'         => '',
        'description' => esc_html__( 'Select image type for Avatar.', 'seogrow' ),
    	'dependency'  => array(
    		'element'   => 'layout',
    		'value_not_equal_to'     => array( 'layout-5' )
    	),
    ),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Limit Posts', 'seogrow' ),
		'param_name'  => 'limit_post',
		'value'       => '-1',
		'description' => esc_html__( 'Add limit posts per page. Set -1 or empty to show all. The number of posts to display. If it blank the number posts will be the number from Settings -> Reading', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Offset Post', 'seogrow' ),
		'param_name'  => 'offset_post',
		'value'       => '',
		'description' => esc_html__( 'Enter offset to pass over posts. If you want to start on record 6, using offset 5', 'seogrow' )
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Sort By', 'seogrow' ),
		'param_name'  => 'sort_by',
		'value'       => $sort_by,
		'description' => esc_html__( 'Select order to display list properties.', 'seogrow' )
	),
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Addition Image', 'seogrow' ),
        'param_name'  => 'show_image_2',
        'value'       => array(
            esc_html__('Show Feature Image', 'seogrow') => '2',
            esc_html__('Show Icon', 'seogrow') => '1',
            esc_html__('Show Thumbnail Image', 'seogrow') => '0'
        ),
        'std'         => '0',
        'description' => esc_html__( 'Select image for image above title.', 'seogrow' ),
        'dependency'  => array(
            'element'   => 'layout',
            'value'     => array( 'layout-2' )
        ),
    ),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Display By', 'seogrow' ),
		'param_name'  => 'method',
		'value'       => $method,
		'description' => esc_html__( 'Choose testimonial category or special testimonials to display', 'seogrow' ),
		'group'       	=> esc_html__('Filter', 'seogrow'),
	),
	array(
		'type'        => 'param_group',
		'heading'     => esc_html__( 'Category', 'seogrow' ),
		'param_name'  => 'list_category',
		'params'     => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Category', 'seogrow' ),
				'param_name'  => 'category_slug',
				'value'       => $testimonial_cat,
				'description' => esc_html__( 'Choose special category to filter', 'seogrow'  )
			),
		),
		'value'       => '',
		'description' => esc_html__( 'Choose Testimonial Category.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'method',
			'value'     => array( 'cat' )
		),
		'group'       	=> esc_html__('Filter', 'seogrow'),
	),
	array(
		'type'            => 'param_group',
		'heading'         => esc_html__( 'Testimonials', 'seogrow' ),
		'param_name'      => 'list_post',
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Testimonial', 'seogrow' ),
				'param_name'  => 'post',
				'value'       => $testimonials,
				'description' => esc_html__( 'Choose special testimonial to show',  'seogrow')
			),
			
		),
		'value'           => '',
		'description'     => esc_html__( 'Default display All Testimonial if no testimonial is selected and Number testimonial is empty.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'method',
			'value'     => array( 'testimonial' )
		),
		'group'       	=> esc_html__('Filter', 'seogrow'),
	),
);

/*extra class*/
$extra_class = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'seogrow' )
	),
);

/* custom css */
$custom_css = array(
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Color', 'seogrow' ),
		'param_name'  => 'title_color',
		'description' => esc_html__( 'Please choose title color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Position Color', 'seogrow' ),
		'param_name'  => 'position_color',
		'description' => esc_html__( 'Please choose position color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Description Color', 'seogrow' ),
		'param_name'  => 'description_color',
		'description' => esc_html__( 'Please choose description color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color', 'seogrow' ),
		'param_name'  => 'icon_color',
		'description' => esc_html__( 'Please choose icon color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
		'dependency'  => array(
			'element'   => 'show_image_1',
			'value'     => array( '1' )
		),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Dots Color', 'seogrow' ),
		'param_name'  => 'dots_color',
		'dependency'    => array(
			'element'   => 'show_dots',
			'value'     => array( 'yes' )
		),
		'description' => esc_html__( 'Please choose dots color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Arrows Color', 'seogrow' ),
		'param_name'  => 'arrows_color',
		'dependency'    => array(
			'element'   => 'show_arrows',
			'value'     => array( 'yes' )
		),
		'description' => esc_html__( 'Please choose arrows color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Arrows Hover Color', 'seogrow' ),
		'param_name'  => 'arrows_hv_color',
		'dependency'    => array(
			'element'   => 'show_arrows',
			'value'     => array( 'yes' )
		),
		'description' => esc_html__( 'Please choose arrows background  color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Arrows Background Color', 'seogrow' ),
		'param_name'  => 'arrows_bg_color',
		'dependency'    => array(
			'element'   => 'show_arrows',
			'value'     => array( 'yes' )
		),
		'description' => esc_html__( 'Please choose arrows background  color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Arrows Background Hover Color', 'seogrow' ),
		'param_name'  => 'arrows_bg_hv_color',
		'dependency'    => array(
			'element'   => 'show_arrows',
			'value'     => array( 'yes' )
		),
		'description' => esc_html__( 'Please choose arrows background  color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),
);
/* custom slide */
$custom_slide = array(
    array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Show Dots ?', 'seogrow' ),
		'param_name'  	=> 'show_dots',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'If choose Yes, block will be show dots.', 'seogrow' ),
		'group'       => esc_html__('Slide Custom', 'seogrow'),
		'dependency'  => array(
			'element'   => 'layout',
			'value_not_equal_to'     => array( 'layout-3' )
		),
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Show Arrow ?', 'seogrow' ),
		'param_name'  	=> 'show_arrows',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'If choose Yes, block will be show arrow.', 'seogrow' ),
		'group'       => esc_html__('Slide Custom', 'seogrow'),
		'dependency'  => array(
			'element'   => 'layout',
			'value_not_equal_to'     => array( 'layout-3' )
		),
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Is Auto Play ?', 'seogrow' ),
		'param_name'  	=> 'slide_autoplay',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to slide auto play.', 'seogrow' ),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Is Loop Infinite ?', 'seogrow' ),
		'param_name'  	=> 'slide_infinite',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to slide loop infinite.', 'seogrow' ),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Speed Slide', 'seogrow' ),
		'param_name'    => 'slide_speed',
		'value'			=> '',
		'description'   => esc_html__( 'Enter number value. Unit is millisecond. Example: 600.', 'seogrow' ),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Animation?', 'seogrow' ),
		'param_name'    => 'animation',
		'value'			=> $animation,
		'description'   => esc_html__( 'Choose a animation', 'seogrow' ),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	)
);

$vc_options = array_merge(
	$layouts,
    $title,
	$params,
	$layouts_option,
	$custom_css,
	$custom_slide,
	$extra_class
);