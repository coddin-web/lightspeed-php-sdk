<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Shipments;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShipmentsProducts
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
    public function get(int $shipmentId, $productId = null, array $params = [])
    {
        if (!$productId) {
            return $this->client->read('shipments/' . $shipmentId . '/products', $params);
        } else {
            return $this->client->read('shipments/' . $shipmentId . '/products/' . $productId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $shipmentId, array $params = []): int|array
    {
        return $this->client->read('shipments/' . $shipmentId . '/products/count', $params);
    }
}
