<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Filters
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
        $fields = ['filter' => $fields];

        return $this->client->create('filters', $fields);
    }

    /**
     * @param int $filterId
     *
     * @return array
     * @throws ApiException
     */
    public function get($filterId = null, array $params = [])
    {
        if (!$filterId) {
            return $this->client->read('filters', $params);
        } else {
            return $this->client->read('filters/' . $filterId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('filters/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $filterId, array $fields): array
    {
        $fields = ['filter' => $fields];

        return $this->client->update('filters/' . $filterId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $filterId): array
    {
        return $this->client->delete('filters/' . $filterId);
    }
}
