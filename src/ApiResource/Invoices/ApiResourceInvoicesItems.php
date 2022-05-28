<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Invoices;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceInvoicesItems
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $itemId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $invoiceId, $itemId = null, array $params = [])
    {
        if (!$itemId) {
            return $this->client->read('invoices/' . $invoiceId . '/items', $params);
        } else {
            return $this->client->read('invoices/' . $invoiceId . '/items/' . $itemId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $invoiceId, array $params = []): int|array
    {
        return $this->client->read('invoices/' . $invoiceId . '/items/count', $params);
    }
}
