<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$regist_sidebars = array_merge( array( '' => esc_html__('-- Select widget area --', 'seogrow') ), SLZ_Com::get_regist_sidebars() );

$options = array(
	'footer_04' => array(
	    'footer-top'   => array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'status' => array(
					'label'        => esc_html__( 'Enable Footer Top', 'seogrow' ),
					'desc'         => esc_html__( 'Enable the footer top?', 'seogrow' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'enable',
						'label' => esc_html__( 'Enable', 'seogrow' )
					),
					'left-choice'  => array(
						'value' => 'disable',
						'label' => esc_html__( 'Disable', 'seogrow' )
					),
					'value'        => 'disable',
				)
			),
			'choices'      => array(
				'enable' => array(
			       	'widget-area-more' => array(
                        'type'   => 'addable-option',
                        'attr'   => array( 'class' => 'slz-footer-top-addable-option-04' ),
                        'label'  => esc_html__( 'Choose Widget Area', 'seogrow' ),
                        'desc'  => esc_html__('Choose widget area will show in footer top', 'seogrow'),
                        'option' => array(
                            'type'     => 'select',
                            'choices'  => $regist_sidebars
                        )
                    ),
				),
			),
		),
		'footer-main'   => array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'status' => array(
					'label'        => esc_html__( 'Enable Footer Main', 'seogrow' ),
					'desc'         => esc_html__( 'Enable the footer main?', 'seogrow' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'enable',
						'label' => esc_html__( 'Enable', 'seogrow' )
					),
					'left-choice'  => array(
						'value' => 'disable',
						'label' => esc_html__( 'Disable', 'seogrow' )
					),
					'value'        => 'disable',
				),
			),
			'choices'      => array(
				'enable' => array(
			       	'widget-area-more' => array(
                        'type'   => 'addable-option',
                         'attr'   => array( 'class' => 'slz-footer-addable-option-04' ),
                        'label'  => esc_html__( 'Choose Widget Area', 'seogrow' ),
                        'desc'  => esc_html__('Choose widget area will show in footer top', 'seogrow'),
                        'option' => array(
                            'type'     => 'select',
                            'choices'  => $regist_sidebars
                        )
                    ),
				),
			),
		),
		'footer-bottom'   => array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'status' => array(
					'label'        => esc_html__( 'Enable Footer Bottom', 'seogrow' ),
					'desc'         => esc_html__( 'Enable the footer bottom?', 'seogrow' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'enable',
						'label' => esc_html__( 'Enable', 'seogrow' )
					),
					'left-choice'  => array(
						'value' => 'disable',
						'label' => esc_html__( 'Disable', 'seogrow' )
					),
					'value'        => 'enable',
				)
			),
		),
	),
);