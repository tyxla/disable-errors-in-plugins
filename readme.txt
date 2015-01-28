=== Disable Errors in Plugins ===
Contributors: tyxla
Tags: error, disable, hide, plugin, notice, warning
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress plugin that simply disables error reporting and error logging for all plugins.

== Description ==

Disable Errors in Plugins is a WordPress plugin that simply disables error reporting and error logging for all plugins.

This plugin should be used mostly with development purposes. It does NOT encourage badly written code with errors, warnings or notices. Its main goal is to help plugin & theme developers in situations when they have to use plugins that have notices or warnings. This helps to isolate any external errors, allowing developers to focus on improving their own code and making it errorless.

The plugin file name begins with `000-`, because this way it would assure being loaded before 99.9% of the plugins.

== Installation ==

1. Install Disable Errors in Plugins either via the WordPress.org plugin directory, or by uploading the files to your server.
1. Activate the plugin.
1. That's it. You're ready to go!

== Changelog ==

= 1.0.1 =
The plugin will now load earlier.

= 1.0 =
Initial version.