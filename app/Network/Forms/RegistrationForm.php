<?php

namespace Network\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;
use Network\Validators\DateTime;
use Network\Validators\Uniqueness;
use Network\Forms\Form as Form;

class RegistrationForm extends Form {
	
	public function initialize ()
	{
		$action = $this->router->getRouteByName('register_route');		
		$this->setAction($action);

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
