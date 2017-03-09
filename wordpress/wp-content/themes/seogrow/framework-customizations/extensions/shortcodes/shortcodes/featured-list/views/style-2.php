<div class="item">
    <div class="slz-icon-box-1 style-horizontal">
        <?php
        if( isset( $item['title'] ) ) {
            ?>
            <div class="content-cell">
                <?php
                if ( isset( $item['num'] ) ) {
                    echo '<div class="number">'. ( ( $item['num'] > 9 ) ? esc_html( $item['num'] ) : '0' . esc_html( $item['num'] ) ) .'</div>';
                }
                ?>
                <div class="wrapper-info">
                    <div class="title"><?php echo esc_html( $item['title'] ); ?></div>
                    <?php
                    if( !empty( $item['description'] ) ) {
                        echo '<div class="description">' . esc_html( $item['description'] ) . '</div>';
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
