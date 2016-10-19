<?php

/*
Widget Name: AP+M - Timeline
Description: Creates an interactive timeline.
Author: AP+M
*/

class APM_Timeline extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-timeline',

            __( 'AP+M - Timeline', 'apm' ),

            array(
                'description' => __( 'Creates an interactive timeline.', 'apm' )
            ),

            array(
            ),

            array(
                'points' => array(
                    'type'          => 'repeater',
                    'label'         => __( 'Points in Time' , 'apm' ),
                    'item_name'     => __( 'Point in Time', 'apm' ),
                    'item_label'    => array(
                        'selector'     => "[id*='year']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'year' => array(
                            'type'      => 'text',
                            'label'     => __( 'Enter a date/year for this point in time', 'apm' ),
                        ),
                        'content' => array(
                            'type'      => 'tinymce'
                        ),
                        'image' => array(
                            'type'      => 'media',
                            'label'     => __( 'You may add an image to be displayed adjacent to the content for this point in time', 'apm' ),
                            'choose'    => __( 'Choose an image', 'apm' ),
                            'update'    => __( 'Set image', 'apm' ),
                            'library'   => 'image',
                            'fallback'  => true
                        ),
                    )
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

siteorigin_widget_register( 'apm-timeline', __FILE__, 'APM_Timeline' );
