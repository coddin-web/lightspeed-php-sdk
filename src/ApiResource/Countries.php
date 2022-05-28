<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Countries
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $countryId
     *
     * @return array
     * @throws ApiException
     */
    public function get($countryId = null, array $params = [])
    {
        if (!$countryId) {
            return $this->client->read('countries', $params);
        } else {
            return $this->client->read('countries/' . $countryId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('countries/count', $params);
    }
}
