<?php
namespace Network\Commanding;


interface CommandHandlerInterface {
	public function handle ($command);
}