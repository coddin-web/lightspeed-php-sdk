<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Products;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceProductsRelations
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
        $fields = ['productRelation' => $fields];

        return $this->client->create('products/' . $productId . '/relations', $fields);
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $productId, $relationId = null, array $params = [])
    {
        if (!$relationId) {
            return $this->client->read('products/' . $productId . '/relations', $params);
        } else {
            return $this->client->read('products/' . $productId . '/relations/' . $relationId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $productId, array $params = []): int|array
    {
        return $this->client->read('products/' . $productId . '/relations/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $productId, int $relationId, array $fields): array
    {
        $fields = ['productRelation' => $fields];

        return $this->client->update('products/' . $productId . '/relations/' . $relationId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $productId, int $relationId): array
    {
        return $this->client->delete('products/' . $productId . '/relations/' . $relationId);
    }
}
