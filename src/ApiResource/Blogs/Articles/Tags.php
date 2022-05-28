<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Blogs\Articles;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Tags
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
        $fields = ['blogArticleTag' => $fields];

        return $this->client->create('blogs/articles/tags', $fields);
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws ApiException
     */
    public function get($relationId = null, array $params = [])
    {
        if (!$relationId) {
            return $this->client->read('blogs/articles/tags', $params);
        } else {
            return $this->client->read('blogs/articles/tags/' . $relationId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('blogs/articles/tags/count', $params);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('blogs/articles/tags/' . $relationId);
    }
}
