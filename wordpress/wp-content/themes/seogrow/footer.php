<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage SEOGrow
 * @since 1.0
 */
?>

<?php 

//show subcribe
seogrow_get_subcribe('footer');

if ( seogrow_check_extension('footers') ) {

	if ( is_page( ) ) {

		$footer_options = slz_get_db_post_option( get_the_ID(), 'page-footer-style' );

		$seogrow_selected_footer = slz_akg('footer-style', $footer_options, '' );
		if ( $seogrow_selected_footer == 'default' )
			unset ( $seogrow_selected_footer );

	}

	if ( empty ( $seogrow_selected_footer ) && slz_get_db_settings_option('slz-footer-style-group/slz-footer-style', false) ){

		$seogrow_selected_footer = slz_get_db_settings_option('slz-footer-style-group/slz-footer-style', '');

	}

	if ( !empty ( $seogrow_selected_footer ) ) {

		$seogrow_footer = slz_ext('footers')->get_footer( $seogrow_selected_footer );

		if ( !empty ( $seogrow_footer ) ) {
			$seogrow_footer->render();
		}

	}

}
else
	get_template_part('default-templates/footer');

?>

	</div>
</div>
<?php

	if ( defined('SLZ') ) {

		if ( slz_get_db_settings_option('enable-scroll-to', '') == 'yes' ) {
			$seogrow_scroll_settings = slz_get_db_settings_option('scroll-to-top-styling', '');

			$seogrow_icon = '<i class="fa fa-angle-up"></i>';

			if ( !empty ($seogrow_scroll_settings['btt-styling']) ) {

				$btn_style = $seogrow_scroll_settings['btt-styling']['nomal'];

				if ( $btn_style['icon-type']['icon-box-img'] == 'icon-class' && ! empty( $btn_style['icon-type']['icon-class']['icon_class'] ) ) {

					$seogrow_icon = '<i class="' . esc_attr( $btn_style['icon-type']['icon-class']['icon_class'] ) . '"></i>';

				} elseif ( $btn_style['icon-type']['icon-box-img'] == 'upload-icon' && ! empty( $btn_style['icon-type']['upload-icon']['upload-custom-img'] ) ) {

					$seogrow_icon = '<img src="' . esc_url ( $btn_style['icon-type']['upload-icon']['upload-custom-img']['url'] ) . '"/>';
				}

			}
			if( !empty($seogrow_scroll_settings['btt-styling']['style']) && $seogrow_scroll_settings['btt-styling']['style'] == 'nomal'){
					echo '<div class="btn-wrapper back-to-top"><a href="#top" class="btn btn-transparent">' . wp_kses_post( $seogrow_icon ) . '</a></div>';
			}else{
				echo '<div class="btn-wrapper back-to-top special"><a href="#top" class="btn btn-transparent"></a></div>';
			}
		}

	}
?>
<?php
if( defined('SLZ') && function_exists('slz_get_live_setting') ) {
	slz_get_live_setting();
}
?>
<?php wp_footer(); ?>

</body>
</html>
