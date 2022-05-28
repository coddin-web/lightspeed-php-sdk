<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Quotes;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceQuotesShippingMethods
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @throws ApiException
     */
    public function get(int $quoteId): int|array
    {
        return $this->client->read('quotes/' . $quoteId . '/shippingmethods');
    }

    /**
     * @throws ApiException
     */
    public function count(int $quoteId, array $params = []): int|array
    {
        return $this->client->read('quotes/' . $quoteId . '/shippingmethods/count', $params);
    }
}
