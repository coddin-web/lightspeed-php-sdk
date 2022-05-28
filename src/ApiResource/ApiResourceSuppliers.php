<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceSuppliers
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
        $fields = ['supplier' => $fields];

        return $this->client->create('suppliers', $fields);
    }

    /**
     * @param int $supplierId
     *
     * @return array
     * @throws ApiException
     */
    public function get($supplierId = null, array $params = [])
    {
        if (!$supplierId) {
            return $this->client->read('suppliers', $params);
        } else {
            return $this->client->read('suppliers/' . $supplierId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('suppliers/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $supplierId, array $fields): array
    {
        $fields = ['supplier' => $fields];

        return $this->client->update('suppliers/' . $supplierId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $supplierId): array
    {
        return $this->client->delete('suppliers/' . $supplierId);
    }
}
