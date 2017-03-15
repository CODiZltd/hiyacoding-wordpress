<?php if ( ! defined( 'SLZ' ) ) {
    die( 'Forbidden' );
}

$uniq_id = 'video-' . SLZ_Com::make_id();
$video_url = $image_url =  $title  = $description = '';

if( !empty( $data['image_video'] ) ){
    $image_url = wp_get_attachment_url( $data['image_video'] );
}

if ( $data['video_type'] == 'youtube' && !empty( $data['id_youtube'] ) ) {
    $video_url = 'https://www.youtube.com/embed/' . esc_attr( $data['id_youtube'] ) . '?rel=0';
}
elseif ( $data['video_type'] == 'vimeo' && !empty( $data['id_vimeo'] ) ) {
    $video_url = 'https://player.vimeo.com/video/' . esc_attr( $data['id_vimeo'] ) . '?rel=0';
}
if( ! empty( $data['title'] ) ) {
    $title = '<div class="title">'.$data['title'].'</div>';
}

if( ! empty( $data['content'] ) ) {
    $description = '<div>'. $data['content'] .'</div>';
}

if ( !empty( $image_url ) && !empty( $video_url ) ):
?>
<div class="slz-shortcode sc-video slz-block-video <?php echo esc_attr( $uniq_id ).' '.esc_attr($data['extra_class']); ?>">
    <div class="block-video <?php echo esc_attr( $data['align'] ); ?>">
        <div>
            <div class="btn-play">
                <i class="icons fa fa-play"></i>
            </div>
            <div class="btn-close" data-src="<?php echo esc_url( $video_url ); ?>"><i class="icons fa fa-times"></i></div>
            <?php echo wp_kses_post($title); ?>
            <?php echo wp_kses_post($description); ?>
            <img src="<?php echo esc_url( $image_url ); ?>" alt="" class="img-full"/>
            <?php echo ( $instance->iframe_render( $video_url ) ); ?>
        </div>
    </div>
</div>
<?php
    if ( !empty( $data['height'] ) ) {
        $custom_css = sprintf( '.%1$s.slz-block-video .block-video::before{ padding-top:%2$s ; }',
                                esc_attr( $uniq_id ),esc_attr( $data['height'] ) );
        do_action( 'slz_add_inline_style', $custom_css );
    }
endif;
