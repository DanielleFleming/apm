<?php
    if ( ( isset( $instance[ 'items' ] ) ) && ( is_array( $instance[ 'items' ] ) ) && ( count( $instance[ 'items' ] ) ) ) :
        $carousel_id        = 'carousel-' . uniqid();
        ?>
        <section class="container-fluid flex-carousel" style="background-color: <?php echo $instance[ 'bgcolor' ]; ?>;">
            <div id="<?php echo $carousel_id; ?>" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                    <?php
                        for ( $counter = 0; $counter < count( $instance[ 'items' ] ); $counter++ ) :
                            ?>
                            <li data-target="#<?php echo $carousel_id; ?>" data-slide-to="<?php echo $counter; ?>"<?php echo ( ( $counter === 0 ) ? ' class="active"' : '' ); ?>></li>
                            <?php
                        endfor;
                    ?>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <?php
                        foreach ( $instance[ 'items' ] as $index => $item ) :
                            $image_url      = wp_get_attachment_image_url( $item[ 'media' ][ 'image' ], 'apm-cta-banner' );
                            $image_style    = '';
                            $link           = apm_link_postprocess( $item[ 'headline' ][ 'linkage' ] );
                    
                            switch ( strtolower( $item[ 'media' ][ 'style' ] ) ) {
                                case 'cover' : 
                                    $image_style        = 'background-size: cover;';
                                    break;
                                
                                case 'center' :
                                    $image_style        = 'background-position: center center;';
                                    break;
                                
                                case 'repeat' :
                                    $image_style        = 'background-repeat: repeat;';
                                    break;
                            }
                            ?>
                            <div class="item<?php echo ( ( $index === 0 ) ? ' active' : '' ); ?>">
                                <div class="<?php echo $item[ 'media' ][ 'width' ]; ?> container<?php echo ( ( $item[ 'media' ][ 'width' ] != 'boxed' ) ? '-fluid' : '' ); ?>">
                                    <div class="row">
                                        <div class="col-lg-12 item-inner" style="height: <?php echo ( ( strlen( $instance[ 'height' ] ) ) ? $instance[ 'height' ] : '443' ); ?>px; background-image: url(<?php echo $image_url; ?>); <?php echo $image_style; ?>">
                                            <div class="carousel-caption">
                                                <div class="carousel-caption__inner" style="background-color: <?php echo $item[ 'headline' ][ 'bgcolor' ]; ?>; background-color: <?php echo apm_color_postprocess( $item[ 'headline' ][ 'bgcolor' ], $item[ 'headline' ][ 'bgopacity' ] ); ?>;">
                                                    <h2<?php echo ( ( strlen( $item[ 'headline' ][ 'icon' ] ) ) ? ' class="has-icon"' : '' ); ?>>
                                                        <?php
                                                            if ( strlen( $item[ 'headline' ][ 'icon' ] ) ) {
                                                                echo '<i class="' . apm_icon_postprocess( $item[ 'headline' ][ 'icon' ] ) . '"></i>';
                                                            }

                                                            echo $item[ 'headline' ][ 'title' ];
                                                        ?>

                                                        <?php
                                                            if ( strlen( $item[ 'headline' ][ 'subtitle' ] ) ) :
                                                                ?>
                                                                <em><?php echo $item[ 'headline' ][ 'subtitle' ]; ?></em>
                                                                <?php
                                                            endif;
                                                        ?>
                                                    </h2>

                                                    <span class="carousel-caption__inner-button"><a href="<?php echo $link[ 'url' ]; ?>" target="<?php echo $item[ 'headline' ][ 'linktarget' ]; ?>" class="btn btn-secondary"><?php echo $item[ 'headline' ][ 'button' ]; ?></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    ?>
                </div>

                <a class="left carousel-control" href="#<?php echo $carousel_id; ?>" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#<?php echo $carousel_id; ?>" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <?php
    endif;
?>