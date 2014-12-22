<?php
namespace Network\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;
use Network\Validators\DateTime;
use Network\Validators\Uniqueness;


class LoginForm extends Form {
	
	protected $_rules = [
		'username' => 'required',
		'password' => 'required'
	];

	public function __construct ($entityName = null, $entityId = null)
	{
		parent::__construct($entityName, $entityId);
		parent::initialize();
	}

	public function initialize ()
	{		
		
		$username = new Text('username');
		$this->add($username);

		$password = new Password('password');
		$this->add($password);
	}
}
