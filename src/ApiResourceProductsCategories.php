<?php

namespace Lightspeed;

class ApiResourceProductsCategories
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
     * @param int $productId
     * @param int $categoryId
     * @param array $params
     *
     * @return array
     * @throws ApiException
     */
    public function get($productId, $categoryId = null, $params = array())
    {
        if (!$categoryId) {
            return $this->client->read('products/' . $productId . '/categories', $params);
        } else {
            return $this->client->read('products/' . $productId . '/categories/' . $categoryId, $params);
        }
    }

    /**
     * @param int $productId
     * @param array $params
     *
     * @return int
     * @throws ApiException
     */
    public function count($productId, $params = array())
    {
        return $this->client->read('products/' . $productId . '/categories/count', $params);
    }

    /**
     * @param int $productId
     * @param int $categoryId
     *
     * @return array
     * @throws ApiException
     */
    public function delete($productId, $categoryId)
    {
        return $this->client->delete('products/' . $productId . '/categories/' . $categoryId);
    }
}