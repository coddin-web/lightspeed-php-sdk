<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Variants;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceVariantsMovements
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $movementId
     *
     * @return array
     * @throws ApiException
     */
    public function get($movementId = null, array $params = [])
    {
        if (!$movementId) {
            return $this->client->read('variants/movements', $params);
        } else {
            return $this->client->read('variants/movements/' . $movementId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('variants/movements/count', $params);
    }
}
