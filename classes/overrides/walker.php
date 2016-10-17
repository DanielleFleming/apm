<?php

/**
 * Custom Menu Walker - APM
 */
class APM_Nav_Walker_Accessibility_Ranger extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;

        $indent         = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names    =
        $value          = '';

        $classes        = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names    = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names    = ' class="' . esc_attr( $class_names ) . '"';

        $prepend        = '<strong>';
        $append         = '</strong>';

        $attributes     =   ( !empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '' ) .
                            ( !empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '' ) .
                            ( !empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '' ) .
                            ( !empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '' ) .
                            ( in_array( 'menu-item-has-children', $item->classes ) !== false ? ' aria-haspopup="true"' : '' ) .
                            ( ' role="menuitem"' );

        $description    = ( !empty( $item->description ) ? '<span>' . esc_attr( $item->description ) . '</span>' : '' );

        if ( $depth != 0 ) {
            $description    = $append = $prepend = '';
        }

        $item_output    =   $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . ' role="presentation">' .
                                $args->before .
                                    '<a' . $attributes . '>' .
                                        $args->link_before .
                                            $prepend .
                                            trim( apply_filters( 'the_title', $item->title, $item->ID ) ) .
                                            $append .
                                            $description .
                                        $args->link_after .
                                        ( ( in_array( 'menu-item-has-children', $item->classes ) !== false ) ? '<span class="menu-item-dropdown-toggle"></span>' : '' ) .
                                    '</a>' .
                                $args->after;

        $output         .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}