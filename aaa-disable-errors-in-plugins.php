<?php
/*
Plugin Name: Disable Errors in Plugins
Description: Disables error reporting and error logging for plugins.
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
	 * @return bool True if error is within /plugins, false otherwise.
	 */
	public function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
	    // We don't care about STRICT errors -- many of them are being generated because 
	    // of the PHP 4 compliance (e.g. using var instead of of public / protected / private).
	    if ( defined('E_STRICT') && $errno == E_STRICT ) {
	        return;
	    }

	    $error_file = str_replace('\\', '/', $errfile);
	    $content_dir = str_replace('\\', '/', WP_CONTENT_DIR . '/plugins');
	    if (strpos($error_file, $content_dir) !== false) {
	        // do nothing for errors inside of the plugins directory
	        return true;
	    }

	    // default error handler otherwise
	    return false;
	}

}

// initialize Disable Errors In Plugins
global $disable_errors_in_plugins;
$disable_errors_in_plugins = new Disable_Errors_In_Plugins();