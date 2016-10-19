<?php
    $path       = dirname( __FILE__ ) . '/../assets/svg/map.svg';
    $handle     = fopen( $path, 'r' );

    if ( $handle ) :
        $contents   = fread( $handle, filesize( $path ) );
        fclose( $handle );

        print $contents;
    endif;

    if ( ( isset( $instance[ 'regions' ] ) ) && ( is_array( $instance[ 'regions' ] ) ) && ( count( $instance[ 'regions' ] ) ) ) :
        ?>
        <ul class="apm-global-reach-regions">
            <?php
                foreach ( $instance[ 'regions' ] as $region ) :
                    ?>
                    <li data-region="<?php echo $region[ 'region' ]; ?>">
                        <h4><?php echo APM_Global_Reach::lookup( $region[ 'region' ] ); ?></h4>
                        <div>
                            <?php echo wpautop( $region[ 'content' ] ); ?>
                        </div>
                    </li>
                    <?php
                endforeach;
            ?>
        </ul>
        <?php
    endif;
?>
<script type="text/javascript">
    jQuery( window ).load( function() {
        jQuery( '.widget.widget_apm-global-reach > .so-widget-apm-global-reach > svg' ).addClass( 'enabled' );
    } );
</script>
