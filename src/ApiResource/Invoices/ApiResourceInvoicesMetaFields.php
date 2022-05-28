<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Invoices;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceInvoicesMetaFields
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $invoiceId, array $fields): array
    {
        $fields = ['invoiceMetafield' => $fields];

        return $this->client->create('invoices/' . $invoiceId . '/metafields', $fields);
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $invoiceId, $metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('invoices/' . $invoiceId . '/metafields', $params);
        } else {
            return $this->client->read('invoices/' . $invoiceId . '/metafields/' . $metafieldId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $invoiceId, array $params = []): int|array
    {
        return $this->client->read('invoices/' . $invoiceId . '/metafields/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $invoiceId, int $metafieldId, array $fields): array
    {
        $fields = ['invoiceMetafield' => $fields];

        return $this->client->update('invoices/' . $invoiceId . '/metafields/' . $metafieldId, $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(int $invoiceId, int $metafieldId): array
    {
        return $this->client->delete('invoices/' . $invoiceId . '/metafields/' . $metafieldId);
    }
}
