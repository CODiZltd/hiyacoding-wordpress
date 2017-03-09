<?php
class SLZ_Vc_Params
{
	public function __construct()
	{
		$slz_params_list = SLZ_Vc_Params::params_vc();
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			if(!empty($slz_params_list)) {
				foreach ($slz_params_list as $param){
					vc_add_shortcode_param( $param, array( &$this, '_' . $param . '_form_field' ) , slz_get_framework_directory_uri().'/static/js/slz-vc-edit-form.js' );
				}
			}
		}
	}

	public static function params_vc() {
		return array(
			'attach_files'
		);
	}

	public function _attach_files_form_field( $settings, $value, $tag, $single = false ) {
		$output = '';
		$output .= '<input type="hidden" class="wpb_vc_param_value gallery_widget_attached_images_ids '
			. $settings['param_name'] . ' '
			. $settings['type'] . '" name="' . $settings['param_name'] . '" value="' . $value . '"/>';
		$output .= '<div class="gallery_widget_attached_images">';
		$output .= '<ul class="gallery_widget_attached_images_list">';
		if('' !== $value) {
			$files = explode( ',', $value );
			foreach ($files as $file) {
				$output .='<li class="added">';

				if(wp_attachment_is_image($file)){
					$thumb_src = wp_get_attachment_image_src( $file, 'thumbnail' );
					$thumb_src = isset( $thumb_src[0] ) ? $thumb_src[0] : '';
					$output .= '<img rel="' . esc_attr( $file ) . '" src="' . esc_url( $thumb_src ) . '" />';

				}else {
					$output .= '<a href="'.esc_attr(get_the_title($file)).'" title="'.esc_attr(get_the_title($file)).'">';
					$type = wp_check_filetype(wp_get_attachment_url($file));
					$output .= SLZ_Util::get_icon_for_extension($type['ext']);
					$output .= '</a>';
				}
				$output .= '<a href="#" class="vc_icon-remove" style="width: 16px;height: 16px;display: block;position: absolute;top: 50%;left: 50%; transform: translate(-50%,-50%);">
						<i class="vc-composer-icon vc-c-icon-close" style="font-size: 18px;color: #FF7877; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);"></i></a></li>';

			}
		}
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '<div class="gallery_widget_site_images">';
		$output .= '</div>';
		if ( true === $single ) {
			$output .= '<a class="gallery_widget_add_images button" href="#" use-single="true" title="'
				. esc_html__( 'Add File', 'slz' ) . '">' . esc_html__( 'Add File', 'slz' ) . '</a>'; //class: button
		} else {
			$output .= '<a class="gallery_widget_add_images button" href="#" title="'
				. esc_html__( 'Add Files', 'slz' ) . '">' . esc_html__( 'Add Files', 'slz' ) . '</a>'; //class: button
		}

		return $output;
	}

} new SLZ_Vc_Params();