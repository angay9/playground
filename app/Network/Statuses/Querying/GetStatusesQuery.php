<?php
namespace Network\Statuses\Querying;

class GetStatusesQuery {
	
	public $orderBy;

	public $orderDir;

	public $limit;

	public $currentPage;

	public $username;

	public function __construct (array $conditions)
	{
		$this->orderBy = $conditions['orderBy'];
		$this->orderDir = $conditions['orderDir'];
		$this->limit = $conditions['limit'];
		$this->currentPage = $conditions['currentPage'];
		$this->username = $conditions['username'];
	}	
} 