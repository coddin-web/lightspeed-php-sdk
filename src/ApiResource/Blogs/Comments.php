<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Blogs;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Comments
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
        $fields = ['blogComment' => $fields];

        return $this->client->create('blogs/comments', $fields);
    }

    /**
     * @param int $commentId
     *
     * @return array
     * @throws ApiException
     */
    public function get($commentId = null, array $params = [])
    {
        if (!$commentId) {
            return $this->client->read('blogs/comments', $params);
        } else {
            return $this->client->read('blogs/comments/' . $commentId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('blogs/comments/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $commentId, array $fields): array
    {
        $fields = ['blogComment' => $fields];

        return $this->client->update('blogs/comments/' . $commentId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $commentId): array
    {
        return $this->client->delete('blogs/comments/' . $commentId);
    }
}
