<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'service_list' );

$layouts = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Layout', 'seogrow' ),
		'admin_label' => true,
		'param_name'  => 'layout',
		'value'       => $shortcode->get_layouts(),
		'std'         => 'layout-1',
		'description' => esc_html__( 'Choose layout to show.', 'seogrow' )
	)
);

$description     = array(
	esc_html__( 'Description meta', 'seogrow' ) => 'des',
	esc_html__( 'Excerpt', 'seogrow' )	        => 'excerpt',
	esc_html__( 'Hide', 'seogrow' )	            => 'hide'
);

$layout_options = $shortcode->get_layout_options();

$yes_no  = array(
	esc_html__('Yes', 'seogrow')			     => 'yes',
	esc_html__('No', 'seogrow')		         => 'no'
);
$show_icon  = array(
	esc_html__('Show Icon', 'seogrow')	 => 'icon',
	esc_html__('Show Image', 'seogrow') => 'image',
    esc_html__('Show Featured Images', 'seogrow') => 'feature-image'
);
$column = array(
	esc_html__( 'One', 'seogrow' )   	 	 => '1',
	esc_html__( 'Two', 'seogrow' )   		 => '2',
	esc_html__( 'Three', 'seogrow' ) 		 => '3',
	esc_html__( 'Four', 'seogrow' )  		 => '4'
);
$method = array(
	esc_html__( 'Category', 'seogrow' )	=> 'cat',
	esc_html__( 'Service', 'seogrow' ) 	=> 'service'
);
$sort_by = SLZ_Params::get('sort-other');

$args       = array('post_type' => 'slz-service');
$options    = array('empty'     => esc_html__( '-All Services-', 'seogrow' ) );
$services   = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy   = 'slz-service-cat';
$params_cat = array('empty'   => esc_html__( '-All Service Categories-', 'seogrow' ) );
$categories = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );


$params = array(
	array(
		'type'            => 'dropdown',
		'heading'      	  => esc_html__( 'Show Icon or Image', 'seogrow' ),
		'param_name'  	  => 'show_icon',
		'value'       	  => $show_icon,
		'std'      		  => 'icon',
		'description' 	  => esc_html__( 'Choose show icon or image of service.', 'seogrow' )
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Numerical Order?', 'seogrow' ),
		'param_name'  => 'show_number',
		'description' => esc_html__( 'Displays the number order of each item', 'seogrow' ),
		'dependency'      => array(
			'element'     => 'show_icon',
			'value'       => array( 'icon' )
		)
	),
	array(
		'type'            => 'dropdown',
		'heading'      	  => esc_html__( 'Description', 'seogrow' ),
		'param_name'  	  => 'description',
		'value'       	  => $description,
		'description' 	  => esc_html__( 'Choose what content of service to display.', 'seogrow' )
	),
	array(
		'type'            => 'dropdown',
		'heading'      	  => esc_html__( 'Column', 'seogrow' ),
		'param_name'  	  => 'column',
		'value'       	  => $column,
		'std'      		  => '3',
		'description' 	  => esc_html__( 'Choose number column will be displayed.', 'seogrow' )
	),
	array(
		'type'        	  => 'dropdown',
		'heading'     	  => esc_html__( 'Show Pagination', 'seogrow' ),
		'param_name'  	  => 'pagination',
		'value'       	  => $yes_no,
		'std'      		  => 'no',
		'description' 	  => esc_html__( 'If choose Yes, block will be show pagination.', 'seogrow' ),
		'dependency'      => array(
			'element'     => 'is_carousel',
			'value'       => array( 'no' )
		)
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Button Text', 'seogrow' ),
		'param_name'  => 'btn_content',
		'value'       => 'Read More',
		'description' => esc_html__( 'Enter block button text.', 'seogrow' )
	),
	array(
		'type'            => 'textfield',
		'heading'         => esc_html__( 'Limit Posts', 'seogrow' ),
		'param_name'      => 'limit_post',
		'value'           => '-1',
		'description'     => esc_html__( 'Add limit posts per page. Set -1 or empty to show all.', 'seogrow' )
	),
	array(
		'type'            => 'textfield',
		'heading'         => esc_html__( 'Offset Posts', 'seogrow' ),
		'param_name'      => 'offset_post',
		'value'           => '0',
		'description'     => esc_html__( 'Enter offset to pass over posts. If you want to start on record 6, using offset 5.', 'seogrow' )
	),
	array(
		'type'            => 'dropdown',
		'heading'         => esc_html__( 'Sort By', 'seogrow' ),
		'param_name'      => 'sort_by',
		'value'           => $sort_by,
		'description'     => esc_html__( 'Select order to display list posts.', 'seogrow' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block.', 'seogrow' )
	),
	array(
		'type'            => 'dropdown',
		'heading'         => esc_html__( 'Display By', 'seogrow' ),
		'param_name'      => 'method',
		'value'           => $method,
		'description'     => esc_html__( 'Choose service category or special services to display.', 'seogrow' ),
		'group'        	  => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'            => 'param_group',
		'heading'         => esc_html__( 'Category', 'seogrow' ),
		'param_name'      => 'list_category',
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Category', 'seogrow' ),
				'param_name'  => 'category_slug',
				'value'       => $categories,
				'description' => esc_html__( 'Choose special category to filter.', 'seogrow'  )
			)
		),
		'value'           => '',
		'description'     => esc_html__( 'Choose service category.', 'seogrow' ),
		'dependency'      => array(
			'element'     => 'method',
			'value'       => array( 'cat' )
		),
		'group'       	  => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'            => 'param_group',
		'heading'         => esc_html__( 'Services', 'seogrow' ),
		'param_name'      => 'list_post',
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add service', 'seogrow' ),
				'param_name'  => 'post',
				'value'       => $services,
				'description' => esc_html__( 'Choose special service to show.',  'seogrow'  )
			)
		),
		'value'           => '',
		'dependency'      => array(
			'element'     => 'method',
			'value'       => array( 'service' )
		),
		'description'     => esc_html__( 'Default display all services if no service is selected.', 'seogrow' ),
		'group'       	  => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Icon Color', 'seogrow' ),
		'param_name'      => 'icon_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block icon.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Border Color', 'seogrow' ),
		'param_name'  => 'icon_bd_color',
		'value'       => '',
		'dependency'    => array(
    		'element'   => 'layout',
  			'value'     => array( 'layout-3' )
  		),
		'description' => esc_html__( 'Choose icon border color.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Border Hover Color', 'seogrow' ),
		'param_name'  => 'icon_bd_hv_color',
		'value'       => '',
		'dependency'    => array(
    		'element'   => 'layout',
  			'value'     => array( 'layout-3' )
  		),
		'description' => esc_html__( 'Choose icon border color when hover.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color', 'seogrow' ),
		'param_name'  => 'icon_bg_color',
		'value'       => '',
		'dependency'    => array(
    		'element'   => 'layout',
  			'value'     => array( 'layout-3' )
  		),
		'description' => esc_html__( 'Choose icon background color.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Hover Color', 'seogrow' ),
		'param_name'  => 'icon_bg_hv_color',
		'value'       => '',
		'dependency'    => array(
    		'element'   => 'layout',
  			'value'     => array( 'layout-3' )
  		),
		'description' => esc_html__( 'Choose icon background color when hover.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Title Color', 'seogrow' ),
		'param_name'      => 'title_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block title.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Description Color', 'seogrow' ),
		'param_name'      => 'des_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block description.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Button Color', 'seogrow' ),
		'param_name'      => 'btn_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block button.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Button Hover Color', 'seogrow' ),
		'param_name'      => 'btn_hv_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block button when hover.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Carousel Navigation Color', 'seogrow' ),
		'param_name'      => 'nav_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block navigation.', 'seogrow' ),
		'dependency'      => array(
			'element'     => 'is_carousel',
			'value'       => array( 'yes' )
		),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),

	array(
		'type'        	  => 'dropdown',
		'heading'     	  => esc_html__( 'Is Carousel ?', 'seogrow' ),
		'param_name'  	  => 'is_carousel',
		'value'       	  => $yes_no,
		'std'      		  => 'no',
		'description' 	  => esc_html__( 'If choose Yes, block will be display with carousel style.', 'seogrow'),
		'group'           => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'            => 'dropdown',
		'heading'     	  => esc_html__( 'Show Dots ?', 'seogrow' ),
		'param_name'  	  => 'show_dots',
		'value'       	  => $yes_no,
		'std'      		  => 'yes',
		'description' 	  => esc_html__( 'If choose Yes, block will be show dots.', 'seogrow' ),
		'group'           => esc_html__('Slide Custom', 'seogrow'),
		'dependency'    => array(
			'element'   => 'is_carousel',
			'value'     => array( 'yes' )
		)
	),
	array(
		'type'        	  => 'dropdown',
		'heading'     	  => esc_html__( 'Show Arrow ?', 'seogrow' ),
		'param_name'  	  => 'show_arrows',
		'value'       	  => $yes_no,
		'std'      		  => 'yes',
		'description' 	  => esc_html__( 'If choose Yes, block will be show arrow.', 'seogrow' ),
		'group'           => esc_html__('Slide Custom', 'seogrow'),
		'dependency'    => array(
			'element'   => 'is_carousel',
			'value'     => array( 'yes' )
		)
	),
	array(
		'type'        	  => 'dropdown',
		'heading'     	  => esc_html__( 'Is Auto Play ?', 'seogrow' ),
		'param_name'  	  => 'slide_autoplay',
		'value'       	  => $yes_no,
		'std'      		  => 'yes',
		'description' 	  => esc_html__( 'Choose YES to slide auto play.', 'seogrow' ),
		'group'           => esc_html__('Slide Custom', 'seogrow'),
		'dependency'    => array(
			'element'   => 'is_carousel',
			'value'     => array( 'yes' )
		)
	),
	array(
		'type'        	  => 'dropdown',
		'heading'     	  => esc_html__( 'Is Loop Infinite ?', 'seogrow' ),
		'param_name'  	  => 'slide_infinite',
		'value'       	  => $yes_no,
		'std'      		  => 'yes',
		'description' 	  => esc_html__( 'Choose YES to slide loop infinite.', 'seogrow' ),
		'group'           => esc_html__('Slide Custom', 'seogrow'),
		'dependency'    => array(
			'element'   => 'is_carousel',
			'value'     => array( 'yes' )
		)
	),
	array(
		'type'            => 'textfield',
		'heading'         => esc_html__( 'Speed Slide', 'seogrow' ),
		'param_name'      => 'slide_speed',
		'value'			  => '',
		'description'     => esc_html__( 'Enter number value. Unit is millisecond. Example: 600.', 'seogrow' ),
		'group'           => esc_html__('Slide Custom', 'seogrow'),
		'dependency'    => array(
			'element'   => 'is_carousel',
			'value'     => array( 'yes' )
		)
	)
);

$vc_options = array_merge( 
	$layouts,
	$layout_options,
	$params
);
