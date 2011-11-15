<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behavior of Cake.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * CakePHP Debug Level:
 *
 * Production Mode:
 * 	0: No error messages, errors, or warnings shown. Flash messages redirect.
 *
 * Development Mode:
 * 	1: Errors and warnings shown, model caches refreshed, flash messages halted.
 * 	2: As in 1, but also with full debug messages and SQL output.
 *
 * In production mode, flash messages redirect after a time interval.
 * In development mode, you need to click the flash message to continue.
 */
	Configure::write('debug', 2);

	Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
	));

	Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
	));

	Configure::write('App.encoding', 'UTF-8');

	//Configure::write('App.baseUrl', env('SCRIPT_NAME'));

	//Configure::write('Routing.prefixes', array('admin'));

	//Configure::write('Cache.disable', true);

	//Configure::write('Cache.check', true);

	define('LOG_ERROR', 2);
    
    
    /** Environment specific settings **/
    if($_SERVER['HTTP_HOST'] == 'dev') {
        $memcache_prefix = 'dev_';
    	$memcache_servers = array(
    		'127.0.0.1:11211',
    	);
        
    } else {
        $memcache_prefix = 'live_';
    	$memcache_servers = array(
    		'127.0.0.1:11211',
    	);
    }
    
    
    
    
    /** APP SETTINGS **/
    
    
    
    
    
    
    
    
    
    /** END APP SETTINGS **/
    
    
    
    

    /**
     * Session configuration.
     *
     * Contains an array of settings to use for session configuration. The defaults key is
     * used to define a default preset to use for sessions, any settings declared here will override
     * the settings of the default config.
     *
     * ## Options
     *
     * - `Session.cookie` - The name of the cookie to use. Defaults to 'CAKEPHP'
     * - `Session.timeout` - The number of minutes you want sessions to live for. This timeout is handled by CakePHP
     * - `Session.cookieTimeout` - The number of minutes you want session cookies to live for.
     * - `Session.checkAgent` - Do you want the user agent to be checked when starting sessions? You might want to set the
     *    value to false, when dealing with older versions of IE, Chrome Frame or certain web-browsing devices and AJAX
     * - `Session.defaults` - The default configuration set to use as a basis for your session.
     *    There are four builtins: php, cake, cache, database.
     * - `Session.handler` - Can be used to enable a custom session handler.  Expects an array of of callables,
     *    that can be used with `session_save_handler`.  Using this option will automatically add `session.save_handler`
     *    to the ini array.
     * - `Session.autoRegenerate` - Enabling this setting, turns on automatic renewal of sessions, and
     *    sessionids that change frequently. See CakeSession::$requestCountdown.
     * - `Session.ini` - An associative array of additional ini values to set.
     *
     * The built in defaults are:
     *
     * - 'php' - Uses settings defined in your php.ini.
     * - 'cake' - Saves session files in CakePHP's /tmp directory.
     * - 'database' - Uses CakePHP's database sessions.
     * - 'cache' - Use the Cache class to save sessions.
     *
     * To define a custom session handler, save it at /app/Model/Datasource/Session/<name>.php.
     * Make sure the class implements `CakeSessionHandlerInterface` and set Session.handler to <name>
     *
     * To use database sessions, run the app/Config/Schema/sessions.php schema using
     * the cake shell command: cake schema create Sessions
     *
     */
	Configure::write('Session', array('defaults' => 'php'));

    /**
     * The level of CakePHP security.
     */
	Configure::write('Security.level', 'medium');

    /**
     * A random string used in security hashing methods.
     */
	Configure::write('Security.salt', 'DYhG93b0qysafJfIxfs2guVoUubWwvniR2G0FgaC9mi');

    /**
     * A random numeric string (digits only) used to encrypt/decrypt strings.
     */
	Configure::write('Security.cipherSeed', '7685923309657453542496749683645');

	Configure::write('Asset.timestamp', true);
	//Configure::write('Asset.filter.css', 'css.php');
	//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');
    
    /**
     * The classname and database used in CakePHP's
     * access control lists.
     */
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');

    /**
     * Pick the caching engine to use.  If APC is enabled use it.
     * If running via cli - apc is disabled by default. ensure it's available and enabled in this case
     *
     */
    $engine = 'File';
    if (extension_loaded('apc') && function_exists('apc_dec') && (php_sapi_name() !== 'cli' || ini_get('apc.enable_cli'))) {
    	$engine = 'Apc';
    }
    
    // In development mode, caches should expire quickly.
    $duration = '+999 days';
    if (Configure::read('debug') >= 1) {
    	$duration = '+10 seconds';
    }
    
    /**
     * Configure the cache used for general framework caching.  Path information,
     * object listings, and translation cache files are stored with this configuration.
     */
    Cache::config('_cake_core_', array(
    	'engine' => $engine,
    	'prefix' => 'cake_core_',
    	'path' => CACHE . 'persistent' . DS,
    	'serialize' => ($engine === 'File'),
    	'duration' => $duration
    ));
    
    /**
     * Configure the cache for model and datasource caches.  This cache configuration
     * is used to store schema descriptions, and table listings in connections.
     */
    Cache::config('_cake_model_', array(
    	'engine' => $engine,
    	'prefix' => 'cake_model_',
    	'path' => CACHE . 'models' . DS,
    	'serialize' => ($engine === 'File'),
    	'duration' => $duration
    ));
    
    Cache::config('default', array(
    	'engine' => 'Memcache',
    	'duration'=> 3600,
    	'probability'=> 100, 
    	'prefix' => $memcache_prefix,
    	'servers' => $memcache_servers,
    	'compress' => false, // [optional] compress data in Memcache (slower, but uses less memory)
    ));
    
    Cache::config('long', array(
    	'engine' => 'Memcache',
    	'duration'=> '+30 minutes',
    	'probability'=> 100,
    	'prefix' => $memcache_prefix,
    	'servers' => $memcache_servers,
    ));
    
    Cache::config('30m', array(
    	'engine' => 'Memcache',
    	'duration'=> '+30 minutes',
    	'probability'=> 100,
    	'prefix' => $memcache_prefix,
    	'servers' => $memcache_servers,
    ));
    
    Cache::config('1day', array(
    	'engine' => 'Memcache',
    	'duration'=> '+1 day',
    	'probability'=> 100,
    	'prefix' => $memcache_prefix,
    	'servers' => $memcache_servers,
    ));
    
    Cache::config('week', array(
    	'engine' => 'Memcache',
    	'duration'=> '+7 days',
    	'probability'=> 100,
    	'prefix' => $memcache_prefix,
    	'servers' => $memcache_servers,
    ));