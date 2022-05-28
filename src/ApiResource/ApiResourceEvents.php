<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceEvents
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
            return $this->client->read('events', $params);
        } else {
            return $this->client->read('events/' . $eventId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('events/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $eventId): array
    {
        return $this->client->delete('events/' . $eventId);
    }
}
