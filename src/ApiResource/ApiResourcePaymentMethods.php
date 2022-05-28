<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourcePaymentMethods
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $paymentmethodId
     *
     * @return array
     * @throws ApiException
     */
    public function get($paymentmethodId = null, array $params = [])
    {
        if (!$paymentmethodId) {
            return $this->client->read('paymentmethods', $params);
        } else {
            return $this->client->read('paymentmethods/' . $paymentmethodId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('paymentmethods/count', $params);
    }
}
