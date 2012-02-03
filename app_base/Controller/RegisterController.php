<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 *
 */

class RegisterController extends AppController {

	/**
	 * If they've logged in through Facebook, then send them
	 * to the form to complete their profile
	 *
	 * http://www.vadimg.com/2010/05/05/facebook-php-library-graph-social-plugins-search-posting-and-more/
	 *
	 *
	 * Basic table:
	 *
	 * users:
	 * id | email | password | facebook_id
	 */
	public function facebook() {

		$this->set('title_for_layout', 'confirm facebook registration');

		$this->loadFacebook();

		$user = $this->facebook->getUser();
		if(empty($user)) {
			# User not logged in, so redirect them to the login URL
			$url = $this->facebook->getLoginUrl(array(
				'scope' => Configure::read('Facebook.permissions')
			));

			$this->redirect($url);
		} else {

			# Grab the current logged in user from FB
			$fbUser = $this->facebook->api('/me');

			if(empty($fbUser)) {
				$this->Session->setFlash('Facebook login failed!', 'flash/error');
				//$this->redirect('/login');
			}
		}

		/*	Now, grab their local user info from what we have here
			ANd see what kinda data it has...

			If they don't exist here locally then send them to the
			profile completion form. Otherwise, log them in locally...
		*/

		# Set fields for auth for auto-login
		$this->Auth->fields = array('username' => 'facebook_id', 'password' => 'password');

		$this->User->contain();
		$user = $this->User->findByFacebookId($fbUser['id']);

		//if we have a user, and it's full/valid data
		if(!empty($user) && $user['User']['email'] != '') {
			$this->Auth->login($user);
			$this->redirect('/profile');
		}

		if($this->request->is('post') || $this->request->is('put')) {

			if(strtolower(trim($this->request->data['User']['email'])) !== strtolower(trim($fbUser['email']))) {

				// see if they are trying to spoof the system
				$this->User->contain();
				$newUser = $this->User->findByEmail($this->request->data['User']['email']);
				if($newUser) {
					$this->Session->setFlash('Invalid link!', 'flash/error');
					$this->redirect('/');
				}
			}

			# Does someone with this email exist? If so, ask to join accounts
			$this->User->contain();
			$user = $this->User->findByEmail($this->request->data['User']['email']);
			# Some extra fields which need to be set...


			/* Set any additional fields for the user */

			if($user) {
				$this->request->data['User']['id'] = $user['User']['id'];
			}

			$save = $this->User->save($this->request->data);

			if($save) {
				$this->Session->write('You can now login using Facebook!', 'flash/success');
				$this->Auth->login($this->request->data);
				$this->redirect('/profile');
			} else {
				 # drurdlksdlfj
			}
		}

		# See if this email exists, if it does, tell the user so they know
		# that the accounts will be linked. Or use a different email, so they're not

		$this->User->contain();
		$this->set('email_found', false);
		if(($user = $this->User->findByEmail($fbUser['email']))) {
			$this->set('email_found', true);
		}

		$this->set('facebook_id', $fbUser['id']);
		$this->set('fbuser', $fbUser);
	}
}