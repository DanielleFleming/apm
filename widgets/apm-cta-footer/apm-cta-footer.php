<?php

/*
Widget Name: AP+M - Call-to-Action (Footer)
Description: Creates a textual call-to-action to be used in the footer of the site.
Author: AP+M
*/

class APM_CTA_Footer extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-cta-footer',

            __( 'AP+M - Call-to-Action (Footer)', 'apm' ),

            array(
                'description' => __( 'Creates a textual call-to-action to be used in the footer of the site.', 'apm' )
            ),

            array(
            ),

            array(
                'style' => array(
                    'type' => 'select',
                    'label' => __( 'Choose the style to be used for this call-to-action', 'apm' ),
                    'default' => 'full-width-white',
                    'options' => array(
                        'small' => __( 'Small (Default)', 'apm' ),
                        'large' => __( 'Large (with White Buttons)', 'apm' )
                    )
                ),
                'content'   => array(
                    'type'          => 'tinymce'
                ),
                'buttons' => array(
                    'type'          => 'repeater',
                    'label'         => __( 'Call to Action Buttons' , 'apm' ),
                    'item_name'     => __( 'Button', 'apm' ),
                    'item_label'    => array(
                        'selector'     => "[id*='button']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'button' => array(
                            'type'      => 'text',
                            'label'     => __( 'Enter the title for this button', 'apm' ),
                            'default'   => __( 'Learn More', 'apm' )
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

siteorigin_widget_register( 'apm-cta-footer', __FILE__, 'APM_CTA_Footer' );
