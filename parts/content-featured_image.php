<?php
    $_page_id       = get_the_ID();

    if ( ( is_home() ) || ( is_archive() ) || ( is_404() ) || ( is_search() ) ) {
        $_page_id       = get_option( 'page_for_posts' );
    }

    if ( has_post_thumbnail( $_page_id ) ) :
        ?>
        <section class="container-fluid core-cta-image" style="background-image: url(<?php echo wp_get_attachment_image_url( get_post_thumbnail_id( $_page_id ), 'apm-cta-banner-interior' ); ?>);"></section>
        <?php
    endif;
?>