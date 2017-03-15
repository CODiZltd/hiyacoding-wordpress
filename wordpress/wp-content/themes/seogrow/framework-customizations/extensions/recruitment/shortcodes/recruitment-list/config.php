<?php

if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__( 'SLZ Recruitment List', 'seogrow' ),
	'description'	=> esc_html__( 'A recruitment list.', 'seogrow' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-recruitment-list slz-vc-slzcore',
	'tag'			=> 'slz_recruitment_list' 
);

$cfg ['image_size'] = array (
	'large'				=> '150x150'
);

$cfg ['default_value'] = array (
		'title'                 => '',
		'description'           => 'excerpt',
		'limit_post'            => '-1',
		'offset_post'           => '0',
		'sort_by'               => '',
		'button_text'           => '',
		'button_link'           => '',
		'extra_class'           => '',
		'method'                => 'cat',
		'list_category'         => '',
		'list_post'             => '',
		'title_color'           => '',
		'active_color'          => '',
		//ovewrite theme
		'show_more_info'        => '',
		'show_expired_date'     => '',
		'show_salary'           => '',
		'show_location'         => '',
		'show_working_type'     => '',
		'show_btn'              => '',
		'show_featured_image'   => '',
);