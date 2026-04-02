/**
 * Rexbon Child – header.js
 *
 * Handles:
 *  • Announcement bar dismiss  (localStorage-persisted)
 *  • Sticky header shadow on scroll
 *  • Mobile drawer open / close / overlay / focus-trap
 *  • Mobile submenu accordion
 *  • Category strip active pill tracking
 */

( function ( $ ) {
    'use strict';

    /* ─── DOM references ─── */
    const $annBar       = $( '#rexbon-ann-bar' );
    const $annClose     = $( '#rexbon-ann-close' );
    const $header       = $( '#rexbon-header' );
    const $hamburger    = $( '#rexbon-hamburger' );
    const $mobileMenu   = $( '#rexbon-mobile-menu' );
    const $mobileClose  = $( '#rexbon-mobile-close' );
    const $overlay      = $( '#rexbon-mobile-overlay' );
    const $catStrip     = $( '#rexbon-cat-strip' );

    /* ─── Ann-bar dismiss ─── */
    const ANN_KEY = 'rexbon_ann_dismissed';

    if ( localStorage.getItem( ANN_KEY ) === '1' ) {
        $annBar.addClass( 'is-hidden' ).attr( 'hidden', true );
    }

    $annClose.on( 'click', function () {
        $annBar.addClass( 'is-hidden' );
        setTimeout( () => $annBar.attr( 'hidden', true ), 200 );
        localStorage.setItem( ANN_KEY, '1' );
    } );

    /* ─── Sticky shadow ─── */
    $( window ).on( 'scroll.rexbon', function () {
        $header.toggleClass( 'scrolled', window.scrollY > 10 );
    } );

    /* ─── Mobile drawer helpers ─── */
    const FOCUSABLE = 'a[href], button:not([disabled]), input, textarea, select, [tabindex]:not([tabindex="-1"])';

    function openMenu() {
        $mobileMenu.removeAttr( 'hidden' );
        $overlay.addClass( 'active' );
        $hamburger.addClass( 'is-open' ).attr( 'aria-expanded', 'true' );
        $( 'body' ).css( 'overflow', 'hidden' );
        // focus first element
        setTimeout( () => $mobileMenu.find( FOCUSABLE ).first().trigger( 'focus' ), 50 );
    }

    function closeMenu() {
        $mobileMenu.attr( 'hidden', true );
        $overlay.removeClass( 'active' );
        $hamburger.removeClass( 'is-open' ).attr( 'aria-expanded', 'false' );
        $( 'body' ).css( 'overflow', '' );
        $hamburger.trigger( 'focus' );
    }

    $hamburger.on( 'click', function () {
        const isOpen = $mobileMenu.attr( 'hidden' ) === undefined || $mobileMenu.attr( 'hidden' ) === false;
        // Check transform state instead of hidden attr (we keep display:flex always)
        if ( $mobileMenu.attr( 'hidden' ) !== undefined ) {
            openMenu();
        } else {
            closeMenu();
        }
    } );

    $mobileClose.on( 'click', closeMenu );
    $overlay.on( 'click', closeMenu );

    // ESC key
    $( document ).on( 'keydown', function ( e ) {
        if ( e.key === 'Escape' && $mobileMenu.attr( 'hidden' ) === undefined ) {
            closeMenu();
        }
    } );

    // Focus trap inside mobile menu
    $mobileMenu.on( 'keydown', function ( e ) {
        if ( e.key !== 'Tab' ) return;
        const focusable = $mobileMenu.find( FOCUSABLE ).filter( ':visible' );
        const first = focusable.first()[0];
        const last  = focusable.last()[0];

        if ( e.shiftKey ) {
            if ( document.activeElement === first ) {
                e.preventDefault();
                last.focus();
            }
        } else {
            if ( document.activeElement === last ) {
                e.preventDefault();
                first.focus();
            }
        }
    } );

    /* ─── Mobile submenu accordion ─── */
    $( '.mobile-nav-list .nav-item.menu-item-has-children > .nav-link' ).on( 'click', function ( e ) {
        // Only intercept on mobile (<1024px)
        if ( window.innerWidth >= 1024 ) return;
        e.preventDefault();
        const $parent = $( this ).closest( '.nav-item' );
        $parent.toggleClass( 'sub-open' );
    } );

    /* ─── Category strip: set active pill by current URL ─── */
    ( function setActiveCatPill() {
        const current = window.location.pathname;
        $catStrip.find( '.cat-pill' ).each( function () {
            const href = $( this ).attr( 'href' ) || '';
            if ( href && href !== '#' && current.indexOf( href.replace( window.location.origin, '' ) ) === 0 ) {
                $( '.cat-pill.on' ).removeClass( 'on' );
                $( this ).addClass( 'on' );
                // Scroll the active pill into view (centered)
                const strip = document.querySelector( '.cat-strip-inner' );
                if ( strip ) {
                    const pill = this;
                    const offset = pill.offsetLeft - strip.offsetWidth / 2 + pill.offsetWidth / 2;
                    strip.scrollTo( { left: offset, behavior: 'smooth' } );
                }
            }
        } );
    } )();

    /* ─── Resize: close mobile menu if resized to desktop ─── */
    $( window ).on( 'resize.rexbon', function () {
        if ( window.innerWidth >= 1024 && $mobileMenu.attr( 'hidden' ) === undefined ) {
            closeMenu();
        }
    } );

} )( window.jQuery || { fn: {}, on: function(){} } );
