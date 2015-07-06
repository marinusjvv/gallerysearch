<?php
namespace MarinusJvv\GallerySearch\Response;

use MarinusJvv\GallerySearch\Response;
use MarinusJvv\GallerySearch\Exceptions\InvalidResponseXMLException;

class XmlParser 
{
    private $pageData;
    private $picturesData = array();
    
    public function __construct($response_string)
    {
        $parsed = $this->parseRawStringToXML($response_string);
        $this->processResponse($parsed);
    }
    
    public function getPageData()
    {
        return $this->pageData;
    }
    
    public function getPicturesData()
    {
        return $this->picturesData;
    }
    
    private function parseRawStringToXML($string)
    {
        return @simplexml_load_string($string);
    }
    
    private function processResponse($parsedXML)
    {
        if ($this->isInvalidResponseXML($parsedXML) === true) {
            throw new InvalidResponseXMLException();
        }
        if ($this->isFailedResponseXML((string)$parsedXML['stat']) === true) {
        	throw new InvalidResponseXMLException((string)$parsedXML->err['msg']);
        }
        $this->pageData = new PageData($parsedXML);
        foreach ($parsedXML->photos->photo as $photo) {
        	$picture = new PictureData($photo);
            $this->picturesData[] = $picture->getData();
        }
    }
    
    private function isInvalidResponseXML($parsedXML)
    {
        return $parsedXML === false
            || empty($parsedXML['stat']) === true;
    }
    
    private function isFailedResponseXML($response)
    {
    	return $response !== 'ok';
    }
}
