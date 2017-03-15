<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$uniq_id = 'sc-contact-'.SLZ_Com::make_id();

$block_cls = $uniq_id.' '.$data['extra_class']. ' ';

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'contact' );

$info_default  = $shortcode->get_config( 'default_info' );

$main_info_default =  $shortcode->get_config( 'default_main_info' );

$sub_info_default = $shortcode->get_config( 'default_sub_info' );

$css =  $custom_css = '';

/*----------content html----------*/

if(function_exists('vc_param_group_parse_atts')){
    $data['array_info']  =  vc_param_group_parse_atts( $data['array_info'] );
}


$column = $data['column'];
$style  = $data['style'];

$class_col = '';
if(  $column == 1 ){
    $class_col = 'slz-column-1';
}
else if(  $column == 2 ){
    $class_col = 'slz-column-2';
}
else if(  $column == 3 ){
    $class_col = 'slz-column-3';
}
else if(  $column == 4 ){
    $class_col = 'slz-column-4';
}

$x = 0;

?>

<div class="slz-shortcode sc_contact <?php echo esc_attr( $block_cls );?> <?php echo esc_attr( $style );?>">

	<?php
    for( $i = 0; $i < ( count( $data['array_info'] ) / $column ); $i++ ){
    ?>
        <div class="slz-list-block slz-list-contact-01 slz-list-column <?php echo esc_attr( $class_col ); ?>">

        <?php
        if( !empty( $data['array_info'] ) ) {

            for ($j = $x; $j < ($column + $x) && $j < count($data['array_info']); $j++) {

                $info = $data['array_info'][$j];

                echo '<div class="item" id="item-'. esc_attr( $j ) .'"><div class="slz-contact-01">';

                $info = array_merge($info_default, $info);

                echo '<div class="contact-title main-item">';

                if (!empty($info['array_info_item'])) {
                  
                    if(function_exists('vc_param_group_parse_atts')){
                        $info['array_info_item'] = vc_param_group_parse_atts($info['array_info_item']);
                    }

                    foreach ($info['array_info_item'] as $item) {

                        $item = array_merge($main_info_default, $item);

                        if( !empty( $item['title'] ) || !empty( $item['contact_icon'] ) ) {
                            echo '<div>';
                            if (!empty($item['title'])) {
                                echo '<div class="text">';
                                if (!empty($item['contact_icon'])) {
                                    echo '<i class="slz-icon ' . esc_attr($item['contact_icon']) . ' "></i>';
                                }
                                echo wp_kses_post( nl2br($item['title']) ) . '</div>';
                            }
                            echo '</div>';
                        }

                        if ( !empty( $item['main_bg_color'] ) ) {
                            $css = '
                                .%1$s .slz-list-contact-01 div#item-%3$s .contact-title {
                                    background-color: %2$s;
                                }
                            ';
                            $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $item['main_bg_color'] ), $j );
                        }
                    }
                }

                echo '</div><div class="contact-content sub-item">';

                if (!empty($info['array_sub_info_item'])) {

                    if(function_exists('vc_param_group_parse_atts')){
                        $info['array_sub_info_item'] = vc_param_group_parse_atts($info['array_sub_info_item']);
                    }
                   

                    foreach ($info['array_sub_info_item'] as $item) {

                        $item = array_merge($sub_info_default, $item);

                        if( !empty( $item['sub_info'] ) || !empty( $item['sub_info_icon'] ) ) {
                            echo '<div>';
                            if (!empty($item['sub_info'])) {
                                echo '<div class="text">';
                                if (!empty($item['sub_info_icon'])) {
                                    echo '<i class="slz-icon ' . esc_attr($item['sub_info_icon']) . '"></i>';
                                }
                                echo wp_kses_post( nl2br($item['sub_info']) ) . '</div>';
                            }
                            echo '</div>';
                        }

                    }
                }

                if ( !empty( $info['description'] ) ) {
                    echo '<div class="blur">';
                    echo wp_kses_post( nl2br( $info['description'] ) );
                    echo '</div>';
                }

                echo '</div></div></div>';
            }

            $x = $column;
        }

        echo '</div>';
    }
    ?>
</div>


<?php

/*------Custom Css--------*/

if ( !empty( $data['title_color'] ) ) {
	$css = '
		.%1$s .contact-title {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['title_color'] ) );
}

if ( !empty( $data['info_color'] ) ) {
	$css = '
		.%1$s .contact-content {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['info_color'] ) );
}

if ( !empty( $data['main_icon_color'] ) ) {
    $css = '
        .%1$s .contact-title .slz-icon {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['main_icon_color'] ) );
}

if ( !empty( $data['sub_icon_color'] ) ) {
    $css = '
        .%1$s .contact-content .slz-icon {
            color: %2$s;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['sub_icon_color'] ) );
}

if ( !empty( $data['border_color'] ) ) {
	$css = '
		.%1$s .slz-list-contact-01 .item + .item:before {
			background-color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['border_color'] ) );
}

if ( !empty( $data['bg_color'] ) ) {
	$css = '
		.%1$s .slz-list-contact-01 {
			background-color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['bg_color'] ) );
}

if ( !empty( $custom_css ) ) {
	do_action( 'slz_add_inline_style', $custom_css );
}
?>