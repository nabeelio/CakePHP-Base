<?php


class AppController extends Controller {
    
    
    public $components = array('RequestHandler', 'Session', /*'DebugKit.Toolbar'*/);
    public $helpers = array('Html', 'Form', 'Session');
    
    
    public function beforeFilter() {
		
		Security::setHash('md5');

   		/*	Basic auth stuff */
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
        
		$this->Auth->allow('display');
        
        
        if($this->Auth->loggedIn() === true) {
            $this->user = $this->Auth->user();
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
     * AppController::readURL()
     * 
     * @param mixed $url
     * @return void
     */
    protected function readURL($url) {
        
        App::uses('HttpSocket', 'Network/Http');
                   
        $http = new HttpSocket();
        $http->configAuth('Basic', Configure::read('HTTP_AUTH_USER'), Configure::read('HTTP_AUTH_PASS'));
        
        return  $http->get($url);
        
    }
    
    
}