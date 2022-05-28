<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceAttributes
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
        $fields = ['attribute' => $fields];

        return $this->client->create('attributes', $fields);
    }

    /**
     * @param int $attributeId
     *
     * @return array
     * @throws ApiException
     */
    public function get($attributeId = null, array $params = [])
    {
        if (!$attributeId) {
            return $this->client->read('attributes', $params);
        } else {
            return $this->client->read('attributes/' . $attributeId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('attributes/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $attributeId, array $fields): array
    {
        $fields = ['attribute' => $fields];

        return $this->client->update('attributes/' . $attributeId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $attributeId): array
    {
        return $this->client->delete('attributes/' . $attributeId);
    }
}
