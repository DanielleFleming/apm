<?php
    if ( ( isset( $instance[ 'points' ] ) ) && ( is_array( $instance[ 'points' ] ) ) && ( count( $instance[ 'points' ] ) ) ) :
        ?>
        <div id="apm-timeline" class="apm-timeline-container">
            <?php
                foreach ( $instance[ 'points' ] as $point ) :
                    ?>
                    <div class="apm-timeline-block">
                        <div class="apm-timeline-dot"></div>

                        <div class="apm-timeline-content">
                            <span class="apm-timeline-date"><?php echo $point[ 'year' ]; ?></span>

                            <?php if ( $point[ 'image' ] ) : ?>
                                <div class="apm-timeline-content--inner with-image">
                                    <div class="apm-timeline-content--inner-image">
                                        <img src="<?php echo wp_get_attachment_image_url( $point[ 'image' ], 'full' ); ?>">
                                    </div>
                                    <div class="apm-timeline-content--inner-text">
                                        <?php echo wpautop( $point[ 'content' ] ); ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="apm-timeline-content--inner">
                                    <?php echo wpautop( $point[ 'content' ] ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                endforeach;
            ?>
        </div>

        <script type="text/javascript">
            jQuery( document ).ready( function() {
                var timeline        = jQuery( '.apm-timeline-block' );

                timeline
                    .each(  function() {
                                if ( jQuery( this ).offset().top > jQuery( window ).scrollTop() + jQuery( window ).height() * 0.75 ) {
                                    jQuery( this ).find( '.apm-timeline-dot, .apm-timeline-content' ).addClass( 'is-hidden' );
                                }
                            } );

                jQuery( window ).on( 'scroll', function() {
                    timeline
                        .each(  function() {
                                    if( jQuery( this ).offset().top <= jQuery( window ).scrollTop() + jQuery( window ).height() * 0.75 && jQuery( this ).find( '.apm-timeline-dot' ).hasClass( 'is-hidden' ) ) {
                                        jQuery( this ).find( '.apm-timeline-dot, .apm-timeline-content' ).removeClass( 'is-hidden' ).addClass( 'bounce-in' );
                                    }
                                } );
                            } );
            } );
        </script>
        <?php
    endif;
?>