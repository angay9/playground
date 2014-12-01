<?php

use Network\Users\User as User;
use Network\Forms\RegistrationForm as RegistrationForm;
use Network\Validators\Validator as Validator;

class SessionController extends ControllerBase
{

	/**
	 * Registration Form
	 * @var Network\Forms\RegistrationForm
	 */
	private $_form;
	

	public function initialize ()
	{
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
		$input['createdAt'] = date('Y-m-d H:i:s');
		$input['updatedAt'] = date('Y-m-d H:i:s');

		$this->_form->setValidationRules([
			'name' => 'required',
			'username' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|confirmed:passwordConfirmation',
		]);
		
		if ($this->_form->isValid($input)) {
			// Passed
																															
			$user = new User();
			$user->assign($input);
			$res = $user->save();
			$this->flash->success('Your account has been created. Welcome!');
				
			return $this->response->redirect(['for' => 'user_profile', 'username' => $user->getUsername()]);
		}
		
		return $this->response->redirect(['for' => 'register_route']);						
		
	}

}