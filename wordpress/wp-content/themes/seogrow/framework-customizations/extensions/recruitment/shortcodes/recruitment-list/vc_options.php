<?php
$shortcode  = slz_ext( 'shortcodes' )->get_shortcode( 'recruitment_list' );

$method     = array(
	esc_html__( 'Category', 'seogrow' )	    => 'cat',
	esc_html__( 'Recruitment', 'seogrow' ) 	=> 'recruitment'
);
$description     = array(
	esc_html__( 'Excerpt', 'seogrow' )	    => 'excerpt',
	esc_html__( 'Content', 'seogrow' ) 	    => 'content'
);
$sort_by    = SLZ_Params::get('sort-other');

$args       = array('post_type' => 'slz-recruitment');
$options    = array('empty'     => esc_html__( '-All Recruitments-', 'seogrow' ) );
$recruitments   = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy   = 'slz-recruitment-cat';
$params_cat = array('empty'   => esc_html__( '-All Recruitment Categories-', 'seogrow' ) );
$categories = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );


$vc_options = array(
	array(
		'type'            => 'textfield',
		'heading'      	  => esc_html__( 'Title', 'seogrow' ),
		'param_name'  	  => 'title',
		'value'       	  => '',
		'description' 	  => esc_html__( 'Enter block title.', 'seogrow' )
	),
	array(
		'type'            => 'dropdown',
		'heading'      	  => esc_html__( 'Description', 'seogrow' ),
		'param_name'  	  => 'description',
		'value'       	  => $description,
		'description' 	  => esc_html__( 'Choose what content of recruitment to display.', 'seogrow' )
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
		'heading'     => esc_html__( 'Button Text', 'seogrow' ),
		'param_name'  => 'button_text',
		'value'       => '',
		'description' => esc_html__( 'Enter button text.', 'seogrow' )
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_html__( 'Button Link', 'seogrow' ),
		'param_name'  => 'button_link',
		'value'       => '',
		'description' => esc_html__( 'Choose button link.', 'seogrow' )
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
		'description'     => esc_html__( 'Choose recruitment category or special recruitments to display.', 'seogrow' ),
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
		'description'     => esc_html__( 'Choose recruitment category.', 'seogrow' ),
		'dependency'      => array(
			'element'     => 'method',
			'value'       => array( 'cat' )
		),
		'group'       	  => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'            => 'param_group',
		'heading'         => esc_html__( 'Recruitments', 'seogrow' ),
		'param_name'      => 'list_post',
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add recruitment', 'seogrow' ),
				'param_name'  => 'post',
				'value'       => $recruitments,
				'description' => esc_html__( 'Choose special recruitment to show.',  'seogrow'  )
			)
		),
		'value'           => '',
		'dependency'      => array(
			'element'     => 'method',
			'value'       => array( 'recruitment' )
		),
		'description'     => esc_html__( 'Default display all recruitments if no recruitment is selected.', 'seogrow' ),
		'group'       	  => esc_html__('Filter', 'seogrow')
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
		'heading'         => esc_html__( 'Active Color', 'seogrow' ),
		'param_name'      => 'active_color',
		'value'           => '',
		'description'     => esc_html__( 'Choose color for item when activating tab.', 'seogrow' ),
		'group'       	  => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Location?', 'seogrow' ),
		'param_name'  => 'show_location',
		'description'     => esc_html__( 'Show/Hide the working location of the recruitment', 'seogrow' ),
		'group'       => esc_html__('Info Settings', 'seogrow'),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Salary?', 'seogrow' ),
		'param_name'  => 'show_salary',
		'description'     => esc_html__( 'Show/Hide salary of the recruitment', 'seogrow' ),
		'group'       => esc_html__('Info Settings', 'seogrow'),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Expired Date?', 'seogrow' ),
		'param_name'  => 'show_expired_date',
		'description'     => esc_html__( 'Show/Hide expired date of the recruitment', 'seogrow' ),
		'group'       => esc_html__('Info Settings', 'seogrow'),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show More Information?', 'seogrow' ),
		'param_name'  => 'show_more_info',
		'description'     => esc_html__( 'Show/Hide more information of the recruitment', 'seogrow' ),
		'group'       => esc_html__('Info Settings', 'seogrow'),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Working Type?', 'seogrow' ),
		'param_name'  => 'show_working_type',
		'description'     => esc_html__( 'Show/Hide working type of the recruitment', 'seogrow' ),
		'group'       => esc_html__('Info Settings', 'seogrow'),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Button Apply?', 'seogrow' ),
		'param_name'  => 'show_btn',
		'description'     => esc_html__( 'Show/Hide button "Apply" of the recruitment', 'seogrow' ),
		'group'       => esc_html__('Info Settings', 'seogrow'),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Featured Image?', 'seogrow' ),
		'param_name'  => 'show_featured_image',
		'description'     => esc_html__( 'Show/Hide featured image of the recruitment', 'seogrow' ),
		'group'       => esc_html__('Info Settings', 'seogrow'),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
);
