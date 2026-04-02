/**
 * Rexbon Child – search.js
 *
 * Live AJAX search with:
 *  • Debounced input (300 ms)
 *  • Loading / empty / results states
 *  • Keyboard navigation (↑ ↓ Enter)
 *  • Click-outside to close
 *  • Full-page search fallback via Enter on empty results
 *  • Screen-reader announcements via aria-live
 */

( function ( $ ) {
    'use strict';

    if ( typeof RexbonSearch === 'undefined' ) return;

    const cfg = RexbonSearch;

    /* ─── DOM ─── */
    const $input     = $( '#rexbon-search-input' );
    const $dropdown  = $( '#rexbon-search-results' );
    const $list      = $( '#rexbon-sri-list' );
    const $viewAll   = $( '#rexbon-view-all' );
    const $backdrop  = $( '#rexbon-search-backdrop' );
    const $form      = $( '#rexbon-search-form' );
    const $formInput = $( '#rexbon-search-form-s' );

    /* Inject an aria-live region for screen readers */
    const $liveRegion = $( '<div>', {
        id:           'rexbon-sr-live',
        'aria-live':  'polite',
        'aria-atomic':'true',
        class:        'screen-reader-text',
        css:          { position:'absolute', width:'1px', height:'1px', overflow:'hidden', clip:'rect(0,0,0,0)', whiteSpace:'nowrap' },
    } ).appendTo( 'body' );

    let currentQuery = '';
    let debounceTimer;
    let activeIndex  = -1;

    /* ─── Open / close dropdown ─── */
    function openDropdown() {
        $dropdown.removeAttr( 'hidden' );
        $input.attr( 'aria-expanded', 'true' );
        $backdrop.addClass( 'active' );
    }

    function closeDropdown() {
        $dropdown.attr( 'hidden', true );
        $input.attr( 'aria-expanded', 'false' );
        $backdrop.removeClass( 'active' );
        activeIndex = -1;
    }

    /* ─── Render states ─── */
    function showLoading() {
        $list.html( '<div class="search-status">' + cfg.i18n.searching + '</div>' );
        $viewAll.attr( 'hidden', true );
        openDropdown();
    }

    function showEmpty() {
        $list.html( '<div class="search-status">' + cfg.i18n.noResults + '</div>' );
        $viewAll.attr( 'hidden', true );
        openDropdown();
        $liveRegion.text( cfg.i18n.noResults );
    }

    function showResults( html, total, query ) {
        $list.html( html );
        if ( total > 8 ) {
            const label = cfg.i18n.viewAll.replace( '%s', query );
            $viewAll
                .text( label )
                .attr( 'href', '/?s=' + encodeURIComponent( query ) )
                .removeAttr( 'hidden' );
        } else {
            $viewAll.attr( 'hidden', true );
        }
        openDropdown();
        $liveRegion.text( total + ' results for ' + query );
    }

    /* ─── AJAX search ─── */
    function doSearch( query ) {
        if ( query.length < 2 ) {
            closeDropdown();
            return;
        }
        if ( query === currentQuery ) return;
        currentQuery = query;

        showLoading();

        $.ajax( {
            url:      cfg.ajaxurl,
            type:     'POST',
            data:     { action: 'rexbon_search', nonce: cfg.nonce, query: query },
            success:  function ( response ) {
                if ( ! response.success ) return;
                const d = response.data;
                if ( d.total === 0 || d.html === '' ) {
                    showEmpty();
                } else {
                    showResults( d.html, d.total, d.query );
                }
            },
            error: function () {
                closeDropdown();
            },
        } );
    }

    /* ─── Input events ─── */
    $input.on( 'input', function () {
        const val = $( this ).val().trim();
        clearTimeout( debounceTimer );
        if ( val.length < 2 ) {
            closeDropdown();
            currentQuery = '';
            return;
        }
        debounceTimer = setTimeout( () => doSearch( val ), 300 );
    } );

    $input.on( 'focus', function () {
        const val = $( this ).val().trim();
        if ( val.length >= 2 && currentQuery === val ) {
            openDropdown();
        }
    } );

    /* ─── Keyboard navigation ─── */
    $input.on( 'keydown', function ( e ) {
        const $items  = $dropdown.find( '.search-result-item, .sri-view-all:not([hidden])' );
        const total   = $items.length;

        switch ( e.key ) {
            case 'ArrowDown':
                e.preventDefault();
                if ( ! $dropdown.attr( 'hidden' ) ) {
                    activeIndex = ( activeIndex + 1 ) % total;
                    highlightItem( $items, activeIndex );
                }
                break;

            case 'ArrowUp':
                e.preventDefault();
                if ( ! $dropdown.attr( 'hidden' ) ) {
                    activeIndex = ( activeIndex - 1 + total ) % total;
                    highlightItem( $items, activeIndex );
                }
                break;

            case 'Enter':
                e.preventDefault();
                if ( activeIndex >= 0 && $items.eq( activeIndex ).length ) {
                    window.location.href = $items.eq( activeIndex ).attr( 'href' );
                } else {
                    // Full-page search
                    $formInput.val( $( this ).val() );
                    $form[0].submit();
                }
                break;

            case 'Escape':
                closeDropdown();
                break;
        }
    } );

    function highlightItem( $items, idx ) {
        $items.removeClass( 'is-focused' ).attr( 'aria-selected', 'false' );
        $items.eq( idx ).addClass( 'is-focused' ).attr( 'aria-selected', 'true' ).trigger( 'focus' );
    }

    /* ─── Click outside ─── */
    $backdrop.on( 'click', closeDropdown );

    $( document ).on( 'click', function ( e ) {
        if ( ! $( e.target ).closest( '.search-bar' ).length ) {
            closeDropdown();
        }
    } );

    /* ─── Desktop search button ─── */
    $( '.search-btn' ).on( 'click', function ( e ) {
        const val = $input.val().trim();
        if ( val ) {
            e.preventDefault();
            $formInput.val( val );
            $form[0].submit();
        }
    } );

    /* ─── Add keyboard-focus style ─── */
    $( document ).on( 'focus', '.search-result-item', function () {
        $( '.search-result-item' ).removeClass( 'is-focused' );
        $( this ).addClass( 'is-focused' );
    } );

    /* ─── CSS for focused state (injected once) ─── */
    $( '<style>' ).text(
        '.search-result-item.is-focused { background: #eef6e9; outline: 2px solid #6EA54F; outline-offset: -2px; }'
    ).appendTo( 'head' );

} )( window.jQuery );
