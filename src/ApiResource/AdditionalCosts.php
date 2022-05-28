<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class AdditionalCosts
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @throws ApiException
     */
    public function get(int $additionalCostId = null, array $params = []): array
    {
        if (!$additionalCostId) {
            return $this->client->read('additionalcosts', $params);
        }

        return $this->client->read('additionalcosts/' . $additionalCostId, $params);
    }

    /**
     * @throws ApiException
     */
    public function count(array $params = []): int
    {
        return (int) $this->client->read('additionalcosts/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function update(int $additionalCostId, array $fields): array
    {
        $fields = ['additionalCost' => $fields];

        return $this->client->update('additionalcosts/' . $additionalCostId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $additionalCostId): array
    {
        return $this->client->delete('additionalcosts/' . $additionalCostId);
    }
}
