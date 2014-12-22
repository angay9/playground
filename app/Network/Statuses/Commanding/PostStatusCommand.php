<?php
namespace Network\Statuses\Commanding;

class PostStatusCommand {
	
	public $id;

	public $body;

	public function __construct($id = null, $body) {
		$this->id = $id;
		$this->body = $body;
	}
}