<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Invoices
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $invoiceId
     *
     * @return array
     * @throws ApiException
     */
    public function get($invoiceId = null, array $params = [])
    {
        if (!$invoiceId) {
            return $this->client->read('invoices', $params);
        } else {
            return $this->client->read('invoices/' . $invoiceId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('invoices/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $invoiceId, array $fields): array
    {
        $fields = ['invoice' => $fields];

        return $this->client->update('invoices/' . $invoiceId, $fields);
    }
}
