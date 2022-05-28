<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Shop;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShopScripts
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
        $fields = ['shopScript' => $fields];

        return $this->client->create('shop/scripts', $fields);
    }

    /**
     * @param int $scriptId
     *
     * @return array
     * @throws ApiException
     */
    public function get($scriptId = null, array $params = [])
    {
        if (!$scriptId) {
            return $this->client->read('shop/scripts', $params);
        } else {
            return $this->client->read('shop/scripts/' . $scriptId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('shop/scripts/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $scriptId, array $fields): array
    {
        $fields = ['shopScript' => $fields];

        return $this->client->update('shop/scripts/' . $scriptId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $scriptId): array
    {
        return $this->client->delete('shop/scripts/' . $scriptId);
    }
}
