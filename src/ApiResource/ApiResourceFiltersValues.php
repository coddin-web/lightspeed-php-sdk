<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceFiltersValues
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $filterValueId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $filterId, $filterValueId = null, array $params = [])
    {
        if (!$filterValueId) {
            return $this->client->read('filters/' . $filterId . '/values', $params);
        } else {
            return $this->client->read('filters/' . $filterId . '/values/' . $filterValueId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $filterId, array $params = []): int|array
    {
        return $this->client->read('filters/' . $filterId . '/values/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $filterId, array $fields): array
    {
        $fields = ['filterValue' => $fields];

        return $this->client->create('filters/' . $filterId . '/values', $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $filterId, int $filterValueId, array $fields): array
    {
        $fields = ['filterValue' => $fields];

        return $this->client->update('filters/' . $filterId . '/values/' . $filterValueId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $filterId, int $filterValueId): array
    {
        return $this->client->delete('filters/' . $filterId . '/values/' . $filterValueId);
    }
}
