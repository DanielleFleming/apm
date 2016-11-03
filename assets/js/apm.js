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
                var quote_request       = jQuery( '.site-content--quote-request' );

                if ( quote_request.length ) {
                    var quote_request_top       = parseFloat( quote_request.position().top );
                    var quote_request_handle    = jQuery( '> a', quote_request );

                    quote_request_handle.on( 'click', apm.fn.quote_request.toggle );

                    jQuery( window ).on( 'scroll', function( event ) {
                        if ( !quote_request.hasClass( 'open' ) ) {
                            quote_request.css( 'top', quote_request_top + parseInt( jQuery( window ).scrollTop() ) );
                        }
                    });

                    setTimeout( function() { jQuery( window ).trigger( 'scroll' ) }, 750 );
                }
            },

            /*
            check_visibility: function() {
                var quote_request       = jQuery( '.site-content--quote-request' );

                if ( ( quote_request.length ) && ( quote_request.hasClass( 'open' ) ) && ( !quote_request.is( ':animated' ) ) && ( !quote_request.isOnScreen() ) ) {
                    quote_request.removeClass( 'open' );

                    setTimeout( function() { jQuery( window ).trigger( 'scroll' ) }, 750 );
                }
            },
            */

            toggle: function( event ) {
                event.preventDefault();
                event.stopPropagation();

                var container   = jQuery( this ).parents( '.site-content--quote-request' );

                if ( container.length ) {
                    container.toggleClass( 'open' );

                    if ( container.hasClass( 'open' ) ) {
                        jQuery( 'body' ).animate(
                            {
                                'scrollTop': 0
                            },
                            350);
                    } else {
                        setTimeout( function() { jQuery( window ).trigger( 'scroll' ) }, 750 );
                    }
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
                                            scroll: false,
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
                                            on: true
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