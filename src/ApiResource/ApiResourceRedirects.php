<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceRedirects
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
        $fields = ['redirect' => $fields];

        return $this->client->create('redirects', $fields);
    }

    /**
     * @param int $redirectId
     *
     * @return array
     * @throws ApiException
     */
    public function get($redirectId = null, array $params = [])
    {
        if (!$redirectId) {
            return $this->client->read('redirects', $params);
        } else {
            return $this->client->read('redirects/' . $redirectId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('redirects/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $redirectId, array $fields): array
    {
        $fields = ['redirect' => $fields];

        return $this->client->update('redirects/' . $redirectId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $redirectId): array
    {
        return $this->client->delete('redirects/' . $redirectId);
    }
}
