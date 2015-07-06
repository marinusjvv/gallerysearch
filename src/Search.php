<?php
namespace MarinusJvv\GallerySearch;

use MarinusJvv\GallerySearch\Validator;
use MarinusJvv\GallerySearch\Api\Caller;
use MarinusJvv\GallerySearch\Exceptions as Exceptions;

class Search 
{
    public function findPictures($search_string, $page)
    {
        try {
            Validator::validateSearchString($search_string);
        } catch (Exceptions\InvalidSearchStringException $e) {
            return $this->buildErrorResponse($e);
        }
        $caller = new Caller(
            API_URL,
            array(
                'method' => API_SEARCH_METHOD,
                'api_key' => API_KEY,
                'per_page' => 5,
                'page' => $page,
                'tags' => $search_string,
            )
        );
        try {
        	$response = new Response\XmlParser($caller->call());
        } catch (Exceptions\InvalidResponseXMLException $e) {
        	return $this->buildErrorResponse($e);
        }
        
        return array(
            'status' => 'success',
            'page_data' => $response->getPageData()->getOutputData(),
            'pictures_data' => $response->getPicturesData(),
        );
    }
    
    private function buildErrorResponse(\Exception $e)
    {
    	return array('status' => 'error', 'message' => $e->getMessage());
    }
}
