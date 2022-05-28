<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTaxes
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
        $fields = ['tax' => $fields];

        return $this->client->create('taxes', $fields);
    }

    /**
     * @param int $taxId
     *
     * @return array
     * @throws ApiException
     */
    public function get($taxId = null, array $params = [])
    {
        if (!$taxId) {
            return $this->client->read('taxes', $params);
        } else {
            return $this->client->read('taxes/' . $taxId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('taxes/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $taxId, array $fields): array
    {
        $fields = ['tax' => $fields];

        return $this->client->update('taxes/' . $taxId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $taxId): array
    {
        return $this->client->delete('taxes/' . $taxId);
    }
}
