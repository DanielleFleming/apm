<?php

/*
Widget Name: AP+M - Highlight Row
Description: Creates a highlight row to call out a particular service, feature or other text.
Author: AP+M
*/

class APM_Highlight extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-highlight',

            __( 'AP+M - Highlight Row', 'apm' ),

            array(
                'description' => __( 'Creates a highlight row to call out a particular service, feature or other text.', 'apm' )
            ),

            array(
            ),

            array(
                'title'    => array(
                    'type'      => 'text',
                    'label'     => __( 'Enter the title for this feature box', 'apm' ),
                ),
                'content'    => array(
                    'type'      => 'tinymce'
                ),
                'image' => array(
                    'type'      => 'media',
                    'label'     => __( 'Choose an image to be displayed on the right of the content', 'apm' ),
                    'choose'    => __( 'Choose an image', 'apm' ),
                    'update'    => __( 'Set image', 'apm' ),
                    'library'   => 'image',
                    'fallback'  => true
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

siteorigin_widget_register( 'apm-highlight', __FILE__, 'APM_Highlight' );
