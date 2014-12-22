<?php
namespace Network\Forms;

use Phalcon\Forms\Element\TextArea;

class StatusForm extends Form {
	protected $_rules = [
		'body' => 'required'
	];

	public function __construct ($entityName = null, $entityId = null)
	{
		parent::__construct($entityName, $entityId);
		parent::initialize();
	}

	public function initialize ()
	{
		
		$body = new TextArea('body');
		$this->add($body);
	}
}