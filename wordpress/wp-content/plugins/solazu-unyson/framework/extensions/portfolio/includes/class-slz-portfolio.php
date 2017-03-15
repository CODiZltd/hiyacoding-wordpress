<?php
class SLZ_Portfolio extends SLZ_Custom_Posttype_Model {

	private $post_type = 'slz-portfolio';
	private $post_taxonomy = 'slz-portfolio-cat';

	public function __construct() {
		$this->meta_attributes();
		$this->set_meta_attributes();
		$this->taxonomy_cat = $this->post_taxonomy;
		$this->html_format = $this->set_default_options();
		$this->set_sort_meta_key();
		$this->set_default_attributes();
	}
	public function meta_attributes() {
		$slz_merge_meta_atts = array();
		$meta_atts = array(
			'thumbnail'            => '',
			'description'          => '',
			'information'          => '',
			'font-icon'            => '',
			'gallery_images'       => '',
			'is_featured'          => '',
			'attach_ids'           => '',
			'history_status'       => '',
			'show_qrcode'          => '',
			'team_list'            => '',
			'goal'                 => '',
			'location'             => '',
			'donors'               => '',
			'people_benefits'      => '',
			'time'                 => array(
		        'from' => '',
		        'to' => '',
			),
		);
		foreach ($meta_atts as $key_gr => $value_gr) {
			if ( is_array($value_gr) ) {
				foreach ($value_gr as $key => $value) {
					$slz_merge_meta_atts[$key_gr.'/'.$key] = $value;
				}
			}
		}
		$this->post_meta_atts = array_merge($meta_atts, $slz_merge_meta_atts);
	}
	public function set_meta_attributes() {
		$meta_arr = array();
		$meta_label_arr = array();
		foreach( $this->post_meta_atts as $att => $name ){
			$key = $att;
			$meta_arr[$key] = '';
			$meta_label_arr[$key] = $name;
		}
		$this->post_meta_def = $meta_arr;
		$this->post_meta = $meta_arr;
		$this->post_meta_label = $meta_label_arr;
	}
	public function set_default_attributes(){
		// set attributes
		$default_atts = array(
			'template'			=> 'portfolio',
			'layout'			=> 'layout-1',
			'style'				=> 'style-1',
			'column'			=> '4',
			'limit_post'		=> '-1',
			'offset_post'		=> '0',
			'sort_by'			=> '',
			'post_id'			=> '',
			'method'			=> '',
			'list_category'		=> '',
			'category_slug'		=> '',
			'author'            => '',
			'list_post'			=> '',
			'show_description'  => '',
			'description_length' => '',
			'show_review_rating' => slz_get_db_settings_option('pf-review-rating', 'no' ),
			'show_author'        => '',
			'show_views'         => 'no',
			'show_date'          => '',
			'show_thumbnail'     => '',
			'show_category'      => '',
			'team'               => '',
		);
		$this->attributes = $default_atts;
	}
	public function set_sort_meta_key(){
		$posts_rating = slz()->theme->get_config('posts_rating');
		if ( isset($posts_rating[$this->post_type]) ) {
			$this->sort_meta_key['rating'] = $posts_rating[$this->post_type];
		}
	}
	public function init( $atts = array(), $query_args = array() ) {
		// set attributes
		$atts = array_merge( $this->attributes, $atts );
	
		if( empty( $atts['post_id'] ) ){
			if( $atts['method'] == 'cat' ) {
				if( empty( $atts['category_slug'] ) ) {
					list( $atts['category_list_parse'], $atts['category_slug'] ) = SLZ_Util::get_list_vc_param_group( $atts, 'list_category', 'category_slug' );
				}

				$atts['post_id'] = $this->parse_cat_slug_to_post_id(
											$this->taxonomy_cat,
											$atts['category_slug'],
											$this->post_type
										);
			}
			else {
				if(isset($atts['list_post'])){
					$list_post = (array) vc_param_group_parse_atts( $atts['list_post'] );
				}
				$atts['post_id'] = $this->parse_list_to_array( 'post', $list_post );
			}
		}
		if( !empty($atts['show_thumbnail']) && $atts['show_thumbnail'] == 'none') {
			$atts['show_thumbnail_meta'] = 'none';
		}elseif( !empty($atts['show_thumbnail']) && $atts['show_thumbnail'] == 'thumbnail') {
			$atts['show_thumbnail_meta'] = 'yes';
		}
		if( !empty($atts['show_featured_image']) && $atts['show_featured_image'] == 'no'){
			$atts['show_thumbnail'] = 'no';
		}

		//set meta query
		$this->meta_key_compare = 'LIKE';
		if(!empty($atts['team'])){
			$atts['meta_key'] = array('team_list' => $atts['team']);
		}
		
		$this->attributes = $atts;

		// query
		$default_args = array(
			'post_type' => $this->post_type,
		);
		$query_args = array_merge( $default_args, $query_args );
		// setting
		$this->setting( $query_args);
	}

	/*
	 * Return Term detail from list_category choose
	 */
	public function init_term( $atts = array() ) {
		$atts = array_merge( $this->attributes, $atts );
		$list_category = array();

		if( !empty( $atts['list_category'] ) ) {
			$term_arr = array();
			list( $atts['category_list_parse'], $atts['category_slug'] ) = SLZ_Util::get_list_vc_param_group( $atts, 'list_category', 'category_slug' );

			if ( empty( $atts['category_slug'] ) ) {
				$args = array(
					'taxonomy'   => $this->post_taxonomy,
				);
				$term_arr = get_terms($args);
				return $term_arr;
			}else{

				if( !empty( $atts['category_slug'] ) ) {
					foreach ( $atts['category_slug'] as $slug ) {
						if( empty( $slug ) ) {
							continue;
						}
						$term_arr[] = get_term_by( 'slug', $slug, $this->post_taxonomy );
					}
				}
				return $term_arr;
			}
		}
	}

	public function setting( $query_args ){
		if( !isset( $this->attributes['uniq_id'] ) ) {
			$this->attributes['uniq_id'] = $this->post_type . '-' .SLZ_Com::make_id();
		}
		// query
		$this->query = $this->get_query( $query_args, $this->attributes );
		$this->post_count = 0;
		if( $this->query->have_posts() ) {
			$this->post_count = $this->query->post_count;
		}
		$this->get_thumb_size();
		$this->set_responsive_class();

		$custom_css = $this->add_custom_css();
		if( $custom_css ) {
			do_action('slz_add_inline_style', $custom_css);
		}
	}
	public function reset(){
		wp_reset_postdata();
	}
	public function set_responsive_class( $atts = array() ) {
		$class = '';
		$column = $this->attributes['column'];
		$def = array(
			'1' => 'portfolio-col-1 col-xs-12',
			'2' => 'portfolio-col-2 col-sm-6 col-xs-12',
			'3' => 'portfolio-col-3 col-md-4 col-sm-6 col-xs-12',
			'4' => 'portfolio-col-4 col-lg-3 col-md-4 col-sm-6 col-xs-12',
		);;

		if( $column && isset($def[$column])) {
			$this->attributes['responsive-class'] = $def[$column];
		} else {
			$this->attributes['responsive-class'] = $def['4'];
		}
	}

	public function add_custom_css() {
		$custom_css = '';
		if( !empty($this->attributes['color_title']) ) {
			$custom_css .= sprintf('.%1$s .block-title { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_title']
							);
		}
		if( !empty($this->attributes['color_title_hv']) ) {
			$custom_css .= sprintf('.%1$s .block-title:hover { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_title_hv']
							);
		}
		if( !empty($this->attributes['color_category']) ) {
			$custom_css .= sprintf('.%1$s .block-category { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_category']
							);
		}
		if( !empty($this->attributes['color_category_hv']) ) {
			$custom_css .= sprintf('.%1$s .block-category:hover { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_category_hv']
							);
		}
		if( !empty($this->attributes['color_meta_info']) ) {
			$custom_css .= sprintf('.%1$s .block-info .link { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_meta_info']
							);
		}
		if( !empty($this->attributes['color_meta_info']) ) {
			$custom_css .= sprintf('.%1$s .block-info .link { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_meta_info']
							);
		}
		if( !empty($this->attributes['color_meta_info_hv']) ) {
			$custom_css .= sprintf('.%1$s .block-info .link:hover { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_meta_info_hv']
							);
		}
		if( !empty($this->attributes['color_description']) ) {
			$custom_css .= sprintf('.%1$s .block-text { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_description']
							);
		}
		if( !empty($this->attributes['color_item_bg_hv']) ) {
			$custom_css .= sprintf('.%1$s .block-image:after { background-color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_item_bg_hv']
							);
		}
		if( !empty($this->attributes['color_button']) ) {
			$custom_css .= sprintf('.%1$s .block-read-more { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_button']
							);
		}
		if( !empty($this->attributes['color_button_hv']) ) {
			$custom_css .= sprintf('.%1$s .block-read-more:hover { color: %2$s !important;}',
								$this->attributes['uniq_id'], $this->attributes['color_button_hv']
							);
		}
		if( !empty($this->attributes['color_slide_arrow']) ) {
			$custom_css .= sprintf('.%1$s .slz-carousel-wrapper .slick-arrow { color: %2$s;}',
								$this->attributes['uniq_id'], $this->attributes['color_slide_arrow']
							);
		}
		if( !empty($this->attributes['color_slide_arrow_hv']) ) {
			$custom_css .= sprintf('.%1$s .slz-carousel-wrapper .slick-arrow:hover { color: %2$s;}',
								$this->attributes['uniq_id'], $this->attributes['color_slide_arrow_hv']
							);
		}
		if( !empty($this->attributes['color_slide_arrow_bg']) ) {
			$custom_css .= sprintf('.%1$s .slz-carousel-wrapper .slick-arrow { background-color: %2$s;}',
								$this->attributes['uniq_id'], $this->attributes['color_slide_arrow_bg']
							);
		}
		if( !empty($this->attributes['color_slide_arrow_bg_hv']) ) {
			$custom_css .= sprintf('.%1$s .slz-carousel-wrapper .slick-arrow:hover { background-color: %2$s;}',
								$this->attributes['uniq_id'], $this->attributes['color_slide_arrow_bg_hv']
							);
		}
		if( !empty($this->attributes['color_slide_dots']) ) {
			$custom_css .= sprintf('.%1$s .slz-carousel-wrapper .slick-dots li button:before{ color: %2$s;}',
								$this->attributes['uniq_id'], $this->attributes['color_slide_dots']
							);
		}
		if( !empty($this->attributes['color_slide_dots_at']) ) {
			$custom_css .= sprintf('.%1$s .slz-carousel-wrapper .slick-dots .slick-active button:before{ color: %2$s;}',
								$this->attributes['uniq_id'], $this->attributes['color_slide_dots_at']
							);
		}

		return $custom_css;
	}

	public function set_default_options( $html_options = array() ) {
		$defaults = array(
			'title_format'			=> '<a href="%2$s" class="block-title">%1$s</a><div class="clearfix"></div>',
			'excerpt_format'		=> '<div class="block-text">%s</div>',
			'thumb_class' 			=> 'img-responsive img-full',
			'image_format'			=> '<div class="block-image"><a href="%2$s" class="link">%1$s</a></div>',
			'author_format'			=> '<li><a href="%2$s" class="link author">%1$s</a></li>',
			'date_format'			=> '<li><a href="%2$s" class="link">%1$s</a></li>',
			'view_format'			=> '<li><a href="%2$s" class="link">%1$s</a></li>',
			'thumbnail_format'      => '<a href="%2$s" class="link">%1$s</a>',
		);

		$this->html_format = array_merge( $defaults, $html_options );
		return $this->html_format;
	}

	private function get_thumb_size() {
		if( absint($this->attributes['column']) == 1 ) {
			$this->attributes['thumb-size'] = array(
				'large'          => 'post-thumbnail',
				'small'          => 'post-thumbnail',
			);
		} else {
			if ( isset($this->attributes['image_size']) && is_array($this->attributes['image_size']) ) {
				$this->attributes['thumb-size'] = SLZ_Util::get_thumb_size( $this->attributes['image_size'], $this->attributes );
			}
		}
		if( isset($this->attributes['is_ajax']) ){
			$this->attributes['thumb-size']['is_ajax'] = true;
		}
	}

	private  function get_meta_image_upload( $html_options ) {
		$out = '';
		$format = $this->html_format['thumbnail_format'];
		$img = $this->post_meta['thumbnail'];
		if( empty( $img ) ) {
			$img =  $this->get_featured_image($html_options);
			return $img;
		}
		$out = sprintf( $format, esc_html($img['url']) );
		return $out;
	}

	/*-------------------- >> Render Html << -------------------------*/
	/**
	 * Render html by shortcode.
	 *
	 * @param array $html_options
	 * Format: 1$ - image, 2$ - title, 3$ - category, 4$ - description, 5$ - button, 6$ - meta, 7$ - post_class, 8$ - rating
	 */
	public function render_portfolio_list_sc( $html_options = array() ) {
		$this->html_format = $this->set_default_options( $html_options );
		$row_count = 0;
		$thumb_size = 'large';
		if( $this->query->have_posts() ) {
			while ( $this->query->have_posts() ) {
				$this->query->the_post();
				$this->loop_index();

				$html_options = $this->html_format;
				printf( $html_options['html_format'],
					$this->get_featured_image( $html_options, $thumb_size ),
					$this->get_title( $html_options ),
					$this->get_term_current_taxonomy(),
					$this->get_meta_description(),
					$this->get_button_readmore(),
					$this->get_meta_info(),
					$this->get_post_class(),
					$this->get_rating(),
					$this->get_thumnail()
				);
				$row_count++;
			}
			$this->reset();
			if( !empty($this->attributes['pagination']) && $this->attributes['pagination'] == 'yes' ) {
				echo SLZ_Pagination::paging_nav( $this->query->max_num_pages, 2, $this->query);
			}
		}
	}

	/*-------------------- >> Render Widget << -------------------------*/
		/**
		 * use for widget gallery
		 *
		 * @param array $html_options
		 * Format: 1$ - image, 2$ - image link
		 */
	public function render_widget( $html_options = array() ) {
		$this->html_format = $html_options ;
		$thumb_size = 'large';
		if( $this->query->have_posts() ) {
			while ( $this->query->have_posts() ) {
				$this->query->the_post();
				$this->loop_index();
				$html_options = $this->html_format;
				printf( $html_options['html_format'],
					$this->get_featured_image( $html_options, $thumb_size ),
					$this->get_feature_img_url_size($html_options['fancybox_size']),
					$this->get_title($html_options),
					$this->get_author($html_options),
					$this->get_rating(),
					$this->get_meta_description(),
					$this->get_meta_image_upload($html_options)
				);
			}
			$this->reset();
		}
	}

	/*-------------------- >> General Functions << --------------------*/
	public function pagination(){
		if( !empty($this->attributes['pagination']) && $this->attributes['pagination'] == 'yes' ) {
			echo SLZ_Pagination::paging_nav( $this->query->max_num_pages, 2, $this->query);
		}
	}
	public function get_feature_img_url_size($size) {
		$out = '';
		if ( get_post_thumbnail_id( $this->post_id ) ) {
			$out = image_downsize( get_post_thumbnail_id( $this->post_id ) ,$size);
		}
		if(isset($out[0])){
			return $out[0];
		}else{
			return $out;
		}

	}

	public function get_feature_img_url_full() {
		$out = '';
		if ( get_post_thumbnail_id( $this->post_id ) ) {
			$out = wp_get_attachment_url( get_post_thumbnail_id( $this->post_id ) );
		}
		return $out;
	}
	public function get_term_current_taxonomy() {
		$out = '';
		$format = '<a href="%2$s" class="block-category">%1$s</a>';
		if ( isset($this->html_format['category_format']) ) {
			$format = $this->html_format['category_format'];
		}
		if ( !empty($this->attributes['show_category']) && $this->attributes['show_category'] == 'yes' ) {
			$term = $this->get_current_taxonomy();
		}
		if( !empty( $term ) ) {
			$out = sprintf( $format, esc_html( $term['name'] ), esc_url( get_term_link($term['term_id']) ) );
		}
		return $out;
	}

	public function get_meta_info() {
		$out = $author = $date = $views = '';
		$format = '%1$s %2$s %3$s';
		if ( isset($this->html_format['meta_info_format']) ) {
			$format = $this->html_format['meta_info_format'];
		}
		if ( !empty($this->attributes['show_meta_info']) && $this->attributes['show_meta_info'] == 'yes' ) {
			$author = $this->get_author( $this->html_format );
			$date = $this->get_date( $this->html_format );
			$views = $this->get_views( $this->html_format );
		}
		$out = sprintf( $format, wp_kses_post( $author ) , wp_kses_post( $date ), wp_kses_post( $views ) );
		return $out;
	}


	public function get_button_readmore( $echo = false ) {
		$out = $other_atts = '';
		$format = '<a href="%2$s" class="block-read-more" %3$s >%1$s<i class="fa fa-angle-double-right"></i></a>';
		if ( isset($this->html_format['readmore_format']) ) {
			$format = $this->html_format['readmore_format'];
		}
		if ( !empty($this->attributes['button_text']) ) {
			$button_text = $this->attributes['button_text'];
			$link = $this->permalink;
			if( !empty($this->attributes['custom_link'])){
				$link = SLZ_Util::parse_vc_link($this->attributes['custom_link']);
				if( !empty($link['url'])) {
					$this->attributes['button_custom_link'] = $link['url'];
					$other_atts = $link['other_atts'];
				}
			}
			if( !empty($this->attributes['button_custom_link'] ) ) {
				$link = $this->attributes['button_custom_link'];
			}
			$out = sprintf($format, $button_text, esc_url($link), $other_atts);
		}
		if( !$echo ) {
			return $out;
		}
		echo $out;
	}


	public function get_meta_description( $echo = false) {
		$format = '%s';
		$description = '';
		$show_description = $this->attributes['show_description'];
		if ( !empty($show_description) && $show_description == 'yes' ) {
			$description = $this->post_meta['description'];
			if ( empty($description) ) {
				$description = $this->get_excerpt( $this->html_format );
			}
		}
		if ( empty($description) ) {
			return '';
		}
		$description_length = absint($this->attributes['description_length']);
		if ( !empty($description_length) ) {
			$description = wp_trim_words( $description, $description_length, '...' );
		}
		if ( isset($this->html_format['excerpt_format']) ) {
			$format = $this->html_format['excerpt_format'];
		}
		$out = sprintf($format, wp_kses_post(nl2br($description)) );
		if( !$echo ){
			return $out;
		}
		echo $out;
	}
	public function get_meta_information() {
		$format = '%s';
		$description = $this->post_meta['information'];
		if ( empty($description) ) {
			$description = $this->post_meta['description'];
		}
		if ( empty($description) ) {
			$description = $this->get_excerpt( $this->html_format );
		}
		if ( empty($description) ) {
			return '';
		}
		if ( isset($this->html_format['excerpt_format']) ) {
			$format = $this->html_format['excerpt_format'];
		}
		$out = sprintf($format, wp_kses_post($description) );
		return $out;
	}
	public function get_rating( $post_id = null , $echo = false ){
		if( !empty( $this->attributes['show_review_rating'] ) && $this->attributes['show_review_rating'] == 'yes' ) {
			if( empty($post_id) ) {
				$post_id = $this->post_id;
			}
			$cls = new SLZ_Review();
			$format = '';
			if ( isset($this->html_format['review_format']) ) {
				$format = $this->html_format['review_format'];
			}
			$out = $cls->get_rating_html( $post_id, $format );
			if( !$echo ){
				return $out;
			}
			echo $out;
		}
	}
	/**
	 * Get featured image or post meta [thumbnail] to shortcode
	 *
	 * @return string
	 */
	public function get_post_image( $html_options = array(), $thumb_type = 'large', $echo = false, $has_image = true ){
		$out = '';
		if( empty($this->attributes['show_thumbnail']) ){
			$out = $this->get_featured_image($html_options, $thumb_type, false, $has_image );
		} elseif($this->attributes['show_thumbnail'] == 'thumbnail') {
			$out = $this->get_thumbnail($html_options, $thumb_type, false, $has_image);
		}
		if( !$echo ){
			return $out;
		}
		echo $out;

	}
	public function get_history( $post_id ){

		$os = SLZ_Util::get_mobile_operating_system();
		$history_status = slz_get_db_post_option($post_id, 'history_status', '');
		$status_out = $status_options = $button = $status_link = $target = '';

		if(!empty($history_status)){
			$count = 0;
			$status_exists = array();
			foreach ( $history_status as $key => $item ) {

				if ( wp_is_mobile() ) {

					if( $os == 'Android' ){
						if( !empty( $item['google_store'] ) ){
							$status_link = $item['google_store'];
						}
					}else if( $os == 'iPhone' || $os == 'iPod'  || $os == 'iPad' ){
						if( !empty( $item['app_store'] ) ){
							$status_link = $item['app_store'];
						}
					}else if( $os == 'Windows' ){
						if( !empty( $item['windows_store'] ) ){
							$status_link = $item['windows_store'];
						}
					}
					else {
						if( !empty( $item['link'] ) ){
							$status_link = $item['link'];
						}
					}

				}else{

					if( !empty( $item['link'] ) ){
						$status_link = $item['link'];
					}

				}
				if( !empty($item['link_target'])) {
					$target = '_blank';
				}
				if( $count == 0 ){
					if( $target ){
						$target = 'target="'.esc_attr($target).'"';
					}
					$button = '<a href="'.esc_attr($status_link).'" '.esc_attr($target).' class="slz-btn slz-btn-download">'.esc_html('get free', 'slz') .' </a>';
				}
				if( !in_array( $item['status'], $status_exists)){
					$status_exists[] = $item['status'];
					$object = get_term_by('slug',$item['status'],'slz-portfolio-status');
					$status_options .= '<option value="'.esc_url($status_link).'" data-target="'.esc_attr($target).'">'.esc_attr($object->name).'</option>';
				}

				$count++;
			}
			if( $status_options ) {
				$status_out  = '<div class="portfolio-history"><select class="slz-select-version ">';
				$status_out .= $status_options;
				$status_out .= '</select>';
				$status_out .= $button;
				$status_out .= '</div>';
			}
		}

		return $status_out;
	}
	public function get_archive_link( $posttype = '' ){
		if( empty($posttype) ) {
			$posttype = $this->post_type;
		}
		return get_post_type_archive_link($posttype);
	}
}