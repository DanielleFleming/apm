<?php

/*
Widget Name: AP+M - FAQs
Description: Creates a frequently asked questions (FAQs) section.
Author: AP+M
*/

class APM_FAQ extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'apm-faq',

            __( 'AP+M - FAQs', 'apm' ),

            array(
                'description' => __( 'Creates a frequently asked questions (FAQs) section.', 'apm' )
            ),

            array(
            ),

            array(
                'faqs' => array(
                    'type'          => 'repeater',
                    'label'         => __( 'Question/Answer Pairs' , 'apm' ),
                    'item_name'     => __( 'Question/Answer Pair', 'apm' ),
                    'item_label'    => array(
                        'selector'     => "[id*='question']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'question' => array(
                            'type'      => 'textarea',
                            'label'     => __( 'Enter the question text', 'apm' )
                        ),
                        'answer' => array(
                            'type'      => 'tinymce',
                            'label'     => __( 'Enter the answer text', 'apm' )
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

siteorigin_widget_register( 'apm-faq', __FILE__, 'APM_FAQ' );
