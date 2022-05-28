<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\ShippingMethods;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShippingMethodsCountries
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
    public function get(int $shippingmethodId, $countryId = null, array $params = [])
    {
        if (!$countryId) {
            return $this->client->read('shippingmethods/' . $shippingmethodId . '/countries', $params);
        } else {
            return $this->client->read('shippingmethods/' . $shippingmethodId . '/countries/' . $countryId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $shippingmethodId, array $params = []): int|array
    {
        return $this->client->read('shippingmethods/' . $shippingmethodId . '/countries/count', $params);
    }
}
