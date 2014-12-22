<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I
use Network\Users\User as User;

class FunctionalHelper extends \Codeception\Module
{
	public function haveAnAccount ($username, $password)
	{
		$user = new User();
		$user->assign([
			'name' => 'John Doe',
			'username' => $username,
			'email' => 'john@test.com',
			'password' => $password
		]);

		return $user->save();
	}
}
