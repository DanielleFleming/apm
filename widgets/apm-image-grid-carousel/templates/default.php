<?php
    if ( ( isset( $instance[ 'items' ] ) ) && ( is_array( $instance[ 'items' ] ) ) && ( count( $instance[ 'items' ] ) ) ) :
        $carousel_id    = 'carousel-' . uniqid();
        ?>
        <div id="<?php echo $carousel_id; ?>" class="items">
            <?php
                foreach ( $instance[ 'items' ] as $item ) :
                    ?>
                    <div class="item" style="background-image: url(<?php echo wp_get_attachment_image_url( $item[ 'image' ], 'apm-feature-thumb' ); ?>);">
                        <a href="<?php echo sow_esc_url( $item[ 'linkage' ] ); ?>" target="<?php echo $item[ 'target' ]; ?>"><strong><?php echo $item[ 'title' ]; ?></strong></a>
                    </div>
                    <?php
                endforeach;
            ?>
        </div>
        <script>
            jQuery( window ).load( function() {
                jQuery( '#<?php echo $carousel_id; ?>' ).slick(
                    {
                        infinite: true,
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        pauseOnHover: true,
                        responsive: [
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            }, 
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    }
                );
            } );
        </script>
        <?php
    endif;
?>