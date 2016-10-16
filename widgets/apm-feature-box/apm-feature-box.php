<?php

/*
Widget Name: AP+M - Feature Box
Description: Creates a call-to-action feature box.
Author: AP+M
*/

class APM_Feature_Box extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-feature-box',

            __( 'AP+M - Feature Box', 'apm' ),

            array(
                'description' => __( 'Creates a call-to-action feature box.', 'apm' )
            ),

            array(
            ),

            array(
                'content'   => array(
                    'type'      => 'section',
                    'label'     => __( 'Content', 'apm' ),
                    'hide'      => false,
                    'fields'    => array(
                        'title'    => array(
                            'type'      => 'text',
                            'label'     => __( 'Enter the title for this feature box', 'apm' ),
                        ),
                        'content'    => array(
                            'type'      => 'tinymce'
                        )
                    )
                ),
                'linkage'   => array(
                    'type'      => 'section',
                    'label'     => __( 'Call-to-Action Button', 'apm' ),
                    'hide'      => false,
                    'fields'    => array(
                        'text' => array(
                            'type'      => 'text',
                            'label'     => __( 'Enter the text that should be displayed on the button', 'apm' ),
                            'default'   => 'Learn More'
                        ),
                        'linkage' => array(
                            'type'      => 'link',
                            'label'     => __( 'The location to where this button should link', 'apm' ),
                            'default'   => ''
                        ),
                        'target' => array(
                            'type'      => 'select',
                            'label'     => __( 'How the link should open', 'apm' ),
                            'default'   => '_self',
                            'options'   => array(
                                '_self'     => 'In the same window',
                                '_blank'    => 'In a new window'
                            )
                        )
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

siteorigin_widget_register( 'apm-feature-box', __FILE__, 'APM_Feature_Box' );
