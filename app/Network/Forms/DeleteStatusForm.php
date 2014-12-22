<?php
namespace Network\Forms;

use Phalcon\Forms\Element\Hidden;

class DeleteStatusForm extends Form {

	protected $_rules = [
		'id' => 'required'
	];

	public function __construct ($entityName = null, $entityId = null)
	{
		parent::__construct($entityName, $entityId);
		parent::initialize();
	}
}