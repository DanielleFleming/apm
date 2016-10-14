<?php

    if ( ( get_field( 'code-location' ) == 'footer' ) && ( strlen( get_field( 'code' ) ) ) ) :
        ?>
        <script type="text/javascript"><?php echo get_field( 'code' ); ?></script>
        <?php
    endif;
