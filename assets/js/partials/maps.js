( function( $ ) {
	$( document ).ready( () => {

        if ( $( '#map' ).length ) {
            setTimeout( function() {
                var body = document.getElementsByTagName( 'body' )[0];
                var googleScript = document.createElement( 'script' );
                googleScript.type = 'text/javascript';
                googleScript.src = '//maps.googleapis.com/maps/api/js?key=AIzaSyCb0NahCEnubhm0zEaBcJKF4nPgrSZ3IQM&callback=initMap';
                body.appendChild( googleScript );
            }, 3000 );
        }
        
	} );
} ( jQuery ) );