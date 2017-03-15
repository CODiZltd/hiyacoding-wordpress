<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$regist_sidebars = array_merge( array( 'default' => esc_html__('-- Default --', 'seogrow') ), SLZ_Com::get_regist_sidebars() );

$default = array(
	'default'   => array(
		'small' => array(
			'height' => 70,
			'src'    => SEOGROW_OPTION_IMG_URI . '/default.png'
		),
		'large' => array(
			'height' => 214,
			'src'    => SEOGROW_OPTION_IMG_URI . '/default.png'
		),
	)
);

$page_header = slz()->theme->get_options( 'page-options' );

$options = array(
	'post-settings' => array(
		'type'    => 'box',
		'title'   => esc_html__(' Post Options','seogrow' ),
		'options' => array(
			'post-general-settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'General Settings', 'seogrow' ),
				'options' => array(
					'post-template' => array(
						'label'   => esc_html__( 'Post Template', 'seogrow' ),
						'type'    => 'image-picker',
						'attr'    => array('class' => 'slz-image-picker-max-width' ),
						'choices' => array_merge( $default, slz_ext('posts')->get_post_choices() ),
						'value'   => 'default'
					),
					'post-sidebar-layout' => array(
						'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
						'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
						'type'  => 'image-picker',
						'attr'  => array('class' => 'slz-image-picker-max-width' ),
						'choices' => array_merge( $default, array(
							'left' => array(
								'small' => array(
									'height' => 50,
									'src'    => SEOGROW_OPTION_IMG_URI . '/sidebar/left.png'
								)
							),
							'right' => array(
								'small' => array(
									'height' => 50,
									'src'	=> SEOGROW_OPTION_IMG_URI . '/sidebar/right.png'
								)
							),
							'none' => array(
								'small' => array(
									'height' => 50,
									'src'	=> SEOGROW_OPTION_IMG_URI . '/sidebar/full.png'
								)
							),
						) ),
						'value' => 'default'
					),
					'post-sidebar'  =>  array(
						'type'    => 'select',
						'label'   => esc_html__('Choose Sidebar', 'seogrow'),
						'desc'    => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance','seogrow').' > '.esc_html__('Widgets','seogrow').'</a>',
						'choices' => $regist_sidebars,
						'value'   => 'default'
					),
				)
			),
			$page_header,
			'feature-video' => array(
				'title'   => esc_html__( 'Feature Video', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'feature-video-settings' => array(
						'type'    => 'tab',
						'options' => array(
							'thumbnail' => array(
								'type'  => 'checkbox',
								'value' => false,
								'label' => esc_html__('Video Thumbnail', 'seogrow'),
								'text'  => esc_html__('Create thumbnail from video and using it as featured image?.', 'seogrow'),
							),
							'video_type'   => array(
								'type'   => 'multi-picker',
								'label'  => false,
								'desc'   => false,
								'picker' => array(
									'video_options' => array(
										'type'  => 'switch',
										'value' => 'yes',
										'label' => esc_html__( 'Type of Video', 'seogrow' ),
										'left-choice' => array(
											'value' => 'youtube',
											'label' => esc_html__( 'Youtube', 'seogrow' ),
										),
										'right-choice' => array(
											'value' => 'vimeo',
											'label' => esc_html__( 'Vimeo', 'seogrow' ),
										)
									),
								),
								'choices' => array(
									'vimeo' => array(
										'vimeo_link' => array(
											'type'  => 'text',
											'value' => '',
											'label' => esc_html__('Vimeo ID', 'seogrow'),
											'desc'  => esc_html__('Example the Video ID for http://vimeo.com/86323053 is 86323053', 'seogrow'),
										),
									),
									'youtube' => array(
										'youtube_link' => array(
											'type'  => 'text',
											'value' => '',
											'label' => esc_html__('Youtube ID', 'seogrow'),
											'desc'  => esc_html__('Example the Video ID for http://www.youtube.com/v/8OBfr46Y0cQ is 8OBfr46Y0cQ', 'seogrow'),
										),
									),
								),
							),
						)
					)
				),
			),
			'feature-audio' => array(
				'title'   => esc_html__( 'Feature Audio', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'feature-audio-settings' => array(
						'type'    => 'tab',
						'options' => array(

							'feature-audio-link' => array(
								'type'  => 'text',
								'value' => '',
								'label' => esc_html__('Audio Link', 'seogrow'),
								'desc'  => esc_html__('Input full link of audio.', 'seogrow'),
							),
                            'feature-audio-file' => array (
                                'type'  => 'upload',
                                'value' => array (),
                                'label' => esc_html__( 'Upload Audio', 'seogrow' ),
                                'help'  => esc_html__( 'Choose File to upload', 'seogrow' ),
                                'images_only' => false,
                                'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
                            ),
						)
					)
				),
			),
			'feature-gallery' => array(
				'title'   => esc_html__( 'Feature Gallery', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'feature-gallery-settings' => array(
						'type'    => 'tab',
						'options' => array(
							'feature-gallery-images' => array (
								'type'  => 'multi-upload',
								'value' => array (),
								'label' => esc_html__( 'Gallery Images', 'seogrow' ),
								'help'  => esc_html__( 'Choose Images to upload', 'seogrow' ),
								'images_only' => true,
							),
						)
					)
				),
			),
			'feature-quote' => array(
				'title'   => esc_html__( 'Feature Quote', 'seogrow' ),
				'type'    => 'tab',
				'options' => array(
					'feature-quote-settings' => array(
						'type'    => 'tab',
						'options' => array(
							'feature-quote-info' => array (
								'type'  => 'textarea',
								'value' => '',
								'label' => esc_html__('Quote Text', 'seogrow'),
								'help'  => esc_html__('Input quote text info', 'seogrow'),
							),
						)
					)
				),
			)
		),
	)
);