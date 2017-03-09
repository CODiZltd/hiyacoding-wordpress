<div class="item">
    <div class="featured-carousel-item">
        <?php
        if( isset( $item['title'] ) ) {
            ?>
            <div class="wrapper-info">
                <div class="title"><?php echo esc_html( $item['title'] ); ?></div>
                <?php
                if( !empty( $item['description'] ) ) {
                    echo '<div class="description">' . esc_html( $item['description'] ) . '</div>';
                }
                ?>
            </div>
            <div class="wrapper-image">
                <?php $img_url = wp_get_attachment_url($item['slider_img']);
                if(!empty($img_url)){
                    echo '<img class="img-slider" alt="" src="'.esc_url($img_url).'">';
                }?>
                
            </div>
            <?php
        }
        ?>
    </div>
</div>
