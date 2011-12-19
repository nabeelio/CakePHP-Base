<?php
/**
 * @author Nabeel Shahzad <nabeel@dormillo.com>
 * @copyright dormillo.com (c) 2011 all rights reserved
 * @license property of dormillo.com
 * 
 * // <!-- phpDesigner :: Timestamp [12/19/2011 5:17:30 PM] -->
 */
 
class AppModel extends Model {
    
	public $actsAs = array('Containable');
    	
	/**
	 * Override the Model find() function to include caching
	 *
	 */
	public function find($conditions = null, $fields = array(), $order = null, $recursive = null) {
	   
		# There is a cache parameter set
		if(isset($fields['cache']) && $fields['cache'] != '' && $fields['cache'] !== false) {
			$key = $fields['cache']['key'];
			if(!isset($fields['cache']['duration']) || $fields['cache']['duration'] == '') {
				$duration = 'default';
			} else {
				$duration = $fields['cache']['duration'];
			}

			unset($fields['cache']);
		
			# Now actually read it from the cache...
			$val = Cache::read($key);
			if($val === false) {
				$val = parent::find($conditions, $fields, $order, $recursive);
				Cache::write($key, $val, $duration);
			}

			return $val;
		}

		return parent::find($conditions, $fields, $order, $recursive);
	}
    
}
