<?php
    if ( has_post_thumbnail() ) :
        ?>
        <section class="container-fluid core-cta-image" style="background-image: url(<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'apm-cta-banner-interior' ); ?>);"></section>
        <?php
    endif;
?>