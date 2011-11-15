<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behaviour of Cake.
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
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'cakebase',
		'password' => 'cakebase',
		'database' => 'cakebase',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
    
    public $dev = array(
        'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'cakebase',
		'password' => 'cakebase',
		'database' => 'cakebase',
		'prefix' => '',
    );
    
    public $stage = array(
        'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'cakebase',
		'password' => 'cakebase',
		'database' => 'cakebase',
		'prefix' => '',
    );
    
    /**
	 * Handle which database connection strings to use...
	 * 
	 * @param string $env dev/stage/live (optional)
	 * @return none
	 */
	public function __construct($env = '') {
        
        if(empty($env)) {
            if($_SERVER['HTTP_HOST'] == 'dev') {
                $this->default = $this->dev;
            } elseif($_SERVER['HTTP_HOST'] == 'stage') {
                $this->default = $this->stage;
            } else {
                
            }
        } else {
            $this->default = $this->$env;
        }
	}
}




