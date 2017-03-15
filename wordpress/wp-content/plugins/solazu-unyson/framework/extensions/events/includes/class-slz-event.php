<?php
class SLZ_Event extends SLZ_Custom_Posttype_Model {

	private $post_type = 'slz-event';
	private $post_taxonomy = 'slz-event-cat';

    /**
     * SLZ_Event constructor.
     */
    public function __construct() {
		$this->meta_attributes();
		$this->set_meta_attributes();
		$this->taxonomy_cat = $this->post_taxonomy;
		$this->html_format = $this->set_default_options();
		$this->set_default_attributes();
	}

    /**
     *
     */
    public function meta_attributes() {
		$slz_merge_meta_atts = array();
		$meta_atts = array(
			'event_ticket_price'    => '',
			'description'	        => '',
     		'event_location'        => '',
			'event_date_range'		=> '',
			'event_ticket_url'      => '',
			'banner_image'          => '',
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

    /**
     *
     */
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

    /**
     *
     */
    public function set_default_attributes() {
		$default_atts = array(
			'layout'			=> 'event',
			'style'				=> 'style-1',
			'limit_post'		=> '-1',
			'offset_post'		=> '0',
			'sort_by'			=> '',
			'post_id'			=> '',
			'method'			=> '',
			'list_category'		=> '',
		    'show_image_1'      => '2',
		    'show_image_2'      => '0',
			'list_post'			=> '',
		);
		$this->attributes = $default_atts;
	}

    /**
     * Init event extension model
     * @param array $atts
     * @param array $query_args
     */
    public function init($atts = array(), $query_args = array() ) {
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
			} else {
				if(isset($atts['list_post'])){
					$list_post = (array) vc_param_group_parse_atts( $atts['list_post'] );
				}
				$atts['post_id'] = $this->parse_list_to_array( 'post', $list_post );
			}
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

    /**
     * @param $query_args
     */
    public function setting($query_args ){
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

    /**
     *
     */
    public function reset(){
		wp_reset_postdata();
	}

    /**
     * @param array $atts
     */
    public function set_responsive_class($atts = array() ) {

	}

    /**
     * Add custom css
     * @return string
     */
    public function add_custom_css() {
		$custom_css = '';
		if( !empty($this->attributes['title_color']) ) {
			$custom_css .= sprintf('.sc_event_block .slz-title-shortcode, .sc_event_carousel .slz-title-shortcode { color: %1$s;}',
								$this->attributes['title_color']
							);
		}
		return $custom_css;
	}

    /**
     * Set default option value from config
     * @param array $html_options
     * @return array
     */
    public function set_default_options($html_options = array() ) {
		$defaults = array(
			'title_format'			   => '<a href="%2$s" class="block-title">%1$s</a>',
			'image_format'			   => '<div class="block-image"><a href="%2$s" class="link">%1$s</a></div>',
            'thumb_class' 			   => 'img-responsive img-full',
            'event_description_format' => '<div class="block-description">%1$s</div>',
            'event_block_info'         => '<ul class="block-info">%1$s%2$s</ul>',
            'event_location'           => '<li><a href="javascript:void(0);" class="link place">%1$s</a></li>',
            'event_time'               => '<li><a href="javascript:void(0);" class="link time"><span class="text">%2$s %1$s</span> '. esc_html( 'to', 'slz' ) .' <span class="text">%4$s %3$s</span></a></li>',
            'event_date'               => '<div class="block-date">
		        <a href="javascript:void(0);" class="link date-event">
		            <span class="date">%1$s</span>
		            <span class="month">%2$s - %3$s</span>
		        </a>
		    </div>',
            'time_format'              => '%1$s:%2$s %3$s',
            'date_format'              => '%2$s %3$s, %1$s',
			'event_ticket_price'   => '<div class="block-price"><span class="title">'. esc_html__( 'Price:', 'slz' ) .'</span><span class="text">'. esc_html__( 'from ', 'slz' ) .'<b>%1$s</b></span></div>',
		);

		$html_options = array_merge( $defaults, $html_options );
		$this->html_format = $html_options;
		return $html_options;
	}

    /**
     * Get image thumb size
     */
    private function get_thumb_size() {
		if ( isset($this->attributes['image_size']) && is_array($this->attributes['image_size']) ) {
			$this->attributes['thumb-size'] = SLZ_Util::get_thumb_size( $this->attributes['image_size'], $this->attributes );
		}
	}

	/*-------------------- >> Render Html << -------------------------*/

    /**
     * Render HTML by Shortcode
     * @param array $html_options
     */
    public function render_event_sc($html_options = array() ) {
		$this->html_format = $this->set_default_options( $html_options );
		if( $this->query->have_posts() ) {
			$html_options = $this->html_format;
			$inc = 0;
			while ( $this->query->have_posts() ) {
				$this->query->the_post();
				$this->loop_index();
				printf( $html_options['html_format'],
                    $this->get_event_date( $html_options ),
					$this->get_image( $html_options ),
					$this->get_title( $html_options ),
                    $this->get_event_block_info( $html_options ),
					$this->get_event_description( $html_options  ),
					$inc++,
					$this->post_meta['event_date_range']['from'],
					$this->permalink,
					$this->get_event_location( $html_options ),
					$this->get_meta_price( $html_options )
				);
			}
			$this->reset();
			if( ! empty( $this->attributes['pagination'] ) && $this->attributes['pagination'] == 'yes' ) {
                    echo SLZ_Pagination::paging_nav( $this->query->max_num_pages, 2, $this->query );
			}
		}
	}

    /**
     * Render HTML by Shortcode
     * @param array $html_options
     */
    public function render_event_carousel_01($html_options = array() ) {
		$this->html_format = $this->set_default_options( $html_options );
		if( $this->query->have_posts() ) {
			$html_options = $this->html_format;
			$inc = 0;
			$i = intval( $this->attributes['slide_to_show'] );
			if( empty( $i ) ) {
				$i = 1;
			}
			$count = 0;
			while ( $this->query->have_posts() ) {
				$this->query->the_post();
				$this->loop_index();
				if( $count == 0 ) {
					echo '<div class="item">';
						echo '<div class="slz-list-block slz-column-1">';
				}
				printf( $html_options['html_format'],
                    $this->get_event_date( $html_options ),
					$this->get_image( $html_options ),
					$this->get_title( $html_options ),
                    $this->get_event_block_info( $html_options ),
					$this->get_event_description( $html_options  ),
					$inc++,
					$this->post_meta['event_date_range']['from'],
					$this->permalink,
					$this->get_event_location( $html_options ),
					$this->get_meta_price( $html_options )
				);
				if( $count == $i-1 ) {
						echo '</div>';
					echo '</div>';
				}
				$count++;
				if( $count == $i ) {
					$count = 0;
				}
			}
			if( $count < $i && $count != 0 ) {
					echo '</div>';
				echo '</div>';
			}

			$this->reset();
			if( ! empty( $this->attributes['pagination'] ) && $this->attributes['pagination'] == 'yes' ) {
                    echo SLZ_Pagination::paging_nav( $this->query->max_num_pages, 2, $this->query );
			}
		}
	}

    public function render_event_single($html_options = array() ) {
		$this->html_format = $this->set_default_options( $html_options );
		if( $this->query->have_posts() ) {
			$html_options = $this->html_format;
			$custom_css = '';
			
			$inc = 0;
			while ( $this->query->have_posts() ) {
				$this->query->the_post();
				$this->loop_index();
				printf( $html_options['html_format'],
					$this->get_image( $html_options ),
					$this->get_title( $html_options ),
					$this->get_event_description( $html_options  ),
					$this->get_event_location( $html_options ),
					$this->get_meta_ticket_price($html_options),
					$this->get_event_time( $html_options ),
					$this->get_banner_countdown( $html_options )
				);
				
				if( !empty( $this->post_meta['banner_image'] ) ) {
					$custom_css .= '.slz-event-countdown-02.slz-single-ticket-banner{ background-image:url('. esc_attr( $this->post_meta['banner_image']['url'] ) .'); }';
					do_action('slz_add_inline_style', $custom_css);
				}
			}
			$this->reset();
		}
	}

	/*-------------------- >> General Functions << --------------------*/
    /**
     * Get event date
     * @param array $html_options
     * @return string
     */
    public function get_event_date($html_options = array() ) {
		$out = '';
		$format = $this->html_format['event_date'];
        if ( isset( $html_options['event_date'] ) )
        {
            $format = $html_options['event_date'];
        }
		$start = $this->post_meta['event_date_range']['from'];
		$day = $this->_get_date( $start, '%3$s');
		$month = $this->_get_date( $start, '%2$s', true);
		$year = $this->_get_date( $start, '%1$s');
		if( isset( $day ) && isset( $month ) && isset( $year ) ) {
            $out = sprintf( $format, esc_html( $day ), esc_html( $month ), esc_html( $year ) );
        }
		return $out;
	}

    /**
     * Get event featured image
     * @param array $html_options
     * @param string $thumb_size
     * @return string
     */
    public function get_image( $html_options = array(), $thumb_size = 'small' ) {
		$out = '';
		if( empty( $html_options ) ) {
			$html_options = $this->html_format;
		}
		if( isset( $this->attributes['image_display'] ) && $this->attributes['image_display'] == 'show' )
		{
			$out = $this->get_featured_image( $html_options, $thumb_size );
		}
		return $out;
	}

    /**
     * Get event description
     * @param array $html_options
     * @return string
     */
    public function get_event_description( $html_options = array() ) {
		$out = '';
		$format = $this->html_format['event_description_format'];
		if ( isset( $html_options['event_description_format'] ) )
		{
			$format = $html_options['event_description_format'];
		}
		if( isset( $this->attributes['description_display'] ) && $this->attributes['description_display'] == 'show' )
		{
			$out = sprintf( $format, $this->post_meta['description'] ) ;
		}
		return $out;
	}

    /**
     * Get event block info
     * @param array $html_options
     * @return string
     */
    public function get_event_block_info($html_options = array() ) {
        $out = '';
        $format = $this->html_format['event_block_info'];
        if ( isset( $html_options['event_block_info'] ) )
        {
            $format = $html_options['event_block_info'];
        }
        $event_time = $this->get_event_time( $html_options );
        $event_location = $this->get_event_location( $html_options );
        if( isset( $event_time ) && isset( $event_location ) ) {
            $out = sprintf( $format, $event_time, $event_location );
        }
        return $out;
    }

    /**
     * Get event location
     * @param array $html_options
     * @return string
     */
    public function get_event_location( $html_options = array() ) {
		$out = '';
		$format = $this->html_format['event_location'];
		if ( isset( $html_options['event_location'] ) )
		{
			$format = $html_options['event_location'];
		}
		$event_location = $this->post_meta['event_location'];
		if( isset( $event_location ) && isset( $this->attributes['event_location_display'] ) && $this->attributes['event_location_display'] == 'show' ) {
            $out = sprintf( $format, esc_html( $event_location ) );
        }
		return $out;
	}

    /**
     * Get event time
     * @param array $html_options
     * @return string
     */
    public function get_event_time( $html_options = array() ) {
		$out = '';
        $time_format = $this->html_format['time_format'];
        $date_format = $this->html_format['date_format'];
        $format = $this->html_format['event_time'];
        if ( isset( $html_options['time_format'] ) )
        {
            $time_format = $html_options['time_format'];
        }
        if ( isset( $html_options['date_format'] ) )
        {
            $date_format = $html_options['date_format'];
        }
        if ( isset( $html_options['event_time'] ) )
        {
            $format = $html_options['event_time'];
        }
        if( isset( $this->attributes['event_time_display'] ) && $this->attributes['event_time_display'] == 'show' )
        {
            $start = $this->post_meta['event_date_range']['from'];
            $end = $this->post_meta['event_date_range']['to'];
            $start_time = $this->_get_time( $start, $time_format, false);
            $end_time = $this->_get_time( $end, $time_format, false );
            $start_date = $this->_get_date( $start, $date_format, true );
            $end_date = $this->_get_date( $end, $date_format, true );
            if( isset( $start_time ) && isset( $start_date ) && isset( $end_time ) && isset( $end_date ) ) {
                $out = sprintf( $format, esc_html( $start_time ), esc_html( $start_date ), esc_html( $end_time ), esc_html( $end_date ) );
            }
        }
		return $out;
	}

    /**
     * Get date from event meta
     * @param $date_string
     * @param $format - 1$ - year, 2$ - month, 3$ - day, display month as short date string
     * @param bool $month_string
     * @return string
     */
    public function _get_date( $date_string, $format, $month_string = false ) {
        $out = '';
        if( ! empty( $date_string ) ) {
            $arr = explode( ' ', $date_string );
            list( $year, $month, $day  ) = explode( '/', $arr[0] );
            if( ! empty( $day ) && ! empty( $month ) && ! empty( $year ) ) {
                if( $month_string ) {
                    $timestamp = new DateTime( '2000-'.$month.'-01' );
                    $month = $timestamp->format( 'M' );
                }
                $out = sprintf( $format, $year, $month, $day );
            }
        }
		return $out;
	}

    /**
     * Get time from event meta
     * @param $date_string
     * @param $format - 1$ - hour, 2$ - minute, 3$ - toggle period
     * @param bool $_24h
     * @return string
     */
    public function _get_time( $date_string, $format, $_24h = true ) {
		$out = $period =  '';
		if( ! empty( $date_string ) ) {
            $arr = explode( ' ', $date_string );
            list( $hour, $minute  ) = explode( ':', $arr[1] );
            if ( ! empty( $hour ) && ! empty( $minute ) ) {
                if( ! $_24h )
                {
                    $period = $hour < 11 ? esc_html( 'AM' ) : esc_html( 'PM' );
                    $hour = $hour > 12 ? $hour - 12 : $hour;
                }
            }
            $out = sprintf( $format, $hour, $minute, $period );
        }
		return $out;
	}
	
	public function get_meta_ticket_price( $html_options = array() ) {
		$out = '';
		$format = $this->html_format['event_ticket_price'];
		if( isset( $html_options['event_ticket_price'] ) ) {
			$format = $html_options['event_ticket_price'];
		}
		if( !empty( $this->post_meta['event_ticket_price'] ) || $this->post_meta['event_ticket_price'] == 0 ) {
			$money_formated = slz_get_currency_format_options( $this->post_meta['event_ticket_price'] );
			$out .= sprintf( $format, esc_html( $money_formated ) );
		}
		
		return $out;
	}
	
	public function get_btn_buy_ticket() {
		$out = '';
		$event_payment_option = slz_get_db_settings_option( 'event-payment-option' );
		
//event_ticket_url
		if( !is_plugin_active( 'woocommerce/woocommerce.php' ) || $event_payment_option == 'customlink' ) {
			$buyticket_url = $this->post_meta['event_ticket_url'];
			$out .= '<a href="'. ( empty( $buyticket_url ) ? 'javascript:void(0)' : esc_url( $buyticket_url ) ) .'" class="slz-btn">'. esc_html__( 'Buy ticket', 'slz' ) .'</a>';
			return $out;
		}
		
		$out .= '<div class="slz-form-buy-ticket slz-buy-ticket-method">';
			$out .= '<input type="text" name="slz_event_post_id" value="'. esc_attr( $this->post_id ) .'" class="slz_event_post_id" hidden />';
			$out .= '<a href="javascript:void(0);" class="slz-btn slz_buy_ticket_event_btn slz-buy-ticket-method">'. esc_html__( 'Buy ticket', 'slz' ) .'</a>';
		$out .= '</div>';
		
		return $out;
	}
	
	public function get_meta_price( $html_options = array() ) {
		$out = '';
		if( !isset( $html_options['price_format'] ) ) {
			$format = '<div class="price">%1$s</div>';
		}
		$price = $this->post_meta['event_ticket_price'];
		if( empty( $price ) ) {
			$price = 0;
		}
		$money = slz_get_currency_format_options( $price );
		$out .= sprintf( $format, esc_html( $money ) );
		
		return $out;
		
	}
	
	public function is_remaining_event() {
		
		if( !empty( $this->post_meta['event_date_range'] ) ) {
			$time_db_arr = $this->post_meta['event_date_range'];
			if( isset( $time_db_arr['from'] ) && !empty( $time_db_arr['from'] ) ) {
				$now = time();
				$time_db_arr = explode( ' ', $time_db_arr['from'] );
				$time_db = strtotime( $time_db_arr[0] );
				$datediff = $time_db - $now;
				$count = floor($datediff / (60 * 60 * 24));
				if( $count < 0 ) {
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function get_banner_countdown( $html_options = array() ) {
		$out = '';
		$format = '
			<div class="slz-event-countdown-02 slz-single-ticket-banner style-1">
				<div class="col-left">
					<div class="coming-soon single-page-comming-soon" data-unique-id="%1$s" data-targetdate="%2$s" >
						<canvas id="timer-%1$s" class="coming-soon-canvas"></canvas>
						<div class="main-count-wrapper">
							<div class="main-count">
								<div class="time days flip"><span id="days-%1$s" class="count curr top"></span></div>
								<div class="count-height"></div>
								<div class="stat-label">days</div>
							</div>
						</div>
						<div class="main-count-wrapper">
							<div class="main-count">
								<div class="time hours flip"><span id="hours-%1$s" class="count curr top"></span></div>
								<div class="count-height"></div>
								<div class="stat-label">hours</div>
							</div>
						</div>
						<div class="main-count-wrapper">
							<div class="main-count">
								<div class="time minutes flip"><span id="minutes-%1$s" class="count curr top"></span></div>
								<div class="count-height"></div>
								<div class="stat-label">mins</div>
							</div>
						</div>
						<div class="main-count-wrapper">
							<div class="main-count">
								<div class="time seconds flip"><span id="seconds-%1$s" class="count curr top"></span></div>
								<div class="count-height"></div>
								<div class="stat-label">secs</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-right">%3$s</div>
			</div>
		';
		if( isset( $html_options['banner_format'] ) ) {
			$format = $html_options['banner_format'];
		}
		$status = false;
		$status = $this->is_remaining_event();
		if( $status ) {
			$unique_id = SLZ_Com::make_id();
			$out .= sprintf( $format,
				$unique_id,
				$this->post_meta['event_date_range']['from'],
				$this->get_btn_buy_ticket()
			);
		}
		
		return $out;
	}
}