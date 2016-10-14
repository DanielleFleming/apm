<?php

    if ( ( get_field( 'title-display' ) ) || ( is_404() ) || ( is_search() ) ) {
        switch ( true ) {
            case is_404() :
                $_title     = __( 'Page Not Found', 'apm' );
                break;

            case is_search() :
                $_title     = __( 'Search Results', 'apm' );
                break;

            default :
                $_title         = get_the_title();
                $_title_alt     = get_field( 'title-override' );

                if ( strlen( $_title_alt ) ) {
                    $_title         = $_title_alt;
                }
                break;
        }
        
        $_subtitle      = get_field( 'title-subtitle' );
        ?>
        <header class="core-heading">
            <h1><?php echo $_title; ?></h1>
            <?php if ( strlen( $_subtitle ) ) : ?><h2><?php echo $_subtitle; ?></h2><?php endif; ?>
        </header>
        <?php
    }
?>