<?php
namespace Network\Presenters;

trait PresentableTrait {

	protected $_presenterInstance;

	public function present ()
	{
		if (!$this->_presenter || !class_exists($this->_presenter)) {
			throw new Exception('Please set the protected property to present your path');
		}

		if (!$this->_presenterInstance)
		{
			$this->_presenterInstance = new $this->_presenter($this);
		}

		return $this->_presenterInstance; 
	}
}