<?php
    if ( ( isset( $instance[ 'tabs' ] ) ) && ( is_array( $instance[ 'tabs' ] ) ) && ( count( $instance[ 'tabs' ] ) ) ) :
        $counter    = 0;
        $tab_id     = 'tabs-' . uniqid();
        ?>
        <ul class="nav nav-tabs" role="tablist">
        <?php
            foreach ( $instance[ 'tabs' ] as $tab ) :
                $tab_slug       = sanitize_title( strtolower( $tab[ 'title' ] ) );
                ?>
                <li role="presentation" class="tab-control<?php echo ( ( $counter === 0 ) ? ' active' : '' ); ?>">
                    <a href="#<?php echo $tab_id . '-' . $tab_slug; ?>" slug="<?php echo $tab_id . '-' . $tab_slug; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $tab[ 'title' ]; ?></a>
                </li>
                <?php
                $counter++;
            endforeach;
        ?>
        </ul>

        <div class="tab-content">
            <?php
                $counter    = 0;

                foreach ( $instance[ 'tabs' ] as $tab ) :
                    $tab_slug       = sanitize_title( strtolower( $tab[ 'title' ] ) );
                    ?>
                    <div role="tabpanel" class="tab-pane<?php echo ( ( $counter === 0 ) ? ' active' : '' ); ?>" id="<?php echo $tab_id . '-' . $tab_slug; ?>">
                        <?php
                            $content_id     = substr( md5( json_encode( $tab[ 'content' ] ) ), 0, 8 );

                            echo siteorigin_panels_render( 'w' . $content_id, true, $tab[ 'content' ] );
                        ?>
                    </div>
                    <?php
                    $counter++;
                endforeach;
            ?>
        </div>
        <?php
    endif;
?>