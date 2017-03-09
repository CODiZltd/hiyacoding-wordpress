<?php if ( ! defined( 'SLZ' ) ) { die( 'Forbidden' ); }
$model = new SLZ_Event();
$model->init( $data );
$uniq_id = $model->attributes['uniq_id'];
$block_cls = $model->attributes['extra_class'] . ' ' . $uniq_id;
$html_render = array();


$has_image = 'has-image';
if( $data['image_display'] != 'show' ) {
	$has_image = '';
}

$html_format = '
	<div class="item">
		<div class="slz-block-item-05 '. esc_attr( $has_image ) .' style-1">
		    %1$s
		    %2$s
		    <div class="block-content">
		        <div class="block-content-wrapper">
		            %3$s
		            %4$s
		            %10$s
		        </div>
		    </div>
		    <div class="clearfix"></div>
			%5$s
		</div>
	</div>
';
$html_render['html_format'] = $html_format;
?>
<div class="slz-shortcode sc_event_block <?php echo esc_attr( $block_cls ); ?>">
	<?php if( !empty( $data['title'] ) ): ?>
	<div class="slz-title-shortcode"><?php echo esc_html( $data['title'] ); ?></div>
	<?php endif; ?>
	<?php echo '<div class="slz-list-block slz-column-1">'; ?>
	<?php $model->render_event_sc( $html_render ); ?>
	<?php echo '</div>'; ?>
</div>