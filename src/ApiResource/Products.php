<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Products
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
        $fields = ['product' => $fields];

        return $this->client->create('products', $fields);
    }

    /**
     * @param int $productId
     *
     * @return array
     * @throws ApiException
     */
    public function get($productId = null, array $params = [])
    {
        if (!$productId) {
            return $this->client->read('products', $params);
        } else {
            return $this->client->read('products/' . $productId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('products/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $productId, array $fields): array
    {
        $fields = ['product' => $fields];

        return $this->client->update('products/' . $productId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $productId): array
    {
        return $this->client->delete('products/' . $productId);
    }
}
