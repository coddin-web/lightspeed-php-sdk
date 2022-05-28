<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTypes
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
        $fields = ['type' => $fields];

        return $this->client->create('types', $fields);
    }

    /**
     * @param int $typeId
     *
     * @return array
     * @throws ApiException
     */
    public function get($typeId = null, array $params = [])
    {
        if (!$typeId) {
            return $this->client->read('types', $params);
        } else {
            return $this->client->read('types/' . $typeId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('types/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $typeId, array $fields): array
    {
        $fields = ['type' => $fields];

        return $this->client->update('types/' . $typeId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $typeId): array
    {
        return $this->client->delete('types/' . $typeId);
    }
}
