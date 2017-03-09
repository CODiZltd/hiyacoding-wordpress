<?php if ( ! defined( 'SLZ' ) ) { die( 'Forbidden' ); }

$model = new SLZ_Team();
$model->init( $data );

$uniq_id = $model->attributes['uniq_id'];
$block_cls = $model->attributes['extra_class'] . ' ' . $uniq_id;

$data['uniq_id'] = $uniq_id;
$data['model'] = $model;
$column = !empty($model->attributes['column']) ? $model->attributes['column'] : '4';

//get carousel html
$classRowBegin = $classRowEnd = $html_format = $html_nav_format = '';
$slick_json = $data['model']->get_atts_option_slick_slide($data['model']->attributes);
$classRowBegin = '
<div class="slz-carousel-wrapper">
    <div class="carousel-overflow">
        <div class="slz-carousel slz-team-slide-slick slz-block-slide-slick" 
            data-slick-json="'.esc_attr( $slick_json ).'"
            data-slidestoshow="'.esc_attr( $column ).'"
            data-arrowshow="'.esc_attr( $model->attributes['slide_arrows'] ).'"
            data-dotshow="'.esc_attr( $model->attributes['slide_dots'] ).'"
            data-autoplay="'.esc_attr( $model->attributes['slide_autoplay'] ).'"
            data-infinite="'.esc_attr( $model->attributes['slide_infinite'] ).'"
            data-slidespeed="'.esc_attr( $model->attributes['slide_speed'] ).'" 
        >
';
$classRowEnd = '</div></div></div>';
$classInlineBlock = '';
$classCarousel = '';

$block_cls = $data['model']->attributes['extra_class'] . ' ' . $data['uniq_id'] . ' ' . $classCarousel;
$data['block_cls'] = $block_cls;
$data['classInlineBlock'] = $classInlineBlock;
$data['classRowBegin'] = $classRowBegin;
$data['classRowEnd'] = $classRowEnd;
$data['slick_json'] = $slick_json;

switch ( $data['layout'] ) {
    case 'layout-1':
        echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
        break;
    case 'layout-2':
        echo slz_render_view( $instance->locate_path('/views/layout-2.php'), compact('data'));
        break;
	case 'layout-3':
	    echo slz_render_view( $instance->locate_path('/views/layout-3.php'), compact('data'));
	    break;
	case 'layout-4':
	    echo slz_render_view( $instance->locate_path('/views/layout-4.php'), compact('data'));
	    break;
	case 'layout-5':
	    echo slz_render_view( $instance->locate_path('/views/layout-5.php'), compact('data'));
	    break;
	case 'layout-6':
	    echo slz_render_view( $instance->locate_path('/views/layout-6.php'), compact('data'));
	    break;
    default:
        echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
        break;
}