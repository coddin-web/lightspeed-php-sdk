<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Quotes;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceQuotesPaymentMethods
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function get(int $quoteId): int|array
    {
        return $this->client->read('quotes/' . $quoteId . '/paymentmethods');
    }

    /**
     *
     * @throws ApiException
     */
    public function count($quoteId, array $params = []): int|array
    {
        return $this->client->read('quotes/' . $quoteId . '/paymentmethods/count', $params);
    }
}
