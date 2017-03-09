<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$posts_extension = slz_ext( 'posts' )->get_post('post_05');

$cfg['general'] = array(
	'name' 			 => __( 'Post 05', 'seogrow' ),
	'description'    => __( 'Post 05', 'seogrow' ),
	'small_img'  	 => array(
        'height' => 70,
        'src'    => $posts_extension->locate_URI('/static/img/thumbnail.png')
    ),
    'large_img'  	 => array(
        'height' => 214,
        'src'    => $posts_extension->locate_URI('/static/img/thumbnail.png')
    )
);

$cfg ['related_image_size'] = array (
    'large' => '370x180',
);

$cfg['title_length'] = 15;

$cfg['excerpt_length'] = 30;
