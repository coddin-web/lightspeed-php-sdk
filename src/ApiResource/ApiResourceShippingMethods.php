<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceShippingMethods
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $shippingmethodId
     *
     * @return array
     * @throws ApiException
     */
    public function get($shippingmethodId = null, array $params = [])
    {
        if (!$shippingmethodId) {
            return $this->client->read('shippingmethods', $params);
        } else {
            return $this->client->read('shippingmethods/' . $shippingmethodId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('shippingmethods/count', $params);
    }
}
