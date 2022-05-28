<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Account;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class MetaFields
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $metafieldId
     *
     * @return array
     * @throws ApiException
     */
    public function get($metafieldId = null, array $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('account/metafields', $params);
        } else {
            return $this->client->read('account/metafields/' . $metafieldId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('account/metafields/count', $params);
    }
}
