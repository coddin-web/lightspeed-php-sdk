<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Shipments;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShipmentsMetaFields
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $shipmentId, array $fields): array
    {
        $fields = ['shipmentMetafield' => $fields];

        return $this->client->create('shipments/' . $shipmentId . '/metafields', $fields);
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $shipmentId, $metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('shipments/' . $shipmentId . '/metafields', $params);
        } else {
            return $this->client->read('shipments/' . $shipmentId . '/metafields/' . $metafieldId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $shipmentId, array $params = []): int|array
    {
        return $this->client->read('shipments/' . $shipmentId . '/metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $shipmentId, int $metafieldId, array $fields): array
    {
        $fields = ['shipmentMetafield' => $fields];

        return $this->client->update('shipments/' . $shipmentId . '/metafields/' . $metafieldId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $shipmentId, int $metafieldId): array
    {
        return $this->client->delete('shipments/' . $shipmentId . '/metafields/' . $metafieldId);
    }
}
