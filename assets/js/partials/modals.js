/**
 * File modals.js.
 *
 * Handles all modals on site.
 */

const tingle = require( 'tingle.js' );

( function( $ ) {
	$( document ).ready( () => {

		let contentLocation,
			content,
			modal = new tingle.modal( {
				closeMethods: ['overlay', 'escape'],
				closeLabel: 'Close',
			} ),
			modalSmall = new tingle.modal( {
				closeMethods: ['overlay', 'escape'],
				closeLabel: 'Close',
				cssClass: ['small-modal']
			} );

		$( '.modal, .modal a' ).click( function( e ) {
			e.preventDefault();
			contentLocation = $( this ).attr( 'href' );
			content = $( contentLocation ).html();
			if ( content ) {
				modal.setContent( content );
				modal.open();

				$( '.modal-close' ).click( function( e ) {
					e.preventDefault();
					modal.close();
				} );

				content = '';
			}
		});

		$( '.modal-small, .modal-small a' ).click( function( e ) {
			e.preventDefault();
			contentLocation = $( this ).attr( 'href' );
			content = $( contentLocation ).html();
			if ( content ) {
				modalSmall.setContent( content );
				modalSmall.open();

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
