<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTags
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
        $fields = ['tag' => $fields];

        return $this->client->create('tags', $fields);
    }

    /**
     * @param int $tagId
     *
     * @return array
     * @throws ApiException
     */
    public function get($tagId = null, array $params = [])
    {
        if (!$tagId) {
            return $this->client->read('tags', $params);
        } else {
            return $this->client->read('tags/' . $tagId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('tags/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $tagId, array $fields): array
    {
        $fields = ['tag' => $fields];

        return $this->client->update('tags/' . $tagId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $tagId): array
    {
        return $this->client->delete('tags/' . $tagId);
    }
}
