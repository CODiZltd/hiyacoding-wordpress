<?php
/**
* Ajax Class
*/
class SLZ_Ajax_Loader
{	
	function __construct() {
		wp_enqueue_script( 'slz-slz-ajax-form', slz_get_framework_directory_uri('/static/js/slz-slz-ajax-form.js' ), array('jquery'),'1.0', true );
		wp_localize_script(
				'slz-slz-ajax-form',
				'ajaxurl',
				esc_url(admin_url( 'admin-ajax.php' ))
		);
	}

	public function init(){
		add_action( 'wp_ajax_slz_slz_core',        array( &$this, 'ajax' ) );
		add_action( 'wp_ajax_nopriv_slz_slz_core', array( &$this, 'ajax' ) );
	}
	/**
	 * It is an action triggered whenever a ajax call
	 */
	public function ajax() {
		@ob_clean();
		//header( 'Content-Type: application/json; charset="UTF-8"' );
		if( $act = $this->get_request_param( 'module' ) ) {
			if( 2 == count($act)  ) {
				$class = slz()->extensions->get( $act[0] );
				if ( $class && method_exists( $class, $act[1]) ) {
					slz()->extensions->get( $act[0] )->$act[1]();
				}else{
					echo json_encode( array( 'mesasge' => 'Can\'t not load class ' . $act[0] ) );
				}
			} else {
				echo json_encode( array( 'mesasge' => 'Can\'t not load class ' . $act[0] ) );
			}
		}
		die();
	}

	public function get_request_param( $name, $default_value = null ) {
		return isset( $_GET[ $name ] ) ? $_GET[ $name ] : ( isset( $_POST[ $name ] ) ? $_POST[ $name ] : $default_value );
	}
}
