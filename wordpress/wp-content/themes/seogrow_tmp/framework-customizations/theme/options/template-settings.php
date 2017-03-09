<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$regist_sidebars = array_merge( array( '' => esc_html__('-- Select widget area --', 'seogrow') ), SLZ_Com::get_regist_sidebars() );
$article_ext = slz_ext('articles');
$sidebar_layout = array(
	'left' => array(
		'small' => array(
			'height' => 50,
			'src'    => SEOGROW_OPTION_IMG_URI .'/sidebar/left.png'
		)
	),
	'right' => array(
		'small' => array(
			'height' => 50,
			'src'    => SEOGROW_OPTION_IMG_URI .'/sidebar/right.png'
		)
	),
	'none' => array(
		'small' => array(
			'height' => 50,
			'src'    => SEOGROW_OPTION_IMG_URI .'/sidebar/full.png'
		)
	),
);
$title_type =  array(
	'level'       => esc_html__(' Default','seogrow'),
	'custom'      => esc_html__(' Custom','seogrow'),
);
$portfolio_box = array(
	'title'   => esc_html__( 'Portfolio Archive', 'seogrow' ),
	'type'    => 'box',
	'options' => array(
		'portfolio-ac-sidebar-layout'    => array(
			'label'   => esc_html__( 'Sidebar Layout', 'seogrow' ),
			'desc'    => esc_html__( 'Set how to display sidebar in portfolio archive pages.', 'seogrow' ),
			'type'    => 'image-picker',
			'choices' => $sidebar_layout,
			'value'   => 'left'
		),
		'portfolio-ac-sidebar'  =>  array(
			'type'  => 'select',
			'label' => esc_html__('Choose Sidebar', 'seogrow'),
			'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
			'choices' => $regist_sidebars,
		),
		'portfolio-ac-title'  =>  array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'title-type' => array(
					'type'  => 'radio',
					'value' => 'default',
					'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					'label' => esc_html__('Choose Title', 'seogrow'),
					'choices' => $title_type,
					'inline' => true,
				),
			),
			'choices'      => array(
				'custom' => array(
					'custom-title' => array(
						'label'   => esc_html__( 'Custom Title', 'seogrow' ),
						'type'    => 'text',
						'value'   => '',
						'desc'    => esc_html__( 'Add custom title for archive', 'seogrow' ),
					),
				)
			),
		),
		'portfolio-ac-limit_post'  =>  array(
			'type'  => 'short-text',
			'label' => esc_html__('Post Per Page', 'seogrow'),
			'desc'  => esc_html__('Add limit posts per page. Set -1 or empty to show all.', 'seogrow'),
		),
		'portfolio-ac-column'  =>  array(
			'type'  => 'short-text',
			'label' => esc_html__('Column', 'seogrow'),
			'desc'  => esc_html__('Enter number of columns to display list of portfolio.', 'seogrow'),
			'value' => '4',
		),
	)
);
$team_box = array(
	'title'   => esc_html__( 'Team Archive', 'seogrow' ),
	'type'    => 'box',
	'options' => array(
		'team-ac-sidebar-layout'    => array(
			'label'   => esc_html__( 'Sidebar Layout', 'seogrow' ),
			'desc'    => esc_html__( 'Set how to display sidebar in team archive pages.', 'seogrow' ),
			'type'    => 'image-picker',
			'choices' => $sidebar_layout,
			'value'   => 'left'
		),
		'team-ac-sidebar'  =>  array(
			'type'  => 'select',
			'label' => esc_html__('Choose Sidebar', 'seogrow'),
			'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
			'choices' => $regist_sidebars,
		),
	)
);
$service_box = array(
	'title'   => esc_html__( 'Service Archive', 'seogrow' ),
	'type'    => 'box',
	'options' => array(
		'service-ac-sidebar-layout'    => array(
			'label'   => esc_html__( 'Sidebar Layout', 'seogrow' ),
			'desc'    => esc_html__( 'Set how to display sidebar in service archive pages.', 'seogrow' ),
			'type'    => 'image-picker',
			'choices' => $sidebar_layout,
			'value'   => 'left'
		),
		'service-ac-sidebar'  =>  array(
			'type'  => 'select',
			'label' => esc_html__('Choose Sidebar', 'seogrow'),
			'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
			'choices' => $regist_sidebars,
		),
	)
);
$recruit_box = array(
	'title'   => esc_html__( 'Recruitment Archive', 'seogrow' ),
	'type'    => 'box',
	'options' => array(
		'recruitment-ac-sidebar-layout'    => array(
			'label'   => esc_html__( 'Sidebar Layout', 'seogrow' ),
			'desc'    => esc_html__( 'Set how to display sidebar in recruitment archive pages.', 'seogrow' ),
			'type'    => 'image-picker',
			'choices' => $sidebar_layout,
			'value'   => 'left'
		),
		'recruitment-ac-sidebar'  =>  array(
			'type'  => 'select',
			'label' => esc_html__('Choose Sidebar', 'seogrow'),
			'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
			'choices' => $regist_sidebars,
		),
	)
);
if ( $article_ext != null )
{
	$options = array(
		'article_tab' => array(
			'title'   => esc_html__( 'Template Settings', 'seogrow' ),
			'type'    => 'tab',
			'options' => array(
				'template-settings-tab' => array(
					'title'   => esc_html__( 'Template Settings', 'seogrow' ),
					'type'    => 'tab',
					'options' => array(
						'page-template-box' => array(
							'title'   => esc_html__( 'Page Settings', 'seogrow' ),
							'type'    => 'box',
							'options' => array(
								'page-sidebar-layout'    => array(
									'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
									'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
									'type'  => 'image-picker',
									'choices' => $sidebar_layout,
									'value' => 'left'
								),
								'page-sidebar'  =>  array(
									'type'  => 'select',
									'label' => esc_html__('Choose Sidebar', 'seogrow'),
									'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
									'choices' => $regist_sidebars,
								),
							)
						),
						'main-blog-template-box' => array(
							'title'   => esc_html__( 'Blog Settings', 'seogrow' ),
							'type'    => 'box',
							'options' => array(
								'main-blog-article-style' => array(
									'label' => esc_html__( 'Article Style', 'seogrow' ),
									'type'    => 'image-picker',
									'choices' => $article_ext->get_article_choices(),
									'value'   => SLZ_Com::get_first( $article_ext->get_article_choices() ),
								),
								'main-blog-sidebar-layout'    => array(
									'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
									'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
									'type'  => 'image-picker',
									'choices' => $sidebar_layout,
									'value' => 'left'
								),
								'main-blog-sidebar'  =>  array(
									'type'  => 'select',
									'label' => esc_html__('Choose Sidebar', 'seogrow'),
									'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
									'choices' => $regist_sidebars,
								),
							)
						),
						'portfolio-template-box' => $portfolio_box,
						'team-template-box' => $team_box,
						'service-template-box' => $service_box,
						'recruit-template-box' => $recruit_box,
						'search-template-box' => array(
							'title'   => esc_html__( 'Search Settings', 'seogrow' ),
							'type'    => 'box',
							'options' => array(
								'search-article-style' => array(
									'label' => esc_html__( 'Article Style', 'seogrow' ),
									'type'    => 'image-picker',
									'choices' => $article_ext->get_article_choices(),
									'value'   => SLZ_Com::get_first( $article_ext->get_article_choices() ),
								),
								'search-sidebar-layout'    => array(
									'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
									'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
									'type'  => 'image-picker',
									'choices' => $sidebar_layout,
									'value' => 'left'
								),
								'search-sidebar'  =>  array(
									'type'  => 'select',
									'label' => esc_html__('Choose Sidebar', 'seogrow'),
									'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
									'choices' => $regist_sidebars,
								),
							)
						),
						'author-template-box' => array(
							'title'   => esc_html__( 'Author Settings', 'seogrow' ),
							'type'    => 'box',
							'options' => array(
								'author-article-style' => array(
									'label' => esc_html__( 'Article Style', 'seogrow' ),
									'type'    => 'image-picker',
									'choices' => $article_ext->get_article_choices(),
									'value'   => SLZ_Com::get_first( $article_ext->get_article_choices() ),
								),
								'author-sidebar-layout'    => array(
									'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
									'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
									'type'  => 'image-picker',
									'choices' => $sidebar_layout,
									'value' => 'left'
								),
								'author-sidebar'  =>  array(
									'type'  => 'select',
									'label' => esc_html__('Choose Sidebar', 'seogrow'),
									'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
									'choices' => $regist_sidebars,
								),
							)
						),
						'category-template-box' => array(
							'title'   => esc_html__( 'Category Settings', 'seogrow' ),
							'type'    => 'box',
							'options' => array(
								'category-article-style' => array(
									'label' => esc_html__( 'Article Style', 'seogrow' ),
									'type'    => 'image-picker',
									'choices' => $article_ext->get_article_choices(),
									'value'   => SLZ_Com::get_first( $article_ext->get_article_choices() ),
								),
								'category-sidebar-layout'    => array(
									'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
									'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
									'type'  => 'image-picker',
									'choices' => $sidebar_layout,
									'value' => 'left'
								),
								'category-sidebar'  =>  array(
									'type'  => 'select',
									'label' => esc_html__('Choose Sidebar', 'seogrow'),
									'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
									'choices' => $regist_sidebars,
								),
							)
						),
						'archive-template-box' => array(
							'title'   => esc_html__( 'Archive Settings', 'seogrow' ),
							'type'    => 'box',
							'options' => array(
								'archive-article-style' => array(
									'label' => esc_html__( 'Article Style', 'seogrow' ),
									'type'    => 'image-picker',
									'choices' => $article_ext->get_article_choices(),
									'value'   => SLZ_Com::get_first( $article_ext->get_article_choices() ),
								),
								'archive-sidebar-layout'    => array(
									'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
									'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
									'type'  => 'image-picker',
									'choices' => $sidebar_layout,
									'value' => 'left'
								),
								'archive-sidebar'  =>  array(
									'type'  => 'select',
									'label' => esc_html__('Choose Sidebar', 'seogrow'),
									'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
									'choices' => $regist_sidebars,
								),
							)
						),
						'tag-template-box' => array(
							'title'   => esc_html__( 'Tag Settings', 'seogrow' ),
							'type'    => 'box',
							'options' => array(
								'tag-article-style' => array(
									'label' => esc_html__( 'Article Style', 'seogrow' ),
									'type'    => 'image-picker',
									'choices' => $article_ext->get_article_choices(),
									'value'   => SLZ_Com::get_first( $article_ext->get_article_choices() ),
								),
								'tag-sidebar-layout'    => array(
									'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
									'desc'  => esc_html__( 'Set how to display blog sidebar.', 'seogrow' ),
									'type'  => 'image-picker',
									'choices' => $sidebar_layout,
									'value' => 'left'
								),
								'tag-sidebar'  =>  array(
									'type'  => 'select',
									'label' => esc_html__('Choose Sidebar', 'seogrow'),
									'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
									'choices' => $regist_sidebars,
								),
							)
						),
						
					)
				),
			)
		)
	);
}
