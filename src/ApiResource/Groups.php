<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Groups
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
        $fields = ['group' => $fields];

        return $this->client->create('groups', $fields);
    }

    /**
     * @param int $groupId
     *
     * @return array
     * @throws ApiException
     */
    public function get($groupId = null, array $params = [])
    {
        if (!$groupId) {
            return $this->client->read('groups', $params);
        } else {
            return $this->client->read('groups/' . $groupId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('groups/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $groupId, array $fields): array
    {
        $fields = ['group' => $fields];

        return $this->client->update('groups/' . $groupId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $groupId): array
    {
        return $this->client->delete('groups/' . $groupId);
    }
}
