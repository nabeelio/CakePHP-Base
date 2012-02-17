<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 *
 */

class JSONConfigReader {

	protected static $json;
	protected static $conf_path = null;

	/**
	 * Load the global configuration file
	 * @return none
	 */
	public static function init() {
		if(self::$conf_path === null) {
			self::$conf_path = dirname(dirname(__FILE__));
		}
		self::$json = file_get_contents(self::$conf_path.'/config.json');
		self::$json = json_decode(self::$json);
		self::loadToConfig();
	}

	/**
	 * Load the given domains into the global config
	 * @return none
	 */
	public static function loadToConfig() {
		$vendors = json_decode(file_get_contents(self::$conf_path.'/vendors.json'));
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

JSONConfigReader::init();