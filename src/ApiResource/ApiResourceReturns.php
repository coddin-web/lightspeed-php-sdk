<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceReturns
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $returnId
     *
     * @return array
     * @throws ApiException
     */
    public function get($returnId = null, array $params = [])
    {
        if (!$returnId) {
            return $this->client->read('returns', $params);
        } else {
            return $this->client->read('returns/' . $returnId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('returns/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $returnId, array $fields): array
    {
        $fields = ['return' => $fields];

        return $this->client->update('returns/' . $returnId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $returnId): array
    {
        return $this->client->delete('returns/' . $returnId);
    }
}
