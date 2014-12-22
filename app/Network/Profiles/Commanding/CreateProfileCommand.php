<?php
namespace Network\Profiles\Commanding; 

use Phalcon\Http\Request\File;

class CreateProfileCommand {

	public $avatar;

	public function __construct ($data)
	{

		$this->avatar = $data['avatar'];
		
	}

}