<?php
namespace MarinusJvv\GallerySearch;

use MarinusJvv\GallerySearch\Validator;
use MarinusJvv\GallerySearch\Api\Caller;
use MarinusJvv\GallerySearch\Exceptions\InvalidSearchStringException;

class Search 
{
    public function findPictures($search_string, $page)
    {
        try {
            Validator::validateSearchString($search_string);
        } catch (InvalidSearchStringException $e) {
            return array('status' => 'error', 'message' => $e->getMessage());
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
        $response = new Response\XmlParser($caller->call());
        return array(
            'status' => 'success',
            'page_data' => $response->getPageData()->getOutputData(),
            'pictures_data' => $response->getPicturesData(),
        );
    }
}
