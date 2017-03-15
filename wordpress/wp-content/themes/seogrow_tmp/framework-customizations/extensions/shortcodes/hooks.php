<?php if (!defined('SLZ')) die('Forbidden');

/** @internal */
function seogrow_filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'demo_disabled';
	$to_disable[] = 'counter'; // using counterv2
	return $to_disable;
}
add_filter('slz_ext_shortcodes_disable_shortcodes', 'seogrow_filter_disable_shortcodes');

/** @internal */
function seogrow_filter_enable_shortcodes($to_disable)
{
	$args = array(
		'accordion',
		'ads_banner',
		'about_me',
		'category',
		'image',
		'image_carousel',
		'pageable',
		'pricing_box',
		'banner',
		'isotope',
		'recruitment_list',
		'team_list',
		'team_tab',
		'contact',
		'partner',
		'progress_bar',
		'testimonial',
		'contact_form',
		'item_list',
		'tabs',
		'new_tweet',
		'author_list',
		'counterv2',
		'main_title',
		'posts_block',
		'tags',
		'gallery_carousel',
		'service_list',
		'featured_list',
		'map',
		'portfolio_category',
		'portfolio_list',
		'portfolio_carousel',
		'button',
		'icon_box',
		'material_download',
		'video',
	);
	return $args;
}
add_filter('slz_ext_shortcodes_enable_shortcodes', 'seogrow_filter_enable_shortcodes');