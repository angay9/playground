<?php
namespace Network\Presenters;

use Network\Presenters\Presenter;

class ProfilePresenter extends Presenter {

	public function avatar ($width = 220, $height = 220)
	{		
		$avatar = $this->_entity->getAvatar();
		
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $avatar) && !empty($avatar)) {
			return sprintf('<img src="%s" alt="" width="%s" height="%s" class="avatar img-thumbnail">', $avatar, $width, $height);	
		}
		return sprintf('<img src="%s" alt="" width="%s" height="%s" class="avatar img-thumbnail">', '/users/img/avatars/default-avatar.png', $width, $height);
		
	}

}