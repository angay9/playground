<?php
namespace Network\Users\Commanding;

use Network\Commanding\CommandHandlerInterface;
use Network\Users\UserRepository;
use Phalcon\Mvc\User\Plugin;

class RegisterUserCommandHandler extends Plugin implements CommandHandlerInterface {
	
	private $_repo;

	public function __construct() 
	{
		$this->_repo = new UserRepository();
	}

	public function handle ($command)
	{
		$this->eventsManager->fire('user:whenUserHasRegistered', $command);
		$this->_repo->save((array)$command);
	}
}