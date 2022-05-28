<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShop
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @throws ApiException
     */
    public function get(): int|array
    {
        return $this->client->read('shop');
    }

    /**
     * @throws ApiException
     */
    public function update(array $fields): array
    {
        $fields = ['shop' => $fields];

        return $this->client->update('shop', $fields);
    }
}
