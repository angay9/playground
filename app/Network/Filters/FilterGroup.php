<?php
namespace Network\Filters;

use Phalcon\Mvc\User\Plugin;

class FilterGroup extends Plugin {
	
	private $_filters;

	public function __construct ()
	{
		$this->add('auth', new AuthFilter())
			->add('csrf', new CsrfFilter());
	}

	public function add ($key, FilterInterface $filter)
	{
		if (!isset($this->_filters[$key])) {
			$this->_filters[$key] = $filter;
		
		}	
		return $this;	
	}

	public function remove ($key)
	{
		if (!isset($this->_filters[$key])) {
			unset($this->_filters[$key]);
		
		}	
		return $this;	
	}

	public function __get ($property)
	{
		if (isset($this->_filters[$property])) 
		{
			return $this->_filters[$property];
		}
	}


}