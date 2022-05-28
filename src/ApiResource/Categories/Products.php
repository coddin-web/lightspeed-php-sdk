<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Categories;

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
        $fields = ['categoriesProduct' => $fields];

        return $this->client->create('categories/products', $fields);
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws ApiException
     */
    public function get($relationId = null, array $params = [])
    {
        if (!$relationId) {
            return $this->client->read('categories/products', $params);
        } else {
            return $this->client->read('categories/products/' . $relationId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('categories/products/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('categories/products/' . $relationId);
    }
}
