<?php

if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__ ( 'SLZ Video', 'slz' ),
		'description' => esc_html__ ( 'Create video block.', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-video slz-vc-slzcore',
		'tag' => 'slz_video'
);

$cfg ['default_value'] = array (
		'image_video'  => '',
		'height' 	    => '',
		'video_type'    => 'youtube',
		'id_youtube'    => '',
		'id_vimeo'      => '',
		'title'         => '',
		'extra_class'   => '',
        'align'         => 'text-l',
);