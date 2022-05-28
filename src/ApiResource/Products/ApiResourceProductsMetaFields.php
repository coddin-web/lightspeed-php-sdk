<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Products;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceProductsMetaFields
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $productId, array $fields): array
    {
        $fields = ['productMetafield' => $fields];

        return $this->client->create('products/' . $productId . '/metafields', $fields);
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $productId, $metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('products/' . $productId . '/metafields', $params);
        } else {
            return $this->client->read('products/' . $productId . '/metafields/' . $metafieldId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $productId, array $params = []): int|array
    {
        return $this->client->read('products/' . $productId . '/metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $productId, int $metafieldId, array $fields): array
    {
        $fields = ['productMetafield' => $fields];

        return $this->client->update('products/' . $productId . '/metafields/' . $metafieldId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $productId, int $metafieldId): array
    {
        return $this->client->delete('products/' . $productId . '/metafields/' . $metafieldId);
    }
}
