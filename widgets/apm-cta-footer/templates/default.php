<div class="style--<?php echo $instance[ 'style' ]; ?>">
    <?php
        echo wpautop( $instance[ 'content' ] );

        if ( ( isset( $instance[ 'buttons' ] ) ) && ( is_array( $instance[ 'buttons' ] ) ) && ( count( $instance[ 'buttons' ] ) ) ) :
            ?>
            <menu>
                <?php
                    foreach ( $instance[ 'buttons' ] as $button ) :
                        ?>
                        <a href="<?php echo sow_esc_url( $button[ 'linkage' ] ); ?>" target="<?php echo $button[ 'target' ]; ?>" class="btn btn-lg btn-secondary"><?php echo $button[ 'button' ]; ?></a>
                        <?php
                    endforeach;
                ?>
            </menu>
            <?php
        endif;
    ?>
</div>
