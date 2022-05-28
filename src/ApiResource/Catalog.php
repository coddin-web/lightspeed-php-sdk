<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Catalog
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
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
            return $this->client->read('catalog', $params);
        } else {
            return $this->client->read('catalog/' . $productId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('catalog/count', $params);
    }
}
