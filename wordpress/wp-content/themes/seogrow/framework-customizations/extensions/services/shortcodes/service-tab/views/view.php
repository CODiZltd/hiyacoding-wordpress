<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$model = new SLZ_Service();
$model->init( $data );
$uniq_id = $model->attributes['uniq_id'];
$block_cls = $model->attributes['extra_class'] . ' ' . $uniq_id;

// 1$ - uniq_id, 2$ - active class, 3$ - gallery, 4$ - content, 5$ - title , 6$ - button, 7$ featured image
$html_format = '
    <div id="tab-%1$s" role="tabpanel" class="tab-pane fade %2$s">
        <div class="slz-block-item-01 style-2 service-tab-item">
            <div class="block-image">
                <div class="link">
                    %7$s
                </div>
            </div>
            <div class="block-content">
                %3$s
                %4$s
                %5$s
                %6$s
            </div>
        </div>
    </div>
';

// 1$ - uniq_id, 2$ - active class, 3$ - image, 4$ - title
$tab_format = '
    <li role="presentation" class="%2$s">
        <a href="#tab-%1$s" role="tab" data-toggle="tab" class="link">
            %3$s
            %4$s
        </a>
    </li>
';

$html_render =  array(
                    'html_format'  => $html_format,
                    'tab_format'   => $tab_format,
                   
                );

printf( '<div class="slz-shortcode sc-service-tab slz-tab-horizontal %1$s">', esc_attr( $block_cls ) );
    echo '<div class="tab-list-wrapper"><ul role="tablist" class="tab-list">';
         $model->render_tab_list( $html_render );
    echo '</ul></div>';
    echo '<div class="tab-content">';
         $model->render_tab_content( $html_render );
    echo '</div>';
print('</div>');

$custom_css = '';
if ( !empty( $data['icon_active_color'] ) ) {
    $css = '
        .%1$s ul.tab-list li.active a[data-toggle="tab"] .wrapper-icon {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['icon_active_color'] ) );
}
if ( !empty( $data['icon_hv_color'] ) ) {
    $css = '
        .%1$s ul.tab-list li a[data-toggle="tab"]:hover .wrapper-icon {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['icon_hv_color'] ) );
}
if ( !empty( $data['title_hv_color'] ) ) {
    $css = '
        .%1$s ul.tab-list li a[data-toggle="tab"]:hover {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['title_hv_color'] ) );
}
if ( !empty( $data['title_ct_color'] ) ) {
    $css = '
        .%1$s .title {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['title_ct_color'] ) );
}
if ( !empty( $data['title_ct_hv_color'] ) ) {
    $css = '
        .%1$s .title:hover {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['title_ct_hv_color'] ) );
}
if ( !empty( $data['btn_color'] ) ) {
    $css = '
        .%1$s .slz-btn {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['btn_color'] ) );
}
if ( !empty( $data['btn_hv_color'] ) ) {
    $css = '
        .%1$s .slz-btn:hover {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['btn_hv_color'] ) );
}
if ( !empty( $data['btn_bg_color'] ) ) {
    $css = '
        .%1$s .slz-btn {
            background-color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['btn_bg_color'] ) );
}
if ( !empty( $data['btn_bg_hv_color'] ) ) {
    $css = '
        .%1$s .slz-btn:hover {
            background-color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['btn_bg_hv_color'] ) );
}

if ( !empty( $custom_css ) ) {
    do_action('slz_add_inline_style', $custom_css);
}