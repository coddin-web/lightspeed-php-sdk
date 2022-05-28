<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Types;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTypesAttributes
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
        $fields = ['typesAttribute' => $fields];

        return $this->client->create('types/attributes', $fields);
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
            return $this->client->read('types/attributes', $params);
        } else {
            return $this->client->read('types/attributes/' . $relationId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('types/attributes/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('types/attributes/' . $relationId);
    }
}
