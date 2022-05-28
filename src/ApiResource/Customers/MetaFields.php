<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Customers;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class MetaFields
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @throws ApiException
     */
    public function create(int $customerId, array $fields): array
    {
        $fields = ['customerMetafield' => $fields];

        return $this->client->create('customers/' . $customerId . '/metafields', $fields);
    }

    /**
     * @throws ApiException
     */
    public function get(int $customerId, ?int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId) {
            return $this->client->read('customers/' . $customerId . '/metafields', $params);
        } else {
            return $this->client->read('customers/' . $customerId . '/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $customerId, array $params = []): int
    {
        return (int) $this->client->read('customers/' . $customerId . '/metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $customerId, int $metaFieldId, array $fields): array
    {
        $fields = ['customerMetafield' => $fields];

        return $this->client->update('customers/' . $customerId . '/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $customerId, int $metaFieldId): array
    {
        return $this->client->delete('customers/' . $customerId . '/metafields/' . $metaFieldId);
    }
}
