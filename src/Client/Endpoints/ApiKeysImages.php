<?php

namespace SeoImage\Client\Endpoints;

/**
 * @package SeoImage\Client\Endpoints
 */
class ApiKeysImages extends AbstractEndpoint
{
    const RESOURCE_NAME = "api_keys_images";

    /**
     * @param string $keyProject
     * @return string
     */
    protected function getPostRoute($keyProject)
    {
        return sprintf('/v1/api_keys/%s/images', $keyProject);
    }

    /**
     * @param string $apiKey
     * @param array $data
     * @param array $query Query parameters
     * @return array
     */
    public function generateReportFromUrl($apiKey, $data, $query = null)
    {
        if (! isset($data['url'])) {
            throw new \Exception("Miss URL params");
        }

        return $this->makeRequest('POST', $this->getPostRoute($apiKey), $data, $query);
    }

    /**
     * @param string $apiKey
     * @param array $data
     * @param array $query Query parameters
     * @return array
     */
    public function generateReportFromFile($apiKey, $data, $query = null)
    {
        if (! isset($data['filePath'])) {
            throw new \Exception("Miss filePath params");
        }

        $filePath = $data['filePath'];
        unset($data['filePath']);

        $infoFile = mime_content_type($filePath);

        $cFile = curl_file_create($filePath);
        $cFile->setMimeType($infoFile);

        $data['imageFile'] = $cFile;

        return $this->makeRequest('FILE', $this->getPostRoute($apiKey), $data, $query);
    }
}
