<?php
namespace Network\Users\Querying;

use Network\Querying\QueryHandlerInterface;
use Network\Users\UserRepository;

class GetUsersQueryHandler implements QueryHandlerInterface {

	private $_repo;

	public function __construct ()
	{
		$this->_repo = new UserRepository();
	}

	public function handle ($command)
	{
		return $this->_repo->getPaginated($command);
	}

}
