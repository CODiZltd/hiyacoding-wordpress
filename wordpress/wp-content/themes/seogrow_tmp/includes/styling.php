<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'seogrow_implement_options' ) == false ){

	function seogrow_implement_options() {

		$custom_css = '';
		$post_id = get_the_ID();
		$post_type = get_post_type();
		
		$post_type_arr = slz()->theme->get_config('active_posttype_ext');
		$post_type_arr['post'] = '';
		$page_header_key = 'general';
		
		if( is_single() && isset($post_type_arr[$post_type]) ){
			$page_header_key = $post_type;
		}
		$settings = slz_get_db_settings_option(); // array settings

		//content padding
		$ct_padding_top  = slz_get_db_post_option( $post_id , 'ct-padding-top', '' );
		$ct_padding_bottom  = slz_get_db_post_option( $post_id , 'ct-padding-bottom', '' );

		if( $ct_padding_top != ''){
			$custom_css .= '.slz-main-content {padding-top: '.esc_attr($ct_padding_top).'px;}';
		}
		if( $ct_padding_bottom != ''){
			$custom_css .= '.slz-main-content {padding-bottom: '.esc_attr($ct_padding_bottom).'px;}';
		}

        if ( isset( $settings['bg-header-main'] ) && $bg_header = $settings['bg-header-main'] ) {
            $bg_header_main = SLZ_Com::get_palette_selected_color( $bg_header );
            $custom_css .= '.slz-header-main {background-color: '.esc_attr($bg_header_main).'}';
        }

		// layout
		if ( isset( $settings['layout-group'] ) && $layout_group = $settings['layout-group'] ) {
			if ( isset($layout_group['layout']) && $layout_group['layout'] == 'boxed'){
				add_filter( 'body_class','seogrow_add_body_clas
					s_boxed' );
				$background = slz_akg('boxed/boxed-background', $layout_group, array());
				$custom_css .= '.slz-wrapper-content {background-color: white;}';

				if ( isset($layout_group['boxed']['bg-color']) && $bg_color = $layout_group['boxed']['bg-color'] ) {
					$boxed_bg_color = SLZ_Com::get_palette_selected_color( $bg_color );
					$custom_css .= '.slz-boxed-layout{ background-color: ' . esc_attr( $boxed_bg_color ) . '}';
				}

				$bg_icon = $background['data']['icon'];
                if ( !empty($bg_icon) ) {
                    $custom_css .= '.slz-boxed-layout{ background: url(\'' . $bg_icon . '\') no-repeat center center fixed; background-size: cover;}';
				}

				if ( is_numeric( slz_akg('boxed/boxed-width', $layout_group, '' ) ) ) {
					$custom_css .= '.slz-boxed-layout{ width: ' . slz_akg('boxed/boxed-width', $layout_group, 1200 ) . 'px}';
				}

				$align = slz_akg('boxed/boxed-alignment', $layout_group, 'center');
				if ( $align != 'center' ){
					add_filter( 'body_class','seogrow_add_body_class_' . $align );
				}
			}
		}
		//page header
		if( isset( $settings[$page_header_key.'-pagetitle'] ) && $pagetitle_options = $settings[$page_header_key.'-pagetitle'] ){

			$background_type = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/bg-image/bg-image-type',slz_akg('enable/bg-image/bg-image-type', $pagetitle_options, '' ));

			if( (is_single() || is_page()) && $background_type == 'feature-image' ){
				if( !post_password_required() && has_post_thumbnail() ){
					$bg_image = get_the_post_thumbnail_url(null, 'full');
				}
			} else {
				$bg_image = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/bg-image/upload-image/background-image/data/icon',slz_akg('enable/bg-image/upload-image/background-image/data/icon', $pagetitle_options, '' ));
			}
			
			$bg_attachment = slz_akg('enable/bg-attachment', $pagetitle_options, '');
			$bg_size = slz_akg('enable/bg-size', $pagetitle_options, '');
			$bg_position = slz_akg('enable/bg-position', $pagetitle_options, '');

			$height = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/height',slz_akg('enable/height', $pagetitle_options, '' ));
			$text_align = slz_akg('enable/text-align', $pagetitle_options, '');

            $bg_header = SLZ_Com::merge_options('pagetitle-options','enable/bg-header-main',slz_akg('enable/bg-header-main', $pagetitle_options, '' ));
            if( !empty( $bg_header ) ) {
                $bg_header_main = SLZ_Com::get_palette_selected_color( $bg_header );
                $custom_css .= '.slz-header-main {background-color: '.esc_attr($bg_header_main).'}';
            }

			if(!empty($bg_image)){
				$custom_css .= '.slz-title-command {background-image: url(\''.$bg_image.'\');}';
			}
			if(!empty($bg_attachment)){
				$custom_css .= '.slz-title-command {background-attachment:'.esc_attr($bg_attachment).';}';
			}
			if(!empty($bg_size)){
				$custom_css .= '.slz-title-command {background-size:'.esc_attr($bg_size).';}';
			}
			if(!empty($bg_position)){
				$custom_css .= '.slz-title-command {background-position:'.esc_attr($bg_position).';}';
			}
			if(!empty($text_align)){
				$custom_css .= '.slz-title-command {text-align:'.esc_attr($text_align).';}';
			}
			
			if(!empty($height)){
				$custom_css .= '.slz-title-command .title-command-wrapper {padding: '.esc_attr($height).'px 0;}';
			}
			//title
			if( isset( $pagetitle_options['enable']['general-pagetitle-title'] ) && $pagetitle_title = $pagetitle_options['enable']['general-pagetitle-title'] ){
				$size = slz_akg( 'enable/title-typography/size',$pagetitle_title, '' );
				$color = slz_akg( 'enable/title-typography/color',$pagetitle_title, '' );
	
				if( $size || $color ) {
					if( $size ) {
						$size = 'font-size: '.esc_attr($size) .'px;';
					}
					if( $color ) {
						$color = 'color: '.esc_attr($color) .';';
					}
					$custom_css .= '.slz-title-command .title-command-wrapper  .title{'.$size . $color.'}';
				}
			}
			//breadcrumb
			if( isset( $pagetitle_options['enable']['general-pagetitle-bc'] ) && $pagetitle_bc = $pagetitle_options['enable']['general-pagetitle-bc'] ){

				$size = slz_akg( 'enable/breadcrumb/size',$pagetitle_bc, '' );
				$color = slz_akg( 'enable/breadcrumb/color',$pagetitle_bc, '' );
	
				if( $size || $color ) {
					if( $size ) {
						$size = 'font-size: '.esc_attr($size) .'px;';
					}
					if( $color ) {
						$color = 'color: '.esc_attr($color) .';';
					}
					$custom_css .= '.slz-title-command .breadcrumb-link{'.$size . $color.'}';
				}
				$size_act = slz_akg( 'enable/breadcrumb-active/size',$pagetitle_bc, '' );
				$color_act = slz_akg( 'enable/breadcrumb-active/color',$pagetitle_bc, '' );
	
				if( $size_act || $color_act ) {
					if( $size_act ) {
						$size_act = 'font-size: '.esc_attr($size_act) .'px;';
					}
					if( $color_act ) {
						$color_act = 'color: '.esc_attr($color_act) .';';
					}
					$custom_css .= '.slz-title-command .breadcrumb-active{'.$size_act . $color_act.'}';
				}
			}
		}
		//scroll to top
		if ( isset($settings['enable-scroll-to']) && $settings['enable-scroll-to'] == 'yes' ) {
			$seogrow_scroll_settings = slz_get_db_settings_option('scroll-to-top-styling', '');
			if ( !empty ( $seogrow_scroll_settings['btt-styling']) ) {
				$btn_style = $seogrow_scroll_settings['btt-styling']['nomal'];
				if( !empty($btn_style['bg-color']) ) {
					$bg_color = SLZ_Com::get_palette_selected_color( $btn_style['bg-color'] );
					if ( !empty ( $bg_color ) ) {
						$custom_css .= '.back-to-top:not(.special) .btn{ background-color: ' . esc_attr( $bg_color ) . '}';
						$custom_css .= '.back-to-top:not(.special) .btn:hover{ border-color: ' . esc_attr( $bg_color ) . '}';
					}
				}

				if( isset($btn_style['text-color']) && $text_color = $btn_style['text-color'] ) {
					$text_color = SLZ_Com::get_palette_selected_color( $text_color );
					if ( !empty ( $text_color ) ) {
						$custom_css .= '.back-to-top:not(.special) i { color: ' . esc_attr( $text_color ) . '}';
					}
				}

			}

		}
		if( isset($settings['404-background-image']) && $page_404_bg = $settings['404-background-image'] ){
			if ( !empty ( $page_404_bg['data']['icon'] ) && $page_404_bg['data']['css'] != 'none' ){
				$custom_css .= '.content-wrapper-404{ background-image: url(\'' . $page_404_bg['data']['icon'] . '\');}';
			}
		}
		
		$theme_setting_custom_styles = slz_get_db_settings_option('custom_styles', '');
		if( !empty( $theme_setting_custom_styles ) ) {
			$custom_css .= $theme_setting_custom_styles;
		}
		
		if( $custom_css ) {
			do_action( 'slz_add_inline_style', $custom_css);
		}
	}
}
seogrow_implement_options();

if ( function_exists( 'seogrow_add_body_class_boxed' ) == false ){

	function seogrow_add_body_class_boxed( $classes ) {

		$classes[] = 'slz-boxed-layout';

		return $classes;
			
	}

}

if ( function_exists( 'seogrow_add_body_class_left' ) == false ){

	function seogrow_add_body_class_left( $classes ) {

		$classes[] = 'layout-algin-left';

		return $classes;
			
	}

}

if ( function_exists( 'seogrow_add_body_class_right' ) == false ){

	function seogrow_add_body_class_right( $classes ) {

		$classes[] = 'layout-algin-right';

		return $classes;
			
	}

}

if ( function_exists( 'seogrow_add_body_class_center' ) == false ){

	function seogrow_add_body_class_center( $classes ) {

		$classes[] = 'layout-algin-center';

		return $classes;
	}

}