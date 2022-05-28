<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceExternalServices
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
        $fields = ['externalService' => $fields];

        return $this->client->create('external_services', $fields);
    }

    /**
     * @param int $externalserviceId
     *
     * @return array
     * @throws ApiException
     */
    public function get($externalserviceId = null, array $params = [])
    {
        if (!$externalserviceId) {
            return $this->client->read('external_services', $params);
        } else {
            return $this->client->read('external_services/' . $externalserviceId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('external_services/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $externalserviceId): array
    {
        return $this->client->delete('external_services/' . $externalserviceId);
    }
}
