<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Variants;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceVariantsBulk
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @throws ApiException
     */
    public function update(array $fields): array
    {
        $fields = ['variant' => $fields];

        return $this->client->update('variants/bulk', $fields);
    }
}
