<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

/**
 * Select custom page template on frontend
 *
 * @internal
 *
 * @param string $template
 *
 * @return string
 */
function _filter_slz_ext_events_template_include( $template ) {

	/**
	 * @var SLZ_Extension_Events $teams
	 */
	$teams = slz()->extensions->get( 'events' );
	$post_type = $teams->get_post_type_name();
	$taxonomy  = $teams->get_taxonomy_name();

	if ( is_singular( $post_type ) && $teams->locate_view_path( 'single' ) ) {
		return $teams->locate_view_path( 'single' );
	}
	else if ( ( is_post_type_archive( $post_type ) || is_tax( $taxonomy ) ) && $teams->locate_view_path( 'archive' ) ) {
		return $teams->locate_view_path( 'archive' );
	}

	return $template;
}

add_filter( 'template_include', '_filter_slz_ext_events_template_include' );

/* */
add_filter( 'woocommerce_cart_item_subtotal', '_filter_slz_events_display_item_subtotal', 10, 3 );
function _filter_slz_events_display_item_subtotal( $output, $cart_item, $cart_item_key ) {
		global $woocommerce;
		if (isset($cart_item['data'])) {
			$item_data = $cart_item['data'];
			$object_class = get_class($item_data);
			if ( !$item_data || !$item_data->post || $object_class != 'WC_Product_Variation') {
				return $output;
			}
			$cart_item_meta = $woocommerce->session->get('slz_events_session_key_' . $cart_item_key);
			if ( isset($cart_item_meta['type']) && isset( $cart_item_meta['event_price_ticket'] ) ) {
				$output = wc_price( $cart_item_meta['event_price_ticket'] * $cart_item['quantity'] );
			}
		}
		return $output;
}

add_filter( 'woocommerce_cart_item_price', '_filter_slz_events_display_item_price', 10, 3 );
function _filter_slz_events_display_item_price( $output, $cart_item, $cart_item_key ) {
	global $woocommerce;
	if (isset($cart_item['data'])) {
		$item_data = $cart_item['data'];
		$object_class = get_class($item_data);
		if ( !$item_data || !$item_data->post || $object_class != 'WC_Product_Variation') {
			return $output;
		}
		$cart_item_meta = $woocommerce->session->get('slz_events_session_key_' . $cart_item_key);
		if ( isset($cart_item_meta['type']) && isset( $cart_item_meta['event_price_ticket'] ) ) {
			$output = wc_price( $cart_item_meta['event_price_ticket'] );
		}
	}
	return $output;
}

add_action( 'woocommerce_before_calculate_totals' , '_action_slz_events_add_custom_total_price', 20 , 1 );
function _action_slz_events_add_custom_total_price($cart_object) {
	global $woocommerce;
	foreach ( $cart_object->cart_contents as $key => $value ) {
		$cart_item_meta = $woocommerce->session->get('slz_events_session_key_' . $key);
		if ( isset($cart_item_meta['type']) && isset( $cart_item_meta['event_price_ticket'] ) ) {
			$value['data']->price = $cart_item_meta['event_price_ticket'];
		}
	}
}

add_filter( 'woocommerce_variation_is_purchasable', '_filter_slz_events_variation_is_purchasable', 20, 2 );
function _filter_slz_events_variation_is_purchasable( $purchasable, $product_variation ) {
	$object_class = get_class($product_variation);
	if( $object_class == 'WC_Product_Variation' ) {
		$purchasable = true;
	}
	return $purchasable;
}

add_filter( 'woocommerce_is_sold_individually', '_filter_slz_events_set_sold', 10, 2 ); 
function _filter_slz_events_set_sold( $return, $instance ) {
	if( isset( $instance->parent->post ) ) {
		$post_id = $instance->parent->post->ID;
		$term_list = wp_get_post_terms($post_id,'product_cat',array('fields'=>'slugs'));
		$term_list = $term_list[0];
		if( $term_list == 'events' ) {
			return false;
		}else{
			return true;
		}
	}
}

add_action( 'woocommerce_checkout_order_processed', '_action_slz_events_checkout_order_processed', 10, 2);
function _action_slz_events_checkout_order_processed( $order_id, $posted ) {
	global $woocommerce;
	$array_meta = array();
	$array_final = array();
	
	if( $woocommerce->cart != null ) {
		foreach ( $woocommerce->cart->cart_contents as $key => $value ) {
			$cart_item_meta = $woocommerce->session->get('slz_events_session_key_' . $key);
			if( isset( $cart_item_meta['post_id_event'] ) ) {
				$i = 0;
				$first_name = '';
				$last_name = '';
				$email = '';
				$phone = '';
				$payment_method = '';
				$address = '';
				$quantity = '';
				$price_ticket = '';
				
				$id = $cart_item_meta['post_id_event'];
				$array_meta = array();
				$array_final = array();
				$arr_data_db = get_post_meta( $id, 'slz_event_buy_ticket_data', true );
				
				$first_name = get_post_meta( $order_id, '_billing_first_name', true );
				$last_name = get_post_meta( $order_id, '_billing_last_name', true );
				$email = get_post_meta( $order_id, '_billing_email', true );
				$phone = get_post_meta( $order_id, '_billing_phone', true );
				$payment_method = get_post_meta( $order_id, '_payment_method_title', true );
				$order_total = get_post_meta( $order_id, '_order_total', true );
				
				$address = get_post_meta( $order_id, '_billing_address_1', true );
				$quantity = $value['quantity'];
				$price_ticket = slz_get_db_post_option( $id, 'event_ticket_price', '0' );
				
				
				if( !empty( $first_name ) ) {
					$array_meta['first_name'] = $first_name;
				}
				
				if( !empty( $last_name ) ) {
					$array_meta['last_name'] = $last_name;
				}
				
				if( !empty( $email ) ) {
					$array_meta['email'] = $email;
				}
				
				if( !empty( $phone ) ) {
					$array_meta['phone'] = $phone;
				}
	
				if( !empty( $payment_method ) ) {
					$array_meta['payment_method'] = $payment_method;
				}
				
				if( !empty( $address ) ) {
					$array_meta['address'] = $address;
				}
				
				if( !empty( $quantity ) ) {
					$array_meta['quantity'] = $quantity;
				}
				
				if( !empty( $price_ticket ) ) {
					$array_meta['price_ticket'] = $price_ticket;
				}
				
				if( !empty( $order_total ) ) {
					$array_meta['order_total'] = $order_total;
				}

				if( !empty( $array_meta ) ) {
					$arr_data_db = json_decode( $arr_data_db );

					if( !empty( $arr_data_db ) ) {
						array_push( $arr_data_db, $array_meta );
						$array_final = $arr_data_db;
					}else{
						$array_final[0] = $array_meta;
					}

					$array_final = json_encode($array_final);
					update_post_meta( $id, 'slz_event_buy_ticket_data', $array_final );
				}

				$i++;
			}
		}
	}
}