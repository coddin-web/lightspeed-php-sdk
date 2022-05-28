<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Blogs
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
        $fields = ['blog' => $fields];

        return $this->client->create('blogs', $fields);
    }

    /**
     * @param int $blogId
     *
     * @return array
     * @throws ApiException
     */
    public function get($blogId = null, array $params = [])
    {
        if (!$blogId) {
            return $this->client->read('blogs', $params);
        } else {
            return $this->client->read('blogs/' . $blogId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('blogs/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $blogId, array $fields): array
    {
        $fields = ['blog' => $fields];

        return $this->client->update('blogs/' . $blogId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $blogId): array
    {
        return $this->client->delete('blogs/' . $blogId);
    }
}
