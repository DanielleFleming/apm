<?php
    $link           = new WP_Query(
        array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'order'             => 'desc',
            'orderby'           => 'date',
            'posts_per_page'    => 1,
            'paged'             => 1
        )
    );

    if ( $link->have_posts() ) {
        $link->the_post();

        $link           = array(
            'title'     => get_the_title( $link->ID ),
            'excerpt'   => get_the_excerpt( $link->ID ),
            'url'       => get_the_permalink( $link->ID )
        );
    }

    wp_reset_postdata();

    if ( ( isset( $link[ 'title' ] ) ) && ( isset( $link[ 'url' ] ) ) && ( strlen( $link[ 'title' ] ) ) && ( strlen( $link[ 'url' ] ) ) ) :
        ?>
        <h2 class="title"><a href="<?php the_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e( 'In the News', 'apm' ); ?></a></h2>
        <div class="apm-cta-news--preview">
            <h3><?php echo $link[ 'title' ]; ?></h3>

            <p>
                <?php if ( ( isset( $link[ 'excerpt' ] ) ) && ( strlen( $link[ 'excerpt' ] ) ) ) : ?><?php echo $link[ 'excerpt' ]; ?><?php endif; ?>
                <a href="<?php echo $link[ 'url' ]; ?>"><?php _e( 'Read More', 'apm' ); ?></a>
            </p>
        </div>
        <?php
    endif;
?>