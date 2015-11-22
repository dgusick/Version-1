/**
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var ModalEffects = (function() {

	function init() {

		var overlay = document.querySelector( '.cl-overlay' );

		[].slice.call( document.querySelectorAll( '.cl-trigger' ) ).forEach( function( el, i ) {

			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal.querySelector( '.cl-close' );

			function removeModal( hasPerspective ) {
				classie.remove( modal, 'cl-show' );

				if( hasPerspective ) {
					classie.remove( document.documentElement, 'cl-perspective' );
				}
			}

			function removeModalHandler() {
				removeModal( classie.has( el, 'cl-setperspective' ) ); 
			}

			el.addEventListener( 'click', function( ev ) {
				classie.add( modal, 'cl-show' );
				overlay.removeEventListener( 'click', removeModalHandler );
				overlay.addEventListener( 'click', removeModalHandler );

				if( classie.has( el, 'cl-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'cl-perspective' );
					}, 25 );
				}
			});

			close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
			});

		} );

	}

	init();

})();