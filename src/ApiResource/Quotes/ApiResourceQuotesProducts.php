<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Quotes;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceQuotesProducts
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $quoteId, array $fields): array
    {
        $fields = ['quoteProduct' => $fields];

        return $this->client->create('quotes/' . $quoteId . '/products', $fields);
    }

    /**
     * @param int $productId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $quoteId, $productId = null, array $params = [])
    {
        if (!$productId) {
            return $this->client->read('quotes/' . $quoteId . '/products', $params);
        } else {
            return $this->client->read('quotes/' . $quoteId . '/products/' . $productId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $quoteId, array $params = []): int|array
    {
        return $this->client->read('quotes/' . $quoteId . '/products/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $quoteId, int $productId, array $fields): array
    {
        $fields = ['quoteProduct' => $fields];

        return $this->client->update('quotes/' . $quoteId . '/products/' . $productId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $quoteId, int $productId): array
    {
        return $this->client->delete('quotes/' . $quoteId . '/products/' . $productId);
    }
}
