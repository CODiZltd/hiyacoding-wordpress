<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

class SLZ_Extension_Events extends SLZ_Extension {
	private $post_type_name = 'slz-event';
	private $post_type_slug = 'event';
	private $taxonomy_name = 'slz-event-cat';
	private $taxonomy_slug = 'event-cat';


	public function slz_get_post_type_slug() {
		return $this->post_type_slug;
	}

	public function get_post_type_name() {
		return $this->post_type_name;
	}

	public function get_taxonomy_name() {
		return $this->taxonomy_name;
	}

	public function _get_link() {
		return self_admin_url( 'edit.php?post_type=' . $this->get_post_type_name() );
	}
	
	public function get_image_sizes() {
		return $this->get_config( 'image_sizes' );
	}

	/**
	 * @internal
	 */
	protected function _init() {
		$this->define_slugs();
		$this->register_post_type();
		$this->register_taxonomy();

		if ( is_admin() ) {
			$this->save_permalink_structure();
			$this->add_admin_filters();
			$this->add_admin_actions();
		} else {
			$this->add_theme_actions();
		}

		add_filter( 'slz_post_options', array( $this, '_filter_slz_post_options' ), 10, 2 );
	}

	private function save_permalink_structure() {
		if ( ! isset( $_POST['permalink_structure'] ) && ! isset( $_POST['category_base'] ) ) {
			return;
		}

		$this->set_db_data(
			'permalinks/post',
			SLZ_Request::POST(
				'slz_ext_events_event_slug',
				apply_filters( 'slz_ext_' . $this->get_name() . '_post_slug', $this->post_type_slug )
			)
		);
		$this->set_db_data(
			'permalinks/taxonomy',
			SLZ_Request::POST(
				'slz_ext_events_taxonomy_slug',
				apply_filters( 'slz_ext_' . $this->get_name() . '_taxonomy_slug', $this->taxonomy_slug )
			)
		);
	}

	/**
	 * @internal
	 **/
	public function _action_add_permalink_in_settings() {
		add_settings_field(
			'slz_ext_events_event_slug',
			esc_html__( 'Event base', 'slz' ),
			array( $this, '_event_slug_input' ),
			'permalink',
			'optional'
		);

		add_settings_field(
			'slz_ext_events_taxonomy_slug',
			esc_html__( 'Events category base', 'slz' ),
			array( $this, '_taxonomy_slug_input' ),
			'permalink',
			'optional'
		);
	}

	/**
	 * @internal
	 */
	public function _event_slug_input() {
		?>
		<input type="text" name="slz_ext_events_event_slug" value="<?php echo $this->post_type_slug; ?>">
		<code>/my-event</code>
		<?php
	}

	/**
	 * @internal
	 */
	public function _taxonomy_slug_input() {
		?>
		<input type="text" name="slz_ext_events_taxonomy_slug" value="<?php echo $this->taxonomy_slug; ?>">
		<code>/my-events-category</code>
		<?php
	}

	private function define_slugs() {
		$this->post_type_slug = $this->get_db_data(
			'permalinks/post',
			apply_filters( 'slz_ext_' . $this->get_name() . '_post_slug', $this->post_type_slug )
		);
		$this->taxonomy_slug  = $this->get_db_data(
			'permalinks/taxonomy',
			apply_filters( 'slz_ext_' . $this->get_name() . '_taxonomy_slug', $this->taxonomy_slug )
		);
	}

	private function register_post_type() {
		$post_names = apply_filters( 'slz_ext_' . $this->get_name() . '_post_type_name',
			array(
				'singular' => esc_html__( 'Event', 'slz' ),
				'plural'   => esc_html__( 'Events', 'slz' )
			) );

		register_post_type( $this->post_type_name,
			array(
				'labels'             => array(
					'name'               => esc_html__( 'Events', 'slz' ),
					'singular_name'      => esc_html__( 'Event', 'slz' ),
					'add_new'            => esc_html__( 'Add New', 'slz' ),
					'add_new_item'       => sprintf( esc_html__( 'Add New %s', 'slz' ), $post_names['singular'] ),
					'edit'               => esc_html__( 'Edit', 'slz' ),
					'edit_item'          => sprintf( esc_html__( 'Edit %s', 'slz' ), $post_names['singular'] ),
					'new_item'           => sprintf( esc_html__( 'New %s', 'slz' ), $post_names['singular'] ),
					'all_items'          => sprintf( esc_html__( 'All %s', 'slz' ), $post_names['plural'] ),
					'view'               => sprintf( esc_html__( 'View %s', 'slz' ), $post_names['singular'] ),
					'view_item'          => sprintf( esc_html__( 'View %s', 'slz' ), $post_names['singular'] ),
					'search_items'       => sprintf( esc_html__( 'Search %s', 'slz' ), $post_names['plural'] ),
					'not_found'          => sprintf( esc_html__( 'No %s Found', 'slz' ), $post_names['plural'] ),
					'not_found_in_trash' => sprintf( esc_html__( 'No %s Found In Trash', 'slz' ), $post_names['plural'] ),
					'parent_item_colon'  => '' /* text for parent types */
				),
				'description'        => esc_html__( 'Create a event item', 'slz' ),
				'public'             => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'publicly_queryable' => true,
				/* queries can be performed on the front end */
				'has_archive'        => true,
				'rewrite'            => array(
					'slug' => $this->post_type_slug
				),
				'show_in_nav_menus'  => false,
				'menu_icon'          => 'dashicons-calendar-alt',
				'hierarchical'       => false,
				'query_var'          => true,
				/* Sets the query_var key for this post type. Default: true - set to $post_type */
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'editor',
					'thumbnail', /* Displays a box for featured image. */
				)
			) );
	}

	private function register_taxonomy() {
		$category_names = apply_filters( 'slz_ext_' . $this->get_name() . '_category_name',
			array(
				'singular' => esc_html__( 'Category', 'slz' ),
				'plural'   => esc_html__( 'Categories', 'slz' )
			) );

		register_taxonomy( $this->taxonomy_name, $this->post_type_name, array(
			'labels'            => array(
				'name'              => sprintf( esc_html_x( 'Event %s', 'taxonomy general name', 'slz' ),
					$category_names['plural'] ),
				'singular_name'     => sprintf( esc_html_x( 'Event %s', 'taxonomy singular name', 'slz' ),
					$category_names['singular'] ),
				'search_items'      => sprintf( esc_html__( 'Search %s', 'slz' ), $category_names['plural'] ),
				'all_items'         => sprintf( esc_html__( 'All %s', 'slz' ), $category_names['plural'] ),
				'parent_item'       => sprintf( esc_html__( 'Parent %s', 'slz' ), $category_names['singular'] ),
				'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'slz' ), $category_names['singular'] ),
				'edit_item'         => sprintf( esc_html__( 'Edit %s', 'slz' ), $category_names['singular'] ),
				'update_item'       => sprintf( esc_html__( 'Update %s', 'slz' ), $category_names['singular'] ),
				'add_new_item'      => sprintf( esc_html__( 'Add New %s', 'slz' ), $category_names['singular'] ),
				'new_item_name'     => sprintf( esc_html__( 'New %s Name', 'slz' ), $category_names['singular'] ),
				'menu_name'         => sprintf( esc_html__( '%s', 'slz' ), $category_names['plural'] )
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'rewrite'           => array(
				'slug' => $this->taxonomy_slug
			),
		) );

	}

	private function add_admin_filters() {
		add_filter(
			'manage_' . $this->get_post_type_name() . '_posts_columns',
			array( $this, '_filter_add_columns' ),
			10,
			1
		);
	}

	private function add_admin_actions() {
		add_action(
			'manage_' . $this->get_post_type_name() . '_posts_custom_column',
			array( $this, '_action_manage_custom_column' ),
			10,
			2
		);
		add_action( 'admin_enqueue_scripts', array( $this, '_action_enqueue_scripts' ) );
		add_action( 'admin_init', array( $this, '_action_add_permalink_in_settings' ) );
	}

	private function add_theme_actions() {
	}

	/**
	 * Modifies table structure for 'All Events' admin page
	 *
	 * @param $columns
	 *
	 * @return array
	 */
	public function _filter_add_columns( $columns ) {
		unset( $columns['date'], $columns[ 'taxonomy-' . $this->taxonomy_name ] );

		return array_merge($columns,
			array('event_location' => __( 'Location', 'slz' ),
				'event_date_range' => __( 'Event range', 'slz' ),
				'description' => __( 'Description', 'slz' ),
			)
		);
	}

	/**
	 * Adds event options for it's custom post type
	 *
	 * @internal
	 *
	 * @param $post_options
	 * @param $post_type
	 *
	 * @return array
	 */
	public function _filter_slz_post_options( $post_options, $post_type ) {
		if ( $post_type !== $this->post_type_name ) {
			return $post_options;
		}
		$event_options = apply_filters( 'slz_ext_events_post_options',
			array(
				'general_tab' => array(
					'title'   => esc_html__( 'General', 'slz' ),
					'type'    => 'tab',
					'options' => array(
						'event_ticket_price' => array(
							'label' => __('Ticket Price', 'slz'),
							'type'  => 'text',
							'value' => '0',
							'desc'  => __('Price to sale the ticket of the event', 'slz'),
							'save-in-separate-meta' => true
						),
						'description' => array(
							'type'  => 'textarea',
							'value' => '',
							'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
							'label' => esc_html__('Description', 'slz'),
						),
						'event_ticket_url' => array(
							'label' => __('Button Buy Ticket URL', 'slz'),
							'type'  => 'text',
							'desc'  => __('Input URL for payment method on button Buy Ticket', 'slz'),
						),
						'event_location' => array(
							'label' => __('Event Location', 'slz'),
							'type'  => 'text',
							'desc'  => __('Where does the event take place?', 'slz'),
						),
						'event_date_range' => array(
							'type'  => 'datetime-range',
							'label' => __( 'Start & End of Event', 'slz' ),
							'desc'  => __( 'Set start and end events datetime', 'slz' ),
							'datetime-pickers' => apply_filters( 'slz_option_type_event_datetime_pickers', array(
								'from' => array(
									'fixed'         => true,
									'timepicker'    => true,
									'datepicker'    => true,
									'defaultTime'   => '08:00'
								),
								'to'   => array(
									'fixed'         => true,
									'timepicker'    => true,
									'datepicker'    => true,
									'defaultTime'   => '18:00'
								)
							) ),
							'value' => array(
								'from' => '',
								'to'   => ''
							),
							'save-in-separate-meta' => true
						),
						'banner_image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Banner Ticket Background Image', 'slz'),
							'desc'  => esc_html__('Upload image .png or .jpg', 'slz'),
							'images_only' => true,
							'value' => '',
						),
					)
			) ) );

		if (empty($event_options)) {
			return $post_options;
		}

		if ( isset( $post_options['man'] ) && $post_options['main']['type'] === 'box' ) {
			$post_options['event_box']['options'][] = $event_options;
		} else {
			$post_options['event_box'] = array(
				'title'   => esc_html__('Event Options', 'slz' ),
				'desc'    => 'false',
				'type'    => 'box',
				'options' => $event_options
			);
		}

		return $post_options;
	}

	/**
	 * Fill custom column
	 *
	 * @internal
	 *
	 * @param $column
	 * @param $post_id
	 */
	public function _action_manage_custom_column( $column, $post_id ) {
		switch ( $column ) {
			case 'event_location' :
				echo $this->get_event_location( $post_id );
				break;
			case 'event_date_range' :
				echo $this->get_event_date_range( $post_id );
				break;
			case 'description' :
				echo $this->get_event_description( $post_id );
				break;
			default :
				break;
		}
	}

	/**
	 * Get saved event location array from db
	 *
	 * @param $post_id
	 *
	 * @return string
	 */
	private function get_event_location( $post_id ) {
		$meta = slz_get_db_post_option( $post_id);
		return ( ( isset( $meta['event_location'] ) and false === empty( $meta['event_location'] ) ) ? $meta['event_location'] : '&#8212;' );
	}

	private function get_event_description( $post_id ) {
		$meta = slz_get_db_post_option( $post_id);
		return ( ( isset( $meta['description'] ) and false === empty( $meta['description'] ) ) ? $meta['description'] : '&#8212;' );
	}

	private function get_event_date_range( $post_id ) {
		$meta = slz_get_db_post_option( $post_id);
		if ( isset( $meta['event_date_range'] ) and false === empty( $meta['event_date_range'] ) ) {
			$from = $meta['event_date_range']['from'];
			$to = $meta['event_date_range']['to'];
			$range = $from." - ".$to;
			return $range;
		}
		return '&#8212;';
	}

	private function get_meta_position( $post_id ) {
		$meta = slz_get_db_post_option( $post_id, 'position' );
		return ( ( isset( $meta ) and false === empty( $meta ) ) ? $meta : '&#8212;' );
	}

	/**
	 * Enquee backend styles on events pages
	 *
	 * @internal
	 */
	public function _action_enqueue_scripts() {
		$current_screen = array(
			'only' => array(
				array( 'post_type' => $this->post_type_name )
			)
		);
	}
	
	
	/*******BUY TICKET METHOD******/
	public function ajax_buy_ticket() {
		if( !empty( $_POST['params'][0] ) ) {
			$res = array();
			$res['status'] = 'fail';
			global $woocommerce;
			
			$money_donate = $_POST['params'][0]['money'];
			$post_id_event = $_POST['params'][0]['post_id'];
			$price_ticket = slz_get_db_post_option( $post_id_event, 'event_ticket_price', '0' );
			
			$prefix = 'event';
			$event_title = get_the_title( $post_id_event );
			$posts = get_post( $post_id_event );
			if( $posts ) {
				$event_slug = $posts->post_name;
			}else{
				$event_slug = '';
			}

			$product_id = $this->get_post_name2id( $event_slug , 'product');

			if (!isset($product_id) || empty($product_id)) {
				$product_cat = esc_html__( 'Events', 'slz' );
				$product_id = $this->create_woocommerce_product( $prefix, $event_title, $event_slug, $product_cat );
			}

			$variation_args = array(
				'post_type'   => 'product_variation',
				'post_parent' => $product_id,
				'post_name'   => $event_slug
			);
			$variation_obj  = get_posts($variation_args);
			if( !empty( $variation_obj ) ){
				$variation_id   = $variation_obj[0]->ID;
			}

			if (!isset($variation_id) || empty($variation_id)) {
				$variation_id = $this->create_woocommerce_product_variation( $prefix, $product_id, $event_title, $event_slug, $post_id_event );
			}

			if ($product_id > 0 && $variation_id > 0) {
				$cart_item_key = $woocommerce->cart->add_to_cart( $product_id, 3, $variation_id, null, null);
				if (!is_user_logged_in()) {
					$woocommerce->session->set_customer_session_cookie(true);
				}
				$woocommerce->session->set( 'slz_events_session_key_' . $cart_item_key,
											array(
												'type'  => 'events',
												'event_price_ticket' => $price_ticket,
												'post_id_event' => $post_id_event,
											));
			}
			$res['status'] = 'success';
			$res['url'] = esc_url( home_url().'/cart' );
			$res = json_encode( $res );
			echo ( $res );
		}
		die;
	}
	
	private function get_post_name2id( $name, $post_type ) {
		$args = array(
			'name'             => $name,
			'post_type'        => $post_type,
			'post_status'      => 'publish',
			'posts_per_page'   => 1,
			'suppress_filters' => false,
		);
		$posts = get_posts( $args );
		if( $posts ) {
			return $posts[0]->ID;
		}
		return false;
	}
	
	public function create_woocommerce_product( $prefix, $product_title, $product_slug, $product_cat ) {
		$new_post = array(
			'post_title' 		=> $product_title,
			'post_content' 		=> esc_html__('This is a variable product used for booking processed with WooCommerce', 'slz'),
			'post_status' 		=> 'publish',
			'post_name' 		=> $product_slug,
			'post_type' 		=> 'product',
			'comment_status' 	=> 'closed'
		);
		$product_id 			= wp_insert_post( $new_post );
		$sku					= $this->random_sku( $prefix, 6 );
		update_post_meta( $product_id, '_sku', $sku );
		wp_set_object_terms( $product_id, 'variable', 'product_type' );
		wp_set_object_terms( $product_id, $product_cat, 'product_cat' );
		
		$product_attributes = array(
			$prefix   => array(
				'name'			=> $prefix,
				'value'			=> '',
				'is_visible' 	=> '1',
				'is_variation' 	=> '1',
				'is_taxonomy' 	=> '0'
			)
		);
		update_post_meta( $product_id, '_product_attributes', $product_attributes);
		
		return $product_id;
	}
	
	public function create_woocommerce_product_variation( $prefix, $product_id, $title, $slug, $id ) {
		$new_post = array(
			'post_title' 		=> $title,
			'post_content' 		=> esc_html__('This is a product variation', 'slzexploore-core'),
			'post_status' 		=> 'publish',
			'post_type' 		=> 'product_variation',
			'post_parent'		=> $product_id,
			'post_name' 		=> $slug,
			'comment_status' 	=> 'closed'
		);
		$variation_id 			= wp_insert_post($new_post);
		update_post_meta($variation_id, '_stock_status', 		'instock');
		update_post_meta($variation_id, '_sold_individually', 	'yes');
		update_post_meta($variation_id, '_virtual', 			'yes');
		update_post_meta($variation_id, '_manage_stock', 'no' );
		update_post_meta($variation_id, '_downloadable', 'no' );
		update_post_meta($variation_id, 'attribute_' . $prefix, $id);
		return $variation_id;
	}
	
	public function random_sku($prefix = '', $len = 6) {
		$str = '';
		for ($i = 0; $i < $len; $i++) {
			$str .= rand(0, 9);
		}
		return $prefix . $str;
	}
}
