<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class ApiResourceReviews
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
        $fields = ['review' => $fields];

        return $this->client->create('reviews', $fields);
    }

    /**
     * @param int $reviewId
     *
     * @return array
     * @throws ApiException
     */
    public function get($reviewId = null, array $params = [])
    {
        if (!$reviewId) {
            return $this->client->read('reviews', $params);
        } else {
            return $this->client->read('reviews/' . $reviewId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('reviews/count', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(int $reviewId, array $fields): array
    {
        $fields = ['review' => $fields];

        return $this->client->update('reviews/' . $reviewId, $fields);
    }

    /**
     * @throws ApiException
     */
    public function delete(int $reviewId): array
    {
        return $this->client->delete('reviews/' . $reviewId);
    }
}
