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
		 * Login
		 */
		$this->addGet('/login','Signin::create')->setName('login_route');
		$this->addPost('/login','Signin::store')->setName('login_route');

		/**
		 * Logout
		 */
		$this->addGet('/logout', 'Session::destroy')->setName('logout_route');

		/**
		 * Profile
		 */
		$this->addGet('/@{username}/statuses/edit/{id}', 'Profile::index')->setName('edit_status_route');
		$this->addGet('/@{username}/statuses', 'Profile::index')->setName('profile_route');
		$this->addGet('/@{username}/statuses/{page:[0-9]+}', 'Profile::index')->setName('profile_route');
		$this->addPost('/@{username}/statuses', 'Profile::store')->setName('profile_route');
		$this->addPost('/@{username}/statuses/delete', 'Profile::destroy')->setName('delete_status_route');

		/**
		 * Settings
		 */
		$this->addGet('/@{username}/settings', 'Settings::index')->setName('settings_route');
		$this->addPost('/@{username}/save-profile-settings', 'Settings::store')->setName('save_profile_settings_route');

		/**
		 * Members
		 */
		$this->addGet('/members', 'Members::index')->setName('members_route');
		$this->addGet('/members/{page:[0-9]+}', 'Members::index')->setName('members_route');

	}

}