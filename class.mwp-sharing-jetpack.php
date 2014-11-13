<?php

if ( class_exists( 'Share_Twitter' ) && ! class_exists( 'Share_Mwporg' ) ) :

// Build button
class Share_Mwporg extends Share_Twitter {
	var $shortname = 'mwp';
	public function __construct( $id, array $settings ) {
		parent::__construct( $id, $settings );
		$this->smart = 'official' == $this->button_style;
		$this->icon = 'icon' == $this->button_style;
		$this->button_style = 'icon-text';
	}

	public function get_name() {
		return __( 'ManageWP.org', 'mwpjp' );
	}

	public function get_display( $post ) {
		if ( $this->smart ) {
			return '<script src="http://managewp.org/share.js" data-type="small" data-title="" data-url="'. get_permalink( $post->ID ) .'"></script>';
		} else if ( $this->icon ) {
			return '<a target="_blank" rel="nofollow" class="share-mwp sd-button share-icon" href="http://managewp.org/share/form?url='. urlencode( get_permalink( $post->ID ) ) .'" id="sharing-mwporg-' . $post->ID . '"><span></span></a>';
		} else {
			return '<a target="_blank" rel="nofollow" class="share-mwp sd-button share-icon" href="http://managewp.org/share/form?url='. urlencode( get_permalink( $post->ID ) ) .'" id="sharing-mwporg-' . $post->ID . '"><span>ManageWP.org</span></a>';
		}
	}
}

endif; // class_exists
