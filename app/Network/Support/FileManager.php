<?php
namespace Network\Support;

use Phalcon\Mvc\User\Component;
use Phalcon\Http\Request\File;

class FileManager extends Component {

	private $_errors = [];
	
	public function save(File $file, $destination) 
	{
		if ($file) 
		{
			return $file->moveTo($destination . '/' . time() . $file->getName());
		}

		return false;
	}

}
