<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Categories\Products;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Bulk
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @throws ApiException
     */
    public function create(array $fields): array
    {
        $fields = ['categoriesProduct' => $fields];

        return $this->client->create('categories/products/bulk', $fields);
    }
}
