<?php

    require dirname( __FILE__ ) . '/classes/overrides/walker.php';

    if ( !function_exists( 'apm_setup' ) ) :

        function apm_setup() {
            load_theme_textdomain( 'apm', get_template_directory() . '/languages' );

            add_editor_style( array( 'css/editor.css' ) );

            add_theme_support( 'automatic-feed-links' );

            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 800, 600, true );

            add_image_size( 'apm-cta-banner', 1920, 683, true );
            add_image_size( 'apm-cta-banner-interior', 1920, 431, true );
            add_image_size( 'apm-feature-thumb', 381, 253, true );

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

                acf_add_options_sub_page(
                    array(
                        'page_title'  => 'Quote Request Settings',
                        'menu_title'  => 'Quote Request',
                        'parent_slug' => $acf_options[ 'menu_slug' ]
                    )
                );
            }
        }

    endif;
    add_action( 'after_setup_theme', 'apm_setup' );


    function apm_widgets_init() {
        register_sidebar(
            array(
                'name'          => __( 'Blog Sidebar', 'apm' ),
                'id'            => 'sidebar-default',
                'description'   => __( 'Main sidebar that appears on the right of the blog/news area.', 'apm' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => __( 'Search Sidebar', 'apm' ),
                'id'            => 'sidebar-search',
                'description'   => __( 'Sidebar that appears on the right of the search results page.', 'apm' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => __( 'Footer Sidebar', 'apm' ),
                'id'            => 'sidebar-footer',
                'description'   => __( 'Footer sidebar that appears just above the social and copyright areas of the footer on every page of the site.', 'apm' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => __( 'Blog Sidebar (Epilogue)', 'apm' ),
                'id'            => 'sidebar-default-after',
                'description'   => __( 'Displays as an epilogue on blog/news pages, at the bottom of the content area, spanning the full width of the page.', 'apm' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }

    add_action( 'widgets_init', 'apm_widgets_init' );


    function apm_assets() {
        wp_enqueue_style( 'apm-style-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap-sass/assets/stylesheets/bootstrap.css' );
        wp_enqueue_style( 'apm-style', get_template_directory_uri() . '/assets/css/theme.css' );
        wp_enqueue_style( 'apm-style-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce-styles.css' );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'apm-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
        wp_enqueue_script( 'apm-fresco', get_template_directory_uri() . '/assets/vendor/fresco/js/fresco/fresco.js', array( 'jquery' ), '2.2.1', true );
        wp_enqueue_script( 'apm-slick', get_template_directory_uri() . '/assets/vendor/slick-carousel/slick/slick.min.js', array( 'jquery' ), '1.6.0', true );
        wp_enqueue_script( 'apm-qtip2', get_template_directory_uri() . '/assets/vendor/qtip2/jquery.qtip.min.js', array( 'jquery' ), '3.0.3', true );
        wp_enqueue_script( 'apm-onscreen', get_template_directory_uri() . '/assets/js/apm.onscreen.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'apm-framework', get_template_directory_uri() . '/assets/js/apm.js', array( 'jquery', 'apm-bootstrap', 'apm-fresco', 'apm-onscreen' ), '1.0', true );
    }

    add_action( 'wp_enqueue_scripts', 'apm_assets' );


    function apm_assets_admin() {
        wp_enqueue_style( 'apm-style-admin', get_template_directory_uri() . '/assets/css/theme-admin.css' );
    }

    add_action( 'admin_enqueue_scripts', 'apm_assets_admin' );


    function apm_body_classes( $classes ) {
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


    function apm_post_classes( $classes ) {
        if ( !post_password_required() && !is_attachment() && has_post_thumbnail() ) {
            $classes[] = 'has-post-thumbnail';
        }

        if ( is_single() ) {
            $classes[] = 'single';
        }

        if ( is_search() ) {
            $classes[] = 'search-result';
        }

        return $classes;
    }

    add_filter( 'post_class', 'apm_post_classes' );


    function apm_wp_title( $title, $sep ) {
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


    function apm_mce_buttons_2( $buttons ) {
        array_push( $buttons, 'styleselect' );

        return $buttons;
    }

    add_filter( 'mce_buttons_2', 'apm_mce_buttons_2' );


    function apm_mce_before_init_insert_formats( $init_array ) {
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
                        'title'    => __( 'CTA, Tertiary', 'apm' ),
                        'selector' => 'a',
                        'classes'  => 'btn btn-tertiary'
                    ),
                    array(
                        'title'    => __( 'Large', 'apm' ),
                        'selector' => 'a',
                        'classes'  => 'btn-lg'
                    ),
                    array(
                        'title'    => __( 'Wide', 'apm' ),
                        'selector' => 'a',
                        'classes'  => 'btn-wide'
                    )
                )
            ),
            array(
                'title' => 'Paragraphs',
                'items' => array(
                    array(
                        'title'    => __( 'Paragraph (Small)', 'apm' ),
                        'selector' => 'p',
                        'classes'  => 'text-small'
                    )
                )
            )
        );

        $init_array[ 'style_formats' ] = json_encode( $style_formats );

        return $init_array;
    }

    add_filter( 'tiny_mce_before_init', 'apm_mce_before_init_insert_formats' );


    function apm_heading_format( $title ) {
        if ( strpos( $title, '|' ) !== false ) {
            $parts = explode( '|', $title );

            if ( count( $parts ) >= 2 ) {
                $title = array_shift( $parts ) . ' <strong>' . implode( ' ', $parts ) . '</strong>';
            }
        }

        return $title;
    }


    function apm_create_post_types() {
    }

    add_action( 'init', 'apm_create_post_types' );


    function apm_add_widget_tabs( $tabs ) {
        $tabs[] = array(
            'title'  => __( 'AP+M Widgets', 'apm' ),
            'filter' => array(
                'groups' => array( 'apm' )
            )
        );

        return $tabs;
    }

    add_filter( 'siteorigin_panels_widget_dialog_tabs', 'apm_add_widget_tabs', 20 );


    function apm_add_widget_icons( $widgets ) {
        foreach ( $widgets as &$widget_data ) {
            if ( stripos( $widget_data[ 'title' ], 'ap+m' ) !== false ) {
                $widget_data[ 'groups' ] = array( 'apm' );
            }
        }

        return $widgets;
    }

    add_filter( 'siteorigin_panels_widgets', 'apm_add_widget_icons' );


    function apm_siteorigin_widgets_collection( $folders ) {
        $folders[] = get_template_directory() . '/widgets/';

        return $folders;
    }

    add_filter( 'siteorigin_widgets_widget_folders', 'apm_siteorigin_widgets_collection' );


    function apm_icon_postprocess( $icon_class ) {
        return str_replace( 'fontawesome-', 'fa-', $icon_class );
    }


    function apm_color_postprocess( $color, $opacity = 100 ) {
        $data = '';

        if ( strlen( $color ) ) {
            $rgb = apm_hexcolor2rgb( $color );

            if ( is_array( $rgb ) ) {
                $data = 'rgba(' . implode( ',', $rgb ) . ',' . ( $opacity / 100 ) . ')';
            }
        }

        return $data;
    }

    function apm_hexcolor2rgb( $hex ) {
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


    function apm_salesforce_capture_callback( $data ) {
        if ( ( is_array( $data ) ) && ( isset( $data[ 'settings' ] ) ) && ( is_array( $data[ 'settings' ] ) ) && ( isset( $data[ 'settings' ][ 'title' ] ) ) && ( isset( $data[ 'fields' ] ) ) && ( is_array( $data[ 'fields' ] ) ) ) {
            $form_title         = trim( strtolower( $data[ 'settings' ][ 'title' ] ) );
            $fields             = array();
            $response           = array(
                'oid'               => '00DA0000000HJEq',
                'retURL'            => 'http://apm4parts.com/',
                'lead_source'       => 'Company Website',
                'debug'             => 1,
                'debugEmail'        => 'cadie@dreamfactoryagency.com',
                'lead_status__c'    => true
            );

            switch ( $form_title ) {
                case 'contact us' :
                    $fields         = array(
                        'first_name'                => 'first_name',
                        'last_name'                 => 'last_name',
                        'email'                     => 'email',
                        'country'                   => '00NG000000FnX9s',
                        'needs'                     => '00NG000000FNXfj'
                    );
                    break;

                case 'request a quote' :
                    $fields         = array(
                        'first_name'                => 'first_name',
                        'last_name'                 => 'last_name',
                        'company'                   => 'company',
                        'email'                     => 'email',
                        'phone'                     => 'phone',
                        'country'                   => '00NG000000FnX9s',
                        'state_province'            => '00NG000000FNYQe',
                        'zip_code'                  => '00NG000000FNYQj',
                        'engine_model'              => '00NG000000FNEGn',
                        'date_needed'               => '00NG000000FNXKR',
                        'needs'                     => '00NG000000FNXfj'
                    );

                    // add Lead_Status2__c form that is required for bypassing default Salesforce rules for "Date Needed" field.
                    $response[ '00NG000000FnvvK' ]      = 'Open';
                    break;
            }

            if ( count( $fields ) ) {
                foreach ( $fields as $source_key => $salesforce_key ) {
                    foreach ( $data[ 'fields' ] as $source_field ) {
                        if ( $source_field[ 'settings' ][ 'key' ] == $source_key ) {
                            $response[ $salesforce_key ]    = $source_field[ 'value' ];
                            break;
                        }
                    }
                }
            }

            $curl       = curl_init();

            curl_setopt( $curl, CURLOPT_URL, 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8' );
            curl_setopt( $curl, CURLOPT_POST, true );
            curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $response ) );
            curl_setopt( $curl, CURLOPT_HEADER, false );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, false );
            curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );

            $result     = curl_exec( $curl );

            curl_close( $curl );
        }
    }
    add_action( 'apm_salesforce_capture', 'apm_salesforce_capture_callback' );

    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    add_action('template_redirect', 'remove_sidebar_shop');
    function remove_sidebar_shop() {
    if ( is_product() ) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
        }
    }

    function getProductPartNumberShortcode( ){
      global $product;
      return $product->get_sku();
    }
    add_shortcode( 'part_number', 'getProductPartNumberShortcode' );

    function getProductPartTypeShortcode( ){
      global $product;
      return $product->get_attribute( 'Part Type' );
    }
    add_shortcode( 'part_type', 'getProductPartTypeShortcode' );

    function getProductEngineTypeShortcode( ){
      global $product;
      return $product->get_attribute( 'Engine Type' );
    }
    add_shortcode( 'engine_type', 'getProductEngineTypeShortcode' );

    function getProductEngineModelShortcode( ){
      global $product;
      return $product->get_attribute( 'Engine Model' );
    }
    add_shortcode( 'engine_model', 'getProductEngineModelShortcode' );

    add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
    function woo_rename_tabs( $tabs ) {

    	$tabs['additional_information']['title'] = __( 'Data Sheet' );	// Rename the additional information tab

    	return $tabs;

    }

    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

    function woo_custom_product_tab( $tabs ) {

        $custom_tab = array(
          		'custom_tab' =>  array(
        							'title' => __('Related Products','woocommerce'),
        							'priority' => 20,
        							'callback' => 'woo_custom_product_tab_content'
        						)
        				);
        return array_merge( $custom_tab, $tabs );
    }

    function woo_custom_product_tab_content() {
    	woocommerce_related_products();
    }
    add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tab' );

    add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

    function woo_remove_product_tabs( $tabs ) {

        unset( $tabs['description'] );      	// Remove the description tab
        return $tabs;

    }
