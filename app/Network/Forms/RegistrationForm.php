<?php

namespace Network\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;
use Network\Validators\DateTime;
use Network\Validators\Uniqueness;


class RegistrationForm extends Form {
	
	protected $_rules = [
		'name' => 'required',
		'username' => 'required',
		'email' => 'required|email|unique:users,email',
		'password' => 'required|confirmed:passwordConfirmation',
	];

	public function __construct ($entityName = null, $entityId = null)
	{
		parent::__construct($entityName, $entityId);
		parent::initialize();
	}

	
	public function initialize ()
	{				
		
		$name = new Text('name');
		$this->add($name);

		$username = new Text('username');
		$this->add($username);

		$email = new Text('email');
		$this->add($email);

		$password = new Password('password');
		$this->add($password);

		$passwordConfirmation = new Password('passwordConfirmation');
		$this->add($passwordConfirmation);

	}
}
