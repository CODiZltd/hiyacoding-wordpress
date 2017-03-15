<?php
	
	$seogrow_search_icon = 'fa fa-search';

	$seogrow_search_placeholder = esc_html__('Search', 'seogrow');

	if ( defined ( 'SLZ' ) ){

		if ( is_page( ) ) {

			$seogrow_selected_header = slz_get_db_post_option( get_the_ID(), 'page-header-style' );

			if ( $seogrow_selected_header == 'default' )
				unset ( $seogrow_selected_header );

		}

		if ( empty ( $seogrow_selected_header ) && slz_get_db_settings_option('slz-header-style-group/slz-header-style', false) ){

			$seogrow_selected_header = slz_get_db_settings_option('slz-header-style-group/slz-header-style', '');

		}

		if ( !empty ( $seogrow_selected_header ) ) {

			$seogrow_key = 'slz-header-style-group/' . $seogrow_selected_header . '/search-group-styling';

			$seogrow_search_options = slz_get_db_settings_option( $seogrow_key, '');

			if ( !empty ( $seogrow_search_options ) ){

				
				if ( !empty ( $seogrow_search_options['icon-class'] ) ) {

				    $seogrow_search_icon = $seogrow_search_options['icon-class'];

				}

				if ( !empty ( $seogrow_search_options['placeholder'] ) ) {

				    $seogrow_search_placeholder = $seogrow_search_options['placeholder'];

				}else{
					$seogrow_search_placeholder = esc_html__('Enter your keyword', 'seogrow');
				}


			}

		}

	}

?>

<form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" accept-charset="utf-8" class="search-form">

	<input type="search" placeholder="<?php echo esc_attr($seogrow_search_placeholder); ?>" class="search-field" name="s" value="<?php echo get_search_query(); ?>" />

	<button type="submit" class="search-submit">
		<span class="search-icon">
			<?php esc_html_e('Search', 'seogrow')?>
		</span>
	</button>
</form>
