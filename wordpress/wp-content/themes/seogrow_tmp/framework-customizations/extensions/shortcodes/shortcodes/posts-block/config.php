<?php

if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title' => __ ( 'SLZ Posts Block', 'seogrow' ),
	'description' => __ ( 'Show posts with layouts', 'seogrow' ),
	'tab' => slz()->theme->manifest->get('name'),
	'icon' => 'icon-slzcore-posts-block slz-vc-slzcore',
	'tag' => 'slz_posts_block'
);

$cfg ['image_size'] = array (
	'large'          => '800x480',
	'small'          => '370x180',
);

$cfg['main_layout'] = array(
	esc_html__( 'Florida', 'seogrow' )    => 'main-layout-1',
	esc_html__( 'California', 'seogrow' ) => 'main-layout-2',
	esc_html__( 'Georgia', 'seogrow' )    => 'main-layout-3'
);// option layout 1

$cfg['list_layout'] = array(
	esc_html__( 'Florida', 'seogrow' )    => 'list-layout-1',
	esc_html__( 'California', 'seogrow' ) => 'list-layout-2',
	esc_html__( 'Georgia', 'seogrow' )    => 'list-layout-3'
); //option layout 1

$cfg['layout_4_style'] = array(
	esc_html__( 'Milan', 'seogrow' )   => 'style-1',
	esc_html__( 'Rome', 'seogrow' )    => 'style-2',
	esc_html__( 'Cascina', 'seogrow' ) => 'style-3'
); // option layout 4

$cfg['title_length'] = 15;
$cfg['excerpt_length'] = 30;

$cfg['layouts'] = array(
	'layout-2'  => esc_html__( 'India', 'seogrow' ),
	'layout-3'  => esc_html__( 'United Kingdom', 'seogrow' ),
); // vc options

$cfg['yes_no'] = array(
	esc_html__( 'Yes', 'seogrow' )   => 'yes',
	esc_html__( 'No', 'seogrow' )   => 'no',
); // option layout 1 2 3

$cfg['column'] = array(
	esc_html__( 'One', 'seogrow' )     => '1',
	esc_html__( 'Two', 'seogrow' )     => '2',
	esc_html__( 'Three', 'seogrow' )   => '3',
	esc_html__( 'Four', 'seogrow' )    => '4',
); // option layout 1 3

$cfg ['default_value'] = array (
	'shortcode'            => 'posts-block',
	'layout'               => 'layout-2',
	'image_size'           => $cfg ['image_size'],
	'block_title'          => '',
	'block_title_color'    => '',
	'block_title_class'    => 'slz-title-shortcode',
	'limit_post'           => '5',
	'offset_post'          => '0',
	'excerpt_length'       => '15',
	'post_format'          => '',
	'sort_by'              => '',
	'pagination'           => '',
	'category_filter'      => '',
	'category_filter_text' => esc_html__ ( 'All', 'seogrow' ),
	'extra_class'          => '',
	'category_list'        => '',
	'tag_list'             => '',
	'author_list'          => '',
	'main_layout'          => 'main-layout-1',
	'list_layout'          => 'list-layout-1',
	'main_show_read_more'  => 'yes',
	'main_show_excerpt'    => 'yes',
	'list_column'          => '1',
	'list_show_image'      => 'yes',
	'list_show_excerpt'    => 'yes',
	'main_show_excerpt_2'  => 'yes',
	'main_show_read_more_2' => 'yes',
	'list_layout_2'        => 'list-layout-2',
	'list_show_excerpt_2'  => 'no',
	'list_show_image_2'    => 'yes',
	'list_layout_3'        => 'list-layout-1',
	'list_column_3'        => '1',
	'list_show_excerpt_3'  => 'yes',
	'list_show_left_right_3' => 'yes',
	'style_4'              => 'style-1',
);