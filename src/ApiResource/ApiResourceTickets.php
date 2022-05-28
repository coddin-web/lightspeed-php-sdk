<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTickets
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
        $fields = ['ticket' => $fields];

        return $this->client->create('tickets', $fields);
    }

    /**
     * @param int $ticketId
     *
     * @return array
     * @throws ApiException
     */
    public function get($ticketId = null, array $params = [])
    {
        if (!$ticketId) {
            return $this->client->read('tickets', $params);
        } else {
            return $this->client->read('tickets/' . $ticketId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('tickets/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $ticketId, array $fields): array
    {
        $fields = ['ticket' => $fields];

        return $this->client->update('tickets/' . $ticketId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $ticketId): array
    {
        return $this->client->delete('tickets/' . $ticketId);
    }
}
