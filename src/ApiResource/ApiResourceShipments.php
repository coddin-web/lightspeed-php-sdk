<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShipments
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $shipmentId
     *
     * @return array
     * @throws ApiException
     */
    public function get($shipmentId = null, array $params = [])
    {
        if (!$shipmentId) {
            return $this->client->read('shipments', $params);
        } else {
            return $this->client->read('shipments/' . $shipmentId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('shipments/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $shipmentId, array $fields): array
    {
        $fields = ['shipment' => $fields];

        return $this->client->update('shipments/' . $shipmentId, $fields);
    }
}
