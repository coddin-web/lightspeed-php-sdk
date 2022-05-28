<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Shop;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShopTracking
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
        $fields = ['shopTracking' => $fields];

        return $this->client->create('shop/tracking', $fields);
    }

    /**
     * @param int $trackingId
     *
     * @return array
     * @throws ApiException
     */
    public function get($trackingId = null, array $params = [])
    {
        if (!$trackingId) {
            return $this->client->read('shop/tracking', $params);
        } else {
            return $this->client->read('shop/tracking/' . $trackingId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('shop/tracking/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $trackingId, array $fields): array
    {
        $fields = ['shopTracking' => $fields];

        return $this->client->update('shop/tracking/' . $trackingId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $trackingId): array
    {
        return $this->client->delete('shop/tracking/' . $trackingId);
    }
}
