<header role="presentation">
  <!-- TopBar -->
      <div id="topbar" class="text-center">
        <p>
          INTRODUCING: OUTAGE IN A BOX<sup>&reg;</sup>
          <a href="http://www.apm4parts.com/outages?utm_source=Static%20Banner" class="topbar-button">See What's Inside</a>
        </p>
        <button id="topbar-close" onclick="hideTopBar()">
          <i class="fa fa-times-circle-o" aria-hidden="true"></i>
        </button>
      </div>
    <!-- End TopBar -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#apm-navbar"
                        aria-expanded="false">
                    <span class="sr-only"><?php _e( 'Toggle navigation', 'apm' ); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>/"><?php bloginfo( 'name' ); ?> -
                    <strong><?php echo strip_tags( get_field( 'header-tagline', 'options' ), '<br>' ); ?></strong></a>
            </div>

            <div class="collapse navbar-collapse" id="apm-navbar">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'nav-main',
                            'container'      => '',
                            'menu_class'     => 'nav navbar-nav',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                            'walker'         => new APM_Nav_Walker_Accessibility_Ranger(),
                            'depth'          => 3
                        )
                    );
                ?>

                <form action="<?php bloginfo( 'url' ); ?>/" method="post" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" name="s" class="form-control"
                               placeholder="<?php _e( 'Search our site', 'apm' ); ?>">
                    </div>

                    <button type="submit" class="btn btn-default"><?php _e( 'Go', 'apm' ); ?></button>
                </form>
            </div>
        </div>
    </nav>
</header>
