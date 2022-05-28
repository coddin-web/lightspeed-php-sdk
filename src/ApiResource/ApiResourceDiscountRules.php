<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceDiscountRules
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
        $fields = ['discountRule' => $fields];

        return $this->client->create('discountrules', $fields);
    }

    /**
     * @param int $discountruleId
     *
     * @return array
     * @throws ApiException
     */
    public function get($discountruleId = null, array $params = [])
    {
        if (!$discountruleId) {
            return $this->client->read('discountrules', $params);
        } else {
            return $this->client->read('discountrules/' . $discountruleId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('discountrules/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $discountruleId, array $fields): array
    {
        $fields = ['discountRule' => $fields];

        return $this->client->update('discountrules/' . $discountruleId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $discountruleId): array
    {
        return $this->client->delete('discountrules/' . $discountruleId);
    }
}
