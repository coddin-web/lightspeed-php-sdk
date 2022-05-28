<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Variants;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceVariantsMetafields
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $variantId, array $fields): array
    {
        $fields = ['variantMetafield' => $fields];

        return $this->client->create('variants/' . $variantId . '/metafields', $fields);
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $variantId, $metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('variants/' . $variantId . '/metafields', $params);
        } else {
            return $this->client->read('variants/' . $variantId . '/metafields/' . $metafieldId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $variantId, array $params = []): int|array
    {
        return $this->client->read('variants/' . $variantId . '/metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $variantId, int $metafieldId, array $fields): array
    {
        $fields = ['variantMetafield' => $fields];

        return $this->client->update('variants/' . $variantId . '/metafields/' . $metafieldId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $variantId, int $metafieldId): array
    {
        return $this->client->delete('variants/' . $variantId . '/metafields/' . $metafieldId);
    }
}
