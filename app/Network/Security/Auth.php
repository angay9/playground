<?php

namespace Network\Security;

use Phalcon\Mvc\User\Plugin as Plugin;
use Network\Users\User as User;

/**
 * Auth class
 * Provides functionality connected to user authentication
 */
class Auth extends Plugin
{
	/**
	 * User model
	 * @var Network\Users\User
	 */
	private static $_user;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		
	}

	/**
	 * Attempts to login 
	 * @param  array  $credentials user credentials
	 * @return bool   true if user was logged in
	 */
	public function attempt (array $credentials)
	{
		$user = User::findFirstByUsername($credentials['username']);
		
		// No user was found
		if (!$user) {
			return false;
		}
	
		// Check password
		if (!$this->security->checkHash($credentials['password'], $user->getPassword())) {
			return false;
		}

		$this->session->set('user', [
			'username' => $user->getUsername()
		]);	
														
		return true;
	}

	/**
	 * Check if user is logged in
	 * @return bool  true if user is logged in
	 */
	public function check ()
	{
		return !empty($this->getIdentity());
	}

	/**
	 * Gets a user identity from session
	 * @return array . If no user found null will be returned
	 */
	public function getIdentity ()
	{
		return $this->session->get('user');
	}

	/**
	 * Returns a user model
	 * @return Network\Users\User
	 */
	public function getUser ()
	{
		if ($this->check()) {
			if (!static::$_user) {
				$username = $this->session->get('user')['username'];
				static::$_user = $user = User::findFirstByUsername($username);
			}
			return static::$_user;
		}
		return false;
	}

	/**
	 * Remove user data from session
	 * @return void
	 */
	public function deleteIdentity ()
	{
		if ($this->session->has('user')) {

			$this->session->remove('user');
		}

	}
	/**
	 * Determine if user is a guest
	 * @return boolean true if is a guest
	 */
	public function isGuest ()
	{
		return !$this->check();
	}

}