<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

	public function initialize ()
	{
		// Filtering
		$actions = [
			'Profile::index',
			'Profile::store',
			'Session::destroy',
			'Session::create',
			'Session::store',
			'Statuses::index',
		];
		$this->filters->auth->on($actions)->filter();
		$this->filters->csrf->on(['*'])->filter();
		
		// auth		
		$this->view->currentUser = $this->auth->getUser();

	}

}
