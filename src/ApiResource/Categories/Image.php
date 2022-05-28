<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Categories;

use SplFileObject;
use CURLFile;
use RuntimeException;
use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Image
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $categoryId, array $fields): array
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

                return $this->client->create('categories/' . $categoryId . '/image', $fields, $options);
            } catch (RuntimeException) {
                // Silence is golden.
            }
        }

        $fields = ['categoryImage' => $fields];

        return $this->client->create('categories/' . $categoryId . '/image', $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function get(int $categoryId): int|array
    {
        return $this->client->read('categories/' . $categoryId . '/image');
    }

    /**
     * @throws ApiException
     */
    public function delete(int $categoryId): array
    {
        return $this->client->delete('categories/' . $categoryId . '/image');
    }
}
