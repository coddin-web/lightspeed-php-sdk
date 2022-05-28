<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource;

use Lightspeed\ApiClient;
use Lightspeed\ApiException;

final class Contacts
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     * @param int $contactId
     *
     * @return array
     * @throws ApiException
     */
    public function get($contactId = null, array $params = [])
    {
        if (!$contactId) {
            return $this->client->read('contacts', $params);
        } else {
            return $this->client->read('contacts/' . $contactId, $params);
        }
    }

    /**
     *
     * @throws ApiException
     */
    public function count(array $params = []): int|array
    {
        return $this->client->read('contacts/count', $params);
    }
}
