=== ManageWP.org sharing for Jetpack ===
Contributors: jeherve
Tags: WordPress.com, Jetpack, sharing, ManageWP, mwp
Requires at least: 3.8
Tested up to: 3.9.1
Stable tag: 1.3

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

= 1.3 =
* Add sharing count to Text and Icon buttons, props @proof

= 1.2.3 =
* Refactor the plugin organization to avoid all Fatal errors
* Better warning system if Jetpack or the sharing module are not active

= 1.2.2 =
* Fix Fatal error when Jetpack is deactivated

= 1.2 =
* Update sharing button to be compatible with Jetpack 3.0

= 1.1 =
* Display a notice when Jetpack is not active

= 1.0 =
* Initial Release
