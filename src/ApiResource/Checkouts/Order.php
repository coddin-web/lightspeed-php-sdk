<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Checkouts;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Order
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $checkoutId, array $fields): array
    {
        return $this->client->create('checkouts/' . $checkoutId . '/order', $fields);
    }
}
