<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceDeliveryDates
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
        $fields = ['deliverydate' => $fields];

        return $this->client->create('deliverydates', $fields);
    }

    /**
     * @throws ApiException
     */
    public function get(?int $deliveryDateId = null, array $params = []): array
    {
        if (!$deliveryDateId) {
            return $this->client->read('deliverydates', $params);
        }

        return $this->client->read('deliverydates/' . $deliveryDateId, $params);
    }

    /**
     * @throws ApiException
     */
    public function count(array $params = []): int
    {
        return (int) $this->client->read('deliverydates/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function update(int $deliveryDateId, array $fields): array
    {
        $fields = ['deliverydate' => $fields];

        return $this->client->update('deliverydates/' . $deliveryDateId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $deliveryDateId): array
    {
        return $this->client->delete('deliverydates/' . $deliveryDateId);
    }
}
