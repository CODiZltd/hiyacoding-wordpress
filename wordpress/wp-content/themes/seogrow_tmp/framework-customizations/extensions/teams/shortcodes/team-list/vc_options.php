<?php
$sort_by = SLZ_Params::get('sort-other');
$yes_no  = array(
	esc_html__('Yes', 'seogrow')         => 'yes',
	esc_html__('No', 'seogrow')	         => 'no'
);
$method = array(
	esc_html__( 'Category', 'seogrow' )  => 'cat',
	esc_html__( 'Team', 'seogrow' )      => 'team'
);

$args = array('post_type'     => 'slz-team');
$options = array('empty'      => esc_html__( '-All Team-', 'seogrow' ) );
$teams = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy = 'slz-team-cat';
$params_cat = array('empty'   => esc_html__( '-All Team Categories-', 'seogrow' ) );
$team_cat = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );


$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'team_list' );

$layouts = array(
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Layout', 'seogrow' ),
		'admin_label'   => true,
		'param_name'    => 'layout',
		'value'         => $shortcode->get_layouts(),
		'std'           => 'layout-1',
		'description'   => esc_html__( 'Choose layout will be displayed.', 'seogrow' )
	)
);

$layout_options = $shortcode->get_layout_options();

$filters =  array(
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Display By', 'seogrow' ),
		'param_name'    => 'method',
		'value'         => $method,
		'description'   => esc_html__( 'Choose team category or special teams to display', 'seogrow' ),
		'group'         => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'          => 'param_group',
		'heading'       => esc_html__( 'Category', 'seogrow' ),
		'param_name'    => 'list_category',
		'params'        => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Category', 'seogrow' ),
				'param_name'  => 'category_slug',
				'value'       => $team_cat,
				'description' => esc_html__( 'Choose special category to filter', 'seogrow'  )
			)
		),
		'value'         => '',
		'description'   => esc_html__( 'Choose Team Category.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'method',
			'value'     => array( 'cat' )
		),
		'group'         => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'          => 'param_group',
		'heading'       => esc_html__( 'Teams', 'seogrow' ),
		'param_name'    => 'list_post',
		'params'        => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Team', 'seogrow' ),
				'param_name'  => 'post',
				'value'       => $teams,
				'description' => esc_html__( 'Choose special team to show',  'seogrow'  )
			)
		),
		'value'         => '',
		'description'   => esc_html__( 'Default display All Team if no team is selected and Number team is empty.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'method',
			'value'     => array( 'team' )
		),
		'group'         => esc_html__('Filter', 'seogrow')
	)
);

$params = array(
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Thumbnail ?', 'seogrow' ),
		'param_name'    => 'show_thumbnail',
		'value'         => $yes_no,
		'std'      	    => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show thumbnail image.', 'seogrow' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Position ?', 'seogrow' ),
		'param_name'    => 'show_position',
		'value'         => $yes_no,
		'std'      	    => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show position.', 'seogrow' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Contact Info ?', 'seogrow' ),
		'param_name'    => 'show_contact_info',
		'value'         => $yes_no,
		'std'      	    => 'no',
		'description'   => esc_html__( 'If choose Yes, block will show contact info.', 'seogrow' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Social ?', 'seogrow' ),
		'param_name'    => 'show_social',
		'value'         => $yes_no,
		'std'      	    => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show social.', 'seogrow' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Description ?', 'seogrow' ),
		'param_name'    => 'show_description',
		'value'         => $yes_no,
		'std'           => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show description.', 'seogrow' )
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Description Length', 'seogrow' ),
		'param_name'    => 'description_lenghth',
		'description'   => esc_html__( 'Limit words to display.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'show_description',
			'value'     => array( 'yes' )
		)
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Limit Posts', 'seogrow' ),
		'param_name'    => 'limit_post',
		'value'         => '-1',
		'description'   => esc_html__( 'Add limit posts per page. Set -1 or empty to show all. The number of posts to display. If it blank the number posts will be the number from Settings -> Reading', 'seogrow' )
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Offset Post', 'seogrow' ),
		'param_name'    => 'offset_post',
		'value'         => '',
		'description'   => esc_html__( 'Enter offset to pass over posts. If you want to start on record 6, using offset 5', 'seogrow' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Sort By', 'seogrow' ),
		'param_name'    => 'sort_by',
		'value'         => $sort_by,
		'description'   => esc_html__( 'Select order to display list properties.', 'seogrow' )
	),
    array(
        'type'          => 'textfield',
        'heading'       => esc_html__( 'Button "Read More" Text', 'seogrow' ),
        'param_name'    => 'btn_content',
        'value'         => '',
        'description'   => esc_html__( 'Enter text to button. If it blank will not have a button.', 'seogrow' )
    ),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'    => 'extra_class',
		'value'         => '',
		'description'   => esc_html__( 'Add extra class to block', 'seogrow' )
	),

	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Title Color', 'seogrow' ),
		'param_name'    => 'color_title',
		'value'         => '',
		'description'   => esc_html__( 'Choose color title for block.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Title Color Hover', 'seogrow' ),
		'param_name'    => 'color_title_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose color title for block when hover.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Position Color', 'seogrow' ),
		'param_name'    => 'color_position',
		'value'         => '',
		'description'   => esc_html__( 'Choose color position for block.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Info Color', 'seogrow' ),
		'param_name'    => 'color_info',
		'value'         => '',
		'description'   => esc_html__( 'Choose color for contact info.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Info Hover Color', 'seogrow' ),
		'param_name'    => 'color_hv_info',
		'value'         => '',
		'description'   => esc_html__( 'Choose hover color for contact info.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Description Color', 'seogrow' ),
		'param_name'    => 'color_description',
		'value'         => '',
		'description'   => esc_html__( 'Choose color description for block.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Social Color', 'seogrow' ),
		'param_name'    => 'color_social',
		'value'         => '',
		'description'   => esc_html__( 'Choose color social for block.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Social Color Hover', 'seogrow' ),
		'param_name'    => 'color_social_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose color social for block when hover.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	)
);

$vc_options = array_merge( 
	$layouts,
	$filters,
	$layout_options,
	$params
);
