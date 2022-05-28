<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use CURLFile;
use Lightspeed\ApiClient;
use Lightspeed\ApiException;
use RuntimeException;
use SplFileObject;
use function Lightspeed\str_contains;

final class ApiResourceFiles
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @throws ApiException
     */
    public function create(array $fields): array
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

                return $this->client->create('files', $fields, $options);
            } catch (RuntimeException) {
                // Silence is golden.
            }
        }

        $fields = ['file' => $fields];

        return $this->client->create('files', $fields);
    }

    /**
     * @param int $fileId
     *
     * @return array
     * @throws ApiException
     */
    public function get($fileId = null, array $params = [])
    {
        if (!$fileId) {
            return $this->client->read('files', $params);
        } else {
            return $this->client->read('files/' . $fileId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('files/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $fileId, array $fields): array
    {
        $fields = ['file' => $fields];

        return $this->client->update('files/' . $fileId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $fileId): array
    {
        return $this->client->delete('files/' . $fileId);
    }
}
