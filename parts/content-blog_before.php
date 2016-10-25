<?php

    if ( is_home() ) {
        $query      = new WP_Query(
            array(
                'p'         => get_option( 'page_for_posts' ),
                'post_type' => 'page'
            )
        );

        if ( $query->have_posts() ) :
            $query->the_post();

            setup_postdata( get_the_ID() );

            the_content();
        endif;

        wp_reset_postdata();
    }

?>