var apm = {
    fn: {
        nav: {
            dropdown: {
                init: function() {
                    jQuery( 'nav.navbar.navbar-default ul.navbar-nav > li a .menu-item-dropdown-toggle' ).on( 'click', apm.fn.nav.dropdown.toggle );
                },

                toggle: function( event ) {
                    event.preventDefault();
                    event.stopPropagation();

                    var parent      = jQuery( this ).parents( 'li' );

                    if ( parent.length ) {
                        parent.toggleClass( 'open' );
                    }
                }
            }
        },

        quote_request: {
            init: function() {
                jQuery( '.site-content--quote-request > a' ).on( 'click', apm.fn.quote_request.toggle );
            },

            toggle: function( event ) {
                event.preventDefault();
                event.stopPropagation();

                var container   = jQuery( this ).parents( '.site-content--quote-request' );

                if ( container.length ) {
                    container.toggleClass( 'open' );
                }
            }
        },

        tabs: {
            init: function() {
                jQuery( '.nav.nav-tabs' ).on( 'click', apm.fn.tabs.toggle );
            },

            toggle: function( event ) {
                console.log( 'toggle' );

                jQuery( this ).toggleClass( 'open' );
            },

            close: function( event ) {
                event.preventDefault();
                event.stopPropagation();

                var parent      = jQuery( this ).parents( '.nav.nav-tabs' );

                console.log (parent);

                if ( parent.length ) {
                    parent.toggleClass( 'open' );
                }
            }
        },

        global_reach: {
            init: function() {
                jQuery( '.apm-global-reach-regions > li' ).each( function() {
                    var region      = jQuery( this ).data( 'region' );

                    if ( region.length ) {
                        var svg_element     = jQuery( 'svg#globalreach g#' + region );

                        if ( svg_element.length ) {
                            var content         = jQuery( this ).html();

                            svg_element.qtip(
                                {
                                    content: {
                                        text: content,
                                        button: true
                                    },
                                    position: {
                                        target: 'mouse',
                                        adjust: {
                                            x: 5,
                                            y: 5
                                        }
                                    },
                                    hide: {
                                        event: 'click'
                                    },
                                    show: {
                                        event: 'click',
                                        modal: {
                                            on: true,
                                            blur: true
                                        }
                                    },
                                    style: {
                                        classes: 'qtip-apm-global-reach'
                                    }
                                }
                            );
                        }
                    }
                });
            }
        }
    }
};

jQuery( document ).ready( function() {
    // navbar drop-down toggle
    apm.fn.nav.dropdown.init();

    // quote request toggle
    apm.fn.quote_request.init();

    // tab controls
    apm.fn.tabs.init();

    // global reach tooltips
    apm.fn.global_reach.init();
} );