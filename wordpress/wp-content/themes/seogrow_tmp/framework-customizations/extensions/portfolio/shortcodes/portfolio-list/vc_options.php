<?php
$sort_by = slz()->extensions->get( 'portfolio' )->get_config('sort_portfolio');
$column = array(
	esc_html__( 'One', 'seogrow' )    => '1',
	esc_html__( 'Two', 'seogrow' )    => '2',
	esc_html__( 'Three', 'seogrow' )  => '3',
	esc_html__( 'Four', 'seogrow' )   => '4',
	esc_html__( 'Five', 'seogrow' )   => '5',
	esc_html__( 'Six', 'seogrow' )    => '6',
);
$yes_no  = array(
	esc_html__('Yes', 'seogrow') => 'yes',
	esc_html__('No', 'seogrow')  => 'no',
);
$category_filter = array(
	esc_html__('No', 'seogrow')  => '',
	esc_html__('Yes', 'seogrow') => 'category'
);
$method = array(
	esc_html__( 'Category', 'seogrow' ) => 'cat',
	esc_html__( 'Project', 'seogrow' )  => 'portfolio'
);
$thumbs = array(
	esc_html__( 'Featured Image', 'seogrow' ) => '',
	esc_html__( 'Thumbnail', 'seogrow' )      => 'thumbnail',
	esc_html__( 'None', 'seogrow' )           => 'none',
);

$args = array('post_type'     => 'slz-portfolio');
$options = array('empty'      => esc_html__( '-All Projects-', 'seogrow' ) );
$portfolios = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy = 'slz-portfolio-cat';
$params_cat = array('empty'   => esc_html__( '-All Project Categories-', 'seogrow' ) );
$portfolio_cat = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );


$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'portfolio_list' );

$layouts = array(
	array (
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Layout', 'seogrow' ),
		'admin_label' => true,
		'param_name'  => 'layout',
		'value'       => $shortcode->get_layouts(),
		'description' => esc_html__( 'Choose layout will be displayed.', 'seogrow' ) 
	) 
);

$layout_options = $shortcode->get_layout_options();

$params = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Columns', 'seogrow' ),
		'admin_label' => true,
		'param_name'  => 'column',
		'value'       => $column,
		'std'         => '2',
		'description' => esc_html__( 'Choose number column will be displayed.', 'seogrow' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Image ?', 'seogrow' ),
		'param_name'  => 'show_thumbnail',
		'value'       => $thumbs,
		'description' => esc_html__( 'Show featured image or thumbnail.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'layout',
			'value'     => array('', 'layout-1', 'layout-2' )
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Category ?', 'seogrow' ),
		'param_name'  => 'show_category',
		'value'       => $yes_no,
		'std'         => 'no',
		'description' => esc_html__( 'If choose Yes, block will be show category.', 'seogrow' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Meta Info ?', 'seogrow' ),
		'param_name'  => 'show_meta_info',
		'value'       => $yes_no,
		'std'         => 'no',
		'description' => esc_html__( 'If choose Yes, block will be show meta information.', 'seogrow' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Description ?', 'seogrow' ),
		'param_name'  => 'show_description',
		'value'       => $yes_no,
		'std'         => 'yes',
		'description' => esc_html__( 'If choose Yes, block will be show description.', 'seogrow' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Description Length', 'seogrow' ),
		'param_name'  => 'description_length',
		'description' => esc_html__( 'Limit words to display.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'show_description',
			'value'     => array( 'yes' )
		),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Button Text', 'seogrow' ),
		'param_name'  => 'button_text',
		'description' => esc_html__( 'Enter text will be show button.', 'seogrow' ),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_html__( 'Custom URL', 'seogrow' ),
		'param_name'  => 'custom_link',
		'description' => esc_html__( 'Enter custom url to button.', 'seogrow' )
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Pagination ?', 'seogrow' ),
		'param_name'  => 'pagination',
		'value'       => $yes_no,
		'std'         => 'no',
		'description' => esc_html__( 'If choose Yes, block will be show pagination.', 'seogrow' ),
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
		'heading'     => esc_html__( 'Max Posts', 'seogrow' ),
		'param_name'  => 'max_post',
		'value'       => '',
		'description' => esc_html__( 'Add total posts when paging.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'pagination',
			'value'     => array( 'yes' )
		),
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
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'seogrow' )
	),

	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Filter By', 'seogrow' ),
		'param_name'  => 'method',
		'value'       => $method,
		'description' => esc_html__( 'Choose portfolio category or special portfolio to filter', 'seogrow' ),
		'group'       	=> esc_html__('Filter', 'seogrow'),
	),
	array(
		'type'        => 'param_group',
		'heading'     => esc_html__( 'Category', 'seogrow' ),
		'param_name'  => 'list_category',
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Category', 'seogrow' ),
				'param_name'  => 'category_slug',
				'value'       => $portfolio_cat,
				'description' => esc_html__( 'Choose special category to filter', 'seogrow'  )
			),
		),
		'value'       => '',
		'description' => esc_html__( 'Choose Portfolio Category.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'method',
			'value'     => array( 'cat' )
		),
		'group'       => esc_html__('Filter', 'seogrow'),
	),
	array(
		'type'        => 'param_group',
		'heading'     => esc_html__( 'Portfolio', 'seogrow' ),
		'param_name'  => 'list_post',
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Portfolio', 'seogrow' ),
				'param_name'  => 'post',
				'value'       => $portfolios,
				'description' => esc_html__( 'Choose special portfolio to show',  'seogrow'  )
			),
			
		),
		'value'       => '',
		'description' => esc_html__( 'Default display All Portfolio if no portfolio is selected and Number portfolio is empty.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'method',
			'value'     => array( 'portfolio' )
		),
		'group'       => esc_html__('Filter', 'seogrow'),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Category Filter', 'seogrow' ),
		'param_name'  => 'category_filter',
		'value'       => $category_filter,
		'description' => esc_html__( 'If choose Yes, a category filter will display on top of block.', 'seogrow' ),
		'group'       => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Filter Text', 'seogrow' ),
		'param_name'  => 'category_filter_text',
		'value'       => esc_html__('All', 'seogrow'),
		'description' => esc_html__( 'Enter text for "All" tab.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'category_filter',
			'value'     => array( 'category' )
		),
		'group'       => esc_html__('Filter', 'seogrow')
	),


	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Color', 'seogrow' ),
		'param_name'  => 'color_title',
		'value'       => '',
		'description' => esc_html__( 'Choose color title for block.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Color Hover', 'seogrow' ),
		'param_name'  => 'color_title_hv',
		'value'       => '',
		'description' => esc_html__( 'Choose color title for block when hover.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Category Color', 'seogrow' ),
		'param_name'  => 'color_category',
		'value'       => '',
		'description' => esc_html__( 'Choose color category for block.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Category Color Hover', 'seogrow' ),
		'param_name'  => 'color_category_hv',
		'value'       => '',
		'description' => esc_html__( 'Choose color category for block when hover.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Meta Info Color', 'seogrow' ),
		'param_name'  => 'color_meta_info',
		'value'       => '',
		'description' => esc_html__( 'Choose color meta info for block.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'layout',
			'value'     => array('', 'layout-1' )
		),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Meta Info Color Hover', 'seogrow' ),
		'param_name'  => 'color_meta_info_hv',
		'value'       => '',
		'description' => esc_html__( 'Choose color meta info for block when hover.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'layout',
			'value'     => array('', 'layout-1' )
		),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Description Color', 'seogrow' ),
		'param_name'  => 'color_description',
		'value'       => '',
		'description' => esc_html__( 'Choose color description for block.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Background Image Color Hover', 'seogrow' ),
		'param_name'  => 'color_item_bg_hv',
		'value'       => '',
		'description' => esc_html__( 'Choose background color image for block when hover.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Color', 'seogrow' ),
		'param_name'  => 'color_button',
		'value'       => '',
		'description' => esc_html__( 'Choose color button for block.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Color Hover', 'seogrow' ),
		'param_name'  => 'color_button_hv',
		'value'       => '',
		'description' => esc_html__( 'Choose color button for block when hover.', 'seogrow' ),
		'group'       => esc_html__('Custom', 'seogrow'),
	),

);

$vc_options = array_merge( 
	$layouts,
	$layout_options,
	$params
);
