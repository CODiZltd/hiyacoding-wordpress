<?php
if(!empty($args['format'])){
	$format = $args['format'];
}else{
	$format = '<div class="block-label">
				<div class="text"><span>%2$s</span></div>
				<a href="%1$s" class="link-label"></a>
			</div>';
}
$date_type = slz_get_db_settings_option('blog-post-date-type', '');
if( $date_type == 'ribbon' ) {
	$default = array(
		'day'   => esc_html_x('d','daily posts date format', 'seogrow'),
		'month' => esc_html_x('M','daily posts date format', 'seogrow'),
		'year'  => esc_html_x('Y','daily posts date format', 'seogrow'),
	);
	$date_format = array_merge( $default, slz()->theme->get_config('ribbon_date_format', array()) );
	$day    = get_the_date();

	printf( $format, $module->permalink, esc_html( $day ));
}