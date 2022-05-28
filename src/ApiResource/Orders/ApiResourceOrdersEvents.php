<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Orders;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceOrdersEvents
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $eventId
     *
     * @return array
     * @throws ApiException
     */
    public function get($eventId = null, array $params = [])
    {
        if (!$eventId) {
            return $this->client->read('orders/events', $params);
        } else {
            return $this->client->read('orders/events/' . $eventId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('orders/events/count', $params);
    }
}
