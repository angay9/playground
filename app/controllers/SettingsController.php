<?php

use Network\Forms\ProfileSettingsForm;
use Network\Profiles\Commanding\CreateProfileCommand;

class SettingsController extends ControllerBase {

	private $_profileSettingsForm;


	public function initialize ()
	{
		parent::initialize();
		$this->_profileSettingsForm = new ProfileSettingsForm();
	}
	
	public function indexAction () {
		$this->view->form = $this->_profileSettingsForm;

	}

	public function storeAction ()
	{
		
		$input = $this->request->getPost();
		if (count($this->request->getUploadedFiles()) > 0) { 
			$input['avatar'] = $this->request->getUploadedFiles()[0]; 
		}
		
		if ($this->_profileSettingsForm->isValid($input)) {

			$this->commandBus->execute(new CreateProfileCommand($input));
			$this->flash->success('Profile settings have been saved');
		}

		return $this->response->redirect(['for' => 'settings_route', 'username' => $this->auth->getUser()->getUsername()]);
	}

}