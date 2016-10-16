<?php

/*
Widget Name: AP+M - Image Grid Carousel
Description: Creates a single-row carousel of square-shaped images with an optional link and title.
Author: AP+M
*/

class APM_Image_Grid_Carousel extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-image-grid-carousel',

            __( 'AP+M - Image Grid Carousel', 'apm' ),

            array(
                'description' => __( 'Creates a single-row carousel of square-shaped images with an optional link and title.', 'apm' )
            ),

            array(
            ),

            array(
                'items' => array(
                    'type'          => 'repeater',
                    'label'         => __( 'Images' , 'apm' ),
                    'item_name'     => __( 'Image', 'apm' ),
                    'item_label'    => array(
                        'selector'     => "[id*='title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'title' => array(
                            'type'      => 'text',
                            'label'     => __( 'Enter the title/caption for this image', 'apm' )
                        ),
                        'image' => array(
                            'type'      => 'media',
                            'label'     => __( 'Choose an image to use', 'apm' ),
                            'choose'    => __( 'Choose an image', 'apm' ),
                            'update'    => __( 'Set image', 'apm' ),
                            'library'   => 'image',
                            'fallback'  => true
                        ),
                        'linkage' => array(
                            'type'      => 'link',
                            'label'     => __( 'The location to where this image should link', 'apm' ),
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

siteorigin_widget_register( 'apm-image-grid-carousel', __FILE__, 'APM_Image_Grid_Carousel' );
