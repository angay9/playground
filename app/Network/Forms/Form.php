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
use Phalcon\Forms\Element\Hidden;
use Network\Validators\DateTime;
use Network\Validators\Uniqueness;
use Network\Validators\File;
use Network\Validators\Maxsize;

/**
 * Base form class that all forms should extend
 * 
 */
abstract class Form extends PhalconForm
{
	/**
	 * Hidden csrf token field
	 * @var Phalcon\Forms\Element\Hidden
	 */
	protected static $_csrf;

	/**
	 * Validation rules
	 * @var array
	 */
	protected $_rules = [];

	public function __construct ($entityName = null, $entityId = null)
	{
		$this->add(new Hidden('id'));
		$this->bindEntity($entityName, $entityId);
		parent::__construct($this->getEntity());
	}

	public function initialize ()
	{
		$this->addCsrf();	
	}

	/**
	 * Set up some validation rules
	 * @param array $rules validation rules
	 */
	private function _setValidationRules ()
	{	
		foreach ($this->_rules as $field => $rule) 
		{
			$this->_rules[$field] = explode('|', $rule);
				
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

					case 'file':
						$formField->addValidator(new File (array (
							'message' => "The file is of a required type.",
							'mimes' => $this->getRuleArgs($rule)
						)));
						break;

					case 'maxsize':
						$args = $this->getRuleArgs($rule)[0];
						$formField->addValidator(new Maxsize (array (
							'message' => 'The file is too big and cannot exceed a size of ' . $args . ' bytes .',
							'maxsize' => $args
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
			$messages = implode("<br>", $this->flash->getMessages($fieldName));
			echo $messages;
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
		$this->_setValidationRules();
		
		if (!parent::isValid($data)) {
			foreach ($this->getMessages() as $msg) {
				$this->flash->message($msg->getField(), $msg->getMessage());
			}
			return false;
		}

		return true;
	}
	/**
	 * Adds csrf hidden field to form
	 */
	public function addCsrf ()
	{
		if (is_null(static::$_csrf)) {
			static::$_csrf = new Hidden('csrf', [
				'name' => $this->security->getTokenKey(),
				'value' => $this->security->getToken()
			]);
		}
		
		$this->add(static::$_csrf);
	}

	public function bindEntity ($entityName = null, $entityId = null)
	{
		if (($entityName && $entityId) || !is_null($this->getEntity())) {
			if (class_exists($entityName)) {
				$entity = $entityName::findFirst((int) $entityId);
				if ($entity) {
					$this->setEntity($entity);
					$this->get('id')->setAttribute('id', $entity->getId());
				}	
			}
			
		}

		return $this;
	}

}