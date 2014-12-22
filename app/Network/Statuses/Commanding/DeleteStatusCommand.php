<?php
namespace Network\Statuses\Commanding;

class DeleteStatusCommand {

	public $id;

	public function __construct ($conditions)
	{
		$this->id = $conditions['id'];
	}
}