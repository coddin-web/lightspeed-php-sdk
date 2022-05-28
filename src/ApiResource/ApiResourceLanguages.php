<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceLanguages
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $languageId
     *
     * @return array
     * @throws ApiException
     */
    public function get($languageId = null, array $params = [])
    {
        if (!$languageId) {
            return $this->client->read('languages', $params);
        } else {
            return $this->client->read('languages/' . $languageId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('languages/count', $params);
    }
}
