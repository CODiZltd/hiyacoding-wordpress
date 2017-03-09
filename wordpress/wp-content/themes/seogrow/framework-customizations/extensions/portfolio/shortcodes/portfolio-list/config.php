<?php
if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__ ( 'SLZ Project List', 'seogrow' ),
	'description'	=> esc_html__ ( 'List of project', 'seogrow' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-portfolio-list slz-vc-slzcore',
	'tag'			=> 'slz_portfolio_list' 
);

$cfg ['image_size'] = array (
	'large'				=> '800x480',
	'small'				=> '370x180',
	'no-image-large'	=> '800x480',
	'no-image-small'	=> '370x180' 
);

$cfg ['layouts'] = array (
	'layout-1' => esc_html__( 'United States', 'seogrow' ),
	'layout-2' => esc_html__( 'India', 'seogrow' ),
    'layout-3' => esc_html__( 'United Kingdom', 'seogrow' ),
);

$cfg ['default_value'] = array (
	'extension'				=> 'portfolios',
	'shortcode'				=> 'portfolio_list',
	'template'				=> 'portfolio',
	'image_size'			=> $cfg ['image_size'],
	'layout'				=> '',
	'style'					=> '',
	'layout_style_2'        => '',
	'column'				=> '2',
	'offset_post'			=> '',
	'limit_post'			=> '-1',
	'max_post'				=> '',
	'sort_by'				=> '',
	'extra_class'			=> '',
	'pagination'			=> '',
	'method' 				=> 'cat',
	'list_category' 		=> '',
	'list_post' 			=> '',
	'category_filter'		=> '',
	'category_filter_text'	=> esc_html__('All', 'seogrow'),
	'show_thumbnail'		=> '',
	'show_category'			=> 'no',
	'show_meta_info'		=> 'no',
	'show_description'		=> 'yes',
	'description_length'	=> '',
	'button_text'			=> '',
	'custom_link'           => '',

	'color_title'			=> '',
	'color_title_hv'		=> '',
	'color_category'		=> '',
	'color_category_hv'		=> '',
	'color_meta_info'		=> '',
	'color_meta_info_hv'	=> '',
	'color_description'		=> '',
	'color_item_bg_hv'		=> '',
	'color_button'			=> '',
	'color_button_hv'		=> '',
    'show_date'             => 'yes',

);