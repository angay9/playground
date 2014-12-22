<?php

use Network\Users\Querying\GetUsersQuery;

class MembersController extends ControllerBase {

	public function initialize ()
	{
		parent::initialize();
	}

	public function indexAction ()
	{
		$this->view->members = $this->queryBus->execute(new GetUsersQuery([
			'orderBy' => 'updatedAt',
			'orderDir' => 'desc',
			'limit' => 10,
			'username' => $this->dispatcher->getParam('username'),
			'currentPage' => $this->dispatcher->getParam('page') ? (int)$this->dispatcher->getParam('page') : 1
		]));
	}

}