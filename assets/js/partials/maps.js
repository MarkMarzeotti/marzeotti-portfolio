/**
 * File maps.js.
 *
 * Adds Google Maps API to page after page load.
 */

( function( $ ) {
	$( document ).ready( () => {

        if ( $( '.wp-block-amb-advanced-maps-block' ).length ) {
            setTimeout( function() {

				var createScript = true;

				var url = '//maps.googleapis.com/maps/api/js?key=AIzaSyCb0NahCEnubhm0zEaBcJKF4nPgrSZ3IQM&callback=advancedMapsBlockInit';
				var scripts = document.getElementsByTagName('script');
				for ( var i = scripts.length; i--; ) {
					if ( scripts[i].src == url ) {
						createScript = false;
					}
				}

				if ( createScript ) {
					var body = document.getElementsByTagName( 'body' )[0];
					var googleScript = document.createElement( 'script' );
					googleScript.type = 'text/javascript';
					googleScript.src = url;
					body.appendChild( googleScript );
				}

            }, 3000 );
        }

	} );
} ( jQuery ) );
