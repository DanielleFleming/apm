<?php
    echo wpautop( $instance[ 'content' ] );

    if ( ( isset( $instance[ 'buttons' ] ) ) && ( is_array( $instance[ 'buttons' ] ) ) && ( count( $instance[ 'buttons' ] ) ) ) :
        ?>
        <menu>
            <?php
                foreach ( $instance[ 'buttons' ] as $button ) :
                    $link           = apm_link_postprocess( $button[ 'linkage' ], true );
                    ?>
                    <a href="<?php echo $link[ 'url' ]; ?>" target="<?php echo $button[ 'target' ]; ?>" class="btn btn-lg btn-secondary"><?php echo $button[ 'button' ]; ?></a>
                    <?php
                endforeach;
            ?>
        </menu>
        <?php
    endif;
?>