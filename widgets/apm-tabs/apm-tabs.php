<?php

/*
Widget Name: AP+M - Tabbed Content
Description: Creates a tabbed content display.
Author: APM
*/

class APM_Tabs extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-tabs',

            __( 'AP+M - Tabbed Content', 'apm' ),

            array(
                'description' => __( 'Creates a tabbed content display.', 'apm' )
            ),

            array(
            ),

            array(
                'tabs' => array(
                    'type'          => 'repeater',
                    'label'         => __( 'Tabs' , 'apm' ),
                    'item_name'     => __( 'Tab', 'apm' ),
                    'item_label'    => array(
                        'selector'     => "[id*='title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'title' => array(
                            'type'      => 'text',
                            'label'     => __( 'Enter the title for this tab', 'apm' )
                        ),
                        'content' => array(
                            'type'      => 'builder',
                            'label'     => __( 'Build the content for this tab', 'apm' )
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

siteorigin_widget_register( 'apm-tabs', __FILE__, 'APM_Tabs' );
