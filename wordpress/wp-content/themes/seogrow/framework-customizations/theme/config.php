<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
/**
 * Theme config
 *
 * @var array $cfg Fill this array with configuration data
 */

$cfg = array();
$cfg['settings_form_side_tabs'] = true;


$cfg['sidebar_mapping'] = array(
	'post'            => 'blog-sidebar',
	'page'            => 'page-sidebar',
	'slz-portfolio'   => 'portfolio-sidebar',
	'slz-team'        => 'team-sidebar',
	'slz-service'     => 'service-sidebar',
	'slz-recruitment' => 'recruitment-sidebar',
	'archive_slz-portfolio'   => 'portfolio-ac-sidebar',
	'archive_slz-service'     => 'service-ac-sidebar',
	'archive_slz-team'        => 'team-ac-sidebar',
	'archive_slz-recruitment' => 'recruitment-ac-sidebar',
);
// post
$cfg['post_template_default'] = array(
	'main-blog-article-style' => 'article_04',
	'archive-article-style'   => 'article_04',
	'category-article-style'  => 'article_04',
	'tag-article-style'       => 'article_04',
	'author-article-style'    => 'article_04',
	'search-article-style'    => 'article_04',
	'blog-layout'             => 'post_05',
);



$cfg['ribbon_date_format'] = array(
	'day'   => esc_html_x('d','daily posts date format', 'seogrow'),
	'month' => esc_html_x('M','daily posts date format', 'seogrow'),
	'year'  => esc_html_x('Y','daily posts date format', 'seogrow'),
);

$cfg['map_config'] = array(
	'color'    => array(
		array(
            "featureType" => "water",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "color" => "#e9e9e9"
                ),
                array(
                    "lightness" => 17
                )
            )
        ),
        array(
            "featureType" => "landscape",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "color" => "#f5f5f5"
                ),
                array(
                    "lightness" => 20
                )
            )
        ),
        array(
            "featureType" => "road.highway",
            "elementType" => "geometry.fill",
            "stylers" => array(
                array(
                    "color" => "#ffffff"
                ),
                array(
                    "lightness" => 17
                )
            )
        ),
        array(
            "featureType" => "road.highway",
            "elementType" => "geometry.stroke",
            "stylers" => array(
                array(
                    "color" => "#ffffff"
                ),
                array(
                    "lightness" => 29
                ),
                array(
                    "weight" => 0.2
                )
            )
        ),
        array(
            "featureType" => "road.arterial",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "color" => "#ffffff"
                ),
                array(
                    "lightness" => 18
                )
            )
        ),
        array(
            "featureType" => "road.local",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "color" => "#ffffff"
                ),
                array(
                    "lightness" => 16
                )
            )
        ),
        array(
            "featureType" => "poi",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "color" => "#f5f5f5"
                ),
                array(
                    "lightness" => 21
                )
            )
        ),
        array(
            "featureType" => "poi.park",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "color" => "#dedede"
                ),
                array(
                    "lightness" => 21
                )
            )
        ),
        array(
            "elementType" => "labels.text.stroke",
            "stylers" => array(
                array(
                    "visibility" => "on"
                ),
                array(
                    "color" => "#ffffff"
                ),
                array(
                    "lightness" => 16
                )
            )
        ),
        array(
            "elementType" => "labels.text.fill",
            "stylers" => array(
                array(
                    "saturation" => 36
                ),
                array(
                    "color" => "#333333"
                ),
                array(
                    "lightness" => 40
                )
            )
        ),
        array(
            "elementType" => "labels.icon",
            "stylers" => array(
                array(
                    "visibility" => "off"
                )
            )
        ),
        array(
            "featureType" => "transit",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "color" => "#f2f2f2"
                ),
                array(
                    "lightness" => 19
                )
            )
        ),
        array(
            "featureType" => "administrative",
            "elementType" => "geometry.fill",
            "stylers" => array(
                array(
                    "color" => "#fefefe"
                ),
                array(
                    "lightness" => 20
                )
            )
        ),
        array(
            "featureType" => "administrative",
            "elementType" => "geometry.stroke",
            "stylers" => array(
                array(
                    "color" => "#fefefe"
                ),
                array(
                    "lightness" => 17
                ),
                array(
                    "weight" => 1.2
                )
            )
        ),
	)
);
//post type => extension name
$cfg['active_posttype_ext'] = array(
	'slz-portfolio'   => 'portfolio',
	'slz-service'     => 'services',
	'slz-team'        => 'teams',
	'slz-recruitment' => 'recruitment',
    'product'         => 'product',
);

$cfg['woo_posttype_deregister'] = array(
    'page',
    'post',
    'slz-service',
    'slz-team',
    'slz-portfolio',
    'slz-recruitment',
    'product'
);
// Typography & custom color config <<
$cfg['typography_settings'] = array(
	'typo-body' => 'body',
	'typo-paragraph' => 'p',
	'typo-h1' => 'h1, .entry-content h1',
	'typo-h2' => 'h2, .entry-content h2',
	'typo-h3' => 'h3, .entry-content h3',
	'typo-h4' => 'h4, .entry-content h4',
	'typo-h5' => 'h5, .entry-content h5',
	'typo-h6' => 'h6, .entry-content h6',
);
// Some of suggest colors for theme
$cfg['site_default_colors'] = array(
	'color_1' => '#31c290',
	'color_2' => '#ed9914',
	'color_3' => '#687dd8',
	'color_4' => '#e86830',
	'color_5' => '#4cc3bb',
	'color_6' => '#ff6b6b',
	'color_7' => '#00aff0',
);
// This config to setting color to theme ( key => default color, label, desc )
$cfg['site_custom_colors'] = array(
	'main-color'    => array('#31c290', esc_html__( 'Main Color', 'seogrow' ), esc_html__( 'Select the main color', 'seogrow' ) ),
);
// >> Typography & custom color config
