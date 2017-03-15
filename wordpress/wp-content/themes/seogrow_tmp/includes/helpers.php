<?php
/*--------------------Sidebar Func << ----------------*/
if ( ! function_exists( 'seogrow_get_sidebar' ) ) :
	function seogrow_get_sidebar( $sidebar ) {
		if ( is_active_sidebar( $sidebar ) ) {
			dynamic_sidebar( $sidebar );
		}
	}
	endif;
if ( ! function_exists( 'seogrow_get_container_class' ) ) :
	function seogrow_get_container_class( $template = '' ) {
		$default = 'seogrow-custom-sidebar';
		$instance = array(
			'show_sidebar'          => false,
			'sidebar'               => $default,
			'sidebar_layout_class'  => '',
			'sidebar_class'         => '',
			'content_class'         => '',
			'sidebar_layout'        => 'left',
			'block_class'           => 'slz-column-1',
		);
		extract($instance);

		if ( defined( 'SLZ' ) && function_exists('slz_extra_get_container_class')) {
			slz_extra_get_container_class( $template, $instance );
			extract($instance);
		}
		// layout
		if ( $sidebar_layout != 'none' ) {
			$sidebar_layout_class = 'slz-sidebar-' . $sidebar_layout;
			$content_class = 'col-md-8 col-sm-12';
			$sidebar_class = 'col-md-4 col-sm-12';
			$show_sidebar = true;
		}else{
			$content_class = 'col-md-12 col-sm-12';
		}
		if ( empty ( $sidebar ) ) {
			$sidebar = $default;
		}

		$seogrow_container = array(
			'show_sidebar'          => $show_sidebar,
			'sidebar_layout_class'  => $sidebar_layout_class,
			'sidebar_class'         => $sidebar_class,
			'content_class'         => $content_class,
			'sidebar_layout'        => $sidebar_layout,
			'sidebar'               => $sidebar,
			'block_class'           => $block_class,
		);
		return $seogrow_container;
	}
endif;
if ( ! function_exists( 'seogrow_slz_enqueue_style' ) ) :
	function seogrow_slz_enqueue_style() {
		if ( defined( 'SLZ' ) ) {
			if ( !is_admin() ) {
				$css_shortcodes = slz()->theme->manifest->get('css_supported_shortcodes', array());
				$ext = slz_ext('shortcodes');
				$version = slz()->theme->manifest->get_version();
				//css
				if( $ext ) {
					foreach($css_shortcodes as $name){
						wp_enqueue_style(
								'seogrow-slz-extension-shortcodes-' . $name,
								$ext->locate_URI( '/static/css/seogrow-'.$name.'.css' ),
								array(),
								$version
						);
					}
				}
			}
		}
	}
endif;
/*--------------------Post Func << --------------------*/
if ( ! function_exists( 'seogrow_posts_pagination' ) ) :
	function seogrow_posts_pagination() {
		?>
		<div class="slz-pagination">

			<?php the_posts_pagination( array(
				'prev_text'          => esc_html__( 'Previous', 'seogrow' ),
				'next_text'          => esc_html__( 'Next', 'seogrow' ),
				'screen_reader_text' => ' ',
			) ); ?>

		</div>
		<?php
	}
endif;

if ( ! function_exists( 'seogrow_post_nav' ) ) :
	function seogrow_post_nav() {
		global $post;
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous )
			return;
		?>
		<nav class="post-navigation row" >
			<div class="col-md-12">
				<div class="nav-links">
					<div class="pull-left prev-post">
					<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'seogrow' ) ); ?>
					</div>
					<div class="pull-right next-post">
					<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'seogrow' ) ); ?>
					</div>
				</div><!-- .nav-links -->
			</div>
		</nav><!-- .navigation -->
		<?php
		}
endif;
if ( ! function_exists( 'seogrow_sticky_ribbon' ) ) :
	/**
	 * Display sticky ribbon.
	*/
	function seogrow_sticky_ribbon(){
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<div class="slz-sticky"><div class="inner"></div></div>';
		}
	}
endif;
if ( ! function_exists( 'seogrow_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 */
	function seogrow_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		?>

		<div class="block-image">

			<a class="post-thumbnail" href="<?php echo esc_url(seogrow_get_link_url()); ?>" aria-hidden="true">

				<?php
					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'class' => 'img-responsive img-full' ) );
				?>

			</a>

		</div>

		<?php
	}
endif;

if ( ! function_exists( 'seogrow_post_detail_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 */
	function seogrow_post_detail_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		?>
		<div class="slz-featured-block">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'class' => 'img-responsive' ) );
				?>
			</a>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'seogrow_get_post_format' ) ) :
	
	function seogrow_get_post_format($object) {
		
		$is_video = $object->is_video();
		$is_audio = $object->is_audio();
		$is_quote = $object->is_quote();
		$is_gallery = $object->is_gallery();
		$iframe_data = SLZ_Post_Feature_Video::get_video_url_iframe( $object->post_id );

		if( $is_video && $iframe_data ) {
			return 'video';
		}elseif( $is_quote ) {
			return 'quote';
		}elseif( $is_gallery ){
			return 'gallery';
		}elseif( $is_audio ) {
			return 'audio';
		}else{
			return 'image';
		}
	}

endif;

if ( ! function_exists( 'seogrow_first_category' ) ) :

	function seogrow_first_category( $post, $class = 'block-category', $format = null ) {

		$out = '';

		if( $format == null ) $format = '<a href="%1$s" class="%3$s">%2$s</a>';

		$cat = current( get_the_category( $post ) );


		if ( $cat ) {

			$out = sprintf( $format, get_category_link($cat->cat_ID), esc_html( $cat->name ), $class );

		}

		return $out;

	}

endif;

if ( ! function_exists( 'seogrow_entry_meta' ) ) :

	function seogrow_entry_meta() {

		edit_post_link( esc_html__( 'Edit', 'seogrow' ), '<li class="edit-link"><i class="fa fa-pencil"></i>', '</li>' );

		$format = get_post_format();
		if ( current_theme_supports( 'post-formats', $format ) ) {
			printf( '<li>%1$s<a href="%2$s" class="link postformat">%3$s</a></li>',
				_x( 'Format: ', 'Used before post format.', 'seogrow' ),
				esc_url( get_post_format_link( $format ) ),
				get_post_format_string( $format )
			);
		}

		if ( 'post' === get_post_type() ) {
			printf( '<li>%1$s <a href="%2$s"  class="link author">%3$s</a></li>',
				_x( 'By ', 'Used before post author name.', 'seogrow' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date()
			);

			printf( '<li><a href="%1$s" class="link date" rel="bookmark">%2$s</a></li>',
				esc_url( seogrow_get_link_url() ),
				$time_string
			);
		}

		if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			printf('<li><a href="%1$s" class="link comment">%2$s</a></li>', esc_url( get_comments_link() ), get_comments_number_text() );
		}

}
endif;

if ( ! function_exists( 'seogrow_tags_meta' ) ) :

	function seogrow_tags_meta( $container = true ) {

		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'seogrow' ) );
		if ( $tags_list ) {
			$format = '<li>%1$s%2$s</li>';
			if( $container ) {
				$format = '<ul class="tags-list"><li>%1$s%2$s</li></ul>';
			}
			printf( $format,
					esc_html_x( 'Tags:', 'Used before tag names.', 'seogrow' ),
					$tags_list
			);
		}

	}
endif;
if ( ! function_exists( 'seogrow_categories_meta' ) ) :

	function seogrow_categories_meta( $container = true ) {

		$categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'seogrow' ) );

		if ( $categories_list ) {
			$format = '<li>%1$s%2$s</li>';
			if( $container ) {
				$format = '<ul class="categories-list"><li>%1$s%2$s</li></ul>';
			}
			printf( $format,
					esc_html_x( 'Categories:', 'Used before category names.', 'seogrow' ),
					$categories_list
			);
		}
	}
endif;
if ( ! function_exists( 'seogrow_get_link_url' ) ) :
	/**
	 * Return the post URL.
	*
	* @uses get_url_in_content() to get the URL in the post meta (if it exists) or
	* the first link found in the post content.
	*
	* Falls back to the post permalink if no URL is found in the post.
	*
	*
	* @return string The Link format URL.
	*/
	function seogrow_get_link_url() {
		$has_url = '';
		if( get_post_format() == 'link') {
			$content = get_the_content();
			$has_url = get_url_in_content( $content );
		}
		return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	}
endif;

if ( ! function_exists( 'seogrow_fonts_url' ) ) :

	function seogrow_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		if ( 'off' !== _x( 'on', 'Noto+Sans font: on or off', 'seogrow' ) ) {
			$fonts[] = 'Noto+Sans:300,400,600,700,800';
		}

		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'seogrow' ) ) {
			$fonts[] = 'Poppins:300,400,400italic,500,600,700,900';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

endif;

if ( ! function_exists( 'seogrow_return_memory_size' ) ) :

	function seogrow_return_memory_size( $size ) {
		$symbol = substr( $size, -1 );
		$return = (int)$size;
		switch ( strtoupper( $symbol ) ) {
			case 'P':
				$return *= 1024;
			case 'T':
				$return *= 1024;
			case 'G':
				$return *= 1024;
			case 'M':
				$return *= 1024;
			case 'K':
				$return *= 1024;
		}
		return $return;
	}

endif;

if ( ! function_exists( 'seogrow_check_extension' ) ) :

	function seogrow_check_extension( $extension ) {

		if ( !defined( ('SLZ') ) )
			return false;


		return slz()->extensions->_get_db_active_extensions( $extension );

	}

endif;
if ( ! function_exists( 'seogrow_check_article_layout' ) ) :

	function seogrow_check_article_layout( $extension, $layout ) {

		if ( !defined( ('SLZ') ) )
			return false;
		$template = '';

		$db_template = slz_get_db_settings_option($layout, false);
		$theme_default = slz()->theme->manifest->get('post_template_default', array() );
		if( empty($db_template) && !empty($theme_default[$layout])) {
			$db_template = $theme_default[$layout];
		}
		if( $db_template && is_object( slz_ext($extension) ) ) {
			$template = slz_ext($extension)->get_article( $db_template );
		}

		return $template;
	}

endif;
if ( ! function_exists( 'seogrow_check_post_layout' ) ) :

	function seogrow_check_post_layout( $extension, $layout ) {

		if ( !defined( ('SLZ') ) )
			return false;
		$template = '';
		$post_template = slz_get_db_post_option( get_the_ID(), 'post-template' );
		if( $post_template && $post_template != 'default') {
			$db_template = $post_template;
		} else {
			$db_template = slz_get_db_settings_option($layout, false);
		}
		$theme_default = slz()->theme->manifest->get('post_template_default', array() );

		if( empty($db_template) && !empty($theme_default[$layout])) {
			$db_template = $theme_default[$layout];
		}

		if( $db_template && is_object( slz_ext($extension) ) ) {
			$template = slz_ext($extension)->get_post( $db_template );
		}

		return $template;
	}

endif;
if ( ! function_exists( 'seogrow_show_help_link' ) ) :
	function seogrow_show_help_link() {?>
		<div class="help-links">
		<?php
		$menu_location = 'page-404-nav' ;
		$locations = get_nav_menu_locations();
			if( isset($locations[$menu_location]) ):?>
				<h3 class="title"><?php esc_html_e('Helpful Links', 'seogrow')?></h3>
				<div class="help-links-content row"><?php
					$nav_items = wp_get_nav_menu_items( $locations[$menu_location] );
					if( $nav_items ) {
						$item_columns = array_chunk($nav_items, ceil(count($nav_items) / 3));
						if( $item_columns ) {
							foreach( $item_columns as $columns ) {
								if( $columns ) {
									echo '<div class="col-md-4 col-sm-4">';
										echo '<ul class="list-useful list-unstyled">';
											foreach( $columns as $menu_item ){
												printf('<li><a class="link" href="%1$s">%2$s</a></li>', esc_url($menu_item->url), esc_html($menu_item->title) );
											}
										echo '</ul>';
									echo '</div>';
								}
							}
						}
					}?>
				</div><?php
			endif;
			?>
		</div>
	<?php }
endif;

if ( ! function_exists( 'seogrow_is_post_type_archive' ) ) :
	function seogrow_is_post_type_archive() {
		if( is_post_type_archive('slz-portfolio') || is_tax( 'slz-portfolio-cat' ) ) {
			return 'portfolio';
		} else if( is_post_type_archive('slz-service') || is_tax( 'slz-service-cat' ) ) {
			return 'service';
		} else if( is_post_type_archive('slz-team') || is_tax( 'slz-team-cat' ) ) {
			return 'team';
		} else if( is_post_type_archive('slz-gallery') || is_tax( 'slz-gallery-cat' )
				|| is_post_type_archive('slz-testi')   || is_tax( 'slz-testi-cat' ) ){
			return '99';
		}

		return false;
	}
endif;

// Breadcrumb
if ( ! function_exists( 'seogrow_get_breadcrumb' ) ) :
	function seogrow_get_breadcrumb()
	{
		if ( class_exists( 'WooCommerce' ) && get_post_type() == 'product' )
		{
			$breadcrumbs = new WC_Breadcrumb();
			$breadcrumbs->add_crumb( esc_html_x( 'Home', 'breadcrumb', 'seogrow' ), apply_filters( 'woocommerce_breadcrumb_home_url', esc_url( home_url('/') ) ) );
		} else {
			$breadcrumbs = new Seogrow_Breadcrumb();
			$breadcrumbs->add_crumb( esc_html_x( 'Home', 'breadcrumb', 'seogrow' ), apply_filters( 'seogrow_breadcrumb_home_url', esc_url( home_url('/') ) ) );
		}
		return $breadcrumbs->generate();
	}
endif;

/*--------------------Page Title << --------------------*/
if(! function_exists( 'seogrow_show_slider_area' ) ) :
	function seogrow_show_slider_area() {
		global $seogrow_glb_options;
		$show_slider = false;
		$seogrow_glb_options['show_pagetitle'] = 'disable';
		$seogrow_glb_options['show_title'] = 'disable';
		if ( defined( 'SLZ' ) && function_exists('slz_extra_show_slider') ) {
			slz_extra_show_slider( $show_slider );
		}
		if( ! $show_slider ) {
			if( ! is_front_page() && ! is_home() ){
				seogrow_show_page_title();
			}
		}
	}
endif;
if ( ! function_exists( 'seogrow_get_title' ) ) :
	function seogrow_get_title( $args = array() ){
		$def_args = array(
			'count_breadcrumb' => '',
		);
		$title = '';
		$args = array_merge( $def_args, $args );
		$is_custom_archive = false;
		$post_id = get_the_ID();
		$post_type = get_post_type();
		/////////////////
		if ( defined( 'SLZ' ) ) {
			$post_type_arr = slz()->theme->get_config('active_posttype_ext');
			$post_type_arr['post'] = '';
			
			if( is_single() && isset($post_type_arr[$post_type]) ){
				$page_type = $post_type;
			}else{
				$page_type = 'general';
			}
			$theme_options = slz_get_db_settings_option();
			$page_options = slz_get_db_post_option( get_the_ID(), 'pagetitle-options');
			$title_setting = array();
			if( isset($page_options['enable-page-option']) && $page_options['enable-page-option'] == 'enable'
					&& isset($page_options['enable']['group-pagetitle']['enable']['enable-pt-title']) && $page_options['enable']['group-pagetitle']['enable']['enable-pt-title'] == 'enable' ){
				if( !empty($page_options['enable']['group-pagetitle']['enable']['type-of-title']['title-type']) && $page_options['enable']['group-pagetitle']['enable']['type-of-title']['title-type']!='default'){
					$title_setting = $page_options['enable']['group-pagetitle']['enable']['type-of-title'];
				}
			}
			if( empty($title_setting) ) {

				$archive_map = array('slz-portfolio' =>'portfolio-ac-title');
				if( isset($archive_map[$post_type]) && is_post_type_archive($post_type) ) {
					if( isset($theme_options[$archive_map[$post_type]]) ) {
						$title_setting = $theme_options[ $archive_map[$post_type] ];
						$is_custom_archive = true;
					}
				} else {
					if( isset($theme_options[$page_type.'-pagetitle']['enable']) && $group_pageheader = $theme_options[$page_type.'-pagetitle']['enable']){
						if( isset($group_pageheader['general-pagetitle-title']) && $setting_options = $group_pageheader[ 'general-pagetitle-title' ]){
							if( isset($setting_options['enable-pt-title']) && $setting_options['enable-pt-title'] == 'enable'
									&& isset($setting_options['enable']['type-of-title'])){
								$title_setting = $setting_options['enable']['type-of-title'];
							}
						}
					}


				}
			}
			if( !empty($title_setting) && isset($title_setting['title-type']) && isset($title_setting['custom']) ){
				if( $title_setting['title-type'] == 'custom' && !empty($title_setting['custom']['custom-title'])) {
					$title = $title_setting['custom']['custom-title'];
				} else if($title_setting['title-type'] == 'level') {
					if( is_single() ) {
						$taxonomy_name = 'category';
						if($post_type != 'post' && in_array($post_type,$post_type_arr)) {
							$taxonomy_name = $post_type . '-cat';
						}
						$categories = get_the_terms( $post_id, $taxonomy_name );
						if ( $categories && ! is_wp_error( $categories ) ) {
							$cat = current( $categories );
							$title = $cat->name;
						} else {
							$post_type_obj = get_post_type_object( $post_type );
							$title = $post_type_obj->labels->singular_name;
						}
					} elseif(is_post_type_archive($post_type)) {
						$post_type_obj = get_post_type_object( $post_type );
						$title = $post_type_obj->labels->singular_name;
					}
				}
			}
		} else {
			if( is_single() ) {
				$cat = current( get_the_category( $post_id ) );
				if( $cat ) {
					$title = $cat->name;
				}
			}
		}
		///////////////
		if( empty($title)) {
			$title = get_the_title();
		}
		$output_title = '';
		if ( is_search() ) {
			$output_title = sprintf( esc_html__( 'Search results', 'seogrow' ), get_search_query() );
		} elseif( is_archive() ) {
			if ( is_month() ) {
				$output_title = sprintf( '%s' , get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'seogrow' ) ) );
			} elseif ( is_day() ) {
				$output_title = sprintf( '%s' , get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'seogrow' ) ) );
			} else{
				if( ! $is_custom_archive ) {
					$output_title = get_the_archive_title();
				}
			}
		} else if( is_404() ) {
			$output_title = esc_html__( 'Error 404', 'seogrow' );
		}
		if( empty($output_title) ) {
			$output_title = esc_html($title);
		}
		return wp_kses_post( $output_title );
	}
endif;
if ( ! function_exists( 'seogrow_show_title' ) ) :
	function seogrow_show_title( $before = '', $after = '' ){
		global $seogrow_glb_options;
		if( $seogrow_glb_options['show_pagetitle'] != 'enable'
				&& $seogrow_glb_options['show_title'] == 'enable' ) {
					$title = seogrow_get_title();
					if( ! empty($title) ) {
						return $before . $title . $after;
					}
				}
	}
endif;
if ( ! function_exists( 'seogrow_show_page_title' ) ) :
	function seogrow_show_page_title() {
		global $seogrow_glb_options;
		$subheader = $subheader_class = '';
		if ( defined( 'SLZ' ) ) {

			$post_type_arr = slz()->theme->get_config('active_posttype_ext');
			$post_type_arr['post'] = '';
			$post_type = get_post_type();
			if( is_single() && isset($post_type_arr[$post_type]) ){
				$post_type = get_post_type();
			}else{
				$post_type = 'general';
			}
			$options = slz_get_db_post_option( get_the_ID(), 'pagetitle-options', '' );

			// page title
			$pagetitle_options = slz_get_db_settings_option( $post_type.'-pagetitle', '');
			$show_pagetitle = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable-page-title',slz_akg('enable-page-title', $pagetitle_options, '' ));
			// title
			$pt_title_options = slz_akg( 'enable/general-pagetitle-title', $pagetitle_options, '');
			$show_title = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/enable-pt-title',slz_akg('enable-pt-title',$pt_title_options, '' ));

			// breadcrumb
			$pt_bc_options = slz_akg( 'enable/general-pagetitle-bc', $pagetitle_options, '');
			$show_bc  = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/enable-pt-breadcrumb',slz_akg('enable-pt-breadcrumb', $pt_bc_options, '' ));

			$header = slz_get_db_settings_option('slz-header-style-group/slz-header-style', '');
			$subheader = slz_get_db_settings_option('slz-header-style-group/'.$header.'/enable-subheader/enable', '');
			//subheader class
			if( $subheader == 'show' ){
				$subheader_class = "header-absolute";
			}
		}else{
			$show_pagetitle = 'enable';
			$show_title = 'enable';
			$show_bc = 'enable';
		}
		if( $show_pagetitle != 'enable') {
			$show_title = '';
			$show_bc = '';
		}
		$seogrow_glb_options['show_pagetitle'] = $show_pagetitle;
		$seogrow_glb_options['show_title'] = $show_title;

		if($show_pagetitle != 'enable'){
			return;
		}
		$breadcrumb = seogrow_get_breadcrumb();
		$count_breadcrumb = count($breadcrumb);

		?>
			<div class="slz-title-command page-title-area <?php echo esc_attr($subheader_class);?>">
				<div class="container">
					<div class="title-command-wrapper">
						<?php

						if( $show_title == 'enable' ){
							$args = array(
								'count_breadcrumb' => $count_breadcrumb,
							);
							echo '<h1 class="title">';
								echo seogrow_get_title( $args );
							echo '</h1>';
						}

						if( $show_bc == 'enable' ){
							$breadcrumb_html = '';
							if ( $breadcrumb ) {

								foreach ( $breadcrumb as $key => $crumb ) {
									if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
										$breadcrumb_html .= '<li class="breadcrumb-item"><a class="breadcrumb-link" href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a></li>';
									} else {
										if( ! empty( $crumb[0] ) ) {
											$breadcrumb_html .= '<li class="breadcrumb-item"><a class="breadcrumb-active">' . esc_html( $crumb[0] ) . '</a></li>';
										}
									}
								}
							}?>
							<div class="breadcrumb-wrapper">
								<?php printf('<ol class="breadcrumb">%s</ol>', $breadcrumb_html );?>
							</div>
						<?php }?>

					</div>
				</div>
			</div>
		<?php }
	endif;

/*--------------------Comment << --------------------*/
/*move field of comment form*/
if ( ! function_exists( 'seogrow_move_comment_field' ) ) :
	function seogrow_move_comment_field( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'seogrow_move_comment_field' );
endif;
// Comment Form
if(! function_exists( 'seogrow_comment_form' ) ) :
	function seogrow_comment_form() {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );
		$html_req  = ( $req ? " required='required'" : '' );
		$format    = 'xhtml';//The comment form format. Default 'xhtml'. Accepts 'xhtml', 'html5'.
		$html5     = 'html5' === $format;
		$author_field = sprintf(
				'<div class="comment-form-author">
						<label for="author">%4$s<span class="required">*</span></label>
						<input id="author" name="author" type="text" value="%1$s" %2$s>
						<div id="author-err-required" class="input-error-msg hide">%3$s</div>
					</div>',
				esc_attr( $commenter['comment_author'] ),//value
				$aria_req . $html_req,
				esc_html__( 'Please enter your name.', 'seogrow' ),//error message
				esc_html__('Name ', 'seogrow')

		);
		$email_field = sprintf(
				'<div class="comment-form-email">
						<label for="email">%6$s<span class="required">*</span></label>
						<input  id="email" name="email" %5$s value="%1$s" size="30" %2$s />
						<div class="input-error-msg hide" id="email-err-required">%3$s</div>
						<div class="input-error-msg hide" id="email-err-valid">%4$s</div>
					</div>',
				esc_attr( $commenter['comment_author_email'] ),//value
				$aria_req . $html_req,
				esc_html__( 'Please enter your email address.', 'seogrow' ),//error message
				esc_html__( 'Please enter a valid email address.', 'seogrow' ),//error message
				( $html5 ? 'type="email"' : 'type="text"' ),
				esc_html__('Email ', 'seogrow')

		);

		$comment_field = sprintf(
				'<div class="comment-form-comment">
						<label for="email">%2$s<span class="required">*</span></label>
						<textarea id="comment" name="comment" required="required"></textarea>
						<div class="input-error-msg hide" id="comment-err-required">%1$s</div>
					</div>',
				esc_html__( 'Please enter comment.', 'seogrow' ),//error message
				esc_html__('Your Comment ', 'seogrow')
		);

		$url_field = sprintf(
				'<div class="comment-form-url">
						<label for="url">%3$s</label>
						<input id="url" name="url" value="%1$s" %2$s >
					</div>',
				esc_attr( $commenter['comment_author_url'] ),//value
				(  $html5 ? 'type="url"' : 'type="text"' ),
				esc_html__('Website ', 'seogrow')
		);

		$comments_args = array(
			'cancel_reply_link'   => esc_html__( 'Cancel', 'seogrow' ),
			'comment_notes_before'=> '',
			'format'              => $format,
			'fields'              => array( 'author' => $author_field, 'email' => $email_field,'url' => $url_field),
			'logged_in_as'        => '',
			'class_form'          => 'comment-form',
			'id_form'             => 'commentform',
			'comment_field'       => $comment_field,
			'label_submit'        => esc_html__( 'Submit Comment ', 'seogrow' ),
			'title_reply_before'  => '<h3 class="title">',
			'title_reply_after'   => '</h3>',
			'title_reply'         => esc_html__( 'Leave your comment', 'seogrow' ),
			'submit_button'       => '<div class="form-submit"><input name="%1$s" id="%2$s" type="submit" value="%4$s" class="%3$s submit "></div>',
			'submit_field'        => '%1$s%2$s',
		);
		return $comments_args;
	}
endif;
// 404 page
if(! function_exists( 'seogrow_404_page' ) ) :
	function seogrow_404_page() {
		$options = array(
			'title'            => esc_html__( 'Page Not Found', 'seogrow' ),
			'description'      => '',
			'home_text'        => esc_html__( 'Back To Home', 'seogrow' ),
			'button_text'      => esc_html__( 'Need Help', 'seogrow' ),
			'bg_text'          => esc_html__( '404', 'seogrow' ),
			'button_link'      => '',
			'404-illustration' => '',
		);
		if ( defined( 'SLZ' ) ) {
			$map = array(
				'title'            => '404-title',
				'home_text'        => '404-btn-text',
				'button_text'      => '404-btn-02-text',
				'description'      => '404-description',
				'404-background'   => '404-background-image',
				'404-illustration' => '404-illustration',
			);
			$settings = slz_get_db_settings_option();
			if( isset($settings['404-title'])){
				$options['title'] = $settings['404-title'];
			}
			foreach( $map as $key => $val ) {
				if( !empty($settings[$val]) ){
					$options[$key] = $settings[$val];
				}
			}
			if( !empty($settings['404-btn-02-link']) ){
				$options['button_link'] =  $settings['404-btn-02-link'];
			}
		}
		return $options;
	}
endif;

/**
 * Custom callback function, see comments.php
 *
 */
 if ( ! function_exists( 'seogrow_display_comments' ) ) :
	function seogrow_display_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		$comment_id = get_comment_ID();
		$rate = '';

		$queried_object = get_queried_object();
		$post_type = $queried_object->post_type;
		if( defined( 'SLZ' ) ) {
			$post_type_arr = slz()->theme->get_config('posts_rating');
			if( isset($post_type_arr[$post_type]) ){

				$rating = get_comment_meta( $comment_id, $post_type_arr[$post_type], true);

				if($rating){
					if ( $rating == 1 ) {
						$class_rate = 'width-20';
					}elseif ( $rating == 2 ) {
						$class_rate = 'width-40';
					}elseif ( $rating == 3 ) {
						$class_rate = 'width-60';
					}elseif ( $rating == 4 ) {
						$class_rate = 'width-80';
					}elseif ( $rating == 5 ) {
						$class_rate = 'width-100';
					}

					$rate = sprintf('<div class="ratings">
				                <div class="star-rating">
				                    <span class="%1$s">
				                        <strong class="rating">%2$s.00 out of 5</strong>
				                    </span>
				                </div>
				            </div>', esc_attr($class_rate), esc_html( $rating ) );
				}
			}
		}

		$comment_reply_link_args = array(
			'depth'  => $depth,
			'before' => '<div class="comment-feedback-wrapper">'.($rate).'<span class="action-type">',
			'after'  => '</span></div>'
		);
		?>

		<li id="li-comment-<?php echo esc_attr($comment_id) ?>" class="comment">
			<div id="div-comment-<?php echo esc_attr($comment_id) ?>" class="comment-body">
				<div class="media-left author-photo-wrapper">
					<a href="<?php esc_url ( get_comment_author_url( $comment ) ); ?>" class="author-photo">
						<?php echo get_avatar($comment, 50, '', esc_html__('User Avatar', 'seogrow'), array('class' => array('media-object') ) ); ?>
					</a>
				</div>
				<div class="media-body body-not-hidden">
					<div class="heading-wrapper">
						<div class="comment-info-wrapper">
							<div class="author-name"><?php echo get_comment_author_link(); ?></div>
							<ul class="info">
								<li>
									<a href="<?php esc_url ( get_comment_author_url( $comment ) ); ?>" class="link">
										<?php echo get_comment_date(); ?>
									</a>
								</li>
								<li>
									<a href="<?php esc_url ( get_comment_author_url( $comment ) ); ?>" class="link">
										<?php echo get_comment_time(); ?>
									</a>
								</li>
							</ul>
						</div>
	
					<div class="comment-content">
						<?php comment_text() ?>
					</div>
					<?php echo comment_reply_link( array_merge ( $args, $comment_reply_link_args ) ); ?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php
	}
endif;

if(! function_exists( 'seogrow_get_subcribe' ) ) :
	function seogrow_get_subcribe($position) {
		if ( defined( 'SLZ' )) {
			//theme option
			$options = slz_get_db_settings_option( 'subcribe' );
			$enable_subcribe = slz_akg( 'enable-subcribe', $options, '' );
			$title = slz_akg( 'show/subcribe_title', $options, '' );
			$btn_text = slz_akg( 'show/styling/btn-text', $options, '' );
			$btn_url = slz_akg( 'show/styling/btn-link', $options, '' );
			$enable_btn_icon = slz_akg( 'show/styling/btn-icon/selected-value', $options, '' );
			$sb_position = slz_akg( 'show/position', $options, '' );
			$description = slz_akg( 'show/subcribe_content', $options, '' );
			$block_bg_color= slz_akg( 'show/styling/block-bg-color', $options, '');
			$block_bg_image= slz_akg( 'show/styling/bg-image/data/icon', $options, '');
			$btn_bg_color = slz_akg( 'show/styling/btn-bg-color', $options, '');
			$btn_color = SLZ_Com::get_palette_selected_color( slz_akg( 'show/styling/btn-color', $options, '') );
			$title_color = SLZ_Com::get_palette_selected_color( slz_akg( 'show/styling/title-color', $options, '') );

			//page option
			$page_option = slz_get_db_post_option( get_the_ID(), 'subcribe', array());
			if( slz_akg( 'subcribe-setting', $page_option, '') != 'default') {
				$enable_subcribe = slz_akg('custom/subcribe-enable', $page_option, '');
				$sb_position = slz_akg('custom/position', $page_option, '');
			}

			if($enable_subcribe == 'show'){
				$btn = '';
				if($position != $sb_position)
				{
					return;
				}
				if(!empty($title)){
					$title = '<div class="title-wrapper">
					            <h1 class="title">'.esc_attr($title).'</h1>
					        </div>';
				}
				if(!empty($description)){
					$description = '<div class="description">'.$description.'</div>';
				}
				if(!empty($btn_text)){
					$icon = '';
					if($enable_btn_icon == 'yes'){
						$btn_icon = slz_akg( 'show/styling/btn-icon/yes/icon-class', $options, '' );
						if(!empty($btn_icon)){
							$icon = '<i class="icons '. esc_attr($btn_icon) .'"></i>';
						}
					}
					$btn = '<a href="'.esc_url($btn_url).'" class="slz-btn">'.esc_attr($btn_text).$icon.'</a>';
				}
				printf('<div class="banner-subcribe slz-banner-01 style-2">
							<div class="container">
								<div class="content-wrapper">
									<div class="description">
								    	<div class="subcribe-info">
									       	%1$s
									       	%2$s
								       	</div>
									</div>
									<div class="slz-group-btn">
								       %3$s
									</div>
								</div>
							</div>
						</div>',
					wp_kses_post($title),
					wp_kses_post($description),
					wp_kses_post($btn)
				);

				$custom_css = '';

				if(!empty($block_bg_color)){
					$custom_css .= '.banner-subcribe {background-color:'.esc_attr($block_bg_color).';}';
				}
				if(!empty($title_color)){
					$custom_css .= '.banner-subcribe .title{ color:'.esc_attr($title_color).';}';
				}
				if(!empty($btn_bg_color)){
					$custom_css .= '.banner-subcribe .slz-btn{ 
						background-color:'.esc_attr($btn_bg_color).';
						border-color:'.esc_attr($btn_bg_color).';
					}';
					$custom_css .= '.banner-subcribe .slz-btn:hover{ 
						background-color:transparent;
						border-color:'.esc_attr($btn_bg_color).';
						color:'.esc_attr($btn_bg_color).';
					}';
				}
				if(!empty($btn_color)){
					$custom_css .= '.banner-subcribe .slz-btn{ 
						color:'.esc_attr($btn_color).';
					}';
				}
				if(!empty($block_bg_image)){
					$custom_css .= '.banner-subcribe{ 
						background-image:url('.esc_url($block_bg_image).');
					}';
				}
				if( $custom_css ) {
					do_action( 'slz_add_inline_style', $custom_css);
				}

			}
		}
	}
endif;
if ( ! function_exists( 'seogrow_setting_woocommerce' ) ) :
	function seogrow_setting_woocommerce( $output_html = false ){
		if ( defined( 'SLZ' )) {
			$settings = slz_get_db_settings_option();
			$args = array(
				'posts_per_page' => 4,
				'columns'        => 4
			);
			if( isset($settings['product-related-post']['status']) && $settings['product-related-post']['status'] == 'show' ) { //status
				if( isset($settings['product-related-post']['show']['limit']) ) {
					$args['posts_per_page'] = $settings['product-related-post']['show']['limit'];
				}
				if( isset($settings['product-related-post']['show']['column']) ) {
					$args['columns'] = absint($settings['product-related-post']['show']['column']);
				}
			}
			if( $output_html ){
				echo '<div class="slz-woocommerce-setting" data-show="'.esc_attr($args['columns']).'"></div>';
			}
			return $args;
		}
	}
endif;

