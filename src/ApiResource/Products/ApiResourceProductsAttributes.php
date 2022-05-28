<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Products;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceProductsAttributes
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $attributeId Set to null for bulk update.
     *
     * @return array
     * @throws ApiException
     */
    public function update(int $productId, int $attributeId, array $fields)
    {
        if (!$attributeId) {
            $fields = ['productAttributes' => $fields];

            return $this->client->update('products/' . $productId . '/attributes', $fields);
        } else {
            $fields = ['productAttribute' => $fields];

            return $this->client->update('products/' . $productId . '/attributes/' . $attributeId, $fields);
        }
    }

    /**
     * @param int $attributeId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $productId, $attributeId = null, array $params = [])
    {
        if (!$attributeId) {
            return $this->client->read('products/' . $productId . '/attributes', $params);
        } else {
            return $this->client->read('products/' . $productId . '/attributes/' . $attributeId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $productId, array $params = []): int|array
    {
        return $this->client->read('products/' . $productId . '/attributes/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $productId, int $attributeId): array
    {
        return $this->client->delete('products/' . $productId . '/attributes/' . $attributeId);
    }
}
