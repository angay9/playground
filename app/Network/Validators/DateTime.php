<?php

namespace Network\Validators;

use Phalcon\Validation\Validator as PhalconValidator,
    Phalcon\Validation\ValidatorInterface,
    Phalcon\Validation\Message;

/**
 * DateTime Validator
 * 
 */
class DateTime extends PhalconValidator implements ValidatorInterface {

	/**
	 * Constructor
	 * @param array $options Params passed to the validator (message, format)
	 */
	public function __construct ($options = null)
	{
		parent::__construct($options);
		$this->setOption('cancelOnFail', true);
	}

	/**
	 * Perform the validation
	 * @param Phalcon\Validation $validator
	 * @param string $attribute Name of the attribute to validate
	 * @return boolean True if validation passed, otherwise false
	 */
	public function validate ($validator, $attribute)
	{
		$date = $validator->getValue($attribute);
		$message = $this->getOption('message');
		
		// If no format provided, fallback to the default		
		$format = !is_null($this->getOption('format')) ? $this->getOption('format') : 'Y-m-d H:i:s';
		
		$dateTime = \DateTime::createFromFormat($format, $date);
		
		
		$errors = \DateTime::getLastErrors();
		/** Prevents unexpected behaviour
		* @see http://stackoverflow.com/questions/10120643/php-datetime-createfromformat-functionality/10120725#10120725
		*
		*/
		if (!$dateTime || !empty($errors['warning_count'])) {
			// Failed
			
			if (!$message) {
				// Generic message
				$message = 'The date is not valid';
			}
			$validator->appendMessage(new Message($message, $attribute, 'Date'));
			
		    return false;
		}
		
		return true;
	}
}