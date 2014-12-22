<?php
namespace Network\Users;

interface UserRepositoryInterface {
	
	public function save(array $data);
}