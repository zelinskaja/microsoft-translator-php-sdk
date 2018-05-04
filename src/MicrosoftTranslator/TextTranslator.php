<?php

namespace Wowmaking\MicrosoftTranslator;

use Guzzle\Http\Client;
use Wowmaking\MicrosoftTranslator\Transformers\TranslateArrayTransformer;
use Wowmaking\MicrosoftTranslator\Transformers\TranslateTransformer;

class TextTranslator
{
    const URL = 'https://api.cognitive.microsofttranslator.com/';
    const VERSION = '3.0';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $key;

    /**
     * Translator constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->client = new Client();
        $this->key = $key;
    }

    /**
     * @param string $text
     * @param string $to
     * @param string $from
     * @return Response
     */
    public function translate(string $text, string $to, string $from = ''): Response
    {
        $response = $this->client
            ->post(
                $this->getUrl('translate', compact('to', 'from')),
                $this->getHeaders(),
                json_encode([compact('text')])
            )
            ->send();

        return new Response($response, new TranslateTransformer());
    }

    /**
     * @param array $text
     * @param array $to
     * @param string $from
     * @return Response
     */
    public function translateArray(array $text, array $to, string $from = ''): Response
    {
        $response = $this->client
            ->post(
                $this->getUrl('translate', compact('to', 'from')),
                $this->getHeaders(),
                json_encode(array_map(function ($item) {
                    return ['text' => $item];
                }, $text))
            )
            ->send();

        return new Response($response, new TranslateArrayTransformer());
    }

    /**
     * @return array
     */
    public function getLanguages(): array
    {
        $result = $this->client
            ->get($this->getUrl('languages'))
            ->send()
            ->getBody();

        return json_decode($result, true);
    }

    /**
     * @param string $location
     * @param array $params
     * @return string
     */
    protected function getUrl(string $location, array $params = []): string
    {
        return self::URL . $location . '?' . http_build_query(array_merge(['api-version' => self::VERSION], $params));
    }

    /**
     * @return array
     */
    protected function getHeaders(): array
    {
        return [
            'Ocp-Apim-Subscription-Key' => $this->key,
            'Content-Type' => 'application/json',
        ];
    }
}