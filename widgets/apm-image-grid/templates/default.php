<?php
    if ( ( isset( $instance[ 'items' ] ) ) && ( is_array( $instance[ 'items' ] ) ) && ( count( $instance[ 'items' ] ) ) ) :
        ?>
        <h3><?php echo $instance[ 'title' ]; ?></h3>

        <?php
            $columns        = $instance[ 'columns' ];
            $counter        = 0;

            echo '<ul>' . PHP_EOL;

            foreach ( $instance[ 'items' ] as $item ) :
                if ( ( $counter > 0 ) && ( $counter % $columns ) === 0 ) :
                    echo '</ul><ul>' . PHP_EOL;
                    $counter    = 0;
                endif;

                ?>
                <li>
                    <div class="image">
                        <div class="image--inner">
                            <?php
                                $image      = wp_get_attachment_image_url( $item[ 'image' ], 'full' );

                                if ( strlen( $item[ 'linkage' ] ) ) :
                                    ?><a href="<?php echo sow_esc_url( $item[ 'linkage' ] ); ?>" target="<?php echo $item[ 'target' ]; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $item[ 'title' ]; ?>"></a><?php
                                else :
                                    ?><img src="<?php echo $image; ?>" alt="<?php echo $item[ 'title' ]; ?>"><?php
                                endif;
                            ?>
                        </div>
                    </div>
                    <?php
                        if ( strlen( $item[ 'content' ] ) ) :
                            ?>
                            <div class="notes">
                                <?php echo wpautop( $item[ 'content' ] ); ?>
                            </div>
                            <?php
                        endif;
                    ?>
                </li>
                <?php
                $counter++;
            endforeach;

            echo '</ul>' . PHP_EOL;
        ?>

        <?php
    endif;
?>