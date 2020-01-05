/**
 * File modals.js.
 *
 * Handles all modals on site.
 */

const tingle = require( 'tingle.js' );

( function( $ ) {
	$( document ).ready( () => {

		let $focusable,
			$notFocusable,
			$currentFocus;

		let contentLocation,
			content,
			modalSmall = new tingle.modal( {
				closeMethods: ['overlay', 'escape'],
				cssClass: ['small-modal'],
				onOpen: function() {
					$currentFocus = $( ':focus' );
					$focusable = $( '.tingle-modal--visible' ).find( 'a[href], area[href], input, select, textarea, button, iframe, object, embed, *[tabindex], *[contenteditable]' ).not( '[tabindex=-1], [disabled], :hidden' );
					$focusable.addClass( 'focusable' );
					$notFocusable = $( 'a[href], area[href], input, select, textarea, button, iframe, object, embed, *[tabindex], *[contenteditable]' ).not( '[tabindex=-1], [disabled], :hidden, .focusable' )
					$notFocusable.attr( 'tabindex', -1 );
				},
				onClose: function() {
					$notFocusable.removeAttr( 'tabindex' );
					$currentFocus.focus();
				},
			} );

		$( '.modal-small, .modal-small a' ).click( function( e ) {
			e.preventDefault();
			contentLocation = $( this ).attr( 'href' );
			content = $( contentLocation ).html();
			if ( content ) {
				modalSmall.setContent( content );
				modalSmall.open();

				$( '.tingle-modal .row input' ).first().focus();

				$( '.modal-close' ).click( function( e ) {
					e.preventDefault();
					modalSmall.close();
				} );

				content = '';
			}
		} );

		$( '.modal-close' ).click( function( e ) {
			e.preventDefault();
			modal.close();
			modalSmall.close();
		} );

	} );
} ( jQuery ) );
