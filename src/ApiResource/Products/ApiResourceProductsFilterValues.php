<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Products;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceProductsFilterValues
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function get(int $productId): int|array
    {
        return $this->client->read('products/' . $productId . '/filtervalues');
    }

    /**
     * @throws ApiException
     */
    public function count(int $productId, array $params = []): int|array
    {
        return $this->client->read('products/' . $productId . '/filtervalues/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $productId, array $fields): array
    {
        $fields = ['productFiltervalue' => $fields];

        return $this->client->create('products/' . $productId . '/filtervalues', $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $productId, int $filterValueId): array
    {
        return $this->client->delete('products/' . $productId . '/filtervalues/' . $filterValueId);
    }
}
