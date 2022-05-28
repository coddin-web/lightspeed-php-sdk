<?php

declare(strict_types=1);

namespace Lightspeed\ApiResource\Blogs\Articles;

use CURLFile;
use Lightspeed\ApiClient;
use Lightspeed\ApiException;
use RuntimeException;
use SplFileObject;

use function Lightspeed\ApiResource\Blogs\str_contains;

final class Image
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
    }

    /**
     *
     * @throws ApiException
     */
    public function create(int $articleId, array $fields): array
    {
        if (!str_contains((string) $fields['attachment'], 'http')) {
            try {
                $attachment = $fields['attachment'];

                new SplFileObject($attachment);

                $mimetype = mime_content_type($attachment);
                $fields['attachment'] = new CURLFile($attachment, $mimetype);

                $options = [
                    'header' => 'multipart/form-data',
                ];

                return $this->client->create('blogs/articles/' . $articleId . '/image', $fields, $options);
            } catch (RuntimeException) {
                // Silence is golden.
            }
        }

        $fields = ['blogArticleImage' => $fields];

        return $this->client->create('blogs/articles/' . $articleId . '/image', $fields);
    }

    /**
     *
     * @throws ApiException
     */
    public function get(int $articleId): int|array
    {
        return $this->client->read('blogs/articles/' . $articleId . '/image');
    }

    /**
     * @throws ApiException
     */
    public function delete(int $articleId): array
    {
        return $this->client->delete('blogs/articles/' . $articleId . '/image');
    }
}
