<?php
namespace Network\Filters;

use Phalcon\Mvc\User\Plugin;

abstract class Filter extends Plugin implements FilterInterface {

	/**
	 * Actions that filter is performed on
	 * @var array
	 */
	protected $_actions = array();

	/**
	 * Handles the filtering
	 * @return Network\Filters\FilterInterface
	 */
	public abstract function filter ();
	/**
	 * Sets the actions a filter is used on
	 * @param  array|null $actions actions
	 * @return Network\Filters\FilterInterface
	 */
	public function on (array $actions)
	{
		$this->_actions = array_map('strtolower', $this->_actions);
		$actions = array_map('strtolower', $actions);
		
		foreach ($actions as $action) {

			if (in_array($action, $this->_actions)) {
				throw new \Exception("Action $action is already in a list");
			}	

			$this->_actions[] = $action;
			
		}
		
		return $this;
	}


}