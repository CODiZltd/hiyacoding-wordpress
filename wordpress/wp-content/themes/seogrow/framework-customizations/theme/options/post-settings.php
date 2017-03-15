<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$post_ext = slz_ext('posts');

if ( empty( $post_ext ) )
	return;

$date_type  = array(
    'normal'    => esc_html__( 'Normal', 'seogrow' ),
    'ribbon'    => esc_html__( 'Ribbon', 'seogrow' ),
);

$regist_sidebars = array_merge( array( '' => esc_html__('-- Select widget area --', 'seogrow') ), SLZ_Com::get_regist_sidebars() );
$sidebar_layout = array(
	'left' => array(
		'small' => array(
			'height' => 50,
			'src'    => SEOGROW_OPTION_IMG_URI . '/sidebar/left.png'
		)
	),
	'right' => array(
		'small' => array(
			'height' => 50,
			'src'    => SEOGROW_OPTION_IMG_URI . '/sidebar/right.png'
		)
	),
	'none' => array(
		'small' => array(
			'height' => 50,
			'src'    => SEOGROW_OPTION_IMG_URI . '/sidebar/full.png'
		)
	),
);
$social_box = array(
	'type'   => 'multi-picker',
	'label'  => false,
	'picker' => array(
		'enable-social-share' => array(
			'type'        => 'switch',
			'value'       => 'disable',
			'label'       => esc_html__( 'Social Share', 'seogrow' ),
			'desc'   => esc_html__( 'Enable social share links in single pages ?', 'seogrow' ),
			'left-choice' => array(
				'value' => 'disable',
				'label' => esc_html__( 'Disable', 'seogrow' ),
			),
			'right-choice' => array(
				'value' => 'enable',
				'label' => esc_html__( 'Enable', 'seogrow' ),
			)
		),
	),
	'choices'    => array(
		'enable' => array(
			'social-share-info' => array(
				'label'  => esc_html__( 'Add Social', 'seogrow' ),
				'type'   => 'addable-option',
				'option' => array(
					'type'  => 'select',
					'choices' => array(
						'facebook'    => esc_html__('Facebook', 'seogrow'),
						'twitter'     => esc_html__('Twitter', 'seogrow'),
						'google-plus' => esc_html__('Google Plus', 'seogrow'),
						'pinterest'   => esc_html__('Pinterest', 'seogrow'),
						'linkedin'    => esc_html__('Linkedint', 'seogrow'),
						'digg'        => esc_html__('Digg', 'seogrow'),
					)
				),
			),
		),
	),
);
//-------------------------------------------------------------------------//

$posts_tab = array (
	'title'   => esc_html__( 'Post Settings', 'seogrow' ),
	'type'    => 'tab',
	'options' => array(
		'posts-box'        => array(
			'title'   => esc_html__( 'Post Layout', 'seogrow' ),
			'type'    => 'box',
			'options' => array(
				'blog-layout'	=> array(
					'type'    => 'image-picker',
					'label'   => esc_html__( 'Blog Style', 'seogrow' ),
					'desc'    => esc_html__( 'Select the blog display style', 'seogrow' ),
					'choices' => $post_ext->get_post_choices(),
					'value'   => SLZ_Com::get_first( $post_ext->get_post_choices() ),
				),
				'blog-sidebar-layout'    => array(
					'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
					'desc'  => esc_html__( 'Set how to display sidebar in single pages.', 'seogrow' ),
					'type'  => 'image-picker',
					'choices' =>$sidebar_layout,
					'value' => 'left'
				),
				'blog-sidebar' => array(
					'type'    => 'select',
					'label'   => esc_html__('Post Sidebar', 'seogrow'),
					'desc'    => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
					'choices' => $regist_sidebars,
				),
			)
		),
		'post-info-box' => array(
			'title'   => esc_html__( 'Post Info', 'seogrow' ),
			'type'    => 'box',
			'options' => array(
				'post-info' => array(
					'label'  => esc_html__( 'Select Post Info', 'seogrow' ),
					'type'   => 'addable-option',
					'option' => array(
						'type'  => 'select',
						'choices' => array(
							'date'     => esc_html__('Date', 'seogrow'),
							'author'   => esc_html__('Author', 'seogrow'),
							'category' => esc_html__('Category', 'seogrow'),
							'tag'      => esc_html__('Tag', 'seogrow'),
							'comment'  => esc_html__('Comment Count', 'seogrow'),
							'view'     => esc_html__('View Count', 'seogrow'),
						)
					),
					'value'  => array( 'author', 'date', 'comment' ),
					'desc'   => esc_html__( 'Select post info to show in single pages and blocks.', 'seogrow' ),
				),
			)
		),
		'related-box' => array(
			'title'   => esc_html__( 'Related Articles', 'seogrow' ),
			'type'    => 'box',
			'options' => array(
				'blog-article'   => array(
					'type'         => 'multi-picker',
					'label'        => false,
					'desc'         => false,
					'picker'       => array(
						'status' => array(
							'label'        => esc_html__( 'Show Related Articles', 'seogrow' ),
							'desc'         => esc_html__( 'Show related articles in single pages ?', 'seogrow' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'show',
								'label' => esc_html__( 'Show', 'seogrow' )
							),
							'left-choice'  => array(
								'value' => 'hide',
								'label' => esc_html__( 'Hide', 'seogrow' )
							),
							'value'        => 'hide',
						)
					),
					'choices'      => array(
						'show' => array(
							'filter-by' => array(
								'label'        => esc_html__( 'Filter By', 'seogrow' ),
								'desc'         => esc_html__( 'Filter related articles by ?', 'seogrow' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'category',
									'label' => esc_html__( 'By Category', 'seogrow' )
								),
								'left-choice'  => array(
									'value' => 'tag',
									'label' => esc_html__( 'By Tag', 'seogrow' )
								),
								'value'        => 'category',
							),
							'limit' => array(
								'type'  => 'short-text',
								'label' => esc_html__( 'Article Post Limit', 'seogrow' ),
								'desc'  => esc_html__( 'Total post of related article will be show. Ex: 6', 'seogrow' ),
								'value' => '6',
							),
							'order_by' => array(
								'type'    => 'select',
								'label'   => esc_html__('Article Order By', 'seogrow'),
								'desc'    => esc_html__('Order the post in related article by ?', 'seogrow'),
								'choices' => array(
									'id'     => esc_html__('ID', 'seogrow'),
									'title'  => esc_html__('Title', 'seogrow'),
									'date'   => esc_html__('Date', 'seogrow'),
									'author' => esc_html__('Author', 'seogrow'),
									'rand' => esc_html__('Random', 'seogrow')
								),
							),
							'order' => array(
								'type'    => 'select',
								'label'   => esc_html__('Article Order', 'seogrow'),
								'desc'    => esc_html__('Order the post in related article with ascending or descending mode ?', 'seogrow'),
								'choices' => array(
									'desc'  => esc_html__('Desc', 'seogrow'),
									'asc'   => esc_html__('Asc', 'seogrow')
								),
							)
						),
					),
					'show_borders' => true,
				),
			)
		),
		'post-content-box' => array(
			'title'   => esc_html__( 'Other Settings', 'seogrow' ),
			'type'    => 'box',
			'options' => array(
				'blog-post-tags' => array(
					'label'        => esc_html__( 'Post Tags', 'seogrow' ),
					'desc'         => esc_html__( 'Show list of post tags in single pages?', 'seogrow' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'seogrow' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'seogrow' )
					),
					'value'        => 'yes',
				),
				'blog-post-categories' => array(
					'label'        => esc_html__( 'Post Categories', 'seogrow' ),
					'desc'         => esc_html__( 'Show list of post categories in single pages ?', 'seogrow' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'seogrow' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'seogrow' )
					),
					'value'        => 'yes',
				),
				'blog-post-author-box' => array(
					'label'        => esc_html__( 'Author Box', 'seogrow' ),
					'desc'         => esc_html__( 'Show author box in single pages?', 'seogrow' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'seogrow' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'seogrow' )
					),
					'value'        => 'yes',
				),
				'blog-post-post-navigation' => array(
					'label'        => esc_html__( 'Post Navigation', 'seogrow' ),
					'desc'         => esc_html__( 'Show post navigation in single pages ?', 'seogrow' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'seogrow' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'seogrow' )
					),
					'value'        => 'yes',
				),
                'blog-post-date-type'	=>	array(
                    'type'  => 'select',
                    'label' => esc_html__( 'Date Type', 'seogrow' ),
                    'choices' => $date_type,
                ),
				'social-in-post' => $social_box,// end social
			),
		),
	),
);

$options_tab = array(
	$posts_tab,
);
$active_posttype_ext = slz()->theme->get_config('active_posttype_ext');
$option_title = array(
	'slz-portfolio'   => esc_html__( 'Portfolio Settings', 'seogrow' ),
	'slz-team'        => esc_html__( 'Team Settings', 'seogrow' ),
	'slz-service'     => esc_html__( 'Service Settings', 'seogrow'),
	'slz-recruitment' => esc_html__( 'Recruitment Settings', 'seogrow'),
	'product'         => esc_html__( 'Product Settings', 'seogrow'),
);
foreach( $active_posttype_ext as $option => $extension ) {
	// check extension is activated
	if( ( $option != 'product' && ! slz_ext( $extension ) ) || ( $option == 'product' && ! SEOGROW_WC_ACTIVE ) ) {
		continue;
	}
	$posttype = str_replace( 'slz-', '', $option );
	
	$box = array(
		'post-layout-box' => array(
			'title'   => $option_title[$option],
			'type'    => 'box',
			'options' => array(
				$posttype .'-sidebar-layout' => array(
					'label' => esc_html__( 'Sidebar Layout', 'seogrow' ),
					'desc'  => esc_html__( 'Set how to display sidebar in service single pages.', 'seogrow' ),
					'type'  => 'image-picker',
					'choices' => $sidebar_layout,
					'value' => 'left'
				),
				$posttype .'-sidebar'  =>  array(
					'type'  => 'select',
					'label' => esc_html__('Choose Sidebar', 'seogrow'),
					'desc'  => esc_html__('You can create new sidebar in','seogrow').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','seogrow').'</a>',
					'choices' => $regist_sidebars,
				),
			)
		)
	); // box options
	// is product
	if( $option == 'product' ) {
		$box = array_merge( $box, array(
				'related-box' => array(
					'title'   => esc_html__( 'Related Products', 'seogrow' ),
					'type'    => 'box',
					'options' => array(
						'product-related-post'   => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'status' => array(
									'label'        => esc_html__( 'Show Related Products', 'seogrow' ),
									'desc'         => esc_html__( 'Show related products in product pages ?', 'seogrow' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'show',
										'label' => esc_html__( 'Show', 'seogrow' )
									),
									'left-choice'  => array(
										'value' => 'hide',
										'label' => esc_html__( 'Hide', 'seogrow' )
									),
									'value'        => 'hide',
								)
							),
							'choices'      => array(
								'show' => array(
									'limit'           => array(
										'type'  => 'short-text',
										'label' => esc_html__( 'Limit Posts', 'seogrow' ),
										'desc'  => esc_html__( 'Total posts of related posts will be show.', 'seogrow' ),
										'value' => '6',
									),
									'column'           => array(
										'type'  => 'short-text',
										'label' => esc_html__( 'Columns', 'seogrow' ),
										'desc'  => esc_html__( 'Enter number of columns to show.', 'seogrow' ),
										'value' => '4',
									),
								),
							),
							'show_borders' => true,
						),
					)
				), //related box
			)
		);
	}
	// is portfolio extension?
	if( $option == 'slz-portfolio' )
	{
		$box = array_merge( $box, array(

			'related-box' => array(
				'title'   => esc_html__( 'Related Posts', 'seogrow' ),
				'type'    => 'box',
				'options' => array(
					'pf-related-post'   => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'status' => array(
								'label'        => esc_html__( 'Show Related Posts', 'seogrow' ),
								'desc'         => esc_html__( 'Show related posts in portfolio single pages ?', 'seogrow' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__( 'Show', 'seogrow' )
								),
								'left-choice'  => array(
									'value' => 'hide',
									'label' => esc_html__( 'Hide', 'seogrow' )
								),
								'value'        => 'hide',
							)
						),
						'choices'      => array(
							'show' => array(
								'title' => array(
									'label'        => esc_html__( 'Related Box Title', 'seogrow' ),
									'desc'         => esc_html__( 'Enter title for related box in portfolio single pages.', 'seogrow' ),
									'type'         => 'textarea',
								),
								'filter-by' => array(
									'label'        => esc_html__( 'Filter By', 'seogrow' ),
									'desc'         => esc_html__( 'Filter related posts by ?', 'seogrow' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'category',
										'label' => esc_html__( 'By Category', 'seogrow' )
									),
									'left-choice'  => array(
										'value' => 'author',
										'label' => esc_html__( 'By Author', 'seogrow' )
									),
									'value'        => 'category',
								),
								'limit'           => array(
									'type'  => 'short-text',
									'label' => esc_html__( 'Limit Posts', 'seogrow' ),
									'desc'  => esc_html__( 'Total posts of related post will be show.', 'seogrow' ),
									'value' => '6',
								),
								'column'           => array(
									'type'  => 'short-text',
									'label' => esc_html__( 'Columns', 'seogrow' ),
									'desc'  => esc_html__( 'Enter number of columns to show.', 'seogrow' ),
									'value' => '6',
								),
							),
						),
						'show_borders' => true,
					),
				)
			), //related box
		) );
	}


	$options_tab[] = array(
		$posttype .'-tab' => array(
			'title'   => $option_title[$option],
			'type'    => 'tab',
			'options' => $box,
		)
	);
}

$options = array(
	'posts'          => array(
		'title'   => esc_html__( 'Post Settings', 'seogrow' ),
		'type'    => 'tab',
		'options' => $options_tab
	),
);