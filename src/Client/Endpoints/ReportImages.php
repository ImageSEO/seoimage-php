<?php

namespace SeoImage\Client\Endpoints;

/**
 * @package SeoImage\Client\Endpoints
 */
class ReportImages extends AbstractEndpoint
{
    const RESOURCE_NAME = "report_images";

    /**
     * @param string $filePath
     * @param array $query Query parameters
     * @return array
     */
    public function generateReport($filePath, $query = null)
    {
        $infoFile = mime_content_type($filePath);

        $cFile = curl_file_create($filePath);
        $cFile->setMimeType($infoFile);

        return $this->makeRequest('FILE', '/v1/images', [
            'imageFile' => $cFile
        ], $query);
    }
}
