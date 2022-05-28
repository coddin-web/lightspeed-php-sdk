<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Shop;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShopMetaFields
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
        $fields = ['shopMetafield' => $fields];

        return $this->client->create('shop/metafields', $fields);
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get($metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('shop/metafields', $params);
        } else {
            return $this->client->read('shop/metafields/' . $metafieldId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('shop/metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $metafieldId, array $fields): array
    {
        $fields = ['shopMetafield' => $fields];

        return $this->client->update('shop/metafields/' . $metafieldId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $metafieldId): array
    {
        return $this->client->delete('shop/metafields/' . $metafieldId);
    }
}
