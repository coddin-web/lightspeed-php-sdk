<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Checkouts;

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
    public function create(int $checkoutId, array $fields): array
    {
        return $this->client->create('checkouts/' . $checkoutId . '/products', $fields);
    }

    /**
     * @throws ApiException
     */
    public function get(int $checkoutId, ?int $productId = null, $params = []): array
    {
        if (!$productId) {
            return $this->client->read('checkouts/' . $checkoutId . '/products', $params);
        } else {
            return $this->client->read('checkouts/' . $checkoutId . '/products/' . $productId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $checkoutId, array $params = []): int|array
    {
        return $this->client->read('checkouts/' . $checkoutId . '/products/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function update(int $checkoutId, int $productId, array $fields): array
    {
        return $this->client->update('checkouts/' . $checkoutId . '/products/' . $productId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $checkoutId, int $productId): array
    {
        return $this->client->delete('checkouts/' . $checkoutId . '/products/' . $productId);
    }
}
