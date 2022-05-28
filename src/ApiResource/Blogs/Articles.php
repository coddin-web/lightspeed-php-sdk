<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Blogs;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Articles
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
        $fields = ['blogArticle' => $fields];

        return $this->client->create('blogs/articles', $fields);
    }

    /**
     * @param int $articleId
     *
     * @return array
     * @throws ApiException
     */
    public function get($articleId = null, array $params = [])
    {
        if (!$articleId) {
            return $this->client->read('blogs/articles', $params);
        } else {
            return $this->client->read('blogs/articles/' . $articleId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('blogs/articles/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $articleId, array $fields): array
    {
        $fields = ['blogArticle' => $fields];

        return $this->client->update('blogs/articles/' . $articleId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $articleId): array
    {
        return $this->client->delete('blogs/articles/' . $articleId);
    }
}
