<?php

use Network\Users\User as User;
use Network\Users\Commanding\RegisterUserCommand;
use Network\Forms\RegistrationForm as RegistrationForm;
use Network\Validators\Validator as Validator;
use Network\Commanding\CommandBus as CommandBus;

class SessionController extends ControllerBase {

	/**
	 * Registration Form
	 * @var Network\Forms\RegistrationForm
	 */
	private $_form;
	
	/**
	 * initialize
	 * @return  void
	 */
	public function initialize ()
	{
		parent::initialize();
		$this->_form = new RegistrationForm();
	}

	/**
	 * Display a registration form
	 * @return void
	 */
	public function createAction ()
	{
		$this->view->form = $this->_form;
	}

	/**
	 * Create new user
	 * @return void
	 */
	public function storeAction ()
	{		
		$input = $this->request->getPost();
		
		if ($this->_form->isValid($input)) {
			// Passed
			$this->commandBus->execute(new RegisterUserCommand($input['name'], $input['username'], $input['email'], $input['password']));

			$this->flash->success('Your account has been created. Welcome. Please sign in. ');
							
			return $this->response->redirect('');
		}
		
		return $this->response->redirect(['for' => 'register_route']);								
	}

	public function destroyAction ()
	{
		$this->auth->deleteIdentity();		
		return $this->response->redirect('');
	}

}