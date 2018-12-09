<?php

namespace SeoImage\Client\Endpoints;

/**
 * @package SeoImage\Client\Endpoints
 */
class ReportImages extends AbstractEndpoint
{
    const RESOURCE_NAME = "report_images";

    public function generate($filePath, $query = null)
    {
        $cFile = curl_file_create($filePath);

        $result = $this->makeRequest('FILE', '/v1/images', [
            'imageFile' => $cFile
        ], $query);
        var_dump($result);
        die;
    }
}
