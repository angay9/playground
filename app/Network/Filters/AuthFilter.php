<?php
namespace Network\Filters;

use Phalcon\Mvc\User\Plugin;

class AuthFilter extends Filter {
	
	public function filter ()
	{
		$action = strtolower(sprintf('%s::%s', $this->dispatcher->getControllerName(), $this->dispatcher->getActionName()));
		
		if (empty($this->_actions) || 
			in_array($action, $this->_actions) || 
			$this->_actions[0] == '*') {
			
			if ($this->auth->isGuest()) {
				
				$this->view->disable();
				$this->response->redirect('');
				return $this;
			}
		}

		return $this;
	}

}
