<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behavior of Cake.
 *
 */

Configure::write('debug', 2); // 1 = full, 2 = full w/ sql debug

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


Configure::write('Session', array('defaults' => 'php'));
Configure::write('Security.level', 'medium'); // low, medium, high
Configure::write('Security.salt', ''); // CHANGE FOR NEW APP
Configure::write('Security.cipherSeed', ''); // CHANGE FOR NEW APP, DIGITS ONLY

Configure::write('Asset.timestamp', true);
//Configure::write('Asset.filter.css', 'css.php');
//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

/**
 * The classname and database used in CakePHP's access control lists.
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