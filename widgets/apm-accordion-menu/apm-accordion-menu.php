<?php

/*
Widget Name: AP+M - Accordion Menu
Description: Creates an accordion menu.
Author: APM
*/

class APM_Accordion_Menu extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-accordion',

            __( 'AP+M - Accordion Menu', 'apm' ),

            array(
                'description' => __( 'Creates an accordion menu.', 'apm' )
            ),

            array(
            ),

            array(
                'title' => array(
                    'type'      => 'text',
                    'label'     => __( 'Enter the title for this accordion', 'apm' )
                ),
                'items' => array(
                    'type'          => 'repeater',
                    'label'         => __( 'Accordion Items' , 'apm' ),
                    'item_name'     => __( 'Accordion Item', 'apm' ),
                    'item_label'    => array(
                        'selector'     => "[id*='title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'title' => array(
                            'type'      => 'text',
                            'label'     => __( 'Enter the title for this menu item', 'apm' )
                        ),
                        'content' => array(
                            'type'      => 'tinymce'
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

siteorigin_widget_register( 'apm-accordion', __FILE__, 'APM_Accordion_Menu' );
