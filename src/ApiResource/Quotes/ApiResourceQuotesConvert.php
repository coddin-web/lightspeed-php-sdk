<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Quotes;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceQuotesConvert
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
        $fields = ['order' => $fields];

        return $this->client->create('quotes/' . $quoteId . '/convert', $fields);
    }
}
