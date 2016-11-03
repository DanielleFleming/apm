<?php

    get_template_part( 'parts/content', 'featured_image' );

    if ( ( get_field( 'title-display' ) ) || ( is_home() ) || ( is_archive() ) || ( is_404() ) || ( is_search() ) || ( is_single() ) ) {
        $_page_id       = get_the_ID();

        switch ( true ) {
            case is_single() :
                $_title = get_the_title( $_page_id );
                break;

            case is_archive() :
                $_title = get_the_archive_title();
                break;

            case is_404() :
                $_title = __( 'Page Not Found', 'apm' );
                break;

            case is_search() :
                $_title = __( 'Search Results', 'apm' );
                break;

            case is_home() :
                $_page_id   = get_option( 'page_for_posts' );
                // we want to fall through here since we want the blog page to have the same titling options as regular pages
            default :
                $_title     = get_the_title( $_page_id );
                $_title_alt = get_field( 'title-override', $_page_id );

                if ( strlen( $_title_alt ) ) {
                    $_title = $_title_alt;
                }
                break;
        }

        $_subtitle = get_field( 'title-subtitle', $_page_id );
        ?>
        <header class="container-fluid core-heading">
            <h1 class="core-heading--title"><?php echo $_title; ?></h1>
            <?php if ( strlen( $_subtitle ) ) : ?><h2 class="core-heading--subtitle"><?php echo $_subtitle; ?></h2><?php endif; ?>
        </header>
        <?php
    }

?>