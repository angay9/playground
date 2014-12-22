<?php
namespace Network\Statuses\Commanding;

use Network\Commanding\CommandHandlerInterface;
use Network\Statuses\StatusesRepository;


class PostStatusCommandHandler implements CommandHandlerInterface {
	
	private $_repo;

	public function __construct ()
	{
		$this->_repo = new StatusesRepository();
	}

	public function handle ($command)
	{
		$this->_repo->save($command);
	}
}