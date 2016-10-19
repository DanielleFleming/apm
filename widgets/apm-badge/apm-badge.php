<?php

/*
Widget Name: AP+M - Badge Row
Description: Creates a vertically-centered row with a badge image and descriptor text.
Author: AP+M
*/

class APM_Badge extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-badge',

            __( 'AP+M - Badge Row', 'apm' ),

            array(
                'description' => __( 'Creates a vertically-centered row with a badge image and descriptor text.', 'apm' )
            ),

            array(
            ),

            array(
                'image' => array(
                    'type'      => 'media',
                    'label'     => __( 'Choose a badge image to use.', 'apm' ),
                    'choose'    => __( 'Choose an image', 'apm' ),
                    'update'    => __( 'Set image', 'apm' ),
                    'library'   => 'image',
                    'fallback'  => true
                ),
                'content'    => array(
                    'type'      => 'tinymce'
                ),
                'bgcolor'    => array(
                    'type'      => 'color',
                    'label'     => __( 'Choose the background color to use for the entire row', 'apm' ),
                    'default'   => '#ffffff'
                ),
                'bgopacity' => array(
                    'type'      => 'slider',
                    'label'     => __( 'Choose the transparency level of the background image', 'apm' ),
                    'min'       => 1,
                    'max'       => 100,
                    'default'   => 50,
                    'integer'   => true
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

siteorigin_widget_register( 'apm-badge', __FILE__, 'APM_Badge' );
