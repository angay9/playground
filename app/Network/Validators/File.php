<?php

namespace Network\Validators;

use Phalcon\Validation\Validator as PhalconValidator,
    Phalcon\Validation\ValidatorInterface,
    Phalcon\Validation\Message,
    Phalcon\Validation\Exception as ValidationException;

/**
 * File Validator
 * 
 */
class File extends PhalconValidator implements ValidatorInterface {

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
		$mimes = $this->getOption('mimes');

		// Required validator's responsibility to check if file is required		
		if (is_null($file) || empty($file)) {

			return true;
		}

		$fileType = $this->_getFileType($file);

		if (!in_array($fileType, $mimes)) {
			// Failed			
			if (!$message) {
				// Generic message
				$message = 'The file is of a required type.';
			}

			$validator->appendMessage(new Message($message, $attribute, 'File'));
			
		    return false;
		}

		return true;			
		
	}

	private function _getFileType ($file)
	{
		if ($file instanceof \Phalcon\Http\Request\File) {
			$fileType = $file->getRealType();
		} else {
			// using $_FILES superglobal
			$fileType = $file['type'];
		}
		return $fileType;
	}
}