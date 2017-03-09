<div class="item">
    <div class="slz-icon-box-1 style-vertical style-3">
        <div class="icon-cell">
            <?php
            if ( $item['show_icon'] == '0' && !empty( $item['image'] ) )
                echo wp_get_attachment_image( $item['image'], 'full' );
            else if ( $item['show_icon'] == '1' && !empty( $item['icon_fontawesome'] ) )
                echo '<i class="' . esc_attr( $item['icon_fontawesome'] ) . '"></i>';
            else
                echo '';
            ?>
        </div>
        <div class="content-cell">
            <div class="wrapper-info">
                <div class="information"><?php echo wp_kses_post( $item['information'] ); ?></div>
            </div>
        </div>
    </div>
</div>