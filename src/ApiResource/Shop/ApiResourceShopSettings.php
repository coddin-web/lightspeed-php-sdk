<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Shop;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShopSettings
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
        return $this->client->read('shop/settings');
    }
}
