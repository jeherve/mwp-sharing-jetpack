=== ManageWP.org sharing for Jetpack ===
Contributors: jeherve
Tags: WordPress.com, Jetpack, sharing, ManageWP, mwp
Requires at least: 3.9
Tested up to: 4.1
Stable tag: 1.5.1

Add a ManageWP.org sharing button to the Jetpack Sharing module

== Description ==

Extends the Jetpack plugin and allows you to add a ManageWP.org sharing button to the list of sharing services available under Settings > Sharing in your dashboard.

Important: for this plugin to work, you must activate [Jetpack](http://wordpress.org/plugins/jetpack/) first, and activate the Sharing module.

This plugin is a work in progress. You can report issues [here](http://wordpress.org/support/plugin/mwp-sharing-jetpack), or submit a pull request [on GitHub](https://github.com/jeherve/mwp-sharing-jetpack/).

Kudos to [Jeff](https://twitter.com/jeffr0) who gave me the idea for this plugin ([#](http://www.wptavern.com/how-to-add-a-managewp-button-to-jetpack-sharing))!

== Installation ==

1. Install the Jetpack plugin, connect the plugin to WordPress.com
2. Activate the Sharing module
3. Install the ManageWP.org Sharing for Jetpack plugin via the WordPress.org plugin repository, or via your dashboard
4. Activate the plugin
5. Go to Settings > Sharing, and drag the ManageWP.org button to the sharing area.
6. Enjoy! :)

== Changelog ==

= 1.5.1 =
* Avoid Mixed content warnings on https sites by fetching sharing counts via https when necessary, props @swissspidy

= 1.5 =
* urlencode post links in sharing link.
* Make sure the icons are aligned properly.
* Reorganize the buttons to match the new buttons added in Jetpack 3.3 ([reference](https://github.com/Automattic/jetpack/pull/1374)).
* Do not enqueue the sharing count js when sharing counts are disabled via the `jetpack_sharing_counts` filter ([reference](https://github.com/Automattic/jetpack/pull/1343)).
* Fix the WPCOM_sharing_counts global variable shadowing, props @zinigor

= 1.4 =
* Fix Javascript error when the sharing button isn't on a page, props @tommcfarlin.

= 1.3 =
* Add sharing count to Text and Icon buttons, props @proof.

= 1.2.3 =
* Refactor the plugin organization to avoid all Fatal errors.
* Better warning system if Jetpack or the sharing module are not active.

= 1.2.2 =
* Fix Fatal error when Jetpack is deactivated.

= 1.2 =
* Update sharing button to be compatible with Jetpack 3.0.

= 1.1 =
* Display a notice when Jetpack is not active.

= 1.0 =
* Initial Release.
