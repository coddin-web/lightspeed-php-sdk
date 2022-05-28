<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Brands
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
        $fields = ['brand' => $fields];

        return $this->client->create('brands', $fields);
    }

    /**
     * @param int $brandId
     *
     * @return array
     * @throws ApiException
     */
    public function get($brandId = null, array $params = [])
    {
        if (!$brandId) {
            return $this->client->read('brands', $params);
        } else {
            return $this->client->read('brands/' . $brandId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('brands/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $brandId, array $fields): array
    {
        $fields = ['brand' => $fields];

        return $this->client->update('brands/' . $brandId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $brandId): array
    {
        return $this->client->delete('brands/' . $brandId);
    }
}
