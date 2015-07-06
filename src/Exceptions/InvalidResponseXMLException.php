<?php
namespace MarinusJvv\GallerySearch\Exceptions;
class InvalidResponseXMLException extends \Exception
{
	public function __construct($message = 'There was a communication error. Please try again later')
	{
		parent::__construct($message);
	}
}

