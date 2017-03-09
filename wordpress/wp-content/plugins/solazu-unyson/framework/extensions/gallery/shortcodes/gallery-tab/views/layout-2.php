<?php 

$html_format = '
	<div class="grid-item %1$s %4$s">
		<div class="slz-block-gallery-01 style-1">
			<div class="block-image">
				<a href="%2$s" class="link fancybox-thumb"><img src="%3$s" class="img-responsive img-full" alt=""></a>
				<span class="dh-overlay"></span>
			</div>
		</div>
	</div>';

$html_render['html_format'] = $html_format;

list($filter_tab, $output_grid ) = $data['model']->render_filter_tab($data['model']->attributes, $html_render );
?>

<div class="slz-shortcode sc_gallery_tab <?php echo esc_attr( $data['block_cls'] );?>" data-block-class=".<?php echo esc_attr( $data['uniq_id']);?>">
	<?php 
	printf('<div class="tab-list-wrapper slz-isotope-nav">
		<ul class="tab-list tab-filter" role="tablist">%1$s</ul></div>',
			$filter_tab);
	?>
	<div class="tab-content">
	<?php 
		printf($output_grid);	
	?>
	</div>
</div>