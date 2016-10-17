var apm = {
    fn: {
        nav: {
            dropdown: {
                toggle: function( event ) {
                    event.preventDefault();
                    event.stopPropagation();

                    var parent      = jQuery( this ).parents( 'li' );

                    if ( parent.length ) {
                        parent.toggleClass( 'open' );
                    }
                }
            }
        }
    }
};

jQuery( document ).ready( function() {
    // navbar drop-down toggle
    jQuery( 'nav.navbar.navbar-default ul.navbar-nav > li a .menu-item-dropdown-toggle' ).on( 'click', apm.fn.nav.dropdown.toggle );
} );