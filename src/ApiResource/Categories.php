<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Categories
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
        $fields = ['category' => $fields];

        return $this->client->create('categories', $fields);
    }

    /**
     * @param int $categoryId
     *
     * @return array
     * @throws ApiException
     */
    public function get($categoryId = null, array $params = [])
    {
        if (!$categoryId) {
            return $this->client->read('categories', $params);
        } else {
            return $this->client->read('categories/' . $categoryId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('categories/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $categoryId, array $fields): array
    {
        $fields = ['category' => $fields];

        return $this->client->update('categories/' . $categoryId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $categoryId): array
    {
        return $this->client->delete('categories/' . $categoryId);
    }
}
