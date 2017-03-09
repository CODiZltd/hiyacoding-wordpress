<?php

if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__( 'SLZ Events Block', 'slz' ),
	'description'	=> esc_html__( 'Banner of events', 'slz' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-event-block slz-vc-slzcore',
	'tag'			=> 'slz_event_block'
);

$cfg ['image_size'] = array (
	'large'				=> '341x257',
	'no-image-small' 	=> '341x257',
);

$cfg ['show_hide'] = array (
	esc_html__( 'Show' ) => 'show',
	esc_html__( 'Hide' ) => 'hide',
);

$cfg ['filter_method'] = array(
	esc_html__( 'Category', 'slz' )  => 'cat',
	esc_html__( 'Event', 'slz' )     => 'event',
);

$cfg ['yes_no'] = array(
	esc_html__( 'No', 'slz' ) => '',
	esc_html__( 'Yes', 'slz' ) => 'yes',
);

$cfg ['default_value'] = array (
	'extension'				  => 'events',
	'shortcode'				  => 'event_block',
	'title'                   => '',
	'limit_post'			  => '-1',
	'sort_by'				  => '',
	'extra_class'			  => '',
	'image_display'           => 'show',
	'description_display'     => 'show',
	'event_time_display'      => 'show',
	'event_location_display'  => 'show',
	'title_color'            => '',
	'method' 				  => 'cat',
	'category_slug' 		  => '',
	'list_category' 		  => '',
	'list_post' 			  => '',
	'posts'                   => '',
	'pagination'              => '',
);