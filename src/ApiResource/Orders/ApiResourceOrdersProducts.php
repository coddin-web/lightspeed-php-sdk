<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Orders;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceOrdersProducts
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $productId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $orderId, $productId = null, array $params = [])
    {
        if (!$productId) {
            return $this->client->read('orders/' . $orderId . '/products', $params);
        } else {
            return $this->client->read('orders/' . $orderId . '/products/' . $productId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $orderId, array $params = []): int|array
    {
        return $this->client->read('orders/' . $orderId . '/products/count', $params);
    }
}
