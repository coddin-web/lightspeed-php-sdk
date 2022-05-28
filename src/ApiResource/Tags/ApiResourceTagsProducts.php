<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Tags;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTagsProducts
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
        $fields = ['tagsProduct' => $fields];

        return $this->client->create('tags/products', $fields);
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
            return $this->client->read('tags/products', $params);
        } else {
            return $this->client->read('tags/products/' . $relationId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('tags/products/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('tags/products/' . $relationId);
    }
}
