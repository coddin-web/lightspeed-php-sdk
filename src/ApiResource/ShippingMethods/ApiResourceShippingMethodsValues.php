<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\ShippingMethods;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShippingMethodsValues
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $valueId
     *
     * @return array
     * @throws ApiException
     */
    public function get(int $shippingmethodId, $valueId = null, array $params = [])
    {
        if (!$valueId) {
            return $this->client->read('shippingmethods/' . $shippingmethodId . '/values', $params);
        } else {
            return $this->client->read('shippingmethods/' . $shippingmethodId . '/values/' . $valueId, $params);
        }
    }

    /**
     * @throws ApiException
     */
    public function count(int $shippingmethodId, array $params = []): int|array
    {
        return $this->client->read('shippingmethods/' . $shippingmethodId . '/values/count', $params);
    }
}
