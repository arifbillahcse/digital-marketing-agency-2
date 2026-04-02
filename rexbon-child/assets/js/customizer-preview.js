/**
 * Rexbon Child – Customizer live-preview bindings (postMessage transport)
 * These run only inside the Customizer iframe.
 */
( function ( $, api ) {
    'use strict';

    api( 'rexbon_ann_bar_bg', function ( value ) {
        value.bind( function ( newVal ) {
            $( '.ann-bar' ).css( 'background', newVal );
        } );
    } );

    api( 'rexbon_ann_bar_color', function ( value ) {
        value.bind( function ( newVal ) {
            $( '.ann-bar' ).css( 'color', newVal );
        } );
    } );

    api( 'rexbon_ann_bar_link_color', function ( value ) {
        value.bind( function ( newVal ) {
            $( '.ann-bar a' ).css( 'color', newVal );
        } );
    } );

    api( 'rexbon_cat_strip_bg', function ( value ) {
        value.bind( function ( newVal ) {
            $( '.cat-strip' ).css( 'background', newVal );
        } );
    } );

} )( jQuery, wp.customize );
