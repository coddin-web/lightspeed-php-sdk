<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Taxes;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTaxesOverrides
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $taxId, array $fields): array
    {
        $fields = ['taxOverride' => $fields];

        return $this->client->create('taxes/' . $taxId . '/overrides', $fields);
    }

    /**
     * @param int $taxOverrideId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $taxId, $taxOverrideId = null, array $params = [])
    {
        if (!$taxOverrideId) {
            return $this->client->read('taxes/' . $taxId . '/overrides', $params);
        } else {
            return $this->client->read('taxes/' . $taxId . '/overrides/' . $taxOverrideId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $taxId, array $params = []): int|array
    {
        return $this->client->read('taxes/' . $taxId . '/overrides/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $taxId, int $taxOverrideId, array $fields): array
    {
        $fields = ['taxOverride' => $fields];

        return $this->client->update('taxes/' . $taxId . '/overrides/' . $taxOverrideId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $taxId, int $taxOverrideId): array
    {
        return $this->client->delete('taxes/' . $taxId . '/overrides/' . $taxOverrideId);
    }
}
