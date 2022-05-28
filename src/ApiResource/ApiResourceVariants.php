<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceVariants
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
        $fields = ['variant' => $fields];

        return $this->client->create('variants', $fields);
    }

    /**
     * @param int $variantId
     *
     * @return array
     * @throws ApiException
     */
    public function get($variantId = null, array $params = [])
    {
        if (!$variantId) {
            return $this->client->read('variants', $params);
        } else {
            return $this->client->read('variants/' . $variantId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('variants/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $variantId, array $fields): array
    {
        $fields = ['variant' => $fields];

        return $this->client->update('variants/' . $variantId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $variantId): array
    {
        return $this->client->delete('variants/' . $variantId);
    }
}
