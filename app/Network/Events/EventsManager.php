<?php
namespace Network\Events;

use \Phalcon\Events\Manager;

class EventsManager extends Manager {
	
	public function initialize ()
	{		
		$this->attach('user', new \Network\Users\UserEventsListener());			
	}
} 