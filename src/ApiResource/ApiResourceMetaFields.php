<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceMetaFields
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
        $fields = ['metafield' => $fields];

        return $this->client->create('metafields', $fields);
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get($metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('metafields', $params);
        } else {
            return $this->client->read('metafields/' . $metafieldId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $metafieldId, array $fields): array
    {
        $fields = ['metafield' => $fields];

        return $this->client->update('metafields/' . $metafieldId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $metafieldId): array
    {
        return $this->client->delete('metafields/' . $metafieldId);
    }
}
