<?php
    if ( ( get_field( 'breadcrumbs-display' ) ) && ( function_exists( 'yoast_breadcrumb' ) ) ) :
        yoast_breadcrumb( '<nav class="container core-breadcrumbs">', '</nav>' );
    endif;
?>