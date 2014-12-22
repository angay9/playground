<?php
namespace Network\Querying;

class QueryBus 
{
	public function execute ($command)
	{
		$handler = get_class($command);
		$handler = $handler . 'Handler';

		if (!class_exists($handler)) {
			throw new \Exception("Query handler {$handler} class does not exist");
		}
		
		$result = (new $handler())->handle($command);
		return $result;
	}
}