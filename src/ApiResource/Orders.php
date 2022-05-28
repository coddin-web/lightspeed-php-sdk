<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Orders
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $orderId
     *
     * @return array
     * @throws ApiException
     */
    public function get($orderId = null, array $params = [])
    {
        if (!$orderId) {
            return $this->client->read('orders', $params);
        } else {
            return $this->client->read('orders/' . $orderId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('orders/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $orderId, array $fields): array
    {
        $fields = ['order' => $fields];

        return $this->client->update('orders/' . $orderId, $fields);
    }
}
