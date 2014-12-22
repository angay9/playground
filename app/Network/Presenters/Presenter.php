<?php
namespace Network\Presenters;

abstract class Presenter {
	/**
	 * Model
	 * @var Phalcon\Mvc\Model
	 */
	protected $_entity;

	/**
	 * Constructor
	 * @param Phalcon\Mvc\Model $entity model class
	 */
	public function __construct($entity) {

		$this->_entity = $entity;
	}

	/**
	 * Magic get method. Call presenter's method if available, if not - get entity's property
	 * @param  $property
	 * @return mixed
	 */
	public function __get ($property)
	{
		$method = 'get' . ucwords($property);
		
		if (method_exists($this, $property)) {
			
			return $this->{$property}();
		}
				
		// Call getter method if  exists
		if (method_exists($this->_entity, $method)) {
			
			return $this->_entity->{$method}();
		}

		return $this->_entity->{$property};
	}



}
