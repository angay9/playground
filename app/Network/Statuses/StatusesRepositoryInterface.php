<?php
namespace Network\Statuses;

interface StatusesRepositoryInterface {


	public function save ($command);

	public function getPaginated ($query);

	public function deleteStatus ($command);
}