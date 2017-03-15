<?php if ( ! defined( 'SLZ' ) ) { die( 'Forbidden' ); }

$model = new SLZ_Portfolio();
$model->init( $data );
$uniq_id = $model->attributes['uniq_id'];
$block_class = 'portfolio-'.SLZ_Com::make_id();
$block_cls = $model->attributes['extra_class'] . ' ' . $uniq_id;
$layout = $model->attributes['layout'];
if( ! $model->query->have_posts() ) {
	return;
}
?>
<div class="slz-shortcode sc_portfolio_list <?php echo esc_attr( $block_cls ).' '.esc_attr($layout).' '.esc_attr( $block_class ); ?>" data-item="<?php echo esc_attr($uniq_id); ?>">
	<?php
	if( !empty($data['category_filter']) ){
		$model->attributes['post_id'] = array();
		$model->attributes['is_ajax'] = true;
		echo ( $model->render_category_tabs() );
	}
	switch ( $model->attributes['layout'] ) {
		case 'layout-1':
			echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('model'));
			break;
		case 'layout-2':
			echo slz_render_view( $instance->locate_path('/views/layout-2.php'), compact('model'));
			break;
		case 'layout-3':
			echo slz_render_view( $instance->locate_path('/views/layout-3.php'), compact('model'));
			break;
		default:
			echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('model'));
			break;
	}
	?>
</div>
<?php
/* custom css */
if ( !empty( $model->attributes['color_category']) )  {
	$css = '
		.%1$s .meta-wrapper .title {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $model->attributes['color_category'] ) );
}
if ( !empty( $model->attributes['color_category_hv']) )  {
	$css = '
		.%1$s .meta-wrapper .title:hover {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $model->attributes['color_category_hv'] ) );
}
if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}


