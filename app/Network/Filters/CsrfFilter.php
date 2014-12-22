<?php

namespace Network\Filters;

class CsrfFilter extends Filter {
	
	public function filter ()
	{		
		if (!$this->request->isGet()) 
		{
			$tokenKey = $this->session->get('$PHALCON/CSRF/KEY$');
			
			$token = $this->security->getSessionToken();
			$requestData = $this->request->get();
			
			if (!isset($requestData[$tokenKey]) || !$this->security->checkToken($tokenKey, $requestData[$tokenKey])) 
			{
				throw new \Exception('Tokens mismatch');	
			}			
		}	
	}
}