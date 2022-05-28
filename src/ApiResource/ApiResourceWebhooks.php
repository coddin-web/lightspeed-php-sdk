<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceWebhooks
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
        $fields = ['webhook' => $fields];

        return $this->client->create('webhooks', $fields);
    }

    /**
     * @param int $webhookId
     *
     * @return array
     * @throws ApiException
     */
    public function get($webhookId = null, array $params = [])
    {
        if (!$webhookId) {
            return $this->client->read('webhooks', $params);
        } else {
            return $this->client->read('webhooks/' . $webhookId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('webhooks/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $webhookId, array $fields): array
    {
        $fields = ['webhook' => $fields];

        return $this->client->update('webhooks/' . $webhookId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $webhookId): array
    {
        return $this->client->delete('webhooks/' . $webhookId);
    }
}
