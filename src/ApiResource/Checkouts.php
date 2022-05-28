<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Checkouts
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
        return $this->client->create('checkouts', $fields);
    }

    /**
     * @param int $checkoutId
     *
     * @return array
     * @throws ApiException
     */
    public function get($checkoutId = null, array $params = [])
    {
        if (!$checkoutId) {
            return $this->client->read('checkouts', $params);
        } else {
            return $this->client->read('checkouts/' . $checkoutId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('checkouts/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $checkoutId, array $fields): array
    {
        return $this->client->update('checkouts/' . $checkoutId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $checkoutId): array
    {
        return $this->client->delete('checkouts/' . $checkoutId);
    }
}
