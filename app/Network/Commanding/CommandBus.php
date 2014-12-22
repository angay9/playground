<?php
namespace Network\Commanding;

class CommandBus
{
	
	public function execute ($command)
	{
		$handler = get_class($command);
		$handler = $handler . 'Handler';

		if (!class_exists($handler)) {
			throw new \Exception("Command handler {$handler} class does not exist");
		}

		return (new $handler())->handle($command);
	}
}