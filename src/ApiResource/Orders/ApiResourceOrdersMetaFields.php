<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Orders;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceOrdersMetaFields
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $orderId, array $fields): array
    {
        $fields = ['orderMetafield' => $fields];

        return $this->client->create('orders/' . $orderId . '/metafields', $fields);
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $orderId, $metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('orders/' . $orderId . '/metafields', $params);
        } else {
            return $this->client->read('orders/' . $orderId . '/metafields/' . $metafieldId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $orderId, array $params = []): int|array
    {
        return $this->client->read('orders/' . $orderId . '/metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $orderId, int $metafieldId, array $fields): array
    {
        $fields = ['orderMetafield' => $fields];

        return $this->client->update('orders/' . $orderId . '/metafields/' . $metafieldId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $orderId, int $metafieldId): array
    {
        return $this->client->delete('orders/' . $orderId . '/metafields/' . $metafieldId);
    }
}
