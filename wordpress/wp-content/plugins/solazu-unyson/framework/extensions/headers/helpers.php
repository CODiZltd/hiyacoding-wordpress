<?php if (!defined('SLZ')) die('Forbidden');

if ( ! function_exists( 'slz_get_socials' ) ) :
	/**
	 * Display socials buttons
	 *
	 * @param string $class
	 */
	function slz_get_socials( $class ) {

		$social_key = apply_filters('slz_theme_social_setting_key', 'socials');

		$socials = slz_get_db_settings_option( $social_key );

		if ( ! empty( $socials ) ) {
			$arr = array();
			$socials_html = '';
			// parse all socials
			foreach ( $socials as $social ) {
				$icon = '';
				if ( $social['social_type']['social-type'] == 'icon-social' ) {
					// get icon class
					if ( ! empty( $social['social_type']['icon-social']['icon_class'] ) ) {
						$icon .= '<i class="icons ' . $social['social_type']['icon-social']['icon_class'] . '"></i>';
					}
				} else {
					// get uploaded icon
					if ( ! empty( $social['social_type']['upload-icon']['upload-social-icon'] ) ) {
						$icon .= '<img src="' . $social['social_type']['upload-icon']['upload-social-icon']['url'] . '" alt="" />';
					}
				}

				// get social link
				$link = esc_url($social['social-link']);
				$item = '';
				if( strchr( $social['social_type']['icon-social']['icon_class'] , 'fa fa-') ) {
					$arr = array();
					$item = str_replace( 'fa fa-', '',$social['social_type']['icon-social']['icon_class'] );

					$arr = explode('-', $item);
					$item = $arr[0];
					
				}
				$socials_html .= '<a class="link share-'. $item .'" target="_blank" href="' . $link . '">' . $icon . '</a>';
			}

			// return socials html
			return '<div class="' . esc_attr($class) . '">' . $socials_html . '</div>';
		}
	}
endif;

if ( ! function_exists( 'slz_get_customize_icon' ) ) :
	/**
	 * Display icons buttons
	 *
	 * @param string $class
	 */
	function slz_get_customize_icon( $class, $settings=array() ) {

		$icon_key = apply_filters('slz_theme_customize_icon_setting_key', 'customize-icon');

		$position_key = apply_filters('slz_theme_position_setting_key', 'customize-icon');

		$icons = slz_get_db_settings_option( $icon_key );

		if ( ! empty( $icons ) ) {
			$icons_html = '';
			// parse all icons
			foreach ( $icons as $icon ) {
				$icon_data = '';

				switch ( $settings['icon-display'] ) {
					case 'icon':
						if ( $icon['icon_type']['icon-type'] == 'icon' ) {
							// get icon class
							if ( ! empty( $icon['icon_type']['icon']['icon_class'] ) ) {
								$icon_data .= '<i class="' . $icon['icon_type']['icon']['icon_class'] . '"></i>';
							}
						} else {
							// get uploaded icon
							if ( ! empty( $icon['icon_type']['upload-icon']['upload-icon'] ) ) {
								$icon_data .= '<img src="' . $icon['icon_type']['upload-icon']['upload-icon']['url'] . '" alt="" />';
							}
						}
						break;
					case 'text':

						$icon_data .= ( !empty ( $icon['icon_name'] ) ? $icon['icon_name'] : '' );
						break;

					case 'both':

						if ( $icon['icon_type']['icon-type'] == 'icon' ) {
							// get icon class
							if ( ! empty( $icon['icon_type']['icon']['icon_class'] ) ) {
								$icon_data .= '<i class="' . $icon['icon_type']['icon']['icon_class'] . '"></i>';
							}
						} else {
							// get uploaded icon
							if ( ! empty( $icon['icon_type']['upload-icon']['upload-icon'] ) ) {
								$icon_data .= '<img src="' . $icon['icon_type']['upload-icon']['upload-icon']['url'] . '" alt="" />';
							}
						}

						if ( slz_akg('both/text-position', $settings, '') == 'left' )

							$icon_data = ( !empty ( $icon['icon_name'] ) ? $icon['icon_name'] : '' ) . ' ' .$icon_data;

						else

							$icon_data = $icon_data . ' ' .( !empty ( $icon['icon_name'] ) ? $icon['icon_name'] : '' );

						break;
					default:
						break;
				}

				// get icon link
				$link = esc_url($icon['icon-link']);
				if( !empty($link)) {
					$icons_html .= '<a class="text" target="_blank" href="' . $link . '">' . $icon_data . '</a>';
				} else {
					$icons_html .= '<span class="text" >' . $icon_data . '</span>';
				}
			}

			// return icons html
			return '<div class="customize-icon ' . esc_attr($class) . '">' . $icons_html . '</div>';
		}
	}
endif;


if ( ! function_exists( 'slz_display_topbar_content' ) ) :
	/**
	 * Display socials buttons
	 *
	 * @param string $class
	 */
	function slz_display_topbar_content( $class, $data, $settings=array() ) {

	
		$result = '';

		foreach ($data as $option) {
				
			switch ( $option ) {

				case 'menu':

					$result .= slz_theme_nav_menu( 'top-nav' );

					break;

				case 'social':

					$result .= slz_get_socials( $class );
					break;

				case 'icon':
					$result .= slz_get_customize_icon( $class, $settings['customize-icon'] );
					break;

				case 'button':
					$result .= slz_get_button($settings['button']);
					break;

				default:
					break;
			}

		}

		return $result;
	}
endif;


if ( ! function_exists( 'slz_get_button' ) ) :
	/**
	 * Display button on top bar
	 *
	 * @param string $settings
	 */
	function slz_get_button($settings=array()) {
		$custom_css = '';
	
		if ( !empty ( $settings['bg-color'] ) ){
			$custom_css .= '.slz-header-topbar .slz-btn{ 
				background-color: ' . esc_attr( $settings['bg-color'] ) . ' ;
			}';
		}
		if ( !empty ( $settings['bg-hv-color'] ) ){
			$custom_css .= '.slz-header-topbar .slz-btn:hover{ 
				background-color: ' . esc_attr( $settings['bg-hv-color'] ) . ' ;
			}';
		}
		if ( !empty ( $settings['text-color'] ) ){
			$custom_css .= '.slz-header-topbar .slz-btn{ 
				color: ' . esc_attr( $settings['text-color'] ) . ' ;
			}';
		}
		if ( !empty ( $settings['text-hv-color'] ) ){
			$custom_css .= '.slz-header-topbar .slz-btn:hover{ 
				color: ' . esc_attr( $settings['text-hv-color'] ) . ' ;
			}';
		}
		if ( !empty ( $settings['bd-color'] ) ){
			$custom_css .= '.slz-header-topbar .slz-btn{ 
				border-color: ' . esc_attr( $settings['bd-color'] ) . ' ;
			}';
		}
		if ( !empty ( $settings['bd-hv-color'] ) ){
			$custom_css .= '.slz-header-topbar .slz-btn:hover{ 
				border-color: ' . esc_attr( $settings['bd-hv-color'] ) . ' ;
			}';
		}
		do_action('slz_add_inline_style', $custom_css);

		if ( ! empty( $settings['btn-text'] ) ) {
			return '<a href="'.esc_url($settings['btn-link']).'" class="slz-btn"><span class="btn-text">'.esc_attr($settings['btn-text']).'</span></a>';
		}

	}
endif;

if ( ! function_exists( 'slz_get_socials' ) ) :
	/**
	 * Display socials buttons
	 *
	 * @param string $class
	 */
	function slz_get_socials( $class ) {

		$social_key = apply_filters('slz_theme_social_setting_key', 'socials');

		$socials = slz_get_db_settings_option( $social_key );

		if ( ! empty( $socials ) ) {
			$socials_html = '';
			// parse all socials
			foreach ( $socials as $social ) {
				$icon = '';
				if ( $social['social_type']['social-type'] == 'icon-social' ) {
					// get icon class
					if ( ! empty( $social['social_type']['icon-social']['icon_class'] ) ) {
						$icon .= '<i class="' . $social['social_type']['icon-social']['icon_class'] . '"></i>';
					}
				} else {
					// get uploaded icon
					if ( ! empty( $social['social_type']['upload-icon']['upload-social-icon'] ) ) {
						$icon .= '<img src="' . $social['social_type']['upload-icon']['upload-social-icon']['url'] . '" alt="" />';
					}
				}

				// get social link
				$link = esc_url($social['social-link']);

				$socials_html .= '<a target="_blank" href="' . $link . '">' . $icon . '</a>';
			}

			// return socials html
			return '<div class="' . esc_attr($class) . '">' . $socials_html . '</div>';
		}
	}
endif;


if ( ! function_exists( 'slz_get_logo' ) ) :
	/**
	 * Display site logo
	 *
	 * @param string $class
	 */
	function slz_get_logo( $class, $transparent = false ) {

		$logo_key = apply_filters('slz_theme_logo_setting_key', 'logo');

		$logo_settings = slz_get_db_settings_option( $logo_key );
		
		$logo_alt = slz_get_db_settings_option( apply_filters('slz_theme_logo_alt_setting_key', 'logo-alt'), '' );

		$logo_text = slz_get_db_settings_option( apply_filters('slz_theme_logo_alt_setting_key', 'logo-text'), '' );

		$logo_title = slz_get_db_settings_option( apply_filters('slz_theme_logo_title_setting_key', 'logo-title'), '' );

		$logo_page = slz_get_db_post_option( get_the_ID() , 'page-logo', '' );

		if(!empty($logo_page)){
			$url = slz_akg('url', $logo_page, '' );
		}else{
			$url = slz_akg('url', $logo_settings, '' );
		}

		$logo_html = '';

		if ( ! empty( $url ) ) {

			$logo_html = '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo">';
				if( $transparent ) {
					$logo_transparent_key = apply_filters('slz_theme_logo_setting_key', 'logo-transparent');
					$logo_transparent_settings = slz_get_db_settings_option( $logo_transparent_key );
					$logo_page_transparent = slz_get_db_post_option( get_the_ID() , 'page-logo-transparent', '' );
					
					if( isset( $logo_page_transparent['logo_transparent_options'] ) && $logo_page_transparent['logo_transparent_options'] == 'enable' ) {
						if( !empty( $logo_page_transparent['enable']['logo-transparent']['attachment_id'] ) ) {
							$logo_html .= wp_get_attachment_image( $logo_page_transparent['enable']['logo-transparent']['attachment_id'], 'full', false, array( 'class' => 'img-responsive logo-header-transparent' ) );
						}
					}elseif( isset( $logo_transparent_settings['logo_transparent_options'] ) && $logo_transparent_settings['logo_transparent_options'] == 'enable' ){
						if( !empty( $logo_transparent_settings['enable']['logo-transparent']['url'] ) ) {
							$logo_html .= '<img src="' . esc_url( $logo_transparent_settings['enable']['logo-transparent']['url'] ) . '" alt="' . esc_attr( $logo_alt ) . '" title="' . esc_attr( $logo_title ) . '" class="img-responsive logo-header-transparent" />';
						}
					}
				}
				$logo_html .= '<img src="' . esc_url($url) . '" alt="' . esc_attr( $logo_alt ) . '" title="' . esc_attr( $logo_title ) . '" class="img-responsive" />';
			$logo_html .= '</a>';
		}else{
			$logo_html = '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo">'.esc_html($logo_text).'</a>';
		}

		return '<div class="' . esc_attr($class) . '">' . $logo_html . '</div>';
	}
endif;

if ( ! function_exists( 'slz_get_header_transparent' ) ) :
	/**
	 * Header Transparent
	 *
	 * @param string $header
	 */
	function slz_get_header_transparent( $header ) {

		$out_put = array();
		$trans_page =  slz_get_db_post_option( get_the_ID() ,'page-header-transparent', '' );
		$trans_options = slz_get_db_settings_option('slz-header-style-group/'.$header, array() );

		$transparent = false;
		$header_class = '';

		if(!empty($trans_page)){
			if( $trans_page == 'header-transparent' ){
				$header_class = $trans_page;
				$transparent = true;
			}

		}else{
			if($trans_options['header-transparent'] == 'header-transparent'){
				$header_class = $trans_options['header-transparent'];
				$transparent = true;
			}
		};
		$out_put = array($header_class,$transparent);
		return $out_put;
	}
endif;

global $slz_menus;
$slz_menus = array(
	'top-nav'   => array(
		'echo'			  => false,
		'depth'           => 1,
		'container'       => 'ul',
		'menu_class'      => 'navbar-topbar',
		'theme_location'  => apply_filters('slz_theme_top_menu_key', 'top-nav'),
	),
	'main-nav' => array(
		'depth'           => 4,
		'container'       => 'ul',
		'menu_class'      => 'nav navbar-nav slz-menu-wrapper',
		'theme_location'  => apply_filters('slz_theme_main_menu_key', 'main-nav'),
		'link_before'     => '<span>',
		'link_after'      => '</span>',
		'after'           => '<span class="icon-dropdown-mobile fa fa-angle-down"></span>',
	),
	'sub-nav' => array(
		'depth'           => 4,
		'container'       => 'ul',
		'menu_class'      => 'nav navbar-nav slz-menu-wrapper',
		'theme_location'  => apply_filters('slz_theme_sub_menu_key', 'sub-nav'),
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	),
	'feature-nav' => array(
		'depth'           => 4,
		'container'       => 'ul',
		'menu_class'      => 'nav navbar-nav slz-menu-wrapper feature-nav',
		'theme_location'  => apply_filters('slz_theme_sub_menu_key', 'feature-nav'),
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	),
);


if ( ! function_exists( 'slz_theme_nav_menu' ) ) :
	/**
	 * Display the nav menu
	 */
	function slz_theme_nav_menu( $menu_type ) {
		global $slz_menus;
		$page_options = slz_get_db_post_option( get_the_ID() ,'page-main-menu');
		if( isset($page_options['options']) && $page_options['options'] == 'custom' 
				&& isset($page_options['custom']['main-menu']) && $page_menu = $page_options['custom']['main-menu'] ){
			$page_nav = $slz_menus['main-nav'];
			$page_nav['menu'] = $page_menu;
			wp_nav_menu( $page_nav);
		} else {
			if ( ! isset( $slz_menus[ $menu_type ] ) ) {
				return;
			}
			if ( has_nav_menu ( $menu_type ) ) {
				if ( isset ( $slz_menus[ $menu_type ]['echo'] ) && $slz_menus[ $menu_type ]['echo'] == false){
					return wp_nav_menu( $slz_menus[ $menu_type ] );
				}else {
					wp_nav_menu( $slz_menus[ $menu_type ] );
				}
			}
		}
	}
endif;
