<?php if ( ! defined( 'SLZ' ) ) { die( 'Forbidden' ); }

$model = new SLZ_Recruitment();
$model->init( $data );

$uniq_id = 'sc-recruitment-'.$model->attributes['uniq_id'];
$block_cls = $model->attributes['extra_class'] . ' ' . $uniq_id;

if( ! $model->query->have_posts() ) {
    return;
}

$html_options = $model->set_default_options();

$data['show_salary']  = (!empty($data['show_salary']))? '%4$s' : '' ;
$data['show_location']  = (!empty($data['show_location']))? ' %7$s' : '' ;

if( !(empty($data['show_salary'])) || !(empty($data['show_location'])) ){
    $group =  sprintf('<div class="recruitment-td group">%1$s%2$s</div>',$data['show_salary'],$data['show_location']);
}else{
    $group =  sprintf('%1$s%2$s',$data['show_salary'],$data['show_location']);
}

$data['show_expired_date']  = (!empty($data['show_expired_date']))? '%9$s' : '' ;
$data['show_more_info']  = (!empty($data['show_more_info']))? '<div class="recruitment-td group">%10$s</div>' : '' ;
$data['show_working_type']  = (!empty($data['show_working_type']))? '%8$s' : '' ;
$data['show_btn']  = (!empty($data['show_btn']))? '%6$s' : '' ;
$data['show_featured_image']  = (!empty($data['show_featured_image']))? '%1$s' : '' ;


$html_format = '<div class="recruitment-tr">
                    '.$data['show_featured_image'].'
                    %2$s
                    '.$data['show_expired_date'].'
                    '.wp_kses_post($group).'
                    '.$data['show_more_info'] .'
                    '.$data['show_working_type'].'
                    '.$data['show_btn'].'
                </div>';

$html_render['html_format'] = $html_format;

$html_render['image_format'] = '<div class="recruitment-td image"> <a href="%2$s" class="link"> %1$s </a> </div>';

$html_render['thumbnail_format'] = '<div class="recruitment-td image"><a href="%2$s" class="link">%1$s</a></div>';

$html_render['title_format'] = '<div class="recruitment-td title"> <a class="link" href="%2$s"> %1$s </a> </div>';

$html_render['location_format'] ='<div class="location"> %1$s </div>';

$html_render['salary_format'] ='<div class="salary"> %1$s </div>';

$html_render['expired_date_format'] ='<div class="recruitment-td date-post"> %1$s </div>';

$html_render['more_info_format'] ='<div class="more-info"> <span> %2$s : </span> %1$s </div>';

$html_render['recruit_type_format'] ='<div class="recruitment-td type wk-type-%2$s"> <div class="text"> %1$s </div> </div>';

$html_render['btn_format']  ='<div class="recruitment-td read-more"> <a href="%2$s" class="apply-btn" %3$s> %1$s </a> </div>';

$html_options = $model->set_default_options( $html_render );

?>
<div class="slz-shortcode sc-recruitment-list <?php echo esc_attr( $block_cls ); ?>" data-json="<?php echo esc_attr(json_encode($data));?>">
    <div class="slz-recruitment-table">
        <?php
        $model->html_format = $html_options;
        $i = 0;
        if ($model->query->have_posts()) {
            while ($model->query->have_posts()) {
                $model->query->the_post();
                $model->loop_index();
                $html_options = $model->html_format;
                $i ++;
                printf( $html_options['html_format'],
                    $model->get_meta_image_upload('large',$html_options),
                    $model->get_title($html_options),
                    $model->get_post_date(),
                    $model->get_salary(),
                    $model->get_description(),
                    $model->get_apply_button(),
                    $model->get_location(),
                    $model->get_recruit_type($i),
                    $model->get_expired_date(),
                    $model->get_more_info()
                );

                $custom_css = '';
                $working_type =  get_term_by('slug', $model->post_meta['recruit_type'], 'slz-recruitment-type', ARRAY_A );

                $type_bg_color = slz_get_db_term_option($working_type['term_id'], 'slz-recruitment-type', 'working-type-bg-color');

                $type_color = slz_get_db_term_option($working_type['term_id'], 'slz-recruitment-type', 'working-type-text-color');
                
                if ( !empty( $type_bg_color['color'] ) ) {
                    $css = '
                        .%1$s .recruitment-td.wk-type-%3$s .text{
                            background-color: %2$s;
                        }
                    ';
                    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $type_bg_color['color'] ), esc_attr($i) );
                }

                if ( !empty( $type_color['color'] ) ) {
                    $css = '
                        .%1$s .recruitment-td.wk-type-%3$s .text{
                            color: %2$s;
                        }
                    ';
                    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $type_color['color'] ), esc_attr($i) );
                }

                if ( !empty( $custom_css ) ) {
                    do_action('slz_add_inline_style', $custom_css);
                }

            }

        }?>
    </div>
</div>

