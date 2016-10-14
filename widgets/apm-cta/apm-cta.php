<?php

/*
Widget Name: AP+M - Simple Call-to-Action
Description: Creates a simple call-to-action.
Author: AP+M
*/

class APM_Simple_CTA extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-cta',

            __( 'AP+M - Simple Call-to-Action', 'apm' ),

            array(
                'description' => __( 'Creates a simple call-to-action.', 'apm' )
            ),

            array(
            ),

            array(
                'height'    => array(
                    'type'      => 'number',
                    'label'     => __( 'Enter the height of this Call-to-Action (in pixels)', 'apm' ),
                    'default'   => 445
                ),
                'bgcolor'    => array(
                    'type'      => 'color',
                    'label'     => __( 'Choose the background color of the call-to-action area', 'apm' ),
                    'default'   => '#000000'
                ),
                'items' => array(
                    'type'          => 'repeater',
                    'label'         => __( 'Call-to-Action Slides' , 'apm' ),
                    'item_name'     => __( 'Call-to-Action Slide', 'apm' ),
                    'item_label'    => array(
                        'selector'     => "[id*='title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'media' => array(
                            'type'      => 'section',
                            'label'     => __( 'Imagery', 'apm' ),
                            'hide'      => false,
                            'fields'    => array(
                                'image' => array(
                                    'type'      => 'media',
                                    'label'     => __( 'Choose an image', 'apm' ),
                                    'choose'    => __( 'Choose image', 'apm' ),
                                    'update'    => __( 'Set image', 'apm' ),
                                    'library'   => 'image',
                                    'fallback'  => false
                                ),
                                'width' => array(
                                    'type'      => 'select',
                                    'label'     => __( 'Choose the image display width', 'apm' ),
                                    'default'   => 'boxed',
                                    'options'   => array(
                                        'boxed'      => __( 'Boxed', 'apm' ),
                                        'fullwidth'  => __( 'Full-width', 'apm' )
                                    )
                                ),
                                'style' => array(
                                    'type'      => 'select',
                                    'label'     => __( 'Choose the image display style', 'apm' ),
                                    'default'   => 'cover',
                                    'options'   => array(
                                        'cover'     => __( 'Cover the entire area', 'apm' ),
                                        'center'    => __( 'Centered', 'apm' ),
                                        'repeat'    => __( 'Repeating', 'apm' )
                                    )
                                )
                            )
                        ),
                        'headline'  => array(
                            'type'      => 'section',
                            'label'     => __( 'Headline and Button', 'apm' ),
                            'hide'      => true,
                            'fields'    => array(
                                'title' => array(
                                    'type'      => 'text',
                                    'label'     => __( 'Enter the headline/title for this Call-to-Action', 'apm' )
                                ),
                                'icon' => array(
                                    'type'      => 'icon',
                                    'label'     => __( 'Choose an icon to display alongside the Call-to-Action headline/title', 'apm' )
                                ),
                                'subtitle' => array(
                                    'type'      => 'text',
                                    'label'     => __( 'Enter the subtitle for this Call-to-Action', 'apm' )
                                ),
                                'button' => array(
                                    'type'      => 'text',
                                    'label'     => __( 'Enter the text that should be displayed on the button', 'apm' ),
                                    'default'   => 'Learn More'
                                ),
                                'linkage' => array(
                                    'type'      => 'link',
                                    'label'     => __( 'The location to where this Call-to-Action should link', 'apm' ),
                                    'default'   => ''
                                ),
                                'linktarget' => array(
                                    'type'      => 'select',
                                    'label'     => __( 'How the link for this Call-to-Action should open', 'apm' ),
                                    'default'   => '_self',
                                    'options'   => array(
                                        '_self'     => 'In the same window',
                                        '_blank'    => 'In a new window'
                                    )
                                ),
                                'bgcolor' => array(
                                    'type'      => 'color',
                                    'label'     => __( 'Choose the background color of the headline/title area', 'apm' ),
                                    'default'   => ''
                                ),
                                'bgopacity' => array(
                                    'type'      => 'slider',
                                    'label'     => __( 'Choose the opacity of the background color', 'apm' ),
                                    'default'   => 100,
                                    'min'       => 1,
                                    'max'       => 100
                                ),
                                'color' => array(
                                    'type'      => 'color',
                                    'label'     => __( 'Choose the text color to be used within the headline/title area', 'apm' ),
                                    'default'   => '#ffffff'
                                )
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

siteorigin_widget_register( 'apm-cta', __FILE__, 'APM_Simple_CTA' );
