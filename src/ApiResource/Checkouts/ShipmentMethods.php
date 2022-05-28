<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Checkouts;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ShipmentMethods
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function get(int $checkoutId): int|array
    {
        return $this->client->read('checkouts/' . $checkoutId . '/shipment_methods');
    }
}
