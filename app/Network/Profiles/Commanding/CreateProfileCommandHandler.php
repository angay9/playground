<?php
namespace Network\Profiles\Commanding;

use Network\Commanding\CommandHandlerInterface;
use Network\Profiles\ProfileRepository;

class CreateProfileCommandHandler implements CommandHandlerInterface {

	private $_repo;

	public function __construct ()
	{
		$this->_repo = new ProfileRepository();
	}

	public function handle ($command)
	{
		$this->_repo->save($command);
	}
}