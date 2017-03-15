<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'404-info' => array(
		'title'   => esc_html__( '404 Settings', 'seogrow' ),
		'type'    => 'tab',
		'options' => array(
			'header-box' => array(
				'title'   => esc_html__( '404 Settings', 'seogrow' ),
				'type'    => 'box',
				'options' => array(
					'404-background-image'	=> array(
						'label'   => esc_html__( 'Background Image', 'seogrow' ),
						'type'    => 'background-image',
						'value'   => 'none',
						'desc'    => esc_html__( 'Upload background image.', 'seogrow' ),
					),
					'404-title' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Title', 'seogrow' ),
					),
					'404-description' => array(
						'type'    => 'wp-editor',
						'value'   => 'default value',
						'label'   => esc_html__('Description', 'seogrow'),
						'size'    => 'large', // small, large
						'editor_height' => 200,
						'wpautop'       => true,
						'editor_type'   => false, // tinymce, html
					),
				)
			)
		)
	)
);
