<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceSubscriptions
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
        $fields = ['subscription' => $fields];

        return $this->client->create('subscriptions', $fields);
    }

    /**
     * @param int $subscriptionId
     *
     * @return array
     * @throws ApiException
     */
    public function get($subscriptionId = null, array $params = [])
    {
        if (!$subscriptionId) {
            return $this->client->read('subscriptions', $params);
        } else {
            return $this->client->read('subscriptions/' . $subscriptionId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('subscriptions/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $subscriptionId, array $fields): array
    {
        $fields = ['subscription' => $fields];

        return $this->client->update('subscriptions/' . $subscriptionId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $subscriptionId): array
    {
        return $this->client->delete('subscriptions/' . $subscriptionId);
    }
}
