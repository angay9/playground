<?php
namespace Network\Statuses;

use Network\Users\User;
use Phalcon\Mvc\User\Plugin;
use \Phalcon\Paginator\Adapter\Model as ModelPaginator;

class StatusesRepository extends Plugin implements StatusesRepositoryInterface {
	
	/**
	 * Save a status
	 * @param  Network\Statuses\Commanding\PostStatusCommand $command 
	 * @return void
	 */
	public function save ($command)
	{
		$user = $this->auth->getUser();
		
		if (!$command->id) {
			// Insert
			$status = new Status();
			
		} else {
			// Update
			$status = Status::findFirst($command->id);
		}
		if ($status) {
			$status->body = $command->body;
			$status->setUserId($user->getId());											
			$status->save();				
		}
		
	}


	/**
	 * Gets paginated statuses
	 * @param  Network\Statuses\Querying\GetStatusesQuery $query
	 * @return stdClass
	 */
	public function getPaginated ($query)
	{
		$user = User::findFirstByUsername($query->username);
		
		$statuses = $user->getStatuses(['order' => 'updatedAt DESC']);
		if ($statuses) {
			$paginator = new ModelPaginator([
				'data' => $statuses,
				'limit' => $query->limit,
				'page' => $query->currentPage
			]);				
			$collection = $paginator->getPaginate();

			return $collection;
		}		
	}

	/**
	 * Deletes a status
	 * @param  Network\Statuses\Commanding\DeleteStatusCommand $command
	 * @return void
	 */
	public function deleteStatus ($command)
	{
		
		$status = Status::findFirstById($command->id);		
		if ($status) {	
			$status->delete();
		}
	}
}