<?php

use Network\Forms\LoginForm as LoginForm;

class SigninController extends ControllerBase {
	
	/**
	 * Login Form
	 * @var Network\Forms\LoginForm
	 */
	private $_form;

	/**
	 * initialize controller
	 * @return void
	 */
	public function initialize ()
	{
		parent::initialize();
		$this->_form = new LoginForm();
	}

	/**
	 * Display a login form
	 * @return void
	 */
	public function createAction ()
	{
		$this->view->form = $this->_form;
		$this->view->render('signin', 'create');
	}

	public function storeAction ()
	{				
		$input = $this->request->getPost();
				
		if ($this->_form->isValid($input)) {
			// Passed
		
			if ($this->auth->attempt($input)) {
				$this->flash->success('Welcome back!');
				return $this->response->redirect(['for' => 'profile_route', 'username' => $input['username']]);
			}
		}
		
		$this->flash->error('No users with these credentials were found.');
		return $this->response->redirect(['for' => 'login_route']);

	}
}