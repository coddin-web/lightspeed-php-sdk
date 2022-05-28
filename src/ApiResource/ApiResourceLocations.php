<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceLocations
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $locationId
     *
     * @return array
     * @throws ApiException
     */
    public function get($locationId = null, array $params = [])
    {
        if (!$locationId) {
            return $this->client->read('locations', $params);
        } else {
            return $this->client->read('locations/' . $locationId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('locations/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function create(array $fields): array
    {
        $fields = ['locations' => $fields];

        return $this->client->create('locations', $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $locationId, array $fields): array
    {
        $fields = ['location' => $fields];

        return $this->client->update('locations/' . $locationId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $locationId): array
    {
        return $this->client->delete('locations/' . $locationId);
    }
}
