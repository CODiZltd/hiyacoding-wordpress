<?php
$shortcode  = slz_ext( 'shortcodes' )->get_shortcode( 'service_tab' );

$show_icon  = array(
	esc_html__('Show Icon', 'seogrow')	 => 'icon',
	esc_html__('Show Image', 'seogrow') => 'image'
);
$method     = array(
	esc_html__( 'Category', 'seogrow' )	=> 'cat',
	esc_html__( 'Service', 'seogrow' ) 	=> 'service'
);
$description     = array(
	esc_html__( 'Excerpt', 'seogrow' )	        => 'excerpt',
	esc_html__( 'Content', 'seogrow' ) 	        => 'content',
	esc_html__( 'Description meta', 'seogrow' ) => 'des'
);
$sort_by    = SLZ_Params::get('sort-other');

$args       = array('post_type' => 'slz-service');
$options    = array('empty'     => esc_html__( '-All Services-', 'seogrow' ) );
$services   = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy   = 'slz-service-cat';
$params_cat = array('empty'   => esc_html__( '-All Service Categories-', 'seogrow' ) );
$categories = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );


$vc_options = array(
	array(
		'type'            => 'dropdown',
		'heading'      	  => esc_html__( 'Show Icon or Image', 'seogrow' ),
		'param_name'  	  => 'show_icon',
		'value'       	  => $show_icon,
		'std'      		  => 'icon',
		'description' 	  => esc_html__( 'Choose show icon or image of service.', 'seogrow' )
	),
	array(
		'type'            => 'dropdown',
		'heading'      	  => esc_html__( 'Description', 'seogrow' ),
		'param_name'  	  => 'description',
		'value'       	  => $description,
		'description' 	  => esc_html__( 'Choose what content of service to display.', 'seogrow' )
	),
	array(
		'type'            => 'textfield',
		'heading'      	  => esc_html__( 'Description Length', 'seogrow' ),
		'param_name'  	  => 'description_length',
		'dependency'  => array(
			'element'   => 'description',
			'value'     => array( 'content' )
		),
		'description' 	  => esc_html__( 'Limit words to display', 'seogrow' )
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
		'type'            => 'textfield',
		'heading'         => esc_html__( 'Button Text', 'seogrow' ),
		'param_name'      => 'btn_content',
		'value'           => 'Read More',
		'description'     => esc_html__( 'Enter block button text.', 'seogrow' )
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
		'dependency'      => array(
			'element'     => 'show_icon',
			'value'       => array( 'icon' )
		),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Icon Active Color', 'seogrow' ),
		'param_name'      => 'icon_active_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for icon when activating tab.', 'seogrow' ),
		'dependency'      => array(
			'element'     => 'show_icon',
			'value'       => array( 'icon' )
		),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Icon Hover Color', 'seogrow' ),
		'param_name'      => 'icon_hv_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for icon when hover.', 'seogrow' ),
		'dependency'      => array(
			'element'     => 'show_icon',
			'value'       => array( 'icon' )
		),
		'group'       	  => esc_html__('Custom', 'seogrow')
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
		'heading'         => esc_html__( 'Title Active Color', 'seogrow' ),
		'param_name'      => 'title_active_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block title when activating tab.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Title Hover Color', 'seogrow' ),
		'param_name'      => 'title_hv_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block title when hover.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Title Color Of Block Content', 'seogrow' ),
		'param_name'      => 'title_ct_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for title of block content.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Title Hover Color Of Block Content', 'seogrow' ),
		'param_name'      => 'title_ct_hv_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for title of block content when hover.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Button Color', 'seogrow' ),
		'param_name'      => 'btn_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block button.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow'),
		'dependency'      => array(
			'element'           => 'btn_content',
			'not_empty'         => true,
		),
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Button Hover Color', 'seogrow' ),
		'param_name'      => 'btn_hv_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for block button when hover.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow'),
		'dependency'      => array(
			'element'           => 'btn_content',
			'not_empty'         => true,
		),
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Button Background Color', 'seogrow' ),
		'param_name'      => 'btn_bg_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose background color for block button.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow'),
		'dependency'      => array(
			'element'           => 'btn_content',
			'not_empty'         => true,
		),
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Button Background Hover Color', 'seogrow' ),
		'param_name'      => 'btn_bg_hv_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose background color for block button when hover.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow'),
		'dependency'      => array(
			'element'           => 'btn_content',
			'not_empty'         => true,
		),
	)
);
