<?php

namespace Network\Core;

/**
 * Define routes
 */

class Routes extends \Phalcon\Mvc\Router\Group
{
	
	public function initialize()
	{
		/**
		 * Home
		 */
		$this->addGet('/', 'Index::index');
		
		/**
		 * Registration
		 */
		$this->addGet('/register', 'Session::create')->setName('register_route');
		$this->addPost('/register', 'Session::store')->setName('register_route');

		/**
		 * User profile
		 */
		$this->addGet('/@{username}', 'Profile::show')->setName('user_profile');

	}


}