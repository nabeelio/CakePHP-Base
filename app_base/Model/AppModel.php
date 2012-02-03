<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 *
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

	/**
	 * Find by the ID but also cache the results
	 *
	 * @param $id
	 * @return array
	 */
	public function findByIDCached($id) {

		$key = md5((is_array($id) ? implode('', $id) : $id));
		return $this->find('all', array(
			'conditions' => array($this->name.'.id' => $id),
			'cache' => array('key' => $this->name.'.'.$key),
		));

	}
}
