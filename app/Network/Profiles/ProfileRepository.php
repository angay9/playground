<?php
namespace Network\Profiles;

use Network\Profiles\ProfileRepositoryInterface;
use Phalcon\Mvc\User\Plugin;

class ProfileRepository extends Plugin implements ProfileRepositoryInterface {

	public function save ($command)
	{

		$file = $command->avatar;
		$user = $this->auth->getUser();
		$path = 'users/img/avatars/' . time() . $user->getUsername() . $file->getName();
		
		$file->moveTo($path);
		$user->profile->setAvatar('/' . $path);
		$user->profile->save();		
	}

}