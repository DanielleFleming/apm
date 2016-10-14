<section class="row">
    <div class="col-lg-12">
        <menu class="social" role="navigation">
            <h5><?php _e( 'Get Social with Us', 'apm' ); ?></h5>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'nav-social',
                        'container'      => '',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                        'walker'         => new APM_Nav_Walker_Accessibility_Ranger()
                    )
                );
            ?>
        </menu>
    </div>
</section>
