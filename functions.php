<?php

    require dirname( __FILE__ ) . '/classes/overrides/walker.php';

    if ( !function_exists( 'apm_setup' ) ) :

        function apm_setup () {
            load_theme_textdomain( 'apm', get_template_directory() . '/languages' );

            add_editor_style( array( 'css/editor.css' ) );

            add_theme_support( 'automatic-feed-links' );

            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 800, 600, true );

            add_image_size( 'apm-cta-banner', 1920, 683, true );
            add_image_size( 'apm-feature-thumb', 540, 540, true );

            register_nav_menus(
                array(
                    'nav-main'   => __( 'Header Navigation Menu', 'apm' ),
                    'nav-social' => __( 'Social Media Menu', 'apm' )
                )
            );

            add_theme_support(
                'html5', array(
                           'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
                       )
            );

            add_filter( 'use_default_gallery_style', '__return_false' );

            add_theme_support( 'customize-selective-refresh-widgets' );

            if ( function_exists( 'acf_add_options_page' ) ) {
                $acf_options = acf_add_options_page(
                    array(
                        'page_title' => 'General Options',
                        'menu_title' => 'Options',
                        'redirect'   => false
                    )
                );

                acf_add_options_sub_page(
                    array(
                        'page_title'  => 'Extras and Code Insertion',
                        'menu_title'  => 'Extras',
                        'parent_slug' => $acf_options[ 'menu_slug' ]
                    )
                );
            }
        }

    endif;
    add_action( 'after_setup_theme', 'apm_setup' );


    function apm_widgets_init () {
        register_sidebar(
            array(
                'name'          => __( 'Primary Sidebar', 'apm' ),
                'id'            => 'sidebar-default',
                'description'   => __( 'Main sidebar that appears on the left.', 'apm' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => __( 'Primary Sidebar', 'apm' ),
                'id'            => 'sidebar-footer',
                'description'   => __( 'Footer sidebar that appears just above the social and copyright areas of the footer.', 'apm' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }

    add_action( 'widgets_init', 'apm_widgets_init' );


    function apm_assets () {
        wp_enqueue_style( 'apm-style-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap-sass/assets/stylesheets/bootstrap.css' );
        wp_enqueue_style( 'apm-style', get_template_directory_uri() . '/assets/css/theme.css' );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'apm-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
        wp_enqueue_script( 'apm-fresco', get_template_directory_uri() . '/assets/vendor/fresco/js/fresco/fresco.js', array( 'jquery' ), '2.2.1', true );
        wp_enqueue_script( 'apm-framework', get_template_directory_uri() . '/assets/js/apm.js', array( 'jquery', 'apm-bootstrap', 'apm-fresco' ), '1.0', true );
    }

    add_action( 'wp_enqueue_scripts', 'apm_assets' );


    function apm_assets_admin () {
        wp_enqueue_style( 'apm-style-admin', get_template_directory_uri() . '/assets/css/theme-admin.css' );
    }

    add_action( 'admin_enqueue_scripts', 'apm_assets_admin' );


    function apm_body_classes ( $classes ) {
        if ( is_singular() && !is_front_page() ) {
            $classes[] = 'singular';
        }
        if ( is_front_page() ) {
            $classes[] = 'home';
        }
        else {
            $classes[] = 'interior';
        }

        return $classes;
    }

    add_filter( 'body_class', 'apm_body_classes' );


    function apm_post_classes ( $classes ) {
        if ( !post_password_required() && !is_attachment() && has_post_thumbnail() ) {
            $classes[] = 'has-post-thumbnail';
        }

        return $classes;
    }

    add_filter( 'post_class', 'apm_post_classes' );


    function apm_wp_title ( $title, $sep ) {
        global $paged, $page;

        if ( is_feed() ) {
            return $title;
        }

        // Add the site name.
        $title .= get_bloginfo( 'name', 'display' );

        // Add the site description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title = "$title $sep $site_description";
        }

        // Add a page number if necessary.
        if ( ( $paged >= 2 || $page >= 2 ) && !is_404() ) {
            $title = "$title $sep " . sprintf( __( 'Page %s', 'apm' ), max( $paged, $page ) );
        }

        return $title;
    }

    add_filter( 'wp_title', 'apm_wp_title', 10, 2 );


    function apm_mce_buttons_2 ( $buttons ) {
        array_push( $buttons, 'styleselect' );

        return $buttons;
    }

    add_filter( 'mce_buttons_2', 'apm_mce_buttons_2' );


    function apm_mce_before_init_insert_formats ( $init_array ) {
        $style_formats = array(
            array(
                'title' => 'Buttons',
                'items' => array(
                    array(
                        'title'    => __( 'CTA, Primary', 'apm' ),
                        'selector' => 'a',
                        'classes'  => 'btn btn-primary'
                    ),
                    array(
                        'title'    => __( 'CTA, Secondary', 'apm' ),
                        'selector' => 'a',
                        'classes'  => 'btn btn-secondary'
                    ),
                    array(
                        'title'    => __( 'Large', 'apm' ),
                        'selector' => 'a',
                        'classes'  => 'btn-lg'
                    )
                )
            )
        );

        $init_array[ 'style_formats' ] = json_encode( $style_formats );

        return $init_array;
    }

    add_filter( 'tiny_mce_before_init', 'apm_mce_before_init_insert_formats' );


    function apm_heading_format ( $title ) {
        if ( strpos( $title, '|' ) !== false ) {
            $parts = explode( '|', $title );

            if ( count( $parts ) >= 2 ) {
                $title = array_shift( $parts ) . ' <strong>' . implode( ' ', $parts ) . '</strong>';
            }
        }

        return $title;
    }


    function apm_create_post_types () {
    }

    add_action( 'init', 'apm_create_post_types' );


    function apm_add_widget_tabs ( $tabs ) {
        $tabs[] = array(
            'title'  => __( 'AP+M Widgets', 'apm' ),
            'filter' => array(
                'groups' => array( 'apm' )
            )
        );

        return $tabs;
    }

    add_filter( 'siteorigin_panels_widget_dialog_tabs', 'apm_add_widget_tabs', 20 );


    function apm_add_widget_icons ( $widgets ) {
        foreach ( $widgets as &$widget_data ) {
            if ( stripos( $widget_data[ 'title' ], 'ap+m' ) !== false ) {
                $widget_data[ 'groups' ] = array( 'apm' );
            }
        }

        return $widgets;
    }

    add_filter( 'siteorigin_panels_widgets', 'apm_add_widget_icons' );


    function apm_siteorigin_widgets_collection ( $folders ) {
        $folders[] = get_template_directory() . '/widgets/';

        return $folders;
    }

    add_filter( 'siteorigin_widgets_widget_folders', 'apm_siteorigin_widgets_collection' );


    function apm_icon_postprocess ( $icon_class ) {
        return str_replace( 'fontawesome-', 'fa-', $icon_class );
    }


    function apm_link_postprocess ( $link ) {
        $data = array( 'url' => $link, 'selected' => false );

        if ( strlen( $link ) ) {
            if ( strpos( $link, 'post: ' ) !== false ) {
                // TODO: regex?
                $link_id = intval( str_replace( 'post: ', '', $link ) );

                if ( $link_id > 0 ) {
                    $data[ 'url' ] = get_permalink( $link_id );

                    if ( get_the_ID() == $link_id ) {
                        $data[ 'selected' ] = true;
                    }
                }
            }
        }

        return $data;
    }

    function apm_color_postprocess ( $color, $opacity = 100 ) {
        $data = '';

        if ( strlen( $color ) ) {
            $rgb = apm_hexcolor2rgb( $color );

            if ( is_array( $rgb ) ) {
                $data = 'rgba(' . implode( ',', $rgb ) . ',' . ( $opacity / 100 ) . ')';
            }
        }

        return $data;
    }

    function apm_hexcolor2rgb ( $hex ) {
        $hex = str_replace( "#", "", $hex );

        if ( strlen( $hex ) == 3 ) {
            $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
            $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
            $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
        }
        else {
            $r = hexdec( substr( $hex, 0, 2 ) );
            $g = hexdec( substr( $hex, 2, 2 ) );
            $b = hexdec( substr( $hex, 4, 2 ) );
        }

        $rgb = array( $r, $g, $b );

        return $rgb;
    }