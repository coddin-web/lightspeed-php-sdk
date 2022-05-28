<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Products;

use CURLFile;
use Lightspeed\ApiClient;
use Lightspeed\ApiException;
use RuntimeException;
use SplFileObject;
use function Lightspeed\str_contains;

final class ApiResourceProductsImages
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $productId, array $fields): array
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

                return $this->client->create('products/' . $productId . '/images', $fields, $options);
            } catch (RuntimeException) {
                // Silence is golden.
            }
        }

        $fields = ['productImage' => $fields];

        return $this->client->create('products/' . $productId . '/images', $fields);
    }

    /**
     * @param int $imageId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $productId, $imageId = null, array $params = [])
    {
        if (!$imageId) {
            return $this->client->read('products/' . $productId . '/images', $params);
        } else {
            return $this->client->read('products/' . $productId . '/images/' . $imageId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $productId, array $params = []): int|array
    {
        return $this->client->read('products/' . $productId . '/images/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $productId, int $imageId, array $fields): array
    {
        $fields = ['productImage' => $fields];

        return $this->client->update('products/' . $productId . '/images/' . $imageId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $productId, int $imageId): array
    {
        return $this->client->delete('products/' . $productId . '/images/' . $imageId);
    }
}
