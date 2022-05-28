<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceTextpages
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
        $fields = ['textpage' => $fields];

        return $this->client->create('textpages', $fields);
    }

    /**
     * @param int $textpageId
     *
     * @return array
     * @throws ApiException
     */
    public function get($textpageId = null, array $params = [])
    {
        if (!$textpageId) {
            return $this->client->read('textpages', $params);
        } else {
            return $this->client->read('textpages/' . $textpageId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('textpages/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $textpageId, array $fields): array
    {
        $fields = ['textpage' => $fields];

        return $this->client->update('textpages/' . $textpageId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $textpageId): array
    {
        return $this->client->delete('textpages/' . $textpageId);
    }
}
