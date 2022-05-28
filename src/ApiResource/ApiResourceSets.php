<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceSets
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
        $fields = ['set' => $fields];

        return $this->client->create('sets', $fields);
    }

    /**
     * @param int $setId
     *
     * @return array
     * @throws ApiException
     */
    public function get($setId = null, array $params = [])
    {
        if (!$setId) {
            return $this->client->read('sets', $params);
        } else {
            return $this->client->read('sets/' . $setId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('sets/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $setId, array $fields): array
    {
        $fields = ['set' => $fields];

        return $this->client->update('sets/' . $setId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $setId): array
    {
        return $this->client->delete('sets/' . $setId);
    }
}
