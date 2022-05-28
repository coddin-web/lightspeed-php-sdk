<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Orders;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceOrdersCredit
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $orderId, array $fields): array
    {
        $fields = ['credit' => $fields];

        return $this->client->create('orders/' . $orderId . '/credit', $fields);
    }
}
