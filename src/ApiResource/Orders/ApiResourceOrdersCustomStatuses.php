<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Orders;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceOrdersCustomStatuses
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
        $fields = ['customStatus' => $fields];

        return $this->client->create('orders/customstatuses', $fields);
    }

    /**
     * @param int $customstatusId
     *
     * @return array
     * @throws ApiException
     */
    public function get($customstatusId = null, array $params = [])
    {
        if (!$customstatusId) {
            return $this->client->read('orders/customstatuses', $params);
        } else {
            return $this->client->read('orders/customstatuses/' . $customstatusId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('orders/customstatuses/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $customstatusId, array $fields): array
    {
        $fields = ['customStatus' => $fields];

        return $this->client->update('orders/customstatuses/' . $customstatusId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $customstatusId): array
    {
        return $this->client->delete('orders/customstatuses/' . $customstatusId);
    }
}
