<?php if (!defined('SLZ')) die('Forbidden');

/** @internal */
function seogrow_filter_disable_posts( $args ) {
	$args = array(
		'post_01',
		'post_03',
		'post_04',
	);
	return $args;
}
add_filter( 'slz_ext_posts_disabled_posts' , 'seogrow_filter_disable_posts');