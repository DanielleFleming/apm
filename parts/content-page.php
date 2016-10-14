<?php

    the_content();

    if ( have_rows( 'type' ) ) {
        while ( have_rows( 'type' ) ) {
            the_row();

            get_template_part( 'parts/acf/flex', get_row_layout() );
        }
    }

?>