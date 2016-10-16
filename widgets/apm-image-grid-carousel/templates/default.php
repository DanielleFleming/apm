<?php
    if ( ( isset( $instance[ 'items' ] ) ) && ( is_array( $instance[ 'items' ] ) ) && ( count( $instance[ 'items' ] ) ) ) :
        $carousel_id    = 'carousel-' . uniqid();
        ?>
        <div id="<?php echo $carousel_id; ?>" class="owl-carousel">
            <?php
                foreach ( $instance[ 'items' ] as $item ) :
                    $link           = apm_link_postprocess( $item[ 'linkage' ], true );
                    ?>
                    <div class="item" style="background-image: url(<?php echo wp_get_attachment_image_url( $item[ 'image' ], 'apm-feature-thumb' ); ?>);">
                        <a href="<?php echo $link[ 'url' ]; ?>" target="<?php echo $item[ 'target' ]; ?>"><strong><?php echo $item[ 'title' ]; ?></strong></a>
                    </div>
                    <?php
                endforeach;
            ?>
        </div>
        <script type="text/javascript">
            jQuery( window ).load( function() {
                jQuery( '#<?php echo $carousel_id; ?>' ).owlCarousel( {
                    navigation: true,
                    navigationText: false,
                    pagination: false
                } );
            } );
        </script>
        <?php
    endif;
?>