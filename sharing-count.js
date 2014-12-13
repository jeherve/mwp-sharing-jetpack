(function( $ ) {

	// Initialize to an empty until it's populated by the response
	var WPCOM_sharing_counts = [];

	window.update_mpworg_widget = update_mpworg_widget;

	function update_mpworg_widget( response ) {

		var id = WPCOM_sharing_counts[ response.url ];

		if ( undefined === id || ! response.votes) {
			return;
		}

		var $share = jQuery( 'a[data-shared=sharing-mwp-' + id + '] > span');
		$share.find( '.share-count' ).remove();
		$share.append( '<span class="share-count">' + response.votes + '</span>' );

	}

	$(function() {

		var url, id;

		for ( url in WPCOM_sharing_counts ) {

			id = WPCOM_sharing_counts[ url ];

			// Only send a request if a matching widget is found
			if ( $( '#sharing-mwp-' + id ).length ) {
				$.getScript( 'http://managewp.org/share/frame/small?url=' + encodeURIComponent( url ) + '&callback=update_mpworg_widget' );
			}

		}

	});
})( jQuery );
