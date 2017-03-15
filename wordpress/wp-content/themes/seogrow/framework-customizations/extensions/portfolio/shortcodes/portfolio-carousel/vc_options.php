<?php
$sort_by = slz()->extensions->get( 'portfolio' )->get_config('sort_portfolio');

$yes_no  = array(
	esc_html__('Yes', 'seogrow') => 'yes',
	esc_html__('No', 'seogrow')  => 'no',
);
$method = array(
	esc_html__( 'Category', 'seogrow' ) => 'cat',
	esc_html__( 'Project', 'seogrow' )  => 'portfolio'
);
$category_filter = array(
	esc_html__('No', 'seogrow')  => '',
	esc_html__('Yes', 'seogrow') => 'category'
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


$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'portfolio_carousel' );


$params = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Image ?', 'seogrow' ),
		'param_name'  => 'show_thumbnail',
		'value'       => $thumbs,
		'description' => esc_html__( 'Show featured image or thumbnail.', 'seogrow' ),
		'dependency'  => array(
			'element'   => 'layout',
			'value'     => array('', 'layout-1' )
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
		'dependency'  => array(
			'element'   => 'layout',
			'value'     => array('', 'layout-1' )
		),
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
		'description' => esc_html__( 'Enter number for limiting the number of word displayed.', 'seogrow' ),
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
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'seogrow' )
	),
);

$filter = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Category Filter Tab', 'seogrow' ),
		'param_name'  => 'category_filter',
		'value'       => $category_filter,
		'description' => esc_html__( 'If choose Yes, a category filter will display on top of block.', 'seogrow' ),
		'group'       => esc_html__('Filter', 'seogrow')
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Filter Tab Text', 'seogrow' ),
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
	)
);

$slider_options = array(
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Slide To Show', 'seogrow' ),
		'param_name'    => 'slide_to_show',
		'value'         => '3',
		'admin_label'   => true,
		'description'   => esc_html__( 'Enter number of items to show.', 'seogrow' ),
		'group'         => esc_html__('Slide Custom', 'seogrow')
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
		'heading'     	=> esc_html__( 'Is Dots Navigation ?', 'seogrow' ),
		'param_name'  	=> 'slide_dots',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to show dot navigation.', 'seogrow' ),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Is Arrows Navigation ?', 'seogrow' ),
		'param_name'  	=> 'slide_arrows',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to show arrow navigation.', 'seogrow' ),
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
		'value'			=> '600',
		'description'   => esc_html__( 'Enter number value. Unit is millisecond. Example: 600.', 'seogrow' ),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Color', 'seogrow' ),
		'param_name'    => 'color_slide_arrow',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide arrow for slide.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Color Hover', 'seogrow' ),
		'param_name'    => 'color_slide_arrow_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide arrow for slide when hover.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Background Color', 'seogrow' ),
		'param_name'    => 'color_slide_arrow_bg',
		'value'         => '',
		'description'   => esc_html__( 'Choose background color slide arrow for slide.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Background Color Hover', 'seogrow' ),
		'param_name'    => 'color_slide_arrow_bg_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose background color slide arrow for slide when hover.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Dots Color', 'seogrow' ),
		'param_name'    => 'color_slide_dots',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide dots for slide.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_dots',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Dots Color Active', 'seogrow' ),
		'param_name'    => 'color_slide_dots_at',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide dots for slide when active, hover.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_dots',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	)
);
$custom = array(
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
	)
);

$vc_options = array_merge( 
	$params,
	$filter,
	$slider_options,
	$custom
);
