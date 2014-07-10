(function($, undefined) {
	function update_mpworg_widget(response) {
		var id = WPCOM_sharing_counts[response.url];
		if (id === undefined || !response.votes) {
			return;
		}
		$('#sharing-mwporg-' + id + ' span').append('<span class="share-count">' + response.votes + '</span>');
	}

	window.update_mpworg_widget = update_mpworg_widget;

	$(function() {
		for ( var url in WPCOM_sharing_counts ) {
			var id = WPCOM_sharing_counts[url];
			if ($('#sharing-mwporg-' + id).length) {
				// Only send a request if a matching widget is found
				jQuery.getScript( 'http://managewp.org/share/frame/small?url=' + encodeURIComponent(url) + '&callback=update_mpworg_widget' );
			}
		}
	});
})(jQuery);