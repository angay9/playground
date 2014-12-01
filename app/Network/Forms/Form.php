<?php

namespace Network\Forms;

use Phalcon\Forms\Element\Text as Text;
use Phalcon\Forms\Element\Password as Password;
use Phalcon\Forms\Form as PhalconForm;
use Phalcon\Validation;
use Phalcon\Validation\Message;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\ExclusionIn;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Between;
use Phalcon\Validation\Validator\Confirmation;
use Network\Validators\DateTime;
use Network\Validators\Uniqueness;
/**
 * Base form class that all forms should extend
 * 
 */

abstract class Form extends PhalconForm
{
	/**
	 * Validation rules
	 * @var array
	 */
	protected $_rules = [];

	public function initialize() 
	{
		$name = new Text('name');
		$username = new Text('username');
		$email = new Text('email');
		$password = new Password('password');
		$passwordConfirmation = new Password('passwordConfirmation');
		$this->add($name);
		$this->add($username);
		$this->add($email);
		$this->add($password);
		$this->add($passwordConfirmation);
	}

	/**
	 * Set up some validation rules
	 * @param array $rules validation rules
	 */
	public function setValidationRules (array $rules = null)
	{
		foreach ($rules as $field => $rules) 
		{
			$this->_rules[$field] = explode('|', $rules);
			
		}

		foreach ($this->_rules as $field => $rules) 
		{
			foreach ($rules as $rule) 
			{
				if (strpos($rule, ':')) {
					$rulename = substr($rule, 0, strpos($rule, ':'));
				} else {
					$rulename = substr($rule, 0);
				}
				$formField = $this->get($field);
				switch ($rulename) {

					case 'required':
						$formField->addValidator(new PresenceOf (array (
							'message' => "The field {$field} is required."
						)));
						break;

					case 'identical':
						$formField->addValidator(new Identical (array (
							'message' => "The field {$field} has to be identical to .",
							'value' => $this->getRuleArgs($rule)[0]
						)));
						break;

					case 'email':
						$formField->addValidator(new Email (array (
							'message' => "The field {$field} is not a valid email."
						)));
						break;

					case 'exclusion':
						$formField->addValidator(new ExclusionIn (array (
							'message' => "The field {$field} must not be A or B.",
							'domain' => $this->getRuleArgs($rule)
						)));
						break;

					case 'inclusion':
						$formField->addValidator(new InclusionIn (array (
							'message' => "The field {$field} must be A or B.",
							'domain' => $this->getRuleArgs($rule)
						)));
						break;

					case 'regex':
						$formField->addValidator(new Regex (array (
							'message' => "The field {$field} is invalid.",
							'pattern' => $this->getRuleArgs($rule)[0] 
						)));
						break;

					case 'strlen':
						$formField->addValidator(new StringLength (array (
							'min' => intval ($this->getRuleArgs($rule) [0]),
							'max' => intval ($this->getRuleArgs($rule) [1]),
							'messageMinimum' => 'We want more than just their initials',
							'messageMaximum' => 'We don\'t like really long names'
						)));
						break;

					case 'between':
						$formField->addValidator(new Between (array (
							'minimum' => intval ($this->getRuleArgs($rule) [0]),
							'maximum' => intval ($this->getRuleArgs($rule) [1]),
							'message' => 'The price must be between 0 and 100'
						)));
						break;

					case 'confirmed':

						$formField->addValidator(new Confirmation (array (
							'message' => 'Password doesn\'t match confirmation.',
							'with' => $this->getRuleArgs($rule) [0]
						)));

						break;

					case 'datetime':
						$formField->addValidator(new DateTime (array (
							'message' => "The field {$field} is not a valid datetime.",
							'format' => trim($this->getRuleArgs($rule)[0], '"')
						)));
						break;

					case 'unique':
						
						$formField->addValidator(new Uniqueness (array (
							'message' => "The field {$field} is already taken.",
							'table' => $this->getRuleArgs($rule)[0],
							'column' => $this->getRuleArgs($rule)[1]
						)));
						break;

					default:
						throw new \Exception("No validator exists for the specified rule {$rule}.");
						break;
				}
			}
		}	
	}

	/**
	 * Get arguments for a specified rule
	 * @param  string $rule rule name
	 * @return array  array of arguments for a rule
	 */
	private function getRuleArgs ($rule)
	{
		// Get the starting index of the argumnets. + 1 to omit the ":" sign
		$argsStartingIndex = strpos($rule, ':') + 1;
		
		// Get an array of args. Replace whitespace and get a substring	containig only arguments provided. Then explode it into an array	
		$args = explode(',', substr(str_replace(' ', '', $rule), $argsStartingIndex));

		return $args;
	}

	/**
	 * Display erorr messages for a form element
	 * 
	 * @param  string $fieldName Field name
	 * @return void
	 */
	public function messages ($fieldName)
	{	
		
		if ($this->flash->has($fieldName)) {
			$messages = implode("\r\n", $this->flash->getMessages($fieldName));
			echo nl2br($messages);
		}
	}

	/**
	 * Validate the form
	 * 
	 * @param  array   $data input data
	 * @return boolean return true if form is valid
	 */
	public function isValid ($data = null, $entity = null)
	{

		if (!parent::isValid($data)) {
			foreach ($this->getMessages() as $msg) {
				$this->flash->message($msg->getField(), $msg->getMessage());
			}
			return false;
		}
		return true;
	}

}