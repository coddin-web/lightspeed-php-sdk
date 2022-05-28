<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Customers
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
        $fields = ['customer' => $fields];

        return $this->client->create('customers', $fields);
    }

    /**
     * @param int $customerId
     *
     * @return array
     * @throws ApiException
     */
    public function get($customerId = null, array $params = [])
    {
        if (!$customerId) {
            return $this->client->read('customers', $params);
        } else {
            return $this->client->read('customers/' . $customerId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('customers/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $customerId, array $fields): array
    {
        $fields = ['customer' => $fields];

        return $this->client->update('customers/' . $customerId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $customerId): array
    {
        return $this->client->delete('customers/' . $customerId);
    }
}
