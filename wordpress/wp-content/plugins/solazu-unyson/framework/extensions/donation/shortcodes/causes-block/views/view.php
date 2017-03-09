<?php if ( ! defined( 'SLZ' ) ) { die( 'Forbidden' ); }

switch ( $data['layout'] ) {
	case 'layout-1':
		if( $data['column_1'] == '4' ) {
			$data['image_size'] = array(
				'large'           => '263x174',
				'no-image-large'  => '263x174'
			);
		}elseif ( $data['column_1'] == '2' ) {
			$data['image_size'] = array(
				'large'           => '560x370',
				'no-image-large'  => '560x370'
			);
		}elseif ( $data['column_1'] == '3' ) {
			$data['image_size'] = array(
				'large'           => '360x238',
				'no-image-large'  => '360x238'
			);
		}else {
			$data['image_size'] = array(
				'large'           => '750x495',
				'no-image-large'  => '750x495'
			);
		}
		break;
	case 'layout-2':
		$data['image_size'] = array(
			'large'           => '560x370',
			'no-image-large'  => '560x370'
		);
		break;
	default:
		break;
}

$model = new SLZ_Causes();
$model->init( $data );

$uniq_id = $model->attributes['uniq_id'];
$block_cls = $model->attributes['extra_class'] . ' ' . $uniq_id;
$data['block_cls'] = $block_cls;
$data['uniq_id'] = $uniq_id;
$data['model'] = $model;

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
    default:
        echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
        break;
}