<?php

    /*
    Widget Name: AP+M - Global Reach
    Description: Creates an interactive map with regional annotations.
    Author: AP+M
    */

    class APM_Global_Reach extends SiteOrigin_Widget {
        public static $regions = array(
            'na'                => 'North America',
            'sa-ca'             => 'South + Central Americas',
            'europa-russia'     => 'Europe + Russia',
            'africa'            => 'Africa',
            'asia-pacific'      => 'Asia Pacific',
            'middle-east'       => 'Middle East'
        );

        function __construct() {
            parent::__construct(
                'apm-global-reach',

                __( 'AP+M - Global Reach', 'apm' ),

                array(
                    'description' => __( 'Creates an interactive map with regional annotations.', 'apm' )
                ),

                array(
                ),

                array(
                    'regions' => array(
                        'type'          => 'repeater',
                        'label'         => __( 'Regions' , 'apm' ),
                        'item_name'     => __( 'Region', 'apm' ),
                        'item_label'    => array(
                            'selector'     => "[id*='region'] option:selected",
                            'update_event' => 'change',
                            'value_method' => 'text'
                        ),
                        'fields' => array(
                            'region' => array(
                                'type'      => 'select',
                                'label'     => __( 'Choose a region of the world to attach information to', 'apm' ),
                                'options'   => APM_Global_Reach::$regions
                            ),
                            'content' => array(
                                'type'      => 'tinymce'
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

        public static function lookup( $region ) {
            return ( ( isset( APM_Global_Reach::$regions[ $region ] ) ) ? APM_Global_Reach::$regions[ $region ] : '' );
        }
    }

    siteorigin_widget_register( 'apm-global-reach', __FILE__, 'APM_Global_Reach' );
