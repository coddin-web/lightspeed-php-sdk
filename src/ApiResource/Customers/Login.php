<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Customers;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Login
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $customerId, array $fields): array
    {
        $fields = ['customerLogin' => $fields];

        return $this->client->create('customers/' . $customerId . '/login', $fields);
    }
}
