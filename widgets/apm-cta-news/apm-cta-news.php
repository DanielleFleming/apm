<?php

/*
Widget Name: AP+M - Call-to-Action (News)
Description: Creates a call-to-action that displays the latest news article.
Author: AP+M
*/

class APM_CTA_News extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-cta-news',

            __( 'AP+M - Call-to-Action (News)', 'apm' ),

            array(
                'description' => __( 'Creates a call-to-action that displays the latest news article.', 'apm' )
            ),

            array(
            ),

            array(
                'linkage'   => array(
                    'type'          => 'link',
                    'label'         => __( 'Choose the page/post to display.', 'apm' ),
                    'description'   => __( 'You may lave this field blank if you would prefer the site to display the latest published news/media posting instead.', 'apm' )
                )
            ),

            plugin_dir_path( __FILE__ )
        );
    }

    function get_template_name($instance) {
        return 'default';
    }

    function get_template_dir($instance) {
        return 'templates';
    }
}

siteorigin_widget_register( 'apm-cta-news', __FILE__, 'APM_CTA_News' );
