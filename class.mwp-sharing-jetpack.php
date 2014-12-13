<?php

if ( class_exists( 'Share_Twitter' ) && ! class_exists( 'Share_Mwporg' ) ) :

// Build button
class Share_Mwporg extends Share_Twitter {
	var $shortname = 'mwp';
	public function __construct( $id, array $settings ) {
		parent::__construct( $id, $settings );
		$this->smart = 'official' == $this->button_style;
	}

	public function get_name() {
		return __( 'ManageWP.org', 'mwpjp' );
	}

	public function get_display( $post ) {
		$display = '';

		if ( $this->smart ) {
			$display .= sprintf( '<script src="http://managewp.org/share.js" data-type="small" data-title="" data-url="%s"></script>', esc_url( get_permalink( $post->ID ) ) );
		} else {
			$display = Sharing_Source::get_link( get_permalink( $post->ID ), _x( 'ManageWP.org', 'share to', 'mwpjp' ), __( 'Share on ManageWP.org', 'mwpjp' ), 'share=mwp', 'sharing-mwp-' . $post->ID );
		}

		if ( apply_filters( 'jetpack_register_post_for_share_counts', true, $post->ID, 'mwp' ) ) {
			sharing_register_post_for_share_counts( $post->ID );
		}

		return $display;
	}

	public function process_request( $post, array $post_data ) {
		$managewp_url = set_url_scheme( sprintf( 'http://managewp.org/share/form?url=%s', rawurlencode( get_permalink( $post->ID ) ) ) );

		// Redirect to ManageWP.org
		wp_redirect( $managewp_url );
		die();
	}
}

endif; // class_exists
