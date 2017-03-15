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
function _filter_slz_ext_portfolio_template_include( $template ) {

	/**
	 * @var SLZ_Extension_Events $portfolio
	 */
	$portfolio = slz()->extensions->get( 'portfolio' );

	if ( is_singular( $portfolio->get_post_type_name() ) ) {
		if ( $portfolio->locate_view_path( 'single' ) ) {
			return $portfolio->locate_view_path( 'single' );
		}
	} else if ( ( is_post_type_archive( $portfolio->get_post_type_name() ) || is_tax( $portfolio->get_taxonomy_name() ) ) && $portfolio->locate_view_path( 'archive' ) ) {
		return $portfolio->locate_view_path( 'archive' );
	}

	return $template;
}

add_filter( 'template_include', '_filter_slz_ext_portfolio_template_include' );

