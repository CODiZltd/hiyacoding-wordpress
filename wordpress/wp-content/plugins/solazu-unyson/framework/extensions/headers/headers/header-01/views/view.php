<?php
$header_class = '';
$transparent = false;
$search_icon = 'fa fa-search';
if ( !empty ( $search_style['icon-class'] ) ) {

	$search_icon = $search_style['icon-class'];

}

$logo_class = 'float-l';
$main_menu_class = 'float-r';

if ( slz_akg('logo-align', $options, 'left') == 'right'){

	$main_menu_class = 'float-l';
	$logo_class = 'float-r';

}


list($header_class,$transparent) = slz_get_header_transparent(slz_get_db_settings_option('slz-header-style-group/slz-header-style',''));

// sub header
$subheader_icon = $subheader_class = $subheader_mask = '';
if( slz_akg( 'enable-subheader/enable', $options, '' ) == 'show' ):
	$subheader_class = 'slz-has-subheader';
	$subheader_icon = 
		'<a href="#" class="slz-menu-icon">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</a>';
	$subheader_mask = '<div class="subheader-mask"></div>';
endif;

?>
<header>
	<div class="slz-header-wrapper <?php echo esc_attr($header_class);?>">
		<?php
		if ( slz_akg('enable-header-top-bar/selected-value', $options, 'no' ) == 'yes' && apply_filters('slz_ext_headers_disable_top_bar', true)) : ?>
			<div class="slz-header-topbar">
				<div class="container">
					<div class="slz-topbar-list float-l">
						<?php echo slz_display_topbar_content('social', slz_akg('yes/left-position', $topbar, array()), array('customize-icon' => slz_akg('yes/customize-icon', $topbar, array()),'button'=>slz_akg('yes/button', $topbar, array())) ); ?>
					</div>
					<div class="slz-topbar-list float-r">
						<?php echo slz_display_topbar_content('social', slz_akg('yes/right-position', $topbar, array()), array('customize-icon' => slz_akg('yes/customize-icon', $topbar, array()),'button'=>slz_akg('yes/button', $topbar, array())) );
						// wpml language
						if(has_action('wpml_add_language_selector')) {
						$show_laguage_switcher = slz_get_db_settings_option('enable-wpml', '');
							if($show_laguage_switcher == 'yes'){
								echo '<div class="wpml-language item">';
									do_action('wpml_add_language_selector');
								echo '</div>';
							}
						}?>
						<?php SLZ_Com::get_woo_account();?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php endif; ?>

		<!-- header main -->
		<?php 
		if( empty($options['show-main-menu']) || (!empty($options['show-main-menu']) && $options['show-main-menu'] == 'show')):?>
			<div class="slz-header-main <?php if ( slz_akg('enable-sticky-header', $options, '') == 'yes' ) echo 'slz-header-sticky'.' '.esc_attr($subheader_class);?>">
				<div class="container">
					<!-- hamburger menu mobile-->
	                <div class="slz-hamburger-menu">
	                    <div class="bar"></div>
	                </div>
	                <div class="slz-main-menu-mobile"> 
						<div class="nav-wrapper">
							<div class="nav-search">
								<?php get_search_form(true); ?>
							</div>
						</div>
						<?php slz_theme_nav_menu( 'main-nav' ); ?>
	                </div>
					<?php echo slz_get_logo('slz-logo-wrapper ' . $logo_class, $transparent ); ?>

					<div class="slz-main-menu <?php echo esc_attr($main_menu_class); ?>">
						
						<?php slz_theme_nav_menu( 'main-nav' ); ?>

						<?php if ( slz_akg('enable-search', $options, 'no' ) == 'yes') : ?>

							<div class="slz-button-search"><i class="icons <?php echo esc_attr($search_icon); ?>"></i></div>

							<div class="nav-wrapper hide">

								<div class="nav-search">

									<?php get_search_form(true); ?>

								</div>

							</div>
							
						<?php endif; ?>
					</div>

					<!-- sub header icon -->
					<?php echo wp_kses_post($subheader_icon);?>

					<div class="clearfix"></div>
				</div>
			</div>
		<?php endif;?>

		<!-- sub header -->
		<?php echo wp_kses_post($subheader_mask);?>
		<?php if( slz_akg( 'enable-subheader/enable', $options, '' ) == 'show' ):?>
			<div class="slz-sub-header slz-sub-menu slz-main-menu">
				<div class="slz-navbar-wrapper">
	                <div class="slz-menu-wrapper">
	                <!-- contact -->
						<?php if( slz_akg( 'enable-subheader/show/enable-contact', $options, '' ) == 'show' ):?>
								<div class="contact">
								 <a href="#" class="slz-close-contact">
		                            <span class="line"></span>
		                            <span class="line"></span>
		                            <span class="line"></span>
	                            </a>
	                            <div class="inner">
									<?php 
										$contact_form =  slz_akg( 'enable-subheader/show/contact-form', $options, '' ); 
										if( !empty( $contact_form ) &&  is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) :
											echo '<div class="contact-form">';
												echo do_shortcode('[contact-form-7 id="'.$contact_form.'"]');
											echo '</div>';
										endif;
									?>
									</div>
								</div>
						<?php endif;?>
	                    <div class="inner">

	                        <div class="menu-heading">
	                            <div class="action-top">
		                            <a href="#" class="slz-menu-icon">
			                            <span class="line"></span>
			                            <span class="line"></span>
			                            <span class="line"></span>
		                            </a>
									<?php if( slz_akg( 'enable-subheader/show/enable-contact', $options, '' ) == 'show' ):?>
										<?php
											$btn_text = slz_akg( 'enable-subheader/show/contact-text', $options, '' ); ?>
											<a href="" class="slz-btn btn-contact-toggle"><span class="btn-text"><?php echo esc_attr($btn_text);?></span>
											</a>
									<?php endif;?>
	                               
	                            </div>

	                            <!-- add short code -->

	                            <div class="app-post">
									<?php 
										$shortcode = slz_akg( 'enable-subheader/show/add_shortcode', $options, '' );
										if( !empty( $shortcode) ):
											echo '<div class="sc-content">';
											echo do_shortcode( $shortcode );
											echo '</div>';
										endif;
									?>
	                            </div>
	                        </div>
	                        <div class="menu-body">
	                            <!-- sub menu -->
								<?php if( slz_akg( 'enable-subheader/show/enable-submenu', $options, '' ) == 'show' ):?>
									<!-- hamburger menu mobile-->
					                <div class="slz-sub-menu-mobile"> 
										<?php slz_theme_nav_menu( 'sub-nav' ); ?>
					                </div>
									<div class="slz-sub-menu">
										<?php slz_theme_nav_menu( 'sub-nav' ); ?>
									</div>
									<div class="clearfix"></div>
								<?php endif;?>
	                        </div>
	                    </div>
	                </div>
	            </div>
			</div>
		<?php endif;?>

		<!-- end sub header -->
		
	</div>
</header>