<?php
namespace Network\Users;

use Phalcon\Mvc\User\Plugin;
use Network\Profiles\Profile;
use \Phalcon\Paginator\Adapter\Model as ModelPaginator;

class UserRepository extends Plugin implements UserRepositoryInterface {

	/**
	 * Saves a user
	 * @param  array  $data
	 * @return void
	 */
	public function save (array $data)
	{
		$user = new User();
		$user->profile = new Profile();
		return $user->save($data);
	}

	/**
	 * Gets paginated users
	 * @param  \Network\Users\Querying\GetUsersQuery $query
	 * @return \Phalcon\Paginator\Adapter\Model
	 */
	public function getPaginated ($query)
	{
		$users = User::find([
			'conditions' => 'id != ?1',
			'bind' => [1 => $this->auth->getUser()->getId()]
		]);

		$paginator = new ModelPaginator([
			'data' => $users,
			'limit' => $query->limit,
			'page' => $query->currentPage
		]);	
		
		$collection = $paginator->getPaginate();		
		return $collection;			
	}

	public function findByUsername ($username)
	{
		return User::findFirst(['conditions' => 'username = ?1', 'bind' => [1 => $username]]);
	}
}