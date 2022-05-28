<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceDiscounts
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
        $fields = ['discount' => $fields];

        return $this->client->create('discounts', $fields);
    }

    /**
     * @param int $discountId
     *
     * @return array
     * @throws ApiException
     */
    public function get($discountId = null, array $params = [])
    {
        if (!$discountId) {
            return $this->client->read('discounts', $params);
        } else {
            return $this->client->read('discounts/' . $discountId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('discounts/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $discountId, array $fields): array
    {
        $fields = ['discount' => $fields];

        return $this->client->update('discounts/' . $discountId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $discountId): array
    {
        return $this->client->delete('discounts/' . $discountId);
    }
}
