<?php

use Network\Forms\StatusForm;
use Network\Forms\DeleteStatusForm;
use Network\Statuses\Status;
use Network\Statuses\Querying\GetStatusesQuery;
use Network\Statuses\Commanding\PostStatusCommand;
use Network\Statuses\Commanding\DeleteStatusCommand;
use Network\Users\UserRepository;

class ProfileController extends ControllerBase 
{
	private $_userRepo;

	public function initialize ()
	{
		parent::initialize();
		$this->_form = new StatusForm();	
		$this->_deleteStatusForm = new DeleteStatusForm();
		$this->_userRepo = new Network\Users\UserRepository();	
	}

	/**
	 * Display all statuses
	 * @return void
	 */
	public function indexAction ()
	{
		$statusId = $this->dispatcher->getParam('id');
		$this->view->form = $this->_form;
				 	 
		$this->view->form = $this->_form->bindEntity('Network\Statuses\Status', $statusId);
		
		$this->view->deleteStatusForm = $this->_deleteStatusForm;		
		$statuses = $this->queryBus->execute(new GetStatusesQuery([
			'orderBy' => 'updatedAt',
			'orderDir' => 'desc',
			'limit' => 10,
			'username' => $this->dispatcher->getParam('username'),
			'currentPage' => $this->dispatcher->getParam('page') ? (int)$this->dispatcher->getParam('page') : 1
		]));

		$this->view->statuses = $statuses;
		$this->view->user = $this->_userRepo->findByUsername($this->dispatcher->getParam('username'));

	}

	/**
	 * Create a status
	 * @return  void
	 */
	public function storeAction ()
	{
		$input = $this->request->getPost();
		
		if ($this->_form->isValid($input)) {
			$this->commandBus->execute(new PostStatusCommand($this->request->get('id'), $input['body']));
			$this->flash->success('Status has been saved!');
		}

		return $this->response->redirect(['for' => 'profile_route', 'username' => $this->auth->getUser()->getUsername()]);
	}

	/**
	 * Delete a user status
	 * @return void
	 */
	public function destroyAction ()
	{
		$input = $this->request->getPost();
		
		if ($this->_deleteStatusForm->isValid($input)) {
			$this->commandBus->execute(new DeleteStatusCommand(['id' => $input['id']]));
			$this->flash->success('A status has been deleted');
		}
		return $this->response->redirect(['for' => 'profile_route', 'username' => $this->auth->getUser()->getUsername()]);

	}

}