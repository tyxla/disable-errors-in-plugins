<?php
/*
Plugin Name: Disable Errors in Plugins
Description: Disables error reporting and error logging for plugins. Useful when you develop themes, or you just want to use a plugin that has notices/warnings.
Version: 1.0
Author: tyxla
Author URI: https://github.com/tyxla
License: GPL2
Requires at least: 3.0
Tested up to: 4.1
*/

/**
 * Main plugin class.
 */
class Disable_Errors_In_Plugins {

	/**
	 * Constructor.
	 *	
	 * Initializes and hooks the plugin functionality.
	 *
	 * @access public
	 *
	 * @return Disable_Errors_In_Plugins 
	 */
	public function __construct() {
		// apply our custom error handler
		set_error_handler( array($this, 'error_handler') );
	}

	/**
	 * Our custom error handler
	 *
	 * @access public
	 *
	 * @param int $errno        The first parameter, errno, contains the level of the error raised.
	 * @param string $errstr    The second parameter, errstr, contains the error message.
	 * @param string $errfile   The third parameter is optional, errfile, which contains the 
	 *                          filename that the error was raised in.
	 * @param int $errline      The fourth parameter is optional, errline, which contains the line 
	 *                          number the error was raised at.
	 * @param array $errcontext The fifth parameter is optional, errcontext that contains an array 
	 *                          of every variable that existed in the scope the error was triggered 
	 *                          in. User error handler must not modify error context.
	 * @return bool 			True if error is within /plugins, false otherwise.
	 */
	public function error_handler($errno, $errstr, $errfile, $errline, $errcontext = array()) {
		// path to error file
		$error_file = str_replace('\\', '/', $errfile);

		// path to plugins
		$content_dir = str_replace('\\', '/', WP_CONTENT_DIR . '/plugins');

		// do nothing for errors inside of the plugins directory
		if (strpos($error_file, $content_dir) !== false) {
			return true;
		}

		// default error handler otherwise
		return false;
	}

}

// initialize Disable Errors In Plugins
global $disable_errors_in_plugins;
$disable_errors_in_plugins = new Disable_Errors_In_Plugins();