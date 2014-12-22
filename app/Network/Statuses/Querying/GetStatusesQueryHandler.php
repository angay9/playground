<?php
namespace Network\Statuses\Querying;

use Network\Querying\QueryHandlerInterface;
use Network\Statuses\StatusesRepository;

class GetStatusesQueryHandler implements QueryHandlerInterface {
	
	private $_repo;

	public function __construct ()
	{
		$this->_repo = new StatusesRepository();
	}
	
	public function handle ($query)
	{
		return $this->_repo->getPaginated($query);
	}
} 