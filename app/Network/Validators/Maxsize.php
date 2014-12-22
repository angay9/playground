<?php

namespace Network\Validators;

use Phalcon\Validation\Validator as PhalconValidator,
    Phalcon\Validation\ValidatorInterface,
    Phalcon\Validation\Message,
    Phalcon\Validation\Exception as ValidationException;

/**
 * Maxsize Validator
 * 
 */
class Maxsize extends PhalconValidator implements ValidatorInterface {

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
		
		$file = $validator->getValue($attribute);
		$message = $this->getOption('message');
		$maxsize = intval($this->getOption('maxsize'));

		// Required validator's responsibility to check if file is required		
		if (is_null($file) || empty($file)) {
			
			return true;
		}

		$size = $this->_getFileSize($file);
		
		if ($size > $maxsize) {
			// Failed			
			if (!$message) {
				// Generic message
				$message = 'The file is too big.';
			}

			$validator->appendMessage(new Message($message, $attribute, 'File'));
			
		    return false;
		}
		
		return true;
	}

	private function _getFileSize ($file)
	{
		
		if ($file instanceof \Phalcon\Http\Request\File) {
			$size = $file->getSize();
		} else {
			// using $_FILES superglobal
			$size = $file['size'];
		}

		return $size;
	}
}