<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Tickets;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTicketsMessages
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $ticketId, array $fields): array
    {
        $fields = ['ticketMessage' => $fields];

        return $this->client->create('tickets/' . $ticketId . '/messages', $fields);
    }

    /**
     * @param int $messageId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $ticketId, $messageId = null, array $params = [])
    {
        if (!$messageId) {
            return $this->client->read('tickets/' . $ticketId . '/messages', $params);
        } else {
            return $this->client->read('tickets/' . $ticketId . '/messages/' . $messageId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $ticketId, array $params = []): int|array
    {
        return $this->client->read('tickets/' . $ticketId . '/messages/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $ticketId, int $messageId, array $fields): array
    {
        $fields = ['ticketMessage' => $fields];

        return $this->client->update('tickets/' . $ticketId . '/messages/' . $messageId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $ticketId, int $messageId): array
    {
        return $this->client->delete('tickets/' . $ticketId . '/messages/' . $messageId);
    }
}
