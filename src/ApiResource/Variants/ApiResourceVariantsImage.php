<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Variants;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceVariantsImage
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $variantId, array $fields): array
    {
        $fields = ['variantImage' => $fields];

        return $this->client->create('variants/' . $variantId . '/image', $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function get(int $variantId): int|array
    {
        return $this->client->read('variants/' . $variantId . '/image');
    }

    /**
     * @throws ApiException
     */
    public function delete(int $variantId): array
    {
        return $this->client->delete('variants/' . $variantId . '/image');
    }
}
