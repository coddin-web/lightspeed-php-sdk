<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceGroupsCustomers
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
        $fields = ['groupsCustomer' => $fields];

        return $this->client->create('groups/customers', $fields);
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws ApiException
     */
    public function get($relationId = null, array $params = [])
    {
        if (!$relationId) {
            return $this->client->read('groups/customers', $params);
        } else {
            return $this->client->read('groups/customers/' . $relationId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('groups/customers/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('groups/customers/' . $relationId);
    }
}
