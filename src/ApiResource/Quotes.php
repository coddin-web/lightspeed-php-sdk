<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Quotes
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
        $fields = ['quote' => $fields];

        return $this->client->create('quotes', $fields);
    }

    /**
     * @throws ApiException
     */
    public function get(?int $quoteId = null, array $params = []): array
    {
        if (!$quoteId) {
            return $this->client->read('quotes', $params);
        }

        return $this->client->read('quotes/' . $quoteId, $params);
    }

    /**
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('quotes/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $quoteId, array $fields): array
    {
        $fields = ['quote' => $fields];

        return $this->client->update('quotes/' . $quoteId, $fields);
    }
}
