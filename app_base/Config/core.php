<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 *
 */

/**
 * This class loads all of the settings from our core JSON file that sits in /config
 *
 */
class JSONConfigPuller {

	protected static $json;
	protected static $conf_path = null;

	/**
	 * Load the global configuration file
	 * @return none
	 */
	public static function init() {
		if(self::$conf_path === null) {
			self::$conf_path = dirname(dirname(dirname(__FILE__)));
		}
		self::$json = file_get_contents(self::$conf_path.'/config/config.json');
		self::$json = json_decode(self::$json);
		self::loadToConfig();
	}

	/**
	 * Load the given domains into the global config
	 * @return none
	 */
	public static function loadToConfig() {
		$vendors = json_decode(file_get_contents(self::$conf_path.'/config/vendors.json'));
		foreach($vendors as $domain => $keys) {
			foreach($keys as $key => $value) {
				Configure::write(ucfirst($domain).'.'.$key, $value);
			}
		}
	}

	/**
	 * Return a setting given a domain and key
	 * @return mixed
	 */
	public static function read($domain, $key = null) {
		return self::get($domain, $key);
	}

	/**
	 * Return a setting given a domain and key
	 * @return mixed
	 */
	public static function get($domain, $key = null) {
		if($key === null) {
			return self::$json->{$domain};
		}

		return self::$json->{$domain}->{$key};
	}
}

JSONConfigPuller::init();

/**
 * SETTINGS ARE BELOW
 *
 */
Configure::write('debug', JSONConfigPuller::get('app_dormillo', 'debug'));
Configure::write('log', E_ALL & ~E_NOTICE);
Configure::write('Cache.disable', true);
Configure::write('Site.URL', JSONConfigPuller::get('app_dormillo', 'Site.URL'));
Configure::write('Error.log', true);

Configure::write('Error', array(
	'handler' => 'ErrorHandler::handleError',
	'level' => E_ALL & ~E_DEPRECATED & ~E_NOTICE,
	'trace' => true, 'log' => true
 ));
    
Configure::write('Exception', array(
	'handler' => 'ErrorHandler::handleException',
	'renderer' => 'ExceptionRenderer',
	'log' => true
 ));
    
/**
 * Application wide charset encoding
 */
Configure::write('App.encoding', 'UTF-8');
Configure::write('Routing.prefixes', array('admin'));
//
/**
 * Enable cache checking.
 *
 * If set to true, for view caching you must still use the controller
 * var $cacheAction inside your controllers to define caching settings.
 * You can either set it controller-wide by setting var $cacheAction = true,
 * or in each action using $this->cacheAction = true.
 *
 */
//Configure::write('Cache.check', true);

/**
 * Defines the default error type when using the log() function. Used for
 * differentiating error logging and debugging. Currently PHP supports LOG_DEBUG.
 */
define('LOG_ERROR', 2);

Configure::write('Session.save', 'php');

//Configure::write('Session.database', 'default');
Configure::write('Session.cookie', JSONConfigPuller::get('app', 'Site.Cookie.Name'));

Configure::write('Session.timeout', '120');
Configure::write('Session.start', true);

Configure::write('Session.checkAgent', true);
Configure::write('Security.level', 'medium');
Configure::write('Security.salt', 'ee9ae7dea93a32a4f297c4f4d35ac55f0c');
Configure::write('Security.cipherSeed', '21316549846167832178965218796525');
Configure::write('Asset.timestamp', true);

/**
 * The classname and database used in CakePHP's
 * access control lists.
 */
Configure::write('Acl.classname', 'DbAcl');
Configure::write('Acl.database', 'default');

Cache::config('_cake_core_', array(
	'engine' => 'Apc',
	'prefix' => 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => false,
	'duration' => '+2 seconds',
));

/**
 * Configure the cache for model and datasource caches.  This cache configuration
 * is used to store schema descriptions, and table listings in connections.
 */
Cache::config('_cake_model_', array(
	'engine' => 'Apc',
	'prefix' => 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => false,
	'duration' => '+2 seconds',
));

Cache::config('default', array(
	'engine' => 'Memcache',
	'duration'=> 3600,
	'probability'=> 100, 
	'prefix' => JSONConfigPuller::get('memcache', 'prefix'),
	'servers' => (array) JSONConfigPuller::get('memcache', 'servers'),
	'compress' => false, // [optional] compress data in Memcache (slower, but uses less memory)
));

Cache::config('long', array(
	'engine' => 'Memcache',
	'duration'=> '+30 minutes',
	'probability'=> 100,
	'prefix' => JSONConfigPuller::get('memcache', 'prefix'),
	'servers' => (array) JSONConfigPuller::get('memcache', 'servers'),
));

Cache::config('30m', array(
	'engine' => 'Memcache',
	'duration'=> '+30 minutes',
	'probability'=> 100,
	'prefix' => JSONConfigPuller::get('memcache', 'prefix'),
	'servers' => (array) JSONConfigPuller::get('memcache', 'servers'),
));

Cache::config('1day', array(
	'engine' => 'Memcache',
	'duration'=> '+1 day',
	'probability'=> 100,
	'prefix' => JSONConfigPuller::get('memcache', 'prefix'),
	'servers' => (array) JSONConfigPuller::get('memcache', 'servers'),
));

Cache::config('week', array(
	'engine' => 'Memcache',
	'duration'=> '+7 days',
	'probability'=> 100,
	'prefix' => JSONConfigPuller::get('memcache', 'prefix'),
	'servers' => (array) JSONConfigPuller::get('memcache', 'servers'),
));

