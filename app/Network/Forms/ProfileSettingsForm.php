<?php
namespace Network\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\File;

class ProfileSettingsForm extends Form {
		
	protected $_rules = [
		'avatar' => 'required|file:image/png,image/jpeg|maxsize:10000'
	];

	public function __construct ($entityName = null, $entityId = null)
	{
		parent::__construct($entityName, $entityId);
		parent::initialize();
	}

	public function initialize ()
	{
		$avatar = new File('avatar', [
			'class' => 'form-control',
			'accept' => 'image/*'
		]);
		
		$this->add($avatar);
	}

}