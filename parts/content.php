<?php

    get_template_part( 'parts/title', 'all' );

    $_content = get_the_content();

    if ( strlen( trim( strip_tags( $_content ) ) ) ) {
        ?>
        <section class="container flex-content">
            <div class="row">
                <div class="col-lg-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
        <?php
    }

    if ( have_rows( 'type' ) ) {
        while ( have_rows( 'type' ) ) {
            the_row();

            get_template_part( 'parts/acf/flex', get_row_layout() );
        }
    }

?>