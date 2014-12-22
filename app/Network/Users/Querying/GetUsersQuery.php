<?php
namespace Network\Users\Querying;

class GetUsersQuery {

	public $orderBy;

	public $orderDir;

	public $limit;

	public $currentPage;

	public function __construct (array $conditions)
	{
		$this->orderBy = $conditions['orderBy'];
		$this->orderDir = $conditions['orderDir'];
		$this->limit = $conditions['limit'];
		$this->currentPage = $conditions['currentPage'];
	}

}