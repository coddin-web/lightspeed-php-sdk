<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Brands;

use CURLFile;
use Lightspeed\ApiClient;
use Lightspeed\ApiException;
use RuntimeException;
use SplFileObject;
use function Lightspeed\str_contains;

final class ApiResourceBrandsImage
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $brandId, array $fields): array
    {
        if (!str_contains((string) $fields['attachment'], 'http')) {
            try {
                $attachment = $fields['attachment'];

                new SplFileObject($attachment);

                $mimetype = mime_content_type($attachment);
                $fields['attachment'] = new CURLFile($attachment, $mimetype);

                $options = [
                    'header' => 'multipart/form-data',
                ];

                return $this->client->create('brands/' . $brandId . '/image', $fields, $options);
            } catch (RuntimeException) {
                // Silence is golden.
            }
        }

        $fields = ['brandImage' => $fields];

        return $this->client->create('brands/' . $brandId . '/image', $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function get(int $brandId): int|array
    {
        return $this->client->read('brands/' . $brandId . '/image');
    }

    /**
     * @throws ApiException
     */
    public function delete(int $brandId): array
    {
        return $this->client->delete('brands/' . $brandId . '/image');
    }
}
