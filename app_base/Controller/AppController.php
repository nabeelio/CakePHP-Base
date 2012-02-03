<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 *
 */
 
class AppController extends Controller  {
	
	public $components = array('Session', 'RequestHandler', 'Auth', 'Cookie');
	public $helpers = array('Session', 'Time', 'Text', 'Form', 'Html', 'Js');

	public $uses = array();

	# Current logged in user
	public $user = null;
	public $facebook = null;

	/**
	 * Before any controllers are loaded
	 */
	public function beforeFilter() {

   		/*	Setup Auth variables */
        $this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array(
                    'username' => 'email', 
                    'password' => 'password', 
                    'salt' => 'salt'
            )),
        );
        
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->fields = array( 'username' => 'email', 'password' => 'password', 'salt' => 'salt');
		$this->Auth->autoRedirect = false;
        $this->Auth->flashElement = 'flash_error';
        
		$this->Auth->allow('display'); # For pages

        if($this->Auth->loggedIn() === true) {
            
            $user = $this->Auth->user();
            if(!isset($user['User'])) {
                $this->user = array('User' => $user);
            } else {
                $this->user = $user;
            }           

        } else {
            $this->user = null;
        }
        		
    	# All the sets for global
        $this->set('user', $this->user);
						
		# Not logged in, and not an admin, redirect away
		if(isset($this->params['admin']) && $this->params['admin'] === true && $this->user) {
			if($this->user['User']['group_id'] == 1) {
				$this->Auth->allow('*');
				$this->layout = 'admin';
			} else {
				$this->redirect('/');
			}
		}

		parent::beforeFilter();
	}


	/**
	 * Load Facebook library and read current facebook session
	 * @return resource
	 */
	public function loadFacebook() {

		if(Configure::read('FB.login.enabled') === false) {
			return true;
		}

		include_once APP.'/Vendor/facebook-php-sdk/src/facebook.php';

		$this->facebook = new Facebook(array(
			'appId' => Configure::read('Facebook.appID'),
			'secret' => Configure::read('Facebook.secret')
		));

		return $this->facebook;
	}

    /**
     * AppController::_refreshAuth()
     * 
     * @param string $field
     * @param string $value
     * @return void
     */
    public function refreshAuth($field = '', $value = '') {
    	if (!empty($field) && !empty($value)) { 
    		$this->Session->write('Auth.'. $field, $value);
    	} else {
    		if (isset($this->User)) {
  		        $this->User->contain();
    			$this->Auth->login($this->User->read(false, $this->Auth->user('id')));
    		} else {
                $this->User = ClassRegistry::init('User');
                $this->User->contain();
    			$this->Auth->login($this->User->findById($this->Auth->user('id')));
    		}
    	}
    }
    
    
    /**
     * AppController::sendEmail()
     * 
     * @param mixed $params
     * @return void
     */
    public function sendEmail($params = array()) {
        
        $params = array_merge(array(
            'to' => '',
            'subject' => '',
            'template' => '',
            'sendAs' => 'both',
            ), $params);
        
        $this->Email->to = $params['to'];
		$this->Email->subject = $params['subject'];
		$this->Email->replyTo = 'no-reply@mysite.com';
		$this->Email->from = 'MySite <no-reply@mysite.com>';
		$this->Email->template = $params['template'];
		$this->Email->sendAs = $params['sendAs'];
        
        return $this->Email->send();
    }

	/**
	 * Load a model dynamically, pass in any number of models to load
	 * @return none
	 */
	public function loadModelOnFly() {
		$args = func_get_args();
		foreach($args as $name) {
			App::Import('Model', $name);
			$this->{$name} = new $name();
		}
        
        return true;
	}
}
