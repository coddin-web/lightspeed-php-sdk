<?php

namespace Lightspeed;

class ApiResourceTextpages
{
    /**
     * @var ApiClient
     */
    private $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws ApiException
     */
    public function create($fields)
    {
        $fields = array('textpage' => $fields);

        return $this->client->create('textpages', $fields);
    }

    /**
     * @param int $textpageId
     * @param array $params
     *
     * @return array
     * @throws ApiException
     */
    public function get($textpageId = null, $params = array())
    {
        if (!$textpageId) {
            return $this->client->read('textpages', $params);
        } else {
            return $this->client->read('textpages/' . $textpageId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws ApiException
     */
    public function count($params = array())
    {
        return $this->client->read('textpages/count', $params);
    }

    /**
     * @param int $textpageId
     * @param array $fields
     *
     * @return array
     * @throws ApiException
     */
    public function update($textpageId, $fields)
    {
        $fields = array('textpage' => $fields);

        return $this->client->update('textpages/' . $textpageId, $fields);
    }

    /**
     * @param int $textpageId
     *
     * @return array
     * @throws ApiException
     */
    public function delete($textpageId)
    {
        return $this->client->delete('textpages/' . $textpageId);
    }
}