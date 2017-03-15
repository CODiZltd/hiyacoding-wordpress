<?php if ( ! defined( 'SLZ' ) ) die( 'Forbidden' );

/**
 * @since 2.4.10
 */
abstract class SLZ_Type {
	/**
	 * @return string Unique type
	 */
	abstract public function get_type();
}
