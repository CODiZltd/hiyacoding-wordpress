<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$header = new Seogrow_Welcome();
$header->get_theme_header();
?>
<div class="wrap about-wrap slz-wrap">
	<div class="slz-demo-themes slz-install-plugins slz-history">
		<dl class="slz-changelog-list">
			<dd>
				<h3><?php echo esc_html__('Version 1.1 -- 11 January 2017 ', 'seogrow')?></h3>
				<div class="des">
					<div class="update-content">
						<ul>
							<li>Added: Ribbon format of post.</li>
							<li>Updated: Solazu-Unyson plugin.</li>
							<li>Improved: Revolution Slider.</li>
							<li>Improved: SLZ Icon Box shortcode.</li>
							<li>Improved: SLZ Portfolio shortcode.</li>
							<li>Improved: SLZ Post Block shortcode.</li>
							<li>Improved: SLZ Pricing Box shortcode.</li>
							<li>Improved: SLZ Map shortcode.</li>
							<li>Improved: SLZ Team List shortcode.</li>
							<li>Improved: SLZ Button shortcode.</li>
							<li>Improved: SLZ About Me shortcode.</li>
							<li>Improved: Responsive.</li>
							<li>Improved: Import Demo.</li>
						</ul>
					</div>	
				</div>
			</dd>
			<dd>
				<h3><?php echo esc_html__('Version 1.0', 'seogrow')?></h3>
				<div class="des"> 
					<div class="update-content">
						<ul>
							<li><?php echo esc_html__('Initital', 'seogrow')?></li>
						</ul>
					</div>	
				</div>
			</dd>
		</dl>
	</div>
</div>