<?php

    get_template_part( 'parts/content', 'featured_image' );

    if ( ( get_field( 'title-display' ) ) || ( is_home() ) || ( is_archive() ) || ( is_404() ) || ( is_search() ) || ( is_single() ) ) {
        switch ( true ) {
            case is_single() :
                $_title = get_the_title();
                break;

            case is_archive() :
                $_title = get_the_archive_title();
                break;

            case is_home() :
                $_title = __( 'News + Media', 'apm' );
                break;

            case is_404() :
                $_title = __( 'Page Not Found', 'apm' );
                break;

            case is_search() :
                $_title = __( 'Search Results', 'apm' );
                break;

            default :
                $_title     = get_the_title();
                $_title_alt = get_field( 'title-override' );

                if ( strlen( $_title_alt ) ) {
                    $_title = $_title_alt;
                }
                break;
        }

        $_subtitle = get_field( 'title-subtitle' );
        ?>
        <header class="container-fluid core-heading">
            <h1 class="core-heading--title"><?php echo $_title; ?></h1>
            <?php if ( strlen( $_subtitle ) ) : ?><h2 class="core-heading--subtitle"><?php echo $_subtitle; ?></h2><?php endif; ?>
        </header>
        <?php
    }

?>